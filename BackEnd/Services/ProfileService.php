<?php

namespace Service;

require_once __DIR__ . "/../Datas/ProfileData.php";

use Data\ProfileData;

class ProfileService
{
    public $ProfileData;

    public function  __construct()
    {
        $this->ProfileData = new ProfileData();
    }

    
    public function updateUser($userId, $fn, $phone)
    {
        $result = $this->ProfileData->updateUser($userId, $fn, $phone);

        return $result;
    }

    public function getUserById($userId)
    {
        $result = $this->ProfileData->getUserById($userId);

        return $result;
    }

    public function updatePassword($userId, $newPassword)
    {
        $result = $this->ProfileData->updatePassword($userId, $newPassword);

        return $result;
    }

    public function updatePasswordAuth($uid, $newPassword)
    {
        $result = $this->ProfileData->updatePasswordAuth($uid, $newPassword);

        return $result;
    }

    public function getUsersAuth()
    {
        $result = $this->ProfileData->getUsersAuth();

        return $result;
    }
}
