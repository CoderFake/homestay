
<section class="footer">
    <div class="cr">Copyright © <?php echo $data_homestay['footer'];?></div>
</section>
<script src="https://pay.vnpay.vn/lib/vnpay/vnpay.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>window.isAdminLoggedIn = <?php echo (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true) ? 'true' : 'false'; ?>;</script>
<script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
</script>
<script src= "js/nav.js"></script>
