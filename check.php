<?php

use Service\UserService;

require_once __DIR__ . "/BackEnd/Services/UserService.php";

$service = new UserService();


if (isset($_POST['register_btn'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    echo $email . "  " . $pass;



    $service->create($email, $pass);
}