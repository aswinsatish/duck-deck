<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class General {
var $rootPath = "";
var  $basePath ="" ;
var $platformId = "100";
// var $version = "Beta Version 2.0.";
var $version = "Version 3.0";
var $allow_simultaneous_login = false;
var $max_licensed_user = 10;
    function __construct()
    {
       
    }
    function General()
    {
		$this->CI = & get_instance();
		$this->CI->load->helper('url');
		$this->basePath = str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$this->rootPath =$_SERVER['DOCUMENT_ROOT'].$this->basePath;
    }	
	
	function getVer($frm){
		$ver = array(	"login"=>"1",
						"dashboard"=>"1",
						"course_new"=>"1",
						"course_new_list"=>"1",
						"course_new_info"=>"1",
						"course_current"=>"1",
						"course_current_list"=>"1",
						"course_current_info"=>"1",
						"course_complete"=>"1",
						"course_complete_list"=>"1",
						"course_complete_info"=>"1",
						"expert"=>"1",
						"expert_ask"=>"1",
						"notes"=>"1",
						"docs"=>"1",
						"glossary"=>"1",
						"message"=>"1",
						"settings"=>"2",
						"support_help"=>"1",
						"support_tts"=>"1",
						"support_tts_reply"=>"1",
						"support_faq"=>"1");

	//	return $this->version.$ver[$frm];
	  return $this->version ;
	
	}
	
	function realUploadPath($index){
	  
	   $folders =  array("images"=>'images','css'=>'css','js'=>'js','swf'=>'swf','certificate'=>'certificate','template'=>'templates','banner'=>'banner','course'=>'courses',"photo"=>'../admin/photo', 'assets'=>'assets/uploads');

	   return $folders[$index]."/";
	}
	function currentP($pID){	    
	    $this->CI->load->model("m_project");
		$res=$this->CI->m_project->currentP($pID);
		return $res;
		
	}
	
	function footer(){
	
	  return "<span style='text-align:right; float:left; display:inline'><a href='http://logicalsteps.com' target='_blank'>Logical Steps</a></span>";
	}
	
	function beta(){
	  return "<span style='text-align:right; float:right; display:inline'>Beta Ver 2.1</span>";
	
	}
	
	/* Methode     : feedbackStatus
	   Description : This methode is to retrive the feedback status .Now its is hardcoded.
	                 0 - In Progress
	                 1 - Done
					 2 - In production
	 */           

	
	function realPath($index){
	  
	 $folders =  array("images"=>'img','css'=>'css','file'=>'upFiles','js'=>'js','swf'=>'swf','large'=>'img/large','small'=>'img/small', 'assets'=>'assets');
	   return $this->basePath.$folders[$index]."/"; 
	}
	/*function realUploadPath($index){
	  
	 $folders =  array();
	   return $folders[$index]."/";
	} */
	
	function getFileIcons($index){
	    	
			$icons=array('wav'=>'WAV.png','psd'=>'PSD.png','mov'=>'MOV.png','jpg'=>'jpg.gif','gif'=>'gif.gif','ppt'=>'ppt.gif','pptx'=>'ppt.gif','docx'=>'doc.gif','doc'=>'doc.gif','divx'=>'DIVX.png','zip'=>'zip.gif','xls'=>'xls.gif','xlsx'=>'xls.gif','txt'=>'txt.png','default'=>'default.gif','png'=>'png.gif','pdf'=>'pdf.gif','fla'=>'fla.jpeg','jpeg'=>'jpg.gif','swf'=>'swf.jpg');
			
			if(empty($icons[$index])){
			  return $icons['default'];
			}else{
			  return $icons[$index];
			}
	}
	
		function smallFileIcons($index){
	    	
			$icons=array('wav'=>'WAV.png','psd'=>'PSD.png','mov'=>'MOV.png','jpg'=>'jpg.gif','gif'=>'gif.gif','ppt'=>'ppt.gif','pptx'=>'ppt.gif','docx'=>'doc.png','doc'=>'doc.png','divx'=>'DIVX.png','zip'=>'zip.png','xls'=>'xls.gif','xlsx'=>'xls.gif','txt'=>'txt.png','default'=>'default.gif','png'=>'png.gif','pdf'=>'pdf.gif','fla'=>'fla.jpeg','jpeg'=>'jpg.gif','swf'=>'swf.jpg');
			
			if(empty($icons[$index])){
			  return $icons['default'];
			}else{
			  return $icons[$index];
			}
	}
	
	function valid_email($address)
	{
		if ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $address))
			return FALSE;
		else
			return TRUE;
	}	
	
	
		function _sendMail($param){
			
			
			 $to = $param['to'];
			if($this->valid_email($to))
			{
			
			 $obj= $this->CI->load->library('email');	
		    
		  	$type = isset($param['type']) == '' ? 'type' : $param['type'];
		     $this->CI->email->clear();
			 $config['wordwrap'] = TRUE;
			 $config['mailtype'] = $type;
			 $config['wrapchars'] = "90";
			 $this->CI->email->initialize($config);
			 	
    		 $this->CI->email->from($param['fromEmail'],$param['fromName']);
			 $this->CI->email->to($param['to']);
			 $this->CI->email->subject($param['subject']);
			 $this->CI->email->message($param['message']); 
			// $this->CI->email->reply_to('admin@trainingondemand.com', 'TOD Admin');
		
		     $val =  @$this->CI->email->send();
			
		     return $val;
		  }else{
		  		return false;
		  }
	 }
