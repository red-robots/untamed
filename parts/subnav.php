    <?php if ( 'biodiversity' == get_post_type() || is_page('tree-of-life')  || is_taxonomy('classification') /*|| is_taxonomy('kingdomtag') || is_taxonomy('phylumtag') || is_taxonomy('classtag') || is_taxonomy('ordertag') || is_taxonomy('familytag') || is_taxonomy('genustag') || is_taxonomy('speciestag')*/ )   {?>
    <div id="tree-nav-container">
        <div id="tree-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'tree-of-life', 'menu_class' => 'tree-menu' ) ); ?>
        </div><!-- #navigation -->
    </div><!-- #tree navigation  container -->
 <?php } elseif ( 'biology' == get_post_type() || is_page('world-biology') || is_taxonomy('biology-class') ) { ?>
    <div id="tree-nav-container">
        <div id="tree-nav">
        <?php wp_nav_menu( array( 'theme_location' => 'biology', 'menu_class' => 'tree-menu' ) ); ?>
        </div><!-- #navigation -->        
    </div><!-- #tree navigation  container -->
<?php } else {   }  ?>
   
     