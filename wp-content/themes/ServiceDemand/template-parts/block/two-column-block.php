<?php /* Block Name: Two Column Block */ ?>

<section class="two-column-block">
    <div class="two-column-block-wrap">
        <?php 
            $image = get_field('image');
            $image_url = '';
            $image_alt = '';
            if(!empty($image)){
                $image_url = $image['url'];
                $image_alt = $image['alt'];
            }
        ?>
        <div class="two-column-block__col two-column-block__col--image" style="background-image: url(<?php echo $image_url?>)">
            <!-- <img class="two-column-left-image" src="<?php echo $image_url?>" alt="<?php echo $image_alt?>"> -->
        </div>
        <div class="two-column-block__col">
            <div class="two-column-right-wrap">
                <h4 class="two-column__sub-title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.3s"><?php the_field('sub_title')?></h4>
                <h2 class="two-column__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s"><?php the_field('title')?></h2>
                <div class="two-column__desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay=".8s"><?php the_field('description')?></div>
                <div class="two-column-item-list">
                    <?php $delay = .8; ?>
                    <?php if( have_rows('items') ): while ( have_rows('items') ) : the_row(); ?>
                        <div class="two-column-item-wrap wow fadeIn" data-wow-duration="0.3s" data-wow-delay="<?php echo $delay?>s">
                            <?php 
                            $image = get_sub_field('icon');
                            $image_url = '';
                            $image_alt = '';
                            if(!empty($image)){
                                $image_url = $image['url'];
                                $image_alt = $image['alt'];
                            }
                            ?>
                            <div class="two-column-item-icon-wrap">
                                <img src="<?php echo $image_url ?>" alt="<?php echo $image_alt?>">
                            </div>
                            <?php 
							$link = get_sub_field('link');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
							?>
                            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="two-column-item-title"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div><!-- end .info-block -->
                        <?php $delay += 0.2 ?>
                    <?php endwhile; endif;?>
                </div>
            </div>
        </div>
    </div>
</section>