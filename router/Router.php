<?php

require_once __DIR__ . '/../controller/Controller.php';

class Router
{

    public object $controller;

    public function __construct()
    {
        $this->controller = new Controller();
    }

    public function post($name, $email, $gender, $status)
    {
        $this->controller->add($name, $email, $gender, $status);
    }

    public function put($id, $name, $email, $gender, $status)
    {
        $this->controller->edit($id, $name, $email, $gender, $status);
    }

    public function delete()
    {
        $this->controller->delete();
    }
}