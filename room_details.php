<?php
session_start();
require_once ('admin/inc/db_config.php');
require_once ('admin/inc/essentials.php');
$data_homestay = readConfig();

// Lấy thông tin của một phòng từ cơ sở dữ liệu dựa trên ID
function getRoomDetailById($roomId)
{
    global $con;
    $query = "SELECT rooms.*, room_status.status AS room_status, room_images.image_url AS thumbnail 
              FROM `rooms` 
              JOIN `room_status` ON rooms.room_id = room_status.room_id 
              LEFT JOIN `room_images` ON rooms.room_id = room_images.room_id AND room_images.is_thumbnail = 1
              WHERE rooms.room_id = ? AND rooms.removed = 0 LIMIT 1";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'i', $roomId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $room_data = mysqli_fetch_assoc($result);

    return $room_data;
}

// Kiểm tra nếu 'room_detail' tồn tại trong query string của URL
if (isset($_GET['room_id'])) {
    $roomId = $_GET['room_id'];
    $roomDetails = getRoomDetailById($roomId);
    // Bây giờ $roomDetails sẽ chứa thông tin của phòng có id là $roomId
}
else redirect('index.php');

// Lấy tất cả ảnh của một phòng từ cơ sở dữ liệu dựa trên ID
function getRoomImagesById($roomId)
{
    global $con;
    $query = "SELECT image_url FROM room_images WHERE room_id = ?";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'i', $roomId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $images = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $images[] = ROOMS_IMG_PATH . $row['image_url']; // Đảm bảo ROOMS_IMG_PATH đã được định nghĩa
    }

    return $images;
}

// Kiểm tra nếu 'room_detail' tồn tại trong query string của URL
if (isset($_GET['room_id'])) {
    $roomId = $_GET['room_id'];
    $roomImages = getRoomImagesById($roomId);
    // Bây giờ $roomImages sẽ chứa mảng của tất cả ảnh phòng có id là $roomId
}

$defaultImage = '/images/logo.png'; // Đường dẫn ảnh mặc định

// Lấy thumbnail, nếu không có thì dùng ảnh mặc định
$thumbnailImage = isset($roomDetails['thumbnail']) && $roomDetails['thumbnail'] ? ROOMS_IMG_PATH . $roomDetails['thumbnail'] : $defaultImage;

function getRoomFacilitiesById($roomId)
{
    global $con;
    $query = "SELECT f.facility_id, f.icon, f.name, f.description 
              FROM `facilities` AS f
              JOIN `room_facilities` AS rf ON f.facility_id = rf.facility_id 
              WHERE rf.room_id = ?";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'i', $roomId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $facilities = [];
    while ($facility = mysqli_fetch_assoc($result)) {
        $facilities[] = $facility;
    }

    return $facilities;
}

// Kiểm tra nếu 'room_id' tồn tại trong query string của URL
if (isset($_GET['room_id'])) {
    $roomId = $_GET['room_id'];
    $roomFacilities = getRoomFacilitiesById($roomId);
    // sẽ chứa thông tin về các tiện ích của phòng có id là $roomId
}



function getRoomStatusById($roomId)
{
    global $con;
    $query = "SELECT rs.room_id, rs.status, rs.quantity
              FROM `room_status` AS rs
              WHERE rs.room_id = ? AND rs.status = 'Có sẵn'";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'i', $roomId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $roomStatus = [];
    if ($status = mysqli_fetch_assoc($result)) {
        $roomStatus = $status;
    }

    return $roomStatus;
}

