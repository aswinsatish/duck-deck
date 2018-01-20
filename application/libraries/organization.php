<?php

class Organization extends Controller {

	function Organization()
	{
		parent::Controller();
		foreach ($_POST as $key => $value) 
         {
			 if($key!="uPass" and $key!="uPass_c") 
			 {
				 if(!is_array($value)){
				 
				 $_POST[$key] = htmlentities(trim($value));
				 }else {
					 foreach ($value as $valueh) {
						 
						 $value = htmlentities(trim($valueh));
					 }
				 }
             } 
		 }
		$this->load->helper('url');	
		
		 if(!$this->session->userdata('userID'))
		 {
		 $this->general->terminate();
			exit();			
		 }	
	}
	
	function index($flag=0,$val=0,$limit=0)	
	{
	  	if(!$this->session->userdata('userID'))
		 {
		  $this->general->terminate();
			exit();			
		 }
	      $data['treeMenu'] = $this->general->getMenu();
		  $data['menuarea'] = $this->load->view('v_menu',$data,true);	
		  $data['toparea'] = $this->load->view('v_menu_top',$data,true);
	      $data['search'] = (isset($_POST['search'])?$_POST['search']:'');
	      $this->load->model('m_organization');
	      $data['offset'] = 30;
              $data['limit'] = $limit;
              if ($val!='0') { 
                                     $str = split('-',$val);
                                     $data['search'] = $str[0];
                }
              else  $val = $data['search']."-";
	      $data['organiz'] = $this->m_organization->getAllOrganization($data);
	      $data['total'] = $this->m_organization->getTotalOrganization($data);
	      $this->load->library('pagination');
	      $config['base_url'] = site_url('organization/index/0/'.$val.'/');
	      $config['total_rows'] = $data['total'];
	      $config['per_page'] = $data['offset'];
	      $config['uri_segment'] = 5;
	      $config['next_link'] = 'Next';
	      $config['prev_link'] = 'Previous';
	      $this->pagination->initialize($config);
	      $data['flag'] =  $flag ;
	     // print_r($config);
	     // $data['total'] = $result['count'];
	      $this->load->view('v_organization',$data);	
	}
	
	function businessUnit($flag=0,$val=0,$limit=0)
	{
	  	if(!$this->session->userdata('userID'))
		 {
		   $this->general->terminate();
			exit();			
		 }
	      $data['treeMenu'] = $this->general->getMenu();
		   $data['menuarea'] = $this->load->view('v_menu',$data,true);	
		   $data['toparea'] = $this->load->view('v_menu_top',$data,true);
	      $data['search'] = (isset($_POST['search'])?addslashes($_POST['search']):'');
	     $this->load->model('m_organization');
	     $data['offset'] = 10;
             $data['limit'] = $limit;
              if ($val!='0') { 
                                     $str = split('-',$val);
                                     $data['search'] = $str[0];
                }
              else  $val = $data['search']."-";

	      $data['organiz'] = $this->m_organization->getAllbunits($data);
	      $data['total'] = $this->m_organization->getTotalbunits($data);
	      $data['search'] = stripslashes($data['search']);
	      $this->load->library('pagination');
	      $config['base_url'] = site_url('organization/businessUnit/0/'.$val.'/');
	      $config['total_rows'] = $data['total'];
	      $config['per_page'] = $data['offset'];
	      $config['uri_segment'] = 5;
	      $config['next_link'] = 'Next';
	      $config['prev_link'] = 'Previous';
	      $this->pagination->initialize($config);
	      $data['flag'] =  $flag ;
	      $this->load->view('v_bunits',$data);	
	}
	
