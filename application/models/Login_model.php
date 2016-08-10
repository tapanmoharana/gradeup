<?php
class Login_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
      //  $this->currentModule=$this->uri->segment(1);        
    } 
    function get_user($user='',$pass='')
    {
        $getCon = $this->db->query("SELECT * FROM users WHERE username='".$user."' AND user_password='".md5($pass)."'");
        $conRes = $getCon->result();
        return $conRes;
    }	
    
    function get_all_user_list()
    {
        $getCon = $this->db->query("SELECT id,emp_id,full_name FROM emp_details WHERE status='0'");
        //$getCon = $this->db->query("SELECT * FROM admin WHERE username='".$user."' AND password='".$pass."'");
        $conRes = $getCon->result();
        return $conRes;
    }   
    
    function get_blocked_user_list()
    {
        $getCon = $this->db->query("SELECT id,emp_id,full_name FROM emp_details WHERE status='1'");
        //$getCon = $this->db->query("SELECT * FROM admin WHERE username='".$user."' AND password='".$pass."'");
        $conRes = $getCon->result();
        return $conRes;
    }
}