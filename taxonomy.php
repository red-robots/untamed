<?php
/**
 * The template for displaying Archive pages of a Custom Taxonomy
 */
get_header(); ?>



	
        
 <?php //if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>       

 <div id="primary" class="content-area default">
  <main id="main" class="site-main wrapper" role="main">      
<div id="page-left">


 <?php 
 
// vars
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;  
 
// load thumbnail for this taxonomy term
$taxAlternateTitle = get_field('tax_alternate_title', $taxonomy . '_' . $term_id);
 
?>
    
<h1 class="page-title">
<?php if( !empty($taxAlternateTitle) ) { ?>
<?php echo $taxAlternateTitle; ?>
<?php } else { ?>
<?php single_cat_title( $prefix = '', $display = true ); ?>
<?php } ?>
</h1>
<div class="content-entry">
	<?php //Get the correct taxonomy ID by slug
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

//Get Taxonomy Meta
$saved_data = get_tax_meta($term->term_id,'ba_text_field_id'); ?>
<?php if (!empty($saved_data)) {  ?>
<!--<b>Common Name:</b> <?php echo $saved_data; ?>-->
	<!--<h2 class="page-title">Description:</h2>-->
<?php echo category_description( $category_id ); ?>
<?php } ?>
<div class="clear"></div>

<?php //echo get_term_meta($tag->term_id, 'meta_title', true); ?>		


 <?php //if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php

?>

<?php

/*//first get the current term
$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

//then set the args for wp_list_categories
 $args = array(
    'child_of' => $current_term->term_id,
    'taxonomy' => $current_term->taxonomy,
	'hide_empty' => 0,
	'hierarchical' => false,
	'depth'  => 1,
	'title_li' => ''
    );
 wp_list_categories( $args );
 //echo $current_term->name*/
?>
<h2 class="page-title">Species listed under <?php single_cat_title( $prefix = '', $display = true ); ?></h2>
<?php
$current_query = $wp_query->query_vars;

$wp_query = new WP_Query();
$wp_query->query(array(
	$current_query['taxonomy'] => $current_query['term'],
	'paged' => $paged,
	'posts_per_page' => 10,
));

while ($wp_query->have_posts()) : $wp_query->the_post(); ?>


<div class="list-species">
<a href="<?php the_permalink(); ?>" >
<?php  if ( has_post_thumbnail() ) { ?>
<div class="list-species-thumbnail"><?php the_post_thumbnail('thumbnail'); ?></div>
<?php } else { ?>
<div class="list-species-thumbnail"><img src="<?php bloginfo('template_url'); ?>/images/species-thumb-default.png" width="70px" height="70px"/></div>
<?php } ?>
<div class="list-species-name">

<h3><?php the_title(); ?></h3>
<span class="italicize">(<?php the_field('common_name'); ?>)</span>
</div><!-- list species name -->
</a>
</div><!-- list species -->

<?php endwhile; /*endif;*/ wp_reset_postdata(); ?>

<!--<div class="untamed-pagi">
<?php untamed_pagi(); ?>
</div>-->
<?php
 /* if(is_tax('genustag')) {
   get_template_part( 'genus' );
  } elseif(is_tax('familytag')) { 
  get_template_part( 'family' );
  } elseif(is_tax('ordertag')) { 
  get_template_part( 'order' );
  } elseif(is_tax('classtag')) { 
  get_template_part( 'class' );
  } elseif(is_tax('phylumtag')) { 
  get_template_part( 'phylum' );
  } elseif(is_tax('kingdomtag')) { 
   get_template_part( 'includes/kingdom' );
  } else {
	  echo "What is going on? I got no classification."; }*/?>



		<?php //endwhile; endif; ?>
        
        
      </div><!-- #content entry -->
        

		</div><!-- #page-left -->

<?php get_sidebar(); ?>
</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>