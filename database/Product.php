<?php

namespace database;

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
       return $this->dbGrammar->getData("product");
    }

}