<?php

class database_lib extends PDO {

    function __construct() {
        parent::__construct(config::$dsn, config::$user, config::$password);
    }

}