<?php /* Block Name: List And Image Block */ ?>

<section class="list-image-block">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="block-sub-title"><?php the_field('sub_title')?></div>
        <div class="block-main-title"><?php the_field('main_title')?></div>
        <div class="block-desc"><?php the_field('description')?></div>
        <div class="list-image__list">
          <?php if( have_rows('list') ): while ( have_rows('list') ) : the_row();?>
          <div class="list-image__row">
            <div class="list-image__row-icon-wrap">
              <?php
              $icon = get_sub_field('icon');
              if($icon){
                ?>
                <img class="list-image__row-icon__img" src="<?php echo $icon['url']?>" alt="<?php echo $icon['alt']?>">
                <?php
              }
              ?>
            </div>
            <div class="list-image__row-text"><?php the_sub_field('title')?></div>
          </div>
          <?php endwhile; endif;?>
        </div>
      </div>
    </div>    
  </div>
  <?php
    $img = get_field('image');
    if($img){
      ?>
      <img class="list-image__img" src="<?php echo $img['url']?>" alt="<?php echo $img['alt']?>">
      <?php
    }
  ?>
</section>