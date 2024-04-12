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
$showAllButton = false; // Biến để xác định có hiển thị nút xem tất cả không

// Nếu có ít hơn hoặc bằng 5 ảnh, hiển thị tất cả, nếu không chỉ hiển thị 5 và có nút xem thêm
if (count($roomImages) > 5) {
    $roomImages = array_slice($roomImages, 0, 5);
    $showAllButton = true;
}

// Lấy thumbnail, nếu không có thì dùng ảnh mặc định
$thumbnailImage = isset($roomDetails['thumbnail']) && $roomDetails['thumbnail'] ? ROOMS_IMG_PATH . $roomDetails['thumbnail'] : $defaultImage;

function getRoomFacilitiesById($roomId)
{
    global $con;
    $query = "SELECT f.icon, f.name, f.description 
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


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require ('inc/links.php'); ?>
    <link rel="stylesheet" href="css/room_details.css">
    <link rel="stylesheet" href="css/nav.css">

</head>

<body>
    <?php require ('inc/header.php'); ?>
    <div class="container">
        <h1 class="homestay-name justify-content-start d-sm-flex"><?php echo htmlspecialchars($roomDetails['name']); ?></h1>
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
        <div class="row">
                <div class="col-lg-8 mt-5">
                    <div class="row">
                        <?php foreach ($roomFacilities as $facility): ?>
                            <div class="col-sm-3">
                                <div class="facility">
                                    <span><?php echo htmlspecialchars($facility['name']); ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Các nội dung khác của cột này -->
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

</body>

</html>