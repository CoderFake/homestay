<?php
session_start();
require_once('inc/essentials.php');
adminLogin();
$data_homestay = readConfig();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateConfig'])) {
    $logoImageName = uploadImageAndReturnPath('logo_image');
    if ($logoImageName) {
        $configData['logo_image'] = "images/" . $logoImageName; 
    }
    $headerImageName = uploadImageAndReturnPath('header_image');
    if ($headerImageName) {
        $configData['header_image'] = "images/" . $headerImageName; 
    }
    $aboutImageName = uploadImageAndReturnPath('about_image');
    if ($aboutImageName) {
        $configData['about_image'] = "images/" . $aboutImageName; 
    }
    $newData = [
        "homeStayName" => $_POST['homeStayName'] ?? '',
        "address" => $_POST['address'] ?? '',
        "phone" => $_POST['phone'] ?? '',
        "facebookLink" => $_POST['facebookLink'] ?? '',
        "instagramLink" => $_POST['instagramLink'] ?? '',
        "footer" => $_POST['footer'] ?? '',
        "description" => $_POST['description'] ?? '',
        "email" => $_POST['email'] ?? '',
        "map" => $_POST['map'] ?? '',
        "logo_image" => $logoImageName,
        "header_image" => $headerImageName,
        "about_image" => $aboutImageName
    ];
    $newData = array_filter($newData, function($value) {
        return $value !== null;
    });

    updateConfig($newData);
    echo "<div class='notice'>success:Thông tin đã được cập nhật thành công!</div>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php require('inc/links.php');
    require('inc/header.php')?>
    <link rel="stylesheet" href="css/nav.css">
</head>

<body class="bg-light ">

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overfollow-hidden">
                <br>
            </div>
            <form action="dashboard.php" method="post" enctype="multipart/form-data">
                <input type="text" name="homeStayName" placeholder="Tên Homestay">
                <input type="text" name="address" placeholder="Địa chỉ" >
                <input type="text" name="phone" placeholder="Số điện thoại">
                <input type="text" name="facebookLink" placeholder="Link Facebook">
                <input type="text" name="instagramLink" placeholder="Link Instagram">
                <input type="text" name="footer" placeholder="Tên Footer">
                <textarea name="description" placeholder="Mô tả"></textarea>
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="map" placeholder="Link vị trí">
                <input type="file" name="logo_image" placeholder="Ảnh logo">
                <input type="file" name="header_image" placeholder="Ảnh trang chủ">
                <input type="file" name="about_image" placeholder="Ảnh giới thiệu">
                <button type="submit" name="updateConfig">Cập Nhật Cấu Hình</button>
            </form>

            </div>
        </div>
    </div>
<?php 
require('inc/script.php');
require('inc/footer.php');
?>
</body>
</html>