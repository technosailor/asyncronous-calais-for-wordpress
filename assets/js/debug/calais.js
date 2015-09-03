(function($){
	var AsyncCalais = {

		getTags: function() {
			var content = '';
			if (typeof tinyMCE != 'undefined' && tinyMCE.activeEditor != null && tinyMCE.activeEditor.isHidden() == false) {
				content = tinyMCE.activeEditor.getContent();
			}
			content = $('#content').text();

			if( 0 === content.length ) {
				return false;
			}
			console.debug(asyncCalais.ajaxurl);
			$.post( asyncCalais.ajaxurl, {
				nonce: asyncCalais.nonce,
				action: 'get_calais_tags',
				content: content
			}, function( data ) {
				console.debug( data );
			} );
		}
	};

	jQuery( document ).ready( function( $ ) {
		AsyncCalais.getTags();
	} );
})(jQuery);