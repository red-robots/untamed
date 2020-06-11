<?php  wp_reset_postdata(); ?>
<?php
        $term = get_queried_object();
        $tax = 'speciestag';
        $parents = $term->parent;
        $term_id = $term->term_id;
		?>
        
        
        <h3>Species under the Kingdom <?php echo "term" ?></h3>
        
        
        <?php 

        if($parents == 0 && !is_single()){
        wp_list_categories( array (
                            'taxonomy'  => $tax,
                            'pad_counts'=> 0,
                            'title_li'  => '',
                            'child_of'  => $term_id,
                            )
            );  
        }

      /*  elseif ($parents > 0 && is_tax($tax, $tax->name)) {

            $args = array(
                    'post_type' => 'biodiversity',
                    $tax => $term->name,
            );
            echo "<h2>Species in ".$term->name."</h2>";

            $wp_query = new WP_Query($args);
            if( $wp_query->have_posts() ):
            while ( $wp_query->have_posts() ) : $wp_query->the_post(); 

            echo "<p><a href=\"".get_permalink()."\">".$post->post_title."</a></p>";
            endwhile;
            endif;
           
        }*/
?>

<?php

$bio_query = array( 
	'post_type' => 'biodiversity',   // Custom Post Type
    'paged' => $paged,       // Set it up to be paged so you can use pagination
	'posts_per_page' => 8    // How many to show per page
	);

// The Query
$small_query = new WP_Query( $bio_query );

// Start this loop, but we are utimately going to delete everything from the #Alpha, and put it into the #Beta div... It's an Isotope jQuery thing.
 ?>
<?php if ( $small_query->have_posts() ) : while ( $small_query->have_posts() ) : $small_query->the_post(); ?>

<?php the_title(); ?>,

<?php endwhile; endif; wp_reset_postdata(); ?>


 <?php /*$custom_terms = get_terms('kingdomtag');
            //find a way to remove parent (ie show all except for pet-care) 
            foreach($custom_terms as $custom_term) {
                wp_reset_query();
                $args = array('post_type' => 'biodiversity',
                    
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'kingdomtag',
                            'field' => 'slug',
                            'terms' => $custom_term->name,
                           
                        ),
                    ),
                 );

                 $loop = new WP_Query($args);
                 if($loop->have_posts()) {
                    echo '<h2>'.$custom_term->name.'</h2>';
                 
                    while($loop->have_posts()) : $loop->the_post(); ?>
                       <?php the_title(); ?>
                   <?php  endwhile;
                    echo '</dl>';
                 } 
            } */?>
			
