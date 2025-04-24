<?php
// CORS
header("Access-Control-Allow-Origin: *"); // ou coloque o domínio específico
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

use Util\RoutesUtil;
use Validator\RequestValidator;
use Util\ResponseUtil;

include 'bootstrap.php';

try {
    $response = new ResponseUtil();
    $RequestValidator = new RequestValidator(RoutesUtil::getRoutes());
    $response->sendResponse($RequestValidator->processRequest());
    // return $RequestValidator->processRequest();

} catch (\Throwable $th) {
    echo $th->getMessage();
}