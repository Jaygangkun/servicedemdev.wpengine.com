<?php /* Block Name: Hero Block */ ?>

<section class="hero-block">
  <div class="hero-animate wow fadeInRight">
    <div class="hero-animate-container">
      <img class="back-static" src="<?php echo get_template_directory_uri()?>/library/images/hero/back.png">
      <img class="back-wave" src="<?php echo get_template_directory_uri()?>/library/images/hero/back-wave.png">
      <img class="back" src="<?php echo get_template_directory_uri()?>/library/images/hero/back.png">
      <div class="board-group">
          <div class="board-wrap">
              <img class="board" src="<?php echo get_template_directory_uri()?>/library/images/hero/board.png">
              <img class="rect1" src="<?php echo get_template_directory_uri()?>/library/images/hero/rect1.png">
              <img class="rect2" src="<?php echo get_template_directory_uri()?>/library/images/hero/rect2.png">
              <img class="rect3" src="<?php echo get_template_directory_uri()?>/library/images/hero/rect3.png">
              <img class="chart" src="<?php echo get_template_directory_uri()?>/library/images/hero/chart.png">  
          </div>
      </div>
      <img class="table" src="<?php echo get_template_directory_uri()?>/library/images/hero/table.png">
      <div class="man-group">
          <div class="man-wrap">
              <img class="man-arm" src="<?php echo get_template_directory_uri()?>/library/images/hero/man-arm.png">
              <img class="man-body" src="<?php echo get_template_directory_uri()?>/library/images/hero/man-body.png">
          </div>
      </div>
      <div class="plant-group">
          <div class="plant-wrap">
              <img class="plant" src="<?php echo get_template_directory_uri()?>/library/images/hero/plant.png">
              <div>
                  <img class="plant-pot--static" src="<?php echo get_template_directory_uri()?>/library/images/hero/plant-pot.png">
                  <img class="plant-pot" src="<?php echo get_template_directory_uri()?>/library/images/hero/plant-pot.png">
              </div>
          </div>
      </div>        
    </div>
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2 class="wow fadeIn" data-wow-duration="0.5s" data-wow-delay=".3s"><?php the_field('title'); ?></h2>
        <h3 class="wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.6s"><?php the_field('subtitle'); ?></h3>
        <?php 
		$link = get_field('link');
		if( $link ): 
		    $link_url = $link['url'];
		    $link_title = $link['title'];
		    $link_target = $link['target'] ? $link['target'] : '_self';
		?>
        <a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-primary wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.9s" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
      </div><!-- end .col-lg-7-->
    </div><!-- end .row-->
  </div><!-- end .container-->
</section> <!-- end .hero-block-->