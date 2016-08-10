<?php
class UserRoles extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    
    function  get_rolewise_user_list($roles_id='',$emp_id='')
    {
        $where=" WHERE 1=1 ";
        if($roles_id!="")
        {
            $where.=" AND rm.roles_id='".$roles_id."'";
        }
        if($emp_id!="")
        {
            $where.=" AND emp.id='".$emp_id."'";
        }
        $sql="SELECT emp.id,emp.emp_id,emp.role_id,emp.full_name,emp.designation,emp.contactno,rm.roles_name 
               FROM emp_details emp 
               INNER JOIN roles_master rm on rm.roles_id=emp.role_id
              $where";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function  get_roles($roles_id='')
    {
        $where=" WHERE 1=1 ";
        if($roles_id!="")
        {
            $where.=" AND rm.roles_id='".$roles_id."'";
        }       
        $sql="SELECT rm.roles_id,rm.roles_name
               FROM roles_master rm 
              $where";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function get_menus($parent=0,$child=0)
    {
       
        $sql="select * from lc_master_menu where parent='".$parent."' AND child='".$child."'";
        $query = $this->db->query($sql);
        $menu_array=array();
        $menu0=$query->result_array();
     
        for($i=0;$i<count($menu0);$i++)
        {
            $menu_array[$i]["id"]=$menu0[$i]["id"];
            $menu_array[$i]["item_name"]=$menu0[$i]["item_name"];
            $menu_array[$i]["menu_type"]=$menu0[$i]["menu_type"];
            $menu_array[$i]["parent"]=$menu0[$i]["parent"];
            $menu_array[$i]["child"]=$menu0[$i]["child"];
            $cur_parent=$menu0[$i]['id'];
            
            $sql2="select * from lc_master_menu where parent='".$cur_parent."' AND child='0'";
            $query2 = $this->db->query($sql2);
            $query2=$query2->result_array();
            for($j=0;$j<count($query2);$j++)
            {
                if(!empty($query2))
                {
                    $menu_array[$i]["submenu"][]=$query2[$j];
                    for($k=0;$k<count($query2);$k++)
                    {
                       $cur_parent= $query2[$k]['id'];
                        $sql3="select * from lc_master_menu where parent='".$menu0[$i]["id"]."' AND child='".$query2[$k]['id']."'";
                        $query3 = $this->db->query($sql3);
                        $query3=$query3->result_array();
                        $menu_array[$i]["submenu"][$j]["submenu2"]=$query3;
                    }
                }
            }
        }
        return $menu_array;
    }
    
    function allowed_menus($emp_id)
    {
        $where=" WHERE 1=1 ";
        
        if($emp_id!="")
        {
            $where.=" AND umr.emp_id='".$emp_id."'";
        }
        
        $sql="select distinct lmm.id
              from lc_master_menu lmm
              INNER JOIN user_menu_relation umr on umr.menu_id=lmm.id
              INNER JOIN roles_master rm on rm.roles_id=umr.role_id
              INNER JOIN emp_details emp on emp.id=umr.emp_id
              $where";
        
        $query = $this->db->query($sql);
        //echo "<pre>";  
        $array1=$query->result_array();
        $array2=array();        
        
        for($i=0;$i<count($array1);$i++)
        {
            $array2[]=$array1[$i]['id'];
        }
        return $array2;
        //return $query->result_array();
    }
    
    function rolewise_allowed_menus($role_id)
    {
        $where=" WHERE 1=1 ";
        
        if($role_id!="")
        {
            $where.=" AND umr.role_id='".$role_id."'";
        }
        
        $sql="select distinct lmm.id
              from lc_master_menu lmm
              INNER JOIN user_menu_relation umr on umr.menu_id=lmm.id
              INNER JOIN roles_master rm on rm.roles_id=umr.role_id              
              $where";
        
        $query = $this->db->query($sql);
        //echo "<pre>";  
        $array1=$query->result_array();
        $array2=array();        
        
        for($i=0;$i<count($array1);$i++)
        {
            $array2[]=$array1[$i]['id'];
        }
        return $array2;
        //return $query->result_array();
    }
    
    public function update()
    {
        $postData=$this->input->post();       
        $emp_id=$postData['emp_id'];
        $role_id=$postData['role_id'];
        $insert_array=array();        
       
        $this->db->trans_begin();

        $this->db->delete('user_menu_relation', array('emp_id' => $emp_id)); 
        for($i=0;$i<count($postData['menu']);$i++)
        {
            $insert_array[$i]["emp_id"]=$emp_id;
            $insert_array[$i]["role_id"]=$role_id;
            $insert_array[$i]["menu_id"]=$postData['menu'][$i];
            
            $insert_query = $this->db->insert_string('user_menu_relation', $insert_array[$i]);   
            $insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
                    
            $this->db->query($insert_query);
        }

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
                
        $this->load->view("header");              
        $this->load->view("UserRoles/ListView",$this->data);       
        $this->load->view("footer");
    }
}
