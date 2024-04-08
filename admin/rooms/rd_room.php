<?php
session_start();
require_once ('../inc/essentials.php');
require_once ('../inc/db_config.php');
adminLogin();
$data_homestay = readConfig();
$room_urls = selectAll('room_images');
$sql = "SELECT * FROM rooms WHERE removed = ?";
$values = array(0);
$datatypes = 'i';
$rooms = select($sql, $values, $datatypes);
$userdata = User();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require ("../inc/links.php") ?>
</head>

<body>
    <div class="adminx-container">
        <?php require ("../inc/header.php") ?>
        <!-- adminx-content-aside -->
        <div class="adminx-content table-view">
            <div class="adminx-main-content">
                <div class="container-fluid">
                    <!-- BreadCrumb -->
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="">Xem Homestay</a></li>
                        </ol>
                    </nav>

                    <div class="pb-3">
                        <div class="row">
                            <div class="col-lg-7" style="height:50px;">
                                <div class="text-center text-md-left">
                                    <h2>Homestays</h2>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <?php if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true): ?>
                                    <div class="form-group d-flex justify-content-end align-items-center">
                                        <button type="submit" id="btnAdd" class="btn btn-success">Thêm homestay</button>
                                        <button type="submit" id="btnDel" class="btn btn-danger ml-2 hid">Xoá homestay đã
                                            chọn</button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="card mb-grid">
                                <div class="table-responsive-md">
                                    <table class="table table-actions table-striped table-hover mb-0" data-table>
                                        <thead>
                                            <tr>
                                                <?php if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true): ?>
                                                    <th scope="col">
                                                        <label class="custom-control custom-checkbox m-0 p-0">
                                                            <input type="checkbox"
                                                                class="custom-control-input table-select-all">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </th>
                                                <?php endif; ?>
                                                <th scope="col">Tên homestay</th>
                                                <th scope="col">Địa chỉ</th>
                                                <th scope="col">Số phòng</th>
                                                <th scope="col">Giá thuê phòng</th>
                                                <th scope="col">Thiết lập</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($rooms as $room): ?>
                                                <tr>
                                                    <?php if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true): ?>
                                                        <td>
                                                            <label class="custom-control custom-checkbox m-0 p-0">
                                                                <input type="checkbox"
                                                                    class="checkbox custom-control-input table-select-row"
                                                                    id="<?php echo htmlspecialchars($room['room_id']); ?>">
                                                                <img class="uncheckRoom" src="/images/icons/unchecked.svg"
                                                                    style="height:25px; width:25px;">
                                                                <img class="checkRoom hid" src="/images/icons/checked.svg"
                                                                    style="height:25px; width:25px;">
                                                                <input class="input-select-control d-none"
                                                                value="<?php echo htmlspecialchars($room['room_id']); ?>" />
                                                            </label>
                                                        </td>
                                                    <?php endif; ?>
                                                    <td>
                                                        <?php echo htmlspecialchars($room['name']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($room['area']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($room['room_total']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format(htmlspecialchars($room['price']), 0, ',', '.'); ?>đ
                                                    </td>
                                                    <td>
                                                        <input class="input-view-control d-none"
                                                            value="<?php echo htmlspecialchars($room['room_id']); ?>" />
                                                        <?php if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true): ?>
                                                            <button class="btn btn-sm btn-warning btn-view-control">Xem</button>
                                                            <button class="btn btn-sm btn-primary btn-edit-control">Sửa</button>
                                                            <button class="btn btn-sm btn-danger btn-del-control">Xoá</button>
                                                        <?php else: ?>
                                                            <button class="btn btn-sm btn-info btn-view-control">Xem</button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php if (empty($rooms)): ?>
                                                <tr>
                                                    <td colspan="6">Không có dữ liệu</td>
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
        <div class="adminx-content room-view hid">
            <div class="adminx-main-content" style="padding-bottom:60px;">
                <div class="container-fluid">
                    <!-- BreadCrumb -->
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/rooms/rd_room.php">Quản lý homestay</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Xem thông tin homestay</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pb-4 text-center text-md-left">
                                <h2 class="my-4">Xem thông tin homestay</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-header-title p-1">Thông tin</div>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="roomSelect">Chọn Phòng</label>
                                                    <select class="form-control" id="roomSelect" name="room_id">
                                                        <option value="">Vui lòng chọn phòng</option>
                                                        <?php foreach ($rooms as $room): ?>
                                                            <option value="<?php echo $room['room_id']; ?>">
                                                                <?php echo htmlspecialchars($room['name']); ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="addr">Khu vực</label>
                                                    <input type="text" class="form-control h-100" id="addr" value=""
                                                        readonly>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <!-- Giá phòng -->
                                                        <div class="form-group">
                                                            <label class="form-label mr-2" for="price_input">Giá
                                                                phòng:</label>
                                                            <input class="form-control" name="price_input" type="text"
                                                                id="price_input" value="" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <!-- Người lớn -->
                                                        <div class="form-group">
                                                            <label class="form-label mr-2" for="adult_input">Người
                                                                lớn:</label>
                                                            <input class="form-control" type="text" id="adult_input"
                                                                value="" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <!-- Trẻ em -->
                                                        <div class="form-group">
                                                            <label class="form-label mr-2" for="child_input">Trẻ
                                                                em:</label>
                                                            <input class="form-control" type="text" id="child_input"
                                                                value="" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <!-- Số lượng phòng -->
                                                        <div class="form-group">
                                                            <label class="form-label mr-2" for="room_input">Số
                                                                phòng:</label>
                                                            <input class="form-control" type="text" id="room_input"
                                                                value="" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <!-- Trạng thái phòng -->
                                                        <div class="form-group">
                                                            <label class="form-label" for="sts_avai"
                                                                style="color:#258f01">Có sẵn:</label>
                                                            <input class="form-control" type="text" id="sts_avai"
                                                                value="" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="sts_pair"
                                                                style="color:#478efe;">Đang sửa chữa:</label>
                                                            <input class="form-control" type="text" id="sts_pair"
                                                                value="" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="sts_booked"
                                                                style="color:#df0015;">Đã đặt:</label>
                                                            <input class="form-control" type="text" id="sts_booked"
                                                                value="" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 border-top-0">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="card-header-title">Mô tả homstay</div>

                                            <nav class="card-header-actions p-0">
                                                <a class="card-header-action" data-toggle="collapse" href="#card1"
                                                    aria-expanded="false" aria-controls="card1">
                                                    <i data-feather="minus-circle" class="zoom-in"></i>
                                                    <i data-feather="plus-circle" class="zoom-out hid"></i>
                                                </a>

                                            </nav>
                                        </div>
                                        <div class="form collapse show" id="card1">
                                            <div class="form-group m-4">
                                                <textarea class="form-control p-10 w-60" name="" id="desc" cols="30"
                                                    rows="9" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="card-header-title">Ảnh phòng</div>

                                            <nav class="card-header-actions p-0">
                                                <a class="card-header-action" data-toggle="collapse" href="#cardimg"
                                                    aria-expanded="false" aria-controls="cardimg">
                                                    <i data-feather="minus-circle" class="zoom-in"></i>
                                                    <i data-feather="plus-circle" class="zoom-out hid"></i>
                                                </a>

                                            </nav>
                                        </div>
                                        <div class="form collapse show" style="height:375px;" id="cardimg">
                                            <div class="form-group m-4">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper">
                                                        <!-- Lặp qua mỗi phòng và in ra thông tin tương ứng -->

                                                    </div>
                                                </div>
                                                <!-- Add Arrows -->
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card border-top-0">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="card-header-title">Cơ bản</div>

                                            <nav class="card-header-actions p-0">
                                                <a class="card-header-action" data-toggle="collapse" href="#card2"
                                                    aria-expanded="false" aria-controls="card2">
                                                    <i data-feather="minus-circle" class="zoom-in  hid"></i>
                                                    <i data-feather="plus-circle" class="zoom-out"></i>
                                                </a>
                                            </nav>
                                        </div>

                                        <div class="form collapse collapse" id="card2">
                                            <div class="form-group m-4">
                                                <div id="facilities-container-basic"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card border-top-0">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="card-header-title">Tiện nghi phòng</div>

                                            <nav class="card-header-actions p-0">
                                                <a class="card-header-action" data-toggle="collapse" href="#card3"
                                                    aria-expanded="false" aria-controls="card3">
                                                    <i data-feather="minus-circle" class="zoom-in hid"></i>
                                                    <i data-feather="plus-circle" class="zoom-out"></i>
                                                </a>
                                            </nav>
                                        </div>

                                        <div class="form collapse collapse" id="card3">
                                            <div class="form-group m-4">
                                                <div id="facilities-container-convenient"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card border-top-0">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="card-header-title">Dịch vụ</div>

                                            <nav class="card-header-actions p-0">
                                                <a class="card-header-action" data-toggle="collapse" href="#card4"
                                                    aria-expanded="false" aria-controls="card4">
                                                    <i data-feather="minus-circle" class="zoom-in hid"></i>
                                                    <i data-feather="plus-circle" class="zoom-out"></i>
                                                </a>
                                            </nav>
                                        </div>

                                        <div class="form collapse collapse" id="card4">
                                            <div class="form-group m-4">
                                                <div id="facilities-container-service"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card border-top-0">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="card-header-title">Tiện ích gia đình</div>

                                            <nav class="card-header-actions p-0">
                                                <a class="card-header-action" data-toggle="collapse" href="#card5"
                                                    aria-expanded="false" aria-controls="card5">
                                                    <i data-feather="minus-circle" class="zoom-in hid"></i>
                                                    <i data-feather="plus-circle" class="zoom-out"></i>
                                                </a>
                                            </nav>
                                        </div>

                                        <div class="form collapse collapse" id="card5">
                                            <div class="form-group m-4">
                                                <div id="facilities-container-family"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card border-top-0">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="card-header-title">An toàn và bảo mật</div>

                                            <nav class="card-header-actions p-0">
                                                <a class="card-header-action" data-toggle="collapse" href="#card6"
                                                    aria-expanded="false" aria-controls="card6">
                                                    <i data-feather="minus-circle" class="zoom-in hid"></i>
                                                    <i data-feather="plus-circle" class="zoom-out"></i>
                                                </a>
                                            </nav>
                                        </div>

                                        <div class="form collapse collapse" id="card6">
                                            <div class="form-group m-4">
                                                <div id="facilities-container-security"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card border-top-0">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="card-header-title">Tiện ích khác</div>

                                            <nav class="card-header-actions p-0">
                                                <a class="card-header-action" data-toggle="collapse" href="#card7"
                                                    aria-expanded="false" aria-controls="card7">
                                                    <i data-feather="minus-circle" class="zoom-in hid"></i>
                                                    <i data-feather="plus-circle" class="zoom-out"></i>
                                                </a>
                                            </nav>
                                        </div>

                                        <div class="form collapse collapse" id="card7">
                                            <div class="form-group m-4">
                                                <div id="facilities-container-other"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="admin-footer w-100 mt-10" style="height: 60px;"></div>
    </div>
    </div>
    <?php require ("../inc/footer.php") ?>
    <script>
        $(document).ready(function () {

            $('#roomSelect').change(function () {
                var roomId = $(this).val();
                if (roomId) {
                    load();
                    $.ajax({
                        url: '/admin/ajax/rooms.php', // Tập lệnh PHP mà bạn sẽ gửi AJAX request tới
                        type: 'POST',
                        dataType: 'json',
                        data: { get_room: roomId },
                        success: function (data) {
                            closeload();
                            // Truy cập vào đối tượng roomdata
                            var roomdata = data.roomdata;
                            $('#addr').val(roomdata.area);
                            $('#price_input').val(parseFloat(roomdata.price).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' vnđ/ngày');
                            $('#adult_input').val(roomdata.adult_capacity + ' người');
                            $('#child_input').val(roomdata.children_capacity + ' người');
                            $('#room_input').val(parseFloat(roomdata.room_total).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' phòng');
                            $('#desc').val(roomdata.description.replace(/\r\n/g, "\n"));

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                            closeload();
                        }
                    });
                }
            });
            $('#roomSelect').change(function () {
                var roomId = $(this).val();
                if (roomId) {
                    $.ajax({
                        url: '/admin/ajax/rooms.php', // Điều chỉnh đường dẫn phù hợp với cấu trúc thư mục của bạn
                        type: 'POST',
                        dataType: 'json',
                        data: { room_id: roomId },

                        success: function (response) {
                            closeload();
                            if (response.status === 'success') {
                                if (response.images) {
                                    // Xóa nội dung hiện tại của .swiper-wrapper
                                    $(".swiper-wrapper").empty(); // Xóa hiện tại
                                    response.images.forEach(imageSrc => { // Lặp và thêm lại
                                        $(".swiper-wrapper").append(`
                                            <div class="swiper-slide" data-src="${imageSrc}">
                                                <div class="box">
                                                    <div class="image">
                                                        <img src="/admin/images/${imageSrc}" class="img-fluid" alt="Room Image">
                                                    </div>
                                                    <div class="content content-header">
                                                        <button class="btn btn-more" type="button">Hiển thị toàn ảnh</button>
                                                    </div>
                                                </div>
                                            </div>
                                        `);
                                    });
                                    var swiper = new Swiper(".swiper-container", {
                                        slidesPerView: 1,
                                        spaceBetween: 30,
                                        loop: true,
                                        pagination: {
                                            el: '.swiper-pagination',
                                            clickable: true,
                                        },
                                        navigation: {
                                            nextEl: ".swiper-button-next",
                                            prevEl: ".swiper-button-prev",
                                        },
                                    });
                                }
                                if (response.facilities) {
                                    $('.facility-checkbox').prop('checked', false);

                                    // Duyệt qua mảng facilities từ response
                                    response.facilities.forEach(function (facilityId) {
                                        // Set checked cho checkbox có giá trị tương ứng
                                        $('#facility_' + facilityId).prop('checked', true);
                                    });
                                }
                                response.status_info.forEach(function (statusInfo) {
                                    switch (statusInfo.status) {
                                        case "Có sẵn":
                                            $("#sts_avai").val(statusInfo.quantity);
                                            break;
                                        case "Đang sửa chữa":
                                            $("#sts_pair").val(statusInfo.quantity);
                                            break;
                                        case "Đã đặt":
                                            $("#sts_booked").val(statusInfo.quantity);
                                            break;
                                    }
                                });

                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                            closeload();
                        }
                    });
                }
            });
            $(".swiper-wrapper").on("click", ".btn-more", function () {
                // Lấy src của ảnh từ data-src của .swiper-slide chứa nút được nhấp
                const imageSrc = $(this).closest('.swiper-slide').data('src');

                // Tạo HTML cho ảnh toàn màn hình
                const fullSizeImageHtml = `
                <img src="/admin/images/${imageSrc}" class="img-fluid" alt="Room Image" style="display:block; margin:auto; max-width:70%;">`;
                // Xóa nội dung hiện tại của overlay và thêm ảnh mới
                $('#overlayContent').html(fullSizeImageHtml);

                // Hiển thị overlay
                $('#Overlay').fadeIn();

                // Sự kiện click cho nút đóng overlay
                $('#closeOverlay').off('click').on('click', function () {
                    $('#Overlay').fadeOut();
                });
            });


        });

        $(document).ready(function () {
            $.ajax({
                url: '/admin/ajax/get_facilities.php',
                type: 'GET',
                success: function (response) {
                    if (response.status == 'success') {
                        var flt = response.facilities;
                        var count = 1;
                        $.each(response.facilities, function (index, flt) {
                            if (count < 7) {
                                $('#facilities-container-basic').append(
                                    '<div class="form-group m-4">' +
                                    '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" disabled />' +
                                    '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                                    '</div>'
                                );
                            }
                            else if (count >= 7 && count < 11) {
                                $('#facilities-container-convenient').append(
                                    '<div class="form-group m-4">' +
                                    '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" disabled />' +
                                    '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                                    '</div>'
                                );
                            }
                            else if (count >= 11 && count < 14) {
                                $('#facilities-container-service').append(
                                    '<div class="form-group m-4">' +
                                    '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" disabled />' +
                                    '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                                    '</div>'
                                );
                            }
                            else if (count >= 14 && count < 16) {
                                $('#facilities-container-family').append(
                                    '<div class="form-group m-4">' +
                                    '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" disabled />' +
                                    '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                                    '</div>'
                                );
                            }
                            else if (count >= 16 && count < 18) {
                                $('#facilities-container-security').append(
                                    '<div class="form-group m-4">' +
                                    '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" disabled />' +
                                    '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                                    '</div>'
                                );
                            }
                            else {
                                $('#facilities-container-other').append(
                                    '<div class="form-group m-4">' +
                                    '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" disabled />' +
                                    '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                                    '</div>'
                                );
                            }
                            count++
                        });
                    } else {
                        $('.notice').text('error:Lỗi khi tải tiện ích!');
                    }
                },
                error: function () {
                    $('.notice').text("error: Đã có lỗi xảy ra!");
                }
            });        
        });
        $(document).ready(function () {
            $("#btnDel").on('click', function (event) {
                event.preventDefault(); 
                var selectedRooms = []; 
                    $(".table-select-row:checked").each(function(){
                        // Lấy giá trị của thẻ input 'input-select-control' tương ứng
                        var roomId = $(this).closest("td").find(".input-select-control").val();

                        // Thêm giá trị vào mảng
                        selectedRooms.push(roomId);
                    });
                var roomIds = selectedRooms; // Nếu roomSelect là một multi-select

                if (roomIds.length > 0) {
                    load();
                    $.ajax({
                        url: '/admin/ajax/rm_room.php',
                        type: 'POST',
                        dataType: 'json',
                        data: { room_ids: JSON.stringify(roomIds) }, // Giả định rằng roomIds là một mảng
                        success: function (response) {
                            closeload();
                            if(response.status){
                                createToast(response.status, response.message);
                            }
                        },
                        error: function (xhr, status, error) {
                            closeload();
                            createToast("error", "Đã có lỗi xảy ra!");
                        }
                    });
                }
            });
        });

    </script>
</body>

</html>