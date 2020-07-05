// Funciones JS del módulo

// Ejecución posterior al "Load" de la página.
$(document).ready(function () {

	$('#topics_table_container').jtable({
		title: 'Lista de Temas',
		paging: true,
		pageSize: 10,
		sorting: true,
		defaultSorting: 'nombre ASC',
		actions: {
			listAction: '../core/server.classes/topics.server.class.php?action=search',
			deleteAction: '../core/server.classes/topics.server.class.php?action=delete',
			updateAction: '../core/server.classes/topics.server.class.php?action=update',
			createAction: '../core/server.classes/topics.server.class.php?action=create'
		},
		fields: {
			id: {
				key: true,
				create: false,
				edit: false,
				list: false
			},
			nombre: {
				title: 'Tema',
				inputClass: 'validate[required]'
			},
			descripcion: {
				title: 'Descripción',
				type: 'textarea'
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
	$('#topic_search_records').click(function (e) {
		e.preventDefault();
		$('#topics_table_container').jtable('load', {
			name: $('#topic_name').val()
		});
	});

	//Load all records when page is first shown
	$('#topic_search_records').click();
});