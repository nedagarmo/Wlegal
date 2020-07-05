<?php

/**
 * Clase de métodos de inserción, modificación, eliminación y consulta sobre la tabla usuarios
 *
 * @author Nelson D. Garzón M.
 */
 
include_once(dirname(__FILE__) . '/../data.bases/connection.mysql.class.php');

class documents {
    public $conn;
    
    function documents()
    {
        $this->conn = new connection();        
    }
    
	function get_all_count_documents()
    {
        $record_set = $this->conn->db->Execute('SELECT COUNT(*) FROM documento');
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
    function get_all_documents($order, $index, $page)
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM documento ORDER BY '.$order.' LIMIT '.$index.','.$page);
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        }
    }
	
	function search_documents($number)
    {
        $record_set = $this->conn->db->Execute('SELECT * FROM documento WHERE numero LIKE ?', array($number));
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
	
	function get_documents($number)
    {
		$record_set = $this->conn->db->Execute('SELECT * FROM documento WHERE numero LIKE ?', array($number));
			
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
	
	function get_document($id)
    {
		$record_set = $this->conn->db->Execute('SELECT contenido FROM documento WHERE id LIKE ?', array($id));
			
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
	
	function get_document_search_autocomplete($text)
    {
		$record_set = $this->conn->db->Execute('SELECT id, CONCAT(numero," || ",resumen) as label, numero as value FROM documento WHERE CONCAT(numero, " ", resumen, " ", contenido) LIKE ? ORDER BY numero,resumen,contenido ASC LIMIT 15', array("%".$text."%"));
		
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function get_document_search($text = "", $order, $index, $page)
    {
		if(!empty($text)){
			$record_set = $this->conn->db->Execute('SELECT * FROM documento WHERE CONCAT(numero, " ", resumen, " ", contenido) LIKE ? ORDER BY '.$order.' LIMIT '.$index.','.$page, array("%".$text."%"));
		}else{
			$record_set = $this->conn->db->Execute('SELECT * FROM documento ORDER BY '.$order.' LIMIT '.$index.','.$page);
		}
        if($record_set != false)
        {
            return $record_set;
        }  else {
            return null;
        } 
    }
    
    function insert_document($date, $topic, $sub, $type, $number, $author, $involved, $summary, $content)
    {
        return $this->conn->db->Execute('INSERT INTO documento(fecha, tema, subtema, tipo, numero, autor, intervienen, resumen, contenido) VALUES(?,?,?,?,?,?,?,?,?) ', 
			   array($date, $topic, $sub, $type, $number, $author, $involved, $summary, $content));
    }
	
	function insert_user_document($user, $document)
    {
        return $this->conn->db->Execute('INSERT INTO usuario_documento(usuario, documento, fecha) VALUES(?,?,CURDATE()) ', 
			   array($user, $document));
    }
	
	function update_document($id, $date, $topic, $sub, $type, $number, $author, $involved, $summary, $content)
    {
        return $this->conn->db->Execute('UPDATE documento SET fecha = ?, tema = ?, subtema = ?, tipo = ?, numero = ?, autor = ?, intervienen = ?, resumen = ?, contenido = ? WHERE id = ? ', 
			   array($date, $topic, $sub, $type, $number, $author, $involved, $summary, $content, $id));
    }
	
	function update_document_content($id, $content)
    {
        return $this->conn->db->Execute('UPDATE documento SET contenido = ? WHERE id = ? ', 
			   array($content, $id));
    }
    
    function delete_document($id)
    {
        return $this->conn->db->Execute('DELETE FROM documento WHERE id = ?', array($id));
    }
}
?>
