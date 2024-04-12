<?php
session_start();
require_once ('admin/inc/db_config.php');
require_once ('admin/inc/essentials.php');

$errorMsg = array();
$data_homestay = readConfig();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'admin/vendor/PHPMailer/PHPMailer/src/Exception.php';
require 'admin/vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'admin/vendor/PHPMailer/PHPMailer/src/SMTP.php';

// Hàm thực hiện đăng ký người dùng mới
function registerUser($postData)
{
    global $con, $errorMsg;
    $data = filteration($postData);
    $u_exits = select(
        "SELECT * FROM `users` WHERE `email`=? OR `phone_number`=? LIMIT 1",
        [$data['email'], $data['phone']],
        'ss'
    );

    if (mysqli_num_rows($u_exits) != 0) {
        $u_exits_fetch = mysqli_fetch_assoc($u_exits);
        if ($u_exits_fetch['email'] == $data['email']) {
            $errorMsg[] = 'error:Email đã tồn tại!';
        } else {
            $errorMsg[] = 'error:Số điện thoại đã tồn tại!';
        }
        return;
    }
    $token = bin2hex(random_bytes(16));
    $data_homestay = readConfig();
    try {
        $mail = setupMailer();
        $mail->addAddress($data['email'], $data['name']);
        $mail->Subject = 'account activation';
        $activationLink = BASE_URL . "activate.php?token=$token";

        // Nạp nội dung email từ file template HTML
        $emailTemplate = file_get_contents('auth.html');
        $emailTemplate = str_replace('%HOME_STAY_NAME%', $data_homestay['homeStayName'], $emailTemplate);
        $emailTemplate = str_replace('%%FACEBOOK%%', $data_homestay['facebookLink'], $emailTemplate);
        $emailTemplate = str_replace('%%INSTAGRAM%%', $data_homestay['instagramLink'], $emailTemplate);
        $emailTemplate = str_replace('%%ACTIVATION_LINK%%', $activationLink, $emailTemplate);

        // Thiết lập nội dung email
        $mail->isHTML(true);
        $mail->Body = $emailTemplate;

        // Gửi email
        $mail->send();
        $errorMsg[] = 'success:Một email xác thực đã được gửi. Vui lòng kiểm tra email của bạn.';
    } catch (Exception $e) {
        $errorMsg[] = "error: Không thể gửi email xác thực. Mailer Error: {$mail->ErrorInfo}";
        return;
    }
    $enc_pass = password_hash($data['password'], PASSWORD_BCRYPT);
    $expiryDate = date('Y-m-d H:i:s', strtotime('+24 hours'));
    $query = "INSERT INTO `users` (`name`, `email`, `phone_number`, `password`, `token`, `expired_token`, `profile_pic`, `role`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $values = [$data['name'], $data['email'], $data['phone'], $enc_pass, $token, $expiryDate, "user_default.jpg", "customer"];
    if (!insert($query, $values, 'ssssssss')) {
        $errorMsg[] = 'error:Đăng ký thất bại. Vui lòng thử lại sau.';
    } else {
        $errorMsg[] = 'success:Đăng ký tài khoản thành công!';
    }
}

// Hàm thực hiện đăng nhập người dùng hoặc admin
function loginUser($postData)
{
    global $con, $errorMsg;

    $email = $postData['email'];
    $password = $postData['password'];

    // Truy vấn kiểm tra người dùng thông thường
    $userResult = select("SELECT * FROM `users` WHERE `email` = ? LIMIT 1", [$email], 's');
    if ($userResult && mysqli_num_rows($userResult) > 0) {
        $user_data = mysqli_fetch_assoc($userResult);
        if (password_verify($password, $user_data['password'])) {
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['user_name'] = $user_data['name'];
            $_SESSION['login'] = true;
            if (isset($_SESSION['user_reset_id'])){
                unset($_SESSION['user_reset_id']);
                unset($_SESSION['user_reset']);
            }
            $sql = "UPDATE `users` SET `status` = 1 WHERE `user_id` = ?";
            if ($stmt = mysqli_prepare($con, $sql)) {
                mysqli_stmt_bind_param($stmt, "i", $user_data['user_id']);

                // Thực thi câu lệnh
                mysqli_stmt_execute($stmt);

                mysqli_stmt_close($stmt);
            }
        } else {
            $errorMsg[] = 'error:Sai mật khẩu người dùng!';
            return;
        }
        if ($user_data['role'] == "admin") {
            $_SESSION['adminLogin'] = true;
            $_SESSION['admin_id'] = $user_data['user_id'];
            redirect('admin/dashboard.php');
            exit();
        } else if ($user_data['role'] == "staff") {
            $_SESSION['staffLogin'] = true;
            $_SESSION['staff_id'] = $user_data['user_id'];
            redirect('admin/dashboard.php');
            exit();
        } else {
            redirect('index.php');
            exit();
        }

    } else {
        $errorMsg[] = 'error:Email người dùng không tồn tại!';
    }
}

// Xử lý yêu cầu POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        registerUser($_POST);
    } else if (isset($_POST['action']) && $_POST['action'] == 'login') {
        loginUser($_POST);
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <?php require ("inc/links.php"); ?>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/acc.css">
</head>

<body>
    <?php require ("inc/header.php"); ?>
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
    <div class="container form-login" id="container">
        <div class="register">
            <p class="signin sign">ĐĂNG NHẬP</p>
            <div class="wall"></div>
            <p class="signup">ĐĂNG KÝ</p>
        </div>
        <div class="form-container sign-up-container">
            <form action="acc.php" method="post">
                <h1>ĐĂNG KÝ</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <input type="hidden" name="action" value="register">
                <input type="text" placeholder="Name" name="name" />
                <input type="email" placeholder="Email" name="email" />
                <input type="text" placeholder="Phone number" name="phone" />
                <input type="password" placeholder="Password" name="password" />
                <button type="submit">Đăng ký</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="acc.php" method="post">
                <h1>ĐĂNG NHẬP</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>hoặc sử dụng tài khoản của bạn</span>
                <input type="hidden" name="action" value="login">
                <input type="email" placeholder="Email" name="email" />
                <input type="password" placeholder="Password" name="password" />
                <a href="resetpwd.php">Bạn quên mật khẩu?</a>
                <button type="submit">Đăng nhập</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Xin chào !!!</h1>
                    <p>
                        <?php echo $data_homestay['homeStayName'] ?>, nhiều điều thú vị tại nơi đây
                    </p>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Xin chào !!!</h1>
                    <p>Đăng ký để kết nối đến
                        <?php echo $data_homestay['homeStayName'] ?> nào!
                    </p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
    <?php }
    else {
        redirect('index.php');
    }?>
    <?php require ('inc/footer.php'); ?>
    <script>
        $(document).ready(function () {
            $('#signUp').on('click', function () {
                $('#container').addClass('right-panel-active');
            });

            $('#signIn').on('click', function () {
                $('#container').removeClass('right-panel-active');
            });

            $('.signup').on('click', function () {
                $('.signin').removeClass('sign');
                $('#container').addClass('right-panel-active');
                $('.signup').addClass('sign');
            });

            $('.signin').on('click', function () {
                $('.signup').removeClass('sign');
                $('#container').removeClass('right-panel-active');
                $('.signin').addClass('sign');
            });
        });
    </script>
    <script src="js/nav.js"></script>
</body>

</html>