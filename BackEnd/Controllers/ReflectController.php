<?php

namespace App\Controllers;

require_once __DIR__ . "/../Services/ReflectService.php";
require_once __DIR__ . "/Controller.php";

use App\Controllers\Controller;
use Service\ReflectService;

class ReflectController extends Controller
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
        $service = new ReflectService();

        if($method == "POST") {
            echo "post";
        }
        if($method == "GET") {
            if (isset($_GET['detail'])) {
                $reflectId = $_GET['detail'];
                
                $detailReflect = $service->getReflectByReflectId($reflectId);

                // foreach ($detailReflect as $reflect) {
                //     // In ra tiêu đề của phản ánh
                //     echo "<h1>Tiêu đề: " . $reflect['title'] . "</h1>";
                //     // In ra nội dung của phản ánh
                //     echo "<p>Nội dung: " . $reflect['content'] . "</p>";
                //     // In ra email của người dùng
                //     echo "<p>Email: " . $reflect['email'] . "</p>";
                //     // In ra tên của danh mục
                //     echo "<p>Danh mục: " . $reflect['category_name'] . "</p>";
        
                //     // Hiển thị phương tiện truyền thông
                //     foreach ($reflect['media'] as $mediaUrl) {
                //         // Kiểm tra nếu là ảnh
                //         if (strpos($mediaUrl, '.jpg') !== false || strpos($mediaUrl, '.jpeg') !== false || strpos($mediaUrl, '.png') !== false || strpos($mediaUrl, '.gif') !== false) {
                //             echo "<img src=\"$mediaUrl\" alt=\"\">";
                //         }
                //         // Kiểm tra nếu là video
                //         else if (strpos($mediaUrl, '.mp4') !== false || strpos($mediaUrl, '.avi') !== false || strpos($mediaUrl, '.mov') !== false || strpos($mediaUrl, '.wmv') !== false) {
                //             echo "<video controls><source src=\"$mediaUrl\" type=\"video/mp4\"></video>";
                //         }
                //     }
                // }
                include __DIR__ . "/../../FrontEnd/Views/Details/Details.php";
                
            }
        }

    }
}

$run = new ReflectController();
$run->GateWay();
