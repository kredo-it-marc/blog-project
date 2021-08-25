<?php 

class Config{
    private $servername = 'localhost';
    private $username = 'marc';
    private $password = 'password'; //for mac: password is root
    private $db_name = 'blog';
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->db_name);

        return $this->conn;
    }
}


?>