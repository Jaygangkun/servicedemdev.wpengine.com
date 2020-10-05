<?php /* Block Name: Two Section Block */ ?>

<section class="two-section-block">
    <div class="two-section_1" >
        <div class="container">
            <div class="col-lg-12 text-center">
                <div class="two-section_1-desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.3s"><?php the_field('description1')?></div>
            </div>
        </div>
        <div class="two-section_1-bk-img" style="background-image: url(<?php echo get_template_directory_uri()?>/library/images/two-section-block-bk.png)"></div>
        <div class="two-section_1-overlay"></div>
    </div>
    <div class="two-section_2">
        <div class="container">
            <div class="col-lg-6 mx-auto text-center">
                <div class="two-section_2-desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s"><?php the_field('description2')?></div>
            </div>
        </div>
    </div>
</section>