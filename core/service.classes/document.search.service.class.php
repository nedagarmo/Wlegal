<html>
<head>
	<meta charset="UTF-8">
	<title>.:: Buscador de Documentos ::.</title>
	<style type="text/css">
		.paginate {
			font-family: Arial, Helvetica, sans-serif;
			font-size: .7em;
		}

		a.paginate {
			border: 1px solid #000080;
			padding: 2px 6px 2px 6px;
			text-decoration: none;
			color: #000080;
		}

		a.paginate:hover {
			background-color: #000080;
			color: #FFF;
			text-decoration: underline;
		}

		a.current {
			border: 1px solid #000080;
			font: bold .7em Arial,Helvetica,sans-serif;
			padding: 2px 6px 2px 6px;
			cursor: default;
			background:#000080;
			color: #FFF;
			text-decoration: none;
		}

		span.inactive {
			border: 1px solid #999;
			font-family: Arial, Helvetica, sans-serif;
			font-size: .7em;
			padding: 2px 6px 2px 6px;
			color: #999;
			cursor: default;
		}
	</style>
</head>
<body>
<!-- Buscador -->
	<div style="margin: 0 auto; width: 300px; text-align: center;" >
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="frmSearch" name="frmSearch" method="POST">
			<img style="width: 120px;" src="../../images/finder/logo.png" /><br />
			<img style="width: 120px;" src="../../images/finder/back_2.png" /><br /><br />
		
			<label for="q">Buscar:</label>
			<input type="text" name="q" id="q">
			<input type="submit" value="Buscar" name="btnBuscar" id="btnBuscar"><br />
			<a href="#">B&uacute;squeda Avanzada</a>
			<div id="panel_avanced_search">
				
			</div>
		</form>
	</div>
	<br />

<!-- Fin Buscador -->

<?php
	extract($_REQUEST);
	include_once("../../libraries/paginator/paginator.class.php");
	include_once("../data.bases/simple.connection.class.php");
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	  }
	
	$pages = new Paginator();
	
	if(isset($btnBuscar) || isset($topic))
	{
		$select = " SELECT d.*, t.nombre as nombre_tema, td.nombre as nombre_tipo
					FROM documento d INNER JOIN tema t ON d.tema = t.id
					INNER JOIN subtema s ON d.subtema = s.id
					INNER JOIN tipo_documento td ON d.tipo = td.id 
					INNER JOIN autor a ON d.autor = a.id";
				
		if(isset($topic))
		{
			$where = " WHERE d.tema = ".$topic."
					   ORDER BY d.tipo ASC ";
		}
		else
		{
			$where = " WHERE d.numero LIKE '%".$q."%' OR d.resumen LIKE '%".$q."%' OR intervienen LIKE '%".$q."%' 
					   OR d.contenido LIKE '%".$q."%'
					   ORDER BY d.tipo ASC ";
		}
		
		/* Paginador */
		
		$pages->mid_range = 10;
		$select_paginator = " SELECT COUNT(d.*)
							FROM documento d INNER JOIN tema t ON d.tema = t.id
							INNER JOIN subtema s ON d.subtema = s.id
							INNER JOIN tipo_documento td ON d.tipo = td.id 
							INNER JOIN autor a ON d.autor = a.id ";
		$sql_paginator = $select." ".$where;
		$pages->items_total = mysqli_num_rows(mysqli_query($conn, $sql_paginator));
		$pages->paginate();
		
		/* Fin Paginador */
		
		$sql = $select." ".$where." ".$pages->limit;
		$exe = mysqli_query($conn, $sql);		
		
		$counter = 0;
		?>
		<div style="background-color: #C0C0C0; opacity: 0.5; padding: 5px 5px 5px 10px;">
			Resultados para &laquo;
			<strong>
			<?php
				if(isset($topic)){
					$sql_topic = "SELECT * FROM tema WHERE id = ".$topic;
					$exe_topic = mysqli_query($sql_topic);
					$row_topic = mysqli_fetch_array($exe_topic);
					echo $row_topic['nombre'];
				}else{
					echo $q;
				}
			?>
			</strong>
			&raquo;
		</div>
		<?php
		while($row = mysqli_fetch_array($exe)){
			if($counter % 2 == 0) 
				$bgcolor = "#f8f8f8";
			else 
				$bgcolor = "fefefe";
			?>
			<div style="border: 1px solid #bbbbbb; background-color: <?php echo $bgcolor; ?>; padding: 10px;">
				<span><strong>&raquo;</strong> <a href="view.document.php?document=<?php echo $row['id']; ?>" title="Documento Número <?php echo $row['numero']; ?>"><?php echo $row['nombre_tipo']." ".$row['numero']; ?></a></span><br />
				<p style="text-align : justify; width: 600px;"><?php echo substr($row['resumen'], 0, 400)."..."; ?></p>
				<div><a href="<?php echo $_SERVER['PHP_SELF']; ?>?topic=<?php echo $row['tema']; ?>"><?php echo $row['nombre_tema']; ?></a></div>				
			</div>
			<hr />
			<?php
			$counter ++;
		}
		echo $pages->display_pages();
		echo "<hr />";
	}
?>
</body>
</html>