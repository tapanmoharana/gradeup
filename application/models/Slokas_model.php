<?php
class Slokas_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
       
    function  get_slokas_details($slok_id='')
    {
        $where=" WHERE 1=1 ";
        if($slok_id!="")
        {
            $where.=" AND sid='".$slok_id."'";
        }
        $sql=" SELECT * FROM slokas_master  $where";
        $query = $this->db->query($sql);                
        return $query->result_array();
    }
    
    function  get_slokas_details_search($title='')
    {
        $where=" WHERE 1=1 ";
        if($title!="")
        {
            $where.=" AND title like '%".$title."%'";
        }
        $sql=" SELECT * FROM slokas_master  $where";
        $query = $this->db->query($sql);                
        return $query->result_array();
    }
}
