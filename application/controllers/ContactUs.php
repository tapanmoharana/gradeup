<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ContactUs extends CI_Controller 
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
        $this->load->model('contactus_model');
      
        //print_r($this->get_menu_data()); die;
    }
    
    public function index()
    {
        
    }
    
    public function add()
    {
        $this->load->view('header',$this->data);        
        $this->load->view('ContactUs/add',$this->data);
        $this->load->view('footer');
    }
    
    public function view()
    {
        $this->load->view('header',$this->data);        
        $this->data['contact_details']=$this->contactus_model->get_contact_details();                       
        $this->load->view('ContactUs/view',$this->data);
        $this->load->view('footer');
    }
    
    public function edit()
    {
        $this->load->view('header');        
        $cu_id=$this->uri->segment(3);
        $this->data['contact_details']=array_shift($this->contactus_model->get_contact_details($cu_id));                            
        $this->load->view('ContactUs/edit',$this->data);
        $this->load->view('footer');
    }    
    
    public function disable()
    {
        $this->load->view('header');        
        $cu_id=$this->uri->segment(3);   
        $update_array=array("status"=>"N");                                
        $where=array("cu_id"=>$cu_id);
        $this->db->where($where);
        
        if($this->db->update('contact_us', $update_array))
        {
            redirect(base_url("ContactUs/view?error=0"));
        }
        else
        {
            redirect(base_url("ContactUs/view?error=1"));
        }  
        $this->load->view('footer');
    }
    
    public function enable()
    {
        $this->load->view('header');        
        $cu_id=$this->uri->segment(3);   
        $update_array=array("status"=>"Y");                                
        $where=array("cu_id"=>$cu_id);
        $this->db->where($where);
        
        if($this->db->update('contact_us', $update_array))
        {
            redirect(base_url("ContactUs/view?error=0"));
        }
        else
        {
            redirect(base_url("ContactUs/view?error=1"));
        }  
        $this->load->view('footer');
    }
    
    public function submit()
    {
        $config=array(
                        array('field'   => 'lat',
			'label'   => 'Latitude',
			'rules'   => 'trim|required'
			),
                        array('field'   => 'longt',
			'label'   => 'Longitude',
			'rules'   => 'trim|required'
			),
			array('field'   => 'address',
			'label'   => 'Address',
			'rules'   => 'trim|required'
			)
                 );
        //print_r($this->input->post()); die;
        $this->form_validation->set_rules($config); 
        $id=$this->input->post('id');        
        
        if($id=="")
        {
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('header');
                $this->load->view('ContactUs/add',  $this->data);
                $this->load->view('footer');
            }
            else
            {                
                $lat=$this->input->post("lat");    
                $longt=$this->input->post("longt");               
                $address=  $this->input->post("address"); 
                
                $insert_array=array("lattitude"=>$lat,"longitude"=>$longt,"address"=>$address,"inserted_by"=>$this->session->userdata("uid"),"inserted_datetime"=>date("Y-m-d H:i:s"));                                
                $this->db->insert('contact_us', $insert_array); 
                $last_inserted_id=$this->db->insert_id();
                
                if($last_inserted_id)
                {
                    redirect(base_url("ContactUs/view?error=0"));
                }
                else
                {
                    redirect(base_url("ContactUs/view?error=1"));
                }
            }
        }
        else
        {
            if ($this->form_validation->run() == FALSE)
            {                
                $this->load->view('header');        
                $cu_id=$this->input->post("id");
                $this->data['contact_details']=array_shift($this->contactus_model->get_contact_details($cu_id));                            
                $this->load->view('ContactUs/edit',$this->data);
                $this->load->view('footer');
            }
            else
            {                  
               
                $dt=$this->input->post("dt");               
                $lat=$this->input->post("lat");                               
                $longt=$this->input->post("longt"); 
                $address=$this->input->post("address");                 
                $update_array=array("lattitude"=>$lat,"longitude"=>$longt,"address"=>$address,"updated_by"=>$this->session->userdata("uid"),"updated_datetime"=>date("Y-m-d H:i:s"));                                
                
                $where=array("cu_id"=>$id);
                $this->db->where($where);  
                
                if($this->db->update('contact_us', $update_array))
                {   
                    
                    redirect(base_url("ContactUs/view?error=0"));
                }
                else
                {  
                    redirect(base_url("ContactUs/view?error=1"));
                }
                echo $this->db->last_query(); die;
            }
        }      
    }    
}
?>