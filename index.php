<?php
session_start();
require_once ('admin/inc/db_config.php');
require_once ('admin/inc/essentials.php');
$data_homestay = readConfig();

// Lấy thông tin phòng từ cơ sở dữ liệu
function getRoomDetails()
{
    global $con;
    $query = "SELECT rooms.*, room_status.status AS room_status, room_images.image_url AS thumbnail 
          FROM `rooms` 
          JOIN `room_status` ON rooms.room_id = room_status.room_id AND room_status.status = 'Có sẵn'
          LEFT JOIN `room_images` ON rooms.room_id = room_images.room_id AND room_images.is_thumbnail = 1
          WHERE rooms.removed = 0";
    $result = mysqli_query($con, $query);
    $rooms = [];

    while ($room_data = mysqli_fetch_assoc($result)) {
        // Định nghĩa đường dẫn ảnh mặc định nếu không có thumbnail
        $defaultThumbnailPath = 'images/logo.jpg'; // Đường dẫn ảnh mặc định, bạn cần thay thế bằng đường dẫn thực tế

        // Kiểm tra và thiết lập thumbnail cho phòng
        $thumbnailPath = isset($room_data['thumbnail']) ? ROOMS_IMG_PATH . $room_data['thumbnail'] : $defaultThumbnailPath;

        // Thêm thông tin phòng vào mảng
        $rooms[] = [
            'room_id' => $room_data['room_id'],
            'name' => $room_data['name'],
            'area' => $room_data['area'],
            'price' => $room_data['price'],
            'room_total' => $room_data['room_total'],
            'adult_capacity' => $room_data['adult_capacity'],
            'children_capacity' => $room_data['children_capacity'],
            'description' => $room_data['description'],
            'status' => $room_data['room_status'],
            'thumbnail' => $thumbnailPath,
        ];
    }

    return $rooms;
}

$rooms = getRoomDetails();
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require ('inc/links.php'); ?>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/nav.css">

</head>

