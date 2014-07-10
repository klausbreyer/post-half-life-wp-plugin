<?php
	
add_action( 'admin_menu', 'phl_plugin_menu' );

function phl_plugin_menu() {
	// add_options_page( 'My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', 'phl_plugin_options' );
	    add_submenu_page('index.php', 'Post-Half-Life Backend', 'Post-Half-Life (p½)', 'manage_options', 'post-half-life/backend.php', '', '', 6 );
	    // add_submenu_page('index.php', 'Post-Half-Life Backend', 'Post-Half-Life (p½)', 'manage_options', 'post-half-life/backend.php', '', plugins_url( 'myplugin/images/icon.png' ), 6 );
}

	
function phl_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}