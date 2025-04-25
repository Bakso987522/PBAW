<?php

namespace app\controllers;

use PDOException;

class ResultsShowController
{
    private $records;

    public function action_showResults()
    {
        try {
            $this->records = getDB()->select("loan_results", [
                "[>]users" => "id_user"
            ], [
                "loan_results.id_loan",
                "loan_results.amount",
                "loan_results.rate",
                "loan_results.years",
                "loan_results.result",
                "loan_results.date",
                "users.login" // lub inna kolumna z nazwą użytkownika
            ], [
                "ORDER" => ["loan_results.id_loan" => "DESC"]
            ]);

        } catch (PDOException $e) {
            getMessages()->addError("Wystąpił błąd podczas pobierania wyników." . $e->getMessage());
            if (getConf()->debug) getMessages()->addError($e->getMessage());
        }

        $this->generateView();
    }


    public function generateView()
    {
        getSmarty()->assign('conf', getConf());
        getSmarty()->assign('results', $this->records);
        getSmarty()->assign('isLogged', auth()->isLogged());
        getSmarty()->assign('getRole', auth()->getRole());
        getSmarty()->assign('messages', getMessages()->getErrors());
        getSmarty()->display('resultsView.tpl');
    }
}
