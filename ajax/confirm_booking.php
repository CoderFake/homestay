<?php
require_once('../admin/inc/db_config.php');
require_once('../admin/inc/essentials.php');

//hàm này sẽ là xác nhận cái booking của thằng user
//hàm này sẽ là hàm kiếm tra xem cái thg user nó nhập vào ngày check in check out có chuẩn không

if(isset($_POST['check_availability'])){

    $frm_data = filteration($_POST);
    $status = "";//tạo ra 2 biến
    $result= "";

    $today_date = new DateTime(date("Y-m-d"));//biến này để lưu ngày mà user book cái phòng đấy
    //giá trị today_date này sẽ được tự động thêm vào
    $checkin_date = new DateTime($frm_data['check_in']);
    $checkout_date = new DateTime($frm_data['check_out']);



    if($checkin_date == $checkout_date){//nếu mà chếch in == ngày check out thì sẽ hiển thi ra cái thông báo như dưới
        $status = 'check_in_out_equal';
        $result = json_encode(["status" =>$status]);

    }
    else if($checkout_date < $checkin_date){//các trường hợp nhập sai đây
        $status = 'check_out_earlier';
        $result = json_encode(["status" =>$status]);
    }else if($checkin_date < $today_date){
        $status = 'check_in_earlier';
        $result = json_encode(["status" =>$status]);
    }
    if($status !=''){//hàm này sẽ là nếu mà cái status không bằng cái ''(tức là  có thông báo lỗi) thì in ra cái réult
        echo $result;
    }
    else{//nếu mà không có lỗi thì chạy xuống đây
        //bắt đầu khởi tạo sesion trên trang web
        session_start();
        $_SESSION['room'];
        //chuyền vào các giá trị của room cho session

        $count_days = date_diff($checkin_date,$checkout_date)->days;
        //biến này để đếm ngày khi mà thằng user nó chọn ngày checkin checkout
        $payment = $_SESSION['room']['price'] * $count_days;
        //biến này để tính tổng tiền

        $_SESSION['room']['payment'] = $payment;//gán các giá trị của biến vào session để tí còn dùng để lưu vào database
        $_SESSION['room']['available'] = true;

        $result = json_encode(["status"=>'available',"days"=>$count_days,"payment"=>$payment]);
        //biến này sẽ chuyền giá trị lại trang hiển thị để tính tiền cũng như là cho thực hiện ấn nút thanh toán
        echo $result;

    }




}



?>