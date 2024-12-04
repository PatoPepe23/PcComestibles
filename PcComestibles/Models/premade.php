<?php

include_once 'product.php';

class Premade extends Product{

    public function __construct($id, $name, $type, $price, $old_price, $promo, $image){
        parent::__construct($id, $name, $type, $price, $old_price, $promo, $image);
    }
}