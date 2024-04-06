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
function select($sql,$values,$datatypes)
{
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql))//kiểm tra có truy vấn sql k
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        //liên kết các giá trị đầu vào với các tham số trong câu lệnh truy vấn
        if(mysqli_stmt_execute($stmt)){
            //thực thi câu lệnh truy vấn với các giá trị được cung cấp.
            $res = mysqli_stmt_get_result($stmt);
            //nếu thành công  lấy kết quả truy vấn và trả về nó
            mysqli_stmt_close($stmt);//đóng kết nối tới db
            return $res;//giá trị trả về cuối cùng 
        }
        else{//nếu không thành công sẽ đóng kết nối và tb lỗi
            mysqli_stmt_close($stmt);//đóng kết nối tới db
            echo json_encode(['status' => 'error', 'message' => 'error:lấy thông tin phòng thất bại!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            exit();//hien thong bao loi
        }
    }
    else{
        echo json_encode(['status' => 'error', 'message' => 'error:lấy thông tin phòng thất bại!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
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
            die("Query cannot be excuted - update");
        }
    }
    else{
        die("Query cannot be prepared - update");
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

function getUsersLoggedIn() {
    $con = $GLOBALS['con'];
    $sql = "SELECT COUNT(*) as count FROM `users` WHERE `status` = TRUE";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    } 
    
}

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
        if (in_array($file_ext, $valid_extensions) && $_FILES['roomImages']['size'][$key] <= 2000000) {
            $filename = $count++ . '.' . $file_ext; // Tên file mới
            $targetFile = $uploadDir . $filename; // Đường dẫn file đích

            // Thực hiện di chuyển file tạm thời vào thư mục đích
            if (!move_uploaded_file($file_tmp, $targetFile)) {
                echo json_encode(['status' => 'error', 'message' => "Lỗi khi tải lên file ảnh: $filename"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                exit();
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => "Ảnh không hợp lệ hoặc kích thước lớn hơn 2MB"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
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


?>
