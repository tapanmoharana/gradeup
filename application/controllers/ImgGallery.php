<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ImgGallery extends CI_Controller 
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
        $this->load->model('gallary_model');
      
        //print_r($this->get_menu_data()); die;
    }
    
    public function index()
    {
        $this->load->view('header',$this->data);        
        $this->data['images_details']=$this->gallary_model->get_images_details();                
        $this->load->view('ImgGallery/view',$this->data);
        $this->load->view('footer');
    }
    
     public function add()
    {
        $this->load->view('header',$this->data);        
        $this->load->view('ImgGallery/add',$this->data);
        $this->load->view('footer');
    }
    
    public function view()
    {
        $this->load->view('header',$this->data);        
        $this->data['images_details']=$this->gallary_model->get_images_details();                
        $this->load->view('ImgGallery/view',$this->data);
        $this->load->view('footer');
    }
    
    public function edit()
    {
        $this->load->view('header');        
        $gid=$this->uri->segment(3);
        $this->data['image_details']=  array_shift($this->gallary_model->get_images_details($gid));                    
        $this->load->view('ImgGallery/edit',$this->data);
        $this->load->view('footer');
    }    
    
    public function disable()
    {
        $this->load->view('header');        
        $gid=$this->uri->segment(3);   
        $update_array=array("status"=>"N");                                
        $where=array("gid"=>$gid);
        $this->db->where($where);
        
        if($this->db->update('gallary_master', $update_array))
        {
            redirect(base_url("ImgGallery/view?error=0"));
        }
        else
        {
            redirect(base_url("ImgGallery/view?error=1"));
        }  
        $this->load->view('footer');
    }
    
    public function enable()
    {
        $this->load->view('header');        
        $gid=$this->uri->segment(3);   
        $update_array=array("status"=>"Y","updated_datetime"=>date("Y-m-d H:i:s"));                                
        $where=array("gid"=>$gid);
        $this->db->where($where);
        
        if($this->db->update('gallary_master', $update_array))
        {
            redirect(base_url("ImgGallery/view?error=0"));
        }
        else
        {
            redirect(base_url("ImgGallery/view?error=1"));
        }  
        $this->load->view('footer');
    }
    
    public function submit()
    {
         
         $config=array(
                        array('field'   => 'dt',
			'label'   => 'Date',
			'rules'   => 'trim|required'
			),
			array('field'   => 'title',
			'label'   => 'Title',
			'rules'   => 'trim|required'
			),
                        array('field'   => 'description',
			'label'   => 'Description',
			'rules'   => 'trim|required'
			)
                 );
         
        $this->form_validation->set_rules($config); 
        $id=$this->input->post('id');
        
        $target_dir = "uploads/gallary/images/";
        $target_file = $target_dir .basename($_FILES["attachment"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        if($id=="")
        {
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('header');
                $this->load->view('ImgGallery/add',  $this->data);
                $this->load->view('footer');
            }
            else
            {
               // print_r($_FILES); die;
//                $target_dir = "uploads/slokas/";
//                $target_file = $target_dir .basename($_FILES["attachment"]["name"]);
//                $uploadOk = 1;
//                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                
//                $check = getimagesize($_FILES["attachment"]["tmp_name"]);
//                if($check !== false) {
//                    echo "File is an image - " . $check["mime"] . ".";
//                    $uploadOk = 1;
//                } else {
//                    echo "File is not an image.";
//                    $uploadOk = 0;
//                }

                // Check if file already exists
//                if (file_exists($target_file)) {
//                    echo "Sorry, file already exists.";
//                    $uploadOk = 0;
//                }
//                // Check file size
//                if ($_FILES["attachment"]["size"] > 500000) 
//                {
//                    echo "Sorry, your file is too large.";
//                    $uploadOk = 0;
//                }
//                // Allow certain file formats
//                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
//                {
//                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//                    $uploadOk = 0;
//                }
                // Check if $uploadOk is set to 0 by an error
//                if ($uploadOk == 0) 
//                {
//                    echo "Sorry, your file was not uploaded.";
//                // if everything is ok, try to upload file
//                } 
//                else 
//                {
                    if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file)) 
                    {
                        //echo "The file ". basename( $_FILES["attachment"]["name"]). " has been uploaded.";
                    }                     
//                }

                
                $dt=$this->input->post("dt");    
                $title=$this->input->post("title");               
                $description=  ($this->input->post("description")); 
                $attachment=$_FILES["attachment"]["name"];                                
                $insert_array=array("type"=>"I","upload_date"=>$dt,"title"=>$title,"description"=>$description,"attachment"=>$attachment,"inserted_by"=>$this->session->userdata("uid"),"inserted_datetime"=>date("Y-m-d H:i:s"));                                
                $this->db->insert('gallary_master', $insert_array); 
                $last_inserted_id=$this->db->insert_id();
                
                if($last_inserted_id)
                {
                    redirect(base_url("ImgGallery/view?error=0"));
                }
                else
                {
                    redirect(base_url("ImgGallery/view?error=1"));
                }
            }
        }
        else
        {
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('header');
                $gid=$this->input->post("id");
                $this->data['images_details']=  array_shift($this->gallary_model->get_images_details($gid));    
                $this->load->view('ImgGallery/edit',  $this->data);
                $this->load->view('footer');
            }
            else
            {                
                if($_FILES["attachment"]["name"]!="")
                {
                    @move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file);                    
                }
                
                $dt=$this->input->post("dt");               
                $title=$this->input->post("title");                               
                $description=$this->input->post("description"); 
                $attachment=$_FILES["attachment"]["name"];  
                
                $update_array=array("upload_date"=>$dt,"title"=>$title,"description"=>$description,"updated_by"=>$this->session->userdata("uid"),"updated_datetime"=>date("Y-m-d H:i:s"));                                
                if($_FILES["attachment"]["name"]!="")
                {
                    $update_array["attachment"]=$attachment;
                }
                $where=array("gid"=>$id);
                $this->db->where($where);
                
                if($this->db->update('gallary_master', $update_array))
                {
                    redirect(base_url("ImgGallery/view?error=0"));
                }
                else
                {
                   redirect(base_url("ImgGallery/view?error=1"));
                }                
                // echo $this->db->last_query(); die;
                $this->db->update('gallary_master', $update_array,"gid='".$id."'"); 
                redirect(base_url("ImgGallery/view"));
            }
        }      
     }
    
    public function search()
    {        
        $title=$this->input->post("title");
        $image_details=  $this->gallary_model->get_images_details_search($title);                    
        echo json_encode(array("img_details"=>$image_details));
    }
}
?>