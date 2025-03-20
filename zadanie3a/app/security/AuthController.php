<?php

class AuthController
{
    private $form;
    private $messages;

    public function __construct()
    {
        $this->form = ['login' => null, 'pass' => null];
        $this->messages = [];
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
            $this->messages[] = 'Nie podano loginu';
        }
        if ($this->form['pass'] === "") {
            $this->messages[] = 'Nie podano hasła';
        }

        if (!empty($this->messages)) return false;

        return $this->auth();
    }

    private function auth()
    {
        $cred = [
            'admin' => 'admin',
            'user' => 'user'
        ];

        if (isset($cred[$this->form['login']]) && $cred[$this->form['login']] === $this->form['pass']) {
            session_start();
            $_SESSION['role'] = $this->form['login'];
            return true;
        }

        $this->messages[] = 'Niepoprawny login lub hasło';
        return false;
    }

    public function process()
    {
        session_start();
        if (!$this->validate()) {
            $messages = $this->messages;
            include _ROOT_PATH . '/app/security/login_view.php';
        } else {
            header("Location: " . _APP_URL);
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . _APP_URL);
    }

    public function isLogged(): bool
    {
        session_start();
        return isset($_SESSION['role']);



    }
}


