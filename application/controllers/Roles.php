<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller 
{
    var $currentModule="";
    var $title="";
   
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
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->load->model('Slokas_model');
      
        //print_r($this->get_menu_data()); die;
    }
    
    public function view()
    {
        $this->load->view('header',$this->data);        
        $this->data['roles_details']=$this->Roles_model->get_roles_details();
        $this->load->view('Roles/view',$this->data);
        $this->load->view('footer');
    }
}
