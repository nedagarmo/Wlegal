<?php

/**
 * Clase de métodos de inserción, modificación, eliminación y consulta sobre la tabla usuarios
 *
 * @author Nelson D. Garzón M.
 */
 
include_once(dirname(__FILE__) . '/../data.bases/connection.mysql.class.php');

class subs {
    private $conn;
    
    function subs()
    {
        $this->conn = new connection();        
    }
    
	function get_all_count_subs()
    {
        $record_set = $this->conn->db->Execute('SELECT COUNT(*) FROM subtema');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function get_all_subs_list()
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM subtema ORDER BY nombre ASC ');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
    function get_all_subs($order, $index, $page)
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM subtema ORDER BY '.$order.' LIMIT '.$index.','.$page);
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function search_subs($name)
    {
        $record_set = $this->conn->db->Execute('SELECT id, nombre, descripcion FROM subtema WHERE nombre = ?', array($name));
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
	
	function get_sub($name)
    {
		$record_set = $this->conn->db->Execute('SELECT * FROM subtema WHERE nombre LIKE ?', array($name));
			
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function get_sub_search($name = "", $order, $index, $page)
    {
		if(!empty($name)){
			$record_set = $this->conn->db->Execute('SELECT * FROM subtema WHERE nombre LIKE ? ORDER BY '.$order.' LIMIT '.$index.','.$page, array("%".$name."%"));
		}else{
			$record_set = $this->conn->db->Execute('SELECT * FROM subtema ORDER BY '.$order.' LIMIT '.$index.','.$page);
		}
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function insert_sub($name, $description)
    {
        return $this->conn->db->Execute('INSERT INTO subtema(nombre, descripcion) VALUES(?,?) ', 
			   array($name, $description));
    }
	
	function update_sub($id, $name, $description)
    {
        return $this->conn->db->Execute('UPDATE subtema SET nombre = ?, descripcion = ? WHERE id = ? ', 
			   array($name, $description, $id));
    }
    
    function delete_sub($id)
    {
        return $this->conn->db->Execute('DELETE FROM subtema WHERE id = ?', array($id));
    }
}
?>
