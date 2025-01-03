<?php
include_once("../Config/DataBase.php");

class cartsAPI{
    public function getUsersCarts(){
        $con = DataBase::connect();

        $result = mysqli_query($con, 'select * from carrito;');

        $postJson = array();
        
        while ($cart = $result->fetch_assoc()) {
            $postJson[] = $cart;
        }

        $json = json_encode($postJson);

        $con->close();
        return $json;
    }

    public function deleteCart($user_ID, $product_ID){
        $con = DataBase::connect();

        $stmt = $con->prepare("delete from carrito where User_ID = ? and Product_ID = ?;");
        $stmt->bind_param('ii', $user_ID, $product_ID);
        $stmt->execute();

        $result = $stmt->get_result();

        $con->close();
        return $result;
    }
}

$api = new cartsAPI();

$carts = $api->getUsersCarts();

header('Content-Type: application/json'); 

echo $carts;
?>