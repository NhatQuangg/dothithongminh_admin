<?php

namespace App\Controllers;

require_once __DIR__ . "/../Services/UserService.php";
require_once __DIR__ . "/Controller.php";

use Service\UserService;
use App\Controllers\Controller;
use GuzzleHttp\Promise\Is;

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

                $userData = $userLogin['userData'];
                $userId = $userLogin['userId'];

                if ($userLogin != null) {
                    $_SESSION["USER_LOGED"] = array('userData' => $userData, 'userId' => $userId);
                    header("Location: /dothithongminh_admin/home");
                } else {
                    $_SESSION["LOGIN_FAIL"] = "Thất bại";
                    header("Location: /dothithongminh_admin/");
                }
            }
            if (isset($_POST['delete_btn'])) {
                $userId = $_POST['userId'];
                $email = $_POST['email'];

                // is @gmail.com
                if (strpos($email, '@gmail.com') !== false) {
                    $flagg = 1;
                    $delete = $service->deleteUser($userId, $email, $flagg);
                    
                    // if ($delete != null) {
                    //     $_SESSION["DELETE_SUCCESS"] = "Thành công";
                    //     header("Location: /dothithongminh_admin/user");
                    // } else {
                    //     $_SESSION["DELETE_FAIL"] = "Thất bại";
                    //     header("Location: /dothithongminh_admin/user");
                    // }
                } else {
                    $flagg = 2;
                    $delete = $service->deleteUser($userId, $email, $flagg);

                    if ($delete != null) {
                        $_SESSION["DELETE_SUCCESS"] = "Thành công";
                        header("Location: /dothithongminh_admin/user");
                    } else {
                        $_SESSION["DELETE_FAIL"] = "Thất bại";
                        header("Location: /dothithongminh_admin/user");
                    }
                }
            }
            if (isset($_POST['update_btn'])) {
                $userId = $_POST['txtmtk'];
                $un = $_POST['txttdn'];
                $fn = $_POST['txthoten'];
                $pw = $_POST['txtmk'];
                $phone = $_POST['txtphone'];
                $level = $_POST['txtlevel'];

                $flag = 0;
                if ($userId != null && $un != null && $pw != null && $level != null) {
                    if (strlen($pw) >= 6) {
                        // is @gmail.com
                        if (strpos($un, '@gmail.com') !== false) {
                            // level = 2 : customer
                            $flag = 1;
                            $updateUser = $service->updateUser($userId, $un, $fn, $pw, $phone, $level, $flag);

                            if ($updateUser != null) {
                                $_SESSION["UPDATE_SUCCESS"] = "Thành công";
                                header("Location: /dothithongminh_admin/user");
                            } else {
                                $_SESSION["UPDATE_FAIL"] = "Thất bại";
                                header("Location: /dothithongminh_admin/user");
                            }
                            // not @gmail.com
                        } else {
                            if ($level != 2) {
                                $updateUser = $service->updateUser($userId, $un, $fn, $pw, $phone, $level, $flag);

                                if ($updateUser != null) {
                                    $_SESSION["UPDATE_SUCCESS"] = "Thành công";
                                    header("Location: /dothithongminh_admin/user");
                                } else {
                                    $_SESSION["UPDATE_FAIL_NOT_GMAIL"] = "Thất bại";
                                    header("Location: /dothithongminh_admin/user");
                                }
                            } else {
                                $_SESSION["UPDATE_FAIL_LEVEL"] = "Fail";
                                header("Location: /dothithongminh_admin/user");
                            }
                        }
                    } else {
                        $_SESSION["UPDATE_FAIL_PASSWORD"] = "Fail Pass";
                        header("Location: /dothithongminh_admin/user");
                    }
                } else {
                    $_SESSION["UPDATE_ERROR"] = "Error";
                    header("Location: /dothithongminh_admin/user");
                }
            }
            if (isset($_POST['create_btn'])) {
                $newun = $_POST['newun'];
                $newfn = $_POST['newfn'];
                $newpw = $_POST['newpass'];
                $newphone = $_POST['newphone'];
                $newlevel = $_POST['newlevel'];

                $value = 0;
                if ($newun != null && $newpw != null && $newlevel != null) {
                    if (strpos($newun, ' ') !== false) {
                        $_SESSION["CREATE_ERROR_SPACE"] = "Space";
                        header("Location: /dothithongminh_admin/user");
                    } else {
                        if (strlen($newpw) >= 6) {
                            // is @gmail.com
                            if (strpos($newun, '@gmail.com') !== false) {
                                $value = 1;
                                $createAuth = $service->create($newun, $newfn, $newpw, $newphone, $newlevel, $value);
                                if ($createAuth) {
                                    $_SESSION["CREATE_SUCCESSFUL"] = "Successful";
                                    header("Location: /dothithongminh_admin/user");
                                } else {
                                    $_SESSION["CREATE_ERROR_EXIST"] = "ERROR";
                                    header("Location: /dothithongminh_admin/user");
                                }
                                // not @gmail.com
                            } else {
                                if ($newlevel != 2) {
                                    $value = 2;
                                    $createAuth = $service->create($newun, $newfn, $newpw, $newphone, $newlevel, $value);
                                    if ($createAuth) {
                                        $_SESSION["CREATE_SUCCESSFUL"] = "Successful";
                                        header("Location: /dothithongminh_admin/user");
                                    } else {
                                        $_SESSION["CREATE_ERROR_EXIST"] = "ERROR";
                                        header("Location: /dothithongminh_admin/user");
                                    }
                                } else {
                                    $_SESSION["CREATE_ERROR_LEVEL"] = "Level";
                                    header("Location: /dothithongminh_admin/user");
                                }
                            }
                        } else {
                            $_SESSION["CREATE_ERROR_<6"] = "Error";
                            header("Location: /dothithongminh_admin/user");
                        }
                    }
                } else {
                    $_SESSION["CREATE_ERROR_EMPTY"] = "Empty";
                    header("Location: /dothithongminh_admin/user");
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
