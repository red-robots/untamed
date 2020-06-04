<?php 
$placeholder = THEMEURI . 'images/rectangle-lg.png';
$rectangle = THEMEURI . 'images/rectangle.png';
$post_type = 'blog';
$args = array(
	'posts_per_page'=> 8,
	'post_type'		=> $post_type,
	'post_status'	=> 'publish',
	'orderby'		=> 'date',
	'order'			=> 'DESC'
);
//$posts = new WP_Query($args);
$posts = get_posts();
if ( $posts ) {  ?>
<div class="videoList blogPosts right wow fadeIn" data-wow-delay=".6s">
	<div class="inner cf">
	<?php $i=1; foreach($posts as $p) {
		$id = $p->ID;
		$thumbId = get_post_thumbnail_id($id);  
		$img = wp_get_attachment_image_src($thumbId,'large');
		$link = get_permalink($id);
		$title = $p->post_title;
		$style = ($img) ? ' style="background-image:url('.$img[0].')"':'';
	?>
		<div class="thumbnail <?php echo ($img) ? 'hasphoto':'nophoto'; ?>">
			<a href="<?php echo $link ?>" class="thumbLink">
				<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true">
				<span class="thumb"<?php echo $style ?>></span>
				<span class="caption">
					<span class="text"><?php echo $title ?></span>
				</span>
			</a>
		</div>
	<?php $i++; } ?>
	</div>
</div>
<?php } ?>