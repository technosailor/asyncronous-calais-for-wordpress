<?php

namespace Technosailor\Calais\Async\Ajax;

function get_tags() {
	wp_send_json_success('foo');
}
add_action( 'wp_ajax_get_calais_tags', 'get_tags' );