<?php  

class Back extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->template = 'layout/back';
        // checkLogin();
    }

    function index(){
        $this->render('back/index');
    }
    function contact(){
        $this->render('back/contact/contact');
    }
    function project(){
        $this->render('back/project/project');
    }
    function survey(){
        $this->render('back/survey/survey');
    }
    function edit_project(){
        $this->render('back/project/edit_project');
    }
    function vendor(){
        $this->render('back/add_vendor/vendor');
    }
    function statistices(){
        $this->render('back/project_statistices/statistices');
    }
    function user(){
        $this->render('back/user/user');
    }






}