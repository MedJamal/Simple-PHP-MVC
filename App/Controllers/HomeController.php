<?php

class HomeController extends Controller {

    public function __construct($method, $params)
    {
        parent::__construct($method, $params);
        echo 'Home!Construct!';
    }

    public function init()
    {
        // TODO: Implement init() method.
    }

    public function index()
    {
        echo 'From Home!index ';
    }

    public function create()
    {
        echo 'From Home!create ';
    }

    public function edit(){
        var_dump($this->params);
        echo 'From Home!Edit ';
    }
}