if (isset($_GET['room_id'])) {
    $roomId = $_GET['room_id'];
    $roomStatus = getRoomStatusById($roomId);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require ('inc/links.php'); ?>
    <link rel="stylesheet" href="css/room_details.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="/css/calendar.css">

</head>

<body>
    <?php require ('inc/header.php'); ?>
    <div class="container mb-5">
        <h1 class="homestay-name justify-content-start d-sm-flex"><?php echo htmlspecialchars($roomDetails['name']); ?>
        </h1>
        <div class="star d-flex align-items-end mb-3">
            <div><img src="/images/icons/star.svg" alt="Star"></div>
            <div><img src="/images/icons/star.svg" alt="Star"></div>
            <div><img src="/images/icons/star.svg" alt="Star"></div>
            <div><img src="/images/icons/star.svg" alt="Star"></div>
            <div><img src="/images/icons/star.svg" alt="Star"></div>
            <div class="ms-2 mr-2 d-sm-flex"><span><?php echo htmlspecialchars($roomDetails['area']); ?></span></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 ml-5 mr-5">
                <div class="room-images">
                    <!-- Swiper for the smaller images -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php foreach ($roomImages as $imagePath): ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="Room Image"
                                        class="img-fluid">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-1 pb-5" style="border-bottom:1px solid #ccc;">
            <div class="col-lg-7 mt-5 h-100">
                <div class="row">
                    <?php foreach ($roomFacilities as $facility): ?>
                        <div class="col-sm-3 m-0 p-1">
                            <div class="facility">
                                <img
                                    src="/images/facilities/flt<?php echo htmlspecialchars($facility['facility_id']); ?>.svg">
                                <span><?php echo htmlspecialchars($facility['name']); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-5 mt-5 p-0">
                <div class="booking-container ml-lg-3 p-2">
                    <div class="date-picker-container ml-lg-1">
                        <input type="text" id="date-range" placeholder="Chọn ngày nhận và ngày trả" name="date-range"
                            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 40px;">
                        <div class="time-picker-container">
                            <div class="time-picker">
                                <label for="time-arrival">Giờ đến:</label>
                                <select id="time-arrival" name="time-arrival">
                                    <option value="00:00" selected>00:00</option>
                                    <?php for ($i = 1; $i < 24; $i++): ?>
                                        <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>:00">
                                            <?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>:00
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="time-picker">
                                <label for="time-departure">Giờ đi:</label>
                                <select id="time-departure" name="time-departure">
                                    <option value="00:00" selected>00:00</option>
                                    <?php for ($i = 1; $i < 24; $i++): ?>
                                        <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>:00">
                                            <?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>:00
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-2">
                        <div class="people">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="label-container">
                                        <span>Người lớn</span>
                                        <div class="number-picker-container adult">
                                            <div class="number-picker">
                                                <div class="number-picker-btn btn-minus"><img
                                                        src="/images/icons/minus.svg">
                                                </div>
                                                <div class="number-picker-number">1</div>
                                                <div class="number-picker-btn btn-plus"><img
                                                        src="/images/icons/plus.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="label-container">
                                        <span>Trẻ em</span>
                                        <div class="number-picker-container child">
                                            <div class="number-picker">
                                                <div class="number-picker-btn btn-minus"><img
                                                        src="/images/icons/minus.svg">
                                                </div>
                                                <div class="number-picker-number">1</div>
                                                <div class="number-picker-btn btn-plus"><img
                                                        src="/images/icons/plus.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="total mt-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="label-container">
                                        <span>Tổng phòng &#40;Có sẵn: <b
                                                style="color:green;"><?php echo htmlspecialchars($roomStatus['quantity']); ?></b>/<?php echo htmlspecialchars($roomDetails['room_total']); ?>&#41;:</span>
                                        <div id="rooms-required" style="color:#f46e39;">1</div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <div class="label-container">
                                        <span>Tổng tiền:</span>
                                        <div id="rooms-price" style="color:#f46e39;">1</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payment-container mt-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="label-container">
                                        <select class="pay-method">
                                            <option value="1" selected>Thanh toán online</option>
                                            <option value="0">Thanh toán khi nhận phòng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <div class="label-container d-flex justify-content-center">
                                        <input type="submit" class="btn btn-paynow" value="Thanh toán ngay">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-1 mt-4">
            <div class="col-sm-12">
                <div class="desc">
                    <h3 style="color:#f46e39;">Giới thiệu Homestay</h3>
                    <?php
                    $description = $roomDetails['description'];
                    $lines = explode("\n", $description);
                    ?>
                    <?php foreach ($lines as $line): ?>
                        <p class="homestay-infor p-1 m-0 pl-2">
                            <?php echo htmlspecialchars($line); ?>
                        </p>
                    <?php endforeach; ?>
                    <h5 class="flts pl" style="color:#f46e39;">Tiện ích Homestay</h5>
                    <?php foreach ($roomFacilities as $facility): ?>
                        <p class="homestay-infor p-1 m-0 pl-2">
                            <?php echo htmlspecialchars($facility['description']); ?>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    </div>


    <?php
    require ('inc/footer.php'); ?>
    <script>
        $(document).ready(function () {
            new Swiper('.swiper-container', {
                // Swiper options
                loop: true,
                spaceBetween: 10,
                slidesPerView: 1,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                // Responsive breakpoints
                breakpoints: {
                    // when window width is >= 768px
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    },
                    // when window width is >= 1024px
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 15
                    }
                }
            });
        });
        $(document).ready(function () {
            $('#contactForm').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '/admin/ajax/contact_process.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === "success")
                            createToast('success', response.message);
                        else
                            createToast('error', response.message);
                    },
                    error: function () {
                        createToast('error', response.message);
                    }
                });

            });
        });
    </script>
    <script>
        $(function () {
            $('#date-range').daterangepicker({
                autoUpdateInput: false,
                minDate: new Date(),
                locale: {
                    format: 'DD/MM/YYYY',
                    applyLabel: 'Áp dụng',
                    cancelLabel: 'Hủy bỏ',
                    fromLabel: 'Từ',
                    toLabel: 'Đến',
                    customRangeLabel: 'Tùy chỉnh',
                    weekLabel: 'W',
                    daysOfWeek: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                    monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu', 'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'],
                    firstDay: 1
                },
                opens: 'center',
                drops: 'down'
            });

            $('#date-range').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });

            $('#date-range').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
        });
        var roomDetails = {
            adult_capacity: <?php echo $roomDetails['adult_capacity']; ?>,
            children_capacity: <?php echo $roomDetails['children_capacity']; ?>,
            price: <?php echo $roomDetails['price']; ?>,
            avai: <?php echo $roomStatus['quantity']; ?>
        };
        $(document).ready(function () {
            function calculateDays() {
                var dateRange = $('#date-range').val();
                var timeArrival = $('#time-arrival option:selected').val();
                var timeDeparture = $('#time-departure option:selected').val();

                if (!dateRange.trim()) return 1;

                var dates = dateRange.split('-');
                var startDate = $.trim(dates[0]);
                var endDate = $.trim(dates[1]);

                var startDateTime = new Date(startDate.split('/')[2], startDate.split('/')[1] - 1, startDate.split('/')[0], timeArrival.split(':')[0], timeArrival.split(':')[1]);
                var endDateTime = new Date(endDate.split('/')[2], endDate.split('/')[1] - 1, endDate.split('/')[0], timeDeparture.split(':')[0], timeDeparture.split(':')[1]);

                var hoursDiff = (endDateTime - startDateTime) / 3600000;
                var days = Math.ceil(hoursDiff / 24);

                return days;
            }

            function updateRoomCount(days) {
                var adults = parseInt($('.number-picker-container.adult .number-picker-number').text());
                var children = parseInt($('.number-picker-container.child .number-picker-number').text());
                var totalPeople = adults + children;

                var roomCapacity = roomDetails.adult_capacity + roomDetails.children_capacity;
                var roomsRequired = Math.ceil(totalPeople / roomCapacity);
                roomsRequired = Math.min(roomsRequired, roomDetails.avai);

                $('#rooms-required').text(roomsRequired);

                var totalCost = roomsRequired * roomDetails.price * days;
                var formattedCost = totalCost.toLocaleString('vi-VN') + 'đ';

                $('#rooms-price').text(formattedCost);
            }

            // Sử dụng event delegation cho sự kiện change
            $(document).on('click', '.applyBtn', function () {
                var days = calculateDays();
                updateRoomCount(days);
            });

            $('.number-picker-btn').on('click', function () {
                var numberPicker = $(this).siblings('.number-picker-number');
                var currentValue = parseInt(numberPicker.text());
                if ($(this).hasClass('btn-plus')) {
                    numberPicker.text(currentValue + 1);
                } else if ($(this).hasClass('btn-minus') && currentValue > 0) {
                    numberPicker.text(currentValue - 1);
                }
                var days = calculateDays();
                updateRoomCount(days);
            });

            // Khởi tạo ban đầu
            updateRoomCount(calculateDays());
        });

    </script>
    <script>
        $(document).ready(function () {
            $('.btn-paynow').click(function (event) {
                event.preventDefault();

                var roomId = <?php echo json_encode($roomId); ?>;
                var roomName = <?php echo json_encode($roomDetails['name']); ?>;
                var dateRange = $('#date-range').val().trim().replace(/ /g, '');
                var dates = dateRange.split('-');
                var roomsRequired =  $('#rooms-required').text();
                var startDate = dates[0].split('/').reverse().join('-');
                var endDate = dates[1].split('/').reverse().join('-');
                var timeArrival = $('#time-arrival option:selected').val().trim().replace(/ /g, '');
                var timeDeparture = $('#time-departure option:selected').val().trim().replace(/ /g, '');
                var price = $('#rooms-price').text().replace(/đ/g, '').replace(/\./g, '').trim();
                var paymentMethod = $('.pay-method').val().trim();
                if (!roomId || !dateRange || !timeArrival || !timeDeparture || !price || !paymentMethod) {
                    createToast("error", "Vui lòng điền đầy đủ thông tin!");
                    return;
                }

                var redirectUrl = '/payment.php'
                $.ajax({
                    url: '/admin/ajax/check_login.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        room_id: roomId,
                        room_name: roomName,
                        startDate: startDate,
                        endDate: endDate,
                        time_arrival: timeArrival,
                        time_departure: timeDeparture,
                        roomsRequired : roomsRequired,
                        price: price,
                        payment_method: paymentMethod,
                        redirect: redirectUrl
                    },
                    success: function (data) {
                        if (data.loggedIn) {
                            window.location.href = redirectUrl;
                        } else {
                            window.location.href = '/acc.php';
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
            });
        });
    </script>

</body>

</html>