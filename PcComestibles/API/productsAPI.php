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

    function getProduct($id){
        $con = DataBase::connect();

        $stmt = $con->prepare('SELECT * FROM Productos WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $product = $result->fetch_assoc();

        $json = json_encode($product);

        $stmt->close();
        $con->close();
        return $json;
    }

    

    function updateProduct($id, $name, $price, $old_price, $image, $type, $promo){
        $con = DataBase::connect();

        $stmt = $con->prepare('UPDATE Productos SET name = ?, price = ?, old_price = ?, image = ?, type = ?, promo = ? WHERE id = ?');
        $stmt->bind_param('sddssii', $name, $price, $old_price, $image, $type, $promo, $id);
        $stmt->execute();

        $stmt->close();
        $con->close();
        return json_encode(array('status' => 'success'));
    }

}

$api = new productsAPI();

$products = $api->getProducts();

header('Content-Type: application/json'); 

echo $products;