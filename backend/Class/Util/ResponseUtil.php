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
        
        echo json_encode($response); 
    }
}
