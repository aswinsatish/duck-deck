<?php

class M_register extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

function create($data)
{
	   $sql = "insert into dk_user_info(unique_id,first_name,last_name,email_id,password,user_password,reg_time,reg_ip,linkedin_user) values ( CONCAT('D-','".date('YmdHi')."'),'".$data['first_name']."','".$data['last_name']."','".$data['email']."','".$data['passwd']."','".$data['password']."',now(),'".$data['reg_ip']."','".$data['linkedin_user']."')";
	  $res = $this->db->query($sql);
	  $LID = $this->db->insert_id();
	  return	$LID;
	
}
	
	
}
?>