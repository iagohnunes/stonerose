<?php

namespace Validator;

use Util\GenericConstantsUtil;
use Util\RoutesUtil;
use Routes\Route;
use Util\JsonUtil;

class RequestValidator
{

    private $routesUtil;

    private $route;

    private $method;

    private $id;

    private $routes;

    private $service;

    public function __construct()
    {
        $this->routesUtil   = new RoutesUtil;
        $this->route        = $this->routesUtil->getRoutes()['route'];
        $this->method       = $this->routesUtil->getRoutes()['method'];
        $this->id           = $this->routesUtil->getRoutes()['id'];
        $this->service      = $this->routesUtil->getRoutes()['service'];
        $this->routes       = new Route;
    }
    
    public function processRequest()
    {
        $msg = utf8_encode(GenericConstantsUtil::ERROR_MSG_ROUTE_TYPE);
        if (in_array($this->method, GenericConstantsUtil::REQUEST_TYPE)) {
            return $this->routes->redirectRequest($this->method, $this->route, $this->id, JsonUtil::bodyRequest(), $this->service);
        }
        return $msg;
    }
}
