<?php 
/*
 Template Name: News Page 
*/

$theme_url = get_template_directory_uri();

get_header();

$post = get_post();
$categories = get_the_category($post->ID);
$category_name = '';
for($cindex = 0; $cindex < count($categories); $cindex++){
    $category = $categories[$cindex];
    if($cindex == (count($categories) -1)){
        $category_name = $category_name . esc_html($category->name);
    }
    else{
        $category_name = $category_name . esc_html($category->name).' ';
    }
    
}

$feature_img = get_the_post_thumbnail_url( $post->ID, 'full');

?>
<div class="single-news-hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(<?php echo $feature_img?>)">
    <div class="container">
        <div class="col-lg-6 mx-auto">
            <div class="single-news-meta">
                <div class="single-news__cat"><?php echo $category_name?></div>
                <div class="single-news__title"><?php echo $post->post_title?></div>
                <div class="single-news__author">By: <?php echo get_the_author_meta('display_name', $post->post_author) ?></div>
            </div>
        </div>
    </div>
</div>
<div class="single-news-content">
    <div class="container">
        <?php echo $post->post_content?>
    </div>
</div>

<section class="access-block">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mx-auto text-center">
        <h2>Get Access Today</h2>
        <h3>Reach out to learn more about how ServiceDemand will work for your business.</h3>
        <?php the_field('cta_form', 'option'); ?>
      </div><!-- end .col-lg-6-->
    </div><!-- end .row-->
  </div><!-- end .container-->
</section><!-- end .access-block-->

<?php get_footer(); ?>