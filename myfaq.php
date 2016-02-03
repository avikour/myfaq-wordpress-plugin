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

?>