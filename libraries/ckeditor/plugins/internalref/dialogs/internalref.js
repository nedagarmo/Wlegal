/**
 * The abbr dialog definition.
 *
 * Created out of the CKEditor Plugin SDK:
 * http://docs.ckeditor.com/#!/guide/plugin_sdk_sample_1
 */

function documents_relations_list(){
	var result = new Array(); 

    $.ajax({
        async: false,
        url: '../core/server.classes/drop.down.lists/ddlrelations.server.class.php',
        type: 'POST',
        success: function(data) {
            result = eval(data);
        }
    });
    return result; 
}
 
// Our dialog definition.
CKEDITOR.dialog.add( 'internalrefDialog', function( editor ) {
	return {

		// Basic properties of the dialog window: title, minimum size.
		title: 'Vincular Documento',
		minWidth: 400,
		minHeight: 200,

		// Dialog window contents definition.
		contents: [
			{
				// Definition of the Basic Settings dialog tab (page).
				id: 'tab-basic',
				label: 'Vinculación Básica',

				// The tab contents.
				elements: [
					{
						// Text input field for the abbreviation text.
						type: 'text',
						id: 'href',
						label: 'Texto del Enlace',

						// Validation checking whether the field is not empty.
						validate: CKEDITOR.dialog.validate.notEmpty( "El texto del enlace es obligatorio." ),

						// Called by the main setupContent call on dialog initialization.
						setup: function( element ) {
							this.setValue( element.innerHtml );
						},

						// Called by the main commitContent call on dialog confirmation.
						commit: function( element ) {
							element.setText( this.getValue() );
						}
					},
					{
						// Text input field for the abbreviation title (explanation).
						type: 'text',
						id: 'create_relation_document',
						label: 'Documento',
						
						// Validation checking whether the field is not empty.
						validate: CKEDITOR.dialog.validate.notEmpty( "Elegir el documento es obligatorio." ),
						
						// Called by the main setupContent call on dialog initialization.
						setup: function( element ) {
							// this.setValue( element.getAttribute( "href" ).substring(element.getAttribute( "href" ).indexOf("=")) );
							this.setValue("");
						},

						// Called by the main commitContent call on dialog confirmation.
						commit: function( element ) {
							element.setAttribute( "href", "view.document.php?id=" + this.getValue() );
						}
					},
					{
						type : 'button',
						id : 'search_docs',
						label : 'Buscar Documento',
						title : 'Buscar Ahora',
						onClick : function() {
							// $( "#service_document_search" ).dialog("open");
							$('a[name=hi_modal_popup_modal]').click();
						}
					},
					{
						// Text input field for the abbreviation title (explanation).
						type: 'select',
						id: 'relation',
						label: 'Tipo de Relación',
						items : documents_relations_list(),
						
						validate: CKEDITOR.dialog.validate.notEmpty( "El tipo de relación es obligatorio." ),
						
						// Called by the main setupContent call on dialog initialization.
						setup: function( element ) {
							// this.setValue( element.getAttribute( "doc_relation" ) );
							this.setValue("");
						},

						// Called by the main commitContent call on dialog confirmation.
						commit: function( element ) {
							element.setAttribute( "doc_relation", this.getValue() );
						}
					},
					{
						// Text input field for the abbreviation title (explanation).
						type: 'textarea',
						id: 'resumen',
						label: 'Comentario',
						validate: CKEDITOR.dialog.validate.notEmpty( "El comentario de la relación es obligatorio." ),

						// Called by the main setupContent call on dialog initialization.
						setup: function( element ) {
							// this.setValue( element.getAttribute( "title" ) );
							this.setValue("");
						},

						// Called by the main commitContent call on dialog confirmation.
						commit: function( element ) {
							element.setAttribute( "title", this.getValue() );
						}
					}
				]
			}
		],

		// Invoked when the dialog is loaded.
		onShow: function() {

			// Get the selection in the editor.
			var selection = editor.getSelection();
			
			//alert(selection.getSelectedText());

			// Get the element at the start of the selection.
			//var element = selection.getStartElement();

			// Get the <a> element closest to the selection, if any.
			//if ( element )
			//	element = element.getAscendant( 'a', true );

			// Create a new <a> element if it does not exist.
			//if ( !element || element.getName() != 'a' ) {
			element = editor.document.createElement( 'a' );

				// Flag the insertion mode for later use.
			//this.insertMode = true;
			//}
			//else
			//this.insertMode = false;
				
			
			element.innerHtml = selection.getSelectedText();
			// Store the reference to the <abbr> element in an internal property, for later use.
			this.element = element;

			// Invoke the setup methods of all dialog elements, so they can load the element attributes.
			// if ( !this.insertMode )
			this.setupContent( element );
		},

		// This method is invoked once a user clicks the OK button, confirming the dialog.
		onOk: function() {

			// The context of this function is the dialog object itself.
			// http://docs.ckeditor.com/#!/api/CKEDITOR.dialog
			var dialog = this;

			// Creates a new <abbr> element.
			var abbr = this.element;

			// Invoke the commit methods of all dialog elements, so the <abbr> element gets modified.
			this.commitContent( abbr );

			// Finally, in if insert mode, inserts the element at the editor caret position.
			// if ( this.insertMode )
			editor.insertElement( abbr );
		}
	};
});