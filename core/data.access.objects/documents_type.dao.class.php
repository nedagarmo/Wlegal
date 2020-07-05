<?php

/**
 * Clase de métodos de inserción, modificación, eliminación y consulta sobre la tabla usuarios
 *
 * @author Nelson D. Garzón M.
 */
 
include_once(dirname(__FILE__) . '/../data.bases/connection.mysql.class.php');

class documents_type {
    private $conn;
    
    function documents_type()
    {
        $this->conn = new connection();        
    }
    
	function get_all_count_documents_type()
    {
        $record_set = $this->conn->db->Execute('SELECT COUNT(*) FROM tipo_documento');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function get_all_documents_type_list()
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM tipo_documento');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
    function get_all_documents_type($order, $index, $page)
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM tipo_documento ORDER BY '.$order.' LIMIT '.$index.','.$page);
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function search_documents_type($name)
    {
        $record_set = $this->conn->db->Execute('SELECT id, nombre FROM tipo_documento WHERE nombre = ?', array($name));
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
	
	function get_document_type($name)
    {
		$record_set = $this->conn->db->Execute('SELECT * FROM tipo_documento WHERE nombre LIKE ?', array($name));
			
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function get_document_type_search($name = "", $order, $index, $page)
    {
		if(!empty($name)){
			$record_set = $this->conn->db->Execute('SELECT * FROM tipo_documento WHERE nombre LIKE ? ORDER BY '.$order.' LIMIT '.$index.','.$page, array("%".$name."%"));
		}else{
			$record_set = $this->conn->db->Execute('SELECT * FROM tipo_documento ORDER BY '.$order.' LIMIT '.$index.','.$page);
		}
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function insert_document_type($name)
    {
        return $this->conn->db->Execute('INSERT INTO tipo_documento(nombre) VALUES(?) ', 
			   array($name));
    }
	
	function update_document_type($id, $name)
    {
        return $this->conn->db->Execute('UPDATE tipo_documento SET nombre = ? WHERE id = ? ', 
			   array($name, $id));
    }
    
    function delete_document_type($id)
    {
        return $this->conn->db->Execute('DELETE FROM tipo_documento WHERE id = ?', array($id));
    }
}
?>
