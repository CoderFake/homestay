<?php
require_once('admin/inc/db_config.php'); 
require_once('inc/essentials.php'); 

session_start();

// Kiểm tra xem user_id có tồn tại trong session
if(isset($_SESSION['user_id'])) {
    global $con;
    $userId = $_SESSION['user_id']; // Lấy user_id từ session

    // Câu lệnh SQL để cập nhật trạng thái đăng nhập của người dùng
    $sql = "UPDATE `users` SET `status` = 0 WHERE `user_id` = ?";
    
    // Chuẩn bị câu lệnh SQL
    if ($stmt = mysqli_prepare($con, $sql)) {
        // Liên kết biến $userId vào câu lệnh SQL đã chuẩn bị
        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        // Thực thi câu lệnh
        mysqli_stmt_execute($stmt);
        
        // Kiểm tra xem có hàng nào được cập nhật không
        mysqli_stmt_close($stmt);
    } 
}

// Hủy tất cả session
session_destroy();

// Chuyển hướng về trang chủ
redirect('index.php');
?>
