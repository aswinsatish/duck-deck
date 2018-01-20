<?php 
class M_deck extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	

	function get_user_valid($username)
	{  	 
	$query = $this->db->select('id,unique_id,first_name,last_name,user_type,email_id,location,password,user_password,reg_time,reg_ip,created_user,linkedin_user,modified_date,age,education,founding_exp,funding_exp,brief_bio,profile_pic')->from('dk_user_info')->where('email_id',$username)->get();
         //print_r($query);die;	
		if ($query->num_rows()>0) {
           return $query->row();
        } else {
            return 0;
        }  		
	}


function newdeck($data)
	{   
		
	    $inarray = array('org_name'    => $data['org_name'],
		                  'org_desc' =>$data['org_desc'],
                          'unique_id'  =>$data['uniqueid'],
						  'user_id'    =>$data['uid'],
                          'created_time'=>date("Y-m-d H:i:s"),
						  'modified_date'=>date("Y-m-d H:i:s"));
		$this->db->insert('dk_organisation',$inarray);
        $LID = $this->db->insert_id();
		$query = $this->db->select('id,created_time')->from('dk_organisation')->where('id',$LID)->get();
        if ($query->num_rows()>0) 
		{

            return $query->result();
        }  else 
		{

            return 0;
        }
	}

	function getuserdetail($id)
    {
		  $query = $this->db->select('id,unique_id,first_name,last_name,user_type,email_id,location,jobtitle,organisation,password,user_password,reg_time,reg_ip,created_user,linkedin_user,modified_date,age,education,founding_exp,funding_exp,brief_bio,profile_pic')->from('dk_user_info')->where('id',$id)->get();  
		
        if ($query->num_rows()>0) {
           return $query->result();
        }  else {
            return 0;
        } 
	}
	function getEmail($uname)
	{
		$query = $this->db->select('first_name,email_id')->from('dk_user_info')->where('email_id',$uname)->get();
        if ($query->num_rows()>0) {
			
           return $query->row();
        }  else {
			
            return 0;
        } 
	}
    function getvalidorg($data)
    {
        $query = $this->db->select('id,unique_id,org_name')->from('dk_organisation')->where('org_name',$data['org_name'])->get();
        if ($query->num_rows()>0) {

            return $query->row();
        }  else {

            return 0;
        }
    }
	function getallusers($data)
    {
        $query = $this->db->select('id,unique_id,concat(first_name," " ,last_name ) as name,email_id,profile_pic')->from('dk_user_info')->get();
        if ($query->num_rows()>0) {

            return $query->result();
        }  else {

            return 0;
        }
    }
	function getalldecks($data)
    {
         $this->db->select ('dk_org.org_name');
		  $this->db->select ('dk_org.logo');
		 $this->db->select ('dk_org.id');
		 $this->db->select ('dk_org.location');
		 $this->db->select ('dk_phase.phase_name');
		 $this->db->select ('dk_org.org_desc');
		 $this->db->select ('count(DISTINCT(dk_org.id))');
		 $this->db->group_by('dk_org.id');
		 $this->db->from('dk_organisation as dk_org');
		 $this->db->join('dk_org_phase as dk_phase ', 'dk_org.org_phase=dk_phase.id', 'left');
		 $this->db->where('active','Yes');
        if($data['srch_val']!='')
        {
            $this->db->where("dk_org.org_name like '%".$data['srch_val']."%'");

        }
        $query = $this->db->get();
        if ($query->num_rows()>0) {

            return $query->result();
        }  else {

            return 0;
        }
    }
	function getdeckviews($org_name)
{

 $sql="SELECT count(b.id) as count1 FROM dk_organisation as a join dk_deck_view as b on a.id=b.org_id where a.org_name='".$org_name."'";
 $res = $this->db->query($sql);
	  if ($res) 
	  {
			return $res->result();
			  }
		  return 0; 


}

	function getdeckviews2($user_id)
{

 $sql="SELECT count(b.id) as count1 FROM dk_organisation as a join dk_deck_view as b on a.id=b.org_id where a.user_id='".$user_id."'";
 $res = $this->db->query($sql);
	  if ($res) 
	  {
			return $res->result();
			  }
		  return 0; 


}
	function get_deckcount($name)
   {
	  $sql="SELECT count(id) as cnt FROM dk_organisation WHERE org_name = '".$name."'";
		
		  $res = $this->db->query($sql);
	  if ($res) {
			return $res->result();
			  }
		  return 0; 
   }
   
	function getusercontent($data)
    {
        $this->db->select('id,unique_id,concat(first_name," ",last_name ) as name,email_id,user_type,jobtitle,organisation,profile_pic');
        $this->db->from('dk_user_info as dk_user');
        if($data['srch_val']!='')
        {
            $this->db->where("concat(dk_user.first_name,' ',dk_user.last_name) like '%".$data['srch_val']."%'");

        }
        $query = $this->db->get();
        if ($query->num_rows()>0) {

            return $query->result();
        }  else {

            return 0;
        }
    }
	function get_orgcount($id)
   {
	  $sql="SELECT count(id) as cnt FROM dk_organisation WHERE user_id = '".$id."'";
		
		  $res = $this->db->query($sql);
	  if ($res) {
			return $res->result();
			  }
		  return 0; 
   }
	function resetpassword($pwd,$email)
	{
	    //echo $sql ="update dk_user_info set password='$pwd' where email_id='$email'";
        $res = array('password' =>$pwd);
        $this->db->where('email_id',$email);
        $this->db->update('dk_user_info',$res);
        return $res;
	}
   function update_userdetails($uid,$email,$action)
   {
       $inarray = array('user_id'  => $uid,
                        'action'   => $action);
       $this->db->set('update_time', 'NOW()', FALSE);
       $this->db->insert('dk_user_update',$inarray);

   }
    function getorganisation($data)
    {
         $usertype=$data['user_type'];
		 $uid=$data['uid'];
         $this->db->select('dk_org.id,user_id,unique_id,org_name,org_desc,location,org_phase,org_sector,sector_name,phase_name,cover_photo,logo,website,linkedin_page,twitter_page,link_organisation,fund_currency,	pre_commited_type,investment_sought,equity,valuation,pre_commited_money,org_registered,org_generated_revenue,reg_num_country,org_reg_number,revenue_currency,estimated_sequence,previous_funding,what_we_do,competitors,problem1,problem2,problem3,business_model,advantage,shared,share_password,share_link,created_time,modified_date');
		 $this->db->from('dk_organisation as dk_org');
		 $this->db->join('dk_org_sector as dk_sec ', 'dk_org.org_sector=dk_sec.id', 'left');
		 $this->db->join('dk_org_phase as dk_phase ', 'dk_org.org_phase=dk_phase.id', 'left');
		 $this->db->where('active','Yes');
		 if($usertype=='entreprenuer')
		 {
		 $this->db->where('user_id',$uid);
	     }
		 elseif($usertype=='admin')
		 {
			$this->db->where('org_name',$data['orgname']); 
		 }
		 $this->db->order_by('dk_org.id','desc');
		 
		 $query = $this->db->get(); 
        if ($query->num_rows()>0) {

            return $query->result();
        }  else {

            return 0;
        }
    }
	function getallorganisation()
    {

         $this->db->select('dk_org.id,user_id,unique_id,org_name,org_desc,location,org_phase,org_sector,sector_name,phase_name,cover_photo,logo,website,linkedin_page,twitter_page,link_organisation,investment_sought,equity,valuation,pre_commited_money,estimated_sequence,previous_funding,what_we_do,competitors,problem1,problem2,problem3,business_model,advantage,shared,share_password,share_link,created_time,modified_date');
		 $this->db->from('dk_organisation as dk_org');
		 $this->db->join('dk_org_sector as dk_sec ', 'dk_org.org_sector=dk_sec.id', 'left');
		 $this->db->join('dk_org_phase as dk_phase ', 'dk_org.org_phase=dk_phase.id', 'left');
		 $this->db->order_by('dk_org.id','desc');
		 $query = $this->db->get(); 
        if ($query->num_rows()>0) {

            return $query->result();
        }  else {

            return 0;
        }
    }
	function getorganisation_detail($data)
    {
       
        $this->db->select('dk_org.id,user_id,unique_id,org_name,org_desc,location,org_phase,org_sector,sector_name,phase_name,cover_photo,logo,website,linkedin_page,twitter_page,link_organisation,investment_sought,equity,valuation,fund_currency,pre_commited_type,reg_num_country,revenue_currency,pre_commited_money,estimated_sequence,previous_funding,what_we_do,competitors,problem1,problem2,problem3,business_model,advantage,shared,share_password,share_link,created_time,modified_date');        
		$this->db->from('dk_organisation as dk_org');
		$this->db->join('dk_org_sector as dk_sec ', 'dk_org.org_sector=dk_sec.id', 'left');
		$this->db->join('dk_org_phase as dk_phase ', 'dk_org.org_phase=dk_phase.id', 'left');
		if($data['user_type']=='entreprenuer')
		 {
		$this->db->where('dk_org.id',$data['orgid']);
		$this->db->where('dk_org.user_id',$data['uid']); 
	     }
		else{
			$this->db->where('dk_org.id',$data['orgid']);
		}
		$query = $this->db->get();
        if ($query->num_rows() > 0) 
		{
            return $query->result();
	      }
		  else{
			  return 0;
			}
			
    }
	
	function org_achieve($data)
    {
          
       $sql = $this->db->select('id,org_id,achieve1,achieve2,achieve3')->from('dk_org_achieve')->where('org_id',$data['orgid'])->get();
		
        if ($sql->num_rows()>0) {

            return $sql->result();
        }  else {

            return 0;
        }
    }
	function get_orgteam($data)
    {
           
       $this->db->select('member_name,role,achievement,photo,member_type');
	   $this->db->from('dk_team_members as dk_team');
	   $this->db->where('dk_team.org_id',$data['orgid']);
	   $this->db->where('dk_team.member_type','Team Member'); 
		$sql = $this->db->get();
        if ($sql->num_rows()>0) {

            return $sql->result();
        }  else {

            return 0;
        }
    }
		
	function get_prevfund($data)
    {
           
       $sql = $this->db->select('id,date1,date2,currency,currency_type,currency1,currency_type1,currency_type,')->from('dk_previous_fund')->where('org_id',$data['orgid'])->get();
		
        if ($sql->num_rows()>0) {

            return $sql->result();
        }  else {

            return 0;
        }
    }
	function add_teammember($data)
    {   

	    
		$this->db->select('org_id,member_name,role,photo,achievement,member_type');
		$this->db->from('dk_team_members as dk_team');
		$this->db->where('dk_team.org_id',$data['org_id']); 
		$this->db->where('dk_team.member_type','Team Member');
		$sql = $this->db->get();
		if ($sql->num_rows()==3) 
		{
           
           return 0;
        }  else 
		{

        $inarray = array('org_id' =>$data['org_id'],
                     'member_name'=>$data['member_name'],
					 'role'=>$data['role'],
					 'photo'=>$data['photo'],
					 'achievement'=>$data['achievement'],
					 'member_type'=>$data['type']);
        $this->db->insert('dk_team_members',$inarray);
        $LID = $this->db->insert_id(); 
        $query = $this->db->select('id,member_name,role,achievement,photo')->from('dk_team_members')->where('id',$LID)->get();
		
		  
		if ($query->num_rows()>0) 
		{
            
           return $query->result();
        }  else
		{
			return 0;
		}			
		
        
        }
       
		
    }
	function add_investmember($data)
    {  
	    //print_r($data);die;
        /*$this->db->select('id,member_name,member_type,role,achievement,photo');
		$this->db->from('dk_team_members as dk_team');
		$this->db->or_where('dk_team.member_type','Advisor');
		$this->db->or_where('dk_team.member_type','Investor');
		$this->db->where('dk_team.org_id',$data['org_id']);
		$sql1 = $this->db->get();
		if ($sql1->num_rows()>2) 
		{ 
	       
           return 0;
		   
        }  else 
		{*/
			$inarray = array('org_id' =>$data['org_id'],
                     'member_name'=>$data['member_name'],
					 'photo'=>$data['photo'],
					 'achievement'=>$data['achievement'],
					 'member_type'=>$data['type']);
         
        $this->db->insert('dk_team_members',$inarray);
        $LID = $this->db->insert_id(); 
		$query = $this->db->select('id,member_name,member_type,role,achievement,photo')->from('dk_team_members')->where('id',$LID)->get();
        if ($query->num_rows()>0) 
		{
            
           return $query->result();
        }  else
		{
			return 0;
		}	
		
    
	}
	function getteamember($uid)
	{
		
		
		$this->db->select('user_id,org_id,unique_id,member_name,role,photo,achievement,member_type');
		$this->db->from('dk_team_members as dk_team');
		$this->db->join('dk_organisation as dk_org', 'dk_team.org_id=dk_org.id', 'left');
		$this->db->where('dk_team.member_type','Team Member');
		$this->db->where('dk_org.user_id',$uid); 
		$query = $this->db->get();
        if ($query->num_rows() > 0) 
		{
            return $query->result();
	      }
		  else{
			  return 0;
			}
	}
	function getinvestor($data)
	{
		
		
		$this->db->select('org_id,member_name,role,photo,achievement,member_type');
		$this->db->from('dk_team_members as dk_team');
		
		$this->db->or_where('dk_team.member_type','Advisor');
		$this->db->or_where('dk_team.member_type','Investor');
		$this->db->where('dk_team.org_id',$data['orgid']); 
		$query = $this->db->get();
        if ($query->num_rows() > 0) 
		{
            return $query->result();
	      }
		  else{
			  return 0;
			}
	}
