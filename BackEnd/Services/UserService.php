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

        // 0: admin
        // 1: nhanvien
        // 2: user
        foreach ($users as $userId => $userData) {
            if ($userData['email'] == $username && $userData["password"] == $password && ($userData['level'] == 0 || $userData['level'] == 1)) {
                // return $userData;
                return array('userData' => $userData, 'userId' => $userId);
            }
        }
        return null;
    }

    public function getAllUsers()
    {
        $result = $this->UserData->getAllUsers();

        return $result;
    }

    public function updateUser($userId, $un, $fn, $pw, $phone, $level, $flag)
    {
        $result = $this->UserData->updateUser($userId, $un, $fn, $pw, $phone, $level, $flag);

        return $result;
    }

    public function create($newun, $newfn, $newpw, $newphone, $newlevel, $value)
    {
        $user = $this->UserData->createUser($newun, $newfn, $newpw, $newphone, $newlevel, $value);

        return $user;
    }

    public function deleteUser($userId, $email, $flagg)
    {
        $result = $this->UserData->deleteUser($userId, $email, $flagg);

        return $result;
    }
}
