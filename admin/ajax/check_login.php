<?php
session_start();

$response = ['loggedIn' => false];

// Kiểm tra xem người dùng đã đăng nhập chưa
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    $response['loggedIn'] = true;
}

// Lưu phương thức thanh toán và chi tiết đặt phòng vào session
if (isset($_POST['payment_method'])) {
    $_SESSION['paymentMethod'] = $_POST['payment_method'];
}

if (isset($_POST['room_id'], $_POST['room_name'], $_POST['startDate'], $_POST['endDate'], $_POST['time_arrival'], $_POST['time_departure'], $_POST['roomsRequired'], $_POST['price'])) {
    $_SESSION['booking_details'] = [
        'room_id' => $_POST['room_id'],
        'room_name' => $_POST['room_name'],
        'startDate' => $_POST['startDate'],
        'endDate' => $_POST['endDate'],
        'time_arrival' => $_POST['time_arrival'],
        'time_departure' => $_POST['time_departure'],
        'roomsRequired' => $_POST['roomsRequired'],
        'price' => $_POST['price']
    ];
}

// Kiểm tra và lưu URL redirect nếu người dùng chưa đăng nhập
if (!$response['loggedIn'] && isset($_POST['redirect'])) {
    $_SESSION['redirect_url'] = $_POST['redirect'];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
