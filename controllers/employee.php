<?php

class employee extends controller {

    function __construct() {
        parent::__construct();
        $this->_view->content = "";
    }
    
    function index(){
        
        $this->_view->render('employee/index');
        
    }

}