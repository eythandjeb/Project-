<?php

class Model extends database_lib {

    public $db;

    function __construct() {
        $this->db = new database_lib();
        unset($_POST['action']);
        $array_input = isset($_GET['data']) ? $_GET['data'] : null;
        $testget = strpos($array_input, "/");
        if ($testget != NULL) {
            $array_input = explode("/", $array_input);
            $this->inputs = $array_input;
        } else {
            $this->inputs = $_POST;
        }
    }

}
