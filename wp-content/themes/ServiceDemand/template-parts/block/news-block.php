<?php /* Block Name: News Block */ ?>

<?php 
$posts = wp_get_recent_posts(array(
    'numberposts' => 6,
    'post_type' => 'post',
    'offset' => 1,
    'post_status' => 'publish' 
));

$count_posts = wp_count_posts();
$count_total = $count_posts->publish - 1;
$count_per_page = 6;
$page_count = ceil($count_total / $count_per_page);
$cur_page = 1;
?>

<section class="news-block">
    <script type="text/javascript">
        var wp_admin_url = '<?php echo admin_url('admin-ajax.php')?>';
    </script>
    <div class="container">
        <div class="news-section_list">
            <div class="row">
                <?php
                $delay = 1;
                for($index = 0; $index < 6; $index ++){
                    if($index < count($posts)){
                        $post = $posts[$index];
                        $categories = get_the_category($post['ID']);
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

                        $feature_img = get_the_post_thumbnail_url( $post['ID'], 'full');
                        ?>
                        <div class="col-lg-4 wow fadeIn" data-wow-duration="0.3s" data-wow-delay="<?php echo $delay?>s">
                            <a class="news-wrap" href="<?php echo get_permalink($post['ID'])?>">
                              
                              <div class="news-image" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(<?= $feature_img ?>);"></div>
                              
                              <div class="news-info-wrap">
                                  <div class="news__cat"><?php echo $category_name?></div>
                                  <div class="news__date" style="display: none">
                                  <?php   
                                      // $date = date_create_from_format('Y-m-d', $post->post_date);
                                      echo date('F d, Y', strtotime(str_replace('-','/', $post['post_date'])))
                                  ?>
                                  </div>
                                  <div class="news__title"><?php echo $post['post_title']?></div>
                                  <div class="news__excerpt">
                                    <?php 
                                    $excerpt = strip_tags($post['post_content']);
                                    if (strlen($excerpt) > 100) {
                                      $excerpt = substr($excerpt, 0, 100);
                                      $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
                                      $excerpt .= '...';
                                    }
                                    echo $excerpt
                                    ?>
                                  </div>
                                  <p class="news__user">By: <span class="news__username"><?php echo get_the_author_meta('display_name', $post['post_author']) ?></span></p>
                              </div>
                            </a>
                        </div>
                        <?php
                    }
                    $delay += 0.2;
                }
                ?>
            </div>
        </div>
        <?php
        if($page_count > 1){
            ?>
            <div class="news-pagination">
                <div class="news-pagination-wrap">
                    <a class="pagination-link pagination-link--icon" page-index="<?php echo ($cur_page - 1) < 1 ? 1 : ($cur_page - 1) ?>"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i>  Previous</a>
                    <?php
                    for($pindex = 1; $pindex <= $page_count; $pindex++){
                        if($pindex == $cur_page){
                            ?>
                            <a class="pagination-link pagination-link--num active" page-index="<?php echo $pindex?>"><?php echo $pindex ?></a>
                            <?php
                        }
                        else {
                            ?>
                            <a class="pagination-link pagination-link--num" page-index="<?php echo $pindex?>"><?php echo $pindex ?></a>
                            <?php
                        }
                    }
                    ?>
                    <a class="pagination-link pagination-link--icon" page-index="<?php echo ($cur_page + 1) > $page_count ? $page_count : ($cur_page + 1) ?>">Next  <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>