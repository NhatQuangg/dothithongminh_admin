<?php

namespace Data;

require_once __DIR__ . "/../../dbcon.php";

use Data\ConnectionFirebase;

class StatisticData
{
    public $StatisticContext;

    public function __construct()
    {
        $ConnectDB = new ConnectionFirebase();
        $this->StatisticContext = $ConnectDB->database;
    }

    public function getAllUsers()
    {
        $ref_table = "Users";

        $result = $this->StatisticContext
            ->getReference($ref_table)
            ->getValue();

        return $result;
    }

    public function getAllCategory()
    {
        $ref_table = "Category";

        $result = $this->StatisticContext
            ->getReference($ref_table)
            ->getValue();

        return $result;
    }

    public function getCountReflectofCategory()
    {
        $categories = $this->getAllCategory();

        // Khởi tạo mảng để lưu thông tin category và số lượng reflect tương ứng
        $categoryReflectCounts = [];

        foreach ($categories as $categoryId => $categoryData) {
            $reflectCount = $this->getReflectCountByCategoryId($categoryId);

            $categoryReflectCounts[] = [
                'id_category' => $categoryId,
                'category_name' => $categoryData['category_name'],
                'reflect_count' => $reflectCount
            ];
        }

        return $categoryReflectCounts;
    }

    public function getReflectCountByCategoryId($categoryId)
    {
        $ref_table = "Reflects";
        $reflectCount = 0;

        $reflects = $this->StatisticContext
            ->getReference($ref_table)
            ->getValue();

        foreach ($reflects as $reflectId => $reflectData) {
            if ($reflectData['id_category'] === $categoryId) {
                $reflectCount++;
            }
        }

        return $reflectCount;
    }

    public function getCountReflectsOfUser($userId)
    {
        $ref_table = "Reflects";
        $reflects = $this->StatisticContext
            ->getReference($ref_table)
            ->getValue();

        // handle = 1: đã xử lý
        // handle = 0: đang xử lý
        $totalReflects = 0;
        $processedReflects = 0;
        $processingReflects = 0;
        foreach ($reflects as $reflectId => $reflectData) {
            if ($reflectData['id_user'] === $userId) {
                $totalReflects++;
                if ($reflectData['handle'] == 1) {
                    $processedReflects++;
                }
                if ($reflectData['handle'] == 0) {
                    $processingReflects++;
                }
            }
        }

        return [
            'total_reflects' => $totalReflects,
            'processed_reflects' => $processedReflects,
            'processing_reflects' => $processingReflects
        ];
    }

    public function getUsersWithReflectCounts()
    {
        $users = $this->getAllUsers();
        $usersWithReflectCounts = [];

        foreach ($users as $userId => $userData) {
            if ($userData['level'] == 2) {
                $reflectCounts = $this->getCountReflectsOfUser($userId);
                $usersWithReflectCounts[] = [
                    'id_user' => $userId,
                    'email' => $userData['email'],
                    'fullname' => $userData['fullname'],
                    'total_reflects' => $reflectCounts['total_reflects'],
                    'processed_reflects' => $reflectCounts['processed_reflects'],
                    'processing_reflects' => $reflectCounts['processing_reflects']
                ];
            }
        }

        return $usersWithReflectCounts;
    }
}
