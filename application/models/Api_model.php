<?php
class Api_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
       
    function  get_slokas()
    {
        $where=" WHERE status='Y' ";        
        $sql=" SELECT title,description,concat('/uploads/slokas/',attachment) as attachment FROM slokas_master  $where"; 
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function  get_img_details()
    {
        $where=" WHERE type='I' AND status='Y' ";
        
        $sql=" SELECT DATE_FORMAT(upload_date,'%d %b %Y') as udt,title,description,attachment FROM gallary_master  $where"; 
        $query = $this->db->query($sql);                
       
        return $query->result_array();
    }
    
    function  get_videos_details()
    {
        $where=" WHERE type='V' AND status='Y' ";
        
        $sql=" SELECT DATE_FORMAT(upload_date,'%d %b %Y') as udt,title,description,attachment,youtube_url FROM gallary_master  $where"; 
        $query = $this->db->query($sql);                
       
        return $query->result_array();
    }
    
    function  get_pooja_samagri_details()
    {
        $where=" WHERE status='Y' ";         
        $sql="select psm_id,DATE_FORMAT(upload_date,'%d %b %Y')  udt,psm_name,psm_image,psm_description From pooja_samagri_master $where ";
        $query = $this->db->query($sql);
        return $query->result_array();
    } 
    
    function  get_publication_details($type='')
    {
        $where=" WHERE status='Y' ";       
        
        if($type!="")
        {
            $where.=" AND type='".$type."' ";
        }
        
        $sql="select type,DATE_FORMAT(upload_date,'%d %b %Y')  udt,attachment,pdf_attachment,title,description From publications $where "; 
        $query = $this->db->query($sql);
        return $query->result_array();
    } 
    
    function  get_contact_details()
    {
        $where=" WHERE status='Y' ";   
        $sql="select lattitude,longitude,address From contact_us $where "; 
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function  get_achievements_details()
    {
        $where=" WHERE status='Y' ";  
        $sql="select type,achievement_year,upload_date,achievement_name,achievement_description,achievement_image From achievements $where "; 
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function  get_themes_details()
    {
        $where=" WHERE status='Y' ";  
        $sql="select day_id,header_color,body_color,footer_color From daywise_themes_master $where "; 
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
}
