<?php
/**
* @package Post_Half_Life
* @version 0.1.2
*/
/*
Plugin Name: Post-Half-Life (p½)
Plugin URI: http://klaus-breyer.de/projekte/post-half-life
Description: A Plugin for calculating the half life of a blog post. So you can determine which content and what posting time is best for your content.
Author: Klaus Breyer
Version: 0.1.2
Author URI: http://klaus-breyer.de
*/

$phl_db_version = "0.1";
$phl_table_name = $wpdb->prefix . "posthalflife"; 

require_once( dirname(__FILE__) . '/phl-counter.php' );
require_once( dirname(__FILE__) . '/phl-admin.php' );
require_once( dirname(__FILE__) . '/phl-activation.php' );

?>
