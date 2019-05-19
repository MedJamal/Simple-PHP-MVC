<?php

abstract class Controller {

    protected $method;
    protected $params;

    public function __construct($method, $params){

        $this->method = $method;
        $this->params = $params;

//        echo 'base controller ';

//        var_dump($this);
    }

    public function loadMethod(){
        return $this->{$this->method}();
    }
}