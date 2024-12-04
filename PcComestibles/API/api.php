<?php
header("Access-Control-Allow-Origin: *");
header("Content-Typer: aplication/json; charset=UTF-8");
header("Acces-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Acces-Control-Allow-Headers: Content-Typer, Access-Control*Allow-Headers, Authorization, X-Requested-with");

//Modelos y controladores
$users = [
    ['id'=>1, 'name'=>'Paco', 'password'=>'1234'],
    ['id'=>2, 'name'=>'Pepe', 'password'=>'4321'],
    ['id'=>3, 'name'=>'Raul', 'password'=>'mamahuebo']
];

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        if (isset($_GET['id'])) {
            $exist = false;
            foreach($users as $user){
                if ($user['id'] == $_GET['id']) {
                    $exist = true;
                    echo json_encode([
                        'state'=>'success',
                        'user'=>$user
                    ]);
                    break;
                }
            }

            if (!$exist) {
                http_response_code(404);
                echo json_encode([
                    'state'=>'Error',
                    'user'=>'No data'
                ]);
            }

        } else{
            echo json_encode([
                'state'=>'success',
                'users'=>$users
            ]);
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);

        //insert
        array_push($users,
            ['id'=>4, 'name'=>$data['name'], 'password'=>$data['password']]
        );

        echo json_encode([
            'state'=>'success',
            'data'=>'successfully inserted'
        ]);
        break;
    case 'PUT':
        # code...
        break;
    case 'DELETE':
        # code...
        break;
}