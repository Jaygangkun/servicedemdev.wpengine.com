<?php /* Block Name: Partners Block */ ?>

<section class="partner-block">
  
  <div class="container">
  	<div class="row">
  		<div class="col-lg-12 text-center">
  			<h2 class="wow fadeIn" data-wow-duration="0.5s"><?php the_field('section_title'); ?></h2>
  		</div><!-- end .col-lg-12 -->
  	</div><!-- end .row -->
  </div><!-- end .container -->
  
  <div class="partners">
    <div class="container">
    	<div class="row align-items-center justify-content-center">
      		<?php 
            $images = get_field('partner_logos');
            $size = 'medium'; // (thumbnail, medium, large, full or custom size)
            if( $images ): ?>
              <?php $delay = 0.2?>
              <?php foreach( $images as $image_id ): ?>
                <div class="col-lg-3 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="<?php echo $delay?>s">
                  <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                  <?php $delay += 0.2 ?>
                </div><!-- end .col-lg-4 -->
              <?php endforeach; ?>
            <?php endif; ?>
    	</div><!-- end .row -->
    </div><!-- end .container -->
  </div><!-- end .partners -->
  
</section>