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


<div class="content-entry-footer">
<h3 class="author-title">Choose one of the following categories to see related pages:</h3>
<?php 

// we pull blog posts and filmmaking posts through this template so we need to set a couple varibles first

// if it's from the blog custom post type we want to ask for the custom taxonomy, "blogcats"
if ( 'blog' == get_post_type() ) {
$cats_tax = get_the_term_list( $post->ID, 'blogcats', '<li>', ',</li><li>', '</li>') ;
// if it's from the filmmaking custom post type we want to ask for the custom taxonomy, "filmmakingcats"
} elseif ( 'filmmaking' == get_post_type() ) {
$cats_tax = get_the_term_list( $post->ID, 'filmmakingcats', '<li>', ',</li><li>', '</li>') ;
} elseif ( 'biology' == get_post_type() ) {
$cats_tax = get_the_term_list( $post->ID, 'biocats', '<li>', ',</li><li>', '</li>') ;
} elseif ( 'biodiversity' == get_post_type() ) {
$cats_tax = get_the_term_list( $post->ID, 'biodiversitycats', '<li>', ',</li><li>', '</li>') ;
}
?>  
<ul>
<?php echo $cats_tax ?>
</ul>
</div><!-- content - entry footer -->


<div class="sharer">

<h3 class="author-title">Share this Page</h3>

<div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="450" data-layout="box_count" data-show-faces="false" data-send="false"></div>
<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="tall"></div>   
<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-counturl="<?php the_permalink(); ?>" data-lang="en" data-count="vertical">Tweet</a>

</div><!-- .sharer --> 
   
   
   
   
</div><!-- .share-page -->

<div class="clear"></div>