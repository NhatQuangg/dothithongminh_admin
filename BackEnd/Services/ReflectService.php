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

    public function upFile($filePath, $fileName)
    {
        $result = $this->ReflectData->uploadFile($filePath, $fileName);

        return $result;
    }

    public function upFiles($filePaths, $fileNames)
    {
        $resultUrls = $this->ReflectData->uploadFiles($filePaths, $fileNames);

        return $resultUrls;
    }

    // =========================================================================

    public function updateContentFeedback($dataArray, $reflectId)
    {
        $result = $this->ReflectData->updateContentFeedback($dataArray, $reflectId);

        return $result;
    }

    public function updateAccept($reflectId)
    {
        $result = $this->ReflectData->updateAccept($reflectId);

        return $result;
    }

    public function updateHandle($reflectId)
    {
        $result = $this->ReflectData->updateHandle($reflectId);

        return $result;
    }
}
