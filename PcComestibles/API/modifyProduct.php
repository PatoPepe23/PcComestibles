<?php

class updateProduct{ 
    function updateProduct(){
        include_once("../Config/DataBase.php");

        $con = DataBase::connect();

        $jsonData = file_get_contents('php://input');

        $data = json_decode($jsonData, true);

        $name = $data['name'] ?? ''; 
        $price = $data['price'] ?? 0;
        $old_price = $data['last_price'] ?? 0;
        $image = $data['image'] ?? '';
        $type = $data['type'] ?? '';
        $promo = $data['promo'] ?? 0;
        $id = $data['id'] ?? 0;

        $stmt = $con->prepare('UPDATE Productos SET name = ?, price = ?, old_price = ?, image = ?, type = ?, promo = ? WHERE producto_ID = ?');
        $stmt->bind_param('sddssii', $name, $price, $old_price, $image, $type, $promo, $id);
        $stmt->execute();

        $stmt->close();
        $con->close();
        return json_encode(array('status' => 'success'));
    }
}

$api = new updateProduct();

$products = $api->updateProduct();

header('Content-Type: application/json'); 

echo $products;