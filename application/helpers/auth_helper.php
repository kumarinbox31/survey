<?php 

function checkLogin() {
    if(!config_item('login')){
        redirect(base_url('login.aspx'));
    }
}