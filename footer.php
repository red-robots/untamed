	</div><!-- #content -->

	<?php  
	$footlogo = get_field("footlogo","option");
	// $address = get_field("address","option");
	// $phone = get_field("phone","option");
	// $fax = get_field("fax","option");
	// $email = get_field("email","option");
	// $contacts = array($address,$phone,$fax,$email);
	// $other_info = get_field("other_info","option");
	//$footer_logos = get_field("footer_logos","option");
	$group1_links = get_field("group1_links","option");
	$group2_links = get_field("group2_links","option");
	$other_sites = get_field("other_sites","option");
	$social_media = get_field("social_links","option");
	$social_icons = social_icons();
	$subscribe_button_label = get_field("subscribe_button_label","option");
	$subscribe_button_link = get_field("subscribe_button_link","option");
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-content wrapper cf">
			<div class="footcolums">
				<div class="footcolLeft footcol fcol1">
					<div class="inner">
						<?php if ($footlogo) { ?>
						<img src="<?php echo $footlogo['url'] ?>" alt="<?php echo $footlogo['title'] ?>" class="footlogo">	
						<?php } ?>

						<?php if ($subscribe_button_label && $subscribe_button_link) { 
						$p = parse_external_url($subscribe_button_link['url']); 
						?>
						<div class="subscribeBtn">
							<a href="<?php echo $p['url'] ?>" target="<?php echo $p['target'] ?>" class="btnCTA"><?php echo $subscribe_button_label ?></a>
						</div>
						<?php } ?>
					</div>
				</div>

				<div class="footcolRight">
				
					<?php if ($group1_links) { ?>
					<div class="footcol fcol2 links">
						<div class="inner">
							<?php echo $group1_links ?>
						</div>
					</div>
					<?php } ?>

					<?php if ($group2_links) { ?>
					<div class="footcol fcol3 links">
						<div class="inner">
							<?php echo $group2_links ?>
						</div>
					</div>
					<?php } ?>

					<?php if ($social_media) { ?>
					<div class="footcol fcol4">
						<div class="inner">
							<div class="social-media">
								<?php foreach ($social_media as $s) { 
									$socialLink = $s['link'];
									$socialIcon = '';
			                		$socialName = '';
			                		if($socialLink) { 
			                			$parts = parse_url($socialLink);
			                			$host = ( isset($parts['host']) && $parts['host'] ) ? str_replace('www.','',$parts['host']):'';
			                			$hostArrs = ($host) ? explode('.',$host):'';
			                			$domain = trim(strtolower($hostArrs[0]));
			                			if( array_key_exists($domain, $social_icons) ) {
			                				$socialIcon = $social_icons[$domain];
			                			}
			                			if($socialIcon) { ?>
			                			<a href="<?php echo $socialLink ?>" target="_blank"><i class="<?php echo $socialIcon ?>"></i><span class="sr"><?php echo $domain ?></span></a>
			                			<?php } ?>
									<?php } ?>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>

					<?php if ($other_sites) { ?>
					<div class="footcol fcol5 other-sites">
						<div class="inner">
							<?php echo $other_sites ?>
						</div>
					</div>
					<?php } ?>

				</div>

			</div>
		</div><!-- wrapper -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->
<div id="modalContainer"></div>
<?php wp_footer(); ?>


</body>
</html>
