<?php

namespace App\Controller;

use App\Model\HoadonModel;
use App\Controller;

class HoadonController extends Controller
{
    private $hoadonModel;

    public function __construct()
    {
        $this->hoadonModel = new HoadonModel();
    }

    public function index(){
        $this->render('hoadons\index', []);
    }

    public function hoadonchuaxacnhanList()
    {
        // Fetch all users and display them in a view
        $hoadons = $this->hoadonModel->getAllHoadonschuaXacnhan();
        $this->render('hoadons\hoadon-list', ['hoadons' => $hoadons]);
    }

    public function hoadondaxacnhanList()
    {
        // Fetch all users and display them in a view
        $hoadons = $this->hoadonModel->getAllHoadonsdaXacnhan();
        $this->render('hoadons\hoadondaxacnhan', ['hoadons' => $hoadons]);
    }

    public function update($mahoadon)
    {
        // Handle form submission to update a user
        $hoadon = $this->hoadonModel->updateXacnhan($mahoadon);
        if ($hoadon) {
            $this->hoadonModel->updatesoluong($mahoadon);
            // Redirect to the user list page or show a success message
            header('Location: /index.php');
            exit();
        } else {
            // Handle the case where the user creation failed
            echo 'update xac nhan failed.';
        }
    }

    public function delete($mahoadon)
    {
        // Call the model to delete the user
        
        $this->hoadonModel->deletehoadon($mahoadon);
        header('Location: /hoadon/hoadondaxacnhanList');
    }

    public function deleteall()
    {
        // Call the model to delete the user
        
        $this->hoadonModel->deleteallhoadon();
        header('Location: /hoadon/hoadondaxacnhanList');
    }
}
