<?php /* Block Name: Pricing Period Block */ ?>

<section class="pricing-period-block">
  <div class="container text-center">
    <?php $period_index = 0;?>
    <div class="pricing-period-row" active="<?php echo $period_index?>">
      <?php if ( have_rows('period') ): while ( have_rows('period') ) : the_row();?>
        <span class="pricing-period-title" index="<?php echo $period_index?>"><?php the_sub_field('title')?></span>
        <?php $period_index ++;?>
      <?php endwhile; endif; ?>
      <span class="pricing-period-active-bk"></span>
    </div>
    <?php $period_index = 0;?>
    <div class="pricing-period-list-row" active="0">
    <?php if ( have_rows('period') ): while ( have_rows('period') ) : the_row();?>
      <div class="row" index="<?php echo $period_index?>">
        <?php if ( have_rows('pricing') ): while ( have_rows('pricing') ) : the_row();?>
          <div class="col-lg-4 pricing-list-item-col">
            <div class="pricing-list-item-wrap">
              <div class="pricing-list-item__title"><?php the_sub_field('title')?></div>
              <div class="pricing-list-item__desc"><?php the_sub_field('description')?></div>
              <div class="pricing-list-item__price-wrap">
                <div class="pricing-list-item__budget">$<?php the_sub_field('budget')?></div>
                <div class="pricing-list-item__price-meta">
                  <div class="pricing-list-item__price-meta-value"><?php the_sub_field('user_title')?> / </div>
                  <div class="pricing-list-item__price-meta-value"><?php the_sub_field('month_title')?></div>
                </div>
              </div>
              <ul class="pricing-list-item-services">
              <?php if ( have_rows('services') ): while ( have_rows('services') ) : the_row();?>
                <li class=""><?php the_sub_field('text')?></li>
              <?php endwhile; endif; ?>        
              </ul>
              <?php
              $link = get_sub_field('link');
              if($link){
                ?>
                <div class="pricing-list-item-link-wrap">
                  <a class="pricing-list-item-link" href="<?php echo $link['url']?>" target="<?php echo $link['target']?>"><?php echo $link['title']?></a>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        <?php endwhile; endif; ?>
      </div>
      <?php $period_index ++;?>
    <?php endwhile; endif; ?>
    </div>
  </div>
</section>