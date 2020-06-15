<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<!-- <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/jquery.fancybox.min.css"> -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=219473481428768";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site cf">
	<a id="toggleMenu" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
		<span class="sr"><?php esc_html_e( 'MENU', 'bellaworks' ); ?></span><span class="bar"></span>
	</a>

	<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper">
			<div class="flexwrap">
				<?php if( get_custom_logo() ) { ?>
		            <div class="logo">
		            	<?php the_custom_logo(); ?>
		            </div>
		        <?php } else { ?>
		            <h1 class="logo">
			            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
		            </h1>
		        <?php } ?>



				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 
						'theme_location' => 'primary', 
						'menu_id' => 'primary-menu',
						'container_class'=>'main-menu',
						'link_before'=>'<span>',
						'link_after'=>'</span>' 
					) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div><!-- wrapper -->
	</header><!-- #masthead -->

	<?php 

	 get_template_part('parts/subnav');
	get_template_part("parts/banner"); 

	?>

	<div id="content" class="site-content cf">
