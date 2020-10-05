<?php /* Block Name: CTA Block */ ?>

<section class="access-block">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mx-auto text-center">
        <h2><?php the_field('title'); ?></h2>
        <h3><?php the_field('description'); ?></h3>
        <?php the_field('form_embed'); ?>
      </div><!-- end .col-lg-6-->
    </div><!-- end .row-->
  </div><!-- end .container-->
</section><!-- end .access-block-->