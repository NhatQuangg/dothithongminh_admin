<?php

namespace Data;

require_once __DIR__ . "/../../dbcon.php";

use Data\ConnectionFirebase;

class ReflectData
{
    public $ReflectContext;

    public function __construct()
    {
        $ConnectDB = new ConnectionFirebase();
        $this->ReflectContext = $ConnectDB->database;
    }

    public function getAllReflects()
    {
        $ref_table = "Reflects";

        $allReflects = $this->ReflectContext
            ->getReference($ref_table)
            ->getValue();

        if (!empty($allReflects)) {
            foreach ($allReflects as $reflectId => $reflectData) {
                // get id_user in reflect
                $userId = $reflectData['id_user'];
                $categoryId = $reflectData['id_category'];

                $email = $this->getEmailByUserId($userId);
                $categoryName = $this->getCategoryNameByCategoryId($categoryId);

                $allReflects[$reflectId]['email'] = $email;
                $allReflects[$reflectId]['category_name'] = $categoryName;
            }
        }

        return $allReflects;
    }

    public function getReflectByReflectId($reflectId)
    {
        // echo $reflectId;
        $ref_table = "Reflects";

        $detailReflect = $this->ReflectContext
            ->getReference($ref_table)
            ->getChild($reflectId)
            ->getValue();

        $mediaUrls = [];

        if ($detailReflect && isset($detailReflect['media'])) {
            $media = $detailReflect['media'];

            if (is_array($media)) {
                // Nếu media đã là một mảng, sử dụng trực tiếp
                $mediaArray = $media;
            } else {
                // Nếu media là một chuỗi JSON, chuyển đổi thành mảng
                $mediaArray = json_decode($media, true);
            }

            // Lặp qua mảng media để lấy các đường dẫn
            foreach ($mediaArray as $mediaUrl) {
                $mediaUrls[] = $mediaUrl;
            }
        }
        // foreach ($mediaUrls as $mediaUrl) {
        //     echo "<img src=\"$mediaUrl\" alt=\"\">";
        // }

        // return $mediaUrls;

        $reflectData = [];

        if ($detailReflect) {
            $userId = $detailReflect['id_user'];
            $categoryId = $detailReflect['id_category'];

            $email = $this->getEmailByUserId($userId);
            $categoryName = $this->getCategoryNameByCategoryId($categoryId);

            $reflectData[] = [
                'accept' => $detailReflect['accept'],
                'address' => $detailReflect['address'],
                'content' => $detailReflect['content'],
                'contentfeedback' => $detailReflect['contentfeedback'],
                'createdAt' => $detailReflect['createdAt'],
                'handle' => $detailReflect['handle'],
                'media' => $mediaUrls, 
                'title' => $detailReflect['title'],
                'category_name' => $categoryName,
                'email' => $email,
            ];
        }
        return $reflectData;
    }

    public function getEmailByUserId($userId)
    {
        $ref_table = "Users";

        $userData = $this->ReflectContext
            ->getReference($ref_table)
            ->getChild($userId)
            ->getValue();

        if ($userData && isset($userData['email'])) {
            return $userData['email'];
        } else {
            return "Email không tồn tại";
        }
    }

    public function getCategoryNameByCategoryId($categoryId)
    {
        $ref_table = "Category";

        $categoryData = $this->ReflectContext
            ->getReference($ref_table)
            ->getChild($categoryId)
            ->getValue();

        if ($categoryData && isset($categoryData['category_name'])) {
            return $categoryData['category_name'];
        } else {
            return "Category không tồn tại";
        }
    }
}
