	<?php 
class M_deck extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	

	function get_user_valid($username)
	{  	 
		$query = $this->db->select('*')->from('dk_user_info')->where('email_id',$username)->get();
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
                          'unique_id'  =>$data['uniqueid'],
						  'user_id'    =>$data['uid']);
        $this->db->set('created_time', 'NOW()', FALSE);
		$this->db->set('modified_date', 'NOW()', FALSE);
		$this->db->insert('dk_organisation',$inarray);
        $LID = $this->db->insert_id();
		return	$LID;
	}
    function deckcreation($data)
    {
        $res = array('org_desc' =>$data['org_desc']);
		//$this->db->update('modified_date', 'NOW()', FALSE);
        $this->db->where('id',$data['org_id']);
        $this->db->update('dk_organisation',$res);
		
        return $res;

    }
    function updateorg($data)
    {
        $res = array('location' =>$data['city'],
                      'org_sector'=>$data['sector'],
                      'org_phase'=>$data['phase']);
        
        $this->db->where('id',$data['org_id']);
		
        $this->db->update('dk_organisation',$res);
        return $res;

    }
	 function updateorg1($data)
    {
        $res = array( 'cover_photo' =>$data['org_key1'],
					  'logo' =>$data['org_key'],		
					  'website' =>$data['org_web'],
                      'linkedin_page'=>$data['org_linkedin'],
                      'twitter_page'=>$data['org_twitter'],
					  'link_organisation'=>$data['org_social']);

        $this->db->where('id',$data['org_id']);
		
        $this->db->update('dk_organisation',$res);
        return $res;

    }
    function update_investment($data)
    {
        $sql = array( 'fund_currency' =>$data['fundcurrency'],
		               'pre_commited_type' =>$data['currencytype'],
		              'investment_sought' =>$data['fund'],
                      'equity'=>$data['equity'],
                     'valuation'=>$data['valuation'],
			         'pre_commited_money'=>$data['previous_fund']);
        //print_r($sql);die;
        $this->db->where('id',$data['org_id']);
		
        $this->db->update('dk_organisation',$sql);
        return $sql;

    }
    function update_investment1($data)
    {
        $query = array('org_registered'=>$data['org_register'],
		               'org_generated_revenue'=>$data['orgrevenue'],
					   'reg_num_country'=>$data['countryval'],
					   'org_reg_number'=>$data['reg_number'],
					   'revenue_currency'=>$data['estrevenue'],
                       'estimated_sequence'=>$data['estimated_revenue']);

        $this->db->where('id',$data['org_id']);
		
        $this->db->update('dk_organisation',$query);
        return $query;

    }
	function update_investment_previous($data)
    {
        $query = array(
            'previous_funding'=>$data['raised_funds']);

        $this->db->where('id',$data['org_id']);
		
        $this->db->update('dk_organisation',$query);
        return $query;

    }
    function previous_fund($data)
    {
        $inarray = array('org_id' =>$data['org_id'],
                     'date'=>$data['date_of_fund'],
                     'currency'=>$data['amount_raised'],
					  'currency_type'=>$data['amounttype']);
       // print_r($inarray);die;
        $this->db->insert('dk_previous_fund',$inarray);
        $LID = $this->db->insert_id();
        return	$LID;

    }
	function update_org_what($data)
    {
        $query = array(
                     'what_we_do'=>$data['solution'],
                     'competitors'=>$data['competitors']);
        $this->db->where('id',$data['org_id']);
		
        $this->db->update('dk_organisation',$query);
        return $query;

    }
	function update_org_what2($data)
    {
        $query = array( 'problem1'=>$data['problem1'],
                        'problem2'=>$data['problem2'],
						'problem3'=>$data['problem3']);
        $this->db->where('id',$data['org_id']);
		
        $this->db->update('dk_organisation',$query);
        return $query;

    }
	function update_org_how($data)
    {
        $query = array( 'business_model'=>$data['source'],
                        'advantage'=>$data['advantage']);
        $this->db->where('id',$data['org_id']);
		
        $this->db->update('dk_organisation',$query);
        return $query;

    }
	
	function update_org_how1($data)
    {
        $inarray = array('org_id' =>$data['org_id'],
                     'achieve'=>$data['achieve']);
       //print_r($inarray);die;
	   
        $this->db->insert('dk_org_achieve',$inarray);
        $LID = $this->db->insert_id();
        return	$LID;

    }
