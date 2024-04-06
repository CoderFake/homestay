<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');
session_start();
//khi mà điền xong thông tin người dùng bấm vào nút paynow thì nó sẽ thực hiện hàm này
if(isset($_POST['pay_now'])){
//đầu tiên nó vẫn sẽ kiểm tra lại một lần xem cái session login có chuẩn không nếu mà đúng 
//là nó bằng true và nó tồn tại thì sẽ cho tiếp tục thực hiện còn nếu không thì trở về trang chủ
if(!(isset($_SESSION['login'])) && $_SESSION['login'] == true){
    redirect('index.php');
}
//cái ordid này mình sẽ cho nó randowm từ 11111 đến 99999 với thêm từ khóa ORD ở đầu để lưu dữ liệu thôi chứ k làm gì cả
$ORDER_ID = 'ORD_'.$_SESSION['uId'].random_int(11111,99999);
$CUST_ID = $_SESSION['uId'];
$CUST_PHONE = $_SESSION['uPhone'];

$TXN_AMOUNT = $_SESSION['room']['payment'];
$frm_data = filteration($_POST);
$ODER_NAME =$_SESSION['uName'];
$ROOM_Name = $_SESSION['room']['name'];
//đoạn này mình chuyển hết các biến session lưu dữ liệu của room và user sang bên 1 cái biến khác để chuyển nó vào database cho dễ

$query = "INSERT INTO `booking_order`( `user_id`, `room_id`, `check_in`, `check_out`, `order_id`) 
VALUES (?,?,?,?,?)";
insert($query,[$CUST_ID,$_SESSION['room']['id'],$frm_data['checkin'],$frm_data['checkout'],$ORDER_ID],'iisss');
//đầu tiên mình sẽ insert dữ liệu vào booking order trước
//dữ liệu vào booking ord sẽ là thông tin cơ bản thôi thế nhưng nó sẽ liên kết với bảng booking detail để xem chi tiế

$booking_id = mysqli_insert_id($con);
$query2 = "INSERT INTO `booking_details`( `booking_id`, `room_name`, `price`, `total_pay`, `user_name`, `phonenum`)
 VALUES (?,?,?,?,?,?)";
 //insert các thông tin vào trong bảng booking detail
 insert($query2,[$booking_id,$ROOM_Name,$_SESSION['room']['price'],$TXN_AMOUNT,$ODER_NAME,$CUST_PHONE],'isiisi');
 //
}

header("Location: http://localhost/homestay/user_book.php");
    exit;
?>