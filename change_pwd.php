<?php
session_start();
require_once ('admin/inc/db_config.php');
require_once ('admin/inc/essentials.php');
$data_homestay = readConfig();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php require ('inc/links.php'); ?>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/rst.css">

</head>

<body>
<?php  if(!isset($_SESSION['login']) || !$_SESSION['login'] == true){ ?>
  <?php require ('inc/header.php'); ?>
    <?php if(isset($_SESSION["user_reset"]) && $_SESSION["user_reset"] == true){?>
      <div class="container">
          <div class="row">
              <div class="col-md-12 form">
                  <form action="change_pwd.php" method="POST" autocomplete="off">
                      <h2 class="text-center">Mật khẩu mới</h2>
                    
                      <div class="form-group">
                          <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu mới" required>
                      </div>
                      <div class="form-group">
                          <input class="form-control" type="password" name="cpassword" placeholder="Xác nhận mật khẩu" required>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="action" value="resetpwd">
                        <button class="form-control button" type="submit">Thay đổi</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    <?php } ?>
<?php }else {
    redirect('index.php');
} require ("admin/inc/footer.php") ?>

  <script>
  <?php if(!isset($_SESSION["user_reset_id"])){?>
      $(document).ready(function () {
          var urlParams = new URLSearchParams(window.location.search);
          var tokenValue = urlParams.get('token');
          console.log(tokenValue);
          load();
          if(tokenValue){
            $.ajax({
              url: '/admin/ajax/change_pwd.php', 
              type: 'POST',
              data: { 'token': tokenValue },
              dataType: 'json',
              success: function (response) {
                closeload();
                if(response.status)
                    createToast(response.status, response.message);
                setTimeout(function () {
                    window.location.href = 'change_pwd.php';
                }, 5000);
              },
              error: function (jqXHR, textStatus, errorThrown) {
                closeload();
                createToast("error", "Đã có lỗi xảy ra, vui lòng tải lại trang!");
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
              } 
            });
          }
          else window.location.href = 'index.php';
      });
  
  <?php }
  else{ ?> 
    $(document).ready(function() {
          var urlParams = new URLSearchParams(window.location.search);
          var tokenValue = urlParams.get('token');
          console.log(tokenValue);
      $('form').on('submit', function(e) {
          e.preventDefault(); // Ngăn chặn hành vi submit mặc định của form
          load();
          var formData = $(this).serialize(); // Lấy dữ liệu từ form

          $.ajax({
              type: 'POST',
              url: '/admin/ajax/change_pwd.php', 
              data: formData,
              dataType: 'json',
              success: function(response) {
                closeload();
                if(response.status)
                    createToast(response.status, response.message);
                  if(response.status === "success"){
                    setTimeout(function () {
                      window.location.href = 'index.php';
                    }, 4000);
                  }
                
                },
              error: function() {
                closeload();
                createToast("error", "Đã có lỗi xảy ra, vui lòng tải lại trang!");
              }
          });
      });
  });
  <?php } ?>
  </script>
</body>

</html>