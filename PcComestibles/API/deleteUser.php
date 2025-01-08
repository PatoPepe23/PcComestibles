<?php

class deleteUser{
    public function deleteUser(){
        include_once("../Config/DataBase.php");

        $con = DataBase::connect();

        $jsonData = file_get_contents('php://input');

        $data = json_decode($jsonData, true);

        $stmt = $con->prepare('DELETE FROM Users WHERE user_ID = ?');
        $stmt->bind_param('i', $data['user_ID']);
        $stmt->execute();

        $stmt->close();
        $con->close();
        return json_encode(array('status' => 'success'));
    }
}

$api = new deleteUser();

$user = $api->deleteUser();

header('Content-Type: application/json'); 

echo $user;