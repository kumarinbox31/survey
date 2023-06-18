<?php

class Back extends MY_Controller
{
    public $type;
    function __construct()
    {
        parent::__construct();
        $this->template = 'layout/back';
        $this->type = 'admin';
        // checkLogin();
    }

    function index()
    {
        redirect(base_url('back/dashboard'));
    }
    function dashboard()
    {
        $data['page_name'] = 'Dashboard';
        $this->render($this->type . '/index', $data);
    }
    function contact()
    {
        $data['page_name'] = 'Contact Management';
        $this->render($this->type . '/contact/index');
    }
    function project()
    {
        $this->render($this->type . '/project/project');
    }
    function survey()
    {
        $this->render($this->type . '/survey/survey');
    }
    function edit_project()
    {
        $this->render($this->type . '/project/edit_project');
    }
    function vendor()
    {
        $this->render($this->type . '/add_vendor/vendor');
    }
    function statistices()
    {
        $this->render($this->type . '/project_statistices/statistices');
    }
    function user()
    {
        $this->render($this->type . '/user/user');
    }
    function setting()
    {
        $this->render($this->type . '/setting/index');
    }






}