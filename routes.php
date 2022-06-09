<?php

require_once 'router/Router.php';

$router = new Router();

$action = $_POST['action'];
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$status = $_POST['status'];

switch ($action) {
    case 'add':
        $router->post($name, $email, $gender, $status);
        header('Location: index.php');
        break;
    case 'update':
        $router->put($id, $name, $email, $gender, $status);
        header('Location: index.php');
        break;
    case 'delete':
        $router->delete();
        header('Location: index.php');
        break;
}
