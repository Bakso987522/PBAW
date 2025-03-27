<?php

namespace security;
use lib\Messages;
use Smarty\Smarty;

require_once $conf->root_path.'/lib/Messages.class.php';
class AuthController
{
    private $form;
    private $messages;

    public function __construct()
    {
        $this->form = ['login' => null, 'pass' => null];
        $this->getParams();
        $this->messages = new Messages();
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
            $this->messages->addError('Nie podano loginu');
        }
        if ($this->form['pass'] === "") {
            $this->messages->addError('Nie podano hasłą');
        }

        if (!$this->messages->isEmpty()) return false;

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

        $this->messages->addError('Niepoprawny login lub hasło');
        return false;
    }

    public function process()
    {
        global $conf;
        session_start();
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
        session_start();
        session_destroy();
        header("Location: " . $conf->app_url);
    }

    public function isLogged(): bool
    {
        session_start();
        return isset($_SESSION['role']);

    }

    public function generateView()
    {
        global $conf;
        $smarty = new Smarty();
        $smarty->assign('page_title', 'Logowanie');
        $smarty->assign('isLogged', $this->isLogged());
        $smarty->setTemplateDir($conf->root_path.'/templates');
        $smarty->assign('conf', $conf);
        $smarty->assign('messages', $this->messages->getErrors());
        $smarty->assign('form', $this->form);
        $smarty->display('loginView.tpl');
    }
}

