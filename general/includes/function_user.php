<?php

session_start();
include('dbcon.php');




if (isset($_POST['register_btn'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['txtun'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $postData = [
        'fullname' => $fullname,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'level' => '0'
    ];

    $ref_table = "Users";
    $postRef = $database->getReference($ref_table)->push($postData);

    if ($postRef) {
        $_SESSION['status'] = "Data Success";
        header("Location: index.php");
    } else {
        $_SESSION['status'] = "Data Fail";
        header("Location: index.php");
    }
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['txtun'];
    $password = $_POST['password'];



    $ref_table = "Users";
    $fetchdata = $database->getReference($ref_table)->getValue();

    if ($fetchdata > 0) {
        foreach ($fetchdata as $key => $row) {
            echo $row['email'] . "  ";

            if ($row['email'] == $email) {
                $_SESSION["email"] = $row["email"];
                $_SESSION["login_success"] = true;
                header("Location: home.php");
                exit();
            }
        }
    }
    else {
        header("Location: home.php");
        $_SESSION["login_fail"] = true;
        exit();
    }
}
