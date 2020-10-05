		<footer role="contentinfo">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="logo-wrapper">
              <?php 
                $image = get_field('footer_logo', 'option');
                $size = 'medium'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                  echo wp_get_attachment_image( $image, $size );
                }
              ?>
              
              <p class="copyright">&copy; Copyright <?= date('Y'); ?><br> Service Demand LLC. <br />All rights reserved.</p>
            </div>
          </div><!-- end .col-lg-4-->
          <div class="col-lg-4">
            <div class="footer-titles">Info</div>
            <?php wp_nav_menu( array( 'menu' => 'About - Footer' ) ); ?>
          </div><!-- end .col-lg-4-->
          <div class="col-lg-4">
            <div class="footer-titles">Support</div>
            <?php wp_nav_menu( array( 'menu' => 'Support - Footer' ) ); ?>
          </div><!-- end .col-lg-4-->
        </div><!-- end .row-->
      </div><!-- end .container-->
    </footer><!-- end .footer-->
		
		<!-- all js scripts are loaded in library/primer.php -->
		<?php wp_footer(); ?>
		
		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

	</body>

</html> <!-- end page. what a ride! -->
