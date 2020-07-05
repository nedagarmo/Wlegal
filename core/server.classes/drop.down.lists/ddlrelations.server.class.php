<?php

/**
 * Clase de servidor que devuelve una lista de datos para alimentar un control dropdownlist
 *
 * @author Nelson D. Garzón M.
 */

session_start();
extract($_REQUEST);
include_once(dirname(__FILE__) . '/../../data.access.objects/relations.dao.class.php');

$dao = new relations();
$result = $dao->get_all_relations_list();

if($result != null){
	$rows = "[";
	$counter = 0;
	while (!$result->EOF){
		$rows .= '["'.$result->fields[1].'",';
		$rows .= '"'.$result->fields[0].'"],';
		$result->MoveNext();
	}
    $rows = substr($rows, 0, strlen($rows) - 1)."]";
}else{
	$rows = "[]";
}

print $rows;
?>
