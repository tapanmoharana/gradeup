<?php
class Roles_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    
    function  get_locations($id='')
    {
        $where=" WHERE 1=1 ";
        if($id!="")
        {
            $where.=" AND loc_id='".$id."'";
        }
        $sql="select * from location_master $where";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function  get_roles_details($comp_id='')
    {
        $where=" WHERE 1=1 ";
        if($comp_id!="")
        {
            $where.=" AND roles_id='".$comp_id."'";
        }
        $sql=" SELECT * FROM roles_master  $where";
        $query = $this->db->query($sql);                
        return $query->result_array();
    }
}
