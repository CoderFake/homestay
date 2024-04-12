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
            $user = mysqli_fetch_assoc($resultCheck);
            $_SESSION['user_reset_id'] = $user['user_id'];
            $_SESSION['user_reset'] = true;
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success', 'message' => 'Tài khoản đã được kích hoạt thành công!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } else {
            if (isset($_SESSION['user_reset_id'])) {
                unset($_SESSION['user_reset_id']);
                unset($_SESSION['user_reset']);
            }
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Có lỗi xảy ra, không thể kích hoạt tài khoản!'],  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            exit();
        }
    } else {
        if (isset($_SESSION['user_reset_id'])){
                unset($_SESSION['user_reset_id']);
                unset($_SESSION['user_reset']);
        }
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Token không hợp lệ hoặc đã hết hạn!'],  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit();
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'resetpwd') {
    // Kiểm tra xem session user_reset_id có tồn tại và có giá trị không
    if (isset($_SESSION['user_reset_id']) && !empty($_SESSION['user_reset_id'])) {
        $userResetId = $_SESSION['user_reset_id'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        // Kiểm tra mật khẩu và mật khẩu xác nhận có khớp nhau không
        if ($password == $cpassword) {
            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Cập nhật mật khẩu mới vào cơ sở dữ liệu
            $sql = "UPDATE users SET password = ?, token = NULL, expired_token = NULL WHERE user_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param('si', $hashedPassword, $userResetId);
            $result = $stmt->execute();

            if ($result) {
                header('Content-Type: application/json');
                echo json_encode(['status' => 'success', 'message' => 'Mật khẩu đã được thay đổi thành công!'],   JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                
                unset($_SESSION['user_reset_id']);
                unset($_SESSION['user_reset']);
            } else {
                header('Content-Type: application/json');
                echo json_encode(['status' => 'error', 'message' => 'Có lỗi xảy ra. Không thể cập nhật mật khẩu!'],  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                exit();
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Mật khẩu và mật khẩu xác nhận không khớp!'],  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            exit();
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Không có quyền thay đổi mật khẩu!'],  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit();
    }
} 


?>