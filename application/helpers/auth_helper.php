<?php 

function checkLogin() {
    if(!get_cookie('login')){
        redirect(base_url('login.aspx'));
    }
}
function isUserActive() {
    if(get_cookie('login')){
        redirect(base_url('back'));
    }
}