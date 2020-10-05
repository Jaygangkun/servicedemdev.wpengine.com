<?php 
/*
 Template Name: News Page 
*/

$theme_url = get_template_directory_uri();

get_header();

?>
<div class="news-page-content">
    <?php
    the_content();
    ?>
</div>
<?php
get_footer();
?>