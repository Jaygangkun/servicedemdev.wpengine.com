<?php /* Block Name: Features Block */ ?>

<section class="info-blocks">
  <div class="container">
    <div class="row align-items-stretch">
      
      <?php
        $cta = false;
        if ( in_array('Yes', get_field('enable_cta')) ) {
          $cta = true;
        }
      ?>
      
      <?php $count = 1; ?>
      <?php $delay = 0.2; ?>
      <?php if( have_rows('features') ): while ( have_rows('features') ) : the_row(); ?>
          
          <?php if ( $cta && $count == 3 ) : ?>
            
            <div class="col-lg-6 info-block-col cta-block d-flex align-items-center wow fadeIn" data-wow-duration="0.3s" data-wow-delay="<?php echo $delay?>s">
              <div class="text-block">
                <h4><?php the_field('cta_subtitle'); ?></h4>
                <h2><?php the_field('cta_title'); ?></h2>
                
                
                <?php 
                $link = get_field('cta_link');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
                
              </div>
            </div><!-- end .col-lg-6 -->
            <?php $delay += 0.2 ?>
          <?php endif; ?>
      
          <div class="col-lg-3 info-block-col wow fadeIn" data-wow-duration="0.3s" data-wow-delay="<?php echo $delay?>s">
            <div class="info-block d-flex justify-content-center">
              <div>
                <?php 
                  $image = get_sub_field('icon');
                  $size = 'medium'; // (thumbnail, medium, large, full or custom size)
                  if( $image ) {
                    echo wp_get_attachment_image( $image, $size, "", array('class' => 'img-fluid') );
                  }
                ?>
                
                <h3><?php the_sub_field('feature_name'); ?></h3>
              </div>
            </div><!-- end .info-block -->
          </div><!-- end .col-lg-3 -->
          <?php $delay += 0.2 ?>
      <?php $count++; endwhile; endif; ?>
      
    </div><!-- end .row -->

  </div><!-- end .container -->
</section><!-- end .info-block-->