<?php
// require MySQL Connection
require ('../database/DBController.php');

// require Product Class
require ('../database/Product.php');
use database\DBController;
use database\Cart;
use database\DBGrammar;
// DBController object
$db = new DBController();

$dbGrammar=new DBGrammar($db);
$product= new Cart($db, $dbGrammar);

if (isset($_POST['itemid'])){
    $result = $product->getProductById($_POST['itemid']);
    echo json_encode($result);
}