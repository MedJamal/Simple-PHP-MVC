<?php

class UserController extends Controller {

    public function __construct($method, $params)
    {
        parent::__construct($method, $params);
    }

    public function init()
    {
        // TODO: Implement init() method.
    }

    public function add()
    {

        $name = $_POST['name'];

        $email = $_POST['email'];

        $password = $_POST['password'];

        $user = new User();

        return $user->insert($name, $email, $password);

    }

    public function delete()
    {
        $id= $this->params[0];

        $user = new User();

        $user->delete($id);

    }

}
