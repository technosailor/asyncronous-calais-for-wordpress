<?php

namespace Technosailor\Calais\Admin;

function enqueue() {
	$script_src = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? ASYNC_CALAIS_URL . 'assets/js/debug/calais.js' : ASYNC_CALAIS_URL . 'assets/js/min/calais.min.js';

	wp_register_script( 'async-calais', $script_src, array( 'jquery' ) );
	wp_localize_script( 'async-calais', 'asyncCalais', array(
		'ajaxurl'           => admin_url( '/admin-ajax-php' ),
		'nonce'             => wp_create_nonce( 'async-calais-content_send_nonce' )
	) );
	if( 'post' === get_current_screen()->base ) {
		wp_enqueue_script( 'async-calais' );
	}
}