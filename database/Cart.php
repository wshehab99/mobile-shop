<?php

namespace database;
use database\DBController;
use database\DBGrammar;

class Cart
{
    public DBController $db;
    public DBGrammar $dbGrammar;
    public function __construct(DBController $db, DBGrammar $dbGrammar)
    {
        $this->db=$db;
        $this->dbGrammar=$dbGrammar;
    }
    public function addToCart($user_id,$item_id)
    {
        $params=[
            'user_id' => $user_id,
            'item_id' => $item_id,
        ];
        return $this->db->connection->query($this->dbGrammar->insertIntoTable($params,"cart"));
    }

}