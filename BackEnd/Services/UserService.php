<?php

namespace Service;

require_once __DIR__ . "/../Datas/UserData.php";

use Data\UserData;

class UserService
{
    public $UserData;
    public function  __construct()
    {
        $this->UserData = new UserData();
    }

    public function Login($username, $password)
    {
        $users = $this->UserData->getAllUsers();

        foreach ($users as $userId => $userData) {
            if ($userData['email'] == $username && $userData["password"] == $password) {
                return $userData;
            }
        }
        return null;
    }

    public function getAllUsers()
    {
        $result = $this->UserData->getAllUsers();

        return $result;
    }
}
