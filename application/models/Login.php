<?php 
class Login extends My_Model{
    protected $table = 'db_login';

    /**
     * Summary of config
     * @var array
     */
    public $config = [
        [
            'field' => 'type',
            'label' => 'Type',
            'rules' => 'required',
        ],
        [
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required',
        ],
        [
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required',
        ],
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required',
        ],
        [
            'field' => 'status',
            'label' => 'Status',
            'rules' => 'required',
        ],
    ];
    
}
