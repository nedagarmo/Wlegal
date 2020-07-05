<?php

/**
 * Clase de métodos de inserción, modificación, eliminación y consulta sobre la tabla usuarios
 *
 * @author Nelson D. Garzón M.
 */
 
include_once(dirname(__FILE__) . '/../data.bases/connection.mysql.class.php');

class relations {
    private $conn;
    
    function relations()
    {
        $this->conn = new connection();        
    }
    
	function get_all_count_relations()
    {
        $record_set = $this->conn->db->Execute('SELECT COUNT(*) FROM relacion');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function get_all_relations_list()
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM relacion');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
    function get_all_relations($order, $index, $page)
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM relacion ORDER BY '.$order.' LIMIT '.$index.','.$page);
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function search_relations($name)
    {
        $record_set = $this->conn->db->Execute('SELECT id, nombre FROM relacion WHERE nombre = ?', array($name));
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
	
	function get_relation($name)
    {
		$record_set = $this->conn->db->Execute('SELECT * FROM relacion WHERE nombre = ?', array($name));
			
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function get_relation_search($name = "", $order, $index, $page)
    {
		if(!empty($name)){
			$record_set = $this->conn->db->Execute('SELECT * FROM relacion WHERE nombre LIKE ? ORDER BY '.$order.' LIMIT '.$index.','.$page, array("%".$name."%"));
		}else{
			$record_set = $this->conn->db->Execute('SELECT * FROM relacion ORDER BY '.$order.' LIMIT '.$index.','.$page);
		}
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function insert_relation($name)
    {
        return $this->conn->db->Execute('INSERT INTO relacion(nombre) VALUES(?) ', 
			   array($name));
    }
	
	function update_relation($id, $name)
    {
        return $this->conn->db->Execute('UPDATE relacion SET nombre = ? WHERE id = ? ', 
			   array($name, $id));
    }
    
    function delete_relation($id)
    {
        return $this->conn->db->Execute('DELETE FROM relacion WHERE id = ?', array($id));
    }
}
?>