function getBaseUrl(){
		$base = base_url();
		$baseArr = split("lms",$base);
		return $baseArr[0];
	}


    function terminate()
    {
        
            redirect("/Login/index");
        
    }


function check_simultaneous_login()
{
		 if($this->allow_simultaneous_login)
		 {
		  return false;
		 }

		 if($this->CI->session->userdata('userID'))
		 {
	 		   return false;
		 }
			  if(!empty($this->CI->session->cleared_session))
			  {
						$this->CI->load->model('M_login');
			            $access =  $this->CI->M_login->check_simultaneous_access($this->CI->session->cleared_session);
						 if($access ==0)
						 {

							return false;
						 }

				  $this->CI->session->set_userdata('sma',true);
                  echo"outtttt";die;
	 				   return true;
		     }
		
		
		return false;
	 }


function docpath() {
 $pth = "http://".$_SERVER['HTTP_HOST'].$this->realPath('assets').'uploads/';
 return $pth;
}
		 
	function getMarque($userId){
		$this->CI->load->model('m_task');
		$mar = $this->CI->m_task->getMarque($userId);
		return $mar;
	}
function upl_content_buckpath() {
 $root ='s3://bsynapse/';
 return $root;
}

function getcheckmenu($prm,$uid) {
 
  $this->CI->load->model('m_task');
  $getres = $this->CI->m_task->getpermision($prm,$uid);
  return $getres;
}

function getMenu() { 
  $this->CI->load->model('M_login');
  $getres = $this->CI->M_login->getMenu();
  return $getres;
}
function getsubMenu($id) { 
  $this->CI->load->model('M_login');
  $getres = $this->CI->M_login->getsubMenu($id);
  return $getres;
}
function is_superuser($uid)
{
	$this->CI->load->model('M_login');
	 $is_super = $this->CI->M_login->is_superuser($uid);
	  return $is_super;
}
 function thumbpath($par) 
 {
$basepath = "http://s3.amazonaws.com/";
return $basepath;
}
function cdn_docpath() {
 $pth = "http://s3.amazonaws.com/dynamicdeck";
 return $pth;
}


function output_file($file,$name,$typ=''){
$mime_type='';
$pth = $this->cdn_docpath();
$fpath = 'assets/docs/';
 $file  = $pth."/".$fpath."/".$file;
/* Figure out the MIME type (if not specified) */
$known_mime_types=array(
"pdf" => "application/pdf",
"txt" => "text/plain",
"html" => "text/html",
"htm" => "text/html",
"exe" => "application/octet-stream",
"zip" => "application/zip",
"doc" => "application/msword",
"xls" => "application/vnd.ms-excel",
"ppt" => "application/vnd.ms-powerpoint",
"gif" => "image/gif",
"png" => "image/png",
"jpeg"=> "image/jpg",
"jpg" => "image/jpg",
"php" => "text/plain"
);

if($mime_type==''){
$file_extension = strtolower(substr(strrchr($file,"."),1));
if(array_key_exists($file_extension, $known_mime_types)){
$mime_type=$known_mime_types[$file_extension];
} else {
$mime_type="application/force-download";
};
}; 

header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename='.($file));
header('Content-Type: ' . $mime_type);
header('Content-Transfer-Encoding: binary');
ob_clean();
flush();
readfile($file);
}  
function crypt($id) 
 {
   $string1 =$id; 
   
   $encodeid=base64_encode($string1); 
   return $encodeid;
 }
 function decrypt($id) 
 {
	 
   $string1 =$id; 
   $encodeid=base64_decode($string1); 
   return $encodeid;
 }

}
?>
