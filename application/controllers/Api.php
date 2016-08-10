<?php
class Api extends CI_Controller 
{
    var $currentModule="";
    var $title="";
   
    public function __construct() 
    {
        global $menudata;
        parent:: __construct();
        $this->load->model('api_model');
    }

    public function get_slokas()
    {
        $slokas=  $this->api_model->get_slokas();        
        header("Access-Control-Allow-Origin: *");
	header('Content-type: application/xml');       
        $response_str="<?xml version='1.0' encoding='UTF-8'?>";        
        if(count($slokas)<=0)
        {
            $response_str.='<response>';
            $response_str.='<status>'."false".'</status>';
            $response_str.='<data></data>';
            $response_str.='</response>'; 
        }
        else 
        {
            $response_str.='<response>';
            $response_str.='<status>'."true".'</status>';
            $response_str.='<data>';
            for($i=0;$i<count($slokas);$i++)
            {
                $response_str.="<slok>";
                foreach ($slokas[$i] as $key => $value) 
                {                
                	if($key=="attachment")
                    {                     
                        $response_str.="<$key><![CDATA[".(base_url().$value)."]]></$key>";
                    }                    
                    else
                    {    
                    $response_str.="<$key><![CDATA[".($value)."]]></$key>";  
                    }                  
                }
                $response_str.="</slok>";
            }
            $response_str.='</data>';
            $response_str.='</response>';
        }
        echo $response_str;die;
        
    }
    
    public function get_images()
    {
        $gallery=  $this->api_model->get_img_details();        
        //echo "<pre>";print_r($gallery); die;
        // Set the appropriate content-type header and output the XML
	/*header("Access-Control-Allow-Origin: *");
	header('Content-type: text/xml');
	          
        $response_str="<?xml version='1.0' encoding='UTF-8'?>";        
        if(count($gallery)<=0)
        {
            $response_str.='<response>';
            $response_str.='<status>'."false".'</status>';
            $response_str.='<data></data>';
            $response_str.='</response>'; 
        }
        else 
        {
            $response_str.='<response>';
            $response_str.='<status>'."true".'</status>';
            $response_str.='<data>';
            for($i=0;$i<count($gallery);$i++)
            {
                $response_str.="<image_data>";
                foreach ($gallery[$i] as $key => $value) 
                {   
                    if($key=="attachment")
                    {
                        $response_str.="<$key><![CDATA[".(base_url()."uploads/gallary/images/".$value)."]]></$key>";
                    }
                    else
                    {
                        $response_str.="<$key><![CDATA[".($value)."]]></$key>";
                    }
                    
                    
                }
                $response_str.="</image_data>";
            }           
            $response_str.='</data>';
            $response_str.='</response>';
        }
        echo $response_str;die;*/
        
        
        
        $doc = new DOMDocument('1.0', 'UTF-8');
	$fonts = $doc->createElement('root');

for($i=0;$i<count($gallery);$i++)
            {
 $entry = $doc->createElement('gallery');
foreach ($gallery[$i] as $key => $value) {
   
	//$entry->setAttribute('lid', $row['id']);	

	$offerid=$doc->createElement($key);
	$offerid->appendChild($doc->createCDATASection((base_url()."uploads/gallary/images/".$value)));
	$entry->appendChild($offerid);
	
	
	
	
    $fonts->appendChild($entry);
}

}
$doc->appendChild($fonts);

// Set the appropriate content-type header and output the XML
header("Access-Control-Allow-Origin: *");
header('Content-type: application/xml');
echo $doc->saveXML();
exit;
        
    }
    
    public function get_videos()
    {
        $gallery=  $this->api_model->get_videos_details(); 
        header("Access-Control-Allow-Origin: *");       
        header('Content-type: text/xml');        
        $response_str="<?xml version='1.0' encoding='UTF-8'?>";        
        if(count($gallery)<=0)
        {
            $response_str.='<response>';
            $response_str.='<status>'."false".'</status>';
            $response_str.='<data></data>';
            $response_str.='</response>'; 
        }
        else 
        {
            $response_str.='<response>';
            $response_str.='<status>'."true".'</status>';
            $response_str.='<data>';
            for($i=0;$i<count($gallery);$i++)
            {
                $response_str.="<video_data>";
                foreach ($gallery[$i] as $key => $value) 
                {   
                    if($key=="attachment")
                    {
                        $response_str.="<$key><![CDATA[".(base_url()."uploads/gallary/videos/".$value)."]]></$key>";
                    }
                    else
                    {
                        $response_str.="<$key><![CDATA[".($value)."]]></$key>";
                    }
                    
                    
                }
                $response_str.="</video_data>";
            }            
            $response_str.='</data>';
            $response_str.='</response>';
        }
        echo $response_str;die;
        
    }
    
