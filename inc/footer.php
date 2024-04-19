
<section class="footer">
    <div class="cr">Copyright © <?php echo $data_homestay['footer'];?></div>
</section>
<script src="https://pay.vnpay.vn/lib/vnpay/vnpay.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
<script src="swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    // Hàm để gửi yêu cầu Ajax định kỳ
    function updateRoomStatus() {
        $.ajax({
            url: '/admin/ajax/update_room_status.php',
            type: 'POST',
            data: {
                currentTime: new Date().toISOString() // Gửi thời gian hiện tại nếu cần
            },
            success: function(response) {
                console.log('Update success:', response);
            },
            error: function(xhr, status, error) {
                console.error('Update error:', error);
            }
        });
    }

    // Thiết lập Interval để chạy hàm mỗi giờ
    setInterval(updateRoomStatus, 3600000); 

    // Gọi lần đầu khi trang được tải
    updateRoomStatus();
});
</script>
<script>
  $(document).ready(function () {
    $('[data-table]').DataTable({
      "language": {
        "sProcessing": "Đang xử lý...",
        "sLengthMenu": "Hiển thị _MENU_ mục",
        "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
        "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
        "sInfoFiltered": "(được lọc từ _MAX_ mục)",
        "sInfoPostFix": "",
        "sSearch": "Tìm kiếm:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Đầu",
          "sPrevious": "Trước",
          "sNext": "Tiếp",
          "sLast": "Cuối"
        }
      }
    });
  });
</script>
<script>window.isAdminLoggedIn = <?php echo (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true) ? 'true' : 'false'; ?>;</script>
<script src= "js/nav.js"></script>
