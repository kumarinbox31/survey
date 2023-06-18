<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','user_agent','form_validation','session');

$autoload['drivers'] = array();

$autoload['helper'] = array('url','auth','cookie','custom');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('My_Model','contact','country','CompanyType','ContactGroup','project','login','logs');