function update_editprofile($data)
    {
		//print_r($data);	die;
        $res = array('first_name' =>$data['firstname'],
		             'last_name' =>$data['lastname'],
		             'email_id' =>$data['emailid'],
		             'profile_pic' =>$data['profilepic'],
					'brief_bio' =>$data['brief_bio'],
					'user_type' =>$data['utype']);
		//print_r($res);die;	
        $this->db->where('id',$data['uid']);
        $this->db->update('dk_user_info',$res);
        return $res;

    }
	function update_attachments($data)
    {
        $query = array('location' =>$data['location'],
					'education' =>$data['education'],
					'age' =>$data['age'],
					'founding_exp' =>$data['founding_exp'],
					'funding_exp' =>$data['funding_exp'],
					'brief_bio' =>$data['brief_bio']);
        $this->db->where('id',$data['uid']);
		$this->db->update('modified_date', 'NOW()', FALSE);
        $this->db->update('dk_user_info',$query);
		if ($query->num_rows() > 0) 
		{
            return $query->result();
	      }
		  else{
			  return 0;
			}

    }
	function saveattachments($data)
    {
         $sql = "insert into dk_attachments(org_id,type,name,file_name,size,title,description,format,create_date,pid) values ('".$data['org_id']."','".$data['doc_type']."','".$data['file_name']."','".$data['doc_name']."','".$data['doc_size']."','".$data['title']."','".$data['attachdesc']."','".$data['doc_type']."','".date('Y-m-d H:i:s')."','".$data['pid']."')";
		$query  = $this->db->query($sql);
		$insert_id = $this->db->insert_id();
        $this->db->select('type,name,file_name,size,title,description,format,create_date,pid,org_id,id');
        $this->db->from('dk_attachments');
        $this->db->where('org_id',$data['org_id']);
        $this->db->where('pid',$data['pid']);
        $rs=$this->db->get();
        if($rs->num_rows()>0)
        {
          return $rs->result();
        }


    }
    function updateattachments1($data)
    {

        $sql = array('type' =>$data['doc_type'],
                       'name' =>$data['file_name'],
                       'file_name' =>$data['doc_name'],
                      'size' =>$data['doc_size'],
                      'title' =>$data['title'],
                      'description' =>$data['attachdesc'],
                      'format' =>$data['doc_type'],
                      'create_date'=>date('Y-m-d H:i:s')
                    );
        $this->db->where('id',$data['aid']);
        $this->db->where('org_id',$data['org_id']);
        $this->db->update('dk_attachments',$sql);
        return $sql;

    }

	function save_sharedeck($data)
   {

        $res = array('share_link' =>$data['shareurl'],
             'share_password' =>$data['deckpwd'],
         'shared' =>$data['access']);
       $this->db->where('id',$data['org_id']);
       $this->db->update('dk_organisation',$res);
       return $res;
   }
    function get_deck($deckid,$pwd)
    {
        $sql="select client_link,deck_name,share_password from dk_organisation where id = '".$deckid."' and share_password='".$pwd."'";
        $rs = $this->db->query($sql);
        if($rs->num_rows()>0)
        {
            return $rs->result();

        }
        else return 0;
    }
   function get_shareduser($data)
   {
	  $sql="SELECT count(id) as cnt FROM dk_share_deck WHERE email_id = '".$data['email']."'";
		
		  $res = $this->db->query($sql);
	  if ($res) {
			return $res->row();
			  }
		  return 0; 
   }
	 
	function save_deletedeck($data)
	   {
		 
		 $inarray = array('active'    => 'No'); 
	    $this->db->where('id',$data['org_id']);
		$this->db->update('dk_organisation',$inarray);
		
	   }
	function save_shareaccess($data)
    {

		$res = array('shared' =>'No');
        $this->db->where('id',$data['org_id']);
        $this->db->update('dk_organisation',$res);
        return $res;
    }
	function deck_interest($data)
    {
        $sql = "insert into dk_interested(deck_id,uid,browser,action,reg_ip) values ('".$data['deck_id']."','".$data['uid']."','".$data['browser']."','".$data['action']."','".$data['ip']."')";
		$query  = $this->db->query($sql);
		$insert_id = $this->db->insert_id();
		return $insert_id ;

    }
