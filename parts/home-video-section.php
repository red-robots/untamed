<?php 
$placeholder = THEMEURI . 'images/rectangle-lg.png';
$rectangle = THEMEURI . 'images/rectangle.png';
$video_button_name = get_field("video_button_name");
$video_button_link = get_field("video_button_link");
$moreVideoLink = ($video_button_link) ? parse_external_url($video_button_link) : '';
$mainVideoThumbnail = ($row3_videothumb) ? $row3_videothumb['url']:'';
$video_galleries = get_field("video_galleries");
if ($video_galleries) { ?>
<div class="videoList right wow fadeIn" data-wow-delay=".6s">
	<div class="inner">
		<?php foreach ($video_galleries as $v) { 
			$link = $v['youtube_video_url'];
			$youtubeId = '';
			if($link) {
				$parts = parse_url($link);
				parse_str($parts['query'], $query);
				$youtubeId = (isset($query['v']) && $query['v']) ? $query['v']:'';
			}
			if($link && $youtubeId) { 
			$thumbURL = 'https://i.ytimg.com/vi/'.$youtubeId.'/hqdefault.jpg'; 
			$page = 'https://www.youtube.com/oembed?url='.$link.'&format=json';
			$videoTitle = '';
			?>
			<div class="vidthumb">
				<a href="<?php echo $link ?>" data-fancybox class="videolink" data-vid="<?php echo $youtubeId ?>">
					<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true">
					<span class="thumb" style="background-image:url('<?php echo $thumbURL?>');"></span>
					<span class="caption">
						<span class="text"><?php echo $videoTitle ?></span>
					</span>
				</a>
			</div>
			<?php } ?>
			
		<?php } ?>
	</div>

	<?php if ($video_button_name && $moreVideoLink) { ?>
	<div class="moreBtnDiv">
		<a href="<?php echo $video_button_link ?>" target="<?php echo $moreVideoLink['target'] ?>" class="btnArrow"><span><?php echo $video_button_name ?></span></a>
	</div>
	<?php } ?>
	
</div>
<?php } ?>