<?php
include_once("../Config/DataBase.php");

class createProductsAPI {
    public function createProduct() {
        $con = DataBase::connect();

        $jsonData = file_get_contents('php://input');

        $data = json_decode($jsonData, true);

        if ($data === null) {
            http_response_code(400);
            echo json_encode(['error' => 'Error al decodificar el JSON.']);
            exit;
        }

        $name = $data['name'] ?? ''; 
        $price = $data['price'] ?? 0;
        $old_price = $data['last_price'] ?? 0;
        $image = $data['image'] ?? '';
        $type = $data['type'] ?? '';
        $promo = $data['promo'] ?? 0;

        $stmt = $con->prepare('INSERT INTO Productos (name, price, old_price, image, type, promo) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('sddssi', $name, $price, $old_price, $image, $type, $promo);
        $stmt->execute();

        $stmt->close();
        $con->close();
        return json_encode(array('status' => 'success'));
    }
}

$api = new createProductsAPI();

$products = $api->createProduct();

header('Content-Type: application/json'); 

echo $products;