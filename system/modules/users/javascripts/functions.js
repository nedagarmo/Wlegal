// Funciones JS del módulo

// Ejecución posterior al "Load" de la página.
$(document).ready(function () {

	$('#users_table_container').jtable({
		title: 'Lista de Usuarios del Sistema',
		paging: true,
		pageSize: 10,
		sorting: true,
		defaultSorting: 'usuario ASC',
		actions: {
			listAction: '../core/server.classes/users.server.class.php?action=search',
			deleteAction: '../core/server.classes/users.server.class.php?action=delete',
			updateAction: '../core/server.classes/users.server.class.php?action=update',
			createAction: '../core/server.classes/users.server.class.php?action=create'
		},
		fields: {
			id: {
				key: true,
				create: false,
				edit: false,
				list: false
			},
			usuario: {
				title: 'Usuario',
				inputClass: 'validate[required]'
			},
			clave: {
				title: 'Clave',
				inputClass: 'validate[required]',
				type: 'password',
				list: false
			},
			rol: {
				title: 'Rol',
				options: '../core/server.classes/drop.down.lists/ddlroles.server.class.php',
				inputClass: 'validate[required]'
			}
		},
		//Initialize validation logic when a form is created
		formCreated: function (event, data) {
			data.form.validationEngine();
		},
		//Validate form when it is being submitted
		formSubmitting: function (event, data) {
			return data.form.validationEngine('validate');
		},
		//Dispose validation logic when form is closed
		formClosed: function (event, data) {
			data.form.validationEngine('hide');
			data.form.validationEngine('detach');
		}
	});

	//Re-load records when user click 'load records' button.
	$('#search_records').click(function (e) {
		e.preventDefault();
		$('#users_table_container').jtable('load', {
			name: $('#name').val(),
			document: $('#document').val()
		});
	});

	//Load all records when page is first shown
	$('#search_records').click();
});