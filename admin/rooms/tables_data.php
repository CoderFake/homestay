<?php
session_start();
require_once ('../inc/essentials.php');
require_once ('../inc/db_config.php');
adminLogin();
$data_homestay = readConfig();
$room_urls = selectAll('room_images');
$sql = "SELECT * FROM rooms WHERE removed = ?";
$values = array(0);
$datatypes = 'i';
$rooms = select($sql, $values, $datatypes);
$userdata = User();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php require ("../inc/links.php") ?>
</head>

<body>
  <div class="adminx-container">
    <!-- Header -->
    <?php require ("../inc/header.php") ?>

    <!-- Main Content -->
    <div class="adminx-content">
      <div class="adminx-main-content">
        <div class="container-fluid">
          <!-- BreadCrumb -->
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb adminx-page-breadcrumb">
              <li class="breadcrumb-item"><a href="/admin/dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Xem Homestay</a></li>
            </ol>
          </nav>

          <div class="pb-3">
            <div class="row">
              <div class="col-lg-7" style="height:50px;">
                <div class="text-center text-md-left">
                  <h2>Homestays</h2>
                </div>
              </div>
              <div class="col-lg-5">
                <?php if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true): ?>
                  <div class="form-group d-flex justify-content-end align-items-center">
                    <button type="submit" id="btnAdd" class="btn btn-success">Thêm homestay</button>
                    <button type="submit" id="btnDel" class="btn btn-danger ml-2 hid">Xoá homestay đã chọn</button>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="card mb-grid">
                <div class="table-responsive-md">
                  <table class="table table-actions table-striped table-hover mb-0" data-table>
                    <thead>
                      <tr>
                        <?php if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true): ?>
                          <th scope="col">
                            <label class="custom-control custom-checkbox m-0 p-0">
                              <input type="checkbox" class="custom-control-input table-select-all">
                              <span class="custom-control-indicator"></span>
                            </label>
                          </th>
                        <?php endif; ?>
                        <th scope="col">Tên homestay</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số phòng</th>
                        <th scope="col">Giá thuê phòng</th>
                        <th scope="col">Thiết lập</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($rooms as $room): ?>
                        <tr>
                          <?php if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true): ?>
                            <td>
                              <!-- <input type="checkbox" class="checkbox" id ="<?php echo htmlspecialchars($room['room_id']); ?>" name ="<?php echo htmlspecialchars($room['room_id']); ?>"/> -->
                              <!-- <label for="<?php echo htmlspecialchars($room['room_id']); ?>"></label> -->
                              <label class="custom-control custom-checkbox m-0 p-0">
                                <input type="checkbox" class="checkbox custom-control-input table-select-row"
                                  id="<?php echo htmlspecialchars($room['room_id']); ?>">
                                <img class="uncheckRoom" src="/images/icons/unchecked.svg" style="height:25px; width:25px;">
                                <img class="checkRoom hid" src="/images/icons/checked.svg" style="height:25px; width:25px;">
                              </label>
                            </td>
                          <?php endif; ?>
                          <td>
                            <?php echo htmlspecialchars($room['name']); ?>
                          </td>
                          <td>
                            <?php echo htmlspecialchars($room['area']); ?>
                          </td>
                          <td>
                            <?php echo htmlspecialchars($room['room_total']); ?>
                          </td>
                          <td>
                            <?php echo number_format(htmlspecialchars($room['price']), 0, ',', '.'); ?>đ
                          </td>
                          <td>
                            <?php if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true): ?>
                              <button class="btn btn-sm btn-warning <?php echo htmlspecialchars($room['room_id']);?>">Xem</button>
                              <button class="btn btn-sm btn-primary">Sửa</button>
                              <button class="btn btn-sm btn-danger"
                                onclick="deleteRoom(<?php echo htmlspecialchars($room['room_id']); ?>)">Xoá</button>
                            <?php else: ?>
                              <button class="btn btn-sm btn-info">Xem</button>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if (empty($rooms)): ?>
                        <tr>
                          <td colspan="6">Không có dữ liệu</td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- // Main Content -->
  </div>
  <?php require ("../inc/footer.php") ?>
</body>

</html>