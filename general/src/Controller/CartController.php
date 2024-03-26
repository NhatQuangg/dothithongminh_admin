<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Model\CartModel;
use App\Controller;

class CartController extends Controller
{
    private $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    public function index()
    {
        $this->render('giohangs\index', []);
    }

    public function ctghchuaxacnhanList($makhachhang)
    {
        $magiohang = $this->cartModel->getMaGioHang($makhachhang);

        $ctghs = $this->cartModel->getAllCtghChuaXacNhan($makhachhang);

        $mgh = $magiohang['magiohang'];
        
        $machitietgiohangs = $this->cartModel->getMaChiTietGioHang($mgh);

        $tongtien = $this->cartModel->calculateTotalPrice($mgh);

        // echo var_dump($tongtien);
        $total = $tongtien['total'];

        $this->cartModel->updateTotalPriceForCart($mgh, $total);

        $data = ['ctghs' => $ctghs, 'magiohang' => $magiohang, 'machitietgiohangs' => $machitietgiohangs, 'tongtien' => $tongtien];

        $this->render('cart\cart', $data);
    }

    public function orderItem($makhachhang)
    {
        $mgh = $_POST['mgh'];

        $tongtien = $this->cartModel->calculateTotalPrice_2($mgh);

        $total = $tongtien['total'];

        $mahoadon = $this->cartModel->insertHoaDon($makhachhang, $total);

        $cthd = $this->cartModel->insertChiTietHoaDon($mahoadon, $mgh);

        $giohang = $this->cartModel->deleteChiTietGioHang($mgh);
        if ($giohang && $mahoadon && $cthd && $giohang) {
            header("Location: ../index");
            exit();
        } else {
            echo 'update xac nhan failed.';
        }
    }

    public function deleteCart()
    {
        $mgh = $_POST['mgh'];
        $this->cartModel->deleteChiTietGioHang($mgh);
        header("Location: ../index");
    }

    public function deleteOne($masanpham, $magiohang, $makhachhang, $machitietgiohang)
    {
        //$machitietgiohang = $this->cartModel->getMaChiTietGioHang_2($magiohang, $machitietgiohang);
        //$mctgh = $machitietgiohang['machitietgiohang'];

        $this->cartModel->deleteOne($masanpham, $magiohang, $makhachhang, $machitietgiohang);

        header("Location: /ctgh/$makhachhang");
    }

    public function insertProductToCart($masanpham, $makhachhang)
    {

        $magiohang = $this->cartModel->getMaGioHang($makhachhang);

        $product = $this->cartModel->getAllProductInCart($masanpham);

        $anh = $product['anh'];
        $tensanpham = $product['tensanpham'];
        $magiohang = $magiohang['magiohang'];

        $chitietgiohang = $this->cartModel->insertProductToDetailCart($magiohang, $masanpham, $anh, $tensanpham);


        header("Location: /ctgh/$makhachhang");
    }

    public function updateSoLuongMua($machitietgiohang, $makhachhang)
    {
        $slm = $_POST['txtsl'];

        $this->cartModel->updateSoLuongMua($machitietgiohang, $slm);

        header("Location: /ctgh/$makhachhang");
    }

}
