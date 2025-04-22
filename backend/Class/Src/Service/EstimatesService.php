<?php

namespace Src\Service;

use Src\Factory\EstimatesFactory;
use Util\Session;

class EstimatesService
{
    private $estimatesFactory;

    public function __construct()
    {
        $this->estimatesFactory = new EstimatesFactory;
        //$this->startSession = Session::start();
    }

    public function newEstimate($params)
    {
        try {
            if ($params["nome"] !== "" && $params["endereco"] !== "") {

                $date = \DateTime::createFromFormat('m/d/Y h:i A', $params["datetime"]);
                $datetime_mysql = $date->format('Y-m-d H:i:s');
                $status = 'Agendado';
                $this->estimatesFactory->newEstimate(
                    $params["name"],
                    $params["last_Name"],
                    $params["zip_code"],
                    $params["address"],
                    $params["email"],
                    $params["contact"],
                    $datetime_mysql,
                    $status
                );
            } else {
                throw new \Exception("allFieldRequired");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAllEstimates()
    {
        return $this->estimatesFactory->getAllEstimates();
    }
}
