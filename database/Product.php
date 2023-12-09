<?php

namespace database;

use database\Grammar\DBGrammar;

class Product
{
    public DBController $db;
    public  DBGrammar $dbGrammar;
    public function __construct(DBController $db, DBGrammar $dbGrammar)
    {
    $this->db=$db;
    $this->dbGrammar=$dbGrammar;
    }
    public  function getProducts(): array
    {

        $result= $this->db->connection->query($this->dbGrammar->getData('product'));
        $resultArray=[];
        while ($item= mysqli_fetch_array($result))
        {
            $resultArray[]=$item;
        }
        return $resultArray;
    }

}