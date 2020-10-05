<?php /* Block Name: Faq Hero Block */ ?>

<section class="faq-hero-block">
  <div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="section-title wow fadeInDown" data-wow-duration="0.5s" data-wow-delay=".3s"><?php the_field('title')?></div>
          <div class="contact-form-wrap wow fadeInUp" data-wow-duration="0.5s" data-wow-delay=".6s">
            <?= do_shortcode('[gravityform id="'.get_field('contact_form_id').'" title="false" description="false" ajax="true" tabindex="32"]'); ?>
          </div>
        </div>
    </div>
  </div><!-- end .container-->
</section> <!-- end .hero-block-->