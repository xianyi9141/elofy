<?php

class AuthMiddleware
{
    protected $controller;
    protected $ci;
    public $roles = array();

    public function __construct($controller, $ci)
    {
        $this->controller = $controller;
        $this->ci = $ci;
    }

    public function run() {
        $verified = $this->controller->verifyJwtToken();

        if ($verified == false) {
            $this->controller->response(['message' => 'Unauthorized'], Api::HTTP_UNAUTHORIZED);
        }
    }
}
