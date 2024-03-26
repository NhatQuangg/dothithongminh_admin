<?php

namespace Service;

require_once __DIR__ . "/../Datas/CategoryData.php";

use Data\CategoryData;

class CategoryService
{
    public $CategoryData;

    public function  __construct()
    {
        $this->CategoryData = new CategoryData();
    }

    public function getAllCategory()
    {
        $result = $this->CategoryData->getAllCategory();

        return $result;
    }

    public function createCategory($category_name)
    {
        $result = $this->CategoryData->createCategory($category_name);

        return $result;
    }

    public function updateCategory($categoryId, $category_name)
    {
        $result = $this->CategoryData->updateCategory($categoryId, $category_name);

        return $result;
    }

    public function deleteCategory($categoryId) 
    {
        $result = $this->CategoryData->deleteCategory($categoryId);

        return $result;
    }
}
