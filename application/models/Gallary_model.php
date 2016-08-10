<?php
class Gallary_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    
    function  get_images_details($gid='')
    {
        $where=" WHERE type='I' ";  
        
        if($gid!="")
        {
            $where.=" AND gid='".$gid."'";
        }
        
        $sql="select  gid,DATE_FORMAT(upload_date,'%d %b %Y') upload_date,upload_date udt ,title,description,attachment,status From gallary_master $where";
        $query = $this->db->query($sql);
        return $query->result_array();
    }  
    
    function  get_images_details_search($title='')
    {
        $where=" WHERE type='I' ";  
        
        if($title!="")
        {
            $where.=" AND title like '%".$title."%'";
        }
        
        $sql="select  gid,DATE_FORMAT(upload_date,'%d %b %Y') upload_date,upload_date udt ,title,description,attachment,status From gallary_master $where";
        $query = $this->db->query($sql);
        return $query->result_array();
    } 
    
    function  get_videos_details($gid='')
    {
        $where=" WHERE type='V' ";       
        
        if($gid!="")
        {
            $where.=" AND gid='".$gid."'";
        }
        
        $sql="select  gid,DATE_FORMAT(upload_date,'%d %b %Y') upload_date,upload_date udt,title,description,attachment,youtube_url,status From gallary_master $where";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function  get_videos_details_search($title='')
    {
        $where=" WHERE type='V' ";       
        
        if($title!="")
        {
            $where.=" AND title like '%".$title."%'";
        }
        
        $sql="select  gid,DATE_FORMAT(upload_date,'%d %b %Y') upload_date,upload_date udt,title,description,attachment,youtube_url,status From gallary_master $where";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}