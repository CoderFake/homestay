<?php


$hname='lananhdb.cv4aaguu00vj.ap-southeast-2.rds.amazonaws.com';
$uname='admin';
$pass='Lananh2003';
$db='lananh';
$con=mysqli_connect($hname,$uname,$pass,$db);

if(!$con){
    die("Cannot Connect to Database".mysqli_connect_error());
}
// lọc dữ liệu đầu vào chuyển về kiểu code đọc
function filteration($data) {
    // Kiểm tra nếu $data là mảng
    if (is_array($data)) {
        foreach($data as $key => $value) {
            $data[$key] = filteration($value); // Đệ quy cho mỗi phần tử
        }
    } elseif (is_string($data)) { // Xử lý chuỗi
        $data = trim($data); // Loại bỏ khoảng trắng đầu và cuối
        $data = stripslashes($data); // Loại bỏ backslashes
        $data = htmlspecialchars($data); // Chuyển đổi ký tự đặc biệt
        $data = strip_tags($data); // Loại bỏ thẻ HTML và PHP
    } elseif (is_numeric($data)) { // Xử lý số
        $data = filter_var($data, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // Làm sạch số, giữ lại phần thập phân nếu có
    } // Bạn có thể thêm các kiểm tra và xử lý cho kiểu dữ liệu khác ở đây

    return $data;
}

//câu lệnh hthi tất cả dữ liệu trong 1 bảng ra khỏi db
function select($sql, $values, $datatypes) {
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        // Chỉ gọi mysqli_stmt_bind_param() nếu có giá trị đầu vào
        if (!empty($values)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        }
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            echo json_encode(['status' => 'error', 'message' => 'Lấy thông tin thất bại!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            exit();
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Lấy thông tin thất bại!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit();
    }
}

//câu lệnh update dữ liệu sd cho hàm edit các dữ liệu của room, user
function update($sql,$values,$datatypes){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql))//kiểm tra xem câu lệnh truy vấn có thể được chuẩn bị 
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res = mysqli_stmt_affected_rows($stmt);
            //nếu thành công lấy số dòng bị ảnh hưởng bởi truy vấn và trả về nó
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{//k thành công thì đóng kết nối và báo lỗi
            mysqli_stmt_close($stmt);
            echo json_encode(['status' => 'error', 'message' => 'Cập nhật thông tin thất bại!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            exit;
        }
    }
    else{
        echo json_encode(['status' => 'error', 'message' => 'Cập nhật thông tin thất bại!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }
}
//câu lệnh thực hiện việc thêm dữ liệu vào db
//giống update ở trên
function insert($sql,$values,$datatypes){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("Query cannot be excuted - insert");
        }
    }
    else{
        die("Query cannot be prepared - in sot");
    }
}
// câu lệnh select * thực hiện hiển thị toàn bộ dữ liệu của bảng được chọn
function selectAll($table) {
    $con = $GLOBALS['con']; // Sử dụng biến kết nối cơ sở dữ liệu toàn cục
    $data = array();
    $sql = "SELECT * FROM `$table`";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    return $data;
}


// câu lệnh thực hiện việc xóa dữ liệu của một bảng được chỉ định
//giống lệnh update
function delete($sql, $values, $datatypes){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("Query cannot be excuted - delete");
        }
    }
    else{
        die("Query cannot be prepared - delete");
    }
}

function selectOrderedUsers() {
    $con = $GLOBALS['con'];
    $sql = "SELECT user_id, name, email, phone_number, is_verified, role 
            FROM `users` 
            WHERE `removed`=0
            ORDER BY FIELD(role, 'admin', 'staff', 'customer')";

    if ($result = mysqli_query($con, $sql)) {
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $users;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Lấy thông tin thất bại!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return [];
    }
}
function getUsersLoggedIn() {
    $con = $GLOBALS['con'];
    $sql = "SELECT COUNT(*) as count FROM `users` WHERE `status` = TRUE";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    } 
    
}

//=========================Rooms==============================================

