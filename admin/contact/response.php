<?php
session_start();
require_once ('../inc/essentials.php');
require_once ('../inc/db_config.php');
adminLogin();
$data_homestay = readConfig();
$users = selectOrderedUsers();
function getQueryById($query_id)
{
    global $con;
    $sql = "SELECT * FROM user_queries WHERE query_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $query_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $query = $result->fetch_assoc();
    $stmt->close();
    return $query;
}


if (isset($_GET['query_id'])) {
    $query_id = $_GET['query_id'];
    $query = getQueryById($query_id);
} else
    redirect('/admin/dashboard.php');
 
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
                            <li class="breadcrumb-item"><a href="/admin/contact/contact.php">Tin nhắn tư vấn</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Phản hồi khách hàng</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="pb-3 text-center text-md-left">
                                <h2 class="my-4">Phản hồi khách hàng</h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group d-flex justify-content-end align-items-center">
                                <button type="submit" id="submitBtnMess" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card w-100">
                                <div class="card-header">
                                    <div class="card-header-title p-1">Thông tin</div>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label class="form-label" for="customerName">Tên khách hàng</label>
                                            <input type="text" class="form-control mb-3" name="customerName"
                                                value="<?php echo htmlspecialchars($query['name']); ?>"
                                                id="customerName" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customerEmail">Email</label>
                                            <input class="form-control h-100" id="customerEmail" name="customerEmail"
                                                value="<?php echo htmlspecialchars($query['email']); ?>" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customerPhone">Số điện thoại</label>
                                            <input class="form-control h-100" id="customerPhone" name="customerPhone"
                                                value="<?php echo htmlspecialchars($query['phone']); ?>" readonly />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="card-header-title">Tin nhắn khách hàng</div>

                                            <nav class="card-header-actions p-0">
                                                <a class="card-header-action" data-toggle="collapse" href="#card1"
                                                    aria-expanded="false" aria-controls="card1">
                                                    <i data-feather="minus-circle" class="zoom-in"></i>
                                                    <i data-feather="plus-circle" class="zoom-out hid"></i>
                                                </a>

                                            </nav>
                                        </div>
                                        <div class="form collapse show" id="card1">
                                            <div class="form-group m-4">
                                                <textarea class="form-control p-10 w-60 pt-3" name="messageCustomer" id="desc" cols="30"
                                                    rows="5" disabled><?php echo htmlspecialchars($query['message']); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="card-header-title">Tin nhắn</div>

                                            <nav class="card-header-actions p-0">
                                                <a class="card-header-action" data-toggle="collapse" href="#card2"
                                                    aria-expanded="false" aria-controls="card2">
                                                    <i data-feather="minus-circle" class="zoom-in"></i>
                                                    <i data-feather="plus-circle" class="zoom-out hid"></i>
                                                </a>

                                            </nav>
                                        </div>
                                        <div class="form collapse show" id="card2">
                                            <div class="form-group m-4">
                                                <textarea class="form-control p-10 w-60 pt-3" name="message" id="desc" cols="30"
                                                    rows="5"></textarea>
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
        $(document).ready(function() {
            var urlParams = new URLSearchParams(window.location.search);
            var searchValue = urlParams.get('query_id');
            $('#submitBtnMess').click(function(e) {
                e.preventDefault(); 
                var queryId = searchValue ;
                var customerName = $('#customerName').val();
                var customerEmail = $('#customerEmail').val();
                var customerPhone = $('#customerPhone').val();
                var message = $('textarea[name="message"]').val();

                load();
                $.ajax({
                    url: '/admin/ajax/send_message.php', 
                    type: 'POST', 
                    data: {
                        'query_id': queryId,
                        'customerName': customerName,
                        'customerEmail': customerEmail,
                        'customerPhone': customerPhone,
                        'message': message
                    },
                    dataType: 'json',
                    success: function(response) { 
                        closeload();
                        console.log(response.status);
                        createToast(response.status, response.message);
                    },
                    error: function(xhr, status, error) {
                        closeload();
                        createToast('error', 'Có lỗi xảy ra, vui lòng thử lại!');
                    }
                });
            });
        });
    </script>

</body>

</html>