<html>
	<head>
		<title>.:: Ver Documento ::.</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
		<script src="../../../javascripts/services.functions.js"></script>
		<link href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
		<style>
			.ui-widget {
				font-family: Verdana,Arial,sans-serif/*{ffDefault}*/;
				font-size: 0.8em/*{fsDefault}*/;
			}
		</style>
		<script>
			
			$(document).ready(function(){
				$("a").attr({target: "_blank"});
			});
			
			function make_accordions() {
				$( ".hi_control_accordion" ).accordion({
				  collapsible: true,
				  event: "click hoverintent",
				  active: false
				});
			}			
		   
		   /*
		   * hoverIntent | Copyright 2011 Brian Cherne
		   * http://cherne.net/brian/resources/jquery.hoverIntent.html
		   * modified by the jQuery UI team
		   */
		  $.event.special.hoverintent = {
			setup: function() {
			  $( this ).bind( "mouseover", jQuery.event.special.hoverintent.handler );
			},
			teardown: function() {
			  $( this ).unbind( "mouseover", jQuery.event.special.hoverintent.handler );
			},
			handler: function( event ) {
			  var currentX, currentY, timeout,
				args = arguments,
				target = $( event.target ),
				previousX = event.pageX,
				previousY = event.pageY;
		 
			  function track( event ) {
				currentX = event.pageX;
				currentY = event.pageY;
			  };
		 
			  function clear() {
				target
				  .unbind( "mousemove", track )
				  .unbind( "mouseout", clear );
				clearTimeout( timeout );
			  }
		 
			  function handler() {
				var prop,
				  orig = event;
		 
				if ( ( Math.abs( previousX - currentX ) +
					Math.abs( previousY - currentY ) ) < 7 ) {
				  clear();
		 
				  event = $.Event( "hoverintent" );
				  for ( prop in orig ) {
					if ( !( prop in event ) ) {
					  event[ prop ] = orig[ prop ];
					}
				  }
				  // Prevent accessing the original event since the new event
				  // is fired asynchronously and the old event is no longer
				  // usable (#6028)
				  delete event.originalEvent;
		 
				  target.trigger( event );
				} else {
				  previousX = currentX;
				  previousY = currentY;
				  timeout = setTimeout( handler, 100 );
				}
			  }
		 
			  timeout = setTimeout( handler, 100 );
			  target.bind({
				mousemove: track,
				mouseout: clear
			  });
			}
		  };
		</script>
	</head>
	<body>
		<!--<h2>B&uacute;squeda r&aacute;pida de documentos</h2><br />
		<div style="visibility: hidden;">
			<label for="txtDocumentSearchRef">Documento (N&uacute;mero / Resumen / Contenido) :</label>
			<input type="text" name="txtDocumentSearchRef" id="txtDocumentSearchRef" />
		</div>
		<hr />
		<br />
		<input type="hidden" name="txtDocumentIdReference" id="txtDocumentIdReference" />-->
		<div id="document_preview_content" style="margin: 20px 7px 0 7px; padding: 7px; border-width: 5px; border-style: double; height: 620px; overflow: auto;" >
			<?php
				include_once(dirname(__FILE__).'/../server.classes/document.content.server.class.php');
			?>
		</div>
		<script>
			make_accordions();
		</script>
	</body>
</html>