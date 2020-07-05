<?php
/**
 * Clase de servidor que ejecuta operaciones crud sobre la tabla.
 *
 * @author Nelson D. Garzón M.
 */
 
extract($_REQUEST);
include_once(dirname(__FILE__) . '/../data.access.objects/documents.dao.class.php');

$dao = new documents();

if(isset($id))
{
	$document = $id;
}

$result = $dao->get_document($document);
while (!$result->EOF){				
	print $result->fields[0];
	$result->MoveNext();
}

?>