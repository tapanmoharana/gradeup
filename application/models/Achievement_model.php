<?php
class Achievement_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    
    function  get_achievement_details($achi_id='')
    {
        $where=" WHERE 1=1 ";  
        
        if($achi_id!="")
        {
            $where.=" AND achi_id='".$achi_id."'";
        }
        
        $sql="select achi_id,type,upload_date udt,DATE_FORMAT(upload_date,'%d %b %Y') upload_date,achievement_year,achievement_name,achievement_description,achievement_image,status From achievements $where ";
        $query = $this->db->query($sql);
        return $query->result_array();
    } 

function get_contenttype($typeid='')
{
    		$this->db->select('*');
		$this->db->from('content_type');
		  if($typeid!="")
        {
           	$this->db->where('id',$typeid);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
			
}
 
    function  get_achievement_details_search($name='')
    {
        $where=" WHERE 1=1 ";  
        
        if($name!="")
        {
            $where.=" AND achievement_name like '%".$name."%'";
        }
        
        $sql="select achi_id,type,upload_date udt,DATE_FORMAT(upload_date,'%d %b %Y') upload_date,achievement_year,achievement_name,achievement_description,achievement_image,status From achievements $where ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}