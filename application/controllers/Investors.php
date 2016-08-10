<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Investors extends CI_Controller{


    var $currentModule="";
    var $title="";
   
    public function __construct() 
    {

		//exit(0);
		//ini_set('display_errors', 1);
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
        $this->load->model('Investor_model');
      
        //print_r($this->get_menu_data()); die;
    }
    
    public function index()
    {
    $this->load->view('header',$this->data);        
        $this->data['slokas_details']=$this->Investor_model->list_company_press();
        $this->load->view('Investors/view_details',$this->data);
        $this->load->view('footer');
    }

	public function view_annual_reports()
	{
		
		    $this->load->view('header',$this->data);        
        $this->data['slokas_details']=$this->Investor_model->view_annual_reports();
        $this->load->view('Investors/view_annual',$this->data);
        $this->load->view('footer');
		
	}
	
	
	public function annual_report()
	{
			
				$this->form_validation->set_rules('pname', 'Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			 $this->load->view('header',$this->data);        
        //$this->data['project_type']=$this->Investor_model->company_press_type();
        $this->load->view('Investors/add_annual');
        $this->load->view('footer');
		}
		else
		{
	
$this->data['investors']=$this->Investor_model->add_annual($_POST);
			
			 redirect('Investors/view_annual_reports');
			
		}

	
		
	}
	
	
	
	
	
	
		public function view_quarterly_reports()
	{
		
		    $this->load->view('header',$this->data);        
        $this->data['slokas_details']=$this->Investor_model->view_annual_reports();
        $this->load->view('Investors/view_annual',$this->data);
        $this->load->view('footer');
		
	}
	
	
	public function quarterly_report()
	{
			
				$this->form_validation->set_rules('pname', 'Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			 $this->load->view('header',$this->data);        
        $this->data['quarter_type']=$this->Investor_model->quarter_type();
        $this->load->view('Investors/add_quarterly');
        $this->load->view('footer');
		}
		else
		{
	
$this->data['investors']=$this->Investor_model->add_annual($_POST);
			
			 redirect('Investors/view_quarterly_reports');
			
		}

	
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	    public function add()
    {
    /*$this->load->view('header',$this->data);        
        $this->data['slokas_details']=$this->Investor_model->add_details();
        $this->load->view('Investors/add_details',$this->data);
        $this->load->view('footer');
		
		*/
		
		
		
		
				
		
				$this->form_validation->set_rules('pname', 'Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			 $this->load->view('header',$this->data);        
        $this->data['project_type']=$this->Investor_model->company_press_type();
        $this->load->view('Investors/add_details',$this->data);
        $this->load->view('footer');
		}
		else
		{
	
$this->data['investors']=$this->Investor_model->add($_POST);
			
			 redirect('Investors');
			
		}
		
		

		
    }
	
	
	

	
	
	

	

    
	
}

    