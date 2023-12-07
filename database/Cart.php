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
        $result= $this->db->connection->query($this->dbGrammar->insertIntoTable($params,"cart"));
        if($result){
            header("Location:".$_SERVER['PHP_SELF']);
        }
    }
    public  function getCartItems(): array
    {
        $result=[];
        foreach ($this->dbGrammar->getData("cart") as $item){
            $result[]=  $this->getProductById($item['item_id']);
        }
        return $result;
    }
    public function  getCart(): array
    {
        return $this->dbGrammar->getData("cart") ;
    }
    public  function  getSubtotal(){
        $sum=0;
        foreach ($this->getCartItems() as $item){
//            var_dump($item);
            $sum = $sum+ $item['item_price'];
        }
        return $sum;
    }
    public  function  getNumberOfItemsInCart(): int
    {
        return count($this->getCart());
    }
    public  function deleteItemFromCart($item_id)
    {
        $result= $this->dbGrammar->deleteRowUsingFilter("cart","item_id = $item_id");
        if(isset($result))
        {
            header("Location:".$_SERVER['PHP_SELF']);
        }
        return $result;
    }
    public function getCartId(): array
    {
        $result=[];
        foreach ($this->getCart() as $cartItem)
        {
            $result[]=$cartItem['item_id'];
        }
        return $result;
    }
    public  function  getProductById(string $item_id): array
    {
    return $this->dbGrammar
        ->getFilteredData('product',"item_id = $item_id")[0];
    }



}