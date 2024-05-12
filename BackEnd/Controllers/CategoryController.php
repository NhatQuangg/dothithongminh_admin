<?php

namespace App\Controllers;

require_once __DIR__ . "/../Services/CategoryService.php";
require_once __DIR__ . "/Controller.php";

use Service\CategoryService;

use App\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
    }
    public function GateWay()
    {
        if (!isset($_SESSION['USER_LOGED'])) {
            header("Location: /dothithongminh_admin/");
        }

        $method = $_SERVER["REQUEST_METHOD"];
        $service = new CategoryService();

        // echo $method;
        if ($method == "POST") {

            if (isset($_POST['delete_btn'])) {
                $categoryId = $_POST['categoryId'];

                $deleteCategory = $service->deleteCategory($categoryId);

                if ($deleteCategory) {
                    echo "haha";
                    $_SESSION['delete_success'] = "Xóa danh mục thành công";
                    header("Location: category");
                } else {
                    $_SESSION['delete_fail'] = "Xóa danh mục thất bại";
                    header("Location: category");
                }
            }
            if (isset($_POST['create_btn'])) {
                $category_name = $_POST['txtcategory'];

                if (strlen($category_name) == null) {
                    $_SESSION['create_empty'] = "Vui lòng không để trống !";
                    header("Location: category");
                } else {
                    $createCategory = $service->createCategory($category_name);

                    if ($createCategory) {
                        $_SESSION['create_success'] = "Tạo danh mục thành công";
                        header("Location: category");
                    } else {
                        $_SESSION['create_fail'] = "Tên danh mục đã tồn tại";
                        header("Location: category");
                    }
                }
            }
            if (isset($_POST['update_btn'])) {
                $categoryId = $_POST['selectedCategoryId'];
                $category_name = $_POST['txtcategory'];

                if (strlen($category_name) == null) {
                    $_SESSION['update_empty'] = "Vui lòng không để trống !";
                    header("Location: category");
                } else {
                    $updateCategory = $service->updateCategory($categoryId, $category_name);

                    if ($updateCategory) {
                        // echo "thanh cong";
                        $_SESSION['update_success'] = "Cập nhật thành công";
                        header("Location: category");
                    } else {
                        // echo "that bai";
                        $_SESSION['update_fail'] = "Cập nhật thất bại !";
                        header("Location: category");
                    }
                }
            }
        } else 
        if ($method == "GET") {
            echo $method;

            $allCategory = $service->getAllCategory();

            include __DIR__ . "/../../FrontEnd/Views/Categories/Category.php";
        }
    }
}
$run = new CategoryController();
$run->GateWay();
