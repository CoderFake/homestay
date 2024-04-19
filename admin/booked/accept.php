<?php
session_start();
require_once ('../inc/essentials.php');
require_once ('../inc/db_config.php');
adminLogin();
$data_homestay = readConfig();
$users = selectOrderedUsers();
function getUserById($user_id)
{
    global $con;
    $sql = "SELECT * FROM users WHERE user_id = ? AND removed = 0";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user;
}


if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    $user = getUserById($userId);
}
$pms = "";
if ($user['user_id'] != $_SESSION['user_id'])
    $pms = "readonly";



$bookings =  selectAll('booking_order');
$userdata = User();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require ("../inc/links.php") ?>
    <link rel="stylesheet" type="text/css" href="/admin/dist/css/admin.css" media="screen" />
</head>

<body>
    <div class="adminx-container">
        <?php require ("../inc/header.php") ?>
        <!-- adminx-content-aside -->
        <div class="adminx-content">
            <!-- <div class="adminx-aside">

        </div> -->

            <div class="adminx-main-content" style="padding-bottom:60px;">
                <div class="container-fluid">
                    <!-- BreadCrumb -->
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/users/users.php">Quản lý người dùng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php if ($user['user_id'] != $_SESSION['user_id']): ?> Xem thông tin người
                                    dùng<?php else: ?>Sửa thông tin <?php endif; ?></li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="pb-3 text-center text-md-left">
                                <h2><?php if ($user['user_id'] != $_SESSION['user_id']): ?> Xem thông tin người
                                        dùng<?php else: ?>Sửa thông tin <?php endif; ?></h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group d-flex justify-content-end align-items-center">
                                <select class="form-control" id="userSelect" name="userSelect">
                                    <option value="">Chọn người dùng</option>
                                    <?php foreach ($users as $usr): ?>
                                        <option value="<?php echo $usr['user_id']; ?>">
                                            <?php echo htmlspecialchars($usr['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="container bookings-container">
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
                                                            <?php echo htmlspecialchars($booking['arrival_time'])." ".htmlspecialchars(date('d/m/Y', strtotime($booking['check_in_date'])))." -> ".htmlspecialchars($booking['departure_time'])." ".htmlspecialchars(date('d/m/Y', strtotime($booking['check_out_date'])));?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlspecialchars($booking['rooms_required']); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlspecialchars(number_format(intval($booking['transaction_amount'])))."đ"; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ( (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] == $user['user_id'])) :?>
                                                                <select class="badge badge-pill badge-primary border-0" id="userBooked">
                                                                    <option value="<?php echo htmlspecialchars($booking['booking_status']);?>" <?php if($booking['booking_status'] == "canceled"):?> selected <?php endif; ?>>Huỷ bỏ</option>
                                                                    <option value="<?php echo htmlspecialchars($booking['booking_status']);?>" <?php if($booking['booking_status'] == "pending"):?> selected <?php endif; ?>>Chờ thanh toán</option>
                                                                    <option value="<?php echo htmlspecialchars($booking['booking_status']);?>" <?php if($booking['booking_status'] == "success"):?> selected <?php endif; ?>>Đã thanh toán</option>
                                                                </select>
                                                            <?php else :?>
                                                                <?php if($booking['booking_status'] == "success"):?> 
                                                                    <span class="badge badge-pill badge-success">Đã thanh toán</span>
                                                                <?php elseif($booking['booking_status'] == "pendding"):?>
                                                                    <span class="badge badge-pill badge-warning">Chờ thanh toán</span>
                                                                <?php else:?>
                                                                    <span class="badge badge-pill badge-danger">Huỷ bỏ</span>
                                                                <?php endif;?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
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
                </div>
            </div>
        </div>
    </div>
    <?php require ("../inc/footer.php") ?>
    <script>
        $(document).ready(function () {
            $('.input-file').on('change', function () {
                var file = this.files[0];
                var fileType = file.type;
                var fileSize = file.size;

                // Lấy id của thẻ img để cập nhật src
                var imagePreview = $('#profile-pic');

                // Kiểm tra loại tệp và kích thước
                if (fileType === 'image/jpeg' || fileType === 'image/png' || fileType === 'image/webp') {
                    if (fileSize <= 2097152) { // 2MB
                        // Đọc và hiển thị tệp ảnh
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            imagePreview.attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    } else {
                        createToast('error', 'File quá lớn, vui lòng chọn file nhỏ hơn 2MB.');
                        $(this).val('');
                        imagePreview.attr('src', '../../images/user_default.png'); // Trả lại ảnh mặc định nếu file quá lớn
                    }
                } else {
                    createToast('error', 'Chỉ chấp nhận file ảnh định dạng JPG, PNG hoặc WebP.')
                    $(this).val('');
                    imagePreview.attr('src', '../../images/user_default.png'); // Trả lại ảnh mặc định nếu định dạng không đúng
                }
            });

            $('.input-file-trigger').click(function (event) {
                event.preventDefault();
                $(this).siblings('.input-file').click();
            });
        });


        $(document).ready(function () {
            $("#old-password, #new-password, #acpt-password").on("input", function () {
                if ($("#new-password").val() === $("#acpt-password").val()) {
                    $("#acpt-password").removeClass("is-invalid");
                    $("#acpt-password").addClass("is-valid");
                } else {
                    $("#acpt-password").removeClass("is-valid");
                    $("#acpt-password").addClass("is-invalid");
                }
            });
        });
    </script>
</body>

</html>