<?php

/**
 * Summary of Back
 */
class Back extends MY_Controller
{
    /**
     * Summary of type
     * @var 
     */
    public $type;
    /**
     * Summary of __construct
     */
    function __construct()
    {
        parent::__construct();
        $this->template = 'layout/back';
        $this->type = 'admin';
        checkLogin();
    }

    /**
     * Summary of index
     * @return void
     */
    function index()
    {
        redirect(base_url('back/dashboard'));
    }

    function vendor($pid, $page = 'add_vendor', $vid = 0)
    {
        $data['project'] = $this->project->get(['id' => $pid])->row();
        $data['project_vendor'] = $this->ProjectVendor->get(['id' => $vid])->row();
        if ($post = $this->input->post()) {
            $this->ProjectVendor->add($post);
            $this->session->set_flashdata('success_msg', 'Vendor Added Successfully.');
            redirect(base_url('back/project/edit/') . $pid);
        } else {
            $this->render($this->type . '/project/' . $page, $data);
        }
    }
    /**
     * Summary of dashboard
     * @return void
     */
    function dashboard()
    {
        $data['page_name'] = 'Dashboard';
        $this->render($this->type . '/index', $data);
    }
    /**
     * Summary of contact
     * @param mixed $page
     * @param mixed $id
     * @return void
     */
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
                        $this->contact->update(['id' => $post['id']], $post);
                        $this->session->set_flashdata('success_msg', 'Contact (' . $post['company_name'] . ') Updated Successfully.');
                        redirect(current_url());
                    }
                    break;
            }
        } else {
            $this->render($this->type . '/contact/' . $page, $data);
        }
    }
    /**
     * Summary of project
     * @param mixed $page
     * @param mixed $id
     * @return void
     */
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
                        $ins = $this->project->add($post);
                        if (!$ins) {
                            print_r($this->db->error());
                            exit;
                        }
                        // getting project id 
                        $pid = $this->db->insert_id();
                        // upload unique links
                        if (isset($_FILES['unique_links']) && $_FILES['unique_links']['name'] != '') {
                            
                        }
                        // upload keys
                        if (isset($_FILES['keys']) && $_FILES['keys']['name'] != '') {

                        }
                        // add internal companies as vendor
                        $get = $this->contact->get(['contact_group_id'=>2]);
                        if($get->num_rows()){
                            foreach($get->result() as $row){
                                $data = [
                                    'project_id' => $pid,
                                    'vendor' => $row->id,
                                    'cpc_cpi' => $post['cpi_cpc'],
                                    'req_complete' => $post['no_of_complete']
                                ];
                                $ins = $this->ProjectVendor->add($data);
                                if(!$ins){
                                    print_r($this->db->error());
                                }
                            }
                        }
                        $this->session->set_flashdata('success_msg', 'Project (' . $post['project_name'] . ') Added Successfully.');
                        redirect(current_url());
                    }
                    break;
                case 'update':
                    unset($post['DataTables_Table_0_length']);
                    $config = $this->project->config;
                    $this->form_validation->set_rules($config);
                    $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
                    if ($this->form_validation->run() == false) {
                        $this->render($this->type . '/project/' . $page, $data);
                    } else {
                        $ins = $this->project->update(['id' => $post['id']], $post);
                        if(!$ins){
                            print_r($this->db->error());exit;
                        }
                        
                        // getting project id 
                        $pid = $post['id'];
                        // upload unique links
                        if ($_FILES['unique_links']['name'] != '') {

                        }
                        // upload keys
                        if ($_FILES['keys']['name'] != '') {

                        }
                        $this->session->set_flashdata('success_msg', 'Project (' . $post['project_name'] . ') Updated Successfully.');
                        redirect(current_url());
                    }
                    break;
            }
        } else {
            $this->render($this->type . '/project/' . $page, $data);
        }
    }
    /**
     * Summary of survey
     * @param mixed $page
     * @return void
     */
    function survey($page = 'index')
    {
        $this->render($this->type . '/survey/' . $page);
    }

    /**
     * Summary of statistices
     * @return void
     */
    function statistices()
    {
        $this->render($this->type . '/project_statistices/statistices');
    }
    /**
     * Summary of user
     * @param mixed $page
     * @return void
     */
    function user($page = 'index', $id = 0)
    {
        if ($id) {
            $data['row'] = $this->login->get(['id' => $id]);
            $data['id'] = $id;
        } else {
            $data['result'] = $this->login->get();
        }
        if ($post = $this->input->post()) {
            $action = $post['action'];
            unset($post['action']);
            switch ($action) {
                case 'add':
                    $config = $this->login->config;
                    $this->form_validation->set_rules($config);
                    $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
                    if ($this->form_validation->run() == false) {
                        $this->render($this->type . '/user/' . $page, $data);
                    } else {
                        $this->login->add($post);
                        $this->session->set_flashdata('success_msg', 'User Added Successfully.');
                        redirect(current_url());
                    }
                break;
                case 'update':
                    $config = $this->login->config;
                    $this->form_validation->set_rules($config);
                    $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
                    if ($this->form_validation->run() == false) {
                        $this->render($this->type . '/user/' . $page, $data);
                    } else {
                        $this->login->update(['id' => $post['id']], $post);
                        $this->session->set_flashdata('success_msg', 'User Details Updated Successfully.');
                        redirect(current_url());
                    }
                break;
            }
        } else {
            $this->render($this->type . '/user/' . $page, $data);
        }
    }
    /**
     * Summary of setting
     * @param mixed $page
     * @return void
     */
    function setting($page = 'index')
    {
        $this->render($this->type . '/setting/' . $page);
    }


    /**
     * Summary of ajax
     * @return void
     */
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

    /**
     * Summary of logout
     * @return void
     */
    function logout()
    {
        delete_cookie('login');
        delete_cookie('login_user_id');
        delete_cookie('login_user_type');
        redirect(base_url());
    }


}