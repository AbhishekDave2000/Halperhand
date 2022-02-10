<?php
    include("config.php");
    class DBConnection{
        public $conn;
        public function Connection()
        {
            $this->conn = new mysqli(Config::DB_HOST , Config::DB_USER , Config::DB_PASS, Config::DB_NAME);
            if (!$this->conn) {
                die("Connection failed: " . $this->conn->connect_error);
            }
            return $this->conn;
        }
    }
