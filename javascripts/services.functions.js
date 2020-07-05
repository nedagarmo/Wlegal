$(function() { 
    $("#txtDocumentSearchRef").autocomplete({
      source: "../server.classes/documents.autocomplete.server.class.php",
      minLength: 3,
      select: function( event, ui ) {
        if(ui.item)
		{
			$.ajax({
				async: false,
				url: '../server.classes/document.content.server.class.php',
				type: 'POST',
				data: {document : ui.item.id},
				success: function(data) {
					$('#document_preview_content').html(data);
					$('#txtDocumentIdReference').val(ui.item.id);
					make_accordions();
				}
			});
		}
      }
    });
});