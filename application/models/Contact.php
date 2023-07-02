<?php
class Contact extends My_Model
{
    protected $table = 'contact';

    /**
     * Summary of config
     * @var array
     */
    public $config = [
        [
            'field' => 'company_name',
            'label' => 'Company Name',
            'rules' => 'required',
        ],
        // [
        //     'field' => 'company_type_id',
        //     'label' => 'Company Type',
        //     'rules' => 'required',
        // ],
        [
            'field' => 'contact_group_id',
            'label' => 'Contact Group',
            'rules' => 'required',
        ],
        [
            'field' => 'person_name',
            'label' => 'Person Name',
            'rules' => 'required',
        ],
        [
            'field' => 'position',
            'label' => 'Position',
            'rules' => 'required',
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required',
        ],
        [
            'field' => 'phone',
            'label' => 'Phone',
            'rules' => 'required',
        ],
        [
            'field' => 'address',
            'label' => 'Address',
            'rules' => 'required',
        ],
        [
            'field' => 'country_id',
            'label' => 'Country',
            'rules' => 'required',
        ],
        [
            'field' => 'status',
            'label' => 'Status',
            'rules' => 'required',
        ],

    ];
}