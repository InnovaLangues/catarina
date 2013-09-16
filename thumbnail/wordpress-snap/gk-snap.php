<?php
/*
Plugin Name: WordPress Snap
Plugin URI: http://www.geekeries.fr/snippet/creer-automatiquement-miniatures-sites-wordpress/
Description: WordPress Snap is a simple shortcode for display a thumbnail from any website.
Author: Valentin Brandt
Version: 2.1.1
Author URI: http://www.geekeries.fr/
License: GPL2
*/

// Shortcode
function gk_snap($atts, $content = null) {
	extract(shortcode_atts(array(
		"snap" => 'http://s.wordpress.com/mshots/v1/',
		"url" => 'http://www.geekeries.fr',
		"alt" => 'My Thumbnails',
		"title" => 'My Title',
		"w" => '400',
		"h" => '300',
		"class" => 'snap',
		"rel" => 'follow',
		"target" => '_blank',
		"link" => 'on'
	), $atts));

	$img = '<img src="' . $snap . '' . urlencode($url) . '?w=' . $w . '&h=' . $h . '" alt="' . $alt . '" class="' . $class .'"/>'; //Show Thumbnail
	
	if($atts['link'] == 'on') {
		$gksnap = '<a rel="' . $rel . '" target="' . $target . '" href="' . $url . '" title="' . $title . '"> ' . $img . ' </a>';
		return $gksnap; //Add Snap
	} else {
		return $img; //Add Image
	}
}



	
	//Add Pointers in WordPress 3.3 - Thanks and source ! http://theme.fm/?p=2407


function wordpress_snap_enqueue() {

	$welcome = get_user_setting( 'wordpress_snap_welcome_again', 0 );
	if ( ! $welcome ) {
		wp_enqueue_style( 'wp-pointer' ); 
		wp_enqueue_script( 'wp-pointer' ); 
		wp_enqueue_script( 'utils' );
		add_action( 'admin_print_footer_scripts', 'wordpress_snap_print_footer_scripts' );
	}
}

function wordpress_snap_print_footer_scripts() {
	$pointer_content = '<h3>Welcome to WordPress Snap !</h3>';
	$pointer_content .= '<p>WordPress Snap is a simple shortcode for display a website preview thumbnail. <br>';
	$pointer_content .= 'The orignal <code>shortcode</code> created by Valentin Brandt on <a href="http://www.geekeries.fr" title="wordpress france">WordPress Geekeries</a>.<br><code>Just click on this WordPress Snap icon <img src="' .plugins_url( '/inc/icon.png', __FILE__ ). '" alt="Add a Snap" /> for add a <br>awesome website preview thumbnail !</code>';

?>
<script type="text/javascript"> 
//<![CDATA[ 
jQuery(document).ready( function($) { 
	$('#menu-posts').pointer({ 
		content: '<?php echo $pointer_content; ?>', 
		position: {
			my: 'right top', 
			at: 'left top', 
			offset: '0 -2'
		},
		arrow: {
			edge: 'left',
			align: 'top',
			offset: 10
		},
		close: function() { 
			setUserSetting( 'wordpress_snap_welcome_again', '1' ); 
		} 
	}).pointer('open'); 
}); 
//]]> 
</script>
<?php
}


// TinyMCE Button - Icon by Randy Jensen - http://randyjensenonline.com/thoughts/wordpress-custom-post-type-fugue-icons/
function gk_register_tinymce($buttons) {
array_push($buttons, "|", "wpsnap");
   return $buttons;
}

function gk_add_tinymce($plugin_array) {
   $plugin_array['wpsnap'] = plugins_url( '/inc/snap.js', __FILE__ ) ;
   return $plugin_array;
}
function gk_add_quicktag() {
	wp_enqueue_script( 'wpsnap', plugin_dir_url( __FILE__ ) . '/inc/quicktags.js', array( 'quicktags' ) );
}

// Action



function gk_add_action_button() {
	
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) return;

	if ( get_user_option('rich_editing') == 'true') {
		add_filter('mce_external_plugins', 'gk_add_tinymce'); //Add Button TinyMCE
		add_filter('mce_buttons', 'gk_register_tinymce'); //Register Button TinyMCE
	}
}


?>