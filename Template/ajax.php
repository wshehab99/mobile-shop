<?php
// require MySQL Connection
require ('../database/DBController.php');

// require Product Class
require ('../database/Product.php');

use database\Cart;
use database\DBController;
use database\Grammar\DBGrammar;

// DBController object
$db = new DBController();

$dbGrammar=new DBGrammar();
$product= new Cart($db, $dbGrammar);

if (isset($_POST['itemid'])){
    $result = $product->getProductById($_POST['itemid']);
    echo json_encode($result);
}