<?php
namespace Service;

require_once __DIR__ . "/../Datas/ReflectData.php";
use Data\ReflectData;

class ReflectService
{
    public $ReflectData;

    public function  __construct()
    {
        $this->ReflectData = new ReflectData();
    }

    public function getAllReflects()
    {
        $reflects = $this->ReflectData->getAllReflects();

        return $reflects;
    }

    public function getReflectByReflectId($reflectId)
    {
        $result = $this->ReflectData->getReflectByReflectId($reflectId);

        return $result;
    }

    public function getEmailByUserId($userId)
    {
        $result = $this->ReflectData->getEmailByUserId($userId);

        return $result;
    }
}