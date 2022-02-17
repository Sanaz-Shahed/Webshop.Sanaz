<?php

include_once("./../classes/product.php");

function createProduct($id, $name, $quantity, $price, $description) {
    
    return new Product((int)$id, $name, $quantity, $price, $description);
} 

?>