function renumberImages($room_id, $imageNames) {
    if (!empty($imageNames)) {
        $uploadDir = __DIR__ . '/../images/rooms/' . $room_id . '/';
        $validExtensions = ['jpg', 'jpeg', 'png', 'webp'];

        //Xóa các file không có trong danh sách imageNames
        $existingFiles = scandir($uploadDir);
        foreach ($existingFiles as $file) {
            if (!in_array($file, $imageNames) && !is_dir($uploadDir . $file)) {
                unlink($uploadDir . $file);
            }
        }
        //Lấy lại danh sách file sau khi xóa và sắp xếp chúng theo tên
        $remainingFiles = array_filter(scandir($uploadDir), function($file) use ($uploadDir, $validExtensions) {
            return is_file($uploadDir . $file) && in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), $validExtensions);
        });
        
        // Đảm bảo các file được sắp xếp theo thứ tự tên file giống như trong mảng imageNames
        usort($remainingFiles, function($a, $b) use ($imageNames) {
            return array_search($a, $imageNames) - array_search($b, $imageNames);
        });

        //Đánh số lại các file từ 1
        $count = 1;
        foreach ($remainingFiles as $file) {
            $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $newFileName = $count++ . '.' . $fileExtension;
            $newFilePath = $uploadDir . $newFileName;
            
            // Đổi tên file
            rename($uploadDir . $file, $newFilePath);
        }
    }
}

function resetAutoIncrement($table) {
    $con = $GLOBALS['con']; 
    $sql = "ALTER TABLE $table AUTO_INCREMENT = 1";
    $con->query($sql);

}



function updateRoomImagesInDatabase($room_id) {
    $con = $GLOBALS['con']; // Sử dụng kết nối cơ sở dữ liệu
    $uploadDir = __DIR__ . '/../images/rooms/' . $room_id . '/'; // Đường dẫn thư mục lưu trữ ảnh

    // Xóa các đường dẫn ảnh hiện tại trong bảng room_images
    $sql = "DELETE FROM room_images WHERE room_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $stmt->close();

    // Đọc và cập nhật đường dẫn ảnh mới
    $imageFiles = scandir($uploadDir);
    $firstImage = true; // Cờ để xác định ảnh đầu tiên

    foreach ($imageFiles as $file) {
        if (!is_file($uploadDir . $file) || !preg_match('/\.(jpg|jpeg|png|webp)$/i', $file)) {
            continue; // Bỏ qua nếu không phải file ảnh hợp lệ
        }

        $imagePath = 'rooms/' . $room_id . '/' . $file; // Đường dẫn lưu trong DB
        $is_thumbnail = $firstImage ? 1 : 0; // Chỉ đặt ảnh đầu tiên làm thumbnail

        // Cập nhật đường dẫn ảnh vào bảng room_images
        $sql = "INSERT INTO room_images (room_id, image_url, is_thumbnail) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("isi", $room_id, $imagePath, $is_thumbnail);
        $stmt->execute();
        $stmt->close();
        resetAutoIncrement('room_images');
        if ($firstImage) { // Chỉ ảnh đầu tiên là thumbnail
            $firstImage = false; // Đảm bảo chỉ đánh dấu ảnh đầu tiên là thumbnail
        }
    }
}

// hàm này sau khi đã xử lý xong việc tải lên hoặc xóa ảnh


