<?php
/**
 * Displays a Sinlge Post
 */

if ( 'biodiversity' == get_post_type() ) {
	
	require_once('single-biodiversity.php');
	
} else {

	require_once('single-default.php');

}

 ?>