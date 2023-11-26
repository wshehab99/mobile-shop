<?php

use database\DBController ;
use database\DBGrammar;
use database\Product;
use database\Cart;
require ("database/DBController.php");
require ("database/Product.php");
require ("database/Cart.php");
$db=new DBController();
$dbGrammar=new DBGrammar($db);
$product= new Product($db, $dbGrammar);
$cart = new Cart($db, $dbGrammar);