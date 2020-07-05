<?php include_once("../core/secure.classes/session.validation.secure.class.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1" />
<meta name="description" content="HI Desktop" />
<title>HI .:: M&oacute;dulo Jur&iacute;dico ::.</title>

<!--[if lt IE 7]>
	<script>
		window.top.location = 'ie.html';
	</script>
<![endif]-->

<link rel="stylesheet" href="../stylesheets/reset.css" />
<link rel="stylesheet" href="../stylesheets/desktop.css" />

<!--[if lt IE 9]>
	<link rel="stylesheet" href="../stylesheets/ie.css" />
<![endif]-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/i18n/jquery.ui.datepicker-es.js"></script>
<script>
  !window.jQuery && document.write(unescape('%3Cscript src="../libraries/jquery/jquery.js"%3E%3C/script%3E'));
  !window.jQuery.ui && document.write(unescape('%3Cscript src="../libraries/jquery/jquery.ui.js"%3E%3C/script%3E'));
</script>

<script src="../javascripts/jquery.desktop.js"></script>

<!--  JTable Scripts  -->
<script type="text/javascript" src="../libraries/jtable/jquery.jtable.js"></script>
<script type="text/javascript" src="../libraries/jtable/localization/jquery.jtable.es.js"></script>
<link href="../libraries/jtable/themes/lightcolor/gray/jtable.css" rel="stylesheet" type="text/css" />
<link href="../libraries/jtable/themes/jqueryui/jtable_jqueryui.css" rel="stylesheet" type="text/css" />
<link href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

<!-- Import CSS file for validation engine (in Head section of HTML) -->
<link href="../libraries/jvalidation_engine/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
 
<!-- Import Javascript files for validation engine (in Head section of HTML) -->
<script type="text/javascript" src="../libraries/jvalidation_engine/js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="../libraries/jvalidation_engine/js/languages/jquery.validationEngine-es.js"></script>

<!-- Import Javascript CKEditor -->
<script type="text/javascript" src="../libraries/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../libraries/ckeditor/adapters/jquery.js"></script>

<script>
	/*jQuery.ajaxSetup({
        // Disable caching of AJAX responses 
        cache: false
    });*/
	
	/*$(function () {
		$.datepicker.setDefaults($.datepicker.regional["es"]);
		$(".hasDatepicker").datepicker({
			changeYear: true
		});
	});*/
</script>

</head>
<body>
	<div class="abs" id="wrapper">
		<div class="abs" id="desktop">

			<!--   Iconos del escritorio   -->
			
			<a class="abs icon" style="left:20px;top:20px;" href="#icon_dock_users">
			  <img src="../images/desktop/icons/officials/64/Users.png" />
			  Usuarios
			</a>
			<a class="abs icon" style="left:20px;top:100px;" href="#icon_dock_topics">
			  <img src="../images/desktop/icons/officials/64/Database.png" />
			  Temas
			</a>
			<a class="abs icon" style="left:20px;top:180px;" href="#icon_dock_subs">
			  <img src="../images/desktop/icons/officials/64/Chat.png" />
			  Subtemas
			</a>
			<a class="abs icon" style="left:20px;top:260px;" href="#icon_dock_authors">
			  <img src="../images/desktop/icons/officials/64/Settings.png" />
			  Autores
			</a>
			<a class="abs icon" style="left:20px;top:340px;" href="#icon_dock_documents_type">
			  <img src="../images/desktop/icons/officials/64/Edit.png" />
			  Tipos de Documentos
			</a>
			<a class="abs icon" style="left:20px;top:440px;" href="#icon_dock_relations">
			  <img src="../images/desktop/icons/officials/64/Register.png" />
			  Relaciones
			</a>
			<a class="abs icon" style="left:120px;top:20px;" href="#icon_dock_documents">
			  <img src="../images/desktop/icons/officials/64/Add.png" />
			  Documentos
			</a>
			
			<!--   Fin Iconos del escritorio   -->

			<!-- Ventanas -->
			
			<?php include_once('modules/users/window.php'); ?>
			<?php include_once('modules/topics/window.php'); ?>
			<?php include_once('modules/subs/window.php'); ?>
			<?php include_once('modules/authors/window.php'); ?>
			<?php include_once('modules/documents_type/window.php'); ?>
			<?php include_once('modules/relations/window.php'); ?>
			<?php include_once('modules/documents/window.php'); ?>
			
			<!-- Fin Ventanas -->

		</div>
		
		<!-- Menu -->
		<div class="abs" id="bar_top">
			<span class="float_right" id="clock"></span>
			<ul>
				<li>
					<a class="menu_trigger" href="#">Programas</a>
					<ul class="menu">
						<li>
							<a href="#icon_dock_topics" class="lnk_window">Temas</a>
						</li>
						<li>
							<a href="#icon_dock_subs" class="lnk_window">Subtemas</a>
						</li>
						<li>
							<a href="#icon_dock_authors" class="lnk_window">Autores</a>
						</li>
						<li>
							<a href="#icon_dock_documents_type" class="lnk_window">Tipos de Documentos</a>
						</li>
						<li>
							<a href="#icon_dock_relations" class="lnk_window">Relaciones</a>
						</li>
						<li>
							<a href="#icon_dock_documents" class="lnk_window">Documentos</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="menu_trigger" href="#">Panel de Control</a>
					<ul class="menu">
						<li>
							<a href="#icon_dock_users" class="lnk_window">Usuarios</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="menu_trigger" href="#">Sistema</a>
					<ul class="menu">
						<li>
							<a href="#" onclick="system_exit(); return false;" target="_self">Salir</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- Fin Menu -->
		
		<!-- Barra de tareas -->
		<div class="abs" id="bar_bottom">
			<a class="float_left" href="#" id="show_desktop" title="Show Desktop">
				<img src="../images/desktop/icons/icon_22_desktop.png" />
			</a>
			<ul id="dock">
				<li id="icon_dock_users">
					<a href="#window_users">
						<img src="../images/desktop/icons/officials/32/Users.png" />
						Usuarios
					</a>
				</li>
				<li id="icon_dock_topics">
					<a href="#window_topics">
						<img src="../images/desktop/icons/officials/32/Database.png" />
						Temas
					</a>
				</li>
				<li id="icon_dock_subs">
					<a href="#window_subs">
						<img src="../images/desktop/icons/officials/32/Chat.png" />
						Subtemas
					</a>
				</li>
				<li id="icon_dock_authors">
					<a href="#window_authors">
						<img src="../images/desktop/icons/officials/32/Settings.png" />
						Autores
					</a>
				</li>
				<li id="icon_dock_documents_type">
					<a href="#window_documents_type">
						<img src="../images/desktop/icons/officials/32/Edit.png" />
						Tipos de Documentos
					</a>
				</li>
				<li id="icon_dock_relations">
					<a href="#window_relations">
						<img src="../images/desktop/icons/officials/32/Register.png" />
						Relaciones
					</a>
				</li>
				<li id="icon_dock_documents">
					<a href="#window_documents">
						<img src="../images/desktop/icons/officials/32/Add.png" />
						Documentos
					</a>
				</li>
			</ul>
			<a class="float_right" href="#" title="&copy; Todos los derechos reservados">
				<img src="../favicon.ico" />
			</a>
		</div>
		<!-- Fin Barra de tareas -->
		
		
	</div>
	<!-- Servicios -->
		<div id="hi_modal_popup_boxes">
			<div id="hi_modal_popup_dialog" class="hi_modal_popup_window">
				<b>Buscar Documento</b><br /><br />
				<?php include_once("../core/service.classes/document.preview.service.class.php"); ?>
				<!-- close button is defined as close class -->
				<a href="#" class="hi_modal_popup_close">Cerrar</a>
			</div>
			<div id="hi_modal_popup_mask"></div>
		</div>
		<!-- Fin Servicios -->
</body>
</html>