<?php /* Block Name: Contact Form Block */ ?>

<section class="contact-form-block contact-form-style--<?php the_field('style')?>">
  <div class="container">
    <div class="row">
      <?php 
      if(get_field('style') == 'style2'){
        ?>
        <div class="col-lg-6">
          <div class="contact-form__title"><?php the_field('contact_form_title')?></div>
          <div class="contact-form-wrap">
            <?php
            echo do_shortcode('[gravityform id="'.get_field('contact_form_id').'" title="false" description="false" ajax="true" tabindex="32"]');
            ?>
          </div>
        </div>
        <div class="col-lg-6 contact-form-others-col">
          <div class="contact-form-others-wrap">
            <div class="contact-form__title"><?php the_field('other_information_title')?></div>
            <div class="contact-form-others row">
              <?php
              if( have_rows('other_informations') ):
                while ( have_rows('other_informations') ) : the_row();
                ?>
                <div class="col-lg-6">
                  <div class="contact-form-other-wrap">
                    <div class="contact-form-other__title"><?php the_sub_field('title')?></div>
                    <div class="contact-form-other__value"><?php the_sub_field('value')?></div>
                  </div>
                </div>
                <?php
                endwhile;
              endif;
              ?>
            </div>
          </div>
        </div>
        <?php
      }
      else{
        ?>
        <div class="col-lg-6 mx-auto">
          <div class="contact-form-wrap">
            <?php
            echo do_shortcode('[gravityform id="'.get_field('contact_form_id').'" title="false" description="false" ajax="true" tabindex="49"]');
            ?>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div><!-- end .container-->
</section> <!-- end .hero-block-->