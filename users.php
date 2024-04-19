<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $userId = $_SESSION['user_id'];  
    $name = $_POST['name'] ?? '';  
    $email = $user['email'];
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $oldPassword = $_POST['old-password'] ?? '';
    $newPassword = $_POST['new-password'] ?? '';
    $acptPassword = $_POST['acpt-password'] ?? '';

    if (empty($userId) || empty($name) || empty($email) || empty($phone)) {
        echo "<div class='notice'>error:Vui lòng điền đầy đủ thông tin bắt buộc!</div>";
    }
    else {
        if(!empty($oldPassword) && !empty($newPassword) && !empty($acptPassword)){
            if ($user && password_verify($oldPassword, $user['password'])) {
                // Mật khẩu cũ đúng
                if ($newPassword !== $acptPassword) {
                    echo "<div class='notice'>error:Mật khẩu mới và mật khẩu xác nhận không khớp!</div>";
                } else {
                    // Cập nhật mật khẩu mới vào CSDL
                    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $updateSql = "UPDATE users SET password = ? WHERE user_id = ?";
                    $updaprofilemt = $con->prepare($updateSql);
                    $updaprofilemt->bind_param("si", $newPasswordHash, $user_id);
                    if (!$updaprofilemt->execute()) {
                        echo "<div class='notice'>error:Lỗi khi cập nhật mật khẩu!</div>";
                    } 
                    else $updaprofilemt->execute();
                    $updaprofilemt->close();
                }
            } else {
                echo "<div class='notice'>error:Mật khẩu cũ không đúng!</div>";
            }
        }
        
        $profilePic = $user['profile_pic'];

        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
            if(!empty($_FILES['profile_image']['name'])){
                $allowed = ['jpg', 'jpeg', 'png', 'webp']; // Định dạng file cho phép
                $filename = $_FILES['profile_image']['name'];
                $filetype = pathinfo($filename, PATHINFO_EXTENSION);

                if (in_array(strtolower($filetype), $allowed)) {
                    $tempName = $_FILES['profile_image']['tmp_name'];
                    // Tạo tên file mới để tránh trùng lặp
                    $newFilename = "profile_pic." . $filetype;

                    // Tạo thư mục cho mỗi người dùng nếu chưa tồn tại
                    $userDir = $_SERVER['DOCUMENT_ROOT'] . '/admin/images/users/' . $userId;
                    if (!file_exists($userDir)) {
                        mkdir($userDir, 0777, true); // Tạo thư mục với quyền đầy đủ
                    }

                    // Đường dẫn lưu file
                    $uploadDir = $userDir . '/' . $newFilename;

                    if (move_uploaded_file($tempName, $uploadDir)) {
                        $profilePic = $newFilename;
                        // Lưu đường dẫn vào CSDL hoặc thực hiện các thao tác khác
                    } else {
                        echo "<div class='notice'>error:Lỗi khi tải ảnh lên!</div>";
                    }
                } else {
                    echo "<div class='notice'>error:Chỉ chấp nhận các định dạng ảnh JPG, JPEG, PNG, WEBP!</div>";
                }
            }
        }

        $sql = "UPDATE users SET name=?, email=?, phone_number=?, address=?, profile_pic=? WHERE user_id=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssi", $name, $email, $phone, $address, $profilePic, $userId);
        if ($stmt->execute()) {
            // Lấy đường dẫn hiện tại của script
            $currentFile = basename($_SERVER['PHP_SELF']);
        
            // Xây dựng URL đầy đủ cho việc chuyển hướng
            $protocol = 'http://';
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                $protocol = 'https://';
            }
            $url = $protocol . $_SERVER['HTTP_HOST'] . '/' . $currentFile;
        
            redirect($currentFile."?user_id=". $userId);
            exit;
        } else {
            echo "<div class='notice'>error:Đã xảy ra lỗi, vui lòng thử lại!</div>";
        }
        $stmt->close();
    }
    
}
?>
<div class="container profile-container">
    <form id="profile" method="post" enctype="multipart/form-data">
    <?php if($user['user_id'] == $_SESSION['user_id']){?>
        <h1 class="username" style= "text-align:center;">Xin chào, <?php echo htmlspecialchars($user['name']); ?></h1>
    <?php }?>
        <div class="row">
            <div class="col-md-4 pic-container mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="picture-image">
                            <img src="<?php if($user['profile_pic'] == "user_default.png"){ ?>/images/user_default.png<?php } else{?>/admin/images/users/<?php echo $user['user_id'] . "/". $user['profile_pic']; }?>" alt="Profile Picture" class="profile-pic"
                                id="profile-pic">
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <?php if($user['user_id'] == $_SESSION['user_id']):?>
                        <div class="input-file-container mt-3" style="position: relative; overflow: hidden;">
                            <input class="input-file" style="opacity: 0; position: absolute; z-index: -1;"
                                id="my-file" type="file" name="profile_image" data-return="#file-return">
                            <button class="input-file-trigger btn btn-info" style="width:60%; margin: 0 20%;">Thay đổi</button>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <p class="email d-sm-flex text-center mt-3">Email: <?php echo htmlspecialchars($user['email']); ?></p>
                <div class="form-group">
                    <label for="name">Họ tên</label>
                    <input type="text" class="form-control" id="name" name="name" value ="<?php echo htmlspecialchars($user['name']); ?>" <?php echo $pms;?>>
                </div>
                <?php if($user['user_id'] == $_SESSION['user_id']):?>
                    <div class="form-group">
                        <label for="old-password">Mật khẩu cũ</label>
                        <input type="password" class="form-control" id="old-password" name="old-password">
                    </div>
                    <div class="form-group">
                        <label for="new-password">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="new-password" name="new-password">
                    </div>
                    <div class="form-group">
                        <label for="acpt-password">Xác nhận mật khẩu mới</label>
                        <input type="password" class="form-control" id="acpt-password" name="acpt-password">
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="tel" class="form-control" id="phone" name ="phone" value="<?php echo htmlspecialchars($user['phone_number']); ?>" <?php echo $pms;?>>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <textarea class="form-control" id="address" rows="3" name ="address" <?php echo $pms;?>><?php if($user['address']) echo htmlspecialchars($user['address']); ?></textarea>
                </div>
                <?php if($user['user_id'] == $_SESSION['user_id']):?>
                    <div class="d-sm-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </form>
</div>
