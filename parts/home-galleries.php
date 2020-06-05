<?php 
$placeholder = THEMEURI . 'images/rectangle-lg.png';
$rectangle = THEMEURI . 'images/rectangle.png';
$video_button_name = get_field("video_button_name");
$video_button_link = get_field("video_button_link");
$featured_post_id = '';
$featured_type = get_field("featured_type");
if($featured_type=='post') {
	$ftype = get_field("featured_".$featured_type);
	if( isset($ftype['post_obj']) && $ftype['post_obj'] ) {
		$obj = $ftype['post_obj'];
		$featured_post_id = $obj->ID;
	}
}

$post_type = 'blog';
$args = array(
	'posts_per_page'=> -8,
	'post_type'		=> $post_type,
	'post_status'	=> 'publish',
	'orderby'		=> 'date',
	'order'			=> 'DESC'
);

/* Exclude Post from Featured Story */
if($featured_post_id) {
	$args['post__not_in'] = array($featured_post_id);
}

$posts = get_posts($args);

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

	<?php if ($video_button_name && $video_button_link) { ?>
	<div class="moreBtnDiv">
		<a href="<?php echo $video_button_link ?>" target="<?php echo $moreVideoLink['target'] ?>" class="btnArrow"><span><?php echo $video_button_name ?></span></a>
	</div>
	<?php } ?>

</div>
<?php } ?>