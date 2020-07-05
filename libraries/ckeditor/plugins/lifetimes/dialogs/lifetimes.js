/**
 * The abbr dialog definition.
 *
 * Created out of the CKEditor Plugin SDK:
 * http://docs.ckeditor.com/#!/guide/plugin_sdk_sample_1
 */

// Our dialog definition.
CKEDITOR.dialog.add( 'lifetimesDialog', function( editor ) {
	return {

		// Basic properties of the dialog window: title, minimum size.
		title: 'Registrar Nota de Vigencia',
		minWidth: 400,
		minHeight: 200,

		// Dialog window contents definition.
		contents: [
			{
				// Definition of the Basic Settings dialog tab (page).
				id: 'tab-basic-note',
				label: 'Nota',

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
							element.setHtml( "<h3>"+this.getValue()+"</h3>" );
						}
					},
					{
						// Text input field for the abbreviation title (explanation).
						type: 'textarea',
						id: 'resumen',
						label: 'Nota de Vigencia',
						validate: CKEDITOR.dialog.validate.notEmpty( "La nota de vigencia es obligatoria." ),

						// Called by the main setupContent call on dialog initialization.
						setup: function( element ) {
							// this.setValue( element.getAttribute( "title" ) );
							this.setValue("");
						},

						// Called by the main commitContent call on dialog confirmation.
						commit: function( element ) {
							var hi_old_content = element.getHtml();
							element.setHtml( hi_old_content+"<div><p>"+this.getValue()+"</p></div>" );
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
			element = editor.document.createElement( 'div' );

				// Flag the insertion mode for later use.
			//this.insertMode = true;
			//}
			//else
			//this.insertMode = false;
				
			
			element.innerHtml = selection.getSelectedText();
			element.setAttribute( "class", "hi_control_accordion" );
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