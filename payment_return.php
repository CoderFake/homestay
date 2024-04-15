<?php

session_start();
require_once ('admin/inc/db_config.php');
require_once ('admin/inc/essentials.php');
$data_homestay = readConfig();

require_once("vnpay/config.php");

$vnp_ResponseCode = $_GET['vnp_ResponseCode'] ?? null;
$order_id = $_GET['vnp_TxnRef'] ?? null;
$amount = $_GET['vnp_Amount'] ?? null;
$order_desc = $_GET['vnp_OrderInfo'] ?? null;
$vnp_TransactionNo = $_GET['vnp_TransactionNo'] ?? null;
$msg = "";
unset($_SESSION['paymentMethod']);
if (isset($_SESSION['booking_details'])) {
    $bookingDetails = $_SESSION['booking_details'];
    $userId = $_SESSION['user_id'];
    $roomId = $bookingDetails['room_id'];
    $roomName = $bookingDetails['room_name'];
    $startDate = $bookingDetails['startDate'];
    $endDate = $bookingDetails['endDate'];
    $arrivalTime = $bookingDetails['time_arrival'];
    $departureTime = $bookingDetails['time_departure'];
    $price = $bookingDetails['price'];
} else {
    echo '<div class="notice">error: Thông tin bị thiếu, vui lòng điền đầy đủ!</div>';
    exit();
}
if($vnp_ResponseCode == "00"){
    // global $con;
    // $msg = "success: Thanh toán thành công!";
    // $stmt = $con->prepare("INSERT INTO booking_order (user_id, room_id, check_in_date, check_out_date, arrival_time, departure_time, booking_status, transaction_id, transaction_amount, transaction_status, order_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    // $stmt->bind_param("iissssssdsd", $userId, $roomId, $startDate, $endDate, $arrivalTime, $departureTime, 'success' , $vnp_TransactionNo, $price, 'success', $order_id);


    // if ($stmt->execute()) {
    //     echo '<div class="notice">Thông tin đặt phòng đã được lưu.</div>';
    // } else {
    //     echo '<div class="notice">Error: ' . $stmt->error . '</div>';
    // }

    // // Đóng kết nối
    // $stmt->close();
} 
else $msg = "success: Thanh toán thất bại!";
unset($_SESSION['booking_details']);
$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require ('inc/links.php'); ?>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/payment.css">
</head>

<body>
    <?php require ('inc/header.php'); ?>
    <div class="container">
        <div class="payment-form">
            <h2 class="col-lg-12">KẾT QUẢ THANH TOÁN</h2>
            <div class="row" style="width:100%;">
                <div class="col-lg-7 px-0">
                    <div class="result-form">
                        <p>Mã đơn hàng: <?php echo $order_id; ?></p>
                        <p>Số tiền: <?php echo $amount; ?></p>
                        <p>Nội dung thanh toán: <?php echo $order_desc; ?></p>
                        <p>vnp_TransactionNo: <?php echo $vnp_TransactionNo; ?></p>
                        <?php if ($vnp_ResponseCode == '00'): ?>
                            <p>vnp_ResponseCode: <b style="color:green"><?php echo $vnp_ResponseCode; ?> - Thành công</b></p>
                        <?php else: ?>
                            <p>vnp_ResponseCode: <b style="color:#d03131"><?php echo $vnp_ResponseCode; ?> - Lỗi</b></p>
                        <?php endif; ?>
                        <?php if ($msg): ?>
                            <p class="notice"> <?php echo $msg; ?></p>
                        <?php endif; ?>
                        <div class="button-container">
                            <a href="/index.php#homestay" class="effect submit-button">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <input type="submit" value="Trở lại">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 px-0">
                    <?php if ($vnp_ResponseCode == '00'): ?>
                        <img src="/images/pay/payment_successful.png">
                    <?php else: ?>
                        <img src="/images/pay/payment_error.png">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-12 sub-footer"></div>
        </div>
    </div>
    <?php require ('inc/footer.php'); ?>
</body>
</html>
