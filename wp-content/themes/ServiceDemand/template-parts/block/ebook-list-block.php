<?php /* Block Name: Ebook List Block */ ?>
<script type="text/javascript">
	var wp_admin_url = '<?php echo admin_url('admin-ajax.php')?>';
</script>
<section class="ebook-list-block" style="background-image:url(<?php echo get_template_directory_uri()?>/library/images/ebook-list-block-bk.svg)">
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
    <div class="ebook-list-row">
      <div class="row">
        <?php
        $ebooks = get_posts(
          array(
            'post_type' => 'ebook',
            'numberposts' => -1,
            'orderby' => 'date',
            'order' => 'ASC'
          )
        );
        $count_total = count($ebooks);
        $count_per_page = 6;
        $page_count = ceil($count_total / $count_per_page);
        $cur_page = 1;

        $ebook_index = 1;
        foreach($ebooks as $ebook){
          if($ebook_index > 6){
            break;
          }
          $link = get_permalink($ebook->ID);
          $image = get_field('image', $ebook->ID);
          if($image){
            $image_url = $image['url'];
          }
          ?>
          <div class="col-lg-4 col-md-6 ebook-item-col">
            <div class="ebook-item-wrap">
              <div class="ebook-item-img" style="background-image:url(<?php echo $image_url?>)"></div>
              <div class="ebook-item-content">
                <div class="ebook-item-link"><?php echo get_the_title($ebook->ID) ?></div>
                <div class="ebook-item-desc"><?php echo the_field('description', $ebook->ID)?></div>
              </div>
            </div>
          </div>
          <?php
          $ebook_index++;
        }
        ?>
      </div>
      <div class="ebook-pagination">
        <div class="pagination">
            <span class="pagination-link pagination-link--icon" page-index="<?php echo ($cur_page - 1) < 1 ? 1 : ($cur_page - 1) ?>"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i> Prev</span>
            <?php
            for($pindex = 1; $pindex <= $page_count; $pindex++){
                if($pindex == $cur_page){
                    ?>
                    <span class="pagination-link pagination-link--num active" page-index="<?php echo $pindex?>"><?php echo $pindex ?></span>
                    <?php
                }
                else {
                    ?>
                    <span class="pagination-link pagination-link--num" page-index="<?php echo $pindex?>"><?php echo $pindex ?></span>
                    <?php
                }
            }
            ?>
            <span class="pagination-link pagination-link--icon" page-index="<?php echo ($cur_page + 1) > $page_count ? $page_count : ($cur_page + 1) ?>">Next <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></span>
        </div>
      </div>
    </div>
  </div>
</section>