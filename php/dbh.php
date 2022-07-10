<?php

class Dbh
{
    public $serverName;
    public $userName;
    public $password;
    public $dbName;
    public $tableName;
    public $connection;

    public function __construct(
        $dbName = "Newdb",
        $tableName = "Productdb",
        $serverName = "localhost",
        $userName = "root",
        $password = ""
    ) {
        $this->dbname = $dbName;
        $this->tablename = $tableName;
        $this->servername = $serverName;
        $this->username = $userName;
        $this->password = $password;

        // make connection
        $this->connection = mysqli_connect($serverName, $userName, $password);

        // check connection
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // a query  
        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";

        // execute query
        if (mysqli_query($this->connection, $sql)) {
            $this->connection = mysqli_connect($serverName, $userName, $password, $dbName);

            //sql create new table
            $sql = "CREATE TABLE IF NOT EXISTS $tableName
            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            product_name VARCHAR(25) NOT NULL,
            product_price FLOAT,
            product_image VARCHAR(100)
            );";

            if(!mysqli_query($this->connection, $sql)){
                echo "Error creating table: " . mysqli_error($this->connection);
            }

        } else{
            return false;
        }
    }
    // get product from database 
    public function getData(){
        $sql = "SELECT*FROM $this->tablename";

        $result=mysqli_query($this->connection, $sql);

        if(mysqli_num_rows($result) >0){
            return $result;
        }
    }
}
