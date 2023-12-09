<?php

namespace database\Grammar;
class DBGrammar
{

    public function getData($table): string
    {
        return "SELECT * FROM $table";
    }
    public function insertIntoTable($params,$table): string
    {
        $columns = implode(", ",array_keys($params));
        $values=implode(", ",array_values($params));
        return "INSERT INTO $table ( $columns ) VALUES( $values )";
    }
    public function getFilteredData($table ,string  $filter): string
    {
        return "SELECT * FROM $table WHERE $filter";
    }
    public  function  deleteRowUsingFilter(string  $table, string  $filter): string
    {
        return "DELETE FROM $table WHERE $filter";
    }

}