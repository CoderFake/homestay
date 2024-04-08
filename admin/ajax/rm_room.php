<?php

session_start();
require '../inc/essentials.php';
adminLogin();
require '../inc/db_config.php';
if (isset($_POST['room_ids'])) {
    // Giả định $_POST['room_ids'] là một mảng JSON-encoded
    $roomIds = json_decode($_POST['room_ids'], true);

    if (!is_array($roomIds)) {
        echo json_encode(['status' => 'error', 'message' => 'Homestay không tồn tại!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit();
    }

    $roomIds = filteration($roomIds);
    $con = $GLOBALS['con'];

    // Duyệt qua từng room_id và cập nhật cột 'removed'
    foreach ($roomIds as $id) {
        $sql = "UPDATE rooms SET removed = 1 WHERE room_id = ?";
        $stmt = $con->prepare($sql);
        if (!$stmt) {
            continue; 
        }
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

    // Xóa các bản ghi trong các bảng khóa ngoại và đặt lại AUTO_INCREMENT
    $tables = ['room_facilities', 'room_images', 'room_status'];
    foreach ($tables as $table) {
        foreach ($roomIds as $id) {
            $sql = "DELETE FROM $table WHERE room_id = ?";
            $stmt = $con->prepare($sql);
            if (!$stmt) {
                continue; // Skip to the next room_id
            }
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();
        }
        resetAutoIncrement($table);
    }
    deleteMultipleRoomDirectories($roomIds);
    echo json_encode(['status' => 'success', 'message' => 'Xoá phòng thành công!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

?>