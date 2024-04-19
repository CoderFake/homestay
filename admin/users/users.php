<?php
session_start();
require_once ('../inc/essentials.php');
require_once ('../inc/db_config.php');
adminLogin();
$users = selectOrderedUsers();
$data_homestay = readConfig();
$userdata = User();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require ("../inc/links.php") ?>

<body>
  <div class="adminx-container">

    <?php require ("../inc/header.php") ?>
    <!-- Main Content -->
    <div class="adminx-content">
      <div class="adminx-main-content" style="padding-bottom:60px;">
        <div class="container-fluid">
          <!-- BreadCrumb -->
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb adminx-page-breadcrumb">
              <li class="breadcrumb-item"><a href="/admin/dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Quản lý người dùng</li>
            </ol>
          </nav>

          <div class="pb-3">
            <div class="row">
              <div class="col-lg-7" style="height:50px;">
                <div class="text-center text-md-left">
                  <h2>Quản lý người dùng</h2>
                </div>
              </div>
              <div class="col-lg-5">
                <?php if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true): ?>
                  <div class="form-group d-flex justify-content-end align-items-center">
                    <select class="btn btn-sm btn-primary user-btn-edit-control hid" id="btnEditUser"
                      style="height:42px;">
                      <option value="" selected>Thay đổi quyền</option>
                      <option value="admin">admin</option>
                      <option value="staff">nhân viên</option>
                      <option value="customer">khách hàng</option>
                    </select>
                    <button type="submit" id="btnDelUser" class="btn btn-danger ml-2 hid">Xoá users đã chọn</button>
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
                        <th scope="col">Tên người dùng</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Vai trò</th>
                        <th scope="col">Thiết lập</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($users as $user): ?>
                        <tr>
                          <?php if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true): ?>
                            <td>
                              <?php if ($user['user_id'] != 3) { ?>
                                <label class="custom-control custom-checkbox m-0 p-0">
                                  <input type="checkbox" class="checkbox custom-control-input table-select-row"
                                    id="user_<?php echo htmlspecialchars($user['user_id']); ?>">
                                  <img class="uncheckRoom" src="/images/icons/unchecked.svg" style="height:25px; width:25px;">
                                  <img class="checkRoom hid" src="/images/icons/checked.svg" style="height:25px; width:25px;">
                                  <input class="input-select-control d-none"
                                    value="<?php echo htmlspecialchars($user['user_id']); ?>" />
                                </label>
                              <?php } ?>
                            </td>
                          <?php endif; ?>
                          <td>
                            <?php echo htmlspecialchars($user['name']); ?>
                          </td>
                          <td>
                            <?php echo htmlspecialchars($user['email']); ?>
                          </td>
                          <td>
                            <?php echo htmlspecialchars($user['phone_number']); ?>
                          </td>
                          <td>
                            <?php if ($user['role'] == "admin") { ?>
                              <span class="badge badge-pill badge-primary">admin</span>
                            <?php } else if ($user['role'] == "staff") { ?>
                                <span class="badge badge-pill badge-warning">nhân viên</span>
                            <?php } else { ?>
                                <span class="badge badge-pill badge-info">khách hàng</span>
                              <?php if ($user['is_verified'] == 1) { ?>
                                  <span class="badge badge-pill badge-success">đã xác thực</span>
                              <?php } else { ?>
                                  <span class="badge badge-pill badge-danger">chưa xác thực</span>
                              <?php }
                              } ?>

                            </span>
                          </td>
                          <td>
                            <input class="input-view-control d-none"
                              value="<?php echo htmlspecialchars($user['user_id']); ?>" />
                            <?php if ((isset($_SESSION['staff_id']) && $_SESSION['staff_id'] == $user['user_id']) || (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] == $user['user_id'])):?>
                              <button class="btn btn-sm btn-primary user-btn-edit-control">Xem & Sửa</button>
                            <?php else :?>
                              <button class="btn btn-sm btn-info user-btn-view-control">Xem</button>
                            <?php endif;?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if (empty($users)): ?>
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
  <?php require_once ("../inc/footer.php") ?>
  <script>
    $(document).ready(function () {

      // Xử lý sự kiện khi thay đổi quyền
      $("#btnEditUser").change(function () {
        var role = $(this).val(); // Lấy quyền được
        var selectedUsers = [];
        $(".table-select-row:checked").each(function () {
          // Lấy giá trị của thẻ input 'input-select-control' tương ứng
          var userId = $(this).closest("td").find(".input-select-control").val();

          // Thêm giá trị vào mảng
          selectedUsers.push(userId);
        });

        console.log(role);
        console.log(selectedUsers);
        // Gửi AJAX request để cập nhật quyền
        if (role) {
          load();
          $.ajax({
            url: "/admin/ajax/users.php", // Đường dẫn đến script xử lý
            type: "POST",
            data: {
              action: "update_role",
              userIds: selectedUsers,
              role: role
            },
            dataType: 'json',
            success: function (response) {
              closeload();
              console.log(response);
              createToast(response.status, response.message);
              setTimeout(function() {
                window.location.href = '/admin/users/users.php';
              }, 4000);
            }
          });
        }
      });

      // Xử lý sự kiện khi nhấn nút Xoá người dùng đã chọn
      $("#btnDelUser").click(function () {
        var selectedUsers = [];
        $(".table-select-row:checked").each(function () {
          // Lấy giá trị của thẻ input 'input-select-control' tương ứng
          var userId = $(this).closest("td").find(".input-select-control").val();

          // Thêm giá trị vào mảng
          selectedUsers.push(userId);
        });

        load();
        $.ajax({
          url: "/admin/ajax/users.php", // Đường dẫn đến script xử lý
          type: "POST",
          data: {
            action: "delete_users",
            userIds: selectedUsers
          },
          dataType: 'json',
          success: function (response) {
            closeload();
            console.log(response);
            createToast(response.status, response.message);
            setTimeout(function () {
              window.location.href = '/admin/users/users.php';
            }, 4000);
          }
        });
      });
    });
  </script>
</body>

</html>