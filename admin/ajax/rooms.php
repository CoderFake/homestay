<?php
session_start();
require_once ('../inc/essentials.php');
adminLogin();
require_once ('../inc/db_config.php');
//kiểm tra xem người dùng đã đã đn dưới quyền admin chưa
//thêm phòng
if (isset($_POST['add_room'])) {//hàm room bên ajax
    $frm_data = filteration($_POST);
    //lấy dữ liệu từ html sang $POST rồi chuyển đổi kiểu dữ liệu và lưu vào $frm_data
    $q = "INSERT INTO `rooms` ( `name`, `area`, `price`, `adult`, `children`, `description` ) VALUES (?,?,?,?,?,?)";
    //câu lệnh sql thực hiện việc insert dữ liệu vào bảng `rooms` trong db 
    $values = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['adult'], $frm_data['children'], $frm_data['desc']];
    //các dữ liệu từ html được chuyển vào biến $value để thay thế vào các dấu hỏi chấm 
    if (insert($q, $values, 'ssiiis')) {
        echo 1;
        //nếu mà câu lệnh này chạy thành công thì hiển thị ra màn hình số 1
    } else {
        echo 0;//nếu không chạy thành công thì hiện ra số 0
    }
}

//hàm lấy dữ liệu của tất cả các phòng
if (isset($_POST['get_all_rooms'])) {
    $res = select("SELECT * FROM `rooms` WHERE `removed`=?", [0], 'i');
    //lấy dữ liệu của tất cả các phòng với điều kiện giá trị removed của room đấy bằng 0 (chưa bị xóa ) 
    //những phòng bị xóa sẽ vẫn còn trong database và nếu muốn xóa thì chúng ta sẽ vào xóa thủ công 
    //bởi vì nó còn có nhiều thuộc tính gắn liền ở các bảng khác mà nó liên kết nên nếu xóa thì sẽ gặp lỗi dữ liệu
    $i = 1;//hiển thị số thứ tự
    $data = "";
    while ($row = mysqli_fetch_assoc($res)) {
        //đi vào vòng lặp while với $row sẽ là tên biến để lấy các giá trị của room
        if ($row['status'] == 1) {
            //nếu mà cái giá trị status = 1 thì trang web sẽ hiển thị nút "hoạt động" 
            //nhấn nút hoạt động thì status về = 0 và không hoạt động
            $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>hoạt động</button>";
        } else {
            // hoặc ngược lại với trên
            $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-warning btn-sm shadow-none'>không hoạt động</button>";
        }
        //$data ở dưới này sẽ là hàm để hiển thị ra các giá trị của rooms
        //sử dụng php để hiển thị ra các giá trị của room       
        $data .= "
            <tr class='align-midle'>            
                <td>$i</td>     
                <td>$row[name]</td>   
                <td>$row[area]</td>   
                <td>
                    <span class='badge rounded-pill bg-light text-dark'>
                        người lớn: $row[adult]
                    <span><br>
                    <span class='badge rounded-pill bg-light text-dark'>
                        trẻ con: $row[children]
                    <span>               
                </td>                     
                <td>$row[price]</td>   
                <td>$row[description]</td>   

                <td>$status</td>      
                <td>
                <button type='button' onclick='edit_detail($row[id])' class='btn btn-dark shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                SỬA     
                </button>
                <button type='button' onclick=\"room_images($row[id],'$row[name]')\" class='btn btn-warning shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room-images'>
                HÌNH ẢNH     
                </button>
                <button type='button' onclick=\"remove_room($row[id])\" class='btn btn-danger shadow-none btn-sm' >
                XÓA     
                </button>
                     </td>
            <tr> ";
        // đoạn trên để code giao diện hiển thị
        $i++;//sau mỗi vòng lặp tăng i lên 1 giá trị để hiển thị thứ tự room
    }
    echo $data;//hàm này sẽ hiển thị ra trang web hàm $data chính là đoạn code html ở phía trên
}

