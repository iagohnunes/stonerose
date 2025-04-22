<?php

namespace Src\Controller;

use Src\Service\EstimatesService;
use Util\JsonUtil;
use Util\MessagesUtil;
use Util\ResponseUtil;

class EstimatesController
{

    private $messages;

    private $response;

    private $estimateService;

    public function __construct()
    {
        $this->estimateService = new EstimatesService;
        $this->messages = new MessagesUtil;
        $this->response = new ResponseUtil;
    }

    public function newEstimate($params)
    {   
        try {
            $this->estimateService->newEstimate($params);
            return $this->response->sendResponse($this->messages->messageSuccess());
        } catch (\Throwable $th) {
            $e = $th->getMessage();
            return $this->response->sendResponse($this->messages->$e());
        }
    }

    public function getAllEstimates()
    {   
        try {
           return $this->response->sendResponse($this->estimateService->getAllEstimates());
        } catch (\Throwable $th) {
            $e = $th->getMessage();
            return $this->response->sendResponse($this->messages->$e());
        }
    }
}
