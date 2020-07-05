<?php
/**
 * Clase de servidor que ejecuta operaciones crud sobre la tabla.
 *
 * @author Nelson D. Garzón M.
 */
 
extract($_REQUEST);
include_once(dirname(__FILE__) . '/../data.access.objects/documents.dao.class.php');

$dao = new documents();

$result = $dao->get_document_search_autocomplete($term);
$rows = array();
while (!$result->EOF){				
	$rows[] = $result->fields;
	$result->MoveNext();
}

print json_encode($rows);
?>