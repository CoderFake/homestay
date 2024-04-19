<?php
session_start();
require '../inc/essentials.php';
adminLogin();
require '../inc/db_config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/PHPMailer/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/PHPMailer/src/SMTP.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $queryId = $_POST['query_id'];
    $customerName = $_POST['customerName'];
    $customerEmail = $_POST['customerEmail'];
    $message = $_POST['message'];
    $data_homestay = readConfig();
    if($message){
        try {
            $mail = setupMailer();
            $mail->addAddress($customerEmail, $customerName);
            $mail->Subject = 'response message';

            // Nạp nội dung email từ file template HTML
            $emailTemplate = file_get_contents('../contact/response.html');
            $emailTemplate = str_replace('%HOME_STAY_NAME%', $data_homestay['homeStayName'], $emailTemplate);
            $emailTemplate = str_replace('%%FACEBOOK%%', $data_homestay['facebookLink'], $emailTemplate);
            $emailTemplate = str_replace('%%INSTAGRAM%%', $data_homestay['instagramLink'], $emailTemplate);
            $emailTemplate = str_replace('%MESSAGE%', $message, $emailTemplate);

            // Thiết lập nội dung email
            $mail->isHTML(true);
            $mail->Body = $emailTemplate;

            // Gửi email
            $mail->send();
            $updateQuery = "UPDATE user_queries SET response = 1 WHERE query_id = ?";
            $stmt = $con->prepare($updateQuery);
            $stmt->bind_param("i", $queryId);
            $stmt->execute();
            $stmt->close();
            echo json_encode(['status' => 'success', 'message' => 'Gửi tin nhắn thành công.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => "Có lỗi trong quá trình gửi tin nhắn!"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }else {
        $updateQuery = "UPDATE user_queries SET response = 1 WHERE query_id = ?";
        $stmt = $con->prepare($updateQuery);
        $stmt->bind_param("i", $queryId);
        $stmt->execute();
        $stmt->close();
        echo json_encode(['status' => 'success', 'message' => 'Cập nhật thành công.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

}  
?>