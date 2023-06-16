<?php 
class My_Model extends CI_Model{
    protected $table;

    function get($wh = []){
        return $this->db->get_where($this->table);
    }
}