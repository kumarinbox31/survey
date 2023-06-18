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
}
