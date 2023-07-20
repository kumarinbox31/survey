<?php
class Web extends My_Controller{
    
    function index() {
        // $this->render('web/index');
        redirect(site_url('login'));
    }
    function capture() {
        if($get = $_GET){
            extract($get);

            // url validation
            if(!isset($pid) || !isset($gid)){
                echo 'Invalid url.';
                return false;
            }

            // getting project vendor details 
            $get = $this->ProjectVendor->get(['id'=>$gid]);
            if(!$get->num_rows()){
                echo 'Invalid gid.';
                return false;
            }
            $row = $get->row();
            $project_id = $row->project_id;
            
            
            $project = $this->project->get(['id'=>$project_id]);
            // $vendor = $this->contact->get(['id'=>$pid]);
            if(!$project->num_rows()){
                echo  'Invalid Survey Id';
                return false;
            }
            // if(!$vendor->num_rows()){
            //     echo 'Invalid Vendor Id';
            //     return false;
            // }

            // IP Address Validation
            $ip = $_SERVER['REMOTE_ADDR'];
            $res = $this->response->get(['project_vendor_id'=>$gid,'ip_address'=>$ip,'panlist_id'=>$pid]);
            if($res->num_rows()){
                echo 'Already available ip address';
                return false;
            }
            // project details
            $project = $project->row();

            switch($project->project_status_id){
                case 1:
                    // running
                    $this->response->add(['project_vendor_id'=>$gid,'ip_address'=>$ip,'panlist_id'=>$pid,'status'=>'Redirected']);
                    $link = $project->survey_link;
                    $link = str_replace("{{RESP_ID}}",$gid,$link);
                    header("Location: $link");
                break;
                case 2:
                    // Testing
                    
                break;
                case 3:
                    echo 'Complete';return false;
                break;
                case 4:
                    echo 'Quota Full.';return false;
                break;
                case 5:
                    echo 'Hold';return false;
                break;
                case 6:
                    echo 'Closed';return false;
                break;
                
            }
           
        }
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

        }else{
            // redirect(base_url('/'));
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