<?php

namespace Technosailor\Calais\Admin;

use Technosailor\Calais\Utilities as Utilities;

function enqueue() {
	$script_src = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? ASYNC_CALAIS_URL . 'assets/js/debug/calais.js' : ASYNC_CALAIS_URL . 'assets/js/min/calais.min.js';

	wp_register_script( 'async-calais', $script_src, array( 'jquery' ) );
	wp_localize_script( 'async-calais', 'asyncCalais', array(
		'ajaxurl'           => '/wp-admin/admin-ajax.php',
		'nonce'             => wp_create_nonce( 'async-calais-content_send_nonce' )
	) );
	if( 'post' === get_current_screen()->base ) {
		wp_enqueue_script( 'async-calais' );
	}
}

function save() {

	if( ! isset( $_POST['_calais_apikey_nonce'] ) ) {
		return false;
	}

	if( ! wp_verify_nonce( $_POST['_calais_apikey_nonce'], 'calais_apikey' ) ) {
		return false;
	}

	if( ! isset( $_POST['calais_token' ] ) ) {
		return false;
	}

	$token = Utilities\sanitize_key( $_POST['calais_token'] );
	update_option( 'calais_token', $token );
}

function admin_settings() {
	add_settings_section( 'async_calais_settings', __( 'Calais Settings', 'asynccalais' ), 'Technosailor\\Calais\\Admin\\settings_html', 'writing' );
}

function settings_html() {
	echo '<table class="form-table">';
		echo '<tbody>';
			echo '<tr>';
				echo '<th scope="row">';
					echo sprintf( '<label for="calais_token">%s</label>', esc_html( __( 'Calais API Key', 'asynccalais' ) ) );
				echo '</th>';
				echo '<td>';
					echo sprintf( '<input type="text" class="regular-text ltr" value="%s" name="calais_token" id="calais_token">', get_option( 'calais_token' ) );
				echo '</td>';
				echo sprintf( '<input type="hidden" name="_calais_apikey_nonce" value="%s">', wp_create_nonce( 'calais_apikey' ) );
			echo '</tr>';
		echo '</tbody>';
	echo '</table>';
}