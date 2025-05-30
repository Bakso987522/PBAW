<?php
namespace app\controllers;

use app\forms\CreditForm;

class CreditController
{
    private $form;
    private $result;

    public function __construct(){
        $this->form = new CreditForm();
    }
    public function getParams()
    {
        $this->form->loanAmount = $_POST['loan'] ?? null;
        $this->form->rate = $_POST['rate'] ?? null;
        $this->form->years = $_POST['years'] ?? null;
    }
    public function validate(): bool
    {
        if(!(isset($this->form->loanAmount) || isset($this->form->rate) || isset($this->form->years))) {
            return false;
    }
        if(!auth()->isLogged()){
            getMessages()->addError("<a href='controller.php?action=login'>Zaloguj się</a>, aby skorzystać z aplikacji");
        }
        if($this->form->loanAmount === ""){
            getMessages()->addError('Nie podano kwoty kredytu');
        }
        if($this->form->rate === ""){
            getMessages()->addError('Nie podano oprocentowania');
        }
        if($this->form->years === ""){
            getMessages()->addError('Nie podano ilości lat');
        }
        if(!getMessages()->isError()){
            if(!is_numeric($this->form->loanAmount) || $this->form->loanAmount <= 0){
                getMessages()->addError('Nieprawidłowa kwota kredytu (liczba całkowita większa od zera)');
            }
            if(!is_numeric($this->form->rate) || $this->form->rate <= 0){
                getMessages()->addError('Nieprawidłowe oprocentowanie (liczba całkowita większa od zera)');
            }
            if(!is_numeric($this->form->years) || $this->form->years <= 0 || $this->form->years > 30){
                getMessages()->addError('Nieprawidłowa ilość lat (liczba całkowita większa od zera do trzydziestu lat)');
            }
        };
        return ! getMessages()->isError();
    }
    public function generateView()
    {
        $years_drop = [];
        for ($i = 1; $i <= 30; $i++) {
            if ($i == 1) $label = ' ROK';
            elseif ($i % 10 >= 2 && $i % 10 <= 4 && ($i < 10 || $i > 20)) $label = ' LATA';
            else $label = ' LAT';

            $years_drop[] = ['value' => $i, 'label' => $i . $label];
        }
        getSmarty()->assign('years_drop', $years_drop);
        getSmarty()->assign('conf', getConf());
        getSmarty()->assign('isLogged', auth()->isLogged());
        getSmarty()->assign('getRole', auth()->getRole());
        getSmarty()->assign('messages', getMessages()->getErrors());
        getSmarty()->assign('infos', getMessages()->getInfos());
        getSmarty()->assign('form', $this->form);
        getSmarty()->assign('result', $this->result);
        getSmarty()->display('creditView.tpl');

    }
    public function action_calcShow()
    {
        $this->generateView();
    }
    public function action_calcCompute()
    {
        $this->getParams();
        if($this->validate()) {
            $this->form->rate = $this->form->rate/100;
            $this->form->loanAmount = intval($this->form->loanAmount);
            $this->form->years = intval($this->form->years);
            $this->result = ceil(($this->form->loanAmount / (($this->form->years*12)) * (1+$this->form->rate))*100)/100;
            getMessages()->addInfo("Operacja wykonana pomyślnie");
            $this->saveLoanResult();


        }
        $this->generateView();
    }
    private function saveLoanResult()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            getMessages()->addError("Nie można zapisać wyniku - użytkownik niezalogowany.");
            return;
        }

        try {
            getDB()->insert("loan_results", [
                "amount" => $this->form->loanAmount,
                "rate" => $this->form->rate * 100, // zapisz z powrotem jako procent
                "years" => $this->form->years,
                "result" => $this->result,
                "date" => date('Y-m-d H:i:s'),
                "id_user" => $_SESSION['user_id']
            ]);
            getMessages()->addInfo("Wynik został zapisany.");
        } catch (\PDOException $e) {
            getMessages()->addError("Błąd przy zapisie wyniku do bazy.");
            if (getConf()->debug) getMessages()->addError($e->getMessage());
        }
    }

}