<?php
include_once("../Config/DataBase.php");

class usersAPI{
    public function getUser(){
        $con = DataBase::connect();

        $result = mysqli_query($con, 'select * from Users;');

        $postJson = array();
        
        while ($user = $result->fetch_assoc()) {
            $postJson[] = $user;
        }

        $json = json_encode($postJson);

        $con->close();
        return $json;
    }
}

$api = new usersAPI();

// Obtener los usuarios
$usuarios = $api->getUser();

header('Content-Type: application/json'); 

echo $usuarios;
?>