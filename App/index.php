<?php
namespace App;
require "../vendor/autoload.php";
use App\Model\Mega;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents("php://input"));

    function isValid($data) {
        $requiredFields = ['num1', 'num2', 'num3', 'num4', 'num5', 'num6'];
        foreach ($requiredFields as $field) {
            if (!isset($data->$field) || !is_numeric($data->$field)) {
                return false;
            }
        }
        return true;
    }

    if (isValid($data)) {
        $mega = new Mega();
        
        $mega->setNum1(intval($data->num1));
        $mega->setNum2(intval($data->num2));
        $mega->setNum3(intval($data->num3));
        $mega->setNum4(intval($data->num4));
        $mega->setNum5(intval($data->num5));
        $mega->setNum6(intval($data->num6));

        if ($mega->insertMega()) {
            http_response_code(200); 
            echo json_encode(["message" => "Dados inseridos com sucesso."]);
        } else {
            http_response_code(500); 
            echo json_encode(["message" => "Falha ao inserir dados."]);
        }
    } else {
        http_response_code(400); 
        echo json_encode(["error" => "Dados de entrada inválidos."]);
        exit;
    }
}

