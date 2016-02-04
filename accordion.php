<?php
	add_shortcode('faq', function() {
 
		$posts = get_posts(array(  //Get the FAQ Custom Post Type
			'numberposts' => 10,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'post_type' => 'faq',
		));

		$faq  = '<div id="myfaq-accordion">'; //Open the container
		foreach ( $posts as $post ) { // Generate the markup for each Question
			$faq .= sprintf(('<h3><a href="">%1$s</a></h3><div>%2$s</div>'),
				$post->post_title,
				wpautop($post->post_content)
			);
		}
		$faq .= '</div>'; //Close the container

		return $faq; //Return the HTML.
	});
?>





$secondary_query->the_post(); 
							echo '
								<div class="row">
									<div class="col-lg-8 col-lg-offset-2 centered">
										<div id="myfaq-accordion">'; //Open the container		
											the_post_thumbnail('thumbnail');

											the_title( '<h3>', '</h3>' );

							echo '
											<div class="faq-ans">';
												the_content();
							echo '			</div>
										</div>' ;//Close the container
							echo '
									</div>
								</div>
							';