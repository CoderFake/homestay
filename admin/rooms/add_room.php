<?php
session_start();
require_once ('../inc/essentials.php');
require_once ('../inc/db_config.php');
adminLogin();
$data_homestay = readConfig();
$userdata = User();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php require ("../inc/links.php") ?>
</head>

<body>
  <div class="adminx-container">
    <?php require ("../inc/header.php") ?>
    <!-- adminx-content-aside -->
    <div class="adminx-content">
      <div class="adminx-main-content" style="padding-bottom:60px;">
        <div class="container-fluid">
          <!-- BreadCrumb -->
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb adminx-page-breadcrumb">
              <li class="breadcrumb-item"><a href="/admin/dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="/admin/rooms/rd_room.php">Quản lý homestay</a></li>
              <li class="breadcrumb-item active" aria-current="page">Thêm homestay</li>
            </ol>
          </nav>
          <div class="row">
            <div class="col-lg-6">
              <div class="pb-3 text-center text-md-left">
                <h2 class="my-4">Thêm homestay</h2>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group d-flex justify-content-end align-items-center">
                <button type="submit" id="submitBtn" class="btn btn-primary">Thêm phòng</button>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="card-header-title p-1">Thông tin</div>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="form-group">
                          <label class="form-label" for="room_name">Tên phòng</label>
                          <input type="text" class="form-control mb-3" name="room_name" id="roomName">
                        </div>
                        <div class="form-group">
                          <label class="form-label" for="area">Khu vực</label>
                          <div class="row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                              <select class="form-control" id="district">
                                <option value="" selected>Chọn quận huyện</option>
                              </select>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                              <select class="form-control" id="ward">
                                <option value="" selected>Chọn phường xã</option>
                              </select>
                            </div>
                            <div class="col-sm-4 mb-sm-0">
                              <input class="form-control h-100" id="road" value="" placeholder="Số nhà, tên đường" />
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="form-label" for="price">Giá phòng</label>
                          <div class="row">
                            <div class="col-md-4 pt">
                              <input style="background-color: transparent;" class="form-control w-100 mx-auto"
                                name="price_input" type="text" id="price_input" readonly value="">
                            </div>
                            <div class="col-md-8">
                              <div class="range-wrap w-100">
                                <div class="range-value" id="price_rangeV"></div>
                                <input id="price_range" type="range" min="0" max="5000000" value="100000" step="10000">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="form-label" for="room_amount">Số phòng</label>
                          <div class="row">
                            <div class="col-md-4 pt">
                              <input style="background-color: transparent;" class="form-control w-100 mx-auto"
                                type="text" id="room_input" readonly value="">
                            </div>
                            <div class="col-md-8">
                              <div class="range-wrap w-100">
                                <div class="range-value" id="room_rangeV"></div>
                                <input id="room_range" type="range" name="room_amount" min="0" max="100" value="1"
                                  step="1">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="form-label" for="adult">Người lớn</label>
                          <div class="row">
                            <div class="col-md-4 pt">
                              <input style="background-color: transparent;" class="form-control w-100 mx-auto"
                                type="text" id="adult_input" readonly value="">
                            </div>
                            <div class="col-md-8">
                              <div class="range-wrap w-100">
                                <div class="range-value" id="adult_rangeV"></div>
                                <input id="adult_range" type="range" name="adult" min="0" max="10" value="1" step="1">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="form-label" for="child">Trẻ em</label>
                          <div class="row">
                            <div class="col-md-4 pt">
                              <input style="background-color: transparent;" class="form-control w-100 mx-auto"
                                type="text" id="child_input" readonly value="">
                            </div>
                            <div class="col-md-8">
                              <div class="range-wrap w-100">
                                <div class="range-value" id="child_rangeV"></div>
                                <input id="child_range" type="range" name="child" min="0" max="10" value="1" step="1">
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="card border-top-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <div class="card-header-title">Ảnh phòng</div>

                      <nav class="card-header-actions p-0">
                        <a class="card-header-action" data-toggle="collapse" href="#card0" aria-expanded="false"
                          aria-controls="card">
                          <i data-feather="minus-circle" class="zoom-in hid"></i>
                          <i data-feather="plus-circle" class="zoom-out"></i>
                        </a>
                      </nav>
                    </div>
                    <div class="form collapse collapse" id="card0">
                      <form id="crudform" enctype="multipart/form-data">
                        <div class="form-group">
                          <div class="container">
                            <div class="drop-section">
                              <div class="cloud-icon">
                                <img src="/../../images/icons/cloud.png" alt="cloud">
                              </div>
                              <p>Kéo hoặc thả các file của bạn vào đây</p>
                              <p>Hoặc</p>
                              <button class="file-selector">Chọn file</button>
                              <input type="file" id="roomImages" class="file-selector-input" name="roomImages[]"
                                multiple>
                            </div>
                            <div class="list-section">
                              <div class="list-title">Ảnh đã tải lên</div>
                              <div class="list"></div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <div class="card-header-title">Mô tả homstay</div>

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
                        <textarea class="form-control p-10 w-60" name="" id="desc" cols="30" rows="12"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="card border-top-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <div class="card-header-title">Cơ bản</div>

                      <nav class="card-header-actions p-0">
                        <a class="card-header-action" data-toggle="collapse" href="#card2" aria-expanded="false"
                          aria-controls="card2">
                          <i data-feather="minus-circle" class="zoom-in hid"></i>
                          <i data-feather="plus-circle" class="zoom-out"></i>
                        </a>
                      </nav>
                    </div>

                    <div class="form collapse collapse" id="card2">
                      <div class="form-group m-4">
                        <div id="facilities-container-basic"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="card border-top-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <div class="card-header-title">Tiện nghi phòng</div>

                      <nav class="card-header-actions p-0">
                        <a class="card-header-action" data-toggle="collapse" href="#card3" aria-expanded="false"
                          aria-controls="card3">
                          <i data-feather="minus-circle" class="zoom-in hid"></i>
                          <i data-feather="plus-circle" class="zoom-out"></i>
                        </a>
                      </nav>
                    </div>

                    <div class="form collapse collapse" id="card3">
                      <div class="form-group m-4">
                        <div id="facilities-container-convenient"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="card border-top-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <div class="card-header-title">Dịch vụ</div>

                      <nav class="card-header-actions p-0">
                        <a class="card-header-action" data-toggle="collapse" href="#card4" aria-expanded="false"
                          aria-controls="card4">
                          <i data-feather="minus-circle" class="zoom-in hid"></i>
                          <i data-feather="plus-circle" class="zoom-out"></i>
                        </a>
                      </nav>
                    </div>

                    <div class="form collapse collapse" id="card4">
                      <div class="form-group m-4">
                        <div id="facilities-container-service"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="card border-top-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <div class="card-header-title">Tiện ích gia đình</div>

                      <nav class="card-header-actions p-0">
                        <a class="card-header-action" data-toggle="collapse" href="#card5" aria-expanded="false"
                          aria-controls="card5">
                          <i data-feather="minus-circle" class="zoom-in hid"></i>
                          <i data-feather="plus-circle" class="zoom-out"></i>
                        </a>
                      </nav>
                    </div>

                    <div class="form collapse collapse" id="card5">
                      <div class="form-group m-4">
                        <div id="facilities-container-family"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="card border-top-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <div class="card-header-title">An toàn và bảo mật</div>

                      <nav class="card-header-actions p-0">
                        <a class="card-header-action" data-toggle="collapse" href="#card6" aria-expanded="false"
                          aria-controls="card6">
                          <i data-feather="minus-circle" class="zoom-in hid"></i>
                          <i data-feather="plus-circle" class="zoom-out"></i>
                        </a>
                      </nav>
                    </div>

                    <div class="form collapse collapse" id="card6">
                      <div class="form-group m-4">
                        <div id="facilities-container-security"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="card border-top-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <div class="card-header-title">Tiện ích khác</div>

                      <nav class="card-header-actions p-0">
                        <a class="card-header-action" data-toggle="collapse" href="#card7" aria-expanded="false"
                          aria-controls="card7">
                          <i data-feather="minus-circle" class="zoom-in hid"></i>
                          <i data-feather="plus-circle" class="zoom-out"></i>
                        </a>
                      </nav>
                    </div>

                    <div class="form collapse collapse" id="card7">
                      <div class="form-group m-4">
                        <div id="facilities-container-other"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="admin-footer w-100 mt-10" style="height: 60px;"></div>
    </div>
  </div>
  <?php require ("../inc/footer.php") ?>
  <script>
    $(document).ready(function () {
      loadLocations('district', 'R1903516');
      $('#district').on('change', function () {
        loadLocations('ward', $(this).val());
        $('#road').val('');
      });
      $('#ward').on('change', function () {
        $('#road').val('');
      });
      function loadLocations(type, parentId) {
        $.ajax({
          url: '/admin/ajax/api.php',
          type: 'GET',
          data: { type: type, parentId: parentId },
          success: function (data) {
            var locations = JSON.parse(data);
            var name = "";
            if (type == 'district') name = "quận huyện";
            else name = "phường xã";
            $('#' + type).empty().append(new Option(`Chọn ${name}`, ""));
            locations.forEach(function (location) {
              $('#' + type).append(new Option(location.displayName, location.id));
            });
          }
        });
      }
    });
    $(document).ready(function () {
      $.ajax({
        url: '/admin/ajax/get_facilities.php',
        type: 'GET',
        success: function (response) {
          if (response.status == 'success') {
            var flt = response.facilities;
            var count = 1;
            $.each(response.facilities, function (index, flt) {
              if (count < 7) {
                $('#facilities-container-basic').append(
                  '<div class="form-group m-4">' +
                  '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" />' +
                  '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                  '</div>'
                );
              }
              else if (count >= 7 && count < 11) {
                $('#facilities-container-convenient').append(
                  '<div class="form-group m-4">' +
                  '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" />' +
                  '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                  '</div>'
                );
              }
              else if (count >= 11 && count < 14) {
                $('#facilities-container-service').append(
                  '<div class="form-group m-4">' +
                  '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" />' +
                  '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                  '</div>'
                );
              }
              else if (count >= 14 && count < 16) {
                $('#facilities-container-family').append(
                  '<div class="form-group m-4">' +
                  '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" />' +
                  '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                  '</div>'
                );
              }
              else if (count >= 16 && count < 18) {
                $('#facilities-container-security').append(
                  '<div class="form-group m-4">' +
                  '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" />' +
                  '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                  '</div>'
                );
              }
              else {
                $('#facilities-container-other').append(
                  '<div class="form-group m-4">' +
                  '<input type="checkbox" class="facility-checkbox" id="facility_' + flt.facility_id + '" name="facilities[]" value= "' + flt.facility_id + '" />' +
                  '<label for="facility_' + flt.facility_id + '">' + flt.name + '</label>' +
                  '</div>'
                );
              }
              count++
            });
          } else {
            $('.notice').text('error:Lỗi khi tải tiện ích!');
          }
        },
        error: function () {
          $('.notice').text("error: Đã có lỗi xảy ra!");
        }
      });
    });
    $(document).ready(function () {
      $("#crudform").submit(function (event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của form submit

        // Tạo mảng để lưu tên file
        var fileNames = [];
        // Lấy tên các file được chọn
        $('.file-name .name').each(function () {
          fileNames.push($(this).text());
        });
        // Tạo đối tượng FormData
        var formData = new FormData(this);
        formData.append('fileNames', encodeURIComponent(JSON.stringify(fileNames)));
        // Thêm các giá trị khác vào formData
        formData.append('name', $("#roomName").val().trim());
        formData.append('area', $('#road').val().trim() + ", " + $('#ward option:selected').text().trim() + ", " + $('#district option:selected').text().trim());
        formData.append('price', $("#price_input").val().replace(/[^\d]/g, ''));
        formData.append('room_total', $("#room_input").val().replace(/\D/g, ''));
        formData.append('adult_capacity', $("#adult_input").val().replace(/\D/g, ''));
        formData.append('children_capacity', $("#child_input").val().replace(/\D/g, ''));
        formData.append('description', $("#desc").val());

        // Lấy các giá trị từ checkbox được check và thêm vào formData
        $(".facility-checkbox:checked").each(function () {
          formData.append('facilities[]', $(this).val());
        });
        load();
        // Gửi AJAX
        $.ajax({
          url: '/admin/ajax/add_room.php', // Thay đổi đường dẫn tới file xử lý của bạn
          type: 'POST',
          data: formData,
          contentType: false, // cần thiết khi gửi đối tượng FormData
          processData: false, // cần thiết khi gửi đối tượng FormData
          success: function (response) {
            // Xử lý khi request thành công
            console.log(response);
            var result = JSON.parse(response);
            $('.notice').text(result.message);
            if (result.status === 'success') {
              $("#roomName").val('');
              $('#road').val('');
              $('#ward').prop('selectedIndex', 0); // Reset dropdown về giá trị đầu tiên
              $('#district').prop('selectedIndex', 0); // Tương tự như trên
              $("#price_input").val('');
              $("#room_input").val('');
              $("#adult_input").val('');
              $("#child_input").val('');
              $("#desc").val('');
              $('#roomImages').val("");
              $('#crudform .list li').remove();
              // Đối với checkbox, bạn có thể muốn bỏ chọn tất cả
              $("input[type='checkbox']").prop('checked', false);
            }
            closeload();

          },
          error: function (xhr, status, error) {
            // Xử lý khi có lỗi
            console.error(error);
            closeload();
          }
        });
      });
    });
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>