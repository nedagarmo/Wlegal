/**
 * Basic sample plugin inserting abbreviation elements into CKEditor editing area.
 *
 * Created out of the CKEditor Plugin SDK:
 * http://docs.ckeditor.com/#!/guide/plugin_sdk_sample_1
 */

// Register the plugin within the editor.
CKEDITOR.plugins.add( 'lifetimes', {

	// Register the icons.
	icons: 'lifetimes',

	// The plugin initialization logic goes inside this method.
	init: function( editor ) {

		// Define an editor command that opens our dialog.
		editor.addCommand( 'lifetimes', new CKEDITOR.dialogCommand( 'lifetimesDialog' ) );

		// Create a toolbar button that executes the above command.
		editor.ui.addButton( 'LifeTimes', {

			// The text part of the button (if available) and tooptip.
			label: 'Registrar Vigencia',

			// The command to execute on click.
			command: 'lifetimes',

			// The button placement in the toolbar (toolbar group name).
			toolbar: 'insert'
		});

		if ( editor.contextMenu ) {
			editor.addMenuGroup( 'lifetimesGroup' );
			editor.addMenuItem( 'lifetimesItem', {
				label: 'Insertar Vigencia',
				icon: this.path + 'icons/lifetimes.png',
				command: 'lifetimes',
				group: 'lifetimesGroup'
			});

			editor.contextMenu.addListener( function( element ) {
				if ( element.getAscendant( 'lifetimes', true ) ) {
					return { abbrItem: CKEDITOR.TRISTATE_OFF };
				}
			});
		}

		// Register our dialog file. this.path is the plugin folder path.
		CKEDITOR.dialog.add( 'lifetimesDialog', this.path + 'dialogs/lifetimes.js' );
	}
});

