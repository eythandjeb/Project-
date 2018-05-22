<?php

class controller extends Bootstrap{
    public $_model;
    protected $_view;
    public $_data;

    function __construct() {
        parent::__construct();
        $this->_view = new View();
        $this->_data = $this->data;
    }
    
    public function LoadModel ($name){
        $path = "model/" . $name . "_Model.php";
        if (file_exists($path)){
            require_once $path;
            $model_name = $name ."_Model";
            $this->_model = new $model_name();
        }
    }

}
