<?php /* Block Name: Demo Form Block */ ?>

<section class="demo-form-block">
  <div class="container demo-form-block-container">
    <div class="row">
      <div class="col-lg-6">
        <h1 class="section-title"><?php the_field('title')?></h1>
      </div>
      <div class="col-lg-6">
        <div class="contact-form-wrap">
          <?php
          echo do_shortcode('[gravityform id="'.get_field('form_id').'" title="false" description="false" ajax="true" tabindex="32"]');
          ?>
        </div>
      </div>
    </div>
  </div>
  <img class="demo-form-block-img" src="<?php echo get_template_directory_uri()?>/library/images/demo-form-block-bk.svg" alt="Gradient Image">
</section>