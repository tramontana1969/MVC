<?php

require_once __DIR__ . '/../controller/Controller.php';

class Router
{

    public object $controller;

    public function __construct()
    {
        $this->controller = new Controller();
    }

    public function post(string $name, string $email, string $gender, string $status)
    {
        $this->controller->add($name, $email, $gender, $status);
    }

    public function put(string $id, string $name, string $email, string $gender, string $status)
    {
        $this->controller->edit($id, $name, $email, $gender, $status);
    }

    public function delete()
    {
        $this->controller->delete();
    }
}