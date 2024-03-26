<?php

namespace App\Controller;
use App\Controller;
use App\Model\SanphamModel;

class SanphamController extends Controller
{
    private $sanphamModel;

    public function __construct()
    {
        $this->sanphamModel = new SanphamModel();
    }

    public function index(){
        $this->render('sanphams\index', []);
    }

    // public function sanphamList()
    // {
    //     $sanphams = $this->sanphamModel->getAllSanpham();
    //     $this->render('sanphams\index', ['sanphams' => $sanphams]);
    // }
    
    public function sanphamList()
    {
        $sanphams = $this->sanphamModel->getAllSanpham();
        $loais = $this->sanphamModel->getloai();
        $data = ['sanphams' => $sanphams, 'loais' => $loais];
        $this->render('sanphams\index', $data);
    }

    public function timkiemList()
    {
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $keyword = $_POST["search"];

           
            $result = $this->sanphamModel->timkiemSanpham($keyword);

           
            $loais = $this->sanphamModel->getloai();
            $data = ['sanphams' => $result, 'loais' => $loais];
            $this->render('sanphams\timkiemsanpham', $data);
        } else {
           
            header("Location: /");
            exit();
        }
    }
    public function chonloaiList($maloai)
    {
        // Lấy danh sách sản phẩm theo mã loại
        $sanphams = $this->sanphamModel->laySanPhamTheoLoai($maloai);
    
        // Lấy danh sách loại sản phẩm (có thể cần sử dụng trong view)
        $loais = $this->sanphamModel->getloai();
    
        // Truyền dữ liệu vào phương thức render để hiển thị trang
        $data = ['sanphams' => $sanphams, 'loais' => $loais];
        $this->render('sanphams\index', $data);
    }
}
