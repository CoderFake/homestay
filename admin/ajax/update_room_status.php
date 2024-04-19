<?php
require '../inc/essentials.php';
require '../inc/db_config.php'; 

// Hàm để cập nhật trạng thái phòng
function updateRoomStatus() {
    global $con;
    $currentDate = date('Y-m-d');
    $currentTime = date('H:i:s');

    // SQL để lấy các booking đã hết hạn
    $sql = "SELECT room_id, rooms_required FROM booking_order WHERE check_out_date < '$currentDate' OR (check_out_date = '$currentDate' AND departure_time < '$currentTime') AND booking_status = 'success'";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $roomId = $row['room_id'];
            $roomsRequired = $row['rooms_required'];

            // Cập nhật room_status
            $updateSql = "UPDATE room_status SET quantity = quantity + $roomsRequired WHERE room_id = $roomId AND status = 'Có sẵn'";
            $con->query($updateSql);

            $updateSql = "UPDATE room_status SET quantity = quantity - $roomsRequired WHERE room_id = $roomId AND status = 'Đã đặt'";
            $con->query($updateSql);
        }
    }

    $con->close();
    return json_encode(['status' => 'success', 'message' => 'Room status updated']);
}

echo updateRoomStatus();
?>
