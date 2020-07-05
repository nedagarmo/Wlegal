// Funciones JS del módulo
function ImprimirObjeto(o) {
  var salida = '';
  for (var p in o) {
    salida += p + ': ' + o[p] + '\n';
  }
  alert(salida);
}

// Ejecución posterior al "Load" de la página.
$(document).ready(function () {

	$('#documents_table_container').jtable({
		title: 'Lista de Documentos',
		paging: true,
		pageSize: 10,
		sorting: true,
		defaultSorting: 'fecha DESC',
		actions: {
			listAction: '../core/server.classes/documents.server.class.php?action=search',
			deleteAction: '../core/server.classes/documents.server.class.php?action=delete',
			updateAction: '../core/server.classes/documents.server.class.php?action=update',
			createAction: '../core/server.classes/documents.server.class.php?action=create'
		},
		fields: {
			id: {
				key: true,
				create: false,
				edit: false,
				list: false
			},
			fecha: {
				title: 'Fecha',
				inputClass: 'validate[required]',
				type: 'date'
			},
			tema: {
				title: 'Tema',
				options: '../core/server.classes/drop.down.lists/ddltopics.server.class.php',
				inputClass: 'validate[required]'
			},
			subtema: {
				title: 'Subtema',
				options: '../core/server.classes/drop.down.lists/ddlsubs.server.class.php'
			},
			tipo: {
				title: 'Tipo',
				options: '../core/server.classes/drop.down.lists/ddltypes.server.class.php',
				inputClass: 'validate[required]'
			},
			numero: {
				title: 'Número',
				inputClass: 'validate[required]'
			},
			autor: {
				title: 'Autor',
				inputClass: 'validate[required]',
				options: '../core/server.classes/drop.down.lists/ddlauthors.server.class.php',
				list: false
			},
			intervienen: {
				title: 'Intervienen',
				type: 'textarea',
				list: false
			},
			resumen: {
				title: 'Resumen',
				type: 'textarea',
				inputClass: 'validate[required]',
				list: false
			},
			resumen_boton: {
                title: 'Resumen',
                display: function(data) {
                     return data.record.resumen.substring(0,200) + "...";
                },
				edit: false,
				create: false				
            },
			contenido: {
				title: 'Contenido',
				type: 'textarea',
				inputClass: 'ckeditor',
				list: false
			}			
		},
		//Initialize validation logic when a form is created
		formCreated: function (event, data) {
			data.form.validationEngine();
			data.form.find('textarea.ckeditor').ckeditor();
			// data.form.find('select[name=tema]').attr('multiple','multiple');
		},
		//Validate form when it is being submitted
		formSubmitting: function (event, data) {
			return data.form.validationEngine('validate');
		},
		//Dispose validation logic when form is closed
		formClosed: function (event, data) {
			data.form.validationEngine('hide');
			data.form.validationEngine('detach');
			// $('#document_search_records').click();
		}
	});

	//Re-load records when user click 'load records' button.
	$('#document_search_records').click(function (e) {
		e.preventDefault();
		$('#documents_table_container').jtable('load', {
			text: $('#document_text').val()
		});
	});

	//Load all records when page is first shown
	$('#document_search_records').click();
});