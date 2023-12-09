<?php

namespace database;

use database\Grammar\DBGrammar;

class Wishlist
{
    public DBController $db;
    public DBGrammar $dbGrammar;
    public function __construct(DBController $db, DBGrammar $dbGrammar)
    {
        $this->db=$db;
        $this->dbGrammar=$dbGrammar;
    }
    public function addProductToWishList($user_id, $item_id)
    {
        $params=['user_id'=>$user_id,'item_id'=>$item_id];
        $result= $this->db->connection->query($this->dbGrammar->insertIntoTable($params,'wishlist'));
        if($result){
            header("Location:".$_SERVER['PHP_SELF']);
        }
    }
    public function getWishlistId(): array
    {
        $result=[];
        foreach ($this->getWishlist() as $item)
        {
            $result[]=$item['item_id'];
        }
        return $result;
    }
    public function deleteProductFromWishList($item_id)
    {
        $result = $this->db->connection->query($this->dbGrammar->deleteRowUsingFilter('wishlist',"item_id = $item_id"));
        if($result){
            header("Location:".$_SERVER['PHP_SELF']);
        }
    }
    public  function getWishlistItems(): array
    {
        $result=[];
        foreach ($this->getWishlist() as $item){
            $result[]=  $this->getProductById($item['item_id']);
        }
        return $result;
    }
    public function  getWishlist(): array
    {
        $result= $this->db->connection->query($this->dbGrammar->getData('wishlist'));
        $resultArray=[];
        while ($item= mysqli_fetch_array($result))
        {
            $resultArray[]=$item;
        }
        return $resultArray;
    }
    public  function  getProductById(string $item_id): array
    {
        $result = $this->db->connection->query($this->dbGrammar->getFilteredData('product',"item_id = $item_id"));
        $resultArray=[];
        while ($item= mysqli_fetch_array($result))
        {
            $resultArray[]=$item;
        }
        return $resultArray[0];
    }
    public function wishlistLength(): int
    {
        return count($this->getWishlist());
    }
}