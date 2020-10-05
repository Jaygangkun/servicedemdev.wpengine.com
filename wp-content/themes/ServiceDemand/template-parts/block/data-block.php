<?php /* Block Name: Data Block */ ?>

<section class="data-block">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
      <h2 class="wow fadeIn" data-wow-delay=".3s"><?php the_field('title'); ?></h2>

      <div class="row">
        <div class="col-lg-6 mx-auto">
          <h5 class="wow fadeIn" data-wow-delay="0.6s"><?php the_field('description'); ?></h5>
        </div><!-- end .col-lg-6 -->
      </div><!-- end .row -->

      <?php 
        $image = get_field('image');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if( $image ) {
          echo wp_get_attachment_image( $image, $size, '', array('class' => 'data-image img-fluid wow fadeIn', 'data-wow-delay' => '1.5s') );
        }
      ?>
      
      </div><!-- end .col-lg-12 -->
    </div><!-- end .row-->

    <div class="row">
      <?php if( have_rows('info_blocks') ): while ( have_rows('info_blocks') ) : the_row(); ?>
      
        <div class="col-lg-4 icon-wrapper wow fadeIn" data-wow-delay="0.9s">
          
          <div class="icon">
            <img src="<?php the_sub_field('icon'); ?>" alt="<?php the_sub_field('title'); ?>" class="img-fluid" />
          </div><!-- end .icon -->
          
          <div class="icon-info">
            <h4><?php the_sub_field('title'); ?></h4>
            
            <?php 
            $link = get_sub_field('link');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
          </div><!-- end .icon-info -->
        </div><!-- end .col-lg-4 -->
      
      <?php endwhile; endif; ?>
    
    </div><!--end .row-->

  </div><!--end .container-->

</section><!-- end .data-block-->