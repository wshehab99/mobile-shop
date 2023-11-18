<?php

namespace database;

class DBController
{
    //connection properties
    protected  $host="localhost";
    protected $user="root";
    protected $password="";
    protected $database="shop";
    public $connection=null;
    //constructor
    public function __construct()
    {
        $this->openConnection();
    }
    public function __destruct()
    {
        $this->closeConnection();
    }
    protected function openConnection()
    {
        $this->connection=mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if($this->connection->connect_error)
        {
            echo "Failed ".$this->connection->connect_error;
        }

    }
    protected function closeConnection()
    {
        if($this->connection)
        {
            $this->connection->close();
            $this->connection=null;
        }
    }
}