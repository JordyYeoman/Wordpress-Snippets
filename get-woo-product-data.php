<?php
		
				// Initialize empty array to store top 3 products in by ID
					$topThree = [];
		
				// Loop products and grab the top 3 
					$loop = new WP_Query( array(
					'post_type' => 'product',  
					'posts_per_page' => -1,
    				'order' => 'asc'
					));
					while ( $loop->have_posts() ) : $loop->the_post();
 
					$productId = get_the_ID();
					$amount = get_product_net_revenue($productId); 
					
						array_push($topThree, array(
							'id' => $productId, 
							'totalRaised' => $amount
							));
						endwhile;
		
						// Sort the array of arrays by the totalRaised
						 function multisort (&$array, $key) {
						 $valsort=array();
						 $ret=array();
						 reset($array);
						 foreach ($array as $ii => $va) {
							$valsort[$ii]=$va[$key];
						 }
							 
						// Sort array in ascending order
						 arsort($valsort);
						 foreach ($valsort as $ii => $va) {
							 $ret[$ii]=$array[$ii];
						 }
						 $array=$ret;
					 	}

						multisort($topThree,"totalRaised");
		
						$topThreeSorted = array_slice($topThree, 0, 3);
						
						// Grab the top three products id's
						$topRaiser = $topThreeSorted[0]['id'];
						$secondRaiser = $topThreeSorted[1]['id'];
						$thirdRaiser = $topThreeSorted[2]['id'];
		
						$topRaiserAmount = get_product_net_revenue($topRaiser); 
						$topRaiserImage = wp_get_attachment_image_src( get_post_thumbnail_id( $topRaiser ), 'single-post-thumbnail' )[0];	
						$topRaiserTitle = wc_get_product( $topRaiser ) -> get_title();
						
						$secondRaiserAmount = get_product_net_revenue($secondRaiser); 
						$secondRaiserImage = wp_get_attachment_image_src( get_post_thumbnail_id( $secondRaiser ), 'single-post-thumbnail' )[0];
						$secondRaiserTitle = wc_get_product( $secondRaiser ) -> get_title();
						
						$thirdRaiserAmount = get_product_net_revenue($thirdRaiser); 
						$thirdRaiserImage = wp_get_attachment_image_src( get_post_thumbnail_id( $thirdRaiser ), 'single-post-thumbnail' )[0];
						$thirdRaiserTitle = wc_get_product( $thirdRaiser ) -> get_title();
		
			?>
