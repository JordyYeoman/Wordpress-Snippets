## Change the post_type='' query in the two if statements below to the specific post type you wish to filter through.

<?php
    if( get_adjacent_post(false, '', true) ) { 
      previous_post_link('%link', '&larr; Previous Post');
    } else { 
      $first = new WP_Query('post_type=golf-hole&posts_per_page=1&order=DESC'); $first->the_post();
        echo '<div>
            <a href="' . get_permalink() . '">&larr; Previous Golf Hole</a>
            </div>';
      wp_reset_query();
    }; 
    if( get_adjacent_post(false, '', false) ) { 
      next_post_link('%link', 'Next Post &rarr;');
    } else { 
      $last = new WP_Query('post_type=golf-hole&posts_per_page=1&order=ASC'); $last->the_post();
        echo '<div>
            <a href="' . get_permalink() . '">Next Golf Hole &rarr;</a>
           </div>';
      wp_reset_query();
    }; 
?>
