<?php
session_start();
require_once ('admin/inc/db_config.php');
require_once ('admin/inc/essentials.php');
$data_homestay = readConfig();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php require ("inc/links.php") ?>
  <link rel="stylesheet" href="css/nav.css">
</head>

<body>
<?php require ("admin/inc/footer.php") ?>
  <script>
    $(document).ready(function () {
        var urlParams = new URLSearchParams(window.location.search);
        var tokenValue = urlParams.get('token');
        load();
        $.ajax({
          url: '/admin/ajax/activate.php', 
          type: 'POST',
          data: { 'token': tokenValue },
          dataType: 'json',
          success: function (response) {
            closeload();
            if(response.status)
                createToast(response.status, response.message);
            setTimeout(function () {
                window.location.href = 'index.php';
            }, 5000);
          },
          error: function (jqXHR, textStatus, errorThrown) {
            closeload();
            createToast("error", "Đã có lỗi xảy ra, vui lòng tải lại trang!");
          } 
        });
    });
  </script>
</body>

</html>