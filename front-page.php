<?php 
get_header(); 
$placeholder = THEMEURI . 'images/rectangle-lg.png';
$rectangle = THEMEURI . 'images/rectangle.png';
?>
<main id="main" class="site-main" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php 
		$row1_title1 = get_field("row1_title1");
		$featured_type = (get_field("featured_type")) ? get_field("featured_type") : 'post';
		$ftype = get_field("featured_".$featured_type);
		$videoURL = '';
		$mainVideoThumbnail = '';
		$subtitle = '';

		if( $ftype ) { 
			if($featured_type=='video') {
				$subtitle = $ftype['video_title'];
				$videoURL = $ftype['video_url'];
				$videoThumb = $ftype['video_thumb'];
				$mainVideoThumbnail = '';
				if($videoURL) {
					if (strpos($videoURL, 'youtube.com') !== false) {
						$parts = parse_url($videoURL);
						parse_str($parts['query'], $query);
						$youtubeId = (isset($query['v']) && $query['v']) ? $query['v']:'';
					    //$mainVideoThumbnail = 'https://i.ytimg.com/vi/'.$youtubeId.'/hqdefault.jpg'; /* small image */
					    $mainVideoThumbnail = 'https://img.youtube.com/vi/'.$youtubeId.'/0.jpg'; /* large image */
					}
					if($videoThumb) {
						$mainVideoThumbnail = ($videoThumb) ? $videoThumb['url']:'';
					}
				}
			} else {
				if( isset($ftype['post_obj']) && $ftype['post_obj'] ) {
					$obj = $ftype['post_obj'];
					$subtitle = $obj->post_title;
				}
			}
		}
		
		?>
		<?php if ($row1_title1 || $ftype) { ?>
		<section class="section row3 section-video-revised">
			<div class="wrapper twocol">
				<?php if ($row1_title1 || $subtitle) { ?>
				<div class="titlecol left wow fadeIn" data-wow-delay=".4s">
					<div class="inner">
						<div class="rowhead">
							<?php if ($row1_title1) { ?>
							<h2 class="coltitle t1"><?php echo $row1_title1 ?></h2>
							<?php } ?>
							<?php if ($subtitle) { ?>
							<h3 class="coltitle t2"><?php echo $subtitle ?></h2>
							<?php } ?>
						</div>
					
						<?php if ( $featured_type=='video' && $mainVideoThumbnail && $videoURL) {  ?>
						<div class="videocol">
							<a id="playVideo" data-fancybox href="<?php echo $videoURL ?>" class="videoThumb">
								<span class="thumb" style="background-image:url('<?php echo $mainVideoThumbnail ?>');"></span>
								<span class="play"></span>
								<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="placeholder">
							</a>
						</div>
						<?php } ?>
						
						<?php if ( $featured_type=='post' && ( isset($ftype['post_obj']) && $ftype['post_obj'] ) ) {  
							$pid = $obj->ID;
							$pagelink = get_permalink($pid);
							$thumbId = get_post_thumbnail_id($pid);
							$postImage = wp_get_attachment_image_src($thumbId,'large'); 
							$custom_feat_image = $ftype['custom_feat_image'];
							$postImageURL = '';
							if($custom_feat_image) {
								$postImageURL = $custom_feat_image['url'];
							} else {
								$postImageURL = ($postImage) ? $postImage[0] : '';
							}
							?>
							<div class="featuredArticle">
								<a href="<?php echo $pagelink ?>" class="pageLink <?php echo ($postImage) ? 'hasphoto':'nophoto' ?>">
									<?php if ($postImageURL) { ?>
									<span class="thumb" style="background-image:url('<?php echo $postImageURL ?>');"></span>
									<?php } ?>
									<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="placeholder">
									<span class="go"></span>
								</a>
							</div>
						<?php } ?>
					
					</div>
				</div>
				<?php } ?>


				<?php get_template_part("parts/home-galleries") ?>
				
			</div>
		</section>
		<?php } ?>

		<?php 
		$row1_image = get_field("row1_image"); 
		$row1_title = get_field("row1_title"); 
		$row1_text = get_field("row1_text"); 
		$row1Bg = ($row1_image) ? ' style="background-image:url('.$row1_image['url'].')"':'';
		?>

		<?php if ($row1_image || ($row1_title || $row1_text) ) { ?>
		<section class="section row1 <?php echo ($row1_image) ? 'has-image':'no-image' ?>">
			<div class="image wow fadeIn"<?php echo $row1Bg ?>>
				<div class="wrapper">
					<?php if ($row1_title || $row1_text) { ?>
					<div class="caption wow fadeInDown" data-wow-delay=".4s">
						<?php if ($row1_title) { ?>
							<h2 class="coltitle"><?php echo $row1_title ?></h2>
						<?php } ?>
						<?php if ($row1_text) { ?>
							<div class="parag text"><?php echo $row1_text ?></div>
						<?php } ?>
					</div>
				</div>	
				<?php } ?>
			</div>
		</section>
		<?php } ?>

		<?php 
		$row2_services = get_field("row2_services"); 
		$row2_bg = get_field("row2_bg"); 
		$row2_title = get_field("row2_title"); 
		$row2_text = get_field("row2_text"); 
		$row2_buttonName = get_field("row2_buttonName"); 
		$row2_buttonLink = get_field("row2_buttonLink"); 
		?>
		<?php if ($row2_services || ($row2_title || $row2_text) ) { ?>
		<section class="section row2">
			<?php if ($row2_bg) { ?>
			<div class="bg" style="background-image:url('<?php echo $row2_bg['url'] ?>')"></div>
			<?php } ?>
			<div class="wrapper contentwrap">
				<div class="iconsRow">
					<?php foreach ($row2_services as $s) { 
						$s_icon = $s['icon'];
						$s_title = $s['title'];
						$s_link = $s['link'];
						$link_open = '';
						$link_close = '';
						if($s_link) {
							$link_open = '<a href="'.$s_link.'" class="link">';
							$link_close = '</a>';
						}
					?>
					<div class="ellipse zoomIn wow <?php echo ($s_link) ? 'haslink':'nolink'; ?>" data-wow-delay=".6s">
						<?php echo $link_open; ?>
						<span class="wrap">
							<span class="icon"><i class="<?php echo $s_icon ?>"></i></span>
							<span class="title"><?php echo $s_title ?></span>
						</span>
						<?php echo $link_close; ?>
					</div>
				<?php } ?>
				</div>

				<?php if ($row2_title || $row2_text) { ?>
				<div class="textwrap">
					<div class="flexwrap">
						<?php if ($row2_title) { ?>
						<div class="titlediv wow fadeInLeft" data-wow-delay=".6s"><h2 class="coltitle"><?php echo $row2_title ?></h2></div>	
						<?php } ?>

						<?php if ($row2_text) { ?>
						<div class="parag wow fadeIn" data-wow-delay=".8s">
							<div class="inside"><?php echo $row2_text ?></div>
							<?php if ($row2_buttonName && $row2_buttonLink) { ?>
							<div class="button"><a href="<?php echo $row2_buttonLink ?>" class="btnCTA"><?php echo $row2_buttonName ?></a></div>	
							<?php } ?>
						</div>	
						<?php } ?>
					 </div>
				</div>	
				<?php } ?>
			</div>
		</section>
		<?php } ?>


		<?php 
		$row4_title = get_field("row4_title");
		$row4_gallery = get_field("row4_gallery");
		if ($row4_gallery) { ?>
		<section class="section row4 collaborations">
			<div class="wrapper">
				<?php if ($row4_title) { ?>
				<h2 class="coltitle"><?php echo $row4_title ?></h2>	
				<?php } ?>
				<div class="partnerslogo">
					<?php foreach ($row4_gallery as $img) { 
						$id = $img['ID'];
						$link = get_field("weburl",$id);
						$link_open = '';
						$link_close = '';
						if($link) {
							$link_open = '<a href="'.$link.'" target="_blank">';
							$link_close = '</a>';
						}
					?>
						<span class="partner">
							<span style="background-image:url('<?php echo $img['url'] ?>')">
								<?php echo $link_open ?>
								<img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>" style="display:none;">
								<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="placeholder">
								<?php echo $link_close ?>
							</span>
						</span>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php } ?>
	
	<?php endwhile; ?>
</main><!-- #main -->

<script>
jQuery(document).ready(function($){
	if( $(".videolink").length>0 ) {
		$(".videolink").each(function(){
			var target = $(this);
			var id = $(this).attr("data-vid");
			var url = 'https://www.youtube.com/watch?v=' + id;
			$.getJSON('https://noembed.com/embed',
			    {format: 'json', url: url}, function (data) {
			    var youtube_title = data.title;
			    target.find("span.caption span.text").text(youtube_title);
			});
		});
	}
});
</script>
<?php
get_footer();
