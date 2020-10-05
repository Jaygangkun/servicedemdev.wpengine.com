<?php /* Block Name: Feature News Block */ ?>

<?php 
$posts = get_posts(array(
    // 'category' => get_cat_ID($category),
    'numberposts' => 1,
    'orderby' => 'date',
    'order' => 'DESC'
));

$posts = wp_get_recent_posts(array(
    'numberposts' => 1,
    'post_type' => 'post',
    'post_status' => 'publish' 
));

$post = null;
if(count($posts) > 0){
    // $post = $posts[0];
    $post = get_post($posts[0]['ID']);
}
?>

<section class="feature-news-block wow fadeInDown" data-wow-duration="0.3s" data-wow-delay=".5s">
    <div class="container">
        <?php
        if($post != null){
            $feature_img = get_the_post_thumbnail_url( $post->ID, 'full');
            ?>
            <a href="<?= get_permalink( $post->ID ) ?>" class="feature-news-wrap" style="background-image:linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(<?php echo $feature_img ?>)">
                <div class="feature-news__date">
                <?php 
                  echo date('m/d/y', strtotime(str_replace('-','/', $post->post_date)));
                ?>
                </div>
                
                <p class="feature-news__title"><?php echo $post->post_title?></p>
                
                <p class="feature-news__user">By: <span class="feature-news__username"><?php echo get_the_author_meta('display_name', $post->post_author) ?></span></p>
                
                <div class="feature-news__link">Read Article</div>
            </a>
            <?php
        }
        ?>
    </div>
</section>