function getimage($data)
    {
        $orgid=$data['orgid'];
		$this->db->select('id,org_id,user_id,media_type,name,file_name,size,format,links,cdte');        
		$this->db->from('dk_org_media as dk_orgmedia');
		$this->db->where('dk_orgmedia.org_id',$orgid);
		$this->db->where('dk_orgmedia.media_type','Image'); 
		$query = $this->db->get();
        if ($query->num_rows() > 0) 
		{
            return $query->result();
	      }
		  else{
			  return 0;
			}
    }
	function getgallery_count($id,$category)
    {
       
		$sql="SELECT count(id) as count1 FROM dk_org_media_download WHERE image_id = '$id' and category ='$category'";
		
		$res = $this->db->query($sql);
		 if ($res) {
			return $res->row();
			  }
		  return 0;
    }
	
	function getimage_count($id)
    {
        $img_id=$id;
		 $sql='SELECT count(id) as count1 FROM dk_org_media_download WHERE image_id = '.$img_id.'';
		$res = $this->db->query($sql);
		 if ($res) {
			return $res->row();
			  }
		  return 0;
    }
	
	
	function getorgdetail($data)
	{
		
		
		$this->db->select('dk_org.id,user_id,unique_id,org_name,deck_name,org_desc,location,org_phase,org_sector,cover_photo,logo,website,linkedin_page,twitter_page,link_organisation,investment_sought,equity,fund_currency,pre_commited_type,reg_num_country,revenue_currency,valuation,pre_commited_money,estimated_sequence,previous_funding,what_we_do,competitors,problem1,problem2,problem3,business_model,advantage,shared,share_password,created_time,modified_date');
		$this->db->from('dk_organisation as dk_org');
		$this->db->where('dk_org.id',$data['deckid']);
		$query = $this->db->get();
        if ($query->num_rows() > 0) 
		{
            return $query->result();
	      }
		  else{
			  return 0;
			}
	}
	function get_valid_sharedetails($pwd)
	{
		$query = $this->db->select('')->from('dk_user_info')->where('email_id',$uname)->get();
        if ($query->num_rows()>0) {
			
           return $query->row();
        }  else {
			
            return 0;
        } 
	}
	function decktrackingLog( $ip ,$action,$browser)
	{	
	
	    $inarray = array(
		                 'reg_ip'    => $ip,
						 'browser'   => $browser,
                          'action'   =>$action
						 ); 
		$this->db->set('log_intime', 'NOW()', FALSE);	
		$this->db->insert('dk_user_track_log',$inarray);
			
	}
	function getdetailinvestor($orgid)
	{
		
		
		$this->db->select('user_id,org_id,member_name,unique_id,role,photo,achievement,member_type');
		$this->db->from('dk_team_members as dk_team');
		$this->db->join('dk_organisation as dk_org', 'dk_team.org_id=dk_org.id', 'left');
		$this->db->or_where('dk_team.member_type','Advisor');
		$this->db->or_where('dk_team.member_type','Investor');
		$this->db->where('dk_org.id',$orgid); 
		$query = $this->db->get();
        if ($query->num_rows() > 0) 
		{
            return $query->result();
	      }
		  else{
			  return 0;
			}
	}
	function get_phase($data)
    {
           
       $this->db->select('id,phase_name')->from('dk_org_phase');
	   
	    
	   $sql = $this->db->get();
		
        if ($sql->num_rows()>0) {

            return $sql->result();
        }  else {

            return 0;
        }
    }
	
	function get_sector($data)
    {
           
       $this->db->select('id,sector_name')->from('dk_org_sector');
	   $sql = $this->db->get();
		
        if ($sql->num_rows()>0) {

            return $sql->result();
        }  else {

            return 0;
        }
    }
     function updateorganization($data)
    {

    	$flag=0;
     
       if($data['table_name']=='dk_org_achieve')
       {
       	$this->db->where($data['field_name'],$data['org_id']);
       	$this->db->from($data['table_name']);
       	$this->db->select($data['field_name']);
       	$es=$this->db->get();
       	if($es->num_rows()==0)
       	{
       	
       	$flag=1;
        $datarr=array($data['field_name']=> $data['org_id'],
        	          $data['content_id'] => $data['update_content'] );
       	$this->db->insert($data['table_name'],$datarr);
		$last_id = $this->db->insert_id();
		if($data['content_id']=='achieve1'||$data['content_id']=='achieve2'||$data['content_id']=='achieve3')
        {
                $this->db->select('achieve1,achieve2,achieve3');
                $this->db->from('dk_org_achieve');
                $this->db->where($data['field_name'],$data['org_id']);
                $rs=$this->db->get();
                if($rs->num_rows()>0)
                {
                    $list=$rs->row();
                    return $list->achieve1."||".$list->achieve2."||".$list->achieve3;

                }
        }

       	}
       }
	   if($data['table_name']=='dk_team_members')
       {
       	$this->db->where($data['field_name'],$data['org_id']);
		$this->db->where('tid',$data['tid']);
       	$this->db->from($data['table_name']);
       	$this->db->select($data['field_name']);
       	$es=$this->db->get();
       	if($es->num_rows()==0)
       	{
       	
       	$flag=1;
        $datarr=array($data['field_name']=> $data['org_id'],
        	          $data['content_id'] => $data['update_content'],
                       'tid'=>$data['tid'],
                        'member_type'=>$data['type']);
       	$this->db->insert($data['table_name'],$datarr);
		$last_id = $this->db->insert_id();
        if($data['content_id']=='member_name'||$data['content_id']=='role'||$data['content_id']=='achievement')
        {
            $this->db->select('photo,member_name,role,achievement,tid');
            $this->db->from('dk_team_members');
            $this->db->where($data['field_name'],$data['org_id']);
            $this->db->where('tid',$data['tid']);
            $rs=$this->db->get();
            if($rs->num_rows()>0)
            {
                $list=$rs->row();
                return $list->member_name."||".$list->role."||".$list->achievement."||".$list->tid."||".$list->photo;

            }
        }
       	}
		else
		{  $flag=1;
			$res = array($data['content_id'] => $data['update_content']);
            $this->db->where('org_id',$data['org_id']);
			$this->db->where('tid',$data['tid']);
            $this->db->update('dk_team_members',$res);
            if($data['content_id']=='member_name'||$data['content_id']=='role'||$data['content_id']=='achievement')
            {
                $this->db->select('photo,member_name,role,achievement,tid');
                $this->db->from('dk_team_members');
                $this->db->where($data['field_name'],$data['org_id']);
                $this->db->where('tid',$data['tid']);
                $rs=$this->db->get();
                if($rs->num_rows()>0)
                {
                    $list=$rs->row();
                    return $list->member_name."||".$list->role."||".$list->achievement."||".$list->tid."||".$list->photo;

                }
            }
			
		}
       }
	    if($data['table_name']=='dk_previous_fund')
       {
       	$this->db->where($data['field_name'],$data['org_id']);
       	$this->db->from($data['table_name']);
       	$this->db->select($data['field_name']);
       	$es=$this->db->get();
       	if($es->num_rows()==0)
       	{
       	
       	$flag=1;
        $datarr=array($data['field_name']=> $data['org_id'],
        	          $data['content_id'] => $data['update_content']);            
       	$this->db->insert($data['table_name'],$datarr);
		$last_id = $this->db->insert_id();
		if($data['content_id']=='date1'||$data['content_id']=='date'||$data['content_id']=='currency'||$data['content_id']=='currency1')
        {
                $this->db->select('date1,currency,date2,currency1');
                $this->db->from('dk_previous_fund');
                $this->db->where('org_id='.$data['org_id']);
                $rs=$this->db->get();
                if($rs->num_rows()>0)
                {
                    $list=$rs->row();
                    $datad1=$list->date1;
                    $datad2=$list->date2;
                    $dated1 = date('M Y', strtotime($datad1));
                    $dated2 = date('M Y', strtotime($datad2));
                    return $list->currency."||".$dated1."||".$list->currency1."||".$dated2;

                }
        }


       	}
		else
		{  $flag=1;
			$res = array($data['content_id'] => $data['update_content']);
            $this->db->where('org_id',$data['org_id']);
            $this->db->update('dk_previous_fund',$res);
            $this->db->select('date1,currency,date2,currency1');
            $this->db->from('dk_previous_fund');
            $this->db->where('org_id='.$data['org_id']);
            $rs=$this->db->get();
            if($rs->num_rows()>0)
            {
                $list=$rs->row();
                $datad1=$list->date1;
                $datad2=$list->date2;
                $dated1 = date('M Y', strtotime($datad1));
                $dated2 = date('M Y', strtotime($datad2));
                return $list->currency."||".$dated1."||".$list->currency1."||".$dated2;

            }

		}
       }
      if($flag==0)
      {
          $update=$data['content_id'];
          $res = array($data['content_id'] =>$data['update_content']);
          $this->db->where($data['field_name'],$data['org_id']);
          $this->db->update($data['table_name'],$res);
          if($data['content_id']=='org_name'||$data['content_id']=='org_desc'||$data['content_id']=='org_reg_number'||$data['content_id']=='location'||$data['content_id']=='org_sector'||$data['content_id']=='website'||$data['content_id']=='date'||$data['content_id']=='linkedin_page'||$data['content_id']=='twitter_page'||$data['content_id']=='link_organisation')
          {
              $this->db->select('org_name,org_desc,org_reg_number,location,org_sector,website,date,linkedin_page,twitter_page,link_organisation');
              $this->db->from('dk_organisation');
              $this->db->where('id='.$data['org_id']);
              $rs=$this->db->get();
              if($rs->num_rows()>0)
              {
                  $list=$rs->row();
                  $datad=$list->date;
                  $dated= date('Y-m-d', strtotime( $datad));
                  return $list->org_name."||".$list->org_desc."||".$list->org_reg_number."||".$list->location."||".$list->org_sector."||".$list->website."||".$dated."||".$list->linkedin_page."||".$list->twitter_page."||".$list->link_organisation;

              }

          }
          if($data['content_id']=='deck_name')
          {
              $this->db->select('deck_name');
              $this->db->from('dk_organisation');
              $this->db->where('id='.$data['org_id']);
              $rs=$this->db->get();
              if($rs->num_rows()>0)
              {
                  $list=$rs->row();
                  return $list->deck_name;

              }
          }
          if($data['content_id']=='deckurl')
          {
              $this->db->select('deckurl');
              $this->db->from('dk_organisation');
              $this->db->where('id='.$data['org_id']);
              $rs=$this->db->get();
              if($rs->num_rows()>0)
              {
                  $list=$rs->row();
                  return $list->deckurl;

              }
          }
          if($data['content_id']=='what_we_do'||$data['content_id']=='competitors'||$data['content_id']=='problem1'||$data['content_id']=='problem2'||$data['content_id']=='problem3')
          {
              $this->db->select('what_we_do,competitors,problem1,problem2,problem3');
              $this->db->from('dk_organisation');
              $this->db->where('id='.$data['org_id']);
              $rs=$this->db->get();
              if($rs->num_rows()>0)
              {
                  $list=$rs->row();
                  return $list->what_we_do."||".$list->competitors."||".$list->problem1."||".$list->problem2."||".$list->problem3;

              }
          }
          if($data['content_id']=='business_model'||$data['content_id']=='advantage')
          {
              $this->db->select('business_model,advantage');
              $this->db->from('dk_organisation');
              $this->db->where('id='.$data['org_id']);
              $rs=$this->db->get();
              if($rs->num_rows()>0)
              {
                  $list=$rs->row();
                  return $list->business_model."||".$list->advantage;

              }
          }
          if($data['content_id']=='fund_currency'||$data['content_id']=='pre_commited_type'||$data['content_id']=='investment_sought'||$data['content_id']=='equity'||$data['content_id']=='valuation'||$data['content_id']=='pre_commited_money'||$data['content_id']=='revenue_currency'||$data['content_id']=='estimated_sequence')
          {
              $this->db->select('fund_currency,pre_commited_type,investment_sought,equity,valuation,pre_commited_money,revenue_currency,estimated_sequence');
              $this->db->from('dk_organisation');
              $this->db->where('id='.$data['org_id']);
              $rs=$this->db->get();
              if($rs->num_rows()>0)
              {
                  $list=$rs->row();
                  return $list->fund_currency."||".$list->pre_commited_type."||".$list->investment_sought."||".$list->equity."||".$list->valuation."||".$list->pre_commited_money."||".$list->revenue_currency."||".$list->estimated_sequence;

              }
          }
          if($data['content_id']=='achieve1'||$data['content_id']=='achieve2'||$data['content_id']=='achieve3')
          {
              $this->db->select('achieve1,achieve2,achieve3');
              $this->db->from('dk_org_achieve');
              $this->db->where($data['field_name'],$data['org_id']);
              $rs=$this->db->get();
              if($rs->num_rows()>0)
              {
                  $list=$rs->row();
                  return $list->achieve1."||".$list->achieve2."||".$list->achieve3;

              }
          }
          if($data['content_id']=='member_name'||$data['content_id']=='role'||$data['content_id']=='achievement')
          {
              $this->db->select('photo,member_name,role,achievement,tid');
              $this->db->from('dk_team_members');
              $this->db->where($data['field_name'],$data['org_id']);
              $this->db->where('tid',$data['tid']);
              $rs=$this->db->get();
              if($rs->num_rows()>0)
              {
                  $list=$rs->row();
                  return $list->member_name."||".$list->role."||".$list->achievement."||".$list->tid."||".$list->photo;

              }
          }
          }

    } 
    function getorganisationall_detail($data)
    {
       
        $this->db->select('dk_org.id,user_id,unique_id,org_name,deck_name,deckurl,org_desc,location,org_phase,org_sector,cover_photo,org_reg_number,logo,website,linkedin_page,date,twitter_page,link_organisation,investment_sought,fund_currency,equity,revenue_currency,pre_commited_type,valuation,pre_commited_money,estimated_sequence,previous_funding,what_we_do,competitors,problem1,problem2,problem3,business_model,advantage,shared,share_password,share_link,client_link,created_time,modified_date');
        $this->db->from('dk_organisation as dk_org');
        $this->db->where('dk_org.id',$data['orgid']);
        
        $query = $this->db->get();

        if ($query->num_rows() > 0) 
        {
            return $query->row();
          }
          else{
              return 0;
            }
            
    }

	function getorganisation_copy($data)
	{
		$this->db->select('dk_org.id,user_id,unique_id,org_name,org_desc,location,org_phase,org_sector,cover_photo,logo,website,linkedin_page,twitter_page,link_organisation,fund_currency,pre_commited_type,investment_sought,equity,valuation,pre_commited_money,	org_registered,org_generated_revenue,reg_num_country,org_reg_number,revenue_currency,estimated_sequence,previous_funding,what_we_do,competitors,problem1,problem2,problem3,business_model,advantage,shared,share_password,share_link,created_time,modified_date');        
        $this->db->from('dk_organisation as dk_org');
        $this->db->where('dk_org.id',$data['orgid']);
        
        $query = $this->db->get();

        if ($query->num_rows() > 0) 
        {
            return $query->result();
          }
          else{
              return 0;
            }
	}
	
		function savedeckview($data)
	{   
		
	    $inarray = array('org_id'    =>$data['deck_id']);
        $this->db->set('view_time', 'NOW()', FALSE);
		$this->db->insert('dk_deck_view',$inarray);
        $LID = $this->db->insert_id();
		return	$LID;
	}
		function saveprint($data)
	{   
		
	    $inarray = array('user_id'    =>$data['uid'],
		                   'org_id'    =>$data['org_id'],
						   'browser'   =>$data['browser'],
						   'print_time'=>date("Y-m-d H:i:s"));
        
		
		$this->db->insert('dk_deck_print',$inarray);
        $LID = $this->db->insert_id();
		return	$LID;
	}
	function getinterest($orgid)
	{


        $sql='SELECT count(id) as count1 FROM dk_interested WHERE deck_id = '.$orgid.' group by deck_id';
        $rs=$this->db->query($sql);
        if ($rs->num_rows()>0) {
            $list=$rs->row();
            $count=$list->count1;
            return $count;
              }
              else  return 0;

	}
	
	function updatecoverimg($data)
{
$res = array('cover_photo'=>$data['cover_name']);
       $this->db->where('id',$data['org_id']);
      $this->db->update('dk_organisation',$res);
      return $res;
}
function updatelogoimg($data)
{
$res = array('logo'=>$data['logo_name']);
       $this->db->where('id',$data['org_id']);
      $this->db->update('dk_organisation',$res);
      return $res;
}

	function getvideo($data)
   {
       $orgid=$data['orgid'];
      $this->db->select('id,org_id,user_id,media_type,name,file_name,size,format,links,cdte');        
      $this->db->from('dk_org_media as dk_orgmedia');
      $this->db->where('dk_orgmedia.org_id',$orgid);
      $this->db->where('dk_orgmedia.media_type','Video'); 
       $query = $this->db->get();
       if ($query->num_rows() > 0) 
      {
           return $query->result();
       }
     else{
 return 0;
    }
   }

