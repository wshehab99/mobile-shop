<?php

use database\Cart;
use database\DBController;
use database\Grammar\DBGrammar;
use database\Product;
use database\Wishlist;

require ("database/DBController.php");
require ("database/Grammar/DBGrammar.php");
require ("database/Product.php");
require ("database/Cart.php");
require ("database/Wishlist.php");

ob_start();
$db=new DBController();
$dbGrammar=new DBGrammar();
$product= new Product($db, $dbGrammar);
$cart = new Cart($db, $dbGrammar);
$wishlist=new Wishlist($db,$dbGrammar);