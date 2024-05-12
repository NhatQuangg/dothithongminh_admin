<?php

namespace App\Controllers;

require_once __DIR__ . "/../Services/ProfileService.php";
require_once __DIR__ . "/Controller.php";

use App\Controllers\Controller;
use Service\ProfileService;

class ProfileController extends Controller
{
    public function __construct()
    {
    }
    public function GateWay()
    {
        if (!isset($_SESSION['USER_LOGED'])) {
            header("Location: /dothithongminh_admin/");
        } else {
            $method = $_SERVER["REQUEST_METHOD"];
            $service = new ProfileService();

            if ($method == "POST") {
                if (isset($_POST['update_btn'])) {
                    $fn = $_POST['txtfn'];
                    $phone = $_POST['txtphone'];
                    $id = $_POST['user_id'];

                    $update = $service->updateUser($id, $fn, $phone);

                    if ($update != null) {
                        $_SESSION["UPDATE_SUCCESS"] = $update;
                        header("Location: /dothithongminh_admin/profile");
                    } else {
                        $_SESSION["UPDATE_FAIL"] = "Thất bại";
                        header("Location: /dothithongminh_admin/profile");
                    }
                }
                if (isset($_POST['change_pass_btn'])) {
                    $currentpw = $_POST['txtpass'];
                    $npw = $_POST['txtnewpass'];
                    $rnpw = $_POST['txtrenewpass'];
                    $pass = $_POST['pass'];
                    $userId = $_POST['user_id'];
                    $email = $_POST['email'];
                    $uid = $_POST['uid'];

                    $flag = false;

                    $listUsersAuths = $service->getUsersAuth();

                    foreach ($listUsersAuths as $listUsersAuth) {
                        if ($email === $listUsersAuth['email']) {
                            $flag = true;
                        }
                    }

                    if ($flag) {
                        if ($currentpw === $pass) {
                            if ($npw === $rnpw) {
                                if (strlen($npw) < 6) {
                                    $_SESSION['rule_password'] = "Fail";
                                    echo "1";
                                    header("Location: profile");
                                } else {
                                    $updateNewPass = $service->updatePassword($userId, $npw);
                                    $updateNewPassAuth = $service->updatePasswordAuth($uid, $npw);

                                    if ($updateNewPass && $updateNewPassAuth) {
                                        $_SESSION['update_success'] = "Successful";
                                        header("Location: profile");
                                    } else {
                                        $_SESSION['update_fail'] = "Fail";
                                        header("Location: profile");
                                    }
                                }
                            } else {
                                $_SESSION['npw_not_rnpw'] = "Fail";
                                echo "4";
                                header("Location: profile");
                            }
                        } else {
                            $_SESSION['pw_not_pass'] = "Fail";
                            echo "5";
                            header("Location: profile");
                        }
                    } else {
                        if ($currentpw === $pass) {
                            if ($npw === $rnpw) {
                                if (strlen($rnpw) < 6) {
                                    $_SESSION['rule_password'] = "Fail";
                                    echo "1";
                                    header("Location: profile");
                                } else {
                                    $update = $service->updatePassword($userId, $npw);

                                    if ($update) {
                                        $_SESSION['update_success'] = "Successful";
                                        echo "6";
                                        header("Location: profile");
                                    } else {
                                        $_SESSION['update_fail'] = "Fail";
                                        echo "7";
                                        header("Location: profile");
                                    }
                                }
                            } else {
                                $_SESSION['npw_not_rnpw'] = "Fail";
                                echo "8";
                                header("Location: profile");
                            }
                        } else {
                            $_SESSION['pw_not_pass'] = "Fail";
                            echo "9";
                            header("Location: profile");
                        }
                    }
                }
            }
            if ($method == "GET") {
                $user = $_SESSION["USER_LOGED"];
                $userData = $user['userData'];
                $userId = $user['userId'];
                $uid = "";

                echo $userData['email'];
                $listUsersAuths = $service->getUsersAuth();

                foreach ($listUsersAuths as $listUsersAuth) {
                    if ($userData['email'] === $listUsersAuth['email']) {
                        $uid = $listUsersAuth['uid'];
                    }
                }

                $profileUser = $service->getUserById($userId);

                include __DIR__ . "/../../FrontEnd/Views/Profiles/Profile.php";
            }
        }
    }
}

$run = new ProfileController();
$run->GateWay();
