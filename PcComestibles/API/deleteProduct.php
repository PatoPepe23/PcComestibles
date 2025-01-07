<?php

class deleteProduct{
    public function deleteProduct(){
        include_once("../Config/DataBase.php");

        $con = DataBase::connect();

        $jsonData = file_get_contents('php://input');

        $data = json_decode($jsonData, true);

        $stmt = $con->prepare('DELETE FROM Productos WHERE producto_ID = ?');
        $stmt->bind_param('i', $data['id']);
        $stmt->execute();

        $stmt->close();
        $con->close();
        return json_encode(array('status' => 'success'));
    }
}

$api = new deleteProduct();

$products = $api->deleteProduct();

header('Content-Type: application/json'); 

echo $products;