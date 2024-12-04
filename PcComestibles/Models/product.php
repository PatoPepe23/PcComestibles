<?php

abstract class Product{

    protected $id;
    protected $name;
    protected $type;
    protected $price;
    protected $old_price;
    protected $promo;
    protected $image;
    
    public function __construct($id, $name, $type, $price, $old_price, $promo, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->old_price = $old_price;
        $this->promo = $promo;
        $this->image = $image;
    }

    public function getID(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getType(){
        return $this->type;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getOldPrice(){
        return $this->old_price;
    }

    public function getImage(){
        return $this->  image;
    }
}