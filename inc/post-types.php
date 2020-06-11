<?php 
/* Custom Post Types */

/* Create Your Custom Post Types */
add_action('init', 'js_custom_init');
function js_custom_init() 
{
/* Custom Post Type Biodiversity */
  $labels = array(
  'name' => _x('Biodiversity', 'post type general name'),
    'singular_name' => _x('Biodiversity', 'post type singular name'),
    'add_new' => _x('Add New', 'banner'),
    'add_new_item' => __('Add New Biodiversity Item'),
    'edit_item' => __('Edit Biodiversity Item'),
    'new_item' => __('New Biodiversity Item'),
    'view_item' => __('View Biodiversity Item'),
    'search_items' => __('Search Biodiversity'),
    'not_found' =>  __('None found'),
    'not_found_in_trash' => __('None found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Biodiversity'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail','page-attributes', 'comments', 'author', 'trackbacks'),
  'taxonomies' => array('biodiversitycats', 'post_tag', 'biodiversity') 
  ); 
  register_post_type('biodiversity',$args);  

/* Custom Post Type How to filmmaking */
  $labels = array(
  'name' => _x('Filmmaking Post', 'post type general name'),
    'singular_name' => _x('Filmmaking Post', 'post type singular name'),
    'add_new' => _x('Add New', 'Filmmaking Post'),
    'add_new_item' => __('Add New Filmmaking Post Item'),
    'edit_item' => __('Edit Filmmaking Post Item'),
    'new_item' => __('New Filmmaking Post Item'),
    'view_item' => __('View Filmmaking Post Item'),
    'search_items' => __('Search Filmmaking Post'),
    'not_found' =>  __('None found'),
    'not_found_in_trash' => __('None found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Filmmaking'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => true,
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail','page-attributes', 'comments', 'author', 'trackbacks'),
  /*'with_front' => true, */
  'taxonomies' => array('post_tag', 'blog') 
  ); 
  register_post_type('filmmaking',$args); 
  
/* Custom Post Type Blog */
  $labels = array(
  'name' => _x('Blog Post', 'post type general name'),
    'singular_name' => _x('Blog Post', 'post type singular name'),
    'add_new' => _x('Add New', 'Blog Post'),
    'add_new_item' => __('Add New Blog Post Item'),
    'edit_item' => __('Edit Blog Post Item'),
    'new_item' => __('New Blog Post Item'),
    'view_item' => __('View Blog Post Item'),
    'search_items' => __('Search Blog Post'),
    'not_found' =>  __('None found'),
    'not_found_in_trash' => __('None found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Blog Post'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail','page-attributes', 'comments', 'author', 'trackbacks'),
  'taxonomies' => array('post_tag', 'blog') 
  ); 
  register_post_type('blog',$args);  

/* Custom Post Type Biology */
  $labels = array(
  'name' => _x('Biology', 'post type general name'),
    'singular_name' => _x('Biology', 'post type singular name'),
    'add_new' => _x('Add New', 'banner'),
    'add_new_item' => __('Add New Biology Item'),
    'edit_item' => __('Edit Biology Item'),
    'new_item' => __('New Biology Item'),
    'view_item' => __('View Biology Item'),
    'search_items' => __('Search Biology'),
    'not_found' =>  __('None found'),
    'not_found_in_trash' => __('None found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Biology'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => true,
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail','page-attributes', 'comments', 'author', 'trackbacks'),
  'taxonomies' => array('post_tag', 'biology') 
  ); 
  register_post_type('biology',$args);


  /* Custom Post Type Biology */
  $labels = array(
  'name' => _x('Ads', 'post type general name'),
    'singular_name' => _x('Ad', 'post type singular name'),
    'add_new' => _x('Add New', 'Ad'),
    'add_new_item' => __('Add New Ad'),
    'edit_item' => __('Edit Ad'),
    'new_item' => __('New Ad'),
    'view_item' => __('View Ad'),
    'search_items' => __('Search Ads'),
    'not_found' =>  __('None found'),
    'not_found_in_trash' => __('None found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Ads'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => true,
    'menu_position' => 20,
    'supports' => array('title'),
  'taxonomies' => array() 
  ); 
  register_post_type('ad',$args);
    
} // End Custom Post Types


// WP Menu Categories
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
  
// Biodiversity Kingdom
    register_taxonomy( 'kingdomtag', 'biodiversity',
   array( 
  'hierarchical' => false, 
  'label' => 'Kingdom', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => false,
  'public' => true,
  'rewrite' => array( 'slug' => 'kingdom' ),
  '_builtin' => true
  ) );
  
// Biodiversity Phylum
    register_taxonomy( 'phylumtag', 'biodiversity',
   array( 
  'hierarchical' => false, 
  'label' => 'Phylum', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => false,
  'public' => true,
  'rewrite' => array( 'slug' => 'phylum' ),
  '_builtin' => true
  ) );
  
// Biodiversity Phylum
    register_taxonomy( 'classtag', 'biodiversity',
   array( 
  'hierarchical' => false, 
  'label' => 'Class', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => false,
  'public' => true,
  'rewrite' => array( 'slug' => 'class' ),
  '_builtin' => true
  ) );
  
// Biodiversity Phylum
    register_taxonomy( 'ordertag', 'biodiversity',
   array( 
  'hierarchical' => false, 
  'label' => 'Order', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => false,
  'public' => true,
  'rewrite' => array( 'slug' => 'order' ),
  '_builtin' => true
  ) );
  
// Biodiversity Family
    register_taxonomy( 'familytag', 'biodiversity',
   array( 
  'hierarchical' => false, 
  'label' => 'Family', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => false,
  'public' => true,
  'rewrite' => array( 'slug' => 'family' ),
  '_builtin' => true
  ) );
  
// Biodiversity Genus
    register_taxonomy( 'genustag', 'biodiversity',
   array( 
  'hierarchical' => false, 
  'label' => 'Genus', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => false,
  'public' => true,
  'rewrite' => array( 'slug' => 'genus' ),
  '_builtin' => true
  ) );
  
// Biodiversity Species
    register_taxonomy( 'speciestag', 'biodiversity',
   array( 
  'hierarchical' => false, 
  'label' => 'Species', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => false,
  'public' => true,
  'rewrite' => array( 'slug' => 'species' ),
  '_builtin' => true
  ) );
  
// Biodiversity Classes
    register_taxonomy( 'biodiversitycats', 'biodiversity',
   array( 
  'hierarchical' => true, 
  'label' => 'Biodiversity Categories', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => true,
  'public' => true,
  'rewrite' => array( 'slug' => 'biodiversity-category' ),
  '_builtin' => true
  ) );
  
// Biodiversity Classes Used for Sub Navigation on the Biodiversity Portal. 
// Includes: Microbes, Fish and Invertebrates.
    register_taxonomy( 'categories', 'biodiversity',
   array( 
  'hierarchical' => true, 
  'label' => 'Classification', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => true,
  'public' => true,
  'rewrite' => array( 'slug' => 'classification' ),
  '_builtin' => true
  ) );
// Biology Classes
    register_taxonomy( 'biocats', 'biology',
   array( 
  'hierarchical' => true, 
  'label' => 'Biology Categories', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => true,
  'public' => true,
  'rewrite' => array( 'slug' => 'biology_category' ),
  '_builtin' => true
  ) );
  
// Blog Categories
    register_taxonomy( 'blogcats', 'blog',
   array( 
  'hierarchical' => true, 
  'label' => 'Blog Categories', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => true,
  'public' => true,
  'rewrite' => array( 'slug' => 'blog-category' ),
  '_builtin' => true
  ) );
  
// Filmmaking Categories
    register_taxonomy( 'filmmakingcats', 'filmmaking',
   array( 
  'hierarchical' => true, 
  'label' => 'Film Categories', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => true,
  'public' => true,
  'rewrite' => array( 'slug' => 'filmmaking-category' ),
  '_builtin' => true
  ) );
  
// For showing on Front Page  
register_taxonomy( 'front_page',
      array( 'blog','biodiversity','biology', 'filmmaking', 'page' ), // List Custom Post Types to show
      array( 
    'hierarchical' => true,
      'label' => 'Show on Front Page?',               
      'query_var' => true,
    'show_admin_column' => true,
      )
);

// For showing on Front Page  
register_taxonomy( 'science_cat',
      array( 'blog','biodiversity','biology', 'filmmaking', 'page' ), // List Custom Post Types to show
      array( 
        'hierarchical' => true, 
        'label' => 'Science Category', 
        'query_var' => true, 
        'rewrite' => true ,
        'show_admin_column' => true,
        'public' => true,
        'rewrite' => array( 'slug' => 'science-category' ),
        '_builtin' => true
      )
);

} // End build taxonomies