<?php

class Back extends MY_Controller
{
    public $type;
    function __construct()
    {
        parent::__construct();
        $this->template = 'layout/back';
        $this->type = 'admin';
        checkLogin();
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
    function contact($page = 'index', $id = 0)
    {
        if ($id) {
            $data['row'] = $this->contact->get(['id' => $id]);
            $data['id'] = $id;
        } else {
            $data['result'] = $this->contact->get();
        }

        $data['page_name'] = 'Contact Management';
        if ($post = $this->input->post()) {
            $action = $post['action'];
            unset($post['action']);
            switch ($action) {
                case 'add':
                    $config = $this->contact->config;
                    $this->form_validation->set_rules($config);
                    $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
                    if ($this->form_validation->run() == false) {
                        $this->render($this->type . '/contact/' . $page, $data);
                    } else {
                        $this->contact->add($post);
                        $this->session->set_flashdata('success_msg', 'Contact Added Successfully.');
                        redirect(current_url());
                    }
                    break;
                case 'update':
                    $config = $this->contact->config;
                    $this->form_validation->set_rules($config);
                    $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
                    if ($this->form_validation->run() == false) {
                        $this->render($this->type . '/contact/' . $page, $data);
                    } else {
                        $this->contact->update(['id'=>$post['id']],$post);
                        $this->session->set_flashdata('success_msg', 'Contact ('.$post['company_name'].') Updated Successfully.');
                        redirect(current_url());
                    }
                    break;
            }
        } else {
            $this->render($this->type . '/contact/' . $page, $data);
        }
    }
    function project($page = 'index', $id = 0)
    {
        if ($id) {
            $data['row'] = $this->project->get(['id' => $id]);
            $data['id'] = $id;
        } else {
            $data['result'] = $this->project->get();
        }

        $data['page_name'] = 'Project Management';
        if ($post = $this->input->post()) {
            $action = $post['action'];
            unset($post['action']);
            switch ($action) {
                case 'add':
                    $config = $this->project->config;
                    $this->form_validation->set_rules($config);
                    $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
                    if ($this->form_validation->run() == false) {
                        $this->render($this->type . '/project/' . $page, $data);
                    } else {
                        $this->project->add($post);
                        $this->session->set_flashdata('success_msg', 'Project ('.$post['project'].') Added Successfully.');
                        redirect(current_url());
                    }
                    break;
                case 'update':
                    $config = $this->project->config;
                    $this->form_validation->set_rules($config);
                    $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
                    if ($this->form_validation->run() == false) {
                        $this->render($this->type . '/project/' . $page, $data);
                    } else {
                        $this->project->update(['id'=>$post['id']],$post);
                        $this->session->set_flashdata('success_msg', 'Project ('.$post['project'].') Updated Successfully.');
                        redirect(current_url());
                    }
                    break;
            }
        } else {
            $this->render($this->type . '/project/' . $page, $data);
        }
    }
    function survey($page = 'index')
    {
        $this->render($this->type . '/survey/' . $page);
    }
    function vendor($page = 'index')
    {
        $this->render($this->type . '/vendor/' . $page);
    }
    function statistices()
    {
        $this->render($this->type . '/project_statistices/statistices');
    }
    function user($page = 'index')
    {
        $this->render($this->type . '/user/' . $page);
    }
    function setting($page = 'index')
    {
        $this->render($this->type . '/setting/' . $page);
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

    function logout() {
        delete_cookie('login');
        delete_cookie('login_user_id');
        delete_cookie('login_user_type');
        redirect(base_url());
    }


}