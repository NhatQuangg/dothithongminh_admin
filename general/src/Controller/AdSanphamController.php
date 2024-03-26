<?php

namespace App\Controller;

use App\Model\SanphamModel;
use App\Model\LoaiModel;
use App\Controller;
use App\Model\AdSanphamModel;

class AdSanphamController extends Controller
{
    private $sanphamModel;
    private $loaiModel;

    public function __construct()
    {
        $this->sanphamModel = new AdSanphamModel();
    }

    public function index(){
        $this->render('adsanphams\index', []);
    }

    public function sanphamlist()
    {
        // Fetch all users and display them in a view
        $sanphams = $this->sanphamModel->getsanpham();
        $loais = $this->sanphamModel->getloai();
        //$this->render('sanphams\sanpham-list', ['sanphams' => $sanphams]);
        $this->render('adsanphams\sanpham-list', ['sanphams' => $sanphams, 'loais' => $loais]);
    }

    public function show($masanpham)
    {
        $sanpham = $this->sanphamModel->getsanphamById($masanpham);
        $this->render('adsanphams\sanpham-form', ['sanpham' => $sanpham]);  
    }

    public function update($masanpham)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processFormUpdate($masanpham);        
        } else {
            $sanpham = $this->sanphamModel->getsanphamById($masanpham);
            $loais = $this->sanphamModel->getloai();
            $this->render('adsanphams\sanpham-form', ['sanpham' => $sanpham, 'loais' => $loais]);
        }        
    }
    
    private function processFormUpdate($masanpham){
        $masanpham =  $_POST['masanpham'];
        $tensanpham =  $_POST['tensanpham'];
        $soluong =  $_POST['soluong'];
        $gia =  $_POST['gia'];
        $anh =  $_POST['anh'];
        $ngaynhap =  $_POST['ngaynhap'];
        $tomtat =  $_POST['tomtat'];
        $thongtinsanpham =  $_POST['thongtinsanpham'];
        $maloai =  $_POST['maloai'];
        // Call the model to create a new user
        $sanpham = $this->sanphamModel->updatesanpham($masanpham, $tensanpham, $soluong, $gia, $anh, $ngaynhap, $tomtat, $thongtinsanpham, $maloai);

        if ($sanpham) {
            header('Location: /sanpham/sanphamlist');
            exit();
        } else {
            echo 'User update failed.';
        }
    }

    
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processForm();
        } else {
            $this->render('adsanphams\sanpham-list', ['sanpham' => []]);
        }  
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Kiểm tra xem tệp tin đã được chọn
            if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
                $targetDir = "assets/img/";  // Thư mục để lưu trữ tệp tin tải lên
                $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        
                // Kiểm tra nếu tệp tin đã tồn tại
                if (!file_exists($targetFile)) {
                    // Di chuyển tệp tin vào thư mục lưu trữ
                    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);
                    echo "Tải lên thành công!";
                } else {
                    echo "Tệp tin đã tồn tại.";
                }
            } else {
                echo "Có lỗi xảy ra trong quá trình tải lên.";
            }
        }
    }

    private function processForm(){
        $masanpham =  $_POST['masanpham'];
        $tensanpham =  $_POST['tensanpham'];
        $soluong =  $_POST['soluong'];
        $gia =  $_POST['gia'];
        $anh =  $_POST['anh'];
        $ngaynhap =  $_POST['ngaynhap'];
        $tomtat =  $_POST['tomtat'];
        $thongtinsanpham =  $_POST['thongtinsanpham'];
        $maloai =  $_POST['maloai'];
        // Call the model to create a new user
        $sanpham = $this->sanphamModel->addsanpham($masanpham, $tensanpham, $soluong, $gia, $anh, $ngaynhap, $tomtat, $thongtinsanpham, $maloai);

        if ($sanpham) {
            // Redirect to the user list page or show a success message
            header('Location: /sanpham/sanphamlist');
            exit();
        } else {
            // Handle the case where the user creation failed
            session_start();
            $_SESSION['message_addsp_fail'] = "Thêm sản phẩm sai";
            header('Location: /sanpham/sanphamlist');
            // echo 'User creation failed.';
        }
    }


    
    public function delete($masanpham)
    {       
        $this->sanphamModel->deletesanpham($masanpham);
        header('Location: /sanpham/sanphamlist'); // Chuyển hướng về trang danh sách sản phẩm sau khi xóa
    }
    
}
