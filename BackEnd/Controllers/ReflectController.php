<?php

namespace App\Controllers;

require_once __DIR__ . "/../Services/ReflectService.php";
require_once __DIR__ . "/Controller.php";

use App\Controllers\Controller;
use Service\ReflectService;

class ReflectController extends Controller
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
        $service = new ReflectService();

        if ($method == "POST") {
            if (isset($_POST['save'])) {
                $currentDateInput = $_POST['currentDateInput'];
                $processingDeadline = $_POST['processingDeadline'];
                $reflectId = $_POST['id_reflect'];

                $currentDateFormatted = date('d-m-Y', strtotime($currentDateInput));
                $processingDeadlineFormatted = date('d-m-Y', strtotime($processingDeadline));

                $timeHandle = 'Từ ' . $currentDateFormatted . ' đến ' . $processingDeadlineFormatted;

                $dataArray[] = $timeHandle;

                $update = $service->updateContentFeedback($dataArray, $reflectId);
                $accept = $service->updateAccept($reflectId);

                header("Location: detailreflect?detail=$reflectId");

                // $previousPageUrl = $_SERVER['HTTP_REFERER'];
                // header("Location: $previousPageUrl");
            }
            if (isset($_POST['update_btn'])) {

                $dataArray = [];
                $reflectId = $_POST['id_reflect'];
                $contentFeedback = $_POST['contentFeedback'];
                $timeAccept = $_POST['timeAccept'];

                $dataArray[] = $timeAccept;
                $dataArray[] = $contentFeedback;


                if (!empty($_FILES['fileToUpload']['name'][0])) {
                    $fileCount = count($_FILES['fileToUpload']['name']);

                    echo $fileCount;

                    // Lặp qua từng tệp tin được tải lên
                    for ($i = 0; $i < $fileCount; $i++) {
                        $fileName = $_FILES['fileToUpload']['name'][$i];
                        $tmpFilePath = $_FILES['fileToUpload']['tmp_name'][$i];

                        // Kiểm tra xem có lỗi khi tải lên không
                        if ($_FILES['fileToUpload']['error'][$i] === UPLOAD_ERR_OK) {

                            $downloadUrl = $service->upFile($tmpFilePath, $fileName);

                            $dataArray[] = $downloadUrl;
                        } else {
                            echo "Có lỗi khi tải lên file: " . $_FILES['fileToUpload']['error'][$i] . "<br>";
                        }
                    }
                }

                $updateContentFeedback = $service->updateContentFeedback($dataArray, $reflectId);
                $updateHandle = $service->updateHandle($reflectId);

                header("Location: detailreflect?detail=$reflectId");

                // $previousPageUrl = $_SERVER['HTTP_REFERER'];
                // header("Location: $previousPageUrl");
            }
            if (isset($_POST['editTimeProcess'])) {

                $editTimeValue = $_POST['editTimeValue'];
                $reflectId = $_POST['id_reflect'];

                $udpate =  $service->editTime($editTimeValue, $reflectId);

                $previousPageUrl = $_SERVER['HTTP_REFERER'];
                header("Location: $previousPageUrl");
            }
            if (isset($_POST['editContentFeedback'])) {
                $editContentFeedbackValue = $_POST['editContentFeedbackValue'];
                $reflectId = $_POST['id_reflect'];

                $udpate =  $service->editContentFeedback($editContentFeedbackValue, $reflectId);

                header("Location: detailreflect?detail=$reflectId");

                // $previousPageUrl = $_SERVER['HTTP_REFERER'];
                // header("Location: $previousPageUrl");
            }
            if (isset($_POST['editFile'])) {
                $dataArray = [];
                $reflectId = $_POST['id_reflect'];

                $tpc = $_POST['tpc'];
                $ctfb = $_POST['ctfb'];

                $dataArray[] = $tpc;
                $dataArray[] = $ctfb;

                if (!empty($_FILES['fileToUpload']['name'][0])) {
                    $fileCount = count($_FILES['fileToUpload']['name']);

                    for ($i = 0; $i < $fileCount; $i++) {
                        $fileName = $_FILES['fileToUpload']['name'][$i];
                        $tmpFilePath = $_FILES['fileToUpload']['tmp_name'][$i];

                        if ($_FILES['fileToUpload']['error'][$i] === UPLOAD_ERR_OK) {
                            $downloadUrl = $service->upFile($tmpFilePath, $fileName);
                            $dataArray[] = $downloadUrl;
                        } else {
                            echo "Có lỗi khi tải lên file: " . $_FILES['fileToUpload']['error'][$i] . "<br>";
                        }
                    }
                }

                $updateContentFeedback = $service->updateContentFeedback($dataArray, $reflectId);
                
                header("Location: detailreflect?detail=$reflectId");

                // $previousPageUrl = $_SERVER['HTTP_REFERER'];
                // header("Location: $previousPageUrl");
            }
        }
        if ($method == "GET") {
            if (isset($_GET['detail'])) {
                $reflectId = $_GET['detail'];

                $detailReflect = $service->getReflectByReflectId($reflectId);

                include __DIR__ . "/../../FrontEnd/Views/Details/Details.php";
            }
        }
    }
}

$run = new ReflectController();
$run->GateWay();
