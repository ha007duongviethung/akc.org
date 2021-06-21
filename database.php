<?php
    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DATABASE = 'akc';

    class Models
    {
        protected $conn;

        public function __construct()
        {
            $this->conn = new mysqli(HOST, USER, PASS, DATABASE);
            $this->conn->set_charset('utf-8');
            if($this->conn->connect_errno) {
                echo "Failed to conneted to MYSQL: " . $this->conn->connect_error;
                exit();
            }
        }
    }