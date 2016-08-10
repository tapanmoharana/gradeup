<?php
class Publications_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    
    function  get_publications_details($pub_id='')
    {
        $where=" WHERE 1=1 ";          
        if($pub_id!="")
        {
            $where.=" AND pub_id='".$pub_id."'";
        }        
        $sql="select pub_id,type,DATE_FORMAT(upload_date,'%d %b %Y') udt,upload_date dt,attachment,title,description,pdf_attachment,status From publications $where ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }  
    function  get_publications_details_search($title='')
    {
        $where=" WHERE 1=1 ";          
        if($title!="")
        {
            $where.=" AND title like '%".$title."%'";
        }        
        $sql="select pub_id,type,DATE_FORMAT(upload_date,'%d %b %Y') udt,upload_date dt,attachment,title,description,pdf_attachment,status From publications $where ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}