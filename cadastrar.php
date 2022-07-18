<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\User;
use \App\Controller\UserController;

if(isset($_POST['name'], $_POST['pass'], $_POST['email'])){
    $objUser = new User;
    $userController = new UserController();
    $objUser->name = $_POST['name'];
    $objUser->pass = $_POST['pass'];
    $objUser->email = $_POST['email'];
    $userController->createUser($objUser->name, $objUser->pass, $objUser->email);

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/header.php';
include __DIR__ .'/Includes/formulario.php';