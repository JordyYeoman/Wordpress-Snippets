## Change the post_type='' query in the two if statements below to the specific post type you wish to filter through.

<?php
    if( get_adjacent_post(false, '', true) ) { 
        $previous = get_previous_post();
        previous_post_link('%link', '&larr; The Previous Hole ... <div>'. get_the_title($previous) . '</div>');
    } else { 
        $first = new WP_Query('post_type=golf-hole&posts_per_page=1&order=DESC'); $first->the_post();
            echo '<div>
                    <a href="' . get_permalink() . '">&larr; The Previous Holerino ...</a>
                    <div>' . get_the_title() . '</div>
                  </div>';
        wp_reset_query();
    }; 
    if( get_adjacent_post(false, '', false) ) {
        $next = get_next_post();
        next_post_link('%link', 'The Next Hole ... &rarr; <div>'. get_the_title($next) . '</div>');
    } else { 
        $last = new WP_Query('post_type=golf-hole&posts_per_page=1&order=ASC'); $last->the_post();
            echo '<div>
                    <a href="' . get_permalink() . '">The Next Hole ... &rarr;</a>
                    <div>' . get_the_title() . '</div>
                 </div>';
        wp_reset_query();
    }; 
?>
