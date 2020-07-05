<?php

/**
 * Clase de métodos de inserción, modificación, eliminación y consulta sobre la tabla usuarios
 *
 * @author Nelson D. Garzón M.
 */
 
include_once(dirname(__FILE__) . '/../data.bases/connection.mysql.class.php');

class roles {
    private $conn;
    
    function roles()
    {
        $this->conn = new connection();        
    }
    
	function get_all_count_roles()
    {
        $record_set = $this->conn->db->Execute('SELECT COUNT(*) FROM rol');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function get_all_roles_list()
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM rol');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
    function get_all_roles($order, $index, $page)
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM rol ORDER BY '.$order.' LIMIT '.$index.','.$page);
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function search_roles($name)
    {
        $record_set = $this->conn->db->Execute('SELECT id, nombre FROM rol WHERE nombre = ?', array($name));
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
	
	function get_rol($id)
    {
		$record_set = $this->conn->db->Execute('SELECT * FROM rol WHERE id = ?', array($id));
			
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function get_rol_search($name = "", $order, $index, $page)
    {
		if(!empty($name)){
			$record_set = $this->conn->db->Execute('SELECT * FROM rol WHERE nombre LIKE ? ORDER BY '.$order.' LIMIT '.$index.','.$page, array("%".$name."%"));
		}else{
			$record_set = $this->conn->db->Execute('SELECT * FROM rol ORDER BY '.$order.' LIMIT '.$index.','.$page);
		}
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function insert_rol($name)
    {
        return $this->conn->db->Execute('INSERT INTO rol(nombre) VALUES(?) ', 
			   array($name));
    }
	
	function update_user($id, $name)
    {
        return $this->conn->db->Execute('UPDATE rol SET nombre = ? WHERE id = ? ', 
			   array($name, $id));
    }
    
    function delete_user($id)
    {
        return $this->conn->db->Execute('DELETE FROM rol WHERE id = ?', array($id));
    }
}
?>
