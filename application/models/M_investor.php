	<?php 
class M_investor extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function login($username, $password) 
	{
        $this->db->select('*');
        $this->db->from('dk_user_info');
        $this->db->where('email_id',$username);
        $this->db->where('password',$password);  
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return 0;
        }
    }
    function invalid_shareduser($data){
		$query = $this->db->select('email_id')->from('dk_share_deck')->where('email_id',$data['email'])->get(); 
		if ($query->num_rows()>0) {
           return $query->row();
        } else {
            return 0;
        }  	
	}
	function get_user_valid($username)
	{  	 
		$query = $this->db->select('id,unique_id,first_name,last_name,email_id,password,user_type')->from('dk_user_info')->where('email_id',$username)->get();
         //print_r($query);die;	
		if ($query->num_rows()>0) {
           return $query->row();
        } else {
            return 0;
        }  		
	}

	function trackingLog($uid, $ip ,$action,$parameters,$browser)
	{	
	
	    $inarray = array('user_id'    => $uid,
		                 'reg_ip'    => $ip,
						 'browser'   => $browser,
                          'action'   =>$action
						 ); 
		$this->db->set('log_intime', 'NOW()', FALSE);	
		$this->db->insert('dk_user_track_log',$inarray);
			
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
	
   function update_userdetails($uid,$email,$action)
   {
       $inarray = array('user_id'  => $uid,
                        'action'   => $action);
       $this->db->set('update_time', 'NOW()', FALSE);
       $this->db->insert('dk_user_update',$inarray);
       
   }
   function create($data)
	{
		  $sql = "insert into dk_user_info(unique_id,email_id,password,user_password,reg_time,reg_ip,linkedin_user,user_type) values ( CONCAT('D-','".date('YmdHi')."'),'".$data['email']."','".$data['passwd']."','".$data['password']."',now(),'".$data['reg_ip']."','".$data['linkedin_user']."','investor')";
		  $res = $this->db->query($sql);
		  if ($res) {
				return $this->db->insert_id();
				  }
			  return 0;
		
	}
	function getshareddeck($data)
    {
         $email=$data['email']; 
         $this->db->select('dk_org.id,user_id,unique_id,org_name,org_desc,location,org_phase,org_sector,sector_name,phase_name,cover_photo,logo,website,linkedin_page,twitter_page,link_organisation,fund_currency,	pre_commited_type,investment_sought,equity,valuation,pre_commited_money,org_registered,org_generated_revenue,reg_num_country,org_reg_number,revenue_currency,estimated_sequence,previous_funding,what_we_do,competitors,problem1,problem2,problem3,business_model,advantage,shared,share_password,share_link,created_time,modified_date');
		 $this->db->from('dk_organisation as dk_org');
		 $this->db->join('dk_org_sector as dk_sec ', 'dk_org.org_sector=dk_sec.id', 'left');
		 $this->db->join('dk_org_phase as dk_phase ', 'dk_org.org_phase=dk_phase.id', 'left');
		 $this->db->join('dk_share_deck as dk_share ', 'dk_org.id=dk_share.org_id', 'left');
		 $this->db->where('active','Yes');
		 $this->db->where('dk_share.email_id',$email);
		 $this->db->order_by('dk_org.id','desc');
		 $query = $this->db->get();  //echo $this->db->last_query();
        if ($query->num_rows()>0) {

            return $query->result();
        }  else {

            return 0;
        }
    }
	function getinterested($data)
    {
         $email=$data['email']; 
         $this->db->select('dk_org.id,user_id,unique_id,org_name,org_desc,location,org_phase,org_sector,sector_name,phase_name,cover_photo,logo,website,linkedin_page,twitter_page,link_organisation,fund_currency,	pre_commited_type,investment_sought,equity,valuation,pre_commited_money,org_registered,org_generated_revenue,reg_num_country,org_reg_number,revenue_currency,estimated_sequence,previous_funding,what_we_do,competitors,problem1,problem2,problem3,business_model,advantage,shared,share_password,share_link,created_time,modified_date');
		 $this->db->from('dk_organisation as dk_org');
		 $this->db->join('dk_org_sector as dk_sec ', 'dk_org.org_sector=dk_sec.id', 'left');
		 $this->db->join('dk_org_phase as dk_phase ', 'dk_org.org_phase=dk_phase.id', 'left');
		 $this->db->join('dk_interested as dk_int ', 'dk_org.id=dk_int.deck_id', 'left');
		 $this->db->where('active','Yes');
		 $this->db->where('dk_int.email_id',$email);
		 $this->db->order_by('dk_org.id','desc');
		 $query = $this->db->get();  
        if ($query->num_rows()>0) {

            return $query->result();
        }  else {

            return 0;
        }
    }
	 
}