	function saveorg()
	 {
	   	if(!$this->session->userdata('userID'))
		 {
		   $this->general->terminate();
			exit();			
		 }
	     
	     $data['org'] = addslashes($_POST['org']);
	     $data['orgid'] = addslashes($_POST['orgid']);
	     $data['type'] = addslashes($_POST['type']);  
	     $this->load->model('m_organization');
	     if($data['type'] == 'Add')
	     {
	     
	     $result = $this->m_organization->saveOrg($data);
	      if ($result == "true"){
	  	      echo "Organization Added Successfully";
	      }
	    else{
	     echo "Organization already exists.";
	     }
	     }
	     if($data['type'] == 'Update')
	     {
	    
	     $result =$this->m_organization->editOrg($data);
	      if ($result == "true"){
	  	      echo "Organization Updated Successfully";
	         }
	         else{
	         echo "Organization already exist.";
	         }  
	     }
	   
	 }
	 function addOrga($m=0){
	   	if(!$this->session->userdata('userID'))
		 {
		   $this->general->terminate();
			exit();			
		 }
         $this->load->library("crypt");
	 $m = $this->crypt->decrypt($m);
		
	 $data['msg'] = $m;   
         $data['mode'] = "add";
         $data['treeMenu'] = $this->general->getMenu();
	 $data['menuarea'] = $this->load->view('v_menu',$data,true);
	 $data['toparea'] = $this->load->view('v_menu_top',$data,true); 
         
        
         $this->load->view('v_addOrg',$data);	    
      }
       function addOrganiz() 
       {
       	if(!$this->session->userdata('userID'))
		 {
		   $this->general->terminate();
			exit();			
		 }
      
      $m=$this->input->post("orga");
		$data['orga'] = addslashes($this->input->post("orga"));
		$corg="select count(*) from  orgnization where org_name like '".$data['orga']."'";
		$res=mysql_query($corg);
		$crow=mysql_fetch_row($res);
		if($crow[0]>0)
		{
		 $emsg="Organization ".$m." already exists choose another name";
		 $this->session->set_userdata('corg',$emsg);
		 redirect("organization/addOrga/");
		}
	//	echo $data['orga'];die;
		 $this->load->model('m_organization'); 
	       // $this->m_organization->saveOrg($data);
                 
		$this->m_organization->saveOrga($data);	
		$this->load->library("crypt");
		$msg = $this->crypt->encrypt(1);
		redirect("organization/addOrga/".$msg);	
              
		
	}
	 function getDelete($id=0)
	 {
	   	if(!$this->session->userdata('userID'))
		 {
		   $this->general->terminate();
			exit();			
		 }
	     
	    $data['orgid'] = $id;
	    $this->load->model('m_organization');
	    $this->m_organization->deleteOrg($data);
	    redirect("organization/index");
	 }
	 function saveBunit()
	 {
	   	if(!$this->session->userdata('userID'))
		 {
		   $this->general->terminate();
			exit();			
		 }
	      
	     $data['bname'] = addslashes($_POST['org']);
	     $data['bid'] = addslashes($_POST['orgid']);
	     $data['type'] = addslashes($_POST['type']);
	      $this->load->model('m_organization');
	     if($data['type'] == 'Add')
	     {
	     $result = $this->m_organization->saveBunit($data);
	      if ($result == "true"){
	  	      echo "Business Unit Added Successfully";
	      }
	    else{
	     echo "Business Unit already exists.";
	     }
	     }
	     if($data['type'] == 'Update')
	     {
	     $result = $this->m_organization->editBunit($data);
	     if ($result == "true"){
	  	      echo "Business Unit Updated Successfully";
	         }
	         else{
	         echo "Buniness Unit already exists.";
	         } 
	     }
	     
	 }
	 function bunitDelete($id=0)
	 {
	   	if(!$this->session->userdata('userID'))
		 {
		   $this->general->terminate();
			exit();			
		 }
	    
	    $data['bid'] = $id;
	    $this->load->model('m_organization');
	    $this->m_organization->deleteBunit($data);
	    redirect("organization/businessUnit");
	 }
          function addBusiness($m=0){
            	if(!$this->session->userdata('userID'))
		 {
		   $this->general->terminate();
			exit();			
		 }
         $this->load->library("crypt");
	     $m = $this->crypt->decrypt($m);
		
	        $data['msg'] = $m;   
          $data['mode'] = "add";
         $data['treeMenu'] = $this->general->getMenu();
	      $data['menuarea'] = $this->load->view('v_menu',$data,true);
	      $data['toparea'] = $this->load->view('v_menu_top',$data,true); 
         
        
         $this->load->view('v_addBusiness',$data);	    
      }
       function addBusinessUnit() {
        	if(!$this->session->userdata('userID'))
		 {
		   $this->general->terminate();
			exit();			
		 }
		 $e=$this->input->post("busi");
		$data['busi'] = addslashes($this->input->post("busi"));
		
	   $cbuiss="select count(*) from  business_units where units_name like '".$data['busi']."'";
		$res=mysql_query($cbuiss);
		$crow=mysql_fetch_row($res);
		if($crow[0]>0)
		{
		 $emsg="Buissness Unit ".$e." already exists choose another name";
		 $this->session->set_userdata('cbuiss',$emsg);
		 redirect("organization/addBusiness/");
		}		
		
		$this->load->model('m_organization');
		$this->m_organization->saveBusiness($data);	
		$this->load->library("crypt");
		$msg = $this->crypt->encrypt(1);
               // echo $msg;die;
		redirect("organization/addBusiness/".$msg);	
	}
 function checkorga() {
       
         $oname =addslashes($_POST['oname']);
          $query="select org_name from  orgnization where  org_name like '".$oname."'";
          $res =mysql_query($query);		
	  $res_det = mysql_fetch_assoc($res);
	
		if($res_det)
		echo 1;
		 else
	 	echo 0;
         }
 function checkbusiness() {
              
           $bname = addslashes($_POST['bname']);
          $query="select units_name from  business_units where  units_name like '".$bname."'";
          $res =mysql_query($query);		
	  $res_det = mysql_fetch_assoc($res);
	
		if($res_det)
		echo 1;
		 else
	 	echo 0;
         }
function deleteOrga()
	{
	       	if(!$this->session->userdata('userID'))
		 {
		   $this->general->terminate();
			exit();			
		 }   
		$this->load->library("crypt");
		$orgid = addslashes($_POST['orgid']);
             //  echo $groupId;
		//$groupId = $this->crypt->decrypt($groupId);
                $concept="";
		$this->load->model('m_organization');
                $userList=$this->m_organization->usersList($orgid);
                 if (mysql_num_rows($userList)>0){
                 $concept .="<p id='outer'><strong>If you remove this Organization, it will also affect the following users(s).</strong></p>";
                 }
                 else
          {
              $concept .= "<p id ='outer'> <strong>This Organization is not currently being used by any users.</strong></p>";
          }
                $concept .= " || ";
                if (mysql_num_rows($userList)>0){;
                // $concept .="<p id='outer'><strong>If you remove this Role, it will also affect the following users(s).</strong></p>";           
                             
               
                $i =1;
               while($row=mysql_fetch_assoc($userList)){
         
              $concept .= "<p style='float:none; display:block;clear:both;'>".$i.".&nbsp;".$row['user_name']."</p>";
              $i++;
          }           
                }
              
              
                  echo $concept;
		
		

	}
   function deleteOrgan()
   {
      	if(!$this->session->userdata('userID'))
	{
		   $this->general->terminate();
			exit();			
	}   
	     $orgid = $this->uri->segment(3); 
      // echo $orgid;die;
        $this->load->model('m_organization');
        $reSult=$this->m_organization->orgDelete($orgid);
       
         redirect("organization/index/");  
           
        }
        
function deleteBusin()
	{
	      	if(!$this->session->userdata('userID'))
		 {
		   $this->general->terminate();
			exit();			
		 }   
		$this->load->library("crypt");
		$buid = addslashes($_POST['buid']);
          
                $concept="";
		$this->load->model('m_organization');
                $userList=$this->m_organization->usersbusinList($buid);
                 if (mysql_num_rows($userList)>0){
                 $concept .="<p id='outer'><strong>If you remove this Businessunit, it will also affect the following users(s).</strong></p>";
                 }
                 else
          {
              $concept .= "<p id ='outer'> <strong>This  Businessunit is not currently being used by any users.</strong></p>";
          }
                $concept .= " || ";
                if (mysql_num_rows($userList)>0){;
                // $concept .="<p id='outer'><strong>If you remove this Role, it will also affect the following users(s).</strong></p>";           
                             
               
                $i =1;
               while($row=mysql_fetch_assoc($userList)){
         
              $concept .= "<p style='float:none; display:block;clear:both;'>".$i.".&nbsp;".$row['user_name']."</p>";
              $i++;
          }           
                }
              
              
                  echo $concept;
		
		

	}
      function deleteBusiness()
      {
            	if(!$this->session->userdata('userID'))
		 {
		   $this->general->terminate();
			exit();			
		 }   
        $buid = $this->uri->segment(3); 
      // echo $orgid;die;
        $this->load->model('m_organization');
        $reSult=$this->m_organization->businessDelete($buid);
       
         redirect("organization/businessUnit/");  
           
        }
} 

?>
