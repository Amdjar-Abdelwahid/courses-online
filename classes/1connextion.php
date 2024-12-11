<?php

class Connection{

    private $servername = "DESKTOP-JQ0CBDU\SQLEXPRESS";
    private $username = "Fedeewahid"; // Your SQL Server username
    private $password = "Csbex@2004"; // Your SQL Server password
    private $database = "materielmanagement"; // Your SQL Server database name
    public $conn;

    public function __construct(){
        // Connect to SQL Server
        $this->conn = sqlsrv_connect($this->servername, array(
            "UID" => $this->username,
            "PWD" => $this->password,
            "Database" => $this->database
        ));
        
        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . sqlsrv_errors());
        }
    }

    function createDatabase($dbName){
        // Creating a database with the connection in the class ($this->conn)
        $sql = "CREATE DATABASE $dbName";
        $stmt = sqlsrv_query($this->conn, $sql);
        if ($stmt) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . sqlsrv_errors();
        }
    }

    function selectDatabase($dbName){
        // Select database with the connection of the class
        $this->database = $dbName;
        sqlsrv_close($this->conn);
        $this->__construct();
    }

    function createTable($query){
        // Creating table with the connection of the class
        $stmt = sqlsrv_query($this->conn, $query);
        if ($stmt) {
            echo "Table created successfully";
        } else {
            echo "Error creating table: " . sqlsrv_errors();
        }
    }

}


?>