<?php
 // Kiểm tra xem kết nối có phải là HTTPS không và xác định protocol
 $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
 // Lấy tên host
 $host = $_SERVER['HTTP_HOST'];
 
 // Lấy đường dẫn của thư mục gốc (root directory) của project
 $path = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
 
 // Đảm bảo rằng $path kết thúc bằng '/homestay' nếu nó không phải là thư mục gốc
 if (!str_ends_with($path, '/homestay')) {
     $path .= '/homestay';
 }
 
 // Định nghĩa BASE_URL để sử dụng trong toàn bộ ứng dụng
 define('BASE_URL', $protocol . $host . '/');
 
 // Các đường dẫn khác có thể dựa trên BASE_URL
 define('ROOMS_IMG_PATH', BASE_URL . 'admin/images/');
 define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/admin/images/rooms/');
 define('ABOUT_IMG_PATH', BASE_URL . 'images/about/');
 

// Đường dẫn tới thư mục images trên server, sử dụng khi tải lên ảnh

// Tên thư mục lưu trữ ảnh phòng, sử dụng khi tải lên ảnh
define('ROOMS_FOLDER', 'rooms/');

function adminLogin(){
    $check = 0;
    session_regenerate_id();//Hàm session_start() được gọi để bắt đầu phiên làm việc của người dùng
    if((isset($_SESSION['staffLogin']) && $_SESSION['staffLogin'] == true)){
        $check = 1;
    }
    if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)){
        $check = 1;
    //Hàm isset() kiểm tra xem biến $_SESSION['adminLogin'] có tồn tại trong phiên làm việc của người dùng hay không.
    //Biểu thức $_SESSION['adminLogin'] == true để kiểm tra xem giá trị của biến $_SESSION['adminLogin'] có bằng true hay không. 
    //Nếu biến tồn tại và có giá trị bằng true, thì người dùng đã đăng nhập vào trang quản trị.
    } 
    if(!$check){
        echo "<script>window.location.href='/../index.php';</script>";
    }
    session_regenerate_id(true);//nếu false đoạn mã bên trong lệnh if sẽ được thực hiện. 
    //sử dụng lệnh echo để trả về một đoạn mã JavaScript. 
    //Đoạn mã JavaScript này sẽ chuyển hướng người dùng đến trang index.php.
//Hàm session_regenerate_id(true) được gọi để tạo lại ID phiên làm việc của người dùng. 
//Điều này giúp tăng cường bảo mật cho phiên làm việc của người dùng, do đó, tăng khả năng chống lại các cuộc tấn công từ người dùng xấu.
}





function redirect($url){ //chuyển hướng người dùng đến một URL khác.
    echo "
    <script>
        window.location.href='$url';
    </script>";
} //không có bất kỳ kết quả nào được trả về từ hàm này.

//hàm tải lên một tệp h/a từ một biểu mẫu và lưu trữ trong một thư mục được chỉ định.
function uploadImage($image,$folder){//tham số:
//$image: tệp hình ảnh được chọn để tải lên. 
//$folder: tên của thư mục lưu trữ được chỉ định
    $valid_mime = ['image/jpeg','image/png','image/webp'];
    $img_mime = $image['type'];
    if(!in_array($img_mime,$valid_mime)){
        return 'inv_img';//nếu tệp hình ảnh không đúng định dạng, hàm trả về 'inv_img'.
    }
    else if(($image['size']/(1024*1024)) > 2){
        return 'inv_size';//Nếu tệp hình ảnh vượt quá giới hạn kích thước, hàm trả về 'inv_size'.
//Kiểm tra định dạng của tệp hình ảnh bằng cách so sánh loại MIME của tệp với danh sách định dạng được chấp nhận.
//Kiểm tra kích thước của tệp hình ảnh để đảm bảo không vượt quá giới hạn kích thước cho phép.

    }else{
        $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
        $rname = 'IMG_'.random_int(11111,99999).".$ext";
        //Tạo một tên ngẫu nhiên cho tệp hình ảnh random_int
        $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
        if(move_uploaded_file($image['tmp_name'],$img_path)){
            //lưu trữ tệp trong thư mục đã cho move_uploaded_file
            return $rname;//Nếu tệp hình ảnh được tải lên thành công, hàm trả về tên tệp hình ảnh mới.
        }else{
            return 'upd_failed';//Nếu có lỗi trong quá trình tải lên, hàm trả về 'upd_failed'.
        }
    }
}

