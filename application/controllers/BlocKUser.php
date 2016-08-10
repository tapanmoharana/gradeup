<?php
class BlockUser extends CI_Controller {

    public function __construct() 
    {
        parent:: __construct();				
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->load->view('header');
        $data1['emp_data']=$this->login_model->get_all_user_list();
        $data1['blocked_user']=$this->login_model->get_blocked_user_list();
        //print_r($data1['blocked_user']); die;
        $this->load->view('BlockUser/index',$data1);
        $this->benchmark->mark('cat');
        $this->load->view('footer');        
    }
    
    public function block_user()
    {
        $post_data=  $this->input->post();
        $emp_id =isset($post_data['emp_id']) && $post_data['emp_id']!=""?$post_data['emp_id']:"";
        if($emp_id!="")
        {
            $data=array("status"=>'1');
            if($this->db->update('emp_details', $data, "id = '".$emp_id."'"))
            {
                echo "Y";
            }
            else 
            {
                echo "N";
            }
        }
        else 
        {
            echo "N";
        }
    }
    
     public function unblock_user()
    {
         
        $post_data=  $this->input->post();
        $emp_id =isset($post_data['emp_id']) && $post_data['emp_id']!=""?base64_decode($post_data['emp_id']):"";
        if($emp_id!="")
        {
            $data=array("status"=>'0');
            if($this->db->update('emp_details', $data, "id = '".$emp_id."'"))
            {
                echo "Y";
            }
            else 
            {
                echo "N";
            }
        }
        else 
        {
            echo "N";
        }
        
         
    }
}