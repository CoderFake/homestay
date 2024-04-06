<?php
session_start();
require '../inc/essentials.php';
adminLogin();
require '../inc/db_config.php'; // Đường dẫn đến file kết nối cơ sở dữ liệu của bạn

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nhận dữ liệu từ AJAX và kiểm tra xem dữ liệu có tồn tại không trước khi sử dụng
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $area = isset($_POST['area']) ? $_POST['area'] : '';
    $price = isset($_POST['price']) ? preg_replace('/[^\d]/', '', $_POST['price']) : 0;
    $room_total = isset($_POST['room_total']) ? (int)filter_var($_POST['room_total'], FILTER_SANITIZE_NUMBER_INT) : 0;
    $adult_capacity = isset($_POST['adult_capacity']) ? (int)filter_var($_POST['adult_capacity'], FILTER_SANITIZE_NUMBER_INT) : 0;
    $children_capacity = isset($_POST['children_capacity']) ? (int)filter_var($_POST['children_capacity'], FILTER_SANITIZE_NUMBER_INT) : 0;
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $facilities = isset($_POST['facilities']) ? $_POST['facilities'] : [];

    // Kiểm tra các trường bắt buộc
    if (empty($name) || empty($area) || $price <= 0 || $room_total <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin bắt buộc.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }
    // Thêm thông tin phòng vào bảng `rooms`
    $sql = "INSERT INTO rooms (name, area, price, room_total, adult_capacity, children_capacity, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssdiiis", $name, $area, $price, $room_total, $adult_capacity, $children_capacity, $description);
    $stmt->execute();
    $room_id = $stmt->insert_id; // Lấy ID của phòng mới được thêm

    // Thêm các tiện ích vào bảng `room_facilities`
    foreach ($facilities as $facility_id) {
        $sql = "INSERT INTO room_facilities (room_id, facility_id) VALUES (?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ii", $room_id, $facility_id);
        $stmt->execute();
    }
    // Thêm trạng thái phòng vào bảng `room_status`
    $status = "Có sẵn";
    $sql = "INSERT INTO room_status (room_id, status, quantity) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    $room_total_available = $room_total; // Giả sử này là số lượng phòng có sẵn bạn muốn thêm
    $stmt->bind_param("isi", $room_id, $status, $room_total_available);
    $stmt->execute();
    
    // Trạng thái "Đang sửa chữa" với giá trị mặc định là 0
    $status = "Đang sửa chữa";
    $room_total_repair = 0; // Số lượng phòng đang sửa chữa, mặc định là 0
    $stmt->bind_param("isi", $room_id, $status, $room_total_repair);
    $stmt->execute();
    
    // Trạng thái "Đã đặt" với giá trị mặc định là 0
    $status = "Đã đặt";
    $room_total_booked = 0; // Số lượng phòng đã đặt, mặc định là 0
    $stmt->bind_param("isi", $room_id, $status, $room_total_booked);
    $stmt->execute();

    // Tạo thư mục cho phòng mới
    $uploadDir = '/../images/rooms/' . $room_id . '/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    if (!empty($_FILES['roomImages']['name'][0])) {
        uploadRoomImages($room_id);
        updateRoomImagesInDatabase($room_id);
    }

    echo json_encode(['status' => 'success', 'message' => 'success:Phòng đã được tạo thành công và thư mục đã được tạo.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
} else {
    echo json_encode(['status' => 'error', 'message' => 'error:Phương thức không được hỗ trợ'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

?>
