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