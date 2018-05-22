<?php

class Bootstrap {

    const CONTROLLER = 0;
    const ACTION = 1;
    const ID = 2;
    const NAME = 3;
    const HIREDATE = 4;

    private $_controller = null;
    private $_action = null;
    private $_currentController = null;
    private $_currentAction = null;
    public $id = null;
    public $name = null;
    public $hiredate = null;
    protected $data = null;

   function __construct() {
        $get_controller = isset($_GET['data']) ? $_GET['data'] : 'employee';
        $pos = strpos($get_controller, "/"); //check if came from an edit button
        if ($pos !== false) {
            $get_controller = explode("/", $get_controller);
            $this->data = $get_controller;
        } else {
            $data = [];
            $get_action = isset($_POST['action']) ? $_POST['action'] : 'index';
            $data = $this->build_data($data, $get_controller, $get_action);
            $this->data = $data;
        }
    }

    public function build_data($array, $get_1, $get_2) {
        if ($get_1) {
            array_push($array, $get_1);
        }
        if ($get_2) {
            array_push($array, $get_2);
        }

        return $array;
    }

    public function init() {
        $this->_parseParams();
        if ($this->_CreateController() == TRUE) {
            $this->_execute();
        }
    }

    private function _parseParams() {
        $this->_controller = isset($this->data[self::CONTROLLER]) ? $this->data[self::CONTROLLER] : 'employee';
        $this->_action = isset($this->data[self::ACTION]) ? $this->data[self::ACTION] : 'index';
        $this->id = isset($this->data[self::ID]) ? $this->data[self::ID] : '';
        $this->name = isset($this->data[self::NAME]) ? $this->data[self::NAME] : '';
        $this->hiredate = isset($this->data[self::HIREDATE]) ? $this->data[self::HIREDATE] : '';
    }

    private function _CreateController() {
        $file = "controllers/$this->_controller.php";
        if (file_exists($file)) {
            $this->_currentController = new $this->_controller;
            return TRUE;
        } else {
            echo "error";
        }
    }

    private function _execute() {
        if (method_exists($this->_currentController, $this->_action)) {
            $this->_currentAction = $this->_currentController->{$this->_action}();
        }
    }

}
