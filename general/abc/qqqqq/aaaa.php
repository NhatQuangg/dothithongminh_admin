<?php

// namespace Data;

// require_once __DIR__ . "/../../dbcon.php";

// use Data\ConnectionFirebase;

// class UserData
// {
//     public $usercontext;

//     public function __construct()
//     {
//         $connectFB = new ConnectionFirebase();
//         $this->usercontext = $connectFB->database;
//     }

//     public function getCountListUser()
//     {
//         $ref_table = "contact";

//         $totalnum = $this->usercontext
//             ->getReference($ref_table)
//             ->getSnapshot()
//             ->numChildren();

//         return $totalnum;
//     }

//     public function getListUser()
//     {
//         $ref_table = "contact";

//         $result = $this->usercontext
//             ->getReference($ref_table)
//             ->getValue();

//         return $result;
//     }

//     public function deleteUser($userID)
//     {
//         $ref_table = "contact/" . $userID;
//         $deleteData = $this->usercontext
//             ->getReference($ref_table)
//             ->remove();

//         return $deleteData;
//     }

//     public function getDetailUser($userID)
//     {
//         $ref_table = "contact/" . $userID;

//         $detailUser = $this->usercontext
//             ->getReference($ref_table)
//             ->getValue();

//         return $detailUser;
//     }
// }
