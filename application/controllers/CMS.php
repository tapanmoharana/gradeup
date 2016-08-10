<?php
class CMS extends CI_Controller 
{
    var $currentModule="";
    var $title="";
    private $skipActions=array("",""); 
    public function __construct() 
    {
        parent:: __construct();
        $this->load->helper("url");		
        $this->load->library('form_validation');
        
        if($this->uri->segment(2)!="" && $this->uri->segment(2)!="submit" && !in_array($this->uri->segment(2), $this->skipActions))
           $title=$this->uri->segment(2);                   //Second segment of uri for action,In case of edit,view,add etc.
       else
           $title=$this->master_arr['index'];
       
        
        $this->currentModule=$this->uri->segment(1);
        $this->data['currentModule']=$this->currentModule;
        
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->load->model('cms_model');
    }
    
    public function menu()
    {        
        $this->load->view("header");        
        $this->load->view("CMS/menu_master");
        $this->load->view("footer");
    }
    
    public function master_menu_selectbox()
    {
       $menu0=$this->cms_model->get_master_menu();
       $data['menu0']=$menu0;
       echo $this->load->view("CMS/master_menu_selectbox",$data,$data,true);
    }
    
    public function add_menu()
    {
        $postData=  $this->input->post();        
        $insert_array=array();
        
        $key_array=array('menu_type','menu_name','menu_icon','page_name','master_menu_item','master_sub_menu_item','option');
        foreach ($postData as $key => $value)
        {
            if(in_array($key, $key_array))
            {
                $$key  =  $value;       
            }            
        }      
         
        switch($menu_type)
        {
            case "master":
                $insert_array['item_name']=$menu_name;
                $insert_array['model']='Application';
                $insert_array['item_icon']=$menu_icon;
                $insert_array['menu_type']='item';                
                $insert_array['parent']='0';                
                $insert_array['child']='0';
                $insert_array['file_path']=$page_name;
                $insert_array['status']='0';
               // echo "<pre>";print_r($insert_array); die;
                $this->db->insert('lc_master_menu', $insert_array); 
                $last_inserted_id=$this->db->insert_id();
                if($last_inserted_id>0)
                {
                    echo "Y";
                }
                else
                {
                    echo "N";
                }
                
            break;
            case "sub":
                
                $menu1=  array_shift($this->cms_model->get_menu_by_id($master_menu_item));
                //print_r($menu1); die;
                $id        = $menu1['id'];
		 $item_name = $menu1['item_name'];
		 $model     = $menu1['model'];
		 $item_icon = $menu1['item_icon'];
		 $menu_type = $menu1['menu_type'];
		 $parent    = $menu1['parent'];
		 $child     = $menu1['child'];
		 $file_path = $menu1['file_path'];
		 $status    = $menu1['status'];
                 
                $child   = ($option == "item" ? $master_sub_menu_item : "0"  ); //// for create header or item on child filed
                $optionx = ($option == "item" ? "item" : "header"  );
                
                if($optionx!="header")
                {
                    $needPath= array_shift($this->cms_model->get_menu_by_id($master_menu_item));                    
                    $item_nameNeed=$needPath["item_name"];
                    //$sub_path=$item_nameNeed;
                    $sub_path=$page_name;
                }
                else
                {
                    $sub_path = $page_name;
                }
                
                $insert_array=array();
                $insert_array['item_name']=$menu_name;
                $insert_array['model']=$item_name;
                $insert_array['item_icon']=$menu_icon;
                $insert_array['menu_type']=$optionx;
                $insert_array['parent']=$id;
                $insert_array['child']=$child;
                $insert_array['file_path']= addslashes($sub_path);
                $insert_array['status']='0';
               
                $this->db->insert('lc_master_menu', $insert_array); 
                
                $last_inserted_id=$this->db->insert_id();
                if($last_inserted_id>0)
                {
                    echo "Y";
                }
                else
                {
                    echo "N";
                }
            break;
        }
    }
    public function get_child_menus()
    {
       $str="";
       $id=$this->input->get("parent");
       $menu=$this->cms_model->get_child_by_id($id);       
       //print_r($menu);
       $str.='<?xml version="1.0" encoding="UTF-8"?>';
       $str.='<root>';
       for($i=0;$i<count($menu);$i++)
       {

            $menu_child  = $menu[$i]['id'];
            $mmenu_name  = $menu[$i]['item_name'];
            $mmenu_icon  = $menu[$i]['item_icon'];
            $mmenu_level = $menu[$i]['parent'];
            $mmenu_id    = $menu[$i]['id'];
            $mmenu_type    = $menu[$i]['menu_type'];
            $mmenu_model    = $menu[$i]['model'];
            $str.= '<master_menu>';
            $str.= '<menu>';
            $str.= '<menu_name id="'.$mmenu_id.'"  menu_type="'.$mmenu_type.'"><![CDATA['.$mmenu_name.']]></menu_name>';
            $str.= '<menu_icon><![CDATA['.$mmenu_icon.']]></menu_icon>';
            $str.= '<menu_level><![CDATA['.$mmenu_level.']]></menu_level>';
            $str.= '<menu_model><![CDATA['.$mmenu_model.']]></menu_model>';
            $str.= '</menu>';
            $str.= '</master_menu>';
        }
            $str.='</root>';
            echo $str;
    }
    
}