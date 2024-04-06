
<?php
require_once('../inc/db_config.php');

// Hàm xử lý lọc dữ liệu đầu vào
function filterInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Kiểm tra xem có phải là yêu cầu POST không và các trường bắt buộc có được gửi kèm không
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['message'])) {
    // Lọc dữ liệu đầu vào
    $name = filterInput($_POST['name']);
    $email = filterInput($_POST['email']);
    $phone = filterInput($_POST['phone']);
    $message = filterInput($_POST['message']);

    // Câu lệnh SQL để chèn dữ liệu vào bảng `user_queries`
    $sql = "INSERT INTO user_queries (name, email, phone, message) VALUES (?, ?, ?, ?)";

    // Chuẩn bị câu lệnh SQL
    if ($stmt = $con->prepare($sql)) {
        // Liên kết các biến với các tham số của câu lệnh SQL
        $stmt->bind_param("ssss", $name, $email, $phone, $message);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'success:Gửi tin nhắn thành công!'],  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'error:Gửi tin nhắn thất bại!'],  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }

        // Đóng câu lệnh
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'error:Lỗi chuẩn bị truy vấn cơ sở dữ liệu!'],  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    // Đóng kết nối cơ sở dữ liệu
    $con->close();
} else {
    // Nếu không phải là yêu cầu POST hoặc thiếu dữ liệu
    echo json_encode(['status' => 'error', 'message' => 'error:Dữ liệu không hợp lệ hoặc thiếu!'],  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}
?>
