<?php
/**
 * Custom theme functions.
 *
 * 
 *
 * @package bellaworks
 */
/*-------------------------------------
  Custom nav walker that will create a dropdown for the nav
---------------------------------------*/

/**
 * Nav Menu Dropdown
 *
 * @package      BE_Genesis_Child
 * @since        1.0.0
 * @link         https://github.com/billerickson/BE-Genesis-Child
 * @author       Bill Erickson <bill@billerickson.net>
 * @copyright    Copyright (c) 2011, Bill Erickson
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 *
 */
 
class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth){
    $indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
  }

  function end_lvl(&$output, $depth){
    $indent = str_repeat("\t", $depth); // don't output children closing tag
  }

  /**
  * Start the element output.
  *
  * @param  string $output Passed by reference. Used to append additional content.
  * @param  object $item   Menu item data object.
  * @param  int $depth     Depth of menu item. May be used for padding.
  * @param  array $args    Additional strings.
  * @return void
  */
  function start_el(&$output, $item, $depth, $args) {
    $url = '#' !== $item->url ? $item->url : '';
    $output .= '<option value="' . $url . '">' . $item->title;
  } 

  function end_el(&$output, $item, $depth){
    $output .= "</option>\n"; // replace closing </li> with the option tag
  }
}



add_action('wp_footer', 'dropdown_menu_scripts');
function dropdown_menu_scripts() {
    ?>
        <script>
          jQuery(document).ready(function ($) {
            $("#drop-nav").change( function() {
                    document.location.href =  $(this).val();
            });
          });
        </script>
    <?php
}

  /**
  * Add class to the a for yoast bread crumbs

  */
add_filter( 'wpseo_breadcrumb_single_link', 'ss_breadcrumb_single_link', 10, 2 );
function ss_breadcrumb_single_link( $link_output, $link ) {
$element = '';
$element = esc_attr( apply_filters( 'wpseo_breadcrumb_single_link_wrapper', $element ) );
$link_output =  $element;

// if( $link['url'] == 'http://localhost:8888/bellaworks/untamed-science/site/blog') {
//   $newLink = 'http://localhost:8888/bellaworks/untamed-science/site/our-blog';
// }

if ( isset( $link['url'] ) ) {
    $link_output .= '<a  href="' . 

 esc_url( $link['url'] ) . '"  class="bready">' . 

 esc_html( $link['text'] ) . '</a>';
 }
 return $link_output;
}


/**
 * Add Response code to video embeds in WordPress
 *
 * @refer  http://alxmedia.se/code/2013/10/make-wordpress-default-video-embeds-responsive/
 */
function abl1035_alx_embed_html( $html ) {
  
  return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'abl1035_alx_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'abl1035_alx_embed_html' ); // Jetpack




add_filter( 'category_description', array( $GLOBALS['wp_embed'], 'autoembed' ) );


// add_filter('the_content', function($content) {
//   return str_replace(array("<iframe", "</iframe>"), array('<div class="iframe-container"><iframe', "</iframe></div>"), $content);
// });

// add_filter('embed_oembed_html', function ($html, $url, $attr, $post_id) {
//   if(strpos($html, 'youtube.com') !== false || strpos($html, 'youtu.be') !== false){
//       return '<div class="embed-responsive  embed-responsive-16by9">' . $html . '</div>';
//   } else {
//    return $html;
//   }
// }, 10, 4);


// add_filter('embed_oembed_html', function($code) {
//   return str_replace('<iframe', '<iframe class="embed-responsive-item"  ', $code);
// });
/*-------------------------------------
  Custom client login, link and title.
---------------------------------------*/
function my_login_logo() { 
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $logoImg = wp_get_attachment_image_src($custom_logo_id,'large');
  $logo_url = ($logoImg) ? $logoImg[0] : '';
  if($custom_logo_id) { ?>
  <style type="text/css">
    body.login div#login h1 a {
      background-image: url(<?php echo $logo_url; ?>);
      background-size: contain;
      width: 100%;
      height: 100px;
      margin-bottom: 10px;
    }
    .login #backtoblog, .login #nav {
      text-align: center;
    }

  </style>
<?php }
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Change Link
function loginpage_custom_link() {
  return get_site_url();
}
add_filter('login_headerurl','loginpage_custom_link');

function bella_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'bella_login_logo_url_title' );

/*-------------------------------------
	Adds Options page for ACF.
---------------------------------------*/
if( function_exists('acf_add_options_page') ) {acf_add_options_page();}

/*-------------------------------------
  Hide Front End Admin Menu Bar
---------------------------------------*/
if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}
 /*-------------------------------------
  Move Yoast to the Bottom
---------------------------------------*/
function yoasttobottom() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
/*-------------------------------------
  Custom WYSIWYG Styles

  If you are using the Plugin: MRW Web Design Simple TinyMCE

  Keep this commented out to keep from getting duplicate "Format" dropdowns

---------------------------------------*/
// function acc_custom_styles($buttons) {
//   array_unshift($buttons, 'styleselect');
//   return $buttons;
// }
// add_filter('mce_buttons_2', 'acc_custom_styles');


/*
* Callback function to filter the MCE settings


  But always use this to get the custom formats

*/
 
function my_mce_before_init_insert_formats( $init_array ) {  
 
// Define the style_formats array
 
  $style_formats = array(  
    // Each array child is a format with it's own settings
    
    // A block element
    array(  
      'title' => 'Block Color',  
      'block' => 'span',  
      'classes' => 'custom-color-block',
      'wrapper' => true,
      
    ),
    // inline color
    array(  
      'title' => 'Custom Color',  
      'inline' => 'span',  
      'classes' => 'custom-color',
      'wrapper' => true,
      
    ),
     array(
        'title' => 'Header 2',
        'format' => 'h2',
        //'icon' => 'bold'
    ),
    array(
        'title' => 'Header 3',
        'format' => 'h3'
    ),
    array(
        'title' => 'Paragraph',
        'format' => 'p'
    )
  );  
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );  
  
  return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 
