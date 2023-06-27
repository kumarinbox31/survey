<?php 
class Project extends My_Model{
    protected $table = 'db_project';
    
    /**
     * Summary of config
     * @var array
     */
    public $config = [
        [
            'field' => 'project_name',
            'label' => 'Project Name',
            'rules' => 'required',
        ],
        [
            'field' => 'project_status',
            'label' => 'Project Status',
            'rules' => 'required',
        ],
    ];

    public function getProjectId(){
        $db = $this->db->database;
        $sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$db' AND TABLE_NAME = '$this->table'";
        $get = $this->db->query($sql);
        return $get->row()->AUTO_INCREMENT;
    }
}
