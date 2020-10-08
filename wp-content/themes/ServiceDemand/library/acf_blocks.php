<?php
	
/**************** Preview CSS ****************/

function primer_setup() {
	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
  
	// Enqueue editor styles.
	add_editor_style( 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css' );
	add_editor_style( 'library/css/style.css' );
	
}

add_action( 'after_setup_theme', 'primer_setup' );



/**************** Preview JS ****************/


// Still working out the kinks on this one.
/*function primer_enqueue() {
    wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/library/js/libs/wow.min.js' );
    wp_enqueue_script( 'scripts-js', get_template_directory_uri() . '/library/js/scripts.js' );
}

add_action( 'enqueue_block_editor_assets', 'primer_enqueue' );
*/




/**************** Gutenberg Block Custom Category ****************/

function custom_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'custom',
				'title' => __( 'Custom', 'custom' ),
			),
		)
	);
}

add_filter( 'block_categories', 'custom_category', 10, 2);


/**************** Loading ACF into Gutenberg ****************/


// Render Callback

function my_acf_block_render_callback( $block ) {
	
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/block/{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/{$slug}.php") );
	}
}


// Registering ACF Blocks

add_action('acf/init', 'my_acf_init');

function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
  	
		acf_register_block(array(
			'name'				=> 'hero-block',
			'title'				=> __('Hero Block'),
			'description'		=> __('A hero block for the home page.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'slides',
			'keywords'			=> array( 'hero', 'block' )
		));
		
		acf_register_block(array(
			'name'				=> 'info-block',
			'title'				=> __('Feature Block'),
			'description'		=> __('A feature block that has many features within it.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'screenoptions',
			'keywords'			=> array( 'feature', 'block' )
		));
		
		acf_register_block(array(
			'name'				=> 'data-block',
			'title'				=> __('Info Block'),
			'description'		=> __('An info block that displays info or data.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'align-center',
			'keywords'			=> array( 'info', 'data', 'block' )
		));
		
		acf_register_block(array(
			'name'				=> 'partners-block',
			'title'				=> __('Partners Block'),
			'description'		=> __('A call to action block that displays all the partners.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'format-gallery',
			'keywords'			=> array( 'partners', 'block' )
		));
		
		acf_register_block(array(
			'name'				=> 'cta-block',
			'title'				=> __('Call to Action Block'),
			'description'		=> __('A call to action block that displays a form.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));
		
		acf_register_block(array(
			'name'				=> 'features-block',
			'title'				=> __('Features Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'benefits-block',
			'title'				=> __('Benefits Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'feature-hero-block',
			'title'				=> __('Feature Hero Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'style-hero-block',
			'title'				=> __('Style Hero Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'pricing-list-block',
			'title'				=> __('Pricing List Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'contact-form-block',
			'title'				=> __('Contact Form Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'faq-hero-block',
			'title'				=> __('Faq Hero Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'faq-questions-block',
			'title'				=> __('Faq Questions Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'news-block',
			'title'				=> __('News Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'feature-news-block',
			'title'				=> __('Feature News Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));
		
		acf_register_block(array(
			'name'				=> 'legal-info',
			'title'				=> __('Legal Info'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'about-hero',
			'title'				=> __('About Hero'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'text-block',
			'title'				=> __('Text Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'block-list',
			'title'				=> __('Block List'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'two-column-block',
			'title'				=> __('Two Column Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'two-section-block',
			'title'				=> __('Two Section Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'industry-hero-block',
			'title'				=> __('Industry Hero Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'list-image-block',
			'title'				=> __('List And Image Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'job-features-block',
			'title'				=> __('Job Features Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'demo-form-block',
			'title'				=> __('Demo Form Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'description-list-block',
			'title'				=> __('Description List Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'description-image-block',
			'title'				=> __('Description Image Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'pricing-hero-block',
			'title'				=> __('Pricing Hero Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'pricing-period-block',
			'title'				=> __('Pricing Period Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'ebook-list-block',
			'title'				=> __('Ebook List Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));

		acf_register_block(array(
			'name'				=> 'newsletter-block',
			'title'				=> __('Newsletter Block'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'megaphone',
			'keywords'			=> array( 'call', 'action', 'block' )
		));
	}
}
  
?>