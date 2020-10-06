<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<title><?php wp_title(''); ?></title>

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- Mobile Meta -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- Google Analytics-->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>
  	
  	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="top-navbar">
			<?php
			wp_nav_menu(array(
				'container_id' => 'primary-menu',
				'menu' => __( 'Top Nav Links', 'primertheme' ),
				'theme_location' => 'top-nav',
				'container'      => false,
				'depth'          => 2,
				'menu_class'     => 'top-navbar-menu',
				'walker' => new Bootstrap_NavWalker(),
				'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
			));
			?>
		</div>
        <div class="container-fluid">
          
			<a class="navbar-brand navbar-brand--normal" href="<?php echo home_url(); ?>">
				<?php 
				$image = get_field('header_logo', 'option');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
				}
				?>
			</a>
			<a class="navbar-brand navbar-brand--white" href="<?php echo home_url(); ?>">
				<?php 
				$image = get_field('header_logo_white', 'option');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
				}
				?>
			</a>
          
        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">
        		<span class="navbar-toggler-icon"></span>
        	</button>
        
        	<div class="collapse navbar-collapse" id="navbar-content">
          	
          	<?php primer_main_nav(); ?>
          	
        	</div><!-- end #navbar-content -->
            	
        </div><!-- end .container -->
      </nav>

    