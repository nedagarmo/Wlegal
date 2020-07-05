<?php
/**
 * Clase de servidor que ejecuta operaciones crud sobre la tabla.
 *
 * @author Nelson D. Garzón M.
 */
 
extract($_REQUEST);
include_once(dirname(__FILE__) . '/../data.access.objects/documents.dao.class.php');

$dao = new documents();

$result = $dao->update_document_content($document, $content);
if($result)
{
	echo "1";
}
else
{
	echo "0";
}

?>