    public function get_pooja_samagri()
    {
        $data=  $this->api_model->get_pooja_samagri_details();        
        //print_r($data); die;
        header('Content-type: text/xml');        
        $response_str="<?xml version='1.0' encoding='UTF-8'?>";        
        if(count($data)<=0)
        {
            $response_str.='<response>';
            $response_str.='<status>'."false".'</status>';
            $response_str.='<data></data>';
            $response_str.='</response>'; 
        }
        else 
        {
            $response_str.='<response>';
            $response_str.='<status>'."true".'</status>';
            $response_str.='<data>';
            for($i=0;$i<count($data);$i++)
            {
                $response_str.="<samagri>";
                foreach ($data[$i] as $key => $value) 
                {   
                    if($key=="psm_image")
                    {
                        $response_str.="<$key><![CDATA[".(base_url()."uploads/pooja_samagri/".$value)."]]></$key>";
                    }
                    else
                    {
                        $response_str.="<$key><![CDATA[".($value)."]]></$key>";
                    }
                }
                $response_str.="</samagri>";
            }            
            $response_str.='</data>';
            $response_str.='</response>';
        }
        echo $response_str;die;
        
    }
    
    public function get_publications()
    {	
        $publications=  $this->api_model->get_publication_details($type);                
        header("Access-Control-Allow-Origin: *");
        header('Content-type: text/xml');        
        $response_str="<?xml version='1.0' encoding='UTF-8'?>";        
        if(count($publications)<=0)
        {
            $response_str.='<response>';
            $response_str.='<status>'."false".'</status>';
            $response_str.='<data></data>';
            $response_str.='</response>'; 
        }
        else 
        {
            $response_str.='<response>';
            $response_str.='<status>'."true".'</status>';
            $response_str.='<data>';
            for($i=0;$i<count($publications);$i++)
            {
                $response_str.="<publication>";
                $type="";
                foreach ($publications[$i] as $key => $value) 
                {    
                    if($key=="type")
                    {
                        if($value=="N")
                        {
                            $type="news/";
                        }
                        else 
                        {
                            $type="publications/";
                        }
                    }
                    
                    if($key=="attachment")
                    {                     
                        $response_str.="<$key><![CDATA[".(base_url()."uploads/publications/".$type.$value)."]]></$key>";
                    }                    
                    else
                    {
                        if($key=="pdf_attachment")
                        {                     
                            if($value!="")
                            {
                                $response_str.="<$key><![CDATA[".(base_url()."uploads/publications/".$type."pdf/".$value)."]]></$key>";
                            }
                            
                        }  
                        else
                        {
                            $response_str.="<$key><![CDATA[".($value)."]]></$key>";
                        }
                    }    
                }
                $response_str.="</publication>";
            }            
            $response_str.='</data>';
            $response_str.='</response>';
        }
        echo $response_str;die;
        
    }
    
    public function get_contact()
    {
        $contact=  $this->api_model->get_contact_details();        
        header('Content-type: text/xml');        
        $response_str="<?xml version='1.0' encoding='UTF-8'?>";        
        if(count($contact)<=0)
        {
            $response_str.='<response>';
            $response_str.='<status>'."false".'</status>';
            $response_str.='<data></data>';
            $response_str.='</response>'; 
        }
        else 
        {
            $response_str.='<response>';
            $response_str.='<status>'."true".'</status>';
            $response_str.='<data>';
            for($i=0;$i<count($contact);$i++)
            {
                $response_str.="<contact>";
                foreach ($contact[$i] as $key => $value) 
                {                    
                    $response_str.="<$key><![CDATA[".($value)."]]></$key>";                    
                }
                $response_str.="</contact>";
            }
            $response_str.='</data>';
            $response_str.='</response>';
        }
        echo $response_str;die;
        
    }
    
    public function get_achievements()
    {
        $achievements=  $this->api_model->get_achievements_details();        
        //print_r($achievements); die;
        header('Content-type: text/xml');        
        $response_str="<?xml version='1.0' encoding='UTF-8'?>";        
        if(count($achievements)<=0)
        {
            $response_str.='<response>';
            $response_str.='<status>'."false".'</status>';
            $response_str.='<data></data>';
            $response_str.='</response>'; 
        }
        else 
        {
            $response_str.='<response>';
            $response_str.='<status>'."true".'</status>';
            $response_str.='<data>';
            for($i=0;$i<count($achievements);$i++)
            {
                $response_str.="<contact>";
                $type="";
                foreach ($achievements[$i] as $key => $value) 
                {   
                    if($key=="achievement_image")
                    {
                         $response_str.="<$key><![CDATA[".(base_url('uploads/achievements')."/".$value)."]]></$key>";                       
                    }
                    else 
                    {
                        $response_str.="<$key><![CDATA[".(base_url('uploads/achievements')."/".$value)."]]></$key>";                       
                    }
                }
                $response_str.="</contact>";
            }
            $response_str.='</data>';
            $response_str.='</response>';
        }
        echo $response_str;die;
        
    }
    
    public function get_themes()
    {
        $themes=  $this->api_model->get_themes_details();        
        header('Content-type: text/xml');        
        $response_str="<?xml version='1.0' encoding='UTF-8'?>";        
        if(count($themes)<=0)
        {
            $response_str.='<response>';
            $response_str.='<status>'."false".'</status>';
            $response_str.='<data></data>';
            $response_str.='</response>'; 
        }
        else 
        {
            $response_str.='<response>';
            $response_str.='<status>'."true".'</status>';
            $response_str.='<data>';
            for($i=0;$i<count($themes);$i++)
            {
                $response_str.="<day>";
                foreach ($themes[$i] as $key => $value) 
                {                    
                    $response_str.="<$key><![CDATA[".($value)."]]></$key>";                    
                }
                $response_str.="</day>";
            }
            $response_str.='</data>';
            $response_str.='</response>';
        }
        echo $response_str;die;        
    }
    
}