function updatemedia($data)
	{

	    $inarray = array('org_id'    => $data['org_id'],
                          'name'  =>$data['name'],
						  'file_name'  =>$data['image_name'],
						  'format'  =>$data['image_type'],
						  'size'  =>$data['image_size'],
						  'media_type'    =>$data['media_type']);
        
		 $this->db->insert('dk_org_media',$inarray);
       
	}
	function updatemedia1($data)
	{
		
		for ($i= 1 ; $i <= $_POST['imagecount'] ; $i++){
			  $inarray = array('org_id'    => $data['org_id'],
                          'name'  =>$data['media_image'.$i],
						  'file_name'  =>$data['filename'.$i],
						  'format'  =>$data['media_format'.$i],
						  'size'  =>$data['media_size'.$i],
						  'media_type'    =>$data['media_type'.$i]);
        		$this->db->insert('dk_org_media',$inarray);
		}
			
		
		
		}
	function getuserdetail($id)
    {
		 $query = $this->db->select('*')->from('dk_user_info')->where('id',$id)->get();  
		//echo $this->db->last_query();
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
    function getorganisation($uid)
    {

         $sql = $this->db->select('id,user_id,unique_id,org_name,org_desc,location,org_phase,org_sector,cover_photo,logo,website,linkedin_page,twitter_page,link_organisation,investment_sought,equity,valuation,pre_commited_money,estimated_sequence,previous_funding,what_we_do,competitors,problem1,problem2,problem3,business_model,advantage,shared,share_password,share_link,created_time,modified_date')->from('dk_organisation')->where('user_id',$uid)->get();
        if ($sql->num_rows()>0) {

            return $sql->result();
        }  else {

            return 0;
        }
    }
	function getorganisation_detail($data)
    {
       
        $this->db->select('id,user_id,unique_id,org_name,org_desc,location,org_phase,org_sector,cover_photo,logo,website,linkedin_page,twitter_page,link_organisation,investment_sought,equity,valuation,pre_commited_money,estimated_sequence,previous_funding,what_we_do,competitors,problem1,problem2,problem3,business_model,advantage,shared,created_time,modified_date');        
		$this->db->from('dk_organisation as dk_org');
		$this->db->where('dk_org.id',$data['orgid']);
		$this->db->where('dk_org.user_id',$data['uid']); 
		$query = $this->db->get();
        if ($query->num_rows() > 0) 
		{
            return $query->result();
	      }
		  else{
			  return 0;
			}
			
    }
	function org_achieve($orgid)
    {
           
       $sql = $this->db->select('id,org_id,achieve')->from('dk_org_achieve')->where('org_id',$orgid)->get();
		
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
           
       $sql = $this->db->select('date,currency')->from('dk_previous_fund')->where('org_id',$data['orgid'])->get();
		
        if ($sql->num_rows()>0) {

            return $sql->result();
        }  else {

            return 0;
        }
    }
	function add_teammember($data)
    {  //print_r($data);die;
        $inarray = array('org_id' =>$data['org_id'],
                     'member_name'=>$data['member_name'],
					 'role'=>$data['role'],
					 'photo'=>$data['photo'],
					 'achievement'=>$data['achievement'],
					 
					 'member_type'=>$data['type']);
        
        $this->db->insert('dk_team_members',$inarray);
        $LID = $this->db->insert_id(); 
        return	$LID;

    }
	function add_investmember($data)
    {  
        $inarray = array('org_id' =>$data['org_id'],
                     'member_name'=>$data['member_name'],
					 'photo'=>$data['photo'],
					 'achievement'=>$data['achievement'],
					 'member_type'=>$data['type']);
        //print_r($inarray);die;
        $this->db->insert('dk_team_members',$inarray);
        $LID = $this->db->insert_id(); 
        return	$LID;

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
	function getinvestor($uid)
	{
		
		
		$this->db->select('user_id,org_id,member_name,unique_id,role,photo,achievement,member_type');
		$this->db->from('dk_team_members as dk_team');
		$this->db->join('dk_organisation as dk_org', 'dk_team.org_id=dk_org.id', 'left');
		$this->db->or_where('dk_team.member_type','Advisor');
		$this->db->or_where('dk_team.member_type','Investor');
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
	function update_editprofile($data)
    {
        $res = array('first_name' =>$data['firstname'],
		             'last_name' =>$data['lastname'],
		             'email_id' =>$data['emailid'],
		             'profile_pic' =>$data['profilepic'],
		            'location' =>$data['location'],
					'education' =>$data['education'],
					'age' =>$data['age'],
					'founding_exp' =>$data['founding_exp'],
					'funding_exp' =>$data['funding_exp'],
					'brief_bio' =>$data['brief_bio']);
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
	function saveattachments1($data)
    {
         $sql = "insert into dk_attachments(org_id,type,name,file_name,size,format) values ('".$data['org_id']."','".$data['ext1']."','".$data['image1name']."','".$data['image1_name']."','".$data['image1_size']."','".$data['image1_type']."')";
		$query  = $this->db->query($sql);
		$insert_id = $this->db->insert_id();
		return $insert_id ;

    }
	function saveattachments2($data)
    {
        $sql = "insert into dk_attachments(org_id,file_name,size,format) values ('".$data['org_id']."','".$data['image2_name']."','".$data['image2_size']."','".$data['image2_type']."')";
		//echo $sql;
		
		$query  = $this->db->query($sql);
		$insert_id = $this->db->insert_id();
		return $insert_id ;

    }
	function saveattachments3($data)
    {
        $sql = "insert into dk_attachments(org_id,file_name,size,format) values ('".$data['org_id']."','".$data['image3_name']."','".$data['image2_size']."','".$data['image2_type']."')";
		//echo $sql;
		
		$query  = $this->db->query($sql);
		$insert_id = $this->db->insert_id();
		return $insert_id ;

    }
	function save_sharedeck($data)
    {
       
	   $data['email_id']=explode(',', $data['email']);
	   foreach($data['email_id'] as $val)
		{   
		    
			//print_r($data);die;
           $query = "insert into dk_share_deck(org_id,email_id,shared_time,shared_user) values ('".$data['org_id']."','".$val."','".date('Y-m-d H:i:s')."','".$data['shareuser']."')";
            $this->db->query($query); 
            		
       
		}
		$res = array('share_link' =>$data['shareurl'],
		              'share_password' =>$data['deckpwd'],
					  'shared' =>'Yes');
        $this->db->where('id',$data['org_id']);
        $this->db->update('dk_organisation',$res);
        return $res;
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
        $sql = "insert into dk_interested(deck_id,email_id,browser,action) values ('".$data['deck_id']."','".$data['email_id']."','".$data['browser']."','".$data['action']."')";
		//echo $sql;die;
		
		$query  = $this->db->query($sql);
		$insert_id = $this->db->insert_id();
		return $insert_id ;

    }
}