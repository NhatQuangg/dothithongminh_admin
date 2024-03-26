<?php

namespace Data;

require_once __DIR__ . "/../../dbcon.php";

use Data\ConnectionFirebase;

class UserData
{
    public $UserContext;

    public function __construct()
    {
        $ConnectDB = new ConnectionFirebase();
        $this->UserContext = $ConnectDB->database;
    }

    public function getAllUsers()
    {
        $ref_table = "Users";

        $result = $this->UserContext
            ->getReference($ref_table)
            ->getValue();

        return $result;
    }

    public function deleteUser($userId)
    {
        $ref_table = "Users";

        $deleteUser = $this->UserContext
            ->getReference($ref_table)
            ->getChild($userId)
            ->remove();
    }
}
