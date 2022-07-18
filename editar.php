<?php

require __DIR__.'/vendor/autoload.php';

use App\Controller\UserController;
use \App\Entity\User;

$userController = new UserController;

if(isset($_POST['name'], $_POST['pass'], $_POST['email'])){
    $objUser = new User();
    $objUser->name = $_POST['name'];
    $objUser->pass = $_POST['pass'];
    $objUser->email = $_POST['email'];
    $id = $_GET['id'];
    $userController->updateUser($id, $objUser->name, $objUser->pass, $objUser->email);

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/header.php';
include __DIR__ .'/Includes/formulario.php';