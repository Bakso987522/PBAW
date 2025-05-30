<?php
namespace calc;
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/calc/CreditForm.class.php';
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/app/security/AuthController.class.php';
use lib\Messages;
use Smarty\Smarty;
use security\AuthController;
class CreditController
{
    private $messages;
    private $form;
    private $result;
    private $auth;
    public function __construct(){
        $this->messages = new Messages();
        $this->form = new CreditForm();
        $this->auth = new AuthController();
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
        if(!$this->auth->isLogged()){
            $this->messages->addError("<a href='app/controller.php?action=loginPage'>Zaloguj się</a>, aby skorzystać z aplikacji");
        }
        if($this->form->loanAmount === ""){
            $this->messages->addError('Nie podano kwoty kredytu');
        }
        if($this->form->rate === ""){
            $this->messages->addError('Nie podano oprocentowania');
        }
        if($this->form->years === ""){
            $this->messages->addError('Nie podano ilości lat');
        }
        if(!$this->messages->isError()){
            if(!is_numeric($this->form->loanAmount) || $this->form->loanAmount <= 0){
                $this->messages->addError('Nieprawidłowa kwota kredytu (liczba całkowita większa od zera)');
            }
            if(!is_numeric($this->form->rate) || $this->form->rate <= 0){
                $this->messages->addError('Nieprawidłowe oprocentowanie (liczba całkowita większa od zera)');
            }
            if(!is_numeric($this->form->years) || $this->form->years <= 0 || $this->form->years > 30){
                $this->messages->addError('Nieprawidłowa ilość lat (liczba całkowita większa od zera do trzydziestu lat)');
            }
        };
        return ! $this->messages->isError();
    }
    public function generateView()
    {
        global $conf;
        $smarty = new Smarty();
        $years_drop = [];
        for ($i = 1; $i <= 30; $i++) {
            if ($i == 1) $label = ' ROK';
            elseif ($i % 10 >= 2 && $i % 10 <= 4 && ($i < 10 || $i > 20)) $label = ' LATA';
            else $label = ' LAT';

            $years_drop[] = ['value' => $i, 'label' => $i . $label];
        }
        $smarty->assign('years_drop', $years_drop);
        $smarty->setTemplateDir($conf->root_path.'/templates');
        $smarty->assign('conf', $conf);
        $smarty->assign('isLogged', $this->auth->isLogged());
        $smarty->assign('messages', $this->messages->getErrors());
        $smarty->assign('infos', $this->messages->getInfos());
        $smarty->assign('form', $this->form);
        $smarty->assign('result', $this->result);
        $smarty->display('creditView.tpl');

    }
    public function process()
    {
        $this->getParams();
        if($this->validate()) {
            $this->form->rate = $this->form->rate/100;
            $this->form->loanAmount = intval($this->form->loanAmount);
            $this->form->years = intval($this->form->years);
            $this->result = ceil(($this->form->loanAmount / (($this->form->years*12)) * (1+$this->form->rate))*100)/100;
            $this->messages->addInfo("Operacja wykonana pomyślnie");


        }
        $this->generateView();
    }
}