<?php
session_start();
require_once ('admin/inc/essentials.php');
require_once ('admin/inc/db_config.php');
userLogin();
$data_homestay = readConfig();
$users = selectOrderedUsers();
function getBookingById($booking_id)
{
    $query = "
        SELECT 
            booking_order.order_id,
            booking_order.user_id,
            rooms.name AS room_name,
            users.name AS user_name,
            booking_order.check_in_date,
            booking_order.arrival_time,
            booking_order.check_out_date,
            booking_order.departure_time,
            booking_order.rooms_required,
            booking_order.transaction_id,
            booking_order.transaction_amount,
            booking_order.booking_status,
            booking_order.booking_date
        FROM 
            booking_order
        JOIN 
            rooms ON booking_order.room_id = rooms.room_id
        JOIN 
            users ON booking_order.user_id = users.user_id
        WHERE 
            booking_order.booking_id = ?;
    ";
    $result = select($query, [$booking_id], 'i');
    if ($result && $result->num_rows > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null; 
    }
}


if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];
    $booking = getBookingById($booking_id);
}
else redirect('/index.php');




$userdata = User();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require ("inc/links.php") ?>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="/admin/dist/css/admin.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/bill.css" media="screen" />
</head>

<body>
    <div class="adminx-container">
        <?php require ("inc/header.php") ?>
        <!-- adminx-content-aside -->
        <div class="adminx-content">
        <?php if($booking['user_id'] == $_SESSION['user_id']):?>
            <div class="adminx-main-content" style="padding-bottom:60px;">
                <div class="container bill-container mt-6 mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-xl-7">
                            <div class="card">
                                <div class="card-body p-5">
                                    <h2><img style ="width: 60px;height: auto;overflow:hidden;" src="/../images/<?php echo htmlspecialchars($data_homestay['logo_image']);?>"><?php  echo htmlspecialchars($data_homestay['homeStayName']);?></h2>
                                    <p class="fs-sm">Tên khách hàng: <b><?php  echo htmlspecialchars($booking['user_name']);?></b></p>
                                    <div class="border-top border-gray-200 pt-4 mt-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="text-muted mb-2">Mã hoá đơn</div>
                                                <strong><?php  echo htmlspecialchars($booking['order_id']);?></strong>
                                            </div>
                                            <div class="col-md-6 text-md-end">
                                                <div class="text-muted mb-2">Ngày thanh toán</div>
                                                <strong><?php  echo htmlspecialchars(date('H:i:s d/m/Y', strtotime($booking['booking_date'] . ' +7 hours')));?></strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top border-gray-200 mt-4 py-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="text-muted mb-2">Thông tin</div>
                                                <strong>Thời gian</strong>
                                                <p class="fs-sm"> Ngày đến: <?php echo htmlspecialchars($booking['arrival_time'])." ".htmlspecialchars(date('d/m/Y', strtotime($booking['check_in_date'])));?><br>Ngày đi:<?php echo htmlspecialchars($booking['departure_time'])." ".htmlspecialchars(date('d/m/Y', strtotime($booking['check_out_date'])));?></p>
                                            </div>
                                            <div class="col-md-6 text-md-end">
                                                <div class="text-muted mb-2">Phương thức thanh toán</div>
                                                <?php if($booking['transaction_id']): ?> 
                                                    <strong>Thanh toán online</strong>
                                                <?php else: ?>
                                                    <strong>Thanh toán tiền mặt</strong>
                                                <?php endif; ?>
                                                <p class="fs-sm">Lưu ý tiền mặt trả trước khi nhận phòng</p>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table border-bottom border-gray-200 mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0">Homestay</th>
                                                <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm text-end px-0">Giá phòng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-0"> <?php echo htmlspecialchars($booking['room_name']); ?></td>
                                                <td class="text-end px-0"><?php echo htmlspecialchars(number_format(intval($booking['transaction_amount'])))."đ"; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="mt-5">
                                        <div class="d-flex justify-content-end">
                                            <p class="text-muted me-3">Giảm giá</p>
                                            <span>&nbsp;0đ</span>
                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                            <h5 class="me-3">Tổng&nbsp;</h5>
                                            <h5 class="text-success"><?php echo htmlspecialchars(number_format(intval($booking['transaction_amount'])))."đ"; ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <?php if($booking['booking_status'] == "success"):?> 
                                <div class="btn btn-lg card-footer-btn justify-content-center text-uppercase-bold-sm hover-lift-light btn-success">
                                <?php elseif($booking['booking_status'] == "pending"):?>
                                <div class="btn btn-lg card-footer-btn justify-content-center text-uppercase-bold-sm hover-lift-light btn-wraning">
                                <?php else:?>
                                    <div class="btn  btn-lg card-footer-btn justify-content-center text-uppercase-bold-sm hover-lift-light btn-danger">
                                <?php endif;?>
                                    <?php if($booking['booking_status'] == "success"):?> 
                                        Đã thanh toán
                                    <?php elseif($booking['booking_status'] == "pending"):?>
                                        Chờ thanh toán
                                    <?php else:?>
                                        Huỷ bỏ
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
        </div>
    </div>
    <?php require ("inc/footer.php") ?>
</body>

</html>