
<section class="footer">
    <div class="cr">Copyright © <?php echo $data_homestay['footer'];?></div>
</section>

<ul class="notifications"></ul>
<!-- Overlay Element -->
<div id="Overlay" style="display:none;">
  <!-- Nơi swiper-container mới sẽ được thêm vào -->
  <div id="overlayContent"></div>
  <button type="button" class="close" id ="closeOverlay" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<script src="https://pay.vnpay.vn/lib/vnpay/vnpay.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script src="/swiper/swiper-bundle.min.js"></script>
<script src="/admin/dist/js/vendor.js"></script>
<script src="/admin/dist/js/admin.js"></script>
<script src= "/admin/scripts/nav.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
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
