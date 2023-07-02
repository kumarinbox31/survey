<?php
class Web extends My_Controller{
    
    function index() {
        // $this->render('web/index');
        redirect(site_url('login'));
    }
    function endcapture(){
        if($get = $_GET){
            $a = $get['a'];
            if ($a == 1) {
                $msg = "Thank You For Completing This Survey.";
                $color = 'green';
            } elseif ($a == 2) {
                $msg = "Thank you for your participations, but unfortunately you did not qualify for this survey.";
                $color = 'red';
            } elseif ($a == 3) {
                $msg = "Thank you for your participations, but we have met the required audience.";
                $color = 'orange';
            }  
            
            echo "<h1 style='text-align:center;color:$color;'>$msg</h1>";

        }

        
    }
    function login() {
        isUserActive();
        if($post = $this->input->post()){
            $get = $this->login->get(['username'=>$post['username'],'password'=>$post['password']]);
            if($get->num_rows()){
                $type = 'admin';
                $id = 1;
                $time = time();
                // admin logged in successfully.
                set_cookie('login',true,$time+86400);
                set_cookie('login_user_id',1,$time+86400);
                set_cookie('login_user_type','admin',$time+86400);

                // creating login  for admin login
                $ins = $this->logs->add(['title'=>'Admin Login','description'=>'Admin logged in at '.date('d-m-Y h:i:s A',$time).' ']);
                if(!$ins){
                    print_r($this->db->error());exit;
                }
                $res['status'] = 1;
            }else{
                $res['status'] = 0;
            }
            echo json_encode($res);
        }else{
            $this->load->view('auth/login');
        }
    }
    function error_404(){
        $this->load->view('auth/404');
    }
}