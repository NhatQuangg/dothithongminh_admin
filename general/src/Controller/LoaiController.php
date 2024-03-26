<?php

namespace App\Controller;

use App\Model\LoaiModel;
use App\Controller;

class LoaiController extends Controller
{
    private $loaiModel;

    public function __construct()
    {
        $this->loaiModel = new LoaiModel();
    }

    public function index(){
        $this->render('loais\index', []);
    }

    public function loailist()
    {
        // Fetch all users and display them in a view
        $loais = $this->loaiModel->getloai();
        $this->render('loais\loai-list', ['loais' => $loais]);
    }

    public function show($maloai)
    {
        $loai = $this->loaiModel->getloaiById($maloai);
        $this->render('loais\loai-form', ['loai' => $loai]);  
    }

    public function update($maloai)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processFormUpdate($maloai);        
        } else {
            $loai = $this->loaiModel->getloaiById($maloai);
            $this->render('loais\loai-form', ['loai' => $loai]);
        }  
    }

    private function processFormUpdate($maloai){
        $maloai =  $_POST['maloai'];
        $tenloai =  $_POST['tenloai'];
      
        // Call the model to create a new user
        $loai = $this->loaiModel->updateloai($maloai, $tenloai);

        if ($loai) {
            header('Location: /loai/loailist');
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
            $this->render('loais\loai-list', ['loai' => []]);
        }       
    }

    private function processForm(){
        $maloai =  $_POST['maloai'];
        $tenloai =  $_POST['tenloai'];
       
        // Call the model to create a new user
        $loai = $this->loaiModel->addloai($maloai, $tenloai);

        if ($loai) {
            // Redirect to the user list page or show a success message
            header('Location: /loai/loailist');
            exit();
        } else {
            // Handle the case where the user creation failed
            session_start();
            $_SESSION['message_add_fail'] = "Thêm loại sai";
            header('Location: /loai/loailist');
            // echo 'User creation failed.';
        }
    }

    public function delete($maloai)
    {
        // Call the model to delete the user
        
        $this->loaiModel->deleteloai($maloai);
        header('Location: /loai/loailist');
    }
}
