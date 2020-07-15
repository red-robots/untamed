    <?php if ( 'biodiversity' == get_post_type() || is_page('tree-of-life')  || is_taxonomy('classification') /*|| is_taxonomy('kingdomtag') || is_taxonomy('phylumtag') || is_taxonomy('classtag') || is_taxonomy('ordertag') || is_taxonomy('familytag') || is_taxonomy('genustag') || is_taxonomy('speciestag')*/ )   {?>
    <div id="tree-nav-container">
        <div id="tree-nav" class="mobile">
            <?php 
            //wp_nav_menu( array( 'theme_location' => 'tree-of-life', 'menu_class' => 'tree-menu' ) ); 
                wp_nav_menu(array(
                  'theme_location' => 'tree-of-life', // your theme location here
                  'menu_class' => 'tree-menu',
                  'walker'         => new Walker_Nav_Menu_Dropdown(),
                  // 'items_wrap'     => '<select>%3$s</select>',
                  'items_wrap'     => '<div class="mobile-menu"><form><select class="select-css" onchange="if (this.value) window.location.href=this.value"><option value="">Select a Biodiversity page...</option>%3$s</select></form></div>',
                ));
            ?>
        </div><!-- #navigation -->
        <div id="tree-nav" class="nomobile">
            <?php 
            //wp_nav_menu( array( 'theme_location' => 'tree-of-life', 'menu_class' => 'tree-menu' ) ); 
                wp_nav_menu(array(
                  'theme_location' => 'tree-of-life', 
                  'menu_class' => 'tree-menu',
                ));
            ?>
        </div><!-- #navigation -->
    </div><!-- #tree navigation  container -->
 <?php } elseif ( 'biology' == get_post_type() || is_page('world-biology') || is_taxonomy('biology-class') ) { ?>
    <div id="tree-nav-container">
        <div id="tree-nav" class="mobile">
            <?php 
            //wp_nav_menu( array( 'theme_location' => 'tree-of-life', 'menu_class' => 'tree-menu' ) ); 
                wp_nav_menu(array(
                  'theme_location' => 'biology', // your theme location here
                  'menu_class' => 'tree-menu',
                  'walker'         => new Walker_Nav_Menu_Dropdown(),
                  // 'items_wrap'     => '<select>%3$s</select>',
                  'items_wrap'     => '<div class="mobile-menu"><form><select class="select-css" onchange="if (this.value) window.location.href=this.value"><option value="">Select a Biology page...</option>%3$s</select></form></div>',
                ));
            ?>
        </div><!-- #navigation -->
        <div id="tree-nav" class="nomobile">
            <?php 
            //wp_nav_menu( array( 'theme_location' => 'tree-of-life', 'menu_class' => 'tree-menu' ) ); 
                wp_nav_menu(array(
                  'theme_location' => 'biology', 
                  'menu_class' => 'tree-menu',
                ));
            ?>
        </div><!-- #navigation -->       
    </div><!-- #tree navigation  container -->
<?php } else {   }  ?>