<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }
    public function index()
    {
        $data['msg'] = '';	
        if($this->input->post('submit'))
        {
            $user = $this->security->xss_clean($this->input->post('signin_username'));
            $pass = $this->security->xss_clean($this->input->post('signin_password'));
            $adminRec = array_shift($this->login_model->get_user($user,$pass));
            //print_r($adminRec); die;
            if(sizeof($adminRec)>0)
            {
                if($adminRec->status=='Y')
                {
                    $array = array('name'  => $adminRec->user_fullname,
                                    'uid'     => $adminRec->user_id,
                                    'role_id'=>$adminRec->role_id,
                                    'logged_in' => TRUE);
                    $this->session->set_userdata($array);
                    redirect('home');
                    exit;
                }
                else
                {
                    $data['msg'] = 'Your account is blocked.';
                }                                    
            }
            else
            {
                $data['msg'] = 'In-valid Username or Password';
            }
        }
        $this->load->view('login',$data);
    }
    public function logoff()
    {
        $array_items = array('name', 'uid');
        $this->session->unset_userdata($array_items);
        redirect('home');
    }
}