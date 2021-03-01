<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getLogin($username)
    {
    	$this->db->where('uname',$username);
    	$this->db->or_where('email',$username);
    	return $this->db->get('tbl_users');
    }
}