<?php /* Block Name: About Hero */ ?>

<section class="about-hero-block">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h1 class="about-hero-title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.3s"><?php the_field('title'); ?></h1>
			</div><!-- end .col-12 -->
		</div><!-- end .row -->
	</div><!-- end .container -->
    <img class="about-hero-img" src="<?php echo get_template_directory_uri()?>/library/images/about-hero-bk.png">
    <img class="about-hero-bottom-wave-img" src="<?php echo get_template_directory_uri()?>/library/images/about-hero-bottom-wave.png">
</section>