<?php
session_start();
require_once ('inc/essentials.php');
require_once ('inc/db_config.php');
adminLogin();
$data_homestay = readConfig();
$sql = "SELECT * FROM rooms WHERE removed = ?";
$values = array(0);
$datatypes = 'i';
$rooms = select($sql, $values, $datatypes);
$queryTotalRooms = "SELECT SUM(quantity) AS total_rooms FROM room_status";
$resultTotalRooms = $con->query($queryTotalRooms);
$totalRooms = $resultTotalRooms->fetch_assoc()['total_rooms'];
$queryBookedRooms = "SELECT SUM(quantity) AS booked_rooms FROM room_status WHERE status='Đã đặt'";
$resultBookedRooms = $con->query($queryBookedRooms); 
$bookedRooms = $resultBookedRooms->fetch_assoc()['booked_rooms'];
$percentage = $totalRooms > 0 ? ($bookedRooms / $totalRooms) * 100 : 0;


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
      "homeStayName" => $_POST['hs_name'] ?? '',
      "address" => $_POST['area'] ?? '', 
      "phone" => $_POST['phone'] ?? '',
      "email" => $_POST['email'] ?? '',
      "facebookLink" => $_POST['facebook'] ?? '',
      "instagramLink" => $_POST['instagram'] ?? '',
      "footer" => $_POST['footer'] ?? '',
      "description" => $_POST['desc'] ?? '',
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

$userdata = User();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require ("inc/links.php") ?>
  <link rel="stylesheet" type="text/css" href="/admin/dist/css/admin.css" media="screen" />
</head>

