<!-- Scripts -->
<script type="text/javascript" src="modules/documents/javascripts/functions.js"></script>

<div id="window_documents" class="abs window">
	<div class="abs window_inner">
		<div class="window_top">
		  <span class="float_left">
			<img src="../images/desktop/icons/officials/64/Add.png" />
			Documentos
		  </span>
		  <span class="float_right">
			<a href="#" class="window_min"></a>
			<a href="#" class="window_resize"></a>
			<a href="#icon_dock_documents" class="window_close"></a>
		  </span>
		</div>
		<div class="abs window_content">
		  <div class="window_aside align_center">
			M&oacute;dulo de administración de Documentos.<a href="#hi_modal_popup_dialog" name="hi_modal_popup_modal" style="visibility: hidden;">Buscar Documentos</a>
		  </div>
		  <div class="window_main">
			<div class="filtering">
				<form>
					N&uacute;mero / Resumen / Contenido: <input type="text" name="document_text" id="document_text" />
					<button type="submit" id="document_search_records">Buscar</button>
				</form>
			</div>

			<div id="documents_table_container"></div>
			<hr />
			<div id="result_log"></div>
		  </div>
		</div>
		<div class="abs window_bottom">
		  Listo.
		</div>
	</div>
  <span class="abs ui-resizable-handle ui-resizable-se"></span>
</div>