<?php

namespace service;

use controller\Controller;

class Rout
{
    private $method;
    private $request;
    private $action;


    public function route($method, $request, $action)
    {
        $this->setMethod($method);
        $this->setRequest($request);
        $this->setAction($action);
        $this->execute();
    }


    public function compare()
    {

        if (!(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == $this->getMethod())) {
            return false;
        }

        if (!(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] == $this->getRequest())) {
            return false;
        }
        return true;
    }

    public function execute()
    {

        if ($_SERVER['REQUEST_URI'] == '/') {
            header("Location:/users");
        } else
            if (strpos($this->request, '{') !== false) {

                $paths = explode('/', $_SERVER['PATH_INFO']);
                $requests = explode('/', $this->request);

                if ($paths[1] == $requests[1]) {

                    $controller = new Controller();
                    $function = $this->getAction();
                    $id = $paths[2];
                    $controller->$function($id);
                }


            } else if ($this->compare()) {


                $controller = new Controller();
                $function = $this->getAction();
                $controller->$function();
            }

    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

}