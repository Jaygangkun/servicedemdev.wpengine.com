<?php
/*
  Author: Primer Co
  URL: htp://byprimer.co
*/


/************* INCLUDE NEEDED FILES ***************/


/*
1. library/primer.php
    - head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
    - custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/primer.php'); // if you remove this, primer will break
require_once('library/acf_blocks.php'); // ACF Gutenberg Blocks
require_once('wp_bootstrap_navwalker.php'); // Bootstrap Nav Walker

/*
3. library/admin.php
    - removing some default WordPress dashboard widgets
    - an example custom dashboard widget
    - adding custom login css
    - changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default

/*
4. library/translation/translation.php
    - adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default


/************* THUMBNAIL SIZE OPTIONS *************/


// Thumbnail sizes
add_image_size( 'primer-1400', 1400, 0, true );



/************* ACTIVE SIDEBARS ********************/


// Sidebars & Widgetizes Areas
function primer_register_sidebars() {
  
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => __('Sidebar 1', 'primertheme'),
    	'description' => __('The first (primary) sidebar.', 'primertheme'),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));

}




/************* COMMENT LAYOUT *********************/

		
// Comment Layout
function primer_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
			    <?php 
			    /*
			        this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
			        echo get_avatar($comment,$size='32',$default='<path_to_url>' );
			    */ 
			    ?>
			    <!-- custom gravatar call -->
			    <?php
			    	// create variable
			    	$bgauthemail = get_comment_author_email();
			    ?>
			    <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
			    <!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'primertheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'primertheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'primertheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="alert info">
          			<p><?php _e('Your comment is awaiting moderation.', 'primertheme') ?></p>
          		</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
    <!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!


/************* SEARCH FORM LAYOUT *****************/


// Search Form
function primer_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search', 'primertheme') . '</label>
    <div class="form-group">
      <input type="text" class="form-control" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search...','primertheme').'" />
    </div>
    <input type="submit" class="btn btn-primary" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';
    return $form;
} // don't remove this bracket!


/************* IMAGE FORMATTING *****************/


// Allow SVG Upload to WP
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');




/**
 * Removes the width and height attributes of <img> tags for SVG
 * 
 * Without this filter, the width and height are set to "1" since
 * WordPress core can't seem to figure out an SVG file's dimensions.
 * 
 * For SVG:s, returns an array with file url, width and height set 
 * to null, and false for 'is_intermediate'.
 * 
 * @wp-hook image_downsize
 * @param mixed $out Value to be filtered
 * @param int $id Attachment ID for image.
 * @return bool|array False if not in admin or not SVG. Array otherwise.
 */
function wpse240579_fix_svg_size_attributes( $out, $id ) {
    $image_url  = wp_get_attachment_url( $id );
    $file_ext   = pathinfo( $image_url, PATHINFO_EXTENSION );

    if ( is_admin() || 'svg' !== $file_ext ) {
        return false;
    }

    return array( $image_url, null, null, false );
}
add_filter( 'image_downsize', 'wpse240579_fix_svg_size_attributes', 10, 2 ); 


/************* ACF *****************/


// Add ACF Options Page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}


// Ajax api to get posts
function getPaginationPosts(){
	$offset = $_POST['offset'];
	$count = $_POST['count'];
	$posts = wp_get_recent_posts(array(
		'numberposts' => $count,
		'offset' => (float)$offset + 1,
		'post_type' => 'post',
		'post_status' => 'publish' 
	));

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
					$category_name = $category_name . esc_html($category->name).', ';
				}
				
			}

			$feature_img = get_the_post_thumbnail_url( $post['ID'], 'full');
			?>
			<div class="col-lg-4">
				<a class="news-wrap" href="<?php echo get_permalink($post['ID'])?>">
					<div class="news-image" style="background-image: url(<?= $feature_img ?>);"></div>
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
								// $excerpt .= '...';
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
	}

	die();
}

add_action('wp_ajax_get_posts', 'getPaginationPosts');
add_action('wp_ajax_nopriv_get_posts', 'getPaginationPosts');

function admin_style() {
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/library/css/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');


function getPaginationEBooks(){
	$offset = $_POST['offset'];
	$count = $_POST['count'];
	?>
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
		$cur_page = (int)$_POST['page'];
		
		$ebooks = get_posts(array(
			'post_type' => 'ebook',
			'numberposts' => 6, 
			'offset' => (int)$offset,
			'nopaging' => false
		));

		$ebook_index = 1;
		foreach($ebooks as $ebook){
			if($ebook_index > 6){
				break;
			}
			$link = get_permalink($ebook->ID);
          	$image = get_the_post_thumbnail_url($ebook->ID, 'full');
			?>
			<div class="col-lg-4 col-md-6 ebook-item-col">
				<div class="ebook-item-wrap">
				<div class="ebook-item-img" style="background-image:url(<?php echo $image?>)"></div>
				<div class="ebook-item-content">
					<a class="ebook-item-link" href="<?php echo $link?>"><?php echo get_the_title($ebook->ID) ?></a>
					<div class="ebook-item-desc"><?php echo get_the_excerpt($ebook->ID)?></div>
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
	<?php
	die();
}
add_action('wp_ajax_get_ebooks', 'getPaginationEBooks');
add_action('wp_ajax_nopriv_get_ebooks', 'getPaginationEBooks');
?>
