<?php /* Block Name: Features Block */ ?>

<section class="features-block">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h5 class="features__sub-title wow fadeIn" data-wow-duration="0.5s" data-wow-delay=".3s"><?php the_field('sub_title') ?></h5>
        <h4 class="features__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay=".6s"><?php the_field('title') ?></h4>
        <div class="feature__desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay=".9s"><?php the_field('description')?></div>
      </div>
    </div>
    <div class="row features-row">
      <?php
        if( have_rows('features') ):
        
          $delay = 0.2;

          // loop through the rows of data
          while ( have_rows('features') ) : the_row();
      
              // display a sub field value
              $icon = get_sub_field('icon');
              $icon_url = '';
              $icon_alt = '';

              if(!empty($icon)){
                $icon_url = $icon['url'];
                $icon_alt = $icon['alt'];
              }
              
              ?>
              <div class="col-lg-4 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="<?= $delay?>s">
                <div class="feature-item-wrap">
                  <div class="feature-item-content">
                    <div class="feature-item-img-wrap">
                      <img class="feature-item__img" src="<?php echo $icon_url?>" alt="<?php echo $icon_alt?>">
                    </div>
                    <div class="feature-item__title">
                      <?php echo the_sub_field('title') ?>
                    </div>
                  </div>
                  <div class="feature-item-tooltip">
                    <img class="feature-item-tooltip__img" src="<?php echo $icon_url?>" alt="<?php echo $icon_alt; ?>">
                    <div class="feature-item-tooltip__title"><?php the_sub_field('title') ?></div>
                    <div class="feature-item-tooltip__desc"><?php the_sub_field('description') ?></div>
                  </div>
                </div>
              </div>
              <?php
                
            $delay += 0.1;
          endwhile;
      
      else :

      endif;
      ?>
    </div>
  </div>
</section>