<body>
    <?php require ('inc/header.php'); ?>
    <section id="home">
        <div class="img-home"><img src="images/<?php echo $data_homestay['header_image']; ?>" alt="Header Image"></div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <section id="about">
                    <h1 class="heading" <span>giới thiệu</span> </h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="image">
                                <img src="images/<?php echo $data_homestay['about_image']; ?>" alt="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="content">
                                <h3>Chúng tôi có thể thỏa mãn bạn không ?</h3>
                                <p>
                                    <?php echo $data_homestay['description']; ?>
                                </p>
                                <p>hơn 20+ địa điểm homestay tại hà nội đang chờ bạn ghé thăm!</p>
                                <a href="#" class="btn-outline-secondary text-dark">Tìm hiểu thêm</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="container">
                                <h2>Trải nghiệm tuyệt vời tại <p>
                                        <?php echo $data_homestay['homeStayName']; ?>
                                    <p>
                                </h2>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="icon-box">
                                            <span class="icon"><i class="fas fa-headset"></i></span>
                                            <div class="content">
                                                <h5>Hỗ trợ khách hàng 24/7</h5>
                                                <p>Liên hệ với nhân viên tư vấn của chúng tôi mọi lúc, mọi nơi.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="icon-box">
                                            <span class="icon"><i class="fas fa-search"></i></span>
                                            <div class="content">
                                                <h5>Hỗ trợ bạn đặt phòng theo nhu cầu</h5>
                                                <p>Chúng tôi giúp bạn tìm được sản phẩm phù hợp nhất với nhu cầu của bạn
                                                    với mức giá hợp lý.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="icon-box">
                                            <span class="icon"><i class="fas fa-umbrella-beach"></i></span>
                                            <div class="content">
                                                <h5>Linh hoạt</h5>
                                                <p>Chúng tôi giúp bạn hủy phòng trong trường hợp kế hoạch của bạn bị
                                                    thay đổi.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-12">
                <section id="homestay">
                    <div class="container">
                        <h1 class="heading">home<span>stay</span></h1>
                        <?php
                            // Sử dụng hàm selectAll() để lấy tất cả các phòng
                            $sql = "SELECT * FROM rooms WHERE removed = ?";
                            $values = array(0);
                            $datatypes = 'i';
                            $rooms = select($sql, $values, $datatypes);
                            $defaultThumb = "/images/" . $data_homestay['logo_image'];
                            $count = 0; // Biến đếm để kiểm soát việc xuất hàng mới sau mỗi 4 phòng
                        ?>
                        <div class="row d-none d-sm-flex">
                        <?php
                            foreach ($rooms as $room_data) {
                                $thumbData = select("SELECT image_url FROM room_images WHERE room_id = ? AND is_thumbnail = 1 LIMIT 1", [$room_data['room_id']], 'i');
                                $room_thumb = $defaultThumb;
                                if ($thumbData && $thumbRow = mysqli_fetch_assoc($thumbData)) {
                                    $room_thumb = ROOMS_IMG_PATH . $thumbRow['image_url'];
                                }

                                if ($count > 0 && $count % 4 == 0) {
                                    echo '</div><div class="row">';
                                }
                        ?>
                            <div class="col-md-3 col-sm-6 mb-4 d-none d-sm-flex">
                                <div class='box'>
                                    <div class='image'>
                                        <img src='<?php echo htmlspecialchars($room_thumb); ?>' class='img-fluid'
                                            alt='Room Thumbnail'>
                                    </div>
                                    <div class='content'>
                                        <h5>
                                            <?php echo htmlspecialchars($room_data['name']); ?>
                                        </h5>

                                        <div class='price'>
                                            <?php echo number_format($room_data['price'], 0, ',', '.'); ?> VNĐ
                                        </div>
                                        <a href='room_details.php?id=<?php echo $room_data['room_id']; ?>'
                                            class='btn custom-bg'>Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $count++; // Tăng sau mỗi phòng
                                }
                                if ($count > 0) {
                                    echo '</div>'; // Đóng thẻ div.row cuối cùng nếu có ít nhất một phòng được xuất
                                }
                            ?>           
                        </div>
                        <!-- Swiper -->
                        <div class="swiper-container d-flex d-sm-none">
                            <div class="swiper-wrapper">
                                <!-- Lặp qua mỗi phòng và in ra thông tin tương ứng -->
                                <?php foreach ($rooms as $room_data):
                                    $thumbData = select("SELECT image_url FROM room_images WHERE room_id = ? AND is_thumbnail = 1 LIMIT 1", [$room_data['room_id']], 'i');
                                    $room_thumb = $defaultThumb;
                                    if ($thumbData && $thumbRow = mysqli_fetch_assoc($thumbData)) {
                                        $room_thumb = ROOMS_IMG_PATH . $thumbRow['image_url'];
                                    }
                                ?>
                                <div class="swiper-slide">
                                    <div class="box">
                                        <div class='image'>
                                            <img src='<?php echo htmlspecialchars($room_thumb); ?>' class='img-fluid' alt='Room Thumbnail'>
                                        </div>
                                        <div class='content'>
                                            <h6><?php echo htmlspecialchars($room_data['name']); ?></h6>
                                            <div class='price'><?php echo number_format($room_data['price'], 0, ',', '.'); ?> VNĐ</div>
                                            <a href='room_details.php?id=<?php echo $room_data['room_id']; ?>' class='btn custom-bg'>Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-12">
            <section id="contact">
                <h1 class="heading"> <span>liên</span> hệ </h1>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="icons">
                                <i class="fas fa-phone">
                                    <p>Hotline</p>
                                </i>
                                <p>
                                    <?php echo $data_homestay['phone']; ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="icons">
                                <i class="fas fa-envelope">
                                    <p>Email</p>
                                </i>
                                <p>
                                    <?php echo $data_homestay['email']; ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="icons">
                                <i class="fas fa-map-marker-alt">
                                    <p>Địa chỉ</p>
                                </i>
                                <p>
                                    <?php echo $data_homestay['address']; ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form method="POST" id="contactForm">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 contact">
                                            <div class="infor">
                                                <input class="send-msg" type="text" id="name" name="name" required />
                                                <label for="name" class="form-label">Họ tên</label>
                                            </div>
                                            <div class="infor">
                                                <input class="send-msg" type="email" id="email" name="email" required />
                                                <label for="email" class="form-label">Email</label>
                                            </div>
                                            <div class="infor">
                                                <input class="send-msg" type="text" id="phone" name="phone" required />
                                                <label for="phone" class="form-label">Số điện thoại</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="infor">
                                                <textarea class="msg-box" id="" cols="30" rows="10" name="message"
                                                    required></textarea>
                                                <label for="phone" class="form-label">Lời nhắn</label>
                                            </div>
                                            <input type="submit" value="Gửi" class="btn custom" name="send">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <iframe class="map" src="<?php echo $data_homestay['map']; ?>"
                                allowfullscreen=true></iframe>
                        </div>
                    </div>
                </div>
            </section>
            <div class="space" style="margin:30px;"></div>
        </div>
    </div>
    </div>
    <?php
    require ('inc/footer.php');?>
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                
                $.ajax({
                    type: 'POST',
                    url: '/admin/ajax/contact_process.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        $('#formResponse').html(`<div class="notice">${response.message}</div>`);
                    },
                    error: function() {
                        $('#formResponse').html('<div class="notice">error:Gửi tin nhắn thất bại!');
                    }
                });
                    
            });
        });
    </script>

</body>

</html>