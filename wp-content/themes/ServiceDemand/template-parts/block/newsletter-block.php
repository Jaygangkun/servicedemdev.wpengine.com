<?php /* Block Name: Newsletter Block */ ?>

<section class="access-block newsletter-block">
  <div class="container">
    <h2 class="text-center"><?php the_field('title'); ?></h2>
    <div class="row">
      <div class="col-lg-6">
        <h3><?php the_field('description'); ?></h3>
      </div>
      <div class="col-lg-6">
        <?php the_field('form'); ?>
      </div><!-- end .col-lg-6-->
    </div><!-- end .row-->
  </div><!-- end .container-->
</section><!-- end .access-block-->