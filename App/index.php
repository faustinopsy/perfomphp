<?php
namespace App;
use App\Model\Mega;
use App\Controller\MegaController;
require __DIR__.'../vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$megaController = new MegaController();

$data = json_decode(file_get_contents("php://input"));

$mega = new Mega();
$mega->setNum1($data->num1);
$mega->setNum2($data->num2);
$mega->setNum3($data->num3);
$mega->setNum4($data->num4);
$mega->setNum5($data->num5);
$mega->setNum6($data->num6);

if ($megaController->insertMega($mega)) {
    echo json_encode(["message" => "Dados inseridos com sucesso."]);
} else {
    echo json_encode(["message" => "Falha ao inserir dados."]);
}
?>
