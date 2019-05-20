<?php

class HomeController extends Controller {

    public function __construct($method, $params)
    {
        parent::__construct($method, $params);
    }

    public function init()
    {
        // TODO: Implement init() method.
    }

    public function index()
    {

        $userModel = new User();

        $users = $userModel->all();

        return $this->view('home/home', true, compact('users'));

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
