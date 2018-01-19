<?php
/*
 * @wordpress-plugin
 * Plugin Name:       All-in-One GDPR: No Comment IP Addresses
 * Plugin URI:        https://gdprplug.in/free/no-comment-ips/
 * Description:       Stops WordPress collecting IP Addresses in the wp_comments table.
 * Version:           1.1.3
 * Author:            Anthony Budd, Ideea
 * Author URI:        http://ideea.co.uk/
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       all_in_one_gdpr_no_comment_ips
 */

//============================
// Main Function
//============================
add_action('init', 'aio_gdpr_no_comment_ips_init');
function aio_gdpr_no_comment_ips_init(){
	if(get_option('AIO_GDPR_NO_IP_enabled') == '1'){
		add_action('wp_insert_comment', 'aio_gdpr_no_comment_ips_comment_inserted', PHP_INT_MAX, 2);
	}
}

function aio_gdpr_no_comment_ips_comment_inserted($comment_id, $comment_object){
	wp_update_comment(array(
		'comment_ID' 		=> $comment_id,
		'comment_author_IP' => get_option('AIO_GDPR_NO_IP_default')
	));
}


//============================
// Activation Hook
//============================
function aio_gdpr_no_comment_ips_activation_hook(){
	update_option('AIO_GDPR_NO_IP_enabled', '0');
	update_option('AIO_GDPR_NO_IP_default', '000.000.000.000');
}
register_activation_hook(__FILE__, 'aio_gdpr_no_comment_ips_activation_hook');


//============================
// Admin Hooks
//============================
add_action('admin_menu', 'aio_gdpr_no_comment_ips_add_admin_menu');
function aio_gdpr_no_comment_ips_add_admin_menu(){ 
	add_submenu_page('options-general.php', 'All-in-One GDPR: No Comment IP Addresses', 'No Comment IP Addresses', 'manage_options', 'no_comment_ip_addresses', 'no_comment_ips_options_page' );
}

function no_comment_ips_options_page(){ 
	include 'settings_page.php';
}


//============================
// AJAX Actions
//============================
// Admin Submit - aio_gdpr_no_ips_admin_submit
add_action('wp_ajax_aio_gdpr_no_ips_admin_submit', 'aio_gdpr_no_ips_admin_submit_action');
function aio_gdpr_no_ips_admin_submit_action(){

	if(isset($_REQUEST['aiogdpr_no_ip_enabled'])){
		update_option('AIO_GDPR_NO_IP_enabled', '1');
	}else{
		update_option('AIO_GDPR_NO_IP_enabled', '0');
	}

	if(isset($_REQUEST['aiogdpr_no_ip_default'])){
		update_option('AIO_GDPR_NO_IP_default', $_REQUEST['aiogdpr_no_ip_default']);
	}


	$params = http_build_query(array(
		'page' 		=> 'no_comment_ip_addresses',
		'success' 	=> '1',
	));
	$url = admin_url('/options-general.php') .'?'. $params;
	header('Location: '. $url);
	die;
}

// Pruge - aio_gdpr_no_ips_purge
add_action('wp_ajax_aio_gdpr_no_ips_purge', 'aio_gdpr_no_ips_purge_action');
function aio_gdpr_no_ips_purge_action() {
	global $wpdb;
	
	$rowsAffected = $wpdb->query(
        $wpdb->prepare("
			UPDATE {$wpdb->comments}
			SET comment_author_IP = %s
		",
		array(
			get_option('AIO_GDPR_NO_IP_default')
       	)
    ));


    $params = http_build_query(array(
		'page' 			=> 'no_comment_ip_addresses',
		'rows_affected' => $rowsAffected,
	));
	$url = admin_url('/options-general.php') .'?'. $params;
	header('Location: '. $url);
	die;
}




