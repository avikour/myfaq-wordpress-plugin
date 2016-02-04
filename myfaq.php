<?php
/**
 * Plugin Name: FAQs
 * Description: This plugin adds some FAQs.
 * Author Name: Avneet
 */

include_once("shortcode.php");

add_action( 'init', 'create_plugin_post_type');

	function create_plugin_post_type() {
		register_post_type( 
			'questions', // CPT
			array(
			  'labels' => array(
					'name' => __( 'Questions' ),
					'singular_name' => __( 'Question' )
				  ),
			  'public' => true,
			  'has_archive' => true,
			  'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields',
								  'comments' )
			)
		);
		
		register_taxonomy( 
			'faq', //taxonomy
		    'questions', //CPT
		  array(
			'label' => __( 'FAQs', 'taxonomy general name' ),
			'labels' => array(
				'name' => _x( 'FAQs', 'taxonomy general name'  ),
				'singular_name' => _x( 'FAQ' , 'taxonomy singular name'  )
			  ),  
			'rewrite' => array( 'slug' => 'faq' ),
			'hierarchical' => true,
			)
		 );
	}

	
	add_action( 'wp_enqueue_scripts', 'myfaq_enqueue' );

	function myfaq_enqueue() {
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-accordion'); 
		wp_register_script('myfaq-custom-js', plugin_dir_url(__FILE__).'/accordion.js', 'jquery-ui-accordion');
		wp_enqueue_script('myfaq-custom-js');
		wp_register_style('myfaq-style', plugin_dir_url(__FILE__).'/jquery-ui.css');
		wp_enqueue_style('myfaq-style');
		
	}



	?>

