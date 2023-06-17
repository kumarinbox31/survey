<?php  

class Back extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->template = 'layout/back';
        checkLogin();
    }

    function index(){
        $this->render('back/index');
    }
}