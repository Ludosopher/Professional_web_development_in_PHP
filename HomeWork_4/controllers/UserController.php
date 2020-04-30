<?php

namespace App\controllers;

use App\models\User;

class UserController
{
    protected $defaultAction = 'all';

    public function run($actionName)
    {
        $action = $this->defaultAction;
        if (!empty($actionName)) {
            $action = $actionName;
            if (!method_exists($this, $action . 'Action')) {
                $action = $this->defaultAction;
            }
        }
        $action .= 'Action';
        return $this->$action();
    }

    public function oneAction()
    {
        $id = 0;
        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
        }
        $user = User::getOne($id);
        return $this->render('userOne', ['user' => $user]);
    }

    public function allAction()
    {
        $users = User::getAll();
        return $this->render('userAll', ['users' => $users]);
    }

    public function insertAction()
    {
        $user = new \App\models\User();

        $user->login = 'admin1';
        $user->password = '1232';
        $user->fio = 'admin1';

        $user->insert();
    }

    protected function render($template, $params = []) {
        $content = $this->renderTmpl($template, $params);
        return $this->renderTmpl('layouts/main', ['content' => $content]);
    }

    protected function renderTmpl($template, $params = [])
    {
        ob_start();
        extract($params);
        include dirname(__DIR__) . '/views/' . $template . '.php';
        return ob_get_clean();
    }
}