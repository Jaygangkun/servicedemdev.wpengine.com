<?php /* Block Name: Faq Questions  Block */ ?>

<section class="faq-questions-block">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
        <h5 class="section-title wow fadeInDown" data-wow-duration="0.5s" data-wow-delay=".3s"><?php the_field('title');?></h5>
        <div class="section-desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay=".6s"><?php the_field('description');?></div>
      </div>
    </div>
    <div class="row faq-questions-row" id="faq_questions_row">
      <?php
      if( have_rows('questions') ):
        $delay = .5;
        while ( have_rows('questions') ) : the_row();
          ?>
          <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="<?= $delay; ?>s">
            <div class="faq-question-wrap">
              <div class="faq-question__title"><?php the_sub_field('title')?></div>
              <div class="faq-question__desc"><?php the_sub_field('description')?></div>
            </div>
          </div>
          
          <?php
          $delay += .2;
        endwhile;
      endif;
      ?>
    </div>
    <div class="row faq-footer-row">
      <div class="col-lg-6 mx-auto text-center">
        <div class="faq-footer-message"><?php the_field('footer_message')?></div>
        <a class="faq-footer-email" href="mailto:<?php the_field('email')?>"><?php the_field('email')?></a>
      </div>
    </div>
  </div><!-- end .container-->
</section><!-- end .hero-block-->