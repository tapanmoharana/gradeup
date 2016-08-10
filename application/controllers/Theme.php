<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Theme extends CI_Controller 
{
    var $currentModule="";
    var $title="";
    var $tbl_name="daywise_themes_master";
    var $model_name="theme_model";
    var $array_name="theme_details";
    
    public function __construct() 
    {
        global $menudata;
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
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->load->model($this->model_name);
      
        //print_r($this->get_menu_data()); die;
    }
    
    public function index()
    {
        
    }
    
    public function view()
    {
        $this->load->view('header',$this->data);                        
        $this->data[$this->array_name]=$this->theme_model->get_theme_details();
        $this->load->view('Theme/view',$this->data);
        $this->load->view('footer');
    }
    public function edit()
    {
        $this->load->view('header');        
        $id=$this->uri->segment(3);
        $this->data[$this->array_name]=array_shift($this->theme_model->get_theme_details($id));                            
        $this->load->view('Theme/edit',$this->data);
        $this->load->view('footer');
    }
    
    public function submit()
    {
        $config=array(
                        array('field'   => 'header',
			'label'   => 'Header Color',
			'rules'   => 'trim|required'
			),
			array('field'   => 'body',
			'label'   => 'Body Color',
			'rules'   => 'trim|required'
			),
                        array('field'   => 'footer',
			'label'   => 'Footer Color',
			'rules'   => 'trim|required'
			)
                 );
        //print_r($this->input->post()); die; 
        $this->form_validation->set_rules($config);         
        $id=$this->input->post('id');
        
        if($id!="")
        {
            if ($this->form_validation->run() == FALSE)
            {                
                $this->load->view('header');        
                $id=$this->input->post("id");
                $this->data[$this->array_name]=array_shift($this->theme_model->get_theme_details($id));                            
                $this->load->view('Theme/edit',$this->data);
                $this->load->view('footer');
            }
            else
            {         
               
                $header=$this->input->post("header");               
                $body=$this->input->post("body");               
                $footer=$this->input->post("footer");       
                
                $update_array=array("header_color"=>$header,"body_color"=>$body,"footer_color"=>$footer,"updated_by"=>$this->session->userdata("uid"),"updated_datetime"=>date("Y-m-d H:i:s"));                                
                               
                $where=array("id"=>$id);
                $this->db->where($where);           
              //  echo $this->tbl_name; die;
                if($this->db->update($this->tbl_name, $update_array))
                {                    
                    redirect(base_url("Theme/view?error=0"));
                }
                else
                {  
                    redirect(base_url("Theme/view?error=1"));
                }
            }
        }      
    }
    public function disable()
    {
        $this->load->view('header');        
        $id=$this->uri->segment(3);   
        $update_array=array("status"=>"N");                                
        $where=array("id"=>$id);
        $this->db->where($where);
        
        if($this->db->update($this->tbl_name, $update_array))
        {
            redirect(base_url("Theme/view?error=0"));
        }
        else
        {
            redirect(base_url("Theme/view?error=1"));
        }  
        $this->load->view('footer');
    }
    
    public function enable()
    {
        $this->load->view('header');        
        $id=$this->uri->segment(3);   
        $update_array=array("status"=>"Y","updated_datetime"=>date("Y-m-d H:i:s"));                                
        $where=array("id"=>$id);
        $this->db->where($where);
        
        if($this->db->update($this->tbl_name, $update_array))
        {
            redirect(base_url("Theme/view?error=0"));
        }
        else
        {
            redirect(base_url("Theme/view?error=1"));
        }  
        $this->load->view('footer');
    }
}