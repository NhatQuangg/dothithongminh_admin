<?php

namespace App\Controllers;

require_once __DIR__ . "/../Services/ReflectService.php";
require_once __DIR__ . "/Controller.php";

use App\Controllers\Controller;
use Service\ReflectService;

class HomeController extends Controller
{
    

    public function __construct()
    {
        
    }
    public function GateWay()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $service = new ReflectService();
        
        $allReflects = $service->getAllReflects();


        include __DIR__ . "/../../FrontEnd/Views/Homes/Home.php";
    }
}

$run = new HomeController();
$run->GateWay();