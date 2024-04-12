<?php
session_start();
require_once ('admin/inc/db_config.php');
require_once ('admin/inc/essentials.php');
$data_homestay = readConfig();
$errorMsg = array();

function maskEmail($email) {
    // Tách username và domain
    list($username, $domain) = explode('@', $email);

    // Lấy ký tự đầu tiên và ký tự cuối cùng của username
    $firstChar = substr($username, 0, 1);
    $lastChar = substr($username, -1);

    // Tạo chuỗi mask cố định là 4 ký tự '*'
    $mask = '****';

    // Kết hợp lại
    $maskedEmail = $firstChar . $mask . $lastChar . '@' . $domain;

    return $maskedEmail;
}
function checkInputType($input) {
    // Kiểm tra xem đầu vào có phải là email hợp lệ không
    if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return 'email';
    } 
    // Kiểm tra xem đầu vào có phải là số điện thoại hợp lệ không
    elseif (preg_match('/^[0-9]{10,11}$/', $input)) {
        return 'phone';
    }
    else {
        return 'invalid';
    }
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'admin/vendor/PHPMailer/PHPMailer/src/Exception.php';
require 'admin/vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'admin/vendor/PHPMailer/PHPMailer/src/SMTP.php';
function resetPassword($data) {
    global $errorMsg;
    $inputValue = filteration($data['input']);
    $inputType = checkInputType($inputValue);
    $data_homestay = readConfig();

    // Điều chỉnh câu truy vấn tùy theo loại đầu vào
    $queryColumn = $inputType === 'email' ? 'email' : 'phone_number';
    $u_exists = select("SELECT * FROM `users` WHERE `$queryColumn`=? LIMIT 1", [$data['input']], 's');

    if (mysqli_num_rows($u_exists) == 0) {
        $errorMsg[] = "error: Không tìm thấy người dùng với thông tin đã nhập.";
        return;
    }

    $token = bin2hex(random_bytes(16));
    $expiryDate = date('Y-m-d H:i:s', strtotime('+24 hours')); 
    try {
        $mail = setupMailer();
        $user = mysqli_fetch_assoc($u_exists);
        $mail->addAddress($user['email'], $user['name']); 
        $mail->Subject = 'Reset Password';
        $resetLink = BASE_URL . "change_pwd.php?token=$token";

        $emailTemplate = file_get_contents('reset.html');
        $emailTemplate = str_replace('%HOME_STAY_NAME%', $data_homestay['homeStayName'], $emailTemplate);
        $emailTemplate = str_replace('%%FACEBOOK%%', $data_homestay['facebookLink'], $emailTemplate);
        $emailTemplate = str_replace('%%INSTAGRAM%%', $data_homestay['instagramLink'], $emailTemplate);
        $emailTemplate = str_replace('%%RESET_LINK%%', $resetLink, $emailTemplate);
    
        // Thiết lập nội dung email
        $mail->isHTML(true);
        $mail->Body = $emailTemplate;
    
        // Gửi email
        $mail->send();
        $maskmail = $user['email'];
        if($inputType == 'phone')
            $maskmail = maskEmail($user['email']);
        $errorMsg[] = "success:Một email lấy lại mật khẩu đã được gửi tới {$maskmail}. Vui lòng kiểm tra email của bạn.";
        
        // Cập nhật token và thời gian hết hạn vào cơ sở dữ liệu
        $updateQuery = "UPDATE `users` SET `token`=?, `expired_token`=? WHERE `$queryColumn`=?";
        update($updateQuery, [$token, $expiryDate, $data['input']], 'sss');
    } catch (Exception $e) {
        $errorMsg[] = "error: Không thể gửi email. Mailer Error: {$mail->ErrorInfo}";
    }
}


// Sử dụng hàm resetPassword
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'resetpwd') {
        resetPassword(['input' => $_POST['text']]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require ('inc/links.php'); ?>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/rst.css">

</head>

<body>
    <?php require ('inc/header.php'); ?>
    <?php if (!empty($errorMsg)): ?>
        <div class="messages">
            <?php foreach ($errorMsg as $msg): ?>
                <div class="notice">
                    <?php echo $msg; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php  if(!isset($_SESSION['login']) || !$_SESSION['login'] == true){ ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 form">
                <form action="resetpwd.php" method="POST" autocomplete="">
                    <h2 class="text-center">Quên mật khẩu</h2>
                    <p class="text-center">Nhập email hoặc SĐT của bạn</p>
                    <div class="form-group">
                        <input class="form-control" type="text" name="text" placeholder="Nhập email hoặc SĐT" required value="">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="action" value="resetpwd">
                        <button class="form-control button" type="submit">Tiếp tục</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <?php }else {
        redirect('index.php');
    } require ('inc/footer.php'); ?>

</body>

</html>