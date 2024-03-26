<?php

use Service\ReflectService;

require_once __DIR__ . "/BackEnd/Services/ReflectService.php";


$service = new ReflectService();


$result = $service->getAllReflects();

foreach ($result as $reflectId => $reflectData) {
    echo "Reflect ID: " . $reflectId . "<br>";
    echo "Email: " . $reflectData['email'] . "<br>";
    echo "Category Name: " . $reflectData['category_name'] . "<br>";
    if ($reflectData['accept'] == false) {
        echo 1;
    }
    // echo "Accept: " . $reflectData['accept'] . "<br>";
}