//hiển thị một thông báo trên trang web với màu sắc và nội dung tùy chỉnh.
function alert($type,$msg){
//$type loại thông báo thành công hoặc lỗi
//$msg nội dung thông báo
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
            <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
             <strong class="me-3">$msg</strong>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alert; //<<<alert  khai báo một chuỗi có nhiều dòng.
        //strong hiển thị nội dung thông báo và một nút để đóng thông báo.
        //echo in ra chuỗi HTML đã được khai báo và trả về thông báo cho người dùng.
}

// xóa ảnh
function deleteImage($image, $folder){
//$image ảnh cần xóa
//$folder thư mục chứa ảnh cần xóa
    if(unlink(UPLOAD_IMAGE_PATH.$folder.$image)){
        //unlink() xóa tệp hình ảnh
        return true;
    }
    else{
        return false;
    }
}

function readConfig() {
    $configPath = __DIR__ . '/../config.json'; // Đi từ thư mục hiện tại lên một cấp và vào config.json
    if (file_exists($configPath)) {
        $jsonContent = file_get_contents($configPath);
        return json_decode($jsonContent, true);
    } else {
        return array(); // Trả về mảng rỗng nếu file không tồn tại
    }
}


function updateConfig($newData) {
    $configFile = 'config.json';
    // Lấy dữ liệu cấu hình hiện tại
    $currentData = json_decode(file_get_contents($configFile), true);
    
    // Đi qua từng giá trị trong dữ liệu mới và cập nhật nếu giá trị mới được cung cấp
    foreach ($newData as $key => $value) {
        if (!empty($value)) {
            $currentData[$key] = $value; // Cập nhật giá trị mới nếu không rỗng
        }
        // Nếu giá trị mới là rỗng, giữ giá trị cũ (không cần thực hiện hành động gì)
    }
    
    // Chuyển đổi dữ liệu cấu hình trở lại thành JSON
    $jsonData = json_encode($currentData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    // Ghi dữ liệu cấu hình đã cập nhật vào file
    file_put_contents($configFile, $jsonData);
}



function uploadImageAndReturnPath($imageField) {
    if (!isset($_FILES[$imageField]) || $_FILES[$imageField]['error'] == UPLOAD_ERR_NO_FILE) {
        // Không có file được tải lên cho trường này
        return null;
    }

    // Đường dẹp tới thư mục images từ thư mục hiện tại
    $targetDir = __DIR__ . '/../../images/';
    $targetFile = $targetDir . basename($_FILES[$imageField]['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    // Kiểm tra xem file có phải là hình ảnh và kiểm tra định dạng
    $check = getimagesize($_FILES[$imageField]["tmp_name"]);
    if($check !== false) {
        // Kiểm tra kích thước file (2MB)
        if ($_FILES[$imageField]["size"] > 2000000) {
            echo "<div class='notice'>error:Ảnh vượt kích thước 2M!</div>";
            $uploadOk = 0;
        }
        // Kiểm tra định dạng file
        if(!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'webp'])) {
            echo "<div class='notice'>error:Chỉ cho phép files: JPG, JPEG, PNG & WEBP!</div>";
            $uploadOk = 0;
        }
    } else {
        echo "<div class='notice'>error:File ảnh không đúng định dạng!</div>";
        $uploadOk = 0;
    }

    // Kiểm tra nếu $uploadOk được đặt thành 0 do lỗi
    if ($uploadOk == 0) {
        echo "<div class='notice'>error:Lỗi khi tải ảnh lên!</div>";
        return null;
    // Nếu tất cả các kiểm tra đều ổn, thử upload file
    } else {
        $filename = basename($_FILES[$imageField]["name"]);
        $targetFilePath = $targetDir . $filename;

        if (move_uploaded_file($_FILES[$imageField]["tmp_name"], $targetFilePath)) {
            return $filename; 
        } else {
            echo "<div class='notice'>error:Lỗi khi tải ảnh lên!</div>";
        }
        
    }
}

function User() {
    global $con;
    if(isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id']; // Lấy user_id từ session
    
        // Tạo câu truy vấn SQL để lấy thông tin người dùng
        $query = "SELECT * FROM users WHERE user_id = ?";
    
        // Chuẩn bị câu truy vấn
        if($stmt = $con->prepare($query)) {
            // Liên kết tham số (i - integer)
            $stmt->bind_param("i", $userId);
    
            // Thực thi câu truy vấn
            $stmt->execute();
    
            // Lấy kết quả truy vấn
            $result = $stmt->get_result();
    
            if($result->num_rows > 0) {
                // Lấy dữ liệu của người dùng
                $userData = $result->fetch_assoc();
            } 
    
            // Đóng câu truy vấn
            $stmt->close();
        } 
    } 
    
    // Đóng kết nối CSDL
    $con->close();
    return $userData;
  }



?>

