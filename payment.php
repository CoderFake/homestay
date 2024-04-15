<?php
session_start();
require_once ('admin/inc/db_config.php');
require_once ('admin/inc/essentials.php');
$data_homestay = readConfig();

if (isset($_SESSION['booking_details'])) {
    $bookingDetails = $_SESSION['booking_details'];
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
    <?php require_once ("vnpay/config.php"); ?>
    <div class="container">
            <div class="payment-form">
                <h2 class="col-lg-12 text-center"> THANH TOÁN</h2>
                <div class="row" style="width:100%;">
                    <div class="col-lg-8 d-flex justify-content-center align-items-center px-0">
                        <form action="/vnpay/vnpay_create_payment.php" id="create_form" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="pay-form">
                                        <label for="order_desc">Nội dung thanh toán</label>
                                        <input class="form-control" id="order_desc" name="order_desc" value="Thanh toán <?php echo $roomName; ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pay-form">
                                        <label for="amount">Số tiền</label>
                                        <input class="form-control" id="amount" name="amount" type="text" readonly value="<?php echo $price; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="pay-form">
                                        <label for="bank_code">Ngân hàng</label>
                                        <select name="bank_code" id="bank_code" class="form-control">
                                            <option value="">Không chọn</option>
                                            <option value="NCB"> Ngân hàng NCB</option>
                                            <option value="AGRIBANK"> Ngân hàng Agribank</option>
                                            <option value="SCB"> Ngân hàng SCB</option>
                                            <option value="SACOMBANK">Ngân hàng SacomBank</option>
                                            <option value="EXIMBANK"> Ngân hàng EximBank</option>
                                            <option value="MSBANK"> Ngân hàng MSBANK</option>
                                            <option value="NAMABANK"> Ngân hàng NamABank</option>
                                            <option value="VNMART"> Ví điện tử VnMart</option>
                                            <option value="VIETINBANK">Ngân hàng Vietinbank</option>
                                            <option value="VIETCOMBANK"> Ngân hàng VCB</option>
                                            <option value="HDBANK">Ngân hàng HDBank</option>
                                            <option value="DONGABANK"> Ngân hàng Dong A</option>
                                            <option value="TPBANK"> Ngân hàng TPBank</option>
                                            <option value="OJB"> Ngân hàng OceanBank</option>
                                            <option value="BIDV"> Ngân hàng BIDV</option>
                                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                            <option value="VPBANK"> Ngân hàng VPBank</option>
                                            <option value="MBBANK"> Ngân hàng MBBank</option>
                                            <option value="ACB"> Ngân hàng ACB</option>
                                            <option value="OCB"> Ngân hàng OCB</option>
                                            <option value="IVB"> Ngân hàng IVB</option>
                                            <option value="VISA"> Thanh toán qua VISA/MASTER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pay-form">
                                        <label for="language">Ngôn ngữ</label>
                                        <select name="language" id="language" class="form-control">
                                            <option value="vn">Tiếng Việt</option>
                                            <option value="en">English</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="button-container">
                                <a href="" class="effect submit-button">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <input type="submit" value="Thanh toán">
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 px-0">
                        <img src="/images/pay/vnpay.jpeg">
                    </div>
                </div>
                <div class="col-lg-12 sub-footer"></div>
            </div>
    </div>
    <?php require ('inc/footer.php'); ?>
    <script>
    </script>

</body>

</html>