<?php
namespace App;
require "../vendor/autoload.php";
use App\Model\Mega;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $data = json_decode(file_get_contents("php://input"));

        if (!isValid($data)) {
            http_response_code(400);
            echo json_encode(["error" => "Dados de entrada inválidos."]);
            break;
        }

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
        break;
    case 'GET':
        $mega = new Mega();
        if (isset($_GET['id'])) {
            $result = $mega->getById(intval($_GET['id']));
        } else {
            $result = $mega->getAll();
        }

        if ($result) {
            http_response_code(200);
            echo json_encode($result);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Nenhum dado encontrado."]);
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(["error" => "Método não permitido."]);
        break;
}

function isValid($data) {
    $requiredFields = ['num1', 'num2', 'num3', 'num4', 'num5', 'num6'];
    foreach ($requiredFields as $field) {
        if (!isset($data->$field) || !is_numeric($data->$field)) {
            return false;
        }
    }
    return true;
}
