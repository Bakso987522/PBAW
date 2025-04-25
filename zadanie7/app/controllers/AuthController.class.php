<?php

namespace app\controllers;


use app\transfer\User;

class AuthController
{
    private $form;

    public function __construct()
    {
        $this->form = ['login' => null, 'pass' => null];
        $this->getParams();
    }

    private function getParams()
    {
        $this->form['login'] = $_POST['login'] ?? null;
        $this->form['pass'] = $_POST['pass'] ?? null;
    }

    private function validate()
    {
        if (!isset($this->form['login']) || !isset($this->form['pass'])) {
            return false;
        }
        if ($this->form['login'] === "") {
            getMessages()->addError('Nie podano loginu');
        }
        if ($this->form['pass'] === "") {
            getMessages()->addError('Nie podano hasłą');
        }

        if (!getMessages()->isEmpty()) return false;

        return $this->auth();
    }

    private function auth()
    {
        $login = $this->form['login'];
        $pass = $this->form['pass'];

        try {
            $user = getDB()->get("users", [
                "id_user",
                "login",
                "password",
                "role"
            ], [
                "login" => $login
            ]);

            if ($user && $pass === $user["password"]) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                // Zapisujemy podstawowe dane do sesji
                $_SESSION['user_login'] = $user['login'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['user_id'] = $user['id_user'];

                // Dodajemy rolę do systemu uprawnień
                addRole($user['role']);

                return true;
            }

            getMessages()->addError('Niepoprawny login lub hasło');
            return false;

        } catch (\PDOException $e) {
            getMessages()->addError("Błąd połączenia z bazą danych.". $e->getMessage());
            if (getConf()->debug) getMessages()->addError($e->getMessage());
            return false;
        }
    }


    public function action_login()
    {
        $this->getParams();

        if ($this->validate()){
            getSmarty()->assign('isAdmin', $this->isLogged());
            header("Location: ".getConf()->app_url."/");
        } else {

            $this->generateView();
        }
    }

    public function action_logout()
    {
        global $conf;
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header("Location: " . $conf->app_url);
    }

    public function isLogged(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user_id']);

    }
    public function action_loginShow()
    {
        $this->generateView();
    }
    public function getRole()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return $_SESSION['user_role'] ?? null;
    }
    public function generateView()
    {
        getSmarty()->assign('page_title', 'Logowanie');
        getSmarty()->assign('isLogged', $this->isLogged());
        getSmarty()->assign('getRole', $this->getRole());
        getSmarty()->assign('conf', getConf());
        getSmarty()->assign('messages', getMessages()->getErrors());
        getSmarty()->assign('form', $this->form);
        getSmarty()->display('loginView.tpl');
    }
}

