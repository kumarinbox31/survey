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
    function contact($page = 'index')
    {
        $data['result'] = $this->contact->get();
        $data['page_name'] = 'Contact Management';
        $this->render($this->type . '/contact/' . $page, $data);
    }
    function project($page = 'index')
    {
        $this->render($this->type . '/project/' . $page);
    }
    function survey($page = 'index')
    {
        $this->render($this->type . '/survey/' . $page);
    }
    function edit_project($page = 'index')
    {
        $this->render($this->type . '/project/' . $page);
    }
    function vendor($page = 'index')
    {
        $this->render($this->type . '/vendor/' . $page);
    }
    function statistices()
    {
        $this->render($this->type . '/project_statistices/statistices');
    }
    function user($page='index')
    {
        $this->render($this->type . '/user/'.$page);
    }
    function setting($page='index')
    {
        $this->render($this->type . '/setting/'.$page);
    }


    function ajax()
    {
        if ($post = $this->input->post()) {
            switch ($post['type']) {
                case 'deleteRow':
                    $this->db->where('id', $post['id'])->delete($post['table']);
                    $res['msg'] = 'Delete Successfully.';
                    break;
                default:
                    $res['msg'] = 'Something went wrong';
                    break;
            }
            echo json_encode($res);
        }
    }



}