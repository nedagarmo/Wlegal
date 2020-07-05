/**
 * Basic sample plugin inserting abbreviation elements into CKEditor editing area.
 *
 * Created out of the CKEditor Plugin SDK:
 * http://docs.ckeditor.com/#!/guide/plugin_sdk_sample_1
 */

// Register the plugin within the editor.
CKEDITOR.plugins.add( 'internalref', {

	// Register the icons.
	icons: 'internalref',

	// The plugin initialization logic goes inside this method.
	init: function( editor ) {

		// Define an editor command that opens our dialog.
		editor.addCommand( 'internalref', new CKEDITOR.dialogCommand( 'internalrefDialog' ) );

		// Create a toolbar button that executes the above command.
		editor.ui.addButton( 'InternalRef', {

			// The text part of the button (if available) and tooptip.
			label: 'Vincular Documento',

			// The command to execute on click.
			command: 'internalref',

			// The button placement in the toolbar (toolbar group name).
			toolbar: 'insert'
		});

		if ( editor.contextMenu ) {
			editor.addMenuGroup( 'internalrefGroup' );
			editor.addMenuItem( 'internalrefItem', {
				label: 'Edit Abbreviation',
				icon: this.path + 'icons/internalref.png',
				command: 'internalref',
				group: 'internalrefGroup'
			});

			editor.contextMenu.addListener( function( element ) {
				if ( element.getAscendant( 'internalref', true ) ) {
					return { abbrItem: CKEDITOR.TRISTATE_OFF };
				}
			});
		}

		// Register our dialog file. this.path is the plugin folder path.
		CKEDITOR.dialog.add( 'internalrefDialog', this.path + 'dialogs/internalref.js' );
	}
});

