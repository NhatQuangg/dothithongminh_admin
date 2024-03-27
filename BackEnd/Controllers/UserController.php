<?php

namespace App\Controllers;

require_once __DIR__ . "/../Services/UserService.php";
require_once __DIR__ . "/Controller.php";

use Service\UserService;
use App\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
    }
    public function GateWay()
    {


        $method = $_SERVER["REQUEST_METHOD"];
        $service = new UserService();

        if ($method == "POST") {
            if (isset($_POST["login_btn"])) {
                $un = $_POST["username"];
                $pw = $_POST["password"];

                $userLogin = $service->Login($un, $pw);
                if ($userLogin != null) {
                    $_SESSION["USER_LOGED"] = $userLogin;
                    header("Location: /dothithongminh_admin/home");
                } else {
                    $_SESSION["LOGIN_FAIL"] = "Thất bại";
                    header("Location: /dothithongminh_admin/");
                }
            }
            if (isset($_POST['delete_btn'])) {
                $userId = $_POST['userId'];
                echo $userId;
            }
            if (isset($_POST['update_btn'])) {
                $userId = $_POST['txtmtk'];
                $un = $_POST['txttdn'];
                $fn = $_POST['txthoten'];
                $pw = $_POST['txtmk'];
                $phone = $_POST['txtphone'];
                $level = $_POST['txtlevel'];

                // echo $userId . "<br>" . $un . "<br>" . $fn . "<br>" . $pw . "<br>" . $phone . "<br>" . $level;
                $updateUser = $service->updateUser($userId, $un, $fn, $pw, $phone, $level);

                if ($updateUser != null) {
                    $_SESSION["UPDATE_SUCCESS"] = "Thành công";
                    header("Location: /dothithongminh_admin/user");
                } else {
                    $_SESSION["UPDATE_FAIL"] = "Thất bại";
                    header("Location: /dothithongminh_admin/home");
                }
            }
        }
        if ($method == "GET") {
            if (!isset($_SESSION['USER_LOGED'])) {
                header("Location: /dothithongminh_admin/");
            }
            if (isset($_GET["logout"])) {
                unset($_SESSION['USER_LOGED']);
                header("Location: /dothithongminh_admin/");
            }

            $allUsers = $service->getAllUsers();

            include __DIR__ . "/../../FrontEnd/Views/Users/User.php";
        }
    }
}
$run = new UserController();
$run->GateWay();
