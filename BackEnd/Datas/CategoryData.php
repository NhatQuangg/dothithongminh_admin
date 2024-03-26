<?php

namespace Data;

require_once __DIR__ . "/../../dbcon.php";

use Data\ConnectionFirebase;

class CategoryData
{
    public $CategoryContext;
    public $ReflectContext;

    public function __construct()
    {
        $ConnectDB = new ConnectionFirebase();
        $this->CategoryContext = $ConnectDB->database;
    }

    public function getAllCategory()
    {
        $ref_table = "Category";

        $result = $this->CategoryContext
            ->getReference($ref_table)
            ->getValue();

        return $result;
    }

    public function createCategory($category_name)
    {
        $categoryExists = false;

        $allCategory = $this->getAllCategory();

        foreach ($allCategory as $categoryId => $categoryData) {
            if ($categoryData['category_name'] === $category_name) {
                $categoryExists = true;
                break;
            }
        }

        if ($categoryExists) {
            return false;
        }

        $ref_table = "Category";

        $postData = [
            'category_name' => $category_name,
        ];

        $postRef = $this->CategoryContext
            ->getReference($ref_table)
            ->push($postData);

        return true;
    }

    public function updateCategory($categoryId, $category_name)
    {
        $categoryExists = false;

        $allCategories = $this->getAllCategory();

        foreach ($allCategories as $id => $categoryData) {
            // Nếu tên loại mới trùng với tên của một loại loại khác (nếu có)
            if ($categoryData['category_name'] === $category_name && $id !== $categoryId) {
                return false; // Không thực hiện cập nhật
            }
        }

        // var_dump($categoryExists);
        // var_dump($flag);
        
        // if ($categoryExists == true) {
        //     return false;
        // }

        $ref_table = "Category/" . $categoryId;

        $updateData = [
            'category_name' => $category_name,
        ];

        $updatequery = $this->CategoryContext
            ->getReference($ref_table)
            ->update($updateData);

        return true;
    }


    public function deleteCategory($categoryId)
    {

        $allReflects = $this->CategoryContext
            ->getReference("Reflects")
            ->getValue();

        foreach ($allReflects as $reflectId => $reflectData) {
            if ($reflectData['id_category'] == $categoryId) {
                $this->deleteReflect($reflectId);
            }
        }

        $ref_table = "Category/" . $categoryId;

        $deleteData = $this->CategoryContext
            ->getReference($ref_table)
            ->remove();

        return $deleteData;
    }

    public function deleteReflect($reflectId)
    {
        $ref_table = "Reflects";

        $deleteReflect = $this->CategoryContext
            ->getReference($ref_table)
            ->getChild($reflectId)
            ->remove();
    }
}
