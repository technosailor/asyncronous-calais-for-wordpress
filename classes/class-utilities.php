<?php

namespace Technosailor\Calais\Utilities;

function sanitize_key( $key ) {
	return preg_replace( '/([^A-Za-z0-9]*)/', '', $key );
}