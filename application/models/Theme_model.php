<?php
class Theme_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    
    function  get_theme_details($id='')
    {
        $where=" WHERE 1=1 ";  
        
        if($id!="")
        {
            $where.=" AND id='".$id."'";
        }
        
        $sql="select * From daywise_themes_master $where ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }  
}