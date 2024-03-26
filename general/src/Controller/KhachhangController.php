<?php

namespace App\Controller;

use App\Controller;
use App\Model\KhachhangModel;

class KhachhangController extends Controller
{
    private $khachhangModel;

    public function __construct()
    {
        $this->khachhangModel = new KhachhangModel();
    }

    public function index()
    {
        $this->render('khachhangs\index', []);
    }

    public function khachhanglist()
    {
        // Fetch all users and display them in a view
        $khachhangs = $this->khachhangModel->getkhachhang();
        $this->render('khachhangs\khachhang-list', ['khachhangs' => $khachhangs]);
    }

    public function show($makhachhang)
    {
        $khachhang = $this->khachhangModel->getkhachhangById($makhachhang);
        $this->render('khachhangs\khachhang-form', ['khachhang' => $khachhang]);
    }

    public function update($makhachhang)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processFormUpdate($makhachhang);
        } else {
            $khachhang = $this->khachhangModel->getkhachhangById($makhachhang);
            $this->render('khachhangs\khachhang-form', ['khachhang' => $khachhang]);
        }
    }

    private function processFormUpdate($makhachhang)
    {
        $makhachhang =  $_POST['makhachhang'];
        $hotenkh =  $_POST['hotenkh'];
        $diachikh =  $_POST['diachikh'];
        $sodienthoaikh =  $_POST['sodienthoaikh'];
        $emailkh =  $_POST['emailkh'];
        $tendangnhapkh =  $_POST['tendangnhapkh'];
        $matkhaukh =  $_POST['matkhaukh'];

        // Call the model to create a new user
        $khachhang = $this->khachhangModel->updatekhachhang($makhachhang, $hotenkh, $diachikh, $sodienthoaikh, $emailkh, $tendangnhapkh, $matkhaukh);

        if ($khachhang) {
            header('Location: /khachhang/khachhanglist');
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
            $this->render('khachhangs\khachhang-list', ['khachhang' => []]);
        }
    }

    private function processForm()
    {
        $makhachhang =  $_POST['makhachhang'];
        $hotenkh =  $_POST['hotenkh'];
        $diachikh =  $_POST['diachi'];
        $sodienthoaikh =  $_POST['sodienthoaikh'];
        $emailkh =  $_POST['emailkh'];
        $tendangnhapkh =  $_POST['tendangnhapkh'];
        $matkhaukh =  $_POST['matkhaukh'];
        // Call the model to create a new user
        $khachhang = $this->khachhangModel->addkhachhang($makhachhang, $hotenkh, $diachikh, $sodienthoaikh, $emailkh, $tendangnhapkh, $matkhaukh);

        if ($khachhang) {
            // Redirect to the user list page or show a success message
            header('Location: /khachhang/khachhanglist');
            exit();
        } else {
            // Handle the case where the user creation failed
            echo 'User creation failed.';
        }
    }



    public function delete($makhachhang)
    {
        $this->khachhangModel->deletekhachhang($makhachhang);
        header('Location: /kh/khachhanglist'); // Chuyển hướng về trang danh sách sản phẩm sau khi xóa
    }
}
