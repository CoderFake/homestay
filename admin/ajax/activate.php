<?php
session_start();
require_once ('../inc/db_config.php');
require_once ('../inc/essentials.php');
if (isset($_POST['token'])) {
    $token = $_POST['token'];
    $token = filteration($token);
  
    // Kiểm tra token còn hạn và kích hoạt tài khoản
    $checkTokenQuery = "SELECT * FROM `users` WHERE `token`=? AND `expired_token` > NOW() LIMIT 1";
    $resultCheck = select($checkTokenQuery, [$token], 's');
  
    if (mysqli_num_rows($resultCheck) === 1) {
        // Cập nhật tài khoản là đã xác thực
        $activateUserQuery = "UPDATE `users` SET `is_verified`=1, `token`=NULL, `expired_token`=NULL WHERE `token`=? AND `expired_token` > NOW()";
        $resultUpdate = update($activateUserQuery, [$token], 's');
  
        if ($resultUpdate > 0) {
            // Nếu kích hoạt thành công, xoá token và hết hạn
            echo json_encode(['status' => 'success', 'message' => 'Tài khoản đã được kích hoạt thành công!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Có lỗi xảy ra, không thể kích hoạt tài khoản!'],  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Token không hợp lệ hoặc đã hết hạn!'],  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
  }
?>