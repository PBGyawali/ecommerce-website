<!-- ========================= FOOTER ========================= -->



<footer class="section-footer border-top py-3">
	<div class="container">  
        <p class="d-flex justify-content-between">
        <a class="text-left" href="">Terms and conditions</a> 
        <span class="text-center">© Copyright <?=ucwords(SITE_NAME)?> <script> document.write(new Date().getFullYear());</script> All rights reserved</span>
        <span class="text-right"> 
				<i class="fab fa-lg fa-cc-visa text-danger"></i>
				<i class="fab fa-lg fa-cc-paypal text-primary"></i>
				<i class="fab fa-lg fa-cc-mastercard text-warning"></i>
        </span>
    </p>		
    <a class="no-border fixed-bottom text-primary text-right size-30 scroll-to-top" :class="{ 'invisible': !showNavbar }" data-href="#page-top"><i class="fas fa-4x fa-angle-up"></i></a>
</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->

</div>  
<script src="<?php echo JS_URL;?>pagination.js"></script>
<script>  
  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    window.scrollTo(0, 0)
      
  });

</script>
</body>
</html>