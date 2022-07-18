<?php

use App\Controller\UserController;
require 'vendor/autoload.php';

$users = UserController::listAllUsers();
$usersDTO = UserController::listAllUsersDTO();

include __DIR__ . '/header.php';
include __DIR__ . '/Includes/listagem.php';

