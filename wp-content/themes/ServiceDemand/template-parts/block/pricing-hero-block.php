<?php /* Block Name: Pricing Hero Block */ ?>

<section class="pricing-hero-block" style="background-image:url(<?php echo get_template_directory_uri()?>/library/images/pricing-hero-block-bk.svg)">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h1 class="section-title wow fadeInDown" data-wow-duration="0.5s" data-wow-delay=".3s"><?php the_field('title') ?></h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 mx-auto text-center">
        <div class="section-desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay=".6s"><?php the_field('description')?></div>
      </div>
    </div>
  </div>
</section>