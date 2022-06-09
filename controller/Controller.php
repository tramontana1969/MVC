<?php

require_once __DIR__ . '/../model/User.php';

class Controller
{
    public object $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function get()
    {
        $users = $this->user->getUsers();
        include __DIR__ . '/../view/index.php';
    }

    public function add()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $status = $_POST['status'];

        if (!empty($name) && !empty($email) && !empty($gender) && !empty($status)) {
            $this->user->createUser([$name, $email, $gender, $status]);
        }

        header('Location: ../view/index.php');
    }

    public function edit()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $status = $_POST['status'];

        if (!empty($id) && !empty($name) && !empty($email) && !empty($gender) && !empty($status)) {
            $this->user->updateUser($id, [$name, $email, $gender, $status]);
        }

        header('Location: ../view/index.php');
    }

    public function delete()
    {
        if(!empty($_POST['id'])) {
            $this->user->deleteUser($_POST['id']);
        }

        header('Location: ../view/index.php');
    }
}