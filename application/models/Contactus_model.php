<?php
class Contactus_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    
    function  get_contact_details($id='')
    {
        $where=" WHERE 1=1  ";               
        if($id!="")
        {
            $where.=" AND cu_id='".$id."'";
        }
        
        $sql="select cu_id,lattitude lat,longitude longt,address,status From contact_us $where "; 
        $query = $this->db->query($sql);
        return $query->result_array();
    }  
}