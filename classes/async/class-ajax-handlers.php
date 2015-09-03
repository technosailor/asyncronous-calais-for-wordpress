<?php

namespace Technosailor\Calais\Async\Ajax;

use Technosailor\Calais\Api as Api;
use Technosailor\Calais\Utilities as Utilities;

function get_tags() {

	if( ! wp_verify_nonce( $_POST['nonce'], 'async-calais-content_send_nonce' ) ) {
		wp_send_json_error( __( 'Invalid nonce', 'asynccalais' ) );
	}

	if( ! isset( $_POST['content' ] ) ) {
		wp_send_json_error( __( 'No Content Sent. There must be content. If you\'re seeing this, it\'s probably because you haven\'t written an article yet. Writing is good. Do that, then come back', 'asynccalais' ) );
	}

	$content = wp_kses( $_POST['content'], array() );

	$calais = new \Technosailor\Calais\Api\OpenCalais();
	$response = $calais->send( $_POST['content'] );

	wp_send_json_success( $response );
}
