<?php

class Bootstrap {

    private $controller;
    private $method;
    private $params = array();
    private $request;

    private $targetController;
    private $targetMethod;

    public function __construct($request) {

        $url = explode('/', $request['url']);

        if(isset($url[0])){
            $this->controller = $url[0];
            if (isset($url[1])) {
                $this->method = $url[1];
            } else {
                $this->method = '';
            }
        } else {
            $this->controller = '';
        }

        $this->params = array_slice($url, 2);

//        var_dump($this->controller);
//
//        var_dump($this->method);
//
//        var_dump($this->params);
//
//        var_dump($request);

        $this->loadController();

    }

    public function loadController () {
        // check if route valid

        // Check if route exist and
        $classController = $this->getController();
//        echo $classController;
        if($classController == false){
            echo '<h1>Page not found 404!</h1>';
            return;
        }

        // Get Controller and Method
        $this->getTargetControllerAndMethod($classController);

        $classHasBeenLoaded = $this->loadClass($this->targetController, $this->targetMethod, $this->params);

        if($classHasBeenLoaded) {
            $classHasBeenLoaded->loadMethod();
        }

    }

    private function getController(){

        $routes = [
            ''                      => 'HomeController@index',
            'home/create'           => 'HomeController@create',
            'home/edit/3/4/edit'    => 'HomeController@edit',

            'about'                 => 'AboutController@index',
            'about/show'            => 'AboutController@show',
            'about/edit'         => 'AboutController@edit',

            'post'                  => 'PostController@index',
            'post/3/edit'           => 'PostController@edit'
        ];

        $route = '';

        if(! $this->controller == "") {
            $route = $this->controller;
            if (! $this->method == "") {
                $route = $this->controller.'/'.$this->method;
//                if(! $this->params == ""){
//                    $route = $this->controller.'/'.$this->method.'/'. join('/', $this->params);
//                }
            }
        }

//        echo $route;

        if (array_key_exists($route, $routes)){
//            echo 'true '.$routes[$route];
            return $routes[$route];
        } else {
            return false;
        }

    }

    private function getTargetControllerAndMethod($classController){

        $targetControllerAndMethod = explode('@', $classController);

        $this->targetController = $targetControllerAndMethod[0];
        $this->targetMethod = $targetControllerAndMethod[1];

    }

    private function loadClass($controller, $method, $params){

        if (class_exists($controller)){
            $baseClass = class_parents($controller);
            if (in_array('Controller', $baseClass)){
                if (method_exists($controller, $method)){
                    return new $controller($method, $params);
                } else {
                    echo '<h1>Method '. $method .' not exist!</h1>';
                    return false;
                }
            } else {
                echo '<h1>Base controller of '. $controller .' not exist!</h1>';
                return false;
            }
        } else {
            echo '<h1>Class controller '. $controller .' not exist!</h1>';
            return false;
        }

    }

}