<?php

namespace controller;
 
use view\TemplateEngine;
use service\Model;

class Controller
{
    private $view;
    private $model;

    public function __construct()
    {
        $this->setView(new TemplateEngine());
        $this->setModel(new Model());
    }

    public function signIn()
    {
        $this->getView()->render("login_page.php");
    }

    public function editUser($username)
    {
        $users = $this->getModel()->getSingleUser($username);
        $this->getView()->render('edit_user.php', $users);
    }

    public function signUp()
    {
        $this->getView()->render('sign_up.php');
    }

    public function checkUser()
    {
        $res = $this->getModel()->getSingleUser($_POST['userName']);
        if (!$res) {
            echo true;
        } else return null;
    }



    public function deleteUser($id)
    {
        $status = $this->getModel()->modelDeleteUser($id);
        $status = $status ? "success" : "Error";
        header("Location:/allUsers?status=$status");
    }

    public function addToDB()
    {
        $this->getModel()->addToDB();
    }

    public function updateUser($id)
    {
        $status = $this->getModel()->updateUser($id);
        if ($status) {
            header("Location: /users");
        } else header("Location: /editUser/$id");
    }

    public function showUsers()
    {
        $users = $this->getModel()->getAllUsers();
        $this->getView()->render('all_users.php', $users);
    }


    public function logOut()
    {
        $this->getModel()->logOut();
    }

    public function verifyUser()
    {
        $this->getModel()->verifyUser();
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    /**
     * @return TemplateEngine
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

}