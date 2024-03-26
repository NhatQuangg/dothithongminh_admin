<?php
namespace App\Controllers;

class Controller
{
    protected function render($view_name, $data = [])
    {
        extract($data);

        require_once __DIR__ . "/../../FrontEnd/Views/Header.php";
        include __DIR__ . "/../../FrontEnd/Views\\$view_name" . "s\\$view_name.php";
    }
}
?>