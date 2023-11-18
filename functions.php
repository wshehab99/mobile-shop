<?php

use database\DBController as DBControllerAlias;
use database\Product;

require ("database/DBController.php");
require ("database/Product.php");
$db=new DBControllerAlias();
$product= new Product($db);