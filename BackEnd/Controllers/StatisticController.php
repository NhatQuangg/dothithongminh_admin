<?php

namespace App\Controllers;

require_once __DIR__ . "/../Services/StatisticService.php";
require_once __DIR__ . "/Controller.php";

use Service\StatisticService;
use App\Controllers\Controller;

class StatisticController extends Controller
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
        $service = new StatisticService();

        if ($method == "POST") {
        }
        if ($method == "GET") {

            $categoryReflectCounts  = $service->getCountReflectofCategory();

            $usersWithReflectCounts  = $service->getUsersWithReflectCounts();

            include __DIR__ . "/../../FrontEnd/Views/Statistics/Statistic.php";
        }
    }
}
$run = new StatisticController();
$run->GateWay();
