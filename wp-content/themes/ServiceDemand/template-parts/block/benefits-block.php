<?php /* Block Name: Benefits Block */ ?>

<section class="benefits-block">
  <div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="benefits-title section-title wow fadeInDown" data-wow-duration="0.5s" data-wow-delay=".3s"><?php the_field('title') ?></h1>
            <div class="section-desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay=".5s"><?php the_field('description')?></div>
            <div class="benefits-list">
                <?php
                    if( have_rows('benefits') ):

                    // loop through the rows of data
                    while ( have_rows('benefits') ) : the_row();
                        ?>
                        <div class="benefit-row">
                            <span class="benefit-icon"></span>
                            <div class="benefit-row__text"><?php the_sub_field('text') ?></div>
                        </div>
                        <?php
                    endwhile;
                
                else :

                endif;
                ?>
            </div>
        </div>
    </div>
    </div>
  </div>
</section>