<?php

namespace database;
use database\DBController;
class DBGrammar
{
    public DBController $db;
    public function __construct(DBController $db)
    {
        $this->db=$db;
    }
    public function getData($table): array
    {
        $result= $this->db->connection->query("SELECT * FROM $table");
        $resultArray=[];
        while ($item= mysqli_fetch_array($result))
        {
            $resultArray[]=$item;
        }
        return $resultArray;
    }
    public function insertIntoTable($params,$table): string
    {
        $columns = implode(", ",array_keys($params));
        $values=implode(", ",array_values($params));
        return "INSERT INTO $table ($columns) VALUES($values)";
    }
}