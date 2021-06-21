<?php
    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DATABASE = 'akc';
    class DATABASE
    {
        protected $conn;

        public function __construct()
        {
            $this->conn = new mysqli(HOST, USER, PASS, DATABASE);
            $this->conn->set_charset('utf8');
            if ($this->conn->connect_error) {
                echo "Failed to conneting to MYSQL: " . $this->conn->connect_error;
                exit();
            }
        }
    }
