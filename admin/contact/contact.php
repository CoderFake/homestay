<?php
session_start();
require_once ('../inc/essentials.php');
require_once ('../inc/db_config.php');
adminLogin();
$data_homestay = readConfig();
$users = selectOrderedUsers();

$query = "
    SELECT *
    FROM user_queries
    ORDER BY response ASC;
";


$queries = select($query, [], '');
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
        <!-- adminx-content-aside -->
        <div class="adminx-content">


            <div class="adminx-main-content" style="padding-bottom:60px;">
                <div class="container-fluid">
                    <!-- BreadCrumb -->
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/users/users.php">Tin nhắn tư vấn</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách tư vấn</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="pb-3 text-center text-md-left">
                                <h2>Danh sách tư vấn</h2>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="form-group d-flex justify-content-end align-items-center">
                                <select class="form-control" id="userSelect" name="userSelect">
                                    <option value="">Chọn người dùng</option>
                                    <?php foreach ($users as $usr): ?>
                                        <option value="<?php echo $usr['user_id']; ?>">
                                            <?php echo htmlspecialchars($usr['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="container contact-history-container">
                        <div class="row">
                            <div class="col">
                                <div class="card mb-grid">
                                    <div class="table-responsive-md">
                                        <table class="table table-actions table-striped table-hover mb-0" data-table>
                                            <thead>
                                                <tr>
                                                    <th scope="col">Tên</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Số điện thoại</th>
                                                    <th scope="col">Phản hồi</th>
                                                    <th scope="col">Chi tiết</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($queries as $query): ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($query['name']); ?></td>
                                                        <td><?php echo htmlspecialchars($query['email']); ?></td>
                                                        <td><?php echo htmlspecialchars($query['phone']); ?></td>
                                                        <td><?php echo $query['response'] == 1 ? '<span class="badge badge-pill badge-success">Đã phản hồi</span>' : '<span class="badge badge-pill badge-warning">Chưa phản hồi</span>'; ?>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="queryId" value="<?php echo htmlspecialchars($query['query_id']);?>">
                                                            <?php echo !$query['response'] ? '<button class="btn btn-sm btn-info contact-btn-view-control">Trả lời</button>' : '';?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php if (empty($queries)): ?>
                                                    <tr>
                                                        <td colspan="5">Không có dữ liệu</td>
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
        </div>
    </div>
    <?php require ("../inc/footer.php") ?>
    <script>
        $(document).ready(function () {
            $('.contact-btn-view-control').on('click', function() {
                var searchValue = $(this).closest('td').find('input[type="hidden"]').val();
                window.location.href = '/admin/contact/response.php?query_id=' + searchValue;
            });
        });
    </script>
</body>

</html>