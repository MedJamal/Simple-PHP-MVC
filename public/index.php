<?php

require_once './../Core/Routes.php';

function __autoload($class_name) {
    if (file_exists('./../Core/'.$class_name.'.php')){
        require_once './../Core/'.$class_name.'.php';
    }
    else if (file_exists('./../App/Controllers/'.$class_name.'.php')){
        require_once './../App/Controllers/'.$class_name.'.php';
    }
}

//require_once './../Core/Bootstrap.php';

//echo print_r($_SERVER['REQUEST_URI']);

//echo print_r($_GET);

$bootstrap = new Bootstrap($_GET);


//echo json_encode($_SERVER);