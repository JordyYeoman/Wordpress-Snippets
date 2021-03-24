<!-- Start Product Categories Loop -->
	<?php $args = array(
						'taxonomy' => 'product_cat',
						'orderby' => 'name',
						'order' => 'ASC',
						'parent' => 17,
						'hide_empty' => false
					);
						function check($number){
							if($number % 2 == 0){
								return "left"; 
							}
							else{
								return "right";
							}
						}

						$categories = get_categories($args);
						$i = 0;
						foreach ($categories as $c) { 
							
						$product_link = get_term_link($c->term_id);
						$product_cat_title = $c->name;
						$checkValue = check($i); 
						?>

	<!-- // Category Left Side Picture -->
	<?php if($checkValue == "left") { ?>
	<div class="shop-landing-current-offers">
		<div class="offset-left">
			<div class="offers-title-holder">
				<h2 class="<?php echo $colorScheme; ?>">
					<div></div>
				</h2>
			</div>
			<div class="<?php echo $colorScheme; ?> products-offers <?php echo check($i); ?>">
				<div class="category-container"
					style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/home-hero-women.jpg')">
					<h3>
						<?php echo $product_cat_title;  ?>
					</h3>
					<div class="category-link">
						<a href="<?php echo $product_link;?>">
							See the full range
						</a>
					</div>
				</div>
				<?php wp_reset_query(); ?>
				<?php

							$args = array( 
							'post_type' => 'product', 
							'posts_per_page' => 2,
							'product_cat' => $product_cat_title, 
							'orderby' => 'rand' );

							$loop = new WP_Query( $args );
							?>
				<ul class="woocommerce_products_custom <?php echo $colorScheme ?>">
					<?php 
								if ( $loop->have_posts() ) {
									while ( $loop->have_posts() ) : $loop->the_post();
										wc_get_template_part( 'content', 'product' );
									endwhile;
								} else {
									echo __( 'No products found' );
								}
								wp_reset_postdata();
							?>
					<?php wp_reset_query(); ?>
				</ul>
			</div>
		</div>
	</div>
	<?php } ?>
