<?php

/**
 * Clase de métodos de inserción, modificación, eliminación y consulta sobre la tabla usuarios
 *
 * @author Nelson D. Garzón M.
 */
 
include_once(dirname(__FILE__) . '/../data.bases/connection.mysql.class.php');

class authors {
    private $conn;
    
    function authors()
    {
        $this->conn = new connection();        
    }
    
	function get_all_count_authors()
    {
        $record_set = $this->conn->db->Execute('SELECT COUNT(*) FROM autor');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function get_all_authors_list()
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM autor ORDER BY nombre ASC ');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
    function get_all_authors($order, $index, $page)
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM autor ORDER BY '.$order.' LIMIT '.$index.','.$page);
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function search_authors($name)
    {
        $record_set = $this->conn->db->Execute('SELECT id, nombre FROM autor WHERE nombre = ?', array($name));
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
	
	function get_author($name)
    {
		$record_set = $this->conn->db->Execute('SELECT * FROM autor WHERE nombre LIKE ?', array($name));
			
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function get_author_search($name = "", $order, $index, $page)
    {
		if(!empty($name)){
			$record_set = $this->conn->db->Execute('SELECT * FROM autor WHERE nombre LIKE ? ORDER BY '.$order.' LIMIT '.$index.','.$page, array("%".$name."%"));
		}else{
			$record_set = $this->conn->db->Execute('SELECT * FROM autor ORDER BY '.$order.' LIMIT '.$index.','.$page);
		}
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function insert_author($name)
    {
        return $this->conn->db->Execute('INSERT INTO autor(nombre) VALUES(?) ', 
			   array($name));
    }
	
	function update_author($id, $name)
    {
        return $this->conn->db->Execute('UPDATE autor SET nombre = ? WHERE id = ? ', 
			   array($name, $id));
    }
    
    function delete_author($id)
    {
        return $this->conn->db->Execute('DELETE FROM autor WHERE id = ?', array($id));
    }
}
?>
