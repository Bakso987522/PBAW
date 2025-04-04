<?php

namespace security;


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
        $cred = [
            'admin' => 'admin',
            'user' => 'user'
        ];

        if (isset($cred[$this->form['login']]) && $cred[$this->form['login']] === $this->form['pass']) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['role'] = $this->form['login'];
            return true;
        }

        getMessages()->addError('Niepoprawny login lub hasło');
        return false;
    }

    public function process()
    {
        global $conf;
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!$this->validate()) {
            unset($_POST['login']);
            unset($_POST['pass']);
            $this->generateView();
        } else {
            header("Location: " . $conf->app_url);
        }
    }

    public function logout()
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
        return isset($_SESSION['role']);

    }

    public function generateView()
    {
        getSmarty()->assign('page_title', 'Logowanie');
        getSmarty()->assign('isLogged', $this->isLogged());
        getSmarty()->assign('conf', getConf());
        getSmarty()->assign('messages', getMessages()->getErrors());
        getSmarty()->assign('form', $this->form);
        getSmarty()->display('loginView.tpl');
    }
}

