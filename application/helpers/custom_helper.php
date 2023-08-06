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

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function getLastInsertId($table) {
    $ci = &get_instance();
    $db_name = 'survey';
    // Get the current value of the auto-incremented column before inserting
    $query = $ci->db->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$db_name' AND TABLE_NAME = '$table'");
    $result = $query->row();
    $lastInsertId = $result->AUTO_INCREMENT;
    return $lastInsertId;
}
