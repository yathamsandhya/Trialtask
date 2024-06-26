<?php 
  class database {
    private $db_server =  "mysql:dbname=xmldatabase; host=localhost";
    //private $db_name = 'xmldatabase';
    private $username = 'root';
    private $password = '';
    private $conn;
    public function _construct() {
      $this->conn = null;

      try { 
        $this->conn = new PDO($this->db_server, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }