<?php

namespace Data;

require_once __DIR__ . "/../../dbcon.php";

use Data\ConnectionFirebase;

class UserData
{
    public $UserContext;
    public $AuthContext;

    public function __construct()
    {
        $ConnectDB = new ConnectionFirebase();
        $this->UserContext = $ConnectDB->database;
        $this->AuthContext = $ConnectDB->auth;
    }

    public function getAllUsers()
    {
        $ref_table = "Users";

        $result = $this->UserContext
            ->getReference($ref_table)
            ->getValue();

        return $result;
    }

    public function updateUser($userId, $un, $fn, $pw, $phone, $level, $flag)
    {
        if ($flag == 1) {
            $uid = $this->getUidByEmail($un);
            $updateAuth = $this->updateAuth($uid, $pw);
        }

        $updateData = [
            'email' => $un,
            'fullname' => $fn,
            'password' => $pw,
            'phone' => $phone,
            'level' => $level,
        ];

        $ref_table = "Users/" . $userId;

        $updatequery = $this->UserContext
            ->getReference($ref_table)
            ->update($updateData);

        if ($updatequery) {
            return $updatequery;
        } else {
            return null;
        }
    }

    public function updateAuth($uid, $pw)
    {
        $this->AuthContext->updateUser($uid, ['password' => $pw]);
        return true;
    }

    public function getUidByEmail($un)
    {
        $userRecord = $this->AuthContext->getUserByEmail($un);

        echo $userRecord->uid;

        return $userRecord->uid;
    }

    public function deleteUser($userId, $email, $flagg)
    {

        $deleteReflect = $this->deleteReflectsByUserId($userId);

        if ($flagg == 1) {
            $uid = $this->getUidByEmail($email);
            $this->deleteAuthUser($uid);
        }   

        $ref_table = "Users";

        $deleteUser = $this->UserContext
            ->getReference($ref_table)
            ->getChild($userId)
            ->remove();

        return $deleteUser;
    }

    public function getReflectsByUserId($userId)
    {
        $ref_table = "Reflects";

        $allReflects = $this->UserContext->getReference($ref_table)->getValue();
        $filteredReflects = [];

        if ($allReflects) {
            foreach ($allReflects as $reflectId => $reflectData) {
                if (isset($reflectData['id_user']) && $reflectData['id_user'] == $userId) {
                    $filteredReflects[] = $reflectId;
                }
            }
        }
        return $filteredReflects;
    }

    public function deleteReflectsByUserId($userId)
    {
        $reflectIds = $this->getReflectsByUserId($userId);

        $ref_table = "Reflects";

        foreach ($reflectIds as $reflectId) {
            $this->UserContext
                ->getReference($ref_table . '/' . $reflectId)
                ->remove();
        }
    }

    public function deleteAuthUser($uid)
    {
        $this->AuthContext->deleteUser($uid);
        return true;
    }

    public function createUser($newun, $newfn, $newpw, $newphone, $newlevel, $value)
    {

        $userExists = false;

        // $listUsers = $this->AuthContext->listUsers();

        // foreach ($listUsers as $userRecord) {
        //     if ($userRecord->email === $newun) {
        //         $userExists = true;
        //         break;
        //     } 
        // }

        $allUsers = $this->getAllUsers();

        foreach ($allUsers as $allUsersId => $usersData) {
            if ($usersData['email'] === $newun) {
                $userExists = true;
                break;
            }
        }

        if ($userExists) {
            return false;
        }

        if ($value == 1) {
            $auth = $this->createAuth($newun, $newpw);
        }

        $ref_table = "Users";

        $postData = [
            'email' => $newun,
            'fullname' => $newfn,
            'level' => $newlevel,
            'password' => $newpw,
            'phone' => $newphone,
        ];

        $postRef = $this->UserContext
            ->getReference($ref_table)
            ->push($postData);

        if ($postRef) {
            echo 'tc';
        }

        return true;
    }

    public function createAuth($newun, $newpw)
    {
        $userProperties = [
            'email' => $newun,
            'password' => $newpw,
        ];

        $result = $this->AuthContext->createUser($userProperties);

        return $result;
    }
}
