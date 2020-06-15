<?php
/**
 * The template for displaying Archive pages of a Custom Blog Taxonomy
 */
get_header(); ?>



	
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
    
<h1 class="page-title">You are viewing the Biology category, 
<?php if( !empty($taxAlternateTitle) ) { ?>
<?php echo $taxAlternateTitle; ?>
<?php } else { ?>
<?php single_cat_title( $prefix = '', $display = true ); ?>
<?php } ?>
</h1>
<div id="alpha" class="blog-square-container">


<?php
if(have_posts()) : while(have_posts()) : the_post(); ?>
<div class="blog-square">

<div class="blog-square-readmore"><a href="<?php the_permalink(); ?>">Read More</a></div>
<!--<div class="filed-away">Filed as:</div>-->
<div class="blog-square-category">
<?php $custom_tax = get_the_term_list( $post->ID, 'blogcats', '<li>', '', '</li>') ?>  
<?php echo $custom_tax ?>
</div><!-- blog square category -->

        <div class="blog-featured-image">
        <a href="<?php the_permalink(); ?>">
				<?php
                //  Display the featured image. Must be inside a loop.
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('full');
                }
                // If you do not have a Featured Image, show a thumbnail stored in the themes images folder.
                else {
                    echo '<img src="' . get_bloginfo( 'template_url' ) . '/images/default-featured.png" width="515px; height="412px" />';
                     }
                ?>
                </a>
        </div><!-- blog featured image  -->
<div class="clear"></div>
<div class="blog-square-below">

<h2>
<a href="<?php the_permalink(); ?>">
<?php if(get_field('alternate_title')) { ?>
<?php the_field('alternate_title'); ?>
<?php } else { ?>
<?php the_title(); ?>
<?php } ?>
</a>
</h2>

<?php  //echo get_excerpt(300); ?> 
</div><!-- blog-square-below -->
  
  
</div><!-- blog square  -->
<?php endwhile; endif; wp_reset_postdata(); ?>

 </div><!-- blog square container --> 
 
 
  <?php // We are going to pull all the stuff from "Alpha" div into here so we can get some Isotope Animation ?>
 <div id="beta" class="blog-square-container"></div>


<div class="untamed-pagi">
<?php untamed_pagi(); ?>
</div>



</div><!-- page left -->
<?php get_sidebar(); ?>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>