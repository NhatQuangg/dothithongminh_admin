<?php

// use Firebase\Auth\Token\Exception\InvalidToken;
// use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

session_start();
include('dbcon.php');

// if (isset($_POST['login_now_btn']))
// {
//     $email = $_POST['email'];
//     $clearTextPassword = $_POST['password'];

//     try {
//         $user = $auth->getUserByEmail("$email");

//         $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
//         $idTokenString = $signInResult->idToken();   

//         try {
//             $verifiedIdToken = $auth->verifyIdToken($idTokenString);
//         } catch (FailedToVerifyToken  $e) {
//             echo 'The token is invalid: '.$e->getMessage();
//         }

//         // try {
//         //     $verifiedIdToken = $auth->verifyIdToken($idTokenString);
//         //     $uid = $verifiedIdToken->claims()->get('sub');

//         //     $_SESSION['verified_user_id'] = $uid;
//         //     $_SESSION['idTokenString'] = $idTokenString;

//         //     $_SESSION['status'] = "You are Logged In Successfully";
//         //     header('Location: home.php');
//         //     exit();

//         // } catch (InvalidToken $e) {
//         //     echo 'The token is invalid: '.$e->getMessage();
//         // } catch (\InvalidArgumentException $e) {
//         //     echo 'The token could not be parsed: ' . $e->getMessage();
//         // }

//     } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
//         $_SESSION['status'] = "No Email Found";
//         header('Location: login.php');
//         exit();
//     }
// }

// if (isset($_POST['register_now_btn']))
// {
//     $name = $_POST['fullname'];
//     $phone = "+84" . $_POST['phone'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     // Kiểm tra xem các trường dữ liệu có được cung cấp không
//     if (empty($name) || empty($phone) || empty($email) || empty($password)) {
//         $_SESSION['status'] = "Vui lòng điền đầy đủ thông tin";
//         header("Location: register.php");
//         exit();
//     }

//     // Kiểm tra tính hợp lệ của email
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $_SESSION['status'] = "Email không hợp lệ";
//         header("Location: register.php");
//         exit();
//     }

//     // Kiểm tra tính hợp lệ của số điện thoại
//     if (!preg_match('/^\+?[0-9]{10,15}$/', $phone)) {
//         $_SESSION['status'] = "Số điện thoại không hợp lệ";
//         header("Location: register.php");
//         exit();
//     }

//     // Băm mật khẩu trước khi lưu vào Firebase
//     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//     $userProperties = [
//         'email' => $email,
//         'emailVerified' => false,
//         'phoneNumber' => $phone,
//         'password' => $hashedPassword,
//         'displayName' => $name,
//     ];

//     try {
//         $createdUser = $auth->createUser($userProperties);
//         $_SESSION['status'] = "Tài khoản đã được tạo thành công";
//         header("Location: register.php");
//         exit();
//     } catch (Exception $e) {
//         // Xử lý lỗi từ Firebase
//         $_SESSION['status'] = "Lỗi: " . $e->getMessage();
//         header("Location: register.php");
//         exit();
//     }
// }

if (isset($_POST['user_delete_btn'])) {
    $uid = $_POST['user_id'];

    try {
        $auth->deleteUser($uid);
        $_SESSION['status'] = "User Deleted Successfully"; // $e->getMessage();
        header("Location: users-list.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['status'] = "No Such ID Found"; // $e->getMessage();
        header("Location: users-list.php");
        exit();
    }
}

if (isset($_POST['user_edit_update_btn'])) {
    $name = $_POST['fullname'];
    $phone = $_POST['phone'];

    $uid = $_POST['user_id'];

    echo $name;
    echo $phone;
    echo $uid;

    $properties = [
        'displayName' => $name,
        'phoneNumber' => $phone
    ];

    $updatedUser = $auth->updateUser($uid, $properties);

    if ($updatedUser) {
        echo "hehe";
        // $_SESSION['status'] = "User Updated Successfully";
        // header("Location: user-edit.php?id=$uid");
    } else {
        echo "haha";
        // $_SESSION['status'] = "User Not Updated";
        // header("Location: user-edit.php?id=$uid");
    }
}

if (isset($_POST['register_now_btn'])) {
    $name = $_POST['fullname'];
    $phone = "+84" . $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'phoneNumber' => $phone,
        'password' => $password,
        'displayName' => $name,
    ];

    echo $name;
    echo $phone;
    echo $email;
    echo $password;

    $createdUser = $auth->createUser($userProperties);

    if ($createdUser) {
        $_SESSION['status'] = "User Created Successfully";
        header("Location: register.php");
    } else {
        $_SESSION['status'] = "User Not Created";
        header("Location: register.php");
    }
}

if (isset($_POST['delete_btn'])) {
    $id = $_POST['id_key'];
    // echo $id;

    $ref_table = "contacts/" . $id;
    $deleteData = $database->getReference($ref_table)->remove();

    if ($deleteData) {
        $_SESSION['status'] = "Delete Success";
        header("Location: index.php");
    } else {
        $_SESSION['status'] = "Delete Fails";
        header("Location: index.php");
    }
}

if (isset($_POST['update_data'])) {
    $id = $_POST["id"];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];


    $updateData = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'phone' => $phone,
    ];

    $ref_table = "contacts/" . $id;
    $updatequery = $database->getReference($ref_table)->update($updateData);

    if ($updatequery) {
        $_SESSION['status'] = "Update Success";
        header("Location: index.php");
    } else {
        $_SESSION['status'] = "Update Fails";
        header("Location: index.php");
    }
}

if (isset($_POST['save_data'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $postData = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'phone' => $phone,
    ];

    $ref_table = "contacts";
    $postRef = $database->getReference($ref_table)->push($postData);

    if ($postRef) {
        $_SESSION['status'] = "Data Success";
        header("Location: add-contact.php");
    } else {
        $_SESSION['status'] = "Data Fail";
        header("Location: add-contact.php");
    }
}
