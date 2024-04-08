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
  <link rel="stylesheet" type="text/css" href="/admin/dist/css/admin.css" media="screen" />
</head>

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
            <h1>Quản lý người dùng</h1>
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
                              <?php if($user['user_id']!= 3){ ?>
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
                            <?php if($user['role']== "admin"){ ?>
                              <span class="badge badge-pill badge-primary">admin</span>
                            <?php }
                            else if($user['role']== "staff"){?>
                              <span class="badge badge-pill badge-warning">nhân viên</span>
                            <?php }
                            else {?>
                              <span class="badge badge-pill badge-info">khách hàng</span>
                              <?php if($user['is_verified']== 1){ ?>
                                <span class="badge badge-pill badge-success">đã xác thực</span>
                              <?php }
                              else{ ?>
                                <span class="badge badge-pill badge-danger">chưa xác thực</span>
                              <?php } 
                            }?>
                             
                            </span>
                          </td>
                          <td>
                            <input class="input-view-control d-none"
                              value="<?php echo htmlspecialchars($user['user_id']); ?>" />
                            <?php if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true){ ?>
                              <button class="btn btn-sm btn-warning user-btn-view-control">Xem</button>
                              <?php if($user['user_id']!= 3){ ?>
                                <button class="btn btn-sm btn-primary user-btn-edit-control">Sửa</button>
                                <button class="btn btn-sm btn-danger user-btn-del-control">Xoá</button>
                            <?php }else if($_SESSION['admin_id'] == $user['user_id']){ ?>   
                                  <?php if($user['user_id']== 3){ ?>
                                      <button class="btn btn-sm btn-primary user-btn-edit-control">Sửa</button>
                                    <?php }
                                    else {?>
                                    <button class="btn btn-sm btn-primary user-btn-edit-control">Sửa</button>
                                    <button class="btn btn-sm btn-danger user-btn-del-control">Xoá</button>
                                    <?php }?>
                            <?php } }
                              else if( $user['role'] == "customer" || $_SESSION['staff_id'] == $user['user_id']){ ?>
                                  <button class="btn btn-sm btn-info user-btn-view-control">Xem</button>
                            <?php }?>
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
</body>

</html>