<?php

class database extends controller {

    function __construct() {
        $this->LoadModel(__CLASS__);
        parent::__construct();
    }

    public function Create() {

        $result = $this->_model->create();
        if (is_array($result)) {
            $this->_view->messages = $result;
            $this->_view->content = "";
        } else {
            $this->_view->content = $result;
        }
        $this->_view->render('employee/index');
    }

    public function Update() {
        $result = $this->_model->update();
        $this->_view->content = $result;
        $this->_view->render('employee/index');
    }

    public function GetAll() {
        $result = $this->_model->getAll();
        $this->_view->content = $this->_view->publishTable($result);
        $this->_view->render('employee/index');
    }

    public function Get() {
        if (isset($_POST['get']))
            ;
        
        
        $result = $this->_model->get();
        $this->_view->content = $this->_view->publishTable($result);
        $this->_view->render('employee/index');
    }

    public function delete() {
        $result = $this->_model->delete($this->_data[2]);
        $this->_view->content = $this->_view->publishTable($result);
        $this->_view->render('employee/index');
    }

    public function edit() {
        $result = $this->_model->get();

        $this->_view->id = $result[0]['id'];
        $this->_view->name = $result[0]['name'];
        $this->_view->hiredate = $result[0]['hiredate'];
        $this->_view->content = "";
        $this->_view->render('employee/index');
    }

}
