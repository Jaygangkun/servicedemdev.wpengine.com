<?php /* Block Name: Pricing Table Block */ ?>

<section class="pricing-table-block">
  <div class="pricing-table-block-content" style="background-image:url(<?php echo get_template_directory_uri()?>/library/images/pricing-hero-block-bk.svg)">
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
  </div>
  <?php if( have_rows('membership') ): while ( have_rows('membership') ) : the_row(); ?>
    <?php
    $field_features = get_sub_field_object('features');
    $all_features = $field_features['choices'];
    $features = get_sub_field('features');
    ?>
  <?php endwhile; endif; ?>
  <div class="container--large">
    <div class="pricing-membership-table-container">
      <div class="pricing-membership-table-left">
        <div class="pricing-membership-table-row-header">
        </div>
        <div class="pricing-membership-table-row-sub-header">
          Features
        </div>
        <?php
        $feature_index = 0;
        foreach($all_features as $feature_key => $feature_value ){
          ?>
          <div class="pricing-membership-table-row pricing-membership-table-row-feature" index="<?php echo $feature_index?>"><?php echo $feature_value ?></div>
          <?php  
          $feature_index ++;
        }
        ?>
        <div class="pricing-membership-table-row-payment">
          <div>
            <div class="pricing-membership-payment-title"><?php the_field('payment_processing_fee_title')?></div>
            <div class="pricing-membership-payment-list"><?php the_field('payment_processing_fee')?></div>
          </div>
        </div>
        <div class="pricing-membership-table-row-link"></div>
      </div>


      <div class="pricing-membership-table-right">
        <div class="pricing-membership-table-right-wrap">
          <div class="pricing-membership-table-row pricing-membership-table-row-header">
            <?php if( have_rows('membership') ): while ( have_rows('membership') ) : the_row(); ?>
              <div class="pricing-membership-table-row-col">
                <div class="pricing-membership-name"><?php the_sub_field('name')?></div>
                <div class="pricing-membership-price"><?php the_sub_field('price')?></div>
                <div class="pricing-membership-period"><?php the_sub_field('period')?></div>
              </div>
            <?php endwhile; endif; ?>
          </div>
          <div class="pricing-membership-table-row-sub-header"></div>
            <?php
            $feature_index = 0;
            foreach($all_features as $feature_key => $feature_value ){
              ?>
              <div class="pricing-membership-table-row pricing-membership-table-row-feature" index="<?php echo $feature_index?>">
                <?php if( have_rows('membership') ): while ( have_rows('membership') ) : the_row(); ?>
                  <?php
                    $features = get_sub_field('features');
                    if(in_array($feature_value, $features)){
                      ?>
                      <div class="pricing-membership-table-row-col">
                        <img class="pricing-membership-check-icon__img" src="<?php echo get_template_directory_uri()?>/library/images/icon-round-check.svg" alt="Check Icon">
                      </div>
                      <?php
                    }
                    else{
                      ?>
                      <div class="pricing-membership-table-row-col"></div>
                      <?php
                    }
                  ?>
                <?php endwhile; endif; ?>
              </div>
              <?php
              $feature_index ++;
            }
            ?>

            <div class="pricing-membership-table-row pricing-membership-table-row-payment">
              <?php if( have_rows('membership') ): while ( have_rows('membership') ) : the_row(); ?>
                <div class="pricing-membership-table-row-col">
                  <div class="pricing-membership-payment-wrap">
                    <div class="pricing-membership-payment"><?php the_sub_field('payment_processing_fee')?></div>
                  </div>
                </div>
              <?php endwhile; endif; ?>
            </div>

            <div class="pricing-membership-table-row pricing-membership-table-row-link">
              <?php $membership_index = 0; ?>
              <?php if( have_rows('membership') ): while ( have_rows('membership') ) : the_row(); ?>
                <?php

                $type = get_sub_field('button_type');
                if(!$type){
                  $type = 'link';
                }

                if($type == 'link'){
                  $link = get_sub_field('link');
                  if($link){
                    ?>
                    <div class="pricing-membership-table-row-col">
                      <a class="pricing-membership-link" href="<?php echo $link['url']?>" target="<?php echo $link['target']?>"><?php echo $link['title']?></a>
                    </div>
                    <?php
                  }  
                }
                else{
                  $link_title = get_sub_field('button_title');
                  $form_id = get_sub_field('form_id');
                  ?>
                  <div class="pricing-membership-table-row-col">
                    <span class="pricing-membership-link pricing-membership-link-modal" target="#membership_modal_<?php echo $membership_index?>" plan="<?php the_sub_field('name')?>"><?php echo $link_title?></a>
                  </div>
                  <div class="modal fade membership-modal" id="membership_modal_<?php echo $membership_index?>" tabindex="-1" role="dialog" aria-labelledby="membershipmodal" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="membership-form-container contact-form-wrap">
                          <?php echo do_shortcode('[gravityform id="'.$form_id.'" ajax="true" title="false" description="false"]');?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
                ?>
                <?php $membership_index ++; ?>
              <?php endwhile; endif; ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>