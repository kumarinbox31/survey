<?php 
class My_Model extends CI_Model{
    protected $table;

    public function get($wh = []){
        return $this->db->get_where($this->table,$wh);
    }
    public function add($data){
        if(function_exists('boot')){
            $data = $this->boot($data,'insert');
        }
        return $this->db->insert($this->table,$data);
    }
    public function update($wh,$data){
        if(function_exists('boot')){
            $data = $this->boot($data,'update');
        }
        return $this->db->where($wh)->update($this->table,$data);
    }
    public function  delete($wh){
        return $this->db->where($wh)->delete($this->table);
    }


    
    protected function boot($data,$type='') {
        if($type == 'insert'){

        }
        if($type == 'update'){

        }
        return $data;
    }
}