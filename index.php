<?php

spl_autoload_register(function ($class) {
    if (file_exists("libs/$class.php")) {
        require_once "libs/$class.php";
    } else if (file_exists("controllers/$class.php")) {
        require_once "controllers/$class.php";
    } else {
        echo "$class not found";
        exit();
    }
}
);
setConfig();
$emp = new Bootstrap();
$emp->init();


function setConfig () {
    config::$dsn = 'mysql:dbname=PhpMySqlProject;host=localhost';
    config::$user = 'root';
    config::$password = '';

}