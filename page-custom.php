<?php 
/**
* Template Name: Custom Page
*/
 get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div class="page-content">
     <h1 class="page-title">
<a href="<?php the_permalink(); ?>">
<?php if(get_field('alternate_title')) { ?>
<?php the_field('alternate_title'); ?>
<?php } else { ?>
<?php the_title(); ?>
<?php } ?>
</a>
</h2>
     <?php the_content(); ?>
 </div><!-- / page content -->


<?php endwhile; endif; ?>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>