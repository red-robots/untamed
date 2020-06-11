<?php
/**
 * Template for Author
 */

get_header(); ?>
<?php get_sidebar(); ?>
	


<div id="page-left">

<?php if ( have_posts() ) : ?>


<?php the_post(); ?>

<header class="page-header"><br>  
                    <h1 class="page-title author">
					Author Archives:
                    </h1>
                    <br> 
                </header>


<?php  rewind_posts(); ?>


<div id="alpha" class="blog-square-container">



<?php  // if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<?php //if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<?php
$author_details = $wp_query->get_queried_object();
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$temp = $wp_query;
$wp_query = null;
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=> array('blog', 'filmmaking', 'biology' ),
	'paged' => $paged,
	'posts_per_page' => 10,
	'author' => $author
));

while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

<div class="blog-square">

<div class="blog-square-readmore"><a href="<?php the_permalink(); ?>">Read More</a></div>
<!--<div class="filed-away">Filed as:</div>-->
<div class="blog-square-category">
<?php //$custom_tax = get_the_term_list( $post->ID, 'filmmakingcats', '<li>', '', '</li>') ?>  
<?php //echo $custom_tax ?>
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

<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<?php  //echo get_excerpt(300); ?> 
</div><!-- blog-square-below -->
  
  
</div><!-- blog square  -->
<?php endwhile; endif; wp_reset_postdata(); ?>
 
   </div><!-- blog square container -->
   
  
 <div class="author-archive-bio"> 
  <h2>This is <?php echo $curauth->nickname; ?>'s page</h2>    
 <div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentythirteen_author_bio_avatar_size', 74 ) ); ?>
</div><!-- .author-avatar -->
  <p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
        </p>
        
     <strong>Below you can find all the Untamed Science articles that <?php echo $curauth->nickname; ?> has written.</strong>   
     
 </div><!-- author-archive-bio -->



<!-- 
##############################################

	Remember that we spit all that stuff above out into the Beta Container!

##############################################
-->
<div id="beta" class="blog-square-container"></div>


<div class="untamed-pagi">
<?php untamed_pagi(); ?>
</div>



</div><!-- page left -->
<?php get_footer(); ?>