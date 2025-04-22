<?php
// CORS
header("Access-Control-Allow-Origin: *"); // ou coloque o domínio específico
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}
use Util\RoutesUtil;
use Validator\RequestValidator;

include '../bootstrap.php';

try {
    $RequestValidator = new RequestValidator(RoutesUtil::getRoutes());
    return $RequestValidator->processRequest();
} catch (\Throwable $th) {
    echo $th->getMessage();
}
