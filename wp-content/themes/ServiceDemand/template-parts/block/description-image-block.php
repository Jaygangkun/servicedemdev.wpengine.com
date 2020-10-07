<?php /* Block Name: Description Image Block */ ?>

<?php
$img = get_field('background_image');
$img_src = '';

if($img){
  $img_src = $img['url'];
}
?>
<section class="description-image-block" style="background-image: url(<?php echo $img_src?>)">
  <div class="container">
    <div class="col-lg-11 mx-auto">
      <h2 class="description-image-block-desc"><?php the_field('description')?></div>
    </div>
  </div>
</section>