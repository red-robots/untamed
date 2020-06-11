<?php
/**
 * The template for displaying Author bios.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<div class="author-info">
	<div class="author-avatar">
		<a href="<?php the_author_meta('user_url'); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentythirteen_author_bio_avatar_size', 74 ) ); ?></a>
	</div><!-- .author-avatar -->
    
	<div class="author-description">
		
        
        <h3 class="author-title">Written by <a href="<?php the_author_meta('user_url'); ?>"><?php echo get_the_author(); ?></a></h2>
		
        
        <p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
        </p>
        
        
         <div class="author-date">
        Published: <?php the_date('m/y');?> 
        </div>  
        
        
       <div class="author-share">
       You can follow <?php echo get_the_author(); ?>
       
       <div class="author-links">
       <?php 
	   
	   $googleplus = get_the_author_meta( 'googleplus' );
	   $facebook = get_the_author_meta( 'facebook' );
	   $twitter = get_the_author_meta( 'twitter' ); 
	   
	   ?>
       
       <?php if ( ! empty ( $googleplus ) ) { ?>
       <div class="author-link">
        <a href="<?php the_author_meta( 'googleplus' ); ?>">Google +</a> 
        </div>   
       <?php } ?>
       
        <?php if ( ! empty ( $facebook ) ) { ?>
        <div class="author-link">
       <a href="<?php the_author_meta( 'facebook' ); ?>">Facebook</a>
       </div>
       <?php } ?>
       <?php if ( ! empty ( $twitter ) ) { ?> 
       <div class="author-link">
       <a href="<?php the_author_meta( 'twitter' ); ?>">Twitter</a>
       </div>
       <?php } ?>
       </div>
       
       </div><!-- author share -->
       
        <div class="read-all-author">
        
     
        
        
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentythirteen' ), get_the_author() ); ?>
			</a>
       
       
       
        </div><!-- read all author -->
        
	</div><!-- .author-description -->
</div><!-- .author-info -->

<div class="clear"></div>