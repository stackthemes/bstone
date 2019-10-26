jQuery( document ).ready( function( $ ) {
	
	$( document ).on( 'click', '.bst-upload-image-cnt button', function(e) {

		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		wp.media.editor.send.attachment = function(props, attachment) {
			$(button).prev().val(attachment.url);
			$(button).prev().change();
			wp.media.editor.send.attachment = send_attachment_bkp;
		}
		wp.media.editor.open(button);
		return false;
	});

});