// Add styles to WYSIWYG in your theme's editor-style.css file
function my_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );
/*-------------------------------------
  Change Admin Labels
---------------------------------------*/
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News Item';
    //$submenu['edit.php'][15][0] = 'Status'; // Change name for categories
    //$submenu['edit.php'][16][0] = 'Labels'; // Change name for tags
    echo '';
}

function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'News';
        $labels->singular_name = 'News Item';
        $labels->add_new = 'Add News Item';
        $labels->add_new_item = 'Add News Item';
        $labels->edit_item = 'Edit News Item';
        $labels->new_item = 'News Item';
        $labels->view_item = 'View News Item';
        $labels->search_items = 'Search News';
        $labels->not_found = 'No News found';
        $labels->not_found_in_trash = 'No News found in Trash';
    }
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

/*-------------------------------------
  Add a last and first menu class option
---------------------------------------*/

function ac_first_and_last_menu_class($items) {
  foreach($items as $k => $v){
    $parent[$v->menu_item_parent][] = $v;
  }

  if( isset($parent) ) {
    foreach($parent as $k => $v){
      $v[0]->classes[] = 'first';
      $v[count($v)-1]->classes[] = 'last';
    }
  }
  return $items;
}
add_filter('wp_nav_menu_objects', 'ac_first_and_last_menu_class');
/*-------------------------------------



 Limit File Size in Media Uploader




---------------------------------------*/
define('WPISL_DEBUG', false);

require_once ('wpisl-options.php');

class WP_Image_Size_Limit {

  public function __construct()  {  
      add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array($this, 'add_plugin_links') );
      add_filter('wp_handle_upload_prefilter', array($this, 'error_message'));
  }  

  public function add_plugin_links( $links ) {
    return array_merge(
      array(
        'settings' => '<a href="' . get_bloginfo( 'wpurl' ) . '/wp-admin/options-media.php?settings-updated=true#wpisl-limit">Settings</a>'
      ),
      $links
    );
  }

  public function get_limit() {
    $option = get_option('wpisl_options');

    if ( isset($option['img_upload_limit']) ){
      $limit = $option['img_upload_limit'];
    } else {
      $limit = $this->wp_limit();
    }

    return $limit;
  }

  public function output_limit() {
    $limit = $this->get_limit();
    $limit_output = $limit;
    $mblimit = $limit / 1000;


    if ( $limit >= 1000 ) {
      $limit_output = $mblimit;
    }

    return $limit_output;
  }

  public function wp_limit() {
    $output = wp_max_upload_size();
    $output = round($output);
    $output = $output / 1000000; //convert to megabytes
    $output = round($output);
    $output = $output * 1000; // convert to kilobytes

    return $output;

  }

  public function limit_unit() {
    $limit = $this->get_limit();

    if ( $limit < 1000 ) {
      return 'KB';
    }
    else {
      return 'MB';
    }

  }

  public function error_message($file) {
    $size = $file['size'];
    $size = $size / 1024;
    $type = $file['type'];
    $is_image = strpos($type, 'image');
    $limit = $this->get_limit();
    $limit_output = $this->output_limit();
    $unit = $this->limit_unit();

    if ( ( $size > $limit ) && ($is_image !== false) ) {
       $file['error'] = 'Image files must be smaller than '.$limit_output.$unit;
       if (WPISL_DEBUG) {
        $file['error'] .= ' [ filesize = '.$size.', limit ='.$limit.' ]';
       }
    }
    return $file;
  }

  public function load_styles() {
    $limit = $this->get_limit();
    $limit_output = $this->output_limit();
    $mblimit = $limit / 1000;
    $wplimit = $this->wp_limit();
    $unit = $this->limit_unit();


    ?>
    <!-- .Custom Max Upload Size -->
    <style type="text/css">
    .after-file-upload {
      display: none;
    }
    <?php if ( $limit < $wplimit ) : ?>
    .upload-flash-bypass:after {
      content: 'Maximum image size: <?php echo $limit_output . $unit; ?>.';
      display: block;
      margin: 15px 0;
    }
    <?php endif; ?>

    </style>
    <!-- END Custom Max Upload Size -->
    <?php
  }


}
$WP_Image_Size_Limit = new WP_Image_Size_Limit;
add_action('admin_head', array($WP_Image_Size_Limit, 'load_styles'));

function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
  global $post;         // load details about this page
  if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
    return true;   // we're at the page or at a sub page
  else 
    return false;  // we're elsewhere
};
// Pagination

function untamed_pagi() {

  if( is_singular() )
    return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
    return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /** Add current page to the array */
  if ( $paged >= 1 )
    $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }

  echo '<div class="navigation"><ul>' . "\n";

  /** Previous Post Link */
  if ( get_previous_posts_link() )
    printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
    $class = 1 == $paged ? ' class="active"' : '';

    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

    if ( ! in_array( 2, $links ) )
      echo '<li>…</li>';
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
    $class = $paged == $link ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
    if ( ! in_array( $max - 1, $links ) )
      echo '<li>…</li>' . "\n";

    $class = $paged == $max ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /** Next Post Link */
  if ( get_next_posts_link() )
    printf( '<li>%s</li>' . "\n", get_next_posts_link() );

  echo '</ul></div>' . "\n";
} // End Pagination
