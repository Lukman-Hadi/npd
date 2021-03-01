<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Global_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function insert($table, $data)
    {
    	return $this->db->insert($table, $data); 
    }

    //Insert Batch
    function insertbatch($table,$data){
        return $this->db->insert_batch($table, $data);
    }

    //Update Batch
    function updatebatch($table, $data, $where){
        return $this->db->update_batch($table, $data, $where);
    }

    function update($table, $data, $where)
    {
    	return $this->db->update($table, $data, $where); 
    }

    function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    function deleteBatch($table, $data){
        $this->db->where_in('_id',$data);
        return $this->db->delete($table);
    }
}