if (isset($_POST['room_id'])) {
    $frm_data = filteration($_POST);
    $roomId = $frm_data['room_id'];
    $response = ['status' => 'error', 'message' => 'Lỗi tải dữ liệu'];
    // Kiểm tra xem 'room_id' có phải là số không
    if (is_numeric($roomId)) {
        // Nếu 'room_id' là số, tiếp tục xử lý...
        $response = ['status' => 'success', 'message' => 'Dữ liệu hợp lệ', 'room_id' => $roomId];
    } else {
        // Nếu 'room_id' không phải là số, thiết lập phản hồi lỗi
        $response = ['status' => 'error', 'message' => 'room_id không phải là số'];
    }
    // Lấy ảnh của phòng
    $query_images = "SELECT image_url FROM room_images WHERE room_id = ?";
    if ($stmt = $con->prepare($query_images)) {
        $stmt->bind_param("i", $roomId);
        $stmt->execute();
        $result = $stmt->get_result();
        $images = [];
        while ($row = $result->fetch_assoc()) {
            $images[] = $row['image_url'];
        }
        $stmt->close();
        $response['images'] = $images;
    }

    // Lấy trạng thái của phòng, bao gồm cả số lượng
    $query_status = "SELECT status, quantity FROM room_status WHERE room_id = ?";
    if ($stmt = $con->prepare($query_status)) {
        $stmt->bind_param("i", $roomId);
        $stmt->execute();
        $result = $stmt->get_result();
        $status_info = [];
        while ($row = $result->fetch_assoc()) {
            $status_info[] = $row;
        }
        $stmt->close();
        $response['status_info'] = $status_info;
    }


    // Lấy tiện ích của phòng
    $query_facilities = "SELECT facility_id FROM room_facilities WHERE room_id = ?";
    if ($stmt = $con->prepare($query_facilities)) {
        $stmt->bind_param("i", $roomId);
        $stmt->execute();
        $result = $stmt->get_result();
        $facilities = [];
        while ($row = $result->fetch_assoc()) {
            $facilities[] = $row['facility_id'];
        }
        $stmt->close();
        $response['facilities'] = $facilities;
    }

    if (!empty($images) || !empty($facilities) || !empty($status)) {
        $response['status'] = 'success';
        $response['message'] = 'success';
    }

    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}




//hàm lấy phòng với giá trị id để thực hiện hàm chỉnh sửa
if (isset($_POST['get_room'])) {
    $frm_data = filteration($_POST);
    $res1 = select("SELECT * FROM `rooms`  WHERE   `room_id`=?", [$frm_data['get_room']], 'i');
    //thực hiện truy vấn dữ liệu từ bảng `rooms` trong cơ sở dữ liệu
    //biến này dùng hàm select để lấy tất cả các trường dữ liệu (*) 
    //của một phòng (WHERE id=?) có id tương ứng với giá trị được truyền vào từ biểu mẫu ($frm_data['get_room']).
    $roomdata = mysqli_fetch_assoc($res1);
    //biến $roomdata lưu trữ dữ liệu của phòng đc lấy từ csdl 
    //hàm này sẽ là khi mà admin bật form edit để điền các giá trị phòng vào thì hàm này sẽ được gọi
    //hàm này sẽ có nhiệm vụ là hiển thị các giá trị của cái phòng bạn muốn chỉnh sửa   
    $data = json_encode(['status'=>'success',"roomdata" => $roomdata], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    echo $data;
}
//hàm edit phòng
if (isset($_POST['edit_room'])) {
    $frm_data = filteration($_POST);
    //lấy dữ liệu từ phương thức post được gọi từ bên rooms.js
    $flag = 0;
    $q = "UPDATE `rooms` SET `name`=?,`area`=?,`price`=?,`adult`=?,`children`=?,`description`=? WHERE `id`=?";
    //câu truy vấn sql UPDATE được sử dụng để cập nhật thông tin của một phòng trong bảng "rooms" trong cơ sở dữ liệu 
    //WHERE id=? định nghĩa rằng phòng cần được cập nhật sẽ được tìm kiếm dựa trên giá trị của cột "id" 
    //và giá trị này sẽ được truyền vào từ biến $frm_data['room_id'].
    $values = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['adult'], $frm_data['children'], $frm_data['desc'], $frm_data['room_id']];
    //lấy dữ liệu từ admin điền vào để lưu thay đổi trong database
    if (update($q, $values, 'ssiiisi')) {//nếu hàm này mà chạy thì hiển thị ra số 1
        echo 1;
    } else {//ngược lại không chạy thì hiển thị 0
        echo 0;
    }
}
//hàm thêm hình ảnh cho rooms
if (isset($_POST['add_image'])) {
    $frm_data = filteration($_POST);
    //Đoạn code này xử lý một biểu mẫu được gửi đi bằng phương thức POST 
//và kiểm tra xem nút "add_image" đã được nhấn hay chưa thông qua hàm isset().
// Nếu đã được nhấn, biến $_POST được lọc thông qua hàm filteration(). 
    $img_r = uploadImage($_FILES['image'], ROOMS_FOLDER);
    //hình ảnh được tải lên bằng hàm uploadImage() thông qua biến $_FILES['image'] 
//và được lưu trong thư mục được định nghĩa trong hằng số ROOMS_FOLDER.
    if ($img_r == 'inv_img') {//nếu mà lỗi thì sẽ hiển thị ra các thông báo này
        echo $img_r;
        //không phải là file hình ảnh
    } else if ($img_r == 'inv_size') {
        echo $img_r;
        //kích thước vượt quá giới hạn
    } else if ($img_r == 'upd_failed') {
        echo $img_r;
        //hình ảnh không được tải lên thành công
    } else {//nếu mà không có lỗi thì chạy vào hàm này
        $q = "INSERT INTO `room_images`( `room_id`, `image`) VALUES (?,?)";
        //hàm này sẽ insert ảnh đấy vào trong database `room_images`
        //bảng `room_images` này sẽ liên kết với bảng `room`
        $values = [$frm_data['room_id'], $img_r];//chuyền vào giá trị của room_id 
        $res = insert($q, $values, 'is');
        echo $res;
    }
}

