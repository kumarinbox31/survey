<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $template = 'layout/web';

    public function __construct()
    {
        parent::__construct();
    }

    public function render($view, $data = array())
    {
        $data['content'] = $this->load->view($view,$data,TRUE);
        $this->load->view($this->template,$data);
    }
}
