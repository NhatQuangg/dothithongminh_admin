<?php

namespace Service;

require_once __DIR__ . "/../Datas/StatisticData.php";

use Data\StatisticData;

class StatisticService
{
    public $StatisticData;
    public function  __construct()
    {
        $this->StatisticData = new StatisticData();
    }

    public function getAllUsers()
    {
        $result = $this->StatisticData->getAllUsers();

        return $result;
    }

    public function getCountReflectofCategory()
    {
        $result = $this->StatisticData->getCountReflectofCategory();

        return $result;
    }

    public function getUsersWithReflectCounts()
    {
        $result = $this->StatisticData->getUsersWithReflectCounts();

        return $result;
    }
}