//hàm này sẽ là hàm hiển thị tất cả các ảnh phòng trong ô "hình ảnh"
if (isset($_POST['get_room_images'])) {
    $frm_data = filteration($_POST);
    $res = select("SELECT * FROM `room_images` WHERE `room_id`=?", [$frm_data['get_room_images']], 'i');
    //thực hiện truy vấn dữ liệu từ bảng `room_images` trong cơ sở dữ liệu
    //biến này dùng hàm select để lấy tất cả các trường dữ liệu (*) 
    $path = ROOMS_IMG_PATH;
    while ($row = mysqli_fetch_assoc($res)) {
        if ($row['thumb'] == 1) {//
            //nếu mà giá trị thumb= 1 thì sẽ hiển thị chữ "ảnh nền"
            //ấn vào cái nút đó thì sẽ chuyển trạng thái của nó về "không ảnh nền" và giá trị thumb = 0
            $thumb_btn = "<button onclick='thumb_image($row[sr_no],$row[room_id])' class='btn btn-secondary shadow-none'>
            <i class='bi bi-trash'> Ảnh nền</i>
            </button>";
        } else {
            //ngược lại phía trên 
            $thumb_btn = "<button onclick='thumb_image($row[sr_no],$row[room_id])' class='btn btn-secondary shadow-none'>
            <i class='bi bi-trash'>không phải ảnh nền</i>
            </button>";
        }
        //cái thumb_btn chỉ là một biến để gán trị vào ở dưới này sẽ là hàm hiển thị toàn bộ thông tin hình ảnh
        //hàm echo sẽ là hàm để hiển thị ra màn hình
        //$path$row[image] sẽ là hình ảnh của room đấy
        //thumb_btn sẽ là hiển thị cái nút "ảnh nền" hoặc là nút "không phải ảnh nền"
        //cuối cùng sẽ là hiển thị nút xóa
        echo <<<data
            <tr class='align-midle'>
                <td><img src='$path$row[image]' class='img-fluid'></td>
            <td>$thumb_btn</td>
            <td>
            <button onclick='rem_image($row[sr_no],$row[room_id])' class='btn btn-danger shadow-none'>
                <i class='bi bi-trash'> xóa</i>
                </button>
            </td>
            </tr>
        data;
    }
}

//hàm chuyển trạng thái room từ hoạt động sang không hoạt động và ngược lại
if (isset($_POST['toggle_status'])) {
    $frm_data = filteration($_POST);
    $q = "UPDATE `rooms` SET  `status`=?  WHERE  `id`=?  ";
    $v = [$frm_data['value'], $frm_data['toggle_status']];
    //câu truy vấn UPDATE được sử dụng để cập nhật trạng thái của phòng trong bảng rooms.
//phần "status=?" đại diện cho cột "status" trong bảng rooms, 
//và sẽ được cập nhật bằng giá trị mới được truyền vào thông qua biến $frm_data['value'].
//Phần "WHERE id=?" đại diện cho điều kiện để xác định phòng cần được cập nhật. 
//Nó sử dụng cột "id" trong bảng rooms, và sẽ được so khớp với giá trị của biến $frm_data['toggle_status'].
    if (update($q, $v, 'ii')) {
        echo 1;
        //hàm update() được gọi để thực hiện câu truy vấn.
// Nếu truy vấn được thực hiện thành công, hàm update() trả về true, và kết quả "1" được in ra màn hình bằng lệnh echo.
//Nếu không, kết quả "0" được in ra màn hình.
    } else {
        echo 0;
    }
}

