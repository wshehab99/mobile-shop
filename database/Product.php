<?php

namespace database;

class Product
{
    public  $db;
    public function __construct(DBController $db)
    {
//    if(!isset($this->db->connection))return null;
    $this->db=$db;
    }
    public  function getProducts()
    {
       return $this->getData("product");
    }
    protected function getData($table)
    {
       $result= $this->db->connection->query("SELECT * FROM $table");
       $resultArray=[];
        while ($item= mysqli_fetch_array($result))
       {
           $resultArray[]=$item;
       }
       return $resultArray;
    }
}