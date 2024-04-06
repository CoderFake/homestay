<?php
session_start();
require '../inc/essentials.php';
adminLogin();
require '../inc/db_config.php'; // Đường dẫn đến file kết nối cơ sở dữ liệu của bạn

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nhận dữ liệu từ AJAX và kiểm tra xem dữ liệu có tồn tại không trước khi sử dụng
    $room_id = isset($_POST['room_id']) ? $_POST['room_id'] : null;
    $name = $_POST['name'] ?? '';
    $area = $_POST['area'] ?? '';
    $price = preg_replace('/[^\d]/', '', $_POST['price'] ?? '0');
    $room_total = filter_var($_POST['room_total'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
    $room_pair = filter_var($_POST['room_pair'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
    $adult_capacity = filter_var($_POST['adult_capacity'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
    $children_capacity = filter_var($_POST['children_capacity'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
    $description = $_POST['description'] ?? '';
    $facilities = $_POST['facilities'] ?? [];
    $fileNames = json_decode(urldecode($_POST['fileNames'] ?? '[]'), true);
    $imageNames = json_decode($_POST['imageNames'] ?? '[]', true);


    // Kiểm tra các trường bắt buộc
    if (empty($room_id) || empty($name) || empty($area) || $price <= 0 || $room_total <= 0 || $room_pair < 0) {
        echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin bắt buộc.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }
    // cập nhật thông tin phòng vào bảng `rooms`
    $sql = "UPDATE rooms SET name = ?, area = ?, price = ?, room_total = ?, adult_capacity = ?, children_capacity = ?, description = ? WHERE room_id = ?";
    $stmt = $con->prepare($sql);
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Lỗi chuẩn bị truy vấn.']);
        exit;
    }
    $stmt->bind_param("ssdiiisi", $name, $area, $price, $room_total, $adult_capacity, $children_capacity, $description, $room_id);
    $stmt->execute(); 
    $stmt->close();

    // Xóa các tiện ích cũ
    $sql = "DELETE FROM room_facilities WHERE room_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $stmt->close();

    // Thêm các tiện ích mới
    // Thêm các tiện ích mới
    $stmt = $con->prepare("INSERT INTO room_facilities (room_id, facility_id) VALUES (?, ?)");
    foreach ($facilities as $facility_id) {
        if (!$stmt) {
            echo json_encode(['status' => 'error', 'message' => 'Lỗi chuẩn bị truy vấn.']);
            exit;
        }
        $stmt->bind_param("ii", $room_id, $facility_id);
        $stmt->execute();
    }
    $stmt->close(); // Chỉ đóng statement ở đây, sau khi hoàn thành vòng lặp

    resetAutoIncrement('room_facilities');

    $stmt = $con->prepare("SELECT COUNT(*) as booked_rooms FROM booking_order WHERE room_id = ? AND booking_status = 'success'");
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $booked_rooms = 0;
    if ($row = $result->fetch_assoc()) {
        $booked_rooms = $row['booked_rooms'];
    }
    $stmt->close();


    // Tính toán số lượng phòng có sẵn
    $available_rooms = $room_total - $booked_rooms - $room_pair;

    // Xóa trạng thái phòng cũ
    $stmt = $con->prepare("DELETE FROM room_status WHERE room_id = ?");
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $stmt->close();
    resetAutoIncrement('room_status');

    // Cập nhật trạng thái phòng mới
    $statuses = [
        ['Có sẵn', $available_rooms],
        ['Đang sửa chữa', $room_pair],
        ['Đã đặt', $booked_rooms]
    ];

    foreach ($statuses as $status) {
        $stmt = $con->prepare("INSERT INTO room_status (room_id, status, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $room_id, $status[0], $status[1]);
        $stmt->execute();
        $stmt->close();
    }
        // Tạo thư mục cho phòng nếu chưa có
    $uploadDir = __DIR__ . '/../images/rooms/' . $room_id . '/'; // Đường dẫn thư mục lưu trữ ảnh

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }


    renumberImages($room_id, $imageNames);

    if (!empty($_FILES['roomImages']['name'][0])) {
        uploadRoomImages($room_id);
    }
    if(!empty($_FILES['roomImages']['name'][0]) || !empty($imageNames)){
        updateRoomImagesInDatabase($room_id);
    }

    echo json_encode(['status' => 'success', 'message' => 'success:Cập nhật thông tin phòng thành công.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
} else {
    echo json_encode(['status' => 'error', 'message' => 'error:Phương thức không được hỗ trợ'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

?>