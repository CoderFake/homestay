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
        <div class="adminx-content">
            <div class="adminx-main-content" style="padding-bottom:60px;">
                <div class="container-fluid">
                    <!-- BreadCrumb -->
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/rooms/rd_room.php">Quản lý homestay</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa thông tin homestay</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="pb-3 text-center text-md-left">
                                <h2 class="my-4">Sửa thông tin homestay</h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group d-flex justify-content-end align-items-center">
                                <button type="submit" id="submitBtn" class="btn btn-success">Cập nhật</button>
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
                                                    <div class="row">
                                                    
                                                        <div class="col-sm-6">
                                                            <select class="form-control" id="roomSelect" name="room_id">
                                                                <option value="">Chọn phòng</option>
                                                                <?php foreach ($rooms as $room): ?>
                                                                    <option value="<?php echo $room['room_id']; ?>">
                                                                        <?php echo htmlspecialchars($room['name']); ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control h-100 w-100" style="color:#478efe; font-weight:bold;" id="hsName" value="" readonly/>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="area">Khu vực</label>
                                                    <div class="row">
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <select class="form-control address" id="district">
                                                                <option value="" selected>Chọn quận huyện</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <select class="form-control address" id="ward">
                                                                <option value="" selected>Phường xã</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4 mb-sm-0">
                                                            <input class="form-control h-100" id="road" value=""
                                                                placeholder="Số nhà, tên đường" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="price">Giá phòng</label>
                                                    <div class="row">
                                                        <div class="col-md-4 pt">
                                                            <input style="background-color: transparent;"
                                                                class="form-control w-100 mx-auto" name="price_input"
                                                                type="text" id="price_input" readonly value="">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="range-wrap w-100">
                                                                <div class="range-value" id="price_rangeV"></div>
                                                                <input id="price_range" type="range" min="0"
                                                                    max="5000000" value="100000" step="10000">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="room_amount">Số phòng</label>
                                                    <div class="row">
                                                        <div class="col-md-4 pt">
                                                            <input style="background-color: transparent;"
                                                                class="form-control w-100 mx-auto" type="text"
                                                                id="room_input" readonly value="">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="range-wrap w-100">
                                                                <div class="range-value" id="room_rangeV"></div>
                                                                <input id="room_range" type="range" name="room_amount"
                                                                    min="0" max="100" value="1" step="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="sts_avai"
                                                                    style="color:#258f01" ;>Có sẵn</label>
                                                                <input type="text" class="form-control h-100" value="1"
                                                                    id="sts_avai"
                                                                    style="padding: 11px 10px; background-color:#fff;"
                                                                    readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="sts_pair"
                                                                    style="color:#478efe;">Đang sửa chữa</label>
                                                                <select class="form-control" id="sts_pair"
                                                                    name="sts_pair">
                                                                    <option value="1">1</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="sts_booked"
                                                                    style="color:#df0015;">Đã đặt</label>
                                                                <input type="text" class="form-control h-100" value="1"
                                                                    id="sts_booked"
                                                                    style="padding: 11px 10px; background-color:#fff;"
                                                                    readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="adult">Người lớn</label>
                                                    <div class="row">
                                                        <div class="col-md-4 pt">
                                                            <input style="background-color: transparent;"
                                                                class="form-control w-100 mx-auto" type="text"
                                                                id="adult_input" readonly value="">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="range-wrap w-100">
                                                                <div class="range-value" id="adult_rangeV"></div>
                                                                <input id="adult_range" type="range" name="adult"
                                                                    min="0" max="10" value="1" step="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="child">Trẻ em</label>
                                                    <div class="row">
                                                        <div class="col-md-4 pt">
                                                            <input style="background-color: transparent;"
                                                                class="form-control w-100 mx-auto" type="text"
                                                                id="child_input" readonly value="">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="range-wrap w-100">
                                                                <div class="range-value" id="child_rangeV"></div>
                                                                <input id="child_range" type="range" name="child"
                                                                    min="0" max="10" value="1" step="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="card border-top-0">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="card-header-title">Thêm ảnh</div>
                                            <nav class="card-header-actions p-0">
                                                <a class="card-header-action" data-toggle="collapse" href="#card0"
                                                    aria-expanded="false" aria-controls="card">
                                                    <i data-feather="minus-circle" class="zoom-in hid"></i>
                                                    <i data-feather="plus-circle" class="zoom-out"></i>
                                                </a>
                                            </nav>
                                        </div>
                                        <div class="form collapse collapse" id="card0">
                                            <form id="crudform" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <div class="container">
                                                        <div class="drop-section">
                                                            <div class="cloud-icon">
                                                                <img src="/../../images/icons/cloud.png" alt="cloud">
                                                            </div>
                                                            <p>Kéo hoặc thả các file của bạn vào đây</p>
                                                            <p>Hoặc</p>
                                                            <button class="file-selector">Chọn file</button>
                                                            <input type="file" id="roomImages"
                                                                class="file-selector-input" name="roomImages[]"
                                                                multiple>
                                                        </div>
                                                        <div class="list-section">
                                                            <div class="list-title">Ảnh đã tải lên</div>
                                                            <div class="list"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
                                <div class="col-md-12 border-top-0">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="card-header-title">Mô tả homstay</div>

                                            <nav class="card-header-actions p-0">
                                                <a class="card-header-action" data-toggle="collapse" href="#card1"
                                                    aria-expanded="false" aria-controls="card1">
                                                    <i data-feather="minus-circle" class="zoom-in  hid"></i>
                                                    <i data-feather="plus-circle" class="zoom-out"></i>
                                                </a>

                                            </nav>
                                        </div>
                                        <div class="form collapse collapse" id="card1">
                                            <div class="form-group m-4">
                                                <textarea class="form-control p-10 w-60" name="" id="desc" cols="30"
                                                    rows="12"></textarea>
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
        function get_room_url(){
            var urlParams = new URLSearchParams(window.location.search);
            var searchValue = urlParams.get('room_id');
            return searchValue;
        }
        status = 0;
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
                                    '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" />' +
                                    '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                                    '</div>'
                                );
                            }
                            else if (count >= 7 && count < 11) {
                                $('#facilities-container-convenient').append(
                                    '<div class="form-group m-4">' +
                                    '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" />' +
                                    '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                                    '</div>'
                                );
                            }
                            else if (count >= 11 && count < 14) {
                                $('#facilities-container-service').append(
                                    '<div class="form-group m-4">' +
                                    '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" />' +
                                    '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                                    '</div>'
                                );
                            }
                            else if (count >= 14 && count < 16) {
                                $('#facilities-container-family').append(
                                    '<div class="form-group m-4">' +
                                    '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" />' +
                                    '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                                    '</div>'
                                );
                            }
                            else if (count >= 16 && count < 18) {
                                $('#facilities-container-security').append(
                                    '<div class="form-group m-4">' +
                                    '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" />' +
                                    '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                                    '</div>'
                                );
                            }
                            else {
                                $('#facilities-container-other').append(
                                    '<div class="form-group m-4">' +
                                    '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" />' +
                                    '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                                    '</div>'
                                );
                            }
                            count++
                        });
                        status = 1;
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
            loadLocations('district', 'R1903516');
            $('#district').on('change', function () {
                loadLocations('ward', $(this).val());
                $('#road').val('');
            });
            $('#ward').on('change', function () {
                $('#road').val('');
            });
            function loadLocations(type, parentId) {
                $.ajax({
                    url: '/admin/ajax/api.php',
                    type: 'GET',
                    data: { type: type, parentId: parentId },
                    success: function (data) {
                        var locations = JSON.parse(data);
                        var name = "";
                        if (type == 'district') name = "quận huyện";
                        else name = "phường xã";
                        $('#' + type).empty().append(new Option(`Chọn ${name}`, ""));
                        locations.forEach(function (location) {
                            $('#' + type).append(new Option(location.displayName, location.id));
                        });
                    }
                });
            }
        });
        $(document).ready(function () {
            var pair = 0;
            function updateRoomRangeMin() {
                // Lấy giá trị của 'Đã đặt' và 'Đang sửa chữa', chuyển đổi sang số nguyên
                var stsBooked = parseInt($("#sts_booked").val(), 10) || 0;
                var stsPair = parseInt($("#sts_pair").val(), 10) || 0;
                var totalRooms = parseInt($("#room_input").val(), 10) || 0; // Giả sử bạn có trường này để lấy tổng số phòng

                // Cập nhật giá trị tối thiểu cho 'room_range'
                var minRoom = stsBooked;
                $("#room_range").attr('min', minRoom).val(Math.max($("#room_range").val(), minRoom));

                // Cập nhật giá trị của 'Có sẵn' dựa trên giá trị tối thiểu mới
                var availableRooms = totalRooms - stsBooked - stsPair;
                $("#sts_avai").val(availableRooms);

                // Đảm bảo rằng 'Đang sửa chữa' không vượt quá 'Có sẵn'
                var maxStsPair = Math.max(0, totalRooms - stsBooked);
                $("#sts_pair").val(Math.min(stsPair, maxStsPair));
            }
            function updateStsPairOptions() {
                var totalRooms = parseInt($("#room_input").val(), 10) || 0; // Lấy tổng số phòng từ input
                var bookedRooms = parseInt($("#sts_booked").val(), 10) || 0; // Lấy số phòng đã đặt
                var availableForRepair = totalRooms - bookedRooms; // Tính số phòng có thể sửa chữa

                // Xóa các option hiện tại trong dropdown
                $("#sts_pair").empty();

                // Thêm các option mới vào dropdown dựa trên số phòng có thể sửa chữa
                for (var i = 0; i <= availableForRepair; i++) {
                    $("#sts_pair").append(`<option value="${i}">${i}</option>`);
                }
                $("#sts_pair").val(pair).trigger('change');
            }


            // Gọi hàm updateRoomRangeMin khi có sự thay đổi trong 'sts_booked' hoặc 'sts_pair'
            $("#sts_pair").on('input change', function () {
                updateRoomRangeMin();
            });

            // Gọi hàm này mỗi khi tổng số phòng hoặc số phòng đã đặt thay đổi
            $('#room_input, #room_range').on('change input', function () {
                updateRoomRangeMin(); // Đảm bảo cập nhật giá trị tối thiểu cho range input
                updateStsPairOptions();
            });

            $('#roomSelect').on('change', function () {
                window.location.href = '/admin/rooms/up_room.php?room_id=' + $('#roomSelect option:selected').val();
            });

            if(get_room_url() && status) {
                var roomId = get_room_url();
                if (roomId) {
                    load();
                    $.ajax({
                        url: '/admin/ajax/rooms.php', // Tập lệnh PHP mà bạn sẽ gửi AJAX request tới
                        type: 'POST',
                        dataType: 'json',
                        data: { get_room: roomId },
                        success: function (data) {
                            closeload();
                            if(data.status =="success"){
                            // Truy cập vào đối tượng roomdata
                                var roomdata = data.roomdata;
                                $('#hsName').val(roomdata.name);
                                var areaParts = roomdata.area.split(',');

                                if (areaParts.length >= 3) {
                                    var road = areaParts[0].trim(); // "62 ngách 1 Bùi Xương Trạch"
                                    var ward = areaParts[1].trim(); // "Phường Khương Đình"
                                    var district = areaParts[2].trim(); // "Quận Thanh Xuân"
                                    // Tương tự cho select quận
                                    $('#ward').empty();
                                    // Tạo và thêm option mới cho 'ward'
                                    var wardOption = $('<option>', {
                                        value: ward,
                                        text: ward,
                                        selected: true
                                    });
                                    
                                    $('#ward').append(wardOption);
                                    
                                    // Tạo và thêm option mới cho 'district'
                                    $('#district').empty();
                                    var districtOption = $('<option>', {
                                        value: district,
                                        text: district,
                                        selected: true
                                    });
                                    $('#district').append(districtOption);
                                    $('#road').val(road); // Tương tự như trên
                                    $('#price_range').val(parseFloat(roomdata.price).toFixed(0));
                                    $('#price_range').trigger('input');
                                    $('#room_range').val(roomdata.room_total);
                                    $('#room_range').trigger('input');
                                    $('#adult_range').val(roomdata.adult_capacity);
                                    $('#adult_range').trigger('input');
                                    $('#child_range').val(roomdata.children_capacity);
                                    $('#child_range').trigger('input');
                                    $('#desc').val(roomdata.description.replace(/\r\n/g, "\n"));
                                    updateRoomRangeMin();
                                    updateStsPairOptions();
                                }// Cập nhật thông tin phòng vào các input
                            }

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                            closeload();
                        }
                    });
                }
            }

            let imagesArray = [];
            let swiper;

            function initializeSwiper() {
                swiper = new Swiper(".swiper-container", {
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

            function updateSwiper() {
                $(".swiper-wrapper").empty(); // Xóa hiện tại
                imagesArray.forEach(imageSrc => { // Lặp và thêm lại
                    $(".swiper-wrapper").append(`
                        <div class="swiper-slide" data-src="${imageSrc}">
                            <div class="box">
                                <div class="image">
                                    <img src="/admin/images/${imageSrc}" class="img-fluid" alt="Room Image">
                                </div>
                                <div class="content content-header">
                                    <button class="btn btn-more" type="button">Hiển thị toàn ảnh</button>
                                </div>
                                <div class="content content-footer">
                                    <button class="btn btn-danger btn-sm rounded-2 rm-image" type="button" data-src="${imageSrc}"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    `);
                });
                swiper.update(); // Cập nhật Swiper
            }

            // Khởi tạo Swiper lần đầu
            initializeSwiper();
            if(get_room_url() && status) {
                var roomId = get_room_url();
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
                                    imagesArray = response.images; // Cập nhật mảng ảnh từ phản hồi
                                    updateSwiper(); // Cập nhật Swiper với ảnh mới
                                }
                                if (response.facilities) {
                                    $('.facility-checkbox').prop('checked', false);
                                        // Bỏ chọn tất cả các checkbox
                                    response.facilities.forEach(function(facilityId) {
                                        // Đánh dấu checked dựa trên facilityId
                                        $('#facility_' + facilityId).prop('checked', true);
                                    });
            
                                }
                                response.status_info.forEach(function (statusInfo) {
                                    switch (statusInfo.status) {
                                        case "Đang sửa chữa":
                                            pair = statusInfo.quantity;
                                            break;
                                        case "Đã đặt":
                                            $("#sts_booked").val(statusInfo.quantity);
                                            break;
                                    }
                                });
                                updateRoomRangeMin();
                                updateStsPairOptions();
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                            closeload();
                        }
                    });
                }
            }
            // Xử lý sự kiện click nút xóa hình ảnh
            $(".swiper-wrapper").on("click", ".rm-image", function () {
                const imageSrc = $(this).data('src'); // Lấy src của ảnh
                imagesArray = imagesArray.filter(src => src !== imageSrc); // Xoá khỏi mảng
                updateSwiper(); // Cập nhật lại Swiper
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

            $("#crudform").submit(function (event) {
                
                event.preventDefault(); // Ngăn chặn hành động mặc định của form submit// Ngăn chặn hành động mặc định của form submit
                var imageNames = []; // Khởi tạo mảng để lưu tên các ảnh
                roomId = get_room_url();
                if ($('.swiper-container').find('.swiper-wrapper').length > 0) {

                    $('.img-fluid').each(function () {
                        var src = $(this).attr('src'); // Lấy đường dẫn ảnh
                        // Điều chỉnh biểu thức chính quy để chấp nhận các đuôi file khác nhau
                        var match = src.match(/\/([0-9]+\.(png|jpg|jpeg|webp))$/);

                        if (match) {
                            imageNames.push(match[1]); // Thêm tên ảnh vào mảng nếu tìm thấy
                        }
                    });

                }
                // Tạo mảng để lưu tên file
                var fileNames = [];
                // Lấy tên các file được chọn
                $('.file-name .name').each(function () {
                    fileNames.push($(this).text());
                });
                // Tạo đối tượng FormData
                var formData = new FormData(this);
                formData.append('fileNames', encodeURIComponent(JSON.stringify(fileNames)));
                formData.append('imageNames', JSON.stringify(imageNames));
                // Thêm các giá trị khác vào formData
                formData.append('room_id', get_room_url());
                // lấy nội dung text của <option> được chọn
                formData.append('name', $('#hsName').val());
                formData.append('area', $('#road').val().trim() + ", " + $('#ward option:selected').text().trim() + ", " + $('#district option:selected').text().trim());
                formData.append('price', $("#price_input").val().replace(/[^\d]/g, ''));
                formData.append('room_total', $("#room_input").val().replace(/\D/g, ''));
                formData.append('room_pair', $("#sts_pair option:selected").val());
                formData.append('adult_capacity', $("#adult_input").val().replace(/\D/g, ''));
                formData.append('children_capacity', $("#child_input").val().replace(/\D/g, ''));
                formData.append('description', $("#desc").val());

                // Lấy các giá trị từ checkbox được check và thêm vào formData
                $(".facility-checkbox:checked").each(function () {
                    formData.append('facilities[]', $(this).val());
                });

                // Gửi AJAX
                if (get_room_url()) {
                    load();
                    $.ajax({
                        url: '/admin/ajax/up_room.php', // Thay đổi đường dẫn tới file xử lý của bạn
                        type: 'POST',
                        data: formData,
                        contentType: false, 
                        processData: false, 
                        success: function (response) {
                            closeload();
                            var result = JSON.parse(response);
                            if(result.status){
                                createToast(result.status, result.message);
                            }
                            setTimeout(function() {
                                $("#roomSelect option:selected").val(get_room_url()).trigger('change');
                            }, 3000);

                        },
                        error: function (xhr, status, error) {
                            createToast("error", "Đã có lỗi xảy ra, vui lòng tải lại trang!");
                        }
                    });
                }
            });
        });

    </script>
</body>

</html>