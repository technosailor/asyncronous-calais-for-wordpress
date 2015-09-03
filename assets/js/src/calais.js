var AsyncCalais = {

	getTags: function() {
		var content = '';
		if (typeof tinyMCE != 'undefined' && tinyMCE.activeEditor != null && tinyMCE.activeEditor.isHidden() == false) {
			content = tinyMCE.activeEditor.getContent();
		}
		content = $('#content').val();
		if( 0 === content.length ) {
			return false;
		}

		//$.post()
	}
}