<body>
  <div class="adminx-container">
    <?php require ("inc/header.php") ?>
    <!-- adminx-content-aside -->
    <div class="adminx-content">
      <!-- <div class="adminx-aside">

        </div> -->

      <div class="adminx-main-content" style="padding-bottom:60px;">
        <div class="container-fluid">
          <!-- BreadCrumb -->
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb adminx-page-breadcrumb">
              <li class="breadcrumb-item"><a href="/admin/dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </nav>

          <div class="pb-3">
            <h1>Dashboard</h1>
          </div>

          <div class="row">
            <div class="col-md-6 col-lg-3 d-flex">
              <div class="card mb-grid w-100">
                <div class="card-body d-flex flex-column">
                  <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title mb-0 d-flex text-center align-items-center">
                      Xin chào, &nbsp;
                      <?php echo htmlspecialchars($userdata['name']); ?> !!!
                    </h5>

                    <div class="card-title-sub">
                      ✌️
                    </div>
                  </div>

                  <div class="progress mt-auto">
                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex">
              <div class="card mb-grid w-100">
                <div class="card-body d-flex flex-column">
                  <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title mb-0">
                      Đã đặt
                    </h5>

                    <div class="card-title-sub">
                      <?php echo htmlspecialchars($bookedRooms); ?>/
                      <?php echo htmlspecialchars($totalRooms); ?>
                    </div>
                  </div>

                  <div class="progress mt-auto">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $percentage; ?>%;"
                      aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex">
              <div class="card border-0 bg-primary text-white text-center mb-grid w-100">
                <div class="d-flex flex-row align-items-center h-100">
                  <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                    <i data-feather="home"></i>
                  </div>
                  <div class="card-body">
                    <div class="card-info-title">Số phòng homestay</div>
                    <h3 class="card-title mb-0">
                      <?php echo htmlspecialchars(mysqli_num_rows($rooms)); ?>
                    </h3>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex">
              <div class="card border-0 bg-success text-white text-center mb-grid w-100">
                <div class="d-flex flex-row align-items-center h-100">
                  <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                    <i data-feather="users"></i>
                  </div>
                  <div class="card-body">
                    <div class="card-info-title">Số người đang đăng nhập</div>
                    <h3 class="card-title mb-0 count-signin">
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <form id="crudform" action="/admin/dashboard.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-6">
                <div class="card border-top-0">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-header-title">Cấu hình website</div>

                    <nav class="card-header-actions p-0">
                      <a class="card-header-action" data-toggle="collapse" href="#card0" aria-expanded="false"
                        aria-controls="card">
                        <i data-feather="minus-circle" class="zoom-in"></i>
                        <i data-feather="plus-circle" class="zoom-out hid"></i>
                      </a>
                    </nav>
                  </div>
                  <div class="form collapse show" id="card0">
                    <div class="form-group m-3">
                      <label class="form-label" for="hs_name">Tên website</label>
                      <input type="text" class="form-control mb-3" value ="<?php echo  $data_homestay['homeStayName'];?>" name="hs_name" id="hs_name">
                    </div>
                    <div class="form-group m-3">
                      <label class="form-label" for="area">Khu vực</label>
                      <input type="text" class="form-control mb-3" value ="<?php echo  $data_homestay['address'];?>" name="area" id="area">
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group m-3">
                          <label class="form-label" for="phone">Số điện thoại</label>
                          <input type="text" class="form-control w-100" value ="<?php echo  $data_homestay['phone'];?>" name="phone" id="phone">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group m-3">
                          <label class="form-label" for="email">Email</label>
                          <input type="text" class="form-control w-100" value ="<?php echo  $data_homestay['email'];?>" name="email" id="email">
                        </div>
                      </div>
                    </div>
                    <div class="form-group m-3">
                      <label class="form-label" for="facebook">Link Facebook</label>
                      <input type="text" class="form-control mb-3" value ="<?php echo  $data_homestay['facebookLink'];?>" name="facebook" id="facebook">
                    </div>
                    <div class="form-group m-3">
                      <label class="form-label" for="instagram">Link Instagram</label>
                      <input type="text" class="form-control mb-3" value ="<?php echo  $data_homestay['instagramLink'];?>" name="instagram" id="instagram">
                    </div>
                    <div class="form-group m-3">
                      <label class="form-label" for="map">Link vị trí bản đồ</label>
                      <input type="text" class="form-control mb-3" value ="<?php echo  $data_homestay['map'];?>" name="map" id="map">
                    </div>
                    <div class="form-group m-3">
                      <label class="form-label" for="footer">Tên footer</label>
                      <input type="text" class="form-control mb-3" value ="<?php echo  $data_homestay['footer'];?>"  name="footer" id="footer">
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-lg-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Nội dung giới thiệu</div>

                        <nav class="card-header-actions p-0">
                          <a class="card-header-action" data-toggle="collapse" href="#card1" aria-expanded="false"
                            aria-controls="card1">
                            <i data-feather="minus-circle" class="zoom-in"></i>
                            <i data-feather="plus-circle" class="zoom-out hid"></i>
                          </a>

                        </nav>
                      </div>
                      <div class="form collapse show" id="card1">
                        <div class="form-group m-4">
                        <textarea class="form-control p-10 w-60" name="desc" id="desc" cols="30" rows="12"><?php echo htmlspecialchars($data_homestay['description']); ?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="card border-top-0">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Ảnh</div>

                        <nav class="card-header-actions p-0">
                          <a class="card-header-action" data-toggle="collapse" href="#card2" aria-expanded="false"
                            aria-controls="card2">
                            <i data-feather="minus-circle" class="zoom-in"></i>
                            <i data-feather="plus-circle" class="zoom-out hid"></i>
                          </a>

                        </nav>
                      </div>
                      <div class="form collapse show" id="card2">
                        <div class="row m-2">
                          <div class="col-lg-4">
                            <div class="form-group mt-3 file-upload-row">
                              <div class="input-file-container" style="position: relative; overflow: hidden;">
                                <input class="input-file" style="opacity: 0; position: absolute; z-index: -1;"
                                  id="my-file1" type="file" name="logo_image" data-return="#file-return1">
                                <button class="input-file-trigger" style="width:100%">Logo</button>
                              </div>
                              <p class="file-return" id="file-return1"></p>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group mt-3 file-upload-row">
                              <div class="input-file-container" style="position: relative; overflow: hidden;">
                                <input class="input-file" style="opacity: 0; position: absolute; z-index: -1;"
                                  id="my-file2" type="file" name="header_image" data-return="#file-return2">
                                <button class="input-file-trigger" style="width:100%;">Trang chủ</button>

                              </div>
                              <p class="file-return" id="file-return2"></p>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group mt-3 file-upload-row">
                              <div class="input-file-container" style="position: relative; overflow: hidden;">
                                <input class="input-file" style="opacity: 0; position: absolute; z-index: -1;"
                                  id="my-file3" type="file" name="about_image" data-return="#file-return3">
                                <button class="input-file-trigger" style="width:100%;">Giới thiệu</button>
                              </div>
                              <p class="file-return" id="file-return3"></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 mt-5">
                    <div class="form-group d-flex justify-content-center align-items-center">
                      <button type="submit" name="updateConfig" id="submitbutton" class="btn btn-success pr-5 pl-5">Cập nhật</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php require ("inc/footer.php") ?>
  <script>
    $(document).ready(function () {
      function fetchUsersLoggedIn() {
        $.ajax({
          url: 'ajax/users.php', // Đảm bảo đường dẫn đúng
          type: 'POST',
          data: { 'getUsersLoggedIn': true },
          dataType: 'json',
          success: function (response) {
            $('.count-signin').text(response.count); // Cập nhật số người dùng
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown); // Ghi lỗi ra console nếu có
          }
        });
      }

      // Gọi ngay khi trang web được load
      fetchUsersLoggedIn();

      // Đặt interval 5 phút
      setInterval(fetchUsersLoggedIn, 300000);
    });
  </script>
</body>

</html>