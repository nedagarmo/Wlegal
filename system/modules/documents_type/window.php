<script type="text/javascript" src="modules/documents_type/javascripts/functions.js"></script>

<div id="window_documents_type" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="../images/desktop/icons/officials/64/Edit.png" />
            Tipo de Documentos
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_documents_type" class="window_close"></a>
          </span>
        </div>
        <div class="abs window_content">
            <div class="window_aside">
				M&oacute;dulo de administración de Tipos de Documentos.
			</div>
			<div class="window_main">
				<div class="filtering">
					<form>
						Tipo de Documento: <input type="text" name="document_type_name" id="document_type_name" />
						<button type="submit" id="document_type_search_records">Buscar</button>
					</form>
				</div>
				<div id="documents_type_table_container"></div>
			</div>
        </div>
        <div class="abs window_bottom">
          Listo
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
</div>