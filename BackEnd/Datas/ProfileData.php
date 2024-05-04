<?php

namespace Data;

require_once __DIR__ . "/../../dbcon.php";

use Data\ConnectionFirebase;

class ProfileData
{
    public $ProfileContext;
    public $authContext;

    public function __construct()
    {
        $ConnectDB = new ConnectionFirebase();
        $this->ProfileContext = $ConnectDB->database;
        $this->authContext = $ConnectDB->auth;
    }

    public function updateUser($userId, $fn, $phone)
    {
        $updateData = [
            'fullname' => $fn,
            'phone' => $phone,
        ];

        $ref_table = "Users/" . $userId;

        $updatequery = $this->ProfileContext
            ->getReference($ref_table)
            ->update($updateData);

        if ($updatequery) {
            return $updatequery;
        } else {
            return null;
        }
    }

    public function getUserById($userId)
    {
        $ref_table = "Users";

        $userData = $this->ProfileContext
            ->getReference($ref_table)
            ->getChild($userId)
            ->getValue();

        if ($userData) {
            return $userData;
        } else {
            return null;
        }
    }

    public function updatePassword($userId, $newPassword)
    {
        $updateData = [
            'password' => $newPassword,
        ];

        $ref_table = "Users/" . $userId;

        $updateQuery = $this->ProfileContext
            ->getReference($ref_table)
            ->update($updateData);

        return $updateQuery;
    }

    public function getUsersAuth()
    {
        $listUsers = $this->authContext->listUsers();

        $listAuthData = [];

        foreach ($listUsers as $listUser) {
            $userData = [
                'email' => $listUser->email,
                'uid' => $listUser->uid
            ];
            $listAuthData[] = $userData;
        }

        return $listAuthData;
    }

    public function updatePasswordAuth($uid, $newPassword)
    {
        $updateNewPassword = $this->authContext->changeUserPassword($uid, $newPassword);

        return $updateNewPassword;
    }
}
