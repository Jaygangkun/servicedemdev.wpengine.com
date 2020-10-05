<?php /* Block Name: Pricing List Block */ ?>

<section class="pricing-list-block period--monthly">
  <div class="container">
    
    <?php /*
    <div class="row">
        <div class="col-lg-6 mx-auto text-center">
            <div class="pricing-period-container">
                <ul class="pricing-period-items">
                    <li data-period="monthly">Monthly</li>
                    <li data-period="annually">Annually</li>
                </ul>
                <div class="pricing-period-thumb">
                    <span class="pricing-period--monthly">Monthly</span>
                    <span class="pricing-period--annually">Annually</span>
                </div>
                
            </div>
        </div>
    </div>
    */ ?>
    
    <div class="row pricing-list-row">
    <?php if ( have_rows('prices') ):

          // loop through the rows of data
          $col_width = (int) 12 / count(get_field('prices'));
          $delay = 1;
          while ( have_rows('prices') ) : the_row();
      
              // display a sub field value
              $title = get_sub_field('title');
              $description = get_sub_field('description');
              $items = get_sub_field('items');
              ?>
              <div class="price-item-col col-lg-<?php echo $col_width?> wow fadeIn" data-wow-duration="0.3s" data-wow-delay="<?php echo $delay?>s">
                <div class="price-item-wrap">
                  <div class="price-item__title"><?php echo $title?></div>
                  <div class="price-item__desc"><?php echo $description?></div>
                  
                  <?php /*
                  <div class="price-item__prices">
                    <div class="price-item__price-values">
                        <div class="price-item__price-value price-value--monthly">$<?php the_sub_field('monthly_price')?></div>
                        <div class="price-item__price-value price-value--annually">$<?php the_sub_field('annually_price')?></div>                        
                    </div>
                    <div class="price-item__price-period">
                        <div>Per User /</div>
                        <div>Per Month</div>
                    </div>
                  </div>
                  */ ?>
                  
                  <ul class="price-item__items">
                    <?php
                    foreach($items as $item){
                        ?>
                        <li class="price-item__items-text"><?php echo $item['text']?></li>
                        <?php
                    }
                    ?>
                  </ul>
                  <?php
                    $link = get_sub_field('link');
                    if ( $link ) :
                  ?>
                    <div class="price-item-btn-row">
                      <a class="price-item__link" href="<?php echo $link['url']?>" target="<?php echo $link['target']?>"><?php echo $link['title']?></a>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <?php
            $delay += 0.2;
           endwhile;
      
      else :

      endif;
      ?>
    </div><!-- end .row-->
  </div><!-- end .container-->
</section> <!-- end .hero-block-->