<?php

namespace Util;

class ResponseUtil
{
    public function sendResponse($data)
    {
        $response = array(
            "dataSet" => $data
        );
        header('Content-Type: application/json');
        error_log(json_encode($response));
        echo json_encode($response); 
    }
}
