<?php
class Web extends My_Controller{
    
    function index() {
        $this->render('web/index');
    }
    function login() {
        $this->load->view('auth/login');
    }
    function error_404(){
        $this->load->view('auth/error_404');
    }
}