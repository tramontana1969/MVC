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
        $genders = ['male' => 'Male', 'female' => 'Female'];
        $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];
        $users = json_decode($this->user->getUsers(), true);
        require_once __DIR__ . '/../view/users.php';
    }

    public function add($name, $email, $gender, $status)
    {
        if (!empty($name) && !empty($email) && !empty($gender) && !empty($status)) {
            $this->user->createUser([
                'name' => $name,
                'email' => $email,
                'gender' => $gender,
                'status' => $status,
            ]);
        }
    }

    public function edit($id, $name, $email, $gender, $status)
    {
        if (!empty($id) && !empty($name) && !empty($email) && !empty($gender) && !empty($status)) {
            $this->user->updateUser($id, [
                'name' => $name,
                'email' => $email,
                'gender' => $gender,
                'status' => $status,
            ]);
        }

        header('Location: ../index.php');
    }

    public function delete()
    {
        if (!empty($_POST['id'])) {
            $this->user->deleteUser($_POST['id']);
        }
    }
}