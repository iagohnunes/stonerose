<?php

namespace Routes;

namespace Routes;

use Src\Controller\LoginController;
use Src\Controller\UsersController;
use Src\Controller\CustomersController;
use Src\Controller\EstimatesController;
use UTIL\Session;
use Util\MessagesUtil;
use Util\ResponseUtil;

class Route
{

    private $loginController;

    private $usersController;

    private $customersController;

    private $estimatesController;

    private $session;

    private $message;

    private $response;

    public function __construct()
    {
        $this->loginController = new LoginController;
        $this->usersController = new UsersController;
        $this->customersController = new CustomersController;
        $this->estimatesController = new EstimatesController;
        $this->session = new Session;
        $this->message = new MessagesUtil;
        $this->response = new ResponseUtil;
    }

    public function redirectRequest($method, $route = null, $id = null, $params = null, $service = null)
    {

        if ($method == 'POST') {
            if ($route == 'login') {
                return $this->loginController->singIn();
            }
            if ($route == 'users' && $service == null) {
                return $this->usersController->createUser($params);
            }
            if($route == 'saveCustomer' && $service == null){
                return $this->customersController->newCustomer($params);
            }
            if($route == 'createEstimate'){
                return $this->estimatesController->newEstimate($params);
            }
        }


        // if ($this->session->validateToken()) {

        if ($method == "PUT" && $id !== null) {

            return $this->usersController->editUser($params);
        }

        if ($method == 'GET') {
            if ($route == 'customers' && $id == null) {
                return $this->customersController->getAllCustomers();
            }

            if ($route == 'users' && $id !== null) {
                return $this->usersController->getUser($id);
            }
            if ($route == 'getEstimates') {
                return $this->estimatesController->getAllEstimates();
            }
        }

        if ($method === "DELETE") {
            $this->usersController->delUser($id);
        }

        if ($method === "POST" && $route == 'logout') {
            $this->session->logout();
        }
        //} else {
        //   return $this->response->sendResponse($this->message->notAuthenticated());
        // }
    }
}
