<?php
/**
 * Template Name: Filmmaking
 */

get_header(); ?>
<div id="primary" class="content-area default">
	<main id="main" class="site-main wrapper" role="main">
		<div id="page-left">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
			<?php endwhile; endif; ?>
			<?php wp_reset_postdata(); ?>
		</div><!-- / page left -->
		<?php get_sidebar(); ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>