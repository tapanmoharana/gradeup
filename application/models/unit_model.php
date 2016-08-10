<?php
class Unit_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    
    function  get_units($id='')
    {
        $where=" WHERE 1=1 ";
        if($id!="")
        {
            $where.=" AND unit_id='".$id."'";
        }
        $sql="select * from material_unit_master $where";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function  get_company_details($comp_id='',$loc_id='')
    {
        $where=" WHERE 1=1";
        if($comp_id!="")
        {
            $where.=" AND cm.comp_id='".$comp_id."'";
        }
        if($loc_id!="")
        {
            $where.=" AND lm.loc_id='".$loc_id."'";
        }
        $sql=" SELECT cm. *,lm.location_name,lm.loc_id
                FROM company_master cm 
                INNER JOIN location_master lm on cm.location_id=lm.loc_id
                $where";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
