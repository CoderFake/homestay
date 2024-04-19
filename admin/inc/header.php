
    <nav class="navbar navbar-expand justify-content-between fixed-top">
        <a class="navbar-brand mb-0 h1 d-none d-md-block" href="/admin/dashboard.php">
          <img src="/../images/<?php echo $data_homestay['logo_image'];?>" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
          <?php if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true) ) echo "Admin Panel";
          else echo "Staff Panel";?>
           
        </a>

        <form class="form-inline form-quicksearch d-none d-md-block mx-auto">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-icon">
                <i data-feather="search"></i>
              </div>
            </div>
            <input type="text" class="form-control" id="search" placeholder="Type to search...">
          </div>
        </form>

        <div class="d-flex flex-1 d-block d-md-none">
          <a href="#" class="sidebar-toggle ml-3">
            <i data-feather="menu"></i>
          </a>
        </div>

        <ul class="navbar-nav d-flex justify-content-end mr-2">
          <!-- Notificatoins -->
          <li class="nav-item dropdown d-flex align-items-center mr-2">
            <a class="nav-link nav-link-notifications" id="dropdownNotifications" data-toggle="dropdown" href="#">
              <i class="oi oi-bell display-inline-block align-middle"></i>
              <span class="nav-link-notification-number">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-notifications" aria-labelledby="dropdownNotifications">
              <div class="notifications-header d-flex justify-content-between align-items-center">
                <span class="notifications-header-title">
                  Notifications
                </span>
                <a href="#" class="d-flex"><small>Đánh dấu là đã đọc</small></a>
              </div>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action unread">
                  <p class="mb-1">Mai anh đã đặt phòng</p>

                  <div class="mb-1">
                    <button type="button" class="btn btn-primary btn-sm">Chấp nhận yêu cầu</button>
                    <button type="button" class="btn btn-outline-danger btn-sm">Từ chối</button>
                  </div>

                  <small>1 giờ trước</small>
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                  <p class="mb-1 text-danger"><strong>A đã huỷ đặt phòng</strong></p>
                  <small>3 days ago</small>
                </a>
              </div>

              <div class="notifications-footer text-center">
                <a href="#"><small>Xem tất cả thông báo</small></a>
              </div>
            </div>
          </li>
          <!-- Notifications -->
          <li class="nav-item dropdown">
            <a class="nav-link avatar-with-name" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">
              <img src="<?php if($userdata['profile_pic'] == "user_default.png"){ ?>/../images/user_default.png<?php } else{?>/admin/images/users/<?php echo $_SESSION['user_id'] . "/". $userdata['profile_pic']; }?>" class="d-inline-block align-top" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/admin/users/inf_users.php?user_id=<?php echo $_SESSION['user_id'];?>">Thông tin cá nhân</a>
              <a class="dropdown-item" href="#">Việc cần làm</a>
              <a class="dropdown-item" href="#">Cài đặt</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-warning" href="/../index.php">Về trang chủ</a>
              <a class="dropdown-item text-danger" href="/../logout.php">Thoát</a>
            </div>
          </li>
        </ul>
      </nav>

      <!-- expand-hover push -->
      <!-- Sidebar -->
      <div class="adminx-sidebar expand-hover push">
        <ul class="sidebar-nav">
          <li class="sidebar-nav-item">
            <a href="/admin/dashboard.php" class="sidebar-nav-link">
              <span class="sidebar-nav-icon">
                <i data-feather="home"></i>
              </span>
              <span class="sidebar-nav-name">
                Dashboard
              </span>
              <span class="sidebar-nav-end">

              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a class="sidebar-nav-link nav-room collapsed" data-toggle="collapse" href="#navUI" aria-expanded="false" aria-controls="navUI">
              <span class="sidebar-nav-icon">
                <i data-feather="grid"></i>
              </span>
              <span class="sidebar-nav-name">
                Quản lý homestay
              </span>
              <span class="sidebar-nav-end">
                    <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>

            <ul class="sidebar-sub-nav collapse" id="navUI">
              <?php if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true) ) {
              echo<<<data
                <li class="sidebar-nav-item">
                  <a href="/admin/rooms/add_room.php" class="sidebar-nav-link">
                    <span class="sidebar-nav-abbr">
                      C
                    </span>
                    <span class="sidebar-nav-name">
                      Thêm phòng
                    </span>
                  </a>
                </li>
                data;
              }?>
              <li class="sidebar-nav-item">
                <a href="/admin/rooms/rd_room.php" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    R
                  </span>
                  <span class="sidebar-nav-name">
                    Xem phòng
                  </span>
                </a>
              </li>
              <?php if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true) ) {
              echo<<<data
                <li class="sidebar-nav-item">
                  <a href="/admin/rooms/up_room.php" class="sidebar-nav-link">
                    <span class="sidebar-nav-abbr">
                      U
                    </span>
                    <span class="sidebar-nav-name">
                      Sửa phòng
                    </span>
                  </a>
                </li>

                <li class="sidebar-nav-item">
                  <a href="/admin/rooms/rm_room.php" class="sidebar-nav-link">
                    <span class="sidebar-nav-abbr">
                      D
                    </span>
                    <span class="sidebar-nav-name">
                      Xoá phòng
                    </span>
                  </a>
                </li>
                data;
              }?>
            </ul>
          </li>

          
          <li class="sidebar-nav-item">
            <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navTables" aria-expanded="false" aria-controls="navTables">
              <span class="sidebar-nav-icon">
                <i data-feather="user"></i>
              </span>
              <span class="sidebar-nav-name">
                Quản lý tài khoản 
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>

            <ul class="sidebar-sub-nav collapse" id="navTables">
              <li class="sidebar-nav-item">
                <a href="/admin/users/users.php" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    Ur
                  </span>
                  <span class="sidebar-nav-name">
                    Quản lý tài khoản
                  </span>
                </a>
              </li>

              <li class="sidebar-nav-item">
                <a href="/admin/users/inf_users.php?user_id=<?php echo $_SESSION['user_id']?>" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    If
                  </span>
                  <span class="sidebar-nav-name">
                    Thông tin tài khoản
                  </span>
                </a>
              </li>
            </ul>
          </li>

          <li class="sidebar-nav-item">
            <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#example" aria-expanded="false" aria-controls="example">
              <span class="sidebar-nav-icon">
                <i data-feather="phone"></i>
              </span>
              <span class="sidebar-nav-name">
                Tin nhắn tư vấn 
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>

            <ul class="sidebar-sub-nav collapse" id="example">
              <li class="sidebar-nav-item">
                <a href="/admin/contact/contact.php" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    Ct
                  </span>
                  <span class="sidebar-nav-name">
                    Danh sách tư vấn
                  </span>
                </a>
              </li>

              <li class="sidebar-nav-item">
                <a href="/admin/contact/response.php" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    Rs
                  </span>
                  <span class="sidebar-nav-name">
                    Phản hồi khách hàng
                  </span>
                </a>
              </li>
            </ul>
          </li>

          <li class="sidebar-nav-item">
            <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navForms" aria-expanded="false" aria-controls="navForms">
              <span class="sidebar-nav-icon">
                <i data-feather="edit"></i>
              </span>
              <span class="sidebar-nav-name">
                Quản lý đặt phòng
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>

            <ul class="sidebar-sub-nav collapse" id="navForms">
              <li class="sidebar-nav-item">
                <a href="/admin/booked/accept.php" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    Ap
                  </span>
                  <span class="sidebar-nav-name">
                    Xác nhận đặt phòng
                  </span>
                </a>
              </li>

              <li class="sidebar-nav-item">
                <a href="/admin/booked/booked.php" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    Ad
                  </span>
                  <span class="sidebar-nav-name">
                    Danh sách đã đặt
                  </span>
                </a>
              </li>
            </ul>
          </li>

          <li class="sidebar-nav-item">
            <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navExtra" aria-expanded="false" aria-controls="navExtra">
              <span class="sidebar-nav-icon">
                <i data-feather="layers"></i>
              </span>
              <span class="sidebar-nav-name">
                Other Layouts
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>

            <ul class="sidebar-sub-nav collapse" id="navExtra">
              <li class="sidebar-nav-item">
                <a href="./layouts/login.html" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    Lo
                  </span>
                  <span class="sidebar-nav-name">
                    Login
                  </span>
                </a>
              </li>

              <li class="sidebar-nav-item">
                <a href="./layouts/signup.html" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    Si
                  </span>
                  <span class="sidebar-nav-name">
                    Sign Up
                  </span>
                </a>
              </li>

              <li class="sidebar-nav-item">
                <a href="./layouts/404.html" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    Nf
                  </span>
                  <span class="sidebar-nav-name">
                    404 Error
                  </span>
                </a>
              </li>

              <li class="sidebar-nav-item">
                <a href="./layouts/500.html" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    Is
                  </span>
                  <span class="sidebar-nav-name">
                    500 Error
                  </span>
                </a>
              </li>

              <li class="sidebar-nav-item">
                <a href="./layouts/timeline.html" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    Ti
                  </span>
                  <span class="sidebar-nav-name">
                    Timeline
                  </span>
                </a>
              </li>

              <li class="sidebar-nav-item">
                <a href="./layouts/invoice.html" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    In
                  </span>
                  <span class="sidebar-nav-name">
                    Invoice
                  </span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div><!-- Sidebar End -->







































<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <h4 class="mt-2 text-light">ADMIN PANEL</h3>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
            </button>
        <a href="logout.php" class="btn btn-light btn-sm">ĐĂNG XUẤT</a>
    </div>
    <div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-dark ">
         <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2 text-light">ADMIN PANEL</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                <ul class="nav nav-pills flex-column ">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dashboard.php">THÔNG TIN CHUNG</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#bookingLinks"  collapseExample>
                            <span>THÔNG TIN ĐẶT PHÒNG</span>
                            <span><i class="bi bi-caret-down-fill"></i></span>
                        </button>
                        <div class="collapse show px-3 small mb-1" id="bookingLinks">
                            <ul class="nav nav-pills flex-column rounded border border-secondary">
                                
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="new_bookings.php">YÊU CẦU ĐẶT PHÒNG</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="booking_ap.php">YÊU CẦU ĐÃ XÁC NHẬN</a>
                                </li>
                                
                                
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="user_queries.php">LIÊN HỆ TƯ VẤN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="users.php">NGƯỜI DÙNG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="rooms.php">HOMESTAY</a>
                    </li>
                    
                    </ul>
                </div>
            </div>
        </nav>
    </div> -->
