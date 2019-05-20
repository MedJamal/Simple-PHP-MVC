<?php

require_once './../Config/config.php';

function __autoload($class_name) {

    if (file_exists('./../Core/'.$class_name.'.php')){

        require_once './../Core/'.$class_name.'.php';

    } else if (file_exists('./../App/Controllers/'.$class_name.'.php')){

        require_once './../App/Controllers/'.$class_name.'.php';

    } else if (file_exists('./../App/Models/'.$class_name.'.php')){

        require_once './../App/Models/'.$class_name.'.php';

    }

}

$bootstrap = new Bootstrap($_GET);