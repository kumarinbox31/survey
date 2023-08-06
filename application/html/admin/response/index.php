<?php

$html  = 'Record not found.';
$get = $this->response->get(['project_vendor_id'=>$post['id'],'status'=>$post['rType']]);
if($get->num_rows()){
    $result = $get->result();
    $html = "
            <table  class='table table-bordered table-striped'>
            <thead>
                <
            </thead>
            </table>
        ";
}