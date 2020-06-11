<?php
wp_reset_postdata();
rewind_posts();
wp_reset_query();
?>

<div id="sidebar">
<?php
// If we are showing a Bio Diversity Page, then let's show all the Classifications 
if ('biodiversity' == get_post_type()) {
?>    
    <div class="sideitem grey">
    <?php
    
    //Get the correct taxonomy ID by slug
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    
    //Get Taxonomy Meta
    $saved_data = get_tax_meta($term->term_id, 'ba_text_field_id');
?>
<div class="commonname">
	<b>Common Name:</b> 
	<?php
	    if (!empty($saved_data)) {
	    	echo $saved_data;
	    } else {
	        the_title();
	    } //saved data 
	?>
</div><!-- common name -->

<div class="taxonomy-item">
<div class="all-classifications">

	<div class="thelionking">
		<h2>Classification</h2>
		<div class="class-row">
			<div class="left-classif">Kingdom: </div>       
			<div class="right-classif" id="kingdom">
				<?php echo get_the_term_list($post->ID, 'kingdomtag'); ?>
			</div>
		</div><!-- classs row -->
		<div class="class-row">
			<div class="left-classif">Phylum: </div>         
			<div class="right-classif" id="phylum">
				<?php echo get_the_term_list($post->ID, 'phylumtag'); ?>
			</div>
		</div><!-- classs row -->
		<div class="class-row">
			<div class="left-classif" >Class: </div>         
			<div class="right-classif" id="class" >
				<?php echo get_the_term_list($post->ID, 'classtag'); ?>
			</div>
		</div><!-- classs row -->
		<div class="class-row">
			<div class="left-classif">Order: </div>         
			<div class="right-classif" id="order">
				<?php echo get_the_term_list($post->ID, 'ordertag'); ?>
			</div>
		</div><!-- classs row -->
		<div class="class-row">
			<div class="left-classif">Family: </div>        
			<div class="right-classif" id="family">
				<?php echo get_the_term_list($post->ID, 'familytag'); ?>
			</div>
		</div><!-- classs row -->
		<div class="class-row">
			<div class="left-classif">Genus: </div>         
			<div class="right-classif italicize" id="genus">
				<?php echo get_the_term_list($post->ID, 'genustag'); ?>
			</div>
		</div><!-- classs row -->
		<div class="class-row">
			<div class="left-classif">Species: </div>       
			<div class="right-classif italicize" id="species">
				<?php
			    $nonlinkTerm = get_the_term_list($post->ID, 'speciestag');
			    $termies     = strip_tags($nonlinkTerm);
			    echo $termies;
			?>
		</div>
		</div><!-- classs row -->
	</div><!-- the lion king -->


<?php if (is_single()) { if (get_field("species_range")): ?>
	<div class="thelionking">
		<h2>Species Range</h2>
		<img src="<?php the_field('species_range'); ?>"  />
	</div><!-- the lion king -->
<?php  endif; } ?>

      
<!--<h2>The Biodiversity Tree</h2>
<?php
    /*$show_count = 0; 
    $pad_counts = 0;
    $hierarchical = 1; 
    $taxonomy = 'categories';
    $title = '';
    $args = array(
    
    'show_count' => $show_count,
    'pad_counts' => $pad_counts,
    'hierarchical' => $hierarchical,
    'taxonomy' => $taxonomy,
    'title_li' => $title
    );*/
?>
<ul>
<?php //wp_list_categories($args);
?>
</ul>-->

</div><!-- all calssifications -->
</div><!-- taxonomy item -->
</div><!-- sideitem -->


<?php
}


