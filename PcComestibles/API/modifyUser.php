<?php

class updateUser{ 
    function updateUser(){
        include_once("../Config/DataBase.php");

        $con = DataBase::connect();

        $jsonData = file_get_contents('php://input');

        $data = json_decode($jsonData, true);

        $user_ID = $data['user_ID'] ?? 0;
        $username = $data['username'] ?? ''; 
        $range = $data['range'] ?? 0;
        $password = $data['password'] ?? 0;

        if ($password === '********') {
            $stmt = $con->prepare('UPDATE Users SET username = ?, rango = ? WHERE user_ID = ?');
            $stmt->bind_param('ssi', $username, $range, $user_ID);
        }else{
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $con->prepare('UPDATE Users SET username = ?, password = ?, rango = ? WHERE user_ID = ?');
            $stmt->bind_param('sssi', $username, $password, $range, $user_ID);
        }
        $stmt->execute();

        $stmt->close();
        $con->close();
        return json_encode(array('status' => 'success'));
    }
}

$api = new updateUser();

$user = $api->updateUser();

header('Content-Type: application/json'); 

echo $user;