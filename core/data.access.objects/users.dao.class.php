<?php

/**
 * Clase de métodos de inserción, modificación, eliminación y consulta sobre la tabla usuarios
 *
 * @author Nelson D. Garzón M.
 */
 
include_once(dirname(__FILE__) . '/../data.bases/connection.mysql.class.php');

class users {
    private $conn;
    
    function users()
    {
        $this->conn = new connection();        
    }
    
	function get_all_count_users()
    {
        $record_set = $this->conn->db->Execute('SELECT COUNT(*) FROM usuario');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
    function get_all_users($order, $index, $page)
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM usuario ORDER BY '.$order.' LIMIT '.$index.','.$page);
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function search_users($username)
    {
        $record_set = $this->conn->db->Execute('SELECT id, usuario, clave, rol FROM usuario WHERE usuario LIKE ?', array($username));
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
	
	function get_user($username)
    {
		$record_set = $this->conn->db->Execute('SELECT * FROM usuario WHERE usuario LIKE ?', array($username));
			
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function get_user_search($name = "", $order, $index, $page)
    {
		if(!empty($name)){
			$record_set = $this->conn->db->Execute('SELECT * FROM usuario WHERE usuario LIKE ? ORDER BY '.$order.' LIMIT '.$index.','.$page, array("%".$name."%"));
		}else{
			$record_set = $this->conn->db->Execute('SELECT * FROM usuario ORDER BY '.$order.' LIMIT '.$index.','.$page);
		}
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function get_user_login($username, $password)
    {
        $record_set = $this->conn->db->Execute("SELECT id, usuario, clave, rol FROM usuario WHERE usuario = ? AND clave = ? ", array($username, $password));
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function insert_user($username, $password, $role)
    {
        return $this->conn->db->Execute('INSERT INTO usuario(usuario, clave, rol) VALUES(?,?,?) ', 
			   array($username, $password, $role));
    }
	
	function update_user($id, $username, $password, $role)
    {
        return $this->conn->db->Execute('UPDATE usuario SET usuario = ?, clave = ?, rol = ? WHERE id = ? ', 
			   array($username, $password, $role, $id));
    }
    
    function delete_user($id)
    {
        return $this->conn->db->Execute('DELETE FROM usuario WHERE id = ?', array($id));
    }
	
	function change_password($id, $password)
    {
        return $this->conn->db->Execute('UPDATE usuario SET clave = ? WHERE id = ?', array($password, $id));
    }
}
?>
