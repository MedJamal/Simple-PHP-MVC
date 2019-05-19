<?php

class AboutController extends Controller {

    public function __construct($method, $params)
    {
        parent::__construct($method, $params);
//        echo 'About!Construct!';
    }

    public function index()
    {
        echo 'About!index';
    }

    public function create()
    {
        echo 'About!create';
    }

    public function show()
    {
        echo 'About!create';
    }

    public function edit()
    {
        json_encode($this->params);
//        header('Content-Type', 'application/json');
        echo json_encode($_POST);
//        echo 'About!edit';
    }


}
