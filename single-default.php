<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bellaworks
 */

get_header(); ?>

	<div id="primary" class="content-area ">
		<main id="main" class="site-main wrapper" role="main">
			<div id="page-left">
		<?php
		while ( have_posts() ) : the_post(); ?>

			<h1 class="page-title">
				<?php 
					if(get_field('alternate_title')) { 
						the_field('alternate_title'); 
					} else { 
						the_title(); 
					} ?>
			</h1>

			<div class="content-entry">
				<?php the_content(); ?>
			</div><!-- content - entry -->
        
		<?php 
			get_template_part( 'includes/share-page' ); 
			get_template_part( 'includes/author-bio' );
			comments_template(); 


		endwhile; // End of the loop.
		?>
	</div>
		<?php get_sidebar(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
