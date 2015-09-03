<?php

namespace Technosailor\Calais\Api\OpenCalais;

class OpenCalais {

	const METHOD = 'POST';
	const APIURL = 'https://api.thomsonreuters.com/permid/calais';

	protected $_calais_options;

	protected $_token;

	protected $_headers;

	public function __construct() {

		$this->_token  = get_option( 'calais_token', '' );
		$this->_headers = array(
			'X-AG-Access-Token'     => $this->_token,
			'Content-Type'          => 'text/raw',
			'outputformat'          => 'application/json'
		);
	}

	public function send( $content ) {

		$request = wp_remote_request( self::APIURL, array(
			'method'            => self::METHOD,
			'headers'           => $this->_headers,
			'body'              => wp_kses( $content, array() )
		) );

		if( is_wp_error( $request ) ) {
			return $request->get_error_message();
		}

		return wp_remote_retrieve_body( $request );
	}
}