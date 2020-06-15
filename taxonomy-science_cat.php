<?php
/**
 * The template for displaying Archive pages of a Custom Blog Taxonomy
 */
get_header(); ?>

<div id="page-left">

 <?php 
 
// vars
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;  
 
// load thumbnail for this taxonomy term
$taxAlternateTitle = get_field('tax_alternate_title', $taxonomy . '_' . $term_id);
 
?>
    
<h1 class="page-title">You are viewing the Blog category,
<?php if( !empty($taxAlternateTitle) ) { ?>
<?php echo $taxAlternateTitle; ?>
<?php } else { ?>
<?php single_cat_title( $prefix = '', $display = true ); ?>
<?php } ?>
</h1>

<div class="term-desc">
</div>

<div id="container" class="blog-square-container">


<?php
if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); 

    get_template_part('includes/blog-post');

 endwhile; ?>

    

</div><!-- blog square container --> 
<div class="untamed-pagi">
    <?php pagi_posts_nav(); ?>
    </div>
<?php endif; //wp_reset_postdata(); ?>

</div><!-- page left -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>