//hàm xóa hình ảnh với giá trị chuyền vào là room_id
if (isset($_POST['rem_image'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['image_id'], $frm_data['room_id']];
    //biến $values lưu giá trị của ID ảnh và ID phòng được trích xuất từ biến $_POST 
    $q = "SELECT * FROM `room_images`  WHERE  `sr_no`=? AND `room_id`=?";
    //câu truy vấn SQL SELECT lấy thông tin của ảnh trong bảng `room_images`,sử dụng tham số được truyền vào từ mảng $values. 
    $res = select($q, $values, 'ii');
    //Kết quả của câu truy vấn được lưu vào biến $res thông qua hàm select().
    $img = mysqli_fetch_assoc($res);
    //hàm `mysqli_fetch_assoc()` để truy xuất các giá trị về thông tin ảnh từ kết quả truy vấn.
    if (deleteImage($img['image'], ROOMS_FOLDER)) {
        $q = "DELETE FROM `room_images` WHERE `sr_no`=? AND `room_id`=?";
        //Hàm deleteImage() xóa ảnh từ thư mục được chỉ định trong hằng số ROOMS_FOLDER.
//Nếu ảnh được xóa thành công, câu truy vấn SQL DELETE sẽ xóa thông tin của ảnh trong bảng room_images. 
        $res = delete($q, $values, 'ii');
        echo $res;
        //Hàm delete() để thực hiện câu truy vấn và trả về kết quả thông qua biến $res. 
//Nếu xóa không thành công, kết quả "0" được in ra màn hình bằng lệnh echo.
    } else {
        echo 0;
    }
}

//hàm chuyển giá trị thumb của room_images 
if (isset($_POST['thumb_image'])) {
    $frm_data = filteration($_POST);
    $pre_q = "UPDATE `room_images`  SET `thumb`=?  WHERE `room_id`=?";
    $pre_v = [0, $frm_data['room_id']];
    $pre_res = update($pre_q, $pre_v, 'ii');
    //câu truy vấn SQL UPDATE xác định trước ảnh nào trong bảng room_images là ảnh đại diện của phòng 
//bằng cách đặt giá trị cột thumb bằng 0 cho tất cả các bản ghi với room_id được chỉ định trong biến $frm_data['room_id'].
// Câu truy vấn được thực hiện thông qua hàm update() và kết quả được lưu vào biến $pre_res.
    $q = "UPDATE `room_images`  SET `thumb`=?  WHERE `sr_no`=? AND `room_id`=?";
    $v = [1, $frm_data['image_id'], $frm_data['room_id']];
    //biến $v lưu giá trị của ID ảnh và ID phòng được trích xuất từ biến $_POST 
    $res = update($q, $v, 'iii');
    //câu truy vấn SQL UPDATE khác đặt cột thumb bằng 1 cho ảnh được chỉ định trong biến $frm_data['image_id'] 
//và room_id được chỉ định trong biến $frm_data['room_id']. 
//Câu truy vấn này được thực hiện thông qua hàm update() và kết quả được lưu vào biến $res.
    echo $pre_res;
}

//hàm xóa phòng 
//hàm này sẽ thực hiện xóa room_images của phòng đấy xong nó sẽ chuyển giá trị removed của room về 1 
if (isset($_POST['remove_room'])) {
    $frm_data = filteration($_POST);
    $room_id  = $frm_data['room_id'];
    $res1 = select("SELECT * FROM `room_images` WHERE `room_id`=?", [$frm_data['room_id']], 'i');
    //lấy dữ liệu từ `room_images` theo id


    while ($row = mysqli_fetch_assoc($res1)) {
        deleteImage($row['image'], ROOMS_FOLDER);
    }//hàm này xóa tất cả h/a của phòng có ID t/u khỏi mục ROOMS_FOLDER
    $res2 = delete("DELETE FROM `room_images`  WHERE  `room_id`=?", [$frm_data['room_id']], 'i');
    //xóa all các bản ghi của bảng room_images t/u với ID phòng
    $res3 = update("UPDATE `rooms` SET `removed`=?  WHERE  `id`=?", [1, $frm_data['room_id']], 'ii');
    //cập nhật cột removed của bảng `rooms` t/u với ID phòng
//removed=1 là đã xóa , =0 là chưa xóa
    if ($res2 || $res3) {
        echo 1;
    } else {
        echo 0;
    }

    $uploadDir = __DIR__ . '/../images/rooms/' . $room_id . '/';

    // Hàm xóa một thư mục và tất cả nội dung bên trong nó
    function deleteDirectory($dir)
    {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir);
        }

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }

        }

        return rmdir($dir);
    }

    // Kiểm tra và xóa thư mục
    if (is_dir($uploadDir)) {
        if (deleteDirectory($uploadDir)) {
            echo "Thư mục đã được xóa thành công.";
        } else {
            echo "Lỗi khi xóa thư mục.";
        }
    } else {
        echo "Thư mục không tồn tại.";
    }
}
?>