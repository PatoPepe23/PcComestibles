<?php
include_once("../Config/DataBase.php");

class productsAPI{
    function getProducts(){
        $con = DataBase::connect();

        $result = mysqli_query($con, 'select * from Productos;');

        $postJson = array();
        
        while ($product = $result->fetch_assoc()) {
            $postJson[] = $product;
        }

        $json = json_encode($postJson);

        $con->close();
        return $json;
    }
}

$api = new productsAPI();

$products = $api->getProducts();

header('Content-Type: application/json'); 

echo $products;