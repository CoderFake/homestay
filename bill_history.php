<?php
session_start();
require_once ('admin/inc/essentials.php');
require_once ('admin/inc/db_config.php');
userLogin();
$data_homestay = readConfig();
$users = selectOrderedUsers();



$query = "
    SELECT 
        booking_order.order_id,
        booking_order.booking_id,
        rooms.name AS room_name,
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
    WHERE 
        booking_order.user_id = ? AND booking_order.booking_status = 'success';
";


$bookings = select($query, [$_SESSION['user_id']], 'i');
$userdata = User();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require ("inc/links.php") ?>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="/admin/dist/css/admin.css" media="screen" />
</head>

<body>
<?php require ('inc/header.php'); ?>
    <div class="container bookings-container" style="margin-top:80px;">
        <div class="pb-3 text-center text-md-left">
            <h2>Lịch sử đặt phòng</h2>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="table-responsive-md">
                        <table class="table table-actions table-striped table-hover mb-0" data-table>
                            <thead>
                                <tr>
                                    <th scope="col">Mã hoá đơn</th>
                                    <th scope="col">Homestay</th>
                                    <th scope="col">Thời gian</th>
                                    <th scope="col">Số phòng</th>
                                    <th scope="col">Giá tiền</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bookings as $booking): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlspecialchars($booking['order_id']); ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($booking['room_name']); ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($booking['arrival_time']) . " " . htmlspecialchars(date('d/m/Y', strtotime($booking['check_in_date']))) . " -> " . htmlspecialchars($booking['departure_time']) . " " . htmlspecialchars(date('d/m/Y', strtotime($booking['check_out_date']))); ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($booking['rooms_required']); ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars(number_format(intval($booking['transaction_amount']))) . "đ"; ?>
                                        </td>
                                        <td>
                                            <?php if ($booking['booking_status'] == "success"): ?>
                                                <span class="badge badge-pill badge-success">Đã thanh toán</span>
                                            <?php elseif ($booking['booking_status'] == "pendding"): ?>
                                                <span class="badge badge-pill badge-warning">Chờ thanh toán</span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-danger">Huỷ bỏ</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                        <input type="hidden" name="bookingId" value="<?php echo htmlspecialchars($booking['booking_id']);?>">
                                            <button class="btn btn-sm btn-info booking-btn-view-control">Xem</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (empty($bookings)): ?>
                                    <tr>
                                        <td colspan="7">Không có dữ liệu</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require ('inc/footer.php'); ?>
    <script>
        $(document).ready(function () {
            $('.booking-btn-view-control').on('click', function() {
                var searchValue = $(this).closest('td').find('input[type="hidden"]').val();
                window.location.href = '/bill.php?booking_id=' + searchValue;
            });
        });
    </script>
</body>

</html>