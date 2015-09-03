(function($){
	var AsyncCalais = {

		getTags: function() {

			var content;
			if ( 'undefined' !== typeof tinyMCE && null !== tinyMCE.activeEditor && false === tinyMCE.activeEditor.isHidden() ) {
				content = tinyMCE.activeEditor.getContent();
			} else {
				content = $( '#content' ).text();
			}

			if( 0 === content.length ) {
				return false;
			}

			$.post( asyncCalais.ajaxurl, {
				nonce: asyncCalais.nonce,
				action: 'get_calais_tags',
				content: content
			}, function( data ) {
				console.debug( data );
			} );
		}
	};

	$( document ).ready( function( $ ) {
		AsyncCalais.getTags();
	} );
})(jQuery);