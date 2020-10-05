<?php /* Block Name: Block List */ ?>

<section class="block-list-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto text-center">
				<h4 class="block-list-sub-title wow fadeIn" data-wow-duration="0.5s" data-wow-delay=".3s"><?php the_field('sub_title'); ?></h4>
                <h2 class="block-list-title wow fadeIn" data-wow-duration="0.5s" data-wow-delay=".5s"><?php the_field('title'); ?></h2>
                <div class="block-list-desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay=".8s"><?php the_field('description')?></div>
			</div><!-- end .col-12 -->
		</div><!-- end .row -->
        <?php $delay = .5; ?>
        <div class="row block-item-list">
            <?php if( have_rows('items') ): while ( have_rows('items') ) : the_row(); ?>
                <div class="col-lg-4 info-block-col wow fadeIn" data-wow-duration="0.3s" data-wow-delay="<?php echo $delay?>s">
                    <div class="info-block d-flex justify-content-center">
                        <div>
                            <?php 
                            $image = get_sub_field('icon');
                            $image_url = '';
                            $image_alt = '';
                            if(!empty($image)){
                                $image_url = $image['url'];
                                $image_alt = $image['alt'];
                            }
                            ?>
                            <img src="<?php echo $image_url ?>" class="img-fluid" alt="<?php echo $image_alt?>">
                            <h3><?php the_sub_field('title'); ?></h3>
                        </div>
                    </div><!-- end .info-block -->
                </div>
                <?php $delay += 0.2 ?>
            <?php endwhile; endif;?>
        </div>
	</div><!-- end .container -->
</section>