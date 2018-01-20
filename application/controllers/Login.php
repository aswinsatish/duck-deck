<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('simpleemailservice');
    }


    function index($orgid='')
    {
        if ($this->session->userdata('username'))
        {
            $this->session->sess_destroy();
        }
        $data['encid']=$orgid;
        $this->load->view('v_login',$data);

    }

    function signin()
    {
        if (!$this->input->post('username'))
        {
            $this->general->terminate();
            exit();
        }
        $uname=$this->input->post('username');
        $pswd=$this->input->post('password');
        $orgid=$this->input->post('deckid');
        $passwrd=md5(utf8_encode($pswd));
        $ip=$_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $push='';
        $did='';
        $redirect='no';
        if ($uname == '')
        {
            $push='Please enter a valid email address to login';
        }
        elseif($pswd=='')
        {
            $push='Please enter a valid password for login';
        }
        else
        {
            $res_det = $this->M_login->get_user_valid($uname);
            if(!$res_det)
            {

                $push='Please enter a valid email address to login';
            }

            if ($passwrd == $res_det->password ){
                $result = '1';
            }
            else{
                $result = '0';
            }
            if ($result == '0')
            {

                $push='Please enter the correct login details';
            }
            else
            {
                $this->session->set_userdata('id', $res_det->id);
                $this->session->set_userdata('unique_id', $res_det->unique_id);
                $this->session->set_userdata('email_id', $uname);
                $this->session->set_userdata('user_type', $res_det->user_type);
                $ip = $_SERVER['REMOTE_ADDR'];
                $uid = $this->session->userdata('id');


                /* Tracking */
                $session_id=$this->session->userdata('session_id');
                $unique_id = $this->session->userdata('unique_id');
                $this->M_login->trackingLog($uid, $ip ,'Login','',$browser);
                /* End of Tracking */

                $res_det = $this->M_login->get_user_valid($uname);
                if($res_det->user_type=='entrepreneur')
                {
                    $push='Deck/listprofiledeck';
                    $redirect='yes';
                    $did='';
                }
                elseif($res_det->user_type=='admin')
                {
                    $push='Deck/listdeckall';
                    $redirect='yes';
                    $did='';
                }
                else
                {
                    $push='Deck/listprofiledeck';
                    $redirect='yes';
                    $did=$orgid;
                }
            }
        }
        echo $redirect."||".$push.'||'.$did;
    }


    function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('/Login', 'refresh');
    }



    function forgot_password()
    {
        $data['email'] = $_POST['fusername'];
        $data['id'] = $_POST['uid'];
        $email['emailid'] = $this->general->crypt($data['email']);
        $email['fuid'] = $this->general->crypt($data['id']);
        $email['name']    = '';
        $email['subject'] = "Dynamic Deck : Reset password";
        $email['fromName'] = $data['email'];
        $email['msg'] = '';
        $email['to'] = $data['email'];
        $m = new SimpleEmailServiceMessage();
        $temp = "templates/v_forgotpass";
        $param['message']  = $this->load->view($temp,$email,true);
        $m->addTo(trim($email['to']));
        $m->setFrom('Team Deck<ho-news@bsynapse.com>');
        $m->setSubject($email['subject'] );
        $m->setMessageFromString(null,$param['message']);
        $g = $this->simpleemailservice->sendEmail($m);
        return 1;

    }
    function recover_password()
    {
        $data['email'] = $_POST['fusername'];
        //$this->load->database();
        if($data['email']!='')
        {
            $res = $this->M_login->get_user_valid($data['email']);
            if(!$res)
            {
                $result=0;
            }
            else
            {
                $data['uid']=$res->id;
                $data['email'] = $_POST['fusername'];
                $result=$data['uid']."||".$data['email'];
            }
            echo $result;
        }
    }

    function resetpwd()
    {
        $arrayData = array('count_log'=>8,'protable_hashes'=>false);
        $pwd = $_POST['newpassword'];
        $email = $_POST['email'];
        $uid = $_POST['uid'];
       // $email = 'preethu@logicalsteps.net';
        $options = array("cost"=>4);
        $hashpwd =  md5(utf8_encode($pwd));
        $resetpwd= $this->M_login->resetpassword($hashpwd,$pwd,$email);
         $action="Update Password";
        $userupdate=$this->M_login->update_userdetails($uid,$email,$action);
        $ip = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $this->M_login->trackingLog($uid, $ip ,'Update','',$browser);
    }

    function create()
    {

        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['pswd'];
        $data['utype'] = $_POST['utype'];
        $data['orgid']=$_POST['deckid'];
        $res = $this->M_login->get_user_valid($data['email']);
        $redirect= 'no';
        if($res){
            $push= 'The email id is already exist!';
        } else {
            $data['reg_ip'] = $_SERVER['REMOTE_ADDR'];
            $data['passwd'] = md5(utf8_encode($data['password']));
            $data['id'] = $this->M_login->create($data);
            $this->session->set_userdata('id', $data['id']);
            $push= 'Deck/listprofiledeck';
            $redirect= 'yes';
        }
        echo $redirect."||".$push.'||'. $data['orgid'];
    }
    function resetpassword($mail,$id)
    {

        $data['email']=$this->general->decrypt($mail);
        $data['uid']=$this->general->decrypt($id);
        $this->load->view('v_recoverpassword',$data);
    }
}

?>
