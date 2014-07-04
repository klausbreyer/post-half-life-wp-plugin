<?php
function phl_counter() {
	echo "<!-- plugin counter \n";
	wp_reset_postdata();
	if (is_single()) {
		echo get_the_ID();
		echo "\n";
		echo the_ID();
	    global $wpdb, $phl_table_name;
		$wpdb->insert( $phl_table_name, array("fetch_date" => current_time("mysql"), "post_id" => get_the_ID(), "referer" => $_SERVER['HTTP_REFERER']));
	}

	echo "\nplugin counter -->";
}
add_action( 'wp_footer', 'phl_counter' );