// End that Biodiversity statement... and else
elseif ('biology' == get_post_type()) { // if viewing a Biology Taxonomy  
?>
<div class="sideitem grey">
<div class="taxonomy-item">
<?php if (count(get_post_ancestors($post->ID)) == 1) { ?>

    <h2><?php echo get_page(array_pop(get_post_ancestors($post->ID)))->post_title; ?></h2>
<?php
$biology_pages = array(
    'depth' => 1,
    'child_of' => $post->post_parent,
    'exclude' => '',
    'include' => '',
    'title_li' => '',
    'echo' => 1,
    'authors' => '',
    'sort_column' => 'menu_order, post_title',
    'walker' => '',
    'post_type' => 'biology',
    'post_status' => 'publish'
);
wp_list_pages($biology_pages);
?>
</ul>
<?php } else { ?>
<h2><?php echo get_page(array_pop(get_post_ancestors($post->ID)))->post_title; ?></h2>
<?php
$biology_pages = array(
    'depth' => 1,
    
    'child_of' => $post->ID,
    'exclude' => '',
    'include' => '',
    'title_li' => '',
    'echo' => 1,
    'authors' => '',
    'sort_column' => 'menu_order, post_title',
    'walker' => '',
    'post_type' => 'biology',
    'post_status' => 'publish'
);
wp_list_pages($biology_pages);
?>
</ul>

<?php
    } /// end if 3 levels deep. 
?>
</div><!-- taxonomy item -->
</div><!-- sideitem -->






<?php
} // End that Biodiversity statement... and else
    elseif ('filmmaking' == get_post_type()) { // if viewing a Biology Taxonomy  
?>
<div class="sideitem grey">
<div class="taxonomy-item">

<?php if (count(get_post_ancestors($post->ID)) == 1) { ?>

    <h2><?php echo get_page(array_pop(get_post_ancestors($post->ID)))->post_title; ?></h2>
<?php
$filmmakingPages = array(
    'depth' => 1,
    
    'child_of' => $post->post_parent,
    'exclude' => '',
    'include' => '',
    'title_li' => '',
    'echo' => 1,
    'authors' => '',
    'sort_column' => 'menu_order, post_title',
    'walker' => '',
    'post_type' => 'filmmaking',
    'post_status' => 'publish'
);
wp_list_pages($filmmakingPages);
?>
</ul>
<?php } else { ?>

    <h2><?php echo get_page(array_pop(get_post_ancestors($post->ID)))->post_title; ?></h2>
<?php
$filmmakingPages = array(
    'depth' => 1,
    
    'child_of' => $post->ID,
    'exclude' => '',
    'include' => '',
    'title_li' => '',
    'echo' => 1,
    'authors' => '',
    'sort_column' => 'menu_order, post_title',
    'walker' => '',
    'post_type' => 'filmmaking',
    'post_status' => 'publish'
);
wp_list_pages($filmmakingPages);
?>
</ul>
<?php } ?>

</div><!-- taxonomy item -->
</div><!-- sideitem -->

<?php } elseif (is_page('world-biology')) { // done showing if a Biology Taxonomy  ?>
<div class="sideitem grey">
<div class="taxonomy-item">
    <h2>The Biology Portal</h2>
<?php
    $biology_pages = array(
        'depth' => 1,
        'title_li' => '',
        'post_type' => 'biology',
        'post_status' => 'publish'
    );
    wp_list_pages($biology_pages);
?>
</ul>


</div><!-- taxonomy item -->
</div><!-- sideitem -->
<?php } elseif (is_page('how-to-filmmaking')) { // done showing if a Biology Page  ?>
<div class="sideitem grey">
<div class="taxonomy-item">
    <h2>Wildlife and Science Filmmaking</h2>
<?php
    $filmmakingPages = array(
        'depth' => 1,
        'title_li' => '',
        'post_type' => 'filmmaking',
        'post_status' => 'publish'
    );
 wp_list_pages($filmmakingPages);
?>
</ul>


</div><!-- taxonomy item -->
</div><!-- sideitem -->
<?php } // done showing if a Filmmaking Page ?>


<div class="sideitem orange">
	<h3>Science Newsletter: </h3>
	<?php get_template_part('/includes/newsletter'); ?>
</div><!-- sideitem -->






<?php
wp_reset_query(); // Reset Query  
rewind_posts();
?>

    
    <!--<h3></h3>-->
<!-- <div class="sidebox-video-list">
	<a href="<?php bloginfo('url'); ?>/science-videos-list/">View Science Vidoes</a>
</div>
    
<div class="sidebox-study-biology">
	<a href="<?php bloginfo('url'); ?>/world-biology/">Studying Biology?</a>
</div> -->


<?php if( have_rows('sideboxes', 'option') ) :
	while( have_rows('sideboxes', 'option') ) : the_row(); 
		$color = get_sub_field('color', 'option');
		$title = get_sub_field('title', 'option');
		$img = get_sub_field('image', 'option');
		$link = get_sub_field('link', 'option');
		// echo '<pre>';
		// print_r($c);
		// echo '</pre>';
	?>
	
		<div class="sideitem <?php echo $color; ?>">
			<?php if( $link ) { ?><a href="<?php echo $link; ?>"><?php } ?>
	        	<?php if( $title ) { ?>
	        		<h3><?php echo $title; ?></h3>
	        	<?php } ?>
				<?php if( $img ) { ?>
	        		<img src="<?php echo $img['url']; ?>"  alt="<?php echo $img['alt']; ?>">
	        	<?php } ?>
	        <?php if( $link ) { ?></a><?php } ?>
	       </div><!-- side item -->
	<?php endwhile; endif ?>


<?php // If a Side Box is Defined....
 if(get_field('sideboxes')): ?>
 	<?php while(has_sub_field('sideboxes')): ?>
 
		<div class="sideitem <?php the_sub_field('color'); ?>">
		<h3><?php the_sub_field('title'); ?></h3>
        <?php the_sub_field('contents'); ?>
        </div><!-- side item -->
 
	<?php endwhile; ?>
<?php endif;// if a sidebox is defined ?>
<div class="ad">
<?php
wp_reset_postdata();
rewind_posts();
wp_reset_query();
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'ad',
	'posts_per_page' => -1
));
	if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
			$enable = get_field('enable_ad');
			$code = get_field('body_script');
			// echo '<pre>';
			// print_r($enable);
			// echo '</pre>';
			if( $enable == 'Yes' ) {
				echo $code;
			}
		endwhile;
	endif;
	 ?>
</div>
</div><!-- sidebar -->

<?php
wp_reset_postdata();
rewind_posts();
wp_reset_query();
?>