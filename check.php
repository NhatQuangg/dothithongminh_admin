<?php

use Service\ReflectService;

require_once __DIR__ . "/BackEnd/Services/ReflectService.php";

$service = new ReflectService();

if (!empty($_FILES['fileToUpload']['name'][0])) {
    $fileCount = count($_FILES['fileToUpload']['name']);

    // Lặp qua từng tệp tin được tải lên
    for ($i = 0; $i < $fileCount; $i++) {
        $fileName = $_FILES['fileToUpload']['name'][$i];
        $tmpFilePath = $_FILES['fileToUpload']['tmp_name'][$i];

        // Kiểm tra xem có lỗi khi tải lên không
        if ($_FILES['fileToUpload']['error'][$i] === UPLOAD_ERR_OK) {
            // Gọi phương thức upFile từ service để tải lên file
            $downloadUrl = $service->upFile($tmpFilePath, $fileName);

            // Xử lý kết quả tải lên, có thể hiển thị URL của file đã tải lên
            echo "File đã được tải lên thành công. URL: $downloadUrl <br> <br>";

            // Hiển thị hình ảnh đã tải lên
            // echo "Hình ảnh: <br>";
            // echo "<img src='$downloadUrl' alt='Ảnh đã tải lên'><br><br>";
        } else {
            // Xử lý lỗi khi tải lên file
            echo "Có lỗi khi tải lên file: " . $_FILES['fileToUpload']['error'][$i] . "<br>";
        }
    }
} else {
    // Xử lý trường hợp không có file được tải lên
    echo "Vui lòng chọn ít nhất một file để tải lên.";
}
