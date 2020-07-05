<?php

/**
 * Clase de conexión a la base de datos postgres del sistema.
 *
 * @author Nelson D. Garzón M.
 */

ini_set('display_errors', 'On');
include_once(dirname(__FILE__) . '/../../libraries/adodb5/adodb.inc.php');

class connection {
    public $db;
    private $driver = "mysqli";
    private $server = "localhost";
    private $user = "root";
    private $password = "@Hi123";
    private $database = "wlegal";
    
    function connection()
    {
        try {
            $this->db = ADONewConnection($this->driver);
            // $this->db->debug = true;
            $this->db->Connect($this->server, $this->user, $this->password, $this->database);
        } catch (Exception $e) {
            $this->db->Close();
            die($e->getMessage());
        }
    }
}
?>
