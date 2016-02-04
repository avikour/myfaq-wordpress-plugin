<?php
// ====================================== SHORTCODES ====================================== //

	function show_faq($atts){ 
		
		ob_start();
		
		 $secondary_query = new WP_Query( array(
			 								'post_type'      =>  'questions',
			 								'posts_per_page' =>  $atts[limit],
			 								'tax_query'      =>  array(
													array(
														'taxonomy' => 'faq',
														'field'    => 'slug',
														'terms'    => $atts[category],
														'operator' => 'IN'
														)
													),
			 								'order'          =>  'ASC',
											'orderby'        =>  'ID'
											)
										);
				if ( $secondary_query->have_posts() ) {

					echo '<div class="myfaq-block">';
						while ( $secondary_query->have_posts() ) {
							$secondary_query->the_post();

								the_title( '<h3 class="myfaq-question">', '</h3>' );
								echo '<div class="myfaq-answer">'; //Open the container		
											the_content();
								echo '</div>' ;//Close the container
						} // end while
					echo '</div>';

				} // end if


		wp_reset_postdata();
		return ob_get_clean();
	} 
	add_shortcode( 'faq', 'show_faq' ); 
	
?>
