<?php
    class config {
        // public $serverName = "localhost";
        // public $userName = "root";
        // public $passWord = "";
        // public $database = "digishop";
        // public $port = "3306";
        /*   */

        public $server_name = "103.200.23.160";
        public $user_name = "digishop_nam";
        public $password = "TiniWorld1@3";
        public $database = "digishop_new";
        public $port = "3306";
        public $conn;

        public function __construct() {
            $dsn = "mysql:host=".$this->server_name.";port=".$this->port.";dbname=".$this->database.";charset=UTF8";
            $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            try {
                $this->conn = new PDO($dsn,$this->user_name,$this->password,$option);
                // print_r($this->conn);
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function connect() {
            return $this->conn;
        }

    }
?>