<?php 

function back_url(){
    return isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:base_url('back/dashboard');
}