function getviews($orgid)
{

$sql='SELECT count(id) as count1 FROM dk_deck_view WHERE org_id = '.$orgid.' group by org_id';
 $res = $this->db->query($sql);
 if ($res) {
return $res->result();
 }
 return 0;


}
   	function getdocs($orgid)
   {

      $this->db->select('id,org_id,type,name,file_name,size,format,create_date');        
      $this->db->from('dk_attachments as dk_attachments');
      $this->db->where('dk_attachments.org_id',$orgid);
       $query = $this->db->get();
       if ($query->num_rows() > 0) 
      {
           return $query->result();
       }
     else{
 return 0;
    }
   }
function getdownloads($deckid)
{

$sql='SELECT count(id) as count1 FROM dk_org_media_download WHERE deck_id = '.$deckid.' group by deck_id';
 $res = $this->db->query($sql);
 if ($res) {
return $res->result();
 }
 return 0;


}
function getprints($orgid)
{

$sql='SELECT count(id) as count1 FROM dk_deck_print WHERE org_id = '.$orgid.' group by org_id';
 $res = $this->db->query($sql);
 if ($res) {
return $res->result();
 }
 return 0;


}
function saveprint_count($data)
	{
        $orgid = $data['org_id'];
		$sql= $this->db->query('SELECT print_count as p_count FROM dk_organisation WHERE id = '.$orgid.' group by id')->row();
		if ($sql) {
				$print_count = $sql->p_count; 
			}
		
	$sql1 = array('print_count '=>$print_count + '1');
       $this->db->where('id',$orgid);
      $this->db->update('dk_organisation',$sql1);
      return $sql1;
		}
		
