<?php

require_once 'router/Router.php';

$router = new Router();

$action = htmlspecialchars($_POST['action'], ENT_QUOTES);
$id = htmlspecialchars($_POST['id'], ENT_QUOTES);
$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$gender = htmlspecialchars($_POST['gender'], ENT_QUOTES);
$status = htmlspecialchars($_POST['status'], ENT_QUOTES);

switch ($action) {
    case 'add':
        $router->post($name, $email, $gender, $status);
        header('Location: index.php');
        exit();
    case 'update':
        $router->put($id, $name, $email, $gender, $status);
        header('Location: index.php');
        exit();
    case 'delete':
        $router->delete();
        header('Location: index.php');
        exit();
}
