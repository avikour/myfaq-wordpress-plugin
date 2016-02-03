<?php
// ====================================== SHORTCODES ====================================== //

	function show_faq($atts){ 
		
		ob_start();
		
		 $secondary_query = new WP_Query( array(
			 								'post_type'    =>  'questions',
			 								'posts_per_page' => $atts[limit],
			 								'tax_query' => array(
												array(
													'taxonomy' => 'faq',
													'field' => 'slug',
													'terms' => $atts[category],
													'operator' => 'IN'
													)
												)
											)
										);
				if ( $secondary_query->have_posts() ) {
					while ( $secondary_query->have_posts() ) {
						$secondary_query->the_post();
							echo '
								<div class="row">
									<div class="col-lg-8 col-lg-offset-2 centered">
							';
								the_post(); 
								the_post_thumbnail('thumbnail');
								the_title( '<h1>', '</h1>' );
								the_content();
							echo '
									</div>
								</div>
							';
						} // end while
					} // end if
		wp_reset_postdata();
		return ob_get_clean();
	} 
	add_shortcode( 'faq', 'show_faq' ); 
	
?>