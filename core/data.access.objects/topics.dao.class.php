<?php

/**
 * Clase de métodos de inserción, modificación, eliminación y consulta sobre la tabla usuarios
 *
 * @author Nelson D. Garzón M.
 */
 
include_once(dirname(__FILE__) . '/../data.bases/connection.mysql.class.php');

class topics {
    private $conn;
    
    function topics()
    {
        $this->conn = new connection();        
    }
    
	function get_all_count_topics()
    {
        $record_set = $this->conn->db->Execute('SELECT COUNT(*) FROM tema');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function get_all_topics_list()
    {
        $record_set = $this->conn->db->Execute(' SELECT * FROM tema ORDER BY nombre ASC ');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
    function get_all_topics($order, $index, $page)
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM tema ORDER BY '.$order.' LIMIT '.$index.','.$page);
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function search_topics($name)
    {
        $record_set = $this->conn->db->Execute('SELECT id, nombre, descripcion FROM tema WHERE nombre = ?', array($name));
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
	
	function get_topic($name)
    {
		$record_set = $this->conn->db->Execute('SELECT * FROM tema WHERE nombre LIKE ?', array($name));
			
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function get_topic_search($name = "", $order, $index, $page)
    {
		if(!empty($name)){
			$record_set = $this->conn->db->Execute('SELECT * FROM tema WHERE nombre LIKE ? ORDER BY '.$order.' LIMIT '.$index.','.$page, array("%".$name."%"));
		}else{
			$record_set = $this->conn->db->Execute('SELECT * FROM tema ORDER BY '.$order.' LIMIT '.$index.','.$page);
		}
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function insert_topic($name, $description)
    {
        return $this->conn->db->Execute('INSERT INTO tema(nombre, descripcion) VALUES(?,?) ', 
			   array($name, $description));
    }
	
	function update_topic($id, $name, $description)
    {
        return $this->conn->db->Execute('UPDATE tema SET nombre = ?, descripcion = ? WHERE id = ? ', 
			   array($name, $description, $id));
    }
    
    function delete_topic($id)
    {
        return $this->conn->db->Execute('DELETE FROM tema WHERE id = ?', array($id));
    }
}
?>
