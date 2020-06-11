<?php
/**
 * Template Name: Blog
 */

get_header(); ?>

	
<div id="primary" class="content-area default">
    <main id="main" class="site-main wrapper" role="main">

<div id="page-left">


<div id="alpha" class="blog-square-container">


<?php
$current_cat = get_query_var('cat');
$temp = $wp_query;
$wp_query = null;
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'blog',
	'paged' => $paged,
	'posts_per_page' => 10,
));

while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
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
<?php endwhile; /*endif;*/ wp_reset_postdata(); ?>

 </div><!-- blog square container --> 
 
 
  <?php // We are going to pull all the stuff from "Alpha" div into here so we can get some Isotope Animation ?>
 <!-- <div id="beta" class="blog-square-container"></div> -->


<div class="clear"></div>


<div class="untamed-pagi">
<?php untamed_pagi(); ?>
</div>



</div><!-- page left -->
<?php get_sidebar(); ?>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>