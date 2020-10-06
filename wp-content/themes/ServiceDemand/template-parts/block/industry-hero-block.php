<?php /* Block Name: Industry Hero Block */ ?>

<?php
$bk = get_field('background_image');
$bk_src = '';
if($bk){
  $bk_src = $bk['url'];
}
?>
<section class="industry-hero-block" style="background-image:url(<?php echo $bk_src?>)">
  <div class="container industry-hero-block-container">
    <h1 class="industry-hero-title text-center"><?php the_field('title')?></h1>
    <div class="industry-hero-desc text-center"><?php the_field('description')?></div>
  </div>
</section> <!-- end .hero-block-->