function uploadRoomImages($room_id) {
    $uploadDir = __DIR__ . '/../images/rooms/' . $room_id . '/'; // Đường dẫn thư mục lưu trữ ảnh

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    // Lấy danh sách các file hiện có trong thư mục để xác định số lớn nhất
    $existingFiles = scandir($uploadDir);
    $maxNumber = 0;
    foreach ($existingFiles as $file) {
        if (preg_match('/(\d+)\.\w+$/', $file, $matches)) {
            $number = intval($matches[1]);
            if ($number > $maxNumber) {
                $maxNumber = $number; // Cập nhật số lớn nhất
            }
        }
    }

    $count = $maxNumber + 1; // Bắt đầu đánh số từ số lớn nhất hiện có + 1

    // Xác định danh sách các file hợp lệ để xử lý, dựa vào danh sách fileNames gửi qua POST (nếu có)
    $fileNames = isset($_POST['fileNames']) ? json_decode(urldecode($_POST['fileNames']), true) : [];

    $valid_extensions = ['jpg', 'jpeg', 'png', 'webp']; // Định dạng file hợp lệ

    foreach ($_FILES['roomImages']['name'] as $key => $name) {
        // Kiểm tra xem file có nằm trong danh sách hợp lệ không
        if (!in_array($name, $fileNames)) {
            continue; // Bỏ qua file nếu không hợp lệ
        }

        $file_tmp = $_FILES['roomImages']['tmp_name'][$key];
        $file_ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        // Kiểm tra định dạng và kích thước file
        if (in_array($file_ext, $valid_extensions) && $_FILES['roomImages']['size'][$key] <= 4000000) {
            $filename = $count++ . '.' . $file_ext; // Tên file mới
            $targetFile = $uploadDir . $filename; // Đường dẫn file đích

            // Thực hiện di chuyển file tạm thời vào thư mục đích
            if (!move_uploaded_file($file_tmp, $targetFile)) {
                echo json_encode(['status' => 'error', 'message' => "Lỗi khi tải lên file ảnh: $filename"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                exit();
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => "Ảnh không hợp lệ hoặc kích thước lớn hơn 4MB!S"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            exit();
        }
    }
}


function deleteMultipleRoomDirectories($roomIds) {
    foreach ($roomIds as $room_id) {
        $uploadDir = __DIR__ . '/../images/rooms/' . $room_id . '/';

        if (!file_exists($uploadDir) || !is_dir($uploadDir)) {
            continue; // Nếu thư mục không tồn tại hoặc không phải là một thư mục, bỏ qua
        }

        // Lọc và lấy danh sách tất cả các ảnh trong thư mục
        $imageFiles = array_filter(scandir($uploadDir), function ($item) use ($uploadDir) {
            return !is_dir($uploadDir . $item) && preg_match('/\.(jpg|jpeg|png|webp)$/i', $item);
        });

        // Xóa từng ảnh
        foreach ($imageFiles as $image) {
            $imagePath = $uploadDir . $image;
            @unlink($imagePath); // Sử dụng @ để giảm thiểu cảnh báo trong trường hợp xóa không thành công
        }

        // Xóa thư mục nếu trống
        if (count(scandir($uploadDir)) == 2) { // Chỉ có '.' và '..' tức là thư mục trống
            @rmdir($uploadDir);
        }
    }
}
 

//=========================Users==============================================

// Hàm cập nhật quyền người dùng
function updateRole() {
    $con = $GLOBALS['con']; 
    if (isset($_POST['userIds'], $_POST['role']) && !empty($_POST['userIds']) && !empty($_POST['role'])) {
        // Lọc và kiểm tra dữ liệu đầu vào cho vai trò
        $role = filteration($_POST['role']);

        // Lọc mảng ID người dùng
        $userIds = array_map('filteration', $_POST['userIds']);
        
        // Kiểm tra sau khi lọc
        if (empty($role) || empty($userIds)) {
            echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ sau khi lọc']);
            return;
        }

        // Tạo chuỗi placeholder cho phần IN của câu lệnh SQL dựa trên số lượng ID người dùng
        $placeholders = implode(',', array_fill(0, count($userIds), '?'));

        // Định nghĩa các kiểu cho tất cả tham số, bắt đầu với 's' cho vai trò
        $types = 's' . str_repeat('i', count($userIds));  // 's' cho chuỗi (role), tiếp theo là 'i' cho số nguyên (user IDs)

        // Câu lệnh SQL để cập nhật vai trò nếu user_id nằm trong danh sách các placeholder
        $sql = "UPDATE `users` SET `role` = ? WHERE `user_id` IN ($placeholders)";

        // Chuẩn bị câu lệnh SQL
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            // Gắn các tham số với việc gắn tham số động sử dụng toán tử spread cho các ID người dùng
            mysqli_stmt_bind_param($stmt, $types, $role, ...$userIds);

            // Thực thi câu lệnh đã chuẩn bị
            if (mysqli_stmt_execute($stmt)) {
                echo json_encode(['status' => 'success', 'message' => 'Quyền người dùng đã được cập nhật'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Cập nhật quyền thất bại'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Cập nhật quyền thất bại'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }else {
        echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}



// Hàm xóa người dùng
function deleteUsers() {
    $con = $GLOBALS['con']; 
    if (isset($_POST['userIds']) && !empty($_POST['userIds'])) {
        $userIds = $_POST['userIds'];

        // Kiểm tra email sunhim2k3@gmail.com không được xóa
        $emailQuery = "SELECT `user_id` FROM `users` WHERE `email` = 'sunhim2k3@gmail.com'";
        $emailResult = mysqli_query($con, $emailQuery);
        if ($emailResult && mysqli_num_rows($emailResult) > 0) {
            $emailRow = mysqli_fetch_assoc($emailResult);
            $protectedUserId = $emailRow['user_id'];

            // Nếu ID của người dùng này nằm trong mảng ID được yêu cầu xóa, trả về lỗi
            if (in_array($protectedUserId, $userIds)) {
                echo json_encode(['status' => 'error', 'message' => 'Người dùng với email sunhim2k3@gmail.com không thể bị xóa!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                return;
            }
        }

        // Xử lý mảng userID để tránh SQL Injection
        $placeholders = implode(',', array_fill(0, count($userIds), '?'));
        $types = str_repeat('i', count($userIds));
        $sql = "UPDATE `users` SET `removed` = 1 WHERE `user_id` IN ($placeholders)";

        // Chuẩn bị và thực thi câu truy vấn
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, $types, ...$userIds);
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['status' => 'success', 'message' => 'Người dùng đã được xóa!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Xóa người dùng thất bại!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}



?>
