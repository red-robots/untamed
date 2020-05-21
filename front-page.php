<?php get_header(); ?>
<main id="main" class="site-main" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
		$placeholder = THEMEURI . 'images/rectangle-lg.png';
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
						<div class="titlediv wow fadeIn" data-wow-delay=".6s"><h2 class="coltitle"><?php echo $row2_title ?></h2></div>	
						<?php } ?>

						<?php if ($row2_text) { ?>
						<div class="parag wow fadeInRight" data-wow-delay=".7s">
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

	<?php endwhile; ?>
</main><!-- #main -->
<?php
get_footer();
