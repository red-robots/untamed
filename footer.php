	
<?php 
wp_reset_postdata();
wp_reset_query();
if ( !is_front_page() ) : ?>
        
       <div class="clear"></div>
        <div id="footer-slider-container">
        <h3>New From Untamed Science</h3>
        	<div id="front-page-rotation">
             <div id="flexslider">
                <div class="flexslider">
                <ul id="mycarousel" class="jcarousel-skin-tango">
            
            
           <?php
		   
		   /* Custom Query to pull all posts with the Front Page Category Custom Taxonomy
		      from 4 different Custom Post Types that are listed in the Array Below */
		   
           $args = array(
		   
            'post_type' => array('blog','biodiversity', 'filmmaking', 'biology'), //You list of Custom Post Types
            'posts_per_page' => '100', // # of posts to show
			'tax_query' => array(  //Custom Taxonomy "front_page"
				array(       // array within an array
					'taxonomy' => 'front_page', // Name when registering CT
					'field' => 'slug',
					'terms' => 'front-page' // slug created by WP when you make your entry
				)
			)
                
            );
            $query = new WP_Query( $args );  // Query all of your arguments from above
           ?>
           <?php if (have_posts()) : while( $query->have_posts() ) : $query->the_post(); // the loop ?>
           
           <li class="hideitemonload">
           		<?php $post_type = get_post_type( get_the_ID() ); // Get the post type so you can style your div according to the post type ?>
           
                      <div class="homepage-thumb <?php echo $post_type."-home" // post type turned into a class ?>">
                      <a href="<?php the_permalink(); ?>" >
                        <?php if ( has_post_thumbnail() ) {  ?>
                               <?php the_post_thumbnail( 'homepage_thumb' ); ?>
                        <?php } else { ?><img src="<?php bloginfo('template_url'); ?>/images/default-homepage-thumb.png" /><?php } ?>
                             <div class="homepage-thumb-title-slider">
                             <?php if(get_field('alternate_title')) { ?>
<?php the_field('alternate_title'); ?>
<?php } else { ?>
<?php the_title(); ?>
<?php } ?>
                             </div><!-- homepage-thumb title slider -->
                         </a>
                          </div><!-- homepage thumb --> 
              
            </li>
            <?php  endwhile; endif; wp_reset_postdata();  // close loop ?>
             <!-- Rewind and Reset -->
				<?php  //wp_reset_query(); // Reset Query  ?> 
                <?php  //rewind_posts(); ?>
            </div><!-- #frobt page rotation -->
            </ul><!-- /slides -->
			</div><!-- /flexslider -->
            </div><!-- /flexslider -->
            
            
            </div><!-- /footer slider container -->
            
            
         <?php endif; ?>

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
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script type="text/javascript" charset="utf-8">
    // Can also be used with $(document).ready()

   $(window).load(function() {
  // $('.flexslider').flexslider({
  //   animation: "slidereffect",
  //       animationLoop: true,
  //       easing: "linear",
  //       useCSS: false,
  //       randomize: false,
  //       pauseOnHover: true,
  //       slideshowSpeed: 12,
  //       animationSpeed: 8000,
  //       controlNav: false,
  //       directionNav: true,
  //       itemWidth: 220,
  //       itemMargin: 5,
		
  // });
  
  
  // set up and load the front page carousel
  jQuery('#mycarousel').jcarousel({
    	wrap: 'circular',
		auto: 0,
		scroll: 1,
		animation: 400,
    });
	
	// WE added a css of display: none to the list itme so it doesn't flicker or look weird when it's loading
	// But we need to remove that class on load to see the carousel 
 jQuery('ul#mycarousel li').removeClass('hideitemonload');

  // this is dfor the isotope jquery for the blog roll
  // we load it int eh alpha container and spit it out in the beta container
  var $alpha = $('#alpha');
  var $container = $('#beta');
  var $checkboxes = $('#filters input');
  
  // init isotope, then insert all items from hidden #alpha
 
 
  $container.isotope({
  	itemSelector: '.blog-square',
	animationEngine: 'best-available',
  }).isotope( 'insert', $alpha.find('.blog-square') );



$("a[href='/blog']").attr('href', 'our-blog');


  
});
  </script>

</body>
</html>
