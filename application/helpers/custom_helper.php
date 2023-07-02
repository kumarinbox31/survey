<?php 

function back_url(){
    return isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:base_url('back/dashboard');
}
function AB_ENCODE($inputString) {
    $encodedString = base64_encode($inputString);
    return $encodedString;
}

function AB_DECODE($inputString) {
    $decodedString = base64_decode($inputString);
    return $decodedString;
}
