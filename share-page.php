<?php
/**
 * The template for displaying Author bios.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<div class="share-page">
<h2 class="author-title">Share this Page</h2>

<div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="450" data-layout="box_count" data-show-faces="false" data-send="false"></div>
	
<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="tall"></div>   
 
    
    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-counturl="<?php the_permalink(); ?>" data-lang="en" data-count="vertical">Tweet</a>
    
    
</div><!-- .share-page -->