<?php
  if(isset($_SESSION['login']) && $_SESSION['login'] == true){
    echo<<<data
    <div class="header">
      <ul class ="menu">
          <li class="nav-item logo">
              <a class="nav-link logo" href="index.php" > <img src="images/{$data_homestay['logo_image']}">&nbsp;{$data_homestay['homeStayName']}</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="index.php#home" ><i class="fa fa-home"> </i>&nbsp;Trang chủ</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="index.php#about" ><i class="fas fa-info-circle"></i>&nbsp;Giới thiệu</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="index.php#homestay" ><i class="fas fa-door-open"></i>&nbsp;Homestay</a>
          </li>
          <li class="nav-item horizontal">
              <a class="nav-link" href="index.php#contact" ><i class="fas fa-phone-alt"></i>&nbsp;Liên hệ</a>
          </li>
          <li class="nav-item setting1 diriection">
              <a class="nav-link" href="" ><i class="fas fa-user-alt"></i>&nbsp; $_SESSION[user_name] &nbsp;<span class="rot fa fa-caret-right"></span></a>
              <ul class="subnav1">
                  <li><a class="subnav-link" href="" ><i class="fas fa-user-edit"></i>&nbsp;Thông tin cá nhân</a></li>
                  <li><a class="subnav-link" href="" ><i class="fas fa-credit-card"></i>&nbsp;Lịch sử thanh toán</a></li>
data;
                if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true) || (isset($_SESSION['staffLogin']) && $_SESSION['staffLogin'] == true))
                    echo '<li><a class="subnav-link" href="admin/dashboard.php" ><i class="fa fa-gear"></i>&nbsp;Trang quản trị</a></li>';
            
echo<<<data
              </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="logout.php" ><i class="fa fa-unlock"></i>&nbsp;Thoát</a>
          </li>
      </ul>
  </div>
  <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
  <label for="openSidebarMenu" class="sidebarIconToggle">
      <div class="spinner diagonal part-1"></div>
      <div class="spinner horizontal"></div>
      <div class="spinner diagonal part-2"></div>
  </label>
  <div id="sidebarMenu">
      <ul class="sidebarMenuInner">
          <li class="nav-item horizontal">
              <a class="nav-link" href="index.php#home" ><i class="fa fa-home logo-icon"> </i>&nbsp;Trang chủ</a>
          </li>
          <li class="nav-item horizontal">
              <a class="nav-link" href="index.php#about" ><i class="fas fa-info-circle"></i>&nbsp;Giới thiệu</a>
          </li>
          <li class="nav-item horizontal">
              <a class="nav-link" href="index.php#homestay" ><i class="fas fa-door-open"></i>&nbsp;Homestay</a>
          </li>
          <li class="nav-item horizontal">
              <a class="nav-link" href="index.ph#contact" ><i class="fas fa-phone-alt"></i>&nbsp;Liên hệ</a>
          </li>
          <li onclick= showSubnav() class="nav-item settings horizontal">
              <p class="nav-link"><i class="fas fa-user-alt"></i>&nbsp;$_SESSION[user_name] &nbsp;<i style="color:#fff;" class="rot fa fa-caret-right"></i></p>
              <ul class="subnav">
                  <li><a class="subnav-link" href="index.php" ><i class="fas fa-user-edit"></i>&nbsp;Thông tin cá nhân</a></li>
                  <li><a class="subnav-link" href="indx.php" ><i class="fas fa-credit-card"></i>&nbsp;Lịch sử thanh toán</a></li>
data;
                if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true) || (isset($_SESSION['staffLogin']) && $_SESSION['staffLogin'] == true))
                    echo '<li><a class="subnav-link" href="admin/dashboard.php" ><i class="fa fa-gear"></i>&nbsp;Trang quản trị</a></li>';
            
echo<<<data
              </ul>
            </li>
            <li class="nav-item horizontal ext">
                <a class="nav-link" href="logout.php" ><i class="fa fa-unlock"></i>&nbsp;Thoát</a>
            </li>
        </ul>
    </div>
    <ul class="notifications"></ul>
  data;
}   
  else{
  echo<<<data
      <div class="header">
      <ul class = "menu">
          <li class="nav-item logo">
              <a class="nav-link logo" href="index.php" ><img src="images/{$data_homestay['logo_image']}">&nbsp;{$data_homestay['homeStayName']}</a>
          </li>
          <li class="nav-item active">
              <a class="nav-link" href="index.php#home" ><i class="fa fa-home"></i>&nbsp;Trang chủ</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="index.php#about" ><i class="fas fa-info-circle"></i>&nbsp;Giới thiệu</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="index.php#homestay" ><i class="fas fa-door-open"></i>&nbsp;Homestay</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="index.php#contact" ><i class="fas fa-phone-alt"></i>&nbsp;Liên hệ</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="acc.php" ><i class="fas fa-lock"></i>&nbsp;Đăng nhập</a>
          </li>
      </ul>
  </div>
  <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
  <label for="openSidebarMenu" class="sidebarIconToggle">
      <div class="spinner diagonal part-1"></div>
      <div class="spinner horizontal"></div>
      <div class="spinner diagonal part-2"></div>
  </label>
  <div id="sidebarMenu">
      <ul class="sidebarMenuInner">
      <li class="nav-item horizontal">
      <a class="nav-link" href="index.php" ><i class="fa fa-home logo-icon"> </i>&nbsp;Trang chủ</a>
      </li>
      <li class="nav-item horizontal">
          <a class="nav-link" href="index.php" ><i class="fas fa-info-circle"></i>&nbsp;Giới thiệu</a>
      </li>
      <li class="nav-item horizontal">
          <a class="nav-link" href="index.php" ><i class="fas fa-door-open"></i>&nbsp;Homestay</a>
      </li>
      <li class="nav-item horizontal">
          <a class="nav-link" href="index.php" ><i class="fas fa-phone-alt"></i>&nbsp;Liên hệ</a>
      </li>
      <li class="nav-item  horizontal">
          <a class="nav-link" href="acc.php" ><i class="fas fa-lock"></i>&nbsp;Đăng nhập</a>
      </li>
      </ul>
  </div>
  <ul class="notifications"></ul>
  data;
} ?>
  
