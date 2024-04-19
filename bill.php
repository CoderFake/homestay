<div class="container bill-container mt-6 mb-7">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-7">
            <div class="card">
                <div class="card-body p-5">
                    <h2><?php  echo htmlspecialchars($data_homestay['homeStayName']);?></h2>
                    <p class="fs-sm">Tên khách hàng: <?php  echo htmlspecialchars($user['name']);?></p>
                    <div class="border-top border-gray-200 pt-4 mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-muted mb-2">Mã hoá đơn</div>
                                <strong><?php  echo htmlspecialchars($booking['order_id']);?></strong>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="text-muted mb-2">Ngày thanh toán</div>
                                <strong><?php  echo htmlspecialchars($booking['booking_date']);?></strong>
                            </div>
                        </div>
                    </div>
                    <div class="border-top border-gray-200 mt-4 py-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-muted mb-2">Thông tin</div>
                                <strong>Thời gian</strong>
                                <p class="fs-sm"> Ngày đến: <?php echo htmlspecialchars($booking['arrival_time'])." ".htmlspecialchars(date('d/m/Y', strtotime($booking['check_in_date'])));?><br>Ngày đi:<?php echo htmlspecialchars($booking['departure_time'])." ".htmlspecialchars(date('d/m/Y', strtotime($booking['check_out_date'])));?></p>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="text-muted mb-2">Phương thức thanh toán</div>
                                <?php if($booking['transaction_id']): ?> 
                                    <strong>Thanh toán online</strong>
                                <?php else: ?>
                                    <strong>Thanh toán tiền mặt</strong>
                                <?php endif; ?>
                                <p class="fs-sm">Lưu ý tiền mặt trả trước khi nhận phòng</p>
                            </div>
                        </div>
                    </div>
                    <table class="table border-bottom border-gray-200 mt-3">
                        <thead>
                            <tr>
                                <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0">Homestay</th>
                                <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm text-end px-0">Giá phòng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-0"> <?php echo htmlspecialchars($booking['room_name']); ?></td>
                                <td class="text-end px-0"><?php echo htmlspecialchars(number_format(intval($booking['transaction_amount'])))."đ"; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-5">
                        <div class="d-flex justify-content-end">
                            <p class="text-muted me-3">Giảm giá</p>
                            <span>0đ</span>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <h5 class="me-3">Tổng</h5>
                            <h5 class="text-success"><?php echo htmlspecialchars(number_format(intval($booking['transaction_amount'])))."đ"; ?></h5>
                        </div>
                    </div>
                </div>
                <a href="#!"
                    class="btn btn-dark btn-lg card-footer-btn justify-content-center text-uppercase-bold-sm hover-lift-light">
                    <span class="svg-icon text-white me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
                            <title>ionicons-v5-g</title>
                            <path d="M336,208V113a80,80,0,0,0-160,0v95"
                                style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px">
                            </path>
                            <rect x="96" y="208" width="320" height="272" rx="48" ry="48"
                                style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px">
                            </rect>
                        </svg>
                    </span>
                    <?php if($booking['booking_status'] == "success"):?> 
                        <span class="badge badge-pill badge-success">Đã thanh toán</span>
                    <?php elseif($booking['booking_status'] == "pendding"):?>
                        <span class="badge badge-pill badge-warning">Chờ thanh toán</span>
                    <?php else:?>
                        <span class="badge badge-pill badge-danger">Huỷ bỏ</span>
                    <?php endif;?>
                </a>
            </div>
        </div>
    </div>
</div>