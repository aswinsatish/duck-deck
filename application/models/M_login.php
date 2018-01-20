<?php 
class M_login extends CI_Model
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

function get_user_valid($username)
	{  	 
		$query = $this->db->select('id,unique_id,email_id,password,user_type')->from('dk_user_info')->where('email_id',$username)->get();
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
	function resetpassword($hashpwd,$pwd,$email)
	{

        $res = array('password' =>$hashpwd,
                     'user_password'=>$pwd);
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
  function create($data)
	{
		   $sql = "insert into dk_user_info(unique_id,email_id,password,user_password,user_type,reg_time,reg_ip) values ( CONCAT('D-','".date('YmdHi')."'),'".$data['email']."','".$data['passwd']."','".$data['password']."','".$data['utype']."',now(),'".$data['reg_ip']."')";
		  $res = $this->db->query($sql);
		  $LID = $this->db->insert_id();
		  return	$LID;
		
	}
}