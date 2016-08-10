<?php
class Poojasamagri_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    
    function  get_pooja_samagri_details($psm_id='')
    {
        $where=" WHERE 1=1 ";   
        
        if($psm_id!="")
        {
            $where.=" AND psm_id='".$psm_id."'";
        }
        
        $sql="select psm_id,upload_date udt,psm_name,psm_image,psm_description,status From pooja_samagri_master $where ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function  get_pooja_samagri_details_search($name='')
    {
        $where=" WHERE 1=1 ";   
        
        if($name!="")
        {
            $where.=" AND psm_name like '%".$name."%'";
        }
        
        $sql="select psm_id,upload_date udt,psm_name,psm_image,psm_description,status From pooja_samagri_master $where ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }  
}