<?php /* Block Name: Style Hero Block */ ?>
<?php
$theme_url = get_template_directory_uri();
?>
<section class="style-hero-block style--<?php the_field('style')?>">
  <?php 
  if(get_field('style') != 'white'){
    ?>
    <img class="style-hero-block__img" src="<?php echo $theme_url?>/library/images/hero-blue-wave-bottom-bk.svg">
    <?php
  }
  ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h5 class="section-title wow fadeInDown" data-wow-duration="0.5s" data-wow-delay=".3s"><?php the_field('title') ?></h5>
        <div class="section-desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay=".6s"><?php the_field('description')?></div>
      </div>
    </div>
  </div>
</section>