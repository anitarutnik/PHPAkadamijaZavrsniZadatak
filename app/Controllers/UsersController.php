<?php

namespace App\Controllers;

//TODO: User Resource Model

class UsersContorller extends AbstractController
{

    public function loginAction()
    {
        if (!$this->auth->isLoggedIn()) {
            // return $this->view->render('login');
        }
    }

    public function registerAction()
    {
        if (!$this->auth->isLoggedIn()) {
            return $this->view->render('register');
        }
    }

    public function registerSubmitAction(): void
    {
        if (!$this->isPost()) {
            // only POST requests are allowed
            header('Location: /'); //vratit će nas na homepage ako nije post request
            return;
        }

        $isValid = isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['confirm_password']); //??????

        if (!$isValid) {
            // set error message
            header('Location: /user/register');
            return;
        }

        if ($_POST['password'] !== $_POST['confirm_password']) {
            // set error message
            header('Location: /user/register');
            return;
        }

        // $user = User::getOne('email', $_POST['email']);

        // if ($user->getId()) {
        //     // user already exists
        //     header('Location: /user/register');
        //     return;
        // }

        // User::insert([
        //     'first_name' => $_POST['first_name'],
        //     'last_name' => $_POST['last_name'],
        //     'email' => $_POST['email'],
        //     'pass' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        // ]);

        header('Location: /user/login');
    }

    public function loginSubmitAction(): void
    {
        // only POST requests are allowed
        if (!$this->isPost() || $this->auth->isLoggedIn()) {
            header('Location: /');
            return;
        }

        if (!isset($_POST['email'], $_POST['password'])) {
            // set error message
            header('Location: /user/login');
            return;
        }

        // $user = User::getOne('email', $_POST['email']);

        // if (!$user->getId() || !password_verify($_POST['password'], $user->getPassword())) {
        //     // set error message
        //     header('Location: /user/login');
        //     return;
        // }

        // $this->auth->login($user);
        // header('Location: /');
    }

    public function logoutAction()
    {
        if ($this->auth->isLoggedIn()) {
            $this->auth->logout();
        }
        header('Location: /');
    }
}
