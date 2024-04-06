<?php

// Xác định giao thức (http hoặc https)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';

// Xác định đường dẫn cơ sở dựa trên tên miền và thư mục chứa tệp PHP
$basePath = $protocol . '://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';

// Định nghĩa BASE_URL để sử dụng trong toàn bộ ứng dụng


// Kiểm tra xem kết nối có phải là HTTPS không
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

// Lấy tên host
$host = $_SERVER['HTTP_HOST'];

// Lấy đường dẫn của thư mục gốc (root directory) của project, nếu bạn có cài đặt trong sub-folder của DocumentRoot
$path = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

// Định nghĩa URL
define('SITE_URL', $protocol . $host . $path . '/');
define('BASE_URL', $basePath);
define('ABOUT_IMG_PATH','images/about/');
define('ROOMS_IMG_PATH', 'admin/'); 
define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/images/rooms/');


function adminLogin(){
    if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)){
        echo<<< data
            "     
            <script>
            window.location.href='index.php';
            </script>"
        data;
    }
}


function redirect($url){
    echo "
    <script>
        window.location.href='$url';
    </script>";
}
function uploadImage($image,$folder){
    $valid_mime = ['image/jpeg','image/png','image/webp'];
    $img_mime = $image['type'];
    if(in_array($img_mime,$valid_mime)){
        return 'inv_img';
    }
    else if($image['size']/(1024*1024) > 2){
        return 'inv_size';
    }else{
        $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
        $rname = 'IMG'.random_int(11111,99999).".$ext";
        $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
        if(move_uploaded_file($image['tmp_name'],$img_path)){
            return $rname;
        }else{
            return 'upd_failed';
        }

    }
    
    
}




function alert($type,$msg){
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
            <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
             <strong class="me-3">$msg</strong>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alert;
}
function deleteImage($image, $folder){
    if(unlink(UPLOAD_IMAGE_PATH.$folder.$image)){
        return true;
    }
    else{
        return false;
    }
}




?>