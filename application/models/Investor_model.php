<?php
class Investor_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
			error_reporting(1);
		ini_set('display_errors',1);
error_reporting(E_ALL);
    }
       
	   function quarter_type($qid='')
	   {
			$this->db->select('*');
		$this->db->from('quarter_reporttype');
		  if($qid!="")
        {
           	$this->db->where('id',$qid);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;   
		   
	   }
	   
	   
	   
    function  list_city($city_id='')
    {
			$this->db->select('*');
		$this->db->from('master_city');
		  if($city_id!="")
        {
           	$this->db->where('id',$city_id);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }

		function view_annual_reports($id ='')
	{
				$this->db->select('*');
		$this->db->from('annual_reports');
		  if($id!="")
        {
           	$this->db->where('id',$id);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
	}
	
	
	function add($var)
	{
		
		 $target_dir = "uploads/investors/";
        $target_file = $target_dir .basename($_FILES["thumb"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file);
		$thumb = basename($_FILES["thumb"]["name"]);
		
		 $target_dir = "uploads/investors/";
        $target_file = $target_dir .basename($_FILES["oimage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["oimage"]["tmp_name"], $target_file);
		$oimage = basename($_FILES["oimage"]["name"]);
		
		
		
				$data=array(
		'type'=>$var['ptype'],
		'name'=>$var['pname'],
		'thumb'=>$thumb,
		'image'=>$oimage,
		'description'=>$var['aboutprj']
               );
			$query = $this->db->insert('company_press', $data);
		return $query;
	}
	

	function add_annual($var)
	{
		
				 $target_dir = "uploads/annual_reports/";
        $target_file = $target_dir .basename($_FILES["thumb"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file);
		$thumb = basename($_FILES["thumb"]["name"]);
		
						$data=array(
				'type'=>$var['stype'],				
		'year'=>$var['ptype'],
		'title'=>$var['pname'],
		'document'=>$thumb
               );
			$query = $this->db->insert('annual_reports', $data);
		
		return $query;
	}
	
	function list_company_press($prid ='')
	{
			$this->db->select('*');
		$this->db->from('company_press');
		  if($prid!="")
        {
           	$this->db->where('id',$prid);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
		
	}
	
	function company_press_type()
	{
			$this->db->select('*');
		$this->db->from('company_type');
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
		
	}

	
	   function  list_location($location_id='')
    {

			$this->db->distinct();
$this->db->select('ml.city_id,ml.status,ml.id,ml.location_name,mc.id,mc.name');
		$this->db->from('master_location ml');
		$this->db->join('master_city mc','ml.city_id =mc.id');
		
     if($location_id!="")
        {
           	$this->db->where('ml.id',$location_id); 
		}
//echo $this->db->last_query();
		$query = $this->db->get();
$query = $query->result_array();

return $query;

    }
	
	
	    function  list_ptype($mp_id='')
    {
			$this->db->select('*');
		$this->db->from('master_propertytype');
		  if($mp_id!="")
        {
           	$this->db->where('id',$mp_id);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }

		    function  list_pstatus($city_id='')
    {
			$this->db->select('*');
		$this->db->from('master_propertystatus');
		  if($city_id!="")
        {
           	$this->db->where('id',$city_id);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
    		    function  list_amenities($amen_id='')
    {
			$this->db->select('*');
		$this->db->from('master_amenities');
		  if($amen_id!="")
        {
           	$this->db->where('id',$amen_id);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
			    function  list_units($unit_id='')
    {
			$this->db->select('*');
		$this->db->from('master_unittype');
		  if($unit_id!="")
        {
           	$this->db->where('id',$unit_id);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
	
				    function  list_primages($project_id)
    {
			$this->db->select('*');
		$this->db->from('project_toimages');
           	$this->db->where('project_id',$project_id);
    $query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	

	
					    function  list_punits($project_id)
    {
		$this->db->select('*');
		$this->db->from('project_tounits');
           	$this->db->where('project_id',$project_id);
    $query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
					    function  list_pamenities($project_id)
    {
	$this->db->select('amenities_id');
		$this->db->from('project_toamenities');
           	$this->db->where('project_id',$project_id);
    $query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
					    function  list_pfloorplan($project_id)
    {
	$this->db->select('*');
		$this->db->from('project_floorplan');
           	$this->db->where('project_id',$project_id);
    $query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
	
	
				    function  list_projects($project_id='')
    {
		$this->db->distinct();
			$this->db->select('mp.*,ml.location_name,mc.name as cityname ,pt.name as ptype,mps.name as pstatus');
		$this->db->from('master_projects mp');
		$this->db->join('master_location ml','mp.project_location =ml.id');
		$this->db->join('master_city mc','mp.project_city =mc.id');
		$this->db->join('master_propertystatus mps','mp.project_status =mps.id');
		$this->db->join('master_propertytype pt','mp.project_type =pt.id');
		  if($project_id!="")
        {
           	$this->db->where('mp.id',$project_id);
        }
		
		$query = $this->db->get();
		//echo $this->db->last_query();
	//	exit(0);
		$query = $query->result_array();
		return $query;
		
    }
	

	
	
	
	function add_project($var)
	{
	
		 $target_dir = "uploads/primages/";
        $target_file = $target_dir .basename($_FILES["pvtour"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["pvtour"]["tmp_name"], $target_file);
		$pvtour = basename($_FILES["pvtour"]["name"]);
		
		
        $target_file = $target_dir .basename($_FILES["plocmap"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["plocmap"]["tmp_name"], $target_file);
		$plocmap = basename($_FILES["plocmap"]["name"]);
		
			
        $target_file = $target_dir .basename($_FILES["plplan"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["plplan"]["tmp_name"], $target_file);
		$plplan = basename($_FILES["plplan"]["name"]);
				
		
        $target_file = $target_dir .basename($_FILES["pbrochure"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["pbrochure"]["tmp_name"], $target_file);
		$pbrochure = basename($_FILES["pbrochure"]["name"]);	
				
			$data=array(
		'project_name'=>$var['pname'],
		'project_location'=>$var['plocation'],
		'project_city'=>$var['pcity'],
		'project_type'=>$var['ptype'],
		'project_status'=>$var['pstatus'],
		'virtual_tour'=>$pvtour,
		'contact_us'=>$var['pcontactus'],
		'location_map'=>$plocmap,
		'layout_plan'=>$plplan,
		'about_project'=>$var['aboutprj'],
'project_brochure'=>$pbrochure,
               );
			$query = $this->db->insert('master_projects', $data);
						$prj_id=$this->db->insert_id();
					$prjamen = $this->input->post('prjamen');
		$punitname = $this->input->post('punitname');
		$punitarea = $this->input->post('punitarea');	
			$spectitle = $this->input->post('spectitle');
		$specdesc = $this->input->post('specdesc');
		
		
			for($i=0;$i<count($spectitle);$i++)		
			{
				$data=array(
		'project_id'=>$prj_id,
		'title'=>$spectitle[$i],
		'description'=>$specdesc[$i]
		);
				$query = $this->db->insert('project_specification', $data);
			}	
			
			
			
					for($i=0;$i<count($prjamen);$i++)		
			{
				$data=array(
		'project_id'=>$prj_id,
		'amenities_id'=>$prjamen[$i]
		);
				$query = $this->db->insert('project_toamenities', $data);
			}	
			
			for($j=0;$j<count($punitname);$j++)		
			{
				$data=array(
		'project_id'=>$prj_id,
		'unit_id'=>$punitname[$j],
		'unit_area'=>$punitarea[$j]
		);
				$query = $this->db->insert('project_tounits', $data);
			}	
				


    $files = $_FILES;
    $cpt = count($_FILES['pimage']);
	
	var_dump($_FILES['pimage']['name']);

	echo  count($_FILES['pimage']['name'])."*******************************";
$pimagetitle = $this->input->post('pimagetitle');
$fplanname = $this->input->post('fplanname');
    for($i=0; $i<count($_FILES['pimage']['name']); $i++)
    {           
     
		
		 $target_dir = "uploads/primages/";
        $target_file = $target_dir .basename($_FILES["pimage"]["name"][$i]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["pimage"]["tmp_name"][$i], $target_file);
		$imgname = basename($_FILES["pimage"]["name"][$i]);
//echo $imgname;
       $data=array(
		'project_id'=>$prj_id,
		'title'=>$pimagetitle[$i],
		'image'=>$imgname
		);
				$query = $this->db->insert('project_toimages', $data);
	   
	   
    }
	
	
	    $files = $_FILES;
    $cpt = count($_FILES['fplanimage']);
	
	var_dump($_FILES['fplanimage']['name']);

	echo  count($_FILES['fplanimage']['name'])."*******************************";

    for($i=0; $i<count($_FILES['fplanimage']['name']); $i++)
    {           
     
		
		 $target_dir = "uploads/primages/";
        $target_file = $target_dir .basename($_FILES["fplanimage"]["name"][$i]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["fplanimage"]["tmp_name"][$i], $target_file);
		$imgname2 = basename($_FILES["fplanimage"]["name"][$i]);
//echo $imgname;
       $data=array(
		'project_id'=>$prj_id,
		'title'=>$fplanname[$i],
		'image'=>$imgname2
		);
				$query = $this->db->insert('project_floorplan', $data);
	   
	   
    }
	
	
	
	
	
	
	
	
	
	
 redirect('Masters/list_projects');
		

	}
	


}
