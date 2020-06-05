<?php
$homeBanner = ( is_front_page() ) ? 'homepage':'subpage';
$slides = get_field("banner");
$overlay_image = get_field("overlay_image");
$count = 0;
if( isset($slides['url']) && $slides['url'] ) {
	$count = 0;
} else {
	$count = ($slides) ? count($slides) : 0; 
}
$slidesId = ($count>1) ? 'slideshow':'static-banner';
$placeholder = THEMEURI . 'images/rectangle-lg.png';

if( is_front_page() ) {
	$banner_text = get_field("banner_text");
	if( $slides ) {  ?>
	<div class="slideOuterWrap">
		<div id="<?php echo $slidesId ?>" class="swiper-container banner-wrap fw homepage">
			<div class="swiper-wrapper">

				<?php if ( isset($slides['url']) && $slides['url'] ) { ?>

					<div class="swiper-slide slideItem" style="background-image:url('<?php echo $slides['url'] ?>');">
						<?php if ($banner_text) { ?>
						<div class="slideCaption animated wow fadeIn"><div class="text"><?php echo $banner_text ?></div></div>	
						<?php } ?>
					</div>

				<?php } else { ?>

					<?php foreach ($slides as $img) { 
							$title = $img['title'];
							$caption = $img['caption'];
						?>
	    				<div class="swiper-slide slideItem" style="background-image:url('<?php echo $img['url'] ?>');">
	    					<?php if ($caption) { ?>
	    					<div class="slideCaption">
		    					<div class="slideInside animated">
		    						<div class="slideMid">
			    						<?php if ($title) { ?>
			    						<h2 class="slideTitle"><?php echo $title; ?></h2><br>
			    						<?php } ?>
			    						<?php if ($caption) { ?>
			    						<div class="slideText"><?php echo $caption; ?></div>	
			    						<?php } ?>
		    						</div>
	    						</div>
	    					</div>
	    					<?php } ?>
	    					<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" />
	    				</div>
	    			<?php } ?>

				<?php } ?>

			</div>

			<?php if ($count>1) { ?>
			    <div class="swiper-pagination"></div>
			    <div class="swiper-button-next"></div>
			    <div class="swiper-button-prev"></div>
			<?php } ?>
		</div>
		
		<?php if ($overlay_image) { ?>
		<div class="slide-overlay wow fadeInRight" data-wow-delay=".4s">
			<img src="<?php echo $overlay_image['url'] ?>" alt="" aria-hidden="true">
		</div>	
		<?php } ?>
	</div>
	<?php } ?>

<?php } else { ?>

	<?php  
	$post_type = get_post_type();
	$page_title = get_the_title();
	?>
	
	<?php if( $slides ) {  ?>
	<div id="static-banner" class="banner-wrap fw subpage">
		<div class="banner-image cf fadeIn animated" style="background-image:url('<?php echo $slides['url']; ?>');">
			<div class="wrapper">
				<div class="caption">
					<h1 class="page-title fadeInRight wow"><?php echo $page_title ?></h1>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

<?php } ?>