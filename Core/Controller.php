<?php

abstract class Controller {

    protected $method;
    protected $params;
    protected $data;

    public function __construct($method, $params){

        $this->method = $method;
        $this->params = $params;
        
    }

    public function loadMethod(){
        return $this->{$this->method}();
    }

    public function view($view, $default, $data = false){

        if ($data){

            extract($data);
        }

        if ($default == true) {
            return require './../Resources/Views/default.php';
        } else {
            return require './../Resources/Views/'.$view.'.php';
        }

    }

}