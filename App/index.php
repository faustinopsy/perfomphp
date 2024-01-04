<?php
namespace App;
require "../vendor/autoload.php";
use App\Model\Mega;
use App\Controller\MegaController;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));
var_dump($data );exit;
$mega = new Mega(); 
$mega->setNum1(intval($data->num1));
$mega->setNum2(intval($data->num2));
$mega->setNum3(intval($data->num3));
$mega->setNum4(intval($data->num4));
$mega->setNum5(intval($data->num5));
$mega->setNum6(intval($data->num6));

$megaController = new MegaController($mega);
if ($megaController->insertMega()) {
    echo json_encode(["message" => "Dados inseridos com sucesso."]);
} else {
    echo json_encode(["message" => "Falha ao inserir dados."]);
}
?>