function savegallery_count($data)
	{
        $orgid = $data['deck_id'];
		$sql= $this->db->query('SELECT download_count as dwnld_count FROM dk_organisation WHERE id = '.$orgid.' group by id')->row();
		
		if ($sql) {
				$download_count = $sql->dwnld_count; 
			}
		
	  $sql1 = array('download_count '=>$download_count + '1');
       $this->db->where('id',$orgid);
      $this->db->update('dk_organisation',$sql1);
      return $sql1;
		}
		

function deckview_count($data)
	{
      $orgid = $data['orgid'];
		$sql= $this->db->query('SELECT view_count as vw_count FROM dk_organisation WHERE id = '.$orgid.' group by id')->row();
		
		if ($sql) {
				$view_count = $sql->vw_count; 
			}
		
	  $sql1 = array('view_count '=>$view_count + '1');
       $this->db->where('id',$orgid);
      $this->db->update('dk_organisation',$sql1);
      return $sql1;
		}
		
function deckinterest_count($data)
	{
      $orgid = $data['deck_id'];
		$sql= $this->db->query('SELECT interest_count as intr_count FROM dk_organisation WHERE id = '.$orgid.' group by id')->row();
		
		if ($sql) {
				$intr_count = $sql->intr_count; 
			}
		
	  $sql1 = array('interest_count '=>$intr_count + '1');
       $this->db->where('id',$orgid);
      $this->db->update('dk_organisation',$sql1);
      return $sql1;
		}

    function createorg($data)
    {

        $res = array($data['content_id'] =>$data['update_content'],
            'user_id'=>$data['uid'],
            'unique_id' =>$data['uniqueid'],
            'client_link'=>$data['deckurl'],
            'created_time'=>date("Y-m-d H:i:s"),
            'modified_date'=>date("Y-m-d H:i:s"));
        $this->db->insert($data['table_name'],$res);
        $lid = $this->db->insert_id();
        $query = $this->db->select('id,deck_name')->from('dk_organisation')->where('id',$lid)->get();
        if ($query->num_rows()>0)
        {

            return $query->result();
        }  else
        {
            return 0;
        }
    }


    function updateteamimg($data)
    {
	    $this->db->where('org_id',$data['org_id']);
		$this->db->where('tid',$data['tid']);
       	$this->db->from('dk_team_members');
       	$this->db->select('photo');
       	$es=$this->db->get();
       	if($es->num_rows()==0)
       	{
       	
       	$res = array('photo'=>$data['pic_name'],
	                 'org_id'=>$data['org_id'],
					 'tid' =>$data['tid'],
					 'member_type'=>'Team-Member');
        $this->db->insert('dk_team_members',$res);
        $insert_id = $this->db->insert_id();
        $this->db->select('photo,tid');
        $this->db->from('dk_team_members');
        $this->db->where('org_id',$data['org_id']);
        $this->db->where('tid',$data['tid']);
        $rs=$this->db->get();
        if($rs->num_rows()>0)
        {
            $list=$rs->row();
            return $list->photo."||".$list->tid;

        }
       	}
        else
		{
			$res = array('photo'=>$data['pic_name']);
            $this->db->where('org_id',$data['org_id']);
			$this->db->where('tid',$data['tid']);
            $this->db->update('dk_team_members',$res);
            $this->db->select('photo,tid');
            $this->db->from('dk_team_members');
            $this->db->where('org_id',$data['org_id']);
            $this->db->where('tid',$data['tid']);
            $rs=$this->db->get();
            if($rs->num_rows()>0)
            {
                $list=$rs->row();
                return $list->photo."||".$list->tid;

            }


        }
    }
    function getmember($orid,$tid)
        {


            $this->db->select('org_id,member_name,role,photo,achievement,member_type');
            $this->db->from('dk_team_members as dk_team');
            $this->db->where('dk_team.org_id',$orid);
            $this->db->where('dk_team.tid',$tid);
            $query = $this->db->get();
            if ($query->num_rows() > 0)
            {
                return $query->result();
              }
              else
              {
                  return 0;
                }
        }
            function updateinvstimg($data)
    {
            $this->db->where('org_id',$data['org_id']);
            $this->db->where('tid',$data['tid']);
            $this->db->from('dk_team_members');
            $this->db->select('photo');
            $es=$this->db->get();
            if($es->num_rows()==0)
            {

            $res = array('photo'=>$data['pic_name'],
                         'org_id'=>$data['org_id'],
                         'tid' =>$data['tid'],
                         'member_type'=>'Invester');
            $this->db->insert('dk_team_members',$res);
            $insert_id = $this->db->insert_id();
                $this->db->select('photo,tid');
                $this->db->from('dk_team_members');
                $this->db->where('org_id',$data['org_id']);
                $this->db->where('tid',$data['tid']);
                $rs=$this->db->get();
                if($rs->num_rows()>0)
                {
                    $list=$rs->row();
                    return $list->photo."||".$list->tid;

                }
            }
            else
            {
                $res = array('photo'=>$data['pic_name']);
                $this->db->where('org_id',$data['org_id']);
                $this->db->where('tid',$data['tid']);
                $this->db->update('dk_team_members',$res);
                $this->db->select('photo,tid');
                $this->db->from('dk_team_members');
                $this->db->where('org_id',$data['org_id']);
                $this->db->where('tid',$data['tid']);
                $rs=$this->db->get();
                if($rs->num_rows()>0)
                {
                    $list=$rs->row();
                    return $list->photo."||".$list->tid;

                }
            }

    }



    function getdecks($uid)
    {
        $sql="SELECT id,deck_name,org_name,logo from  dk_organisation WHERE user_id = '".$uid."' order by id ASC LIMIT 0,5";
        $res = $this->db->query($sql);
        if ($res) {
            return $res->result();
        }
        return 0;
    }
    function get_docs($orgid,$pid)
    {
        $sql="SELECT id,org_id,type,name,file_name,size,format,	title,description,pid,create_date from  dk_attachments WHERE org_id = '".$orgid."' and pid='".$pid."'";
        $res = $this->db->query($sql);
        if ($res)
        {
            return $res->result();
        }
        return 0;
    }
    function savemedia_download($data)
    {
        $sql = "insert into dk_org_media_download(deck_id,doc_id,category,reg_ip,browser,download_date) values ('".$data['deck_id']."','".$data['docid']."','".$data['type']."','".$data['ip']."','".$data['browser']."','".date('Y-m-d H:i:s')."')";
        $query  = $this->db->query($sql);
        $insert_id = $this->db->insert_id();
        return $insert_id ;

    }
    function deleteattach($data)
    {
        $sql = "Delete from dk_attachments where  org_id='".$data['org_id']."' and pid='".$data['pmid']."'";
        $query  = $this->db->query($sql);
        return $query;

    }
	function deckupd($data)
    {

        $sql = "insert into dk_updates(deckid,msg,update_date,cusr) values ('".$data['id']."','".$data['msg']."',now(),'".$data['uid']."')";
        $query  = $this->db->query($sql);
        $insert_id = $this->db->insert_id();
        $this->db->select('msg,update_date,org_name');
        $this->db->from('dk_updates as dk_up');
        $this->db->join('dk_organisation as dk_org ', 'dk_org.id=dk_up.deckid', 'left');
        $this->db->where('dk_up.id',$insert_id);
        $rs=$this->db->get();
        if($rs->num_rows()>0)
        {
            $sql='SELECT count(id) as count1 FROM dk_updates WHERE deckid = '.$data['id'].' group by deckid';
            $res=$this->db->query($sql);
            if ($res->num_rows()>0)
            {
                $list1=$res->row();
                $count=$list1->count1;
            }
            else
            {
                $count='';
            }
            $list=$rs->row();
			$dated=$list->update_date;
            $adated = date('d/m/Y', strtotime($dated));
            return $list->msg.'||'.$adated.'||'.$list->org_name.'||'.$count;

        }
        else return 0;

    }
	
	function getdeckupdate($id)
    {
        
        $this->db->select('msg,update_date,dk_up.id,deckid,cusr,org_name');
        $this->db->from('dk_updates as dk_up');
        $this->db->join('dk_organisation as dk_org ', 'dk_org.id=dk_up.deckid', 'left');
        $this->db->where('dk_up.deckid',$id);
        $rs=$this->db->get();
        if($rs->num_rows()>0)
        {
            
           return  $rs->result();
              //print_r($rs);die;
            //echo $this->db->last_query();

        }
        else return 0;

    }
    function getshareurl($url)
    {

        $this->db->select('id,deck_name,client_link');
        $this->db->from('dk_organisation');
        $this->db->where('client_link',$url);
        $rs=$this->db->get();
        if($rs->num_rows()>0)
        {

            return  $rs->result();

        }
        else return 0;

    }
    function gettrackdecks($uid)
    {
        $sql="SELECT  dk_org.id,deck_name,org_name,logo,uid from  dk_interested as dk_in join dk_organisation as dk_org on(dk_in.deck_id=dk_org.id)  WHERE uid = '".$uid."' order by id desc LIMIT 0,5";
        $res = $this->db->query($sql);
        if ($res) {
            return $res->result();
        }
        return 0;
    }
    function getupdatecount($orgid)
    {


        $sql='SELECT count(id) as count1 FROM dk_updates WHERE deckid = '.$orgid.' group by deckid';
        $rs=$this->db->query($sql);
        if ($rs->num_rows()>0) {
            $list=$rs->row();
            $count=$list->count1;
            return $count;
        }
        else  return 0;

    }
    function getclientlink($data)
    {
        $this->db->select('client_link');
        $this->db->from('dk_organisation');
        $this->db->where('id',$data['shareid']);
        $rs=$this->db->get();
        if($rs->num_rows()>0)
        {
            $list=$rs->row();
            return $list->client_link;

        }
        else return 0;
    }
}
