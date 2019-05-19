<?php

Class Router {

    public static $routes = array();

    public static function get($route, $function){

        self::$routes[] = $route;

        $action = count(explode('/', $route)) != 1 ? explode('/', $route)[1] : '';

        if ($_GET['controller'] == $route || $_GET['controller'].'/'.$action == $route) {

            $target = explode('@', $function);

            $targetControllerClass = $target[0];
            $targetMethod = $target[1];

            if (file_exists('./../App/Controllers/'. $targetControllerClass .'.php')){
                require_once './../App/Controllers/'. $targetControllerClass .'.php';

                $parents = class_parents($targetControllerClass);

                if (in_array('Controller', $parents)){
                    if (method_exists($targetControllerClass, $targetMethod)){
                        return $targetControllerClass::$targetMethod();
                    } else {
                        echo 'Method "'. $targetMethod .'" not exist in the class '. $targetControllerClass;
                    }
                } else {
                    echo 'Base Controller not exist in the class '. $targetControllerClass;
                }

            } else {
                echo '"'.$target[0].'" controller not exist!';
            }

        }


    }

}