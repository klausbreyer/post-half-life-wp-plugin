<?php
function phl_activation() {
	if ( ! current_user_can( 'activate_plugins' ) )
		return;
	$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
	check_admin_referer( "activate-plugin_{$plugin}" );
	phl_initialize_db();
}

function phl_deactivation()	{
	if ( ! current_user_can( 'activate_plugins' ) )
		return;
	$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
	check_admin_referer( "deactivate-plugin_{$plugin}" );
}

function phl_uninstall() {
	if ( ! current_user_can( 'activate_plugins' ) )
		return;
	check_admin_referer( 'bulk-plugins' );
	//todo: delete data. 
	if ( __FILE__ != WP_UNINSTALL_PLUGIN )
		return;
}
function phl_update_db_check() {
	global $phl_db_version;
	if (get_site_option( 'phl_db_version' ) != $phl_db_version) {
		phl_initialize_db();
	}
}

function phl_initialize_db() {

	global $wpdb, $phl_db_version, $phl_table_name;
	
	echo $phl_db_version;


	$sql = "CREATE TABLE $phl_table_name (
	id int NOT NULL AUTO_INCREMENT,
	post_id int,
	referer text,
	fetch_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
	UNIQUE KEY id (id)
	);";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	add_option( "phl_db_version", $phl_db_version );
	update_option( "phl_db_version", $phl_db_version );
}

register_activation_hook(   __FILE__, 'phl_activation' );
register_deactivation_hook( __FILE__, 'phl_deactivation' );
register_uninstall_hook(    __FILE__, 'phl_uninstall' );
add_action( 'plugins_loaded', 'phl_update_db_check' );
