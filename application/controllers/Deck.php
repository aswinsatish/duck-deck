
<?php
class Deck extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_deck');

    }
    function index($dname='')
    {
        $data['deckname']=$dname;
        $data['uid'] = $this->session->userdata('id');
        if($data['deckname'])
        {
            $data['url']=site_url('/Deck/index/'.$data['deckname']);
            $data['geturl']= $this->M_deck->getshareurl($data['url']);

            if($data['geturl'])
            {
                foreach($data['geturl'] as $item)
                {
                    $data['deckid']=$item->id;
                }
                if(!$this->session->userdata('pswd'))
                {
                    $data['getorg_detail']=$this->M_deck->getorgdetail($data);
                    if($data['getorg_detail'])
                    {
                        foreach($data['getorg_detail'] as $result)
                        {
                            $data['deckname']=$result->deck_name;
                            $data['deckdesc']=$result->org_desc;
                            $data['readonly']='readonly';

                        }
                    }
                    $this->load->view('v_sharelogin',$data);

                }
                else
                {
                    $data['orgid']=$data['deckid'];
                    $data['endeckid'] = $this->general->crypt($data['orgid']);
                    $data['alltrackdeck'] = $this->M_deck->gettrackdecks($data['uid']);
                    $data['deckcount']= $this->M_deck->getinterest($data['orgid']);
                    $data['updatecount']= $this->M_deck->getupdatecount($data['orgid']);
                    $item = $this->M_deck->getorganisationall_detail($data);
                    if ($item)
                    {

                        define('S3_BUCKET1', 'dynamicdeck');
                        $data['deckname'] = $item->deck_name;
                        $data['name'] = $item->org_name;
                        $data['desc'] = $item->org_desc;
                        $data['location'] = $item->location;
                        $data['sector'] = $item->org_sector;
                        $data['website'] = $item->website;
                        $data['linkedin'] = $item->linkedin_page;
                        $data['twitter'] = $item->twitter_page;
                        $data['estdate'] = $item->date;
                        $data['regnumber'] = $item->org_reg_number;
                        $data['link_org'] = $item->link_organisation;
                        $data['investment'] = $item->investment_sought;
                        $data['revenue_currency'] = $item->revenue_currency;
                        $data['pre_commited_type'] = $item->pre_commited_type;
                        $data['fund_currency'] = $item->fund_currency;
                        $data['equity'] = $item->equity;
                        $data['valuation'] = $item->valuation;
                        $data['pre_commited_money'] = $item->pre_commited_money;
                        $data['estimated'] = $item->estimated_sequence;
                        $data['created_time'] = $item->created_time;
                        $data['what_we'] = $item->what_we_do;
                        $data['comp'] = $item->competitors;
                        $data['prob1'] = $item->problem1;
                        $data['prob2'] = $item->problem2;
                        $data['prob3'] = $item->problem3;
                        $data['buss_model'] = $item->business_model;
                        $data['adv'] = $item->advantage;
                        $thumbpath = $this->general->thumbpath('thumbnail') . S3_BUCKET1;
                        $data['logo_pic'] = $item->logo;
                        $data['cover_photo'] = $item->cover_photo;
                        $data['logo_path'] = $thumbpath . '/logos/' . $item->logo;
                        $data['cover_path'] = $thumbpath . '/logos/' . $item->cover_photo;
                    }
                    $data['estabdate'] = date('Y-m-d', strtotime($data['estdate']));
                    $data['getachieve'] = $this->M_deck->org_achieve($data);
                    if ($data['getachieve'])
                    {
                        foreach ($data['getachieve'] as $res)
                        {
                            $data['id'] = $res->id;
                            $data['achieve1'] = $res->achieve1;
                            $data['achieve2'] = $res->achieve2;
                            $data['achieve3'] = $res->achieve3;

                        }
                    }
                    $data['prev_fund'] = $this->M_deck->get_prevfund($data);
                    if ($data['prev_fund'])
                    {
                        foreach ($data['prev_fund'] as $res)
                        {
                            $data['id'] = $res->id;
                            $data['currency'] = $res->currency;
                            $data['dated'] = $res->date1;
                            $data['date1'] = date('M Y', strtotime($data['dated']));
                            $data['dated2'] = $res->date2;
                            $data['date2'] = date('M Y', strtotime($data['dated2']));
                            $data['currency1'] = $res->currency1;

                        }
                    }
                    $this->load->view('v_investor', $data);


                }
            }
            else
            {
                echo "You amy have some error in Url";
            }

        }
        else
        {
            echo "You amy have some error in Url";
        }

    }

    public function editdeck($encid ='')
    {

        if (!$this->session->userdata('id'))
        {
            $this->general->terminate();
            exit();
        }
        else
        {
            $data['endeckid'] = $encid;
            define('S3_BUCKET1', 'dynamicdeck');
            $data['orgid'] = $this->general->decrypt($encid);
            $data['encorid'] = $encid;
            $data['uid'] = $this->session->userdata('id');
            $data['user_type'] = $this->session->userdata('user_type');
            $data['user_details'] = $this->M_deck->getuserdetail($data['uid']);
            $data['alldecks'] = $this->M_deck->getdecks($data['uid']);
            $data['deckcount']= $this->M_deck->getinterest($data['orgid']);
            $data['updatecount']= $this->M_deck->getupdatecount($data['orgid']);
            if ($data['user_details'])
            {
                foreach ($data['user_details'] as $userdetail)
                {
                    $data['first_name'] = $userdetail->first_name;
                    $data['unique_id'] = $userdetail->unique_id;
                    $data['profile_pic'] = $userdetail->profile_pic;
                }
            }
            $data['readonly']='readonly';
            $item = $this->M_deck->getorganisationall_detail($data);
            if ($item) {


                $data['deckname'] = $item->deck_name;
                $data['decklink'] = $item->deckurl;
                $data['name'] = $item->org_name;
                $data['desc'] = $item->org_desc;
                $data['location'] = $item->location;
                $data['sector'] = $item->org_sector;
                $data['website'] = $item->website;
                $data['linkedin'] = $item->linkedin_page;
                $data['twitter'] = $item->twitter_page;
                $data['estdate'] = $item->date;
                $data['regnumber'] = $item->org_reg_number;
                $data['link_org'] = $item->link_organisation;
                $data['invest'] = $item->investment_sought;
                $data['revenue'] = $item->revenue_currency;
                $data['pre_commited_type'] = $item->pre_commited_type;
                $data['fund_cy'] = $item->fund_currency;
                $data['equity'] = $item->equity;
                $data['valtn'] = $item->valuation;
                $data['pre_commited_money'] = $item->pre_commited_money;
                $data['estimated'] = $item->estimated_sequence;
                $data['created_time'] = $item->created_time;
                $data['what_we'] = $item->what_we_do;
                $data['comp'] = $item->competitors;
                $data['prob1'] = $item->problem1;
                $data['prob2'] = $item->problem2;
                $data['prob3'] = $item->problem3;
                $data['buss_model'] = $item->business_model;
                $data['adv'] = $item->advantage;
                $thumbpath = $this->general->thumbpath('thumbnail') . S3_BUCKET1;
                $data['logo_pic'] = $item->logo;
                $data['cover_photo'] = $item->cover_photo;
                $data['logo_path'] = $thumbpath . '/logos/' . $item->logo;
                $data['cover_path'] = $thumbpath . '/logos/' . $item->cover_photo;
                $data['enc_id'] = $item->id;
                $data['enc_orgid'] = $this->general->crypt($data['enc_id']);
                $data['enc_deckpwd'] = $item->share_password;
                $data['share'] = $this->general->crypt('share');
                $data['shareurl'] = $item->client_link;
                $data['deckpassword'] = substr(md5(mt_rand()), 0, 7);
                $data['investment'] = $this->formatnumber($data['invest']);
                $data['valuation'] = $this->formatnumber($data['valtn']);
                $data['fund_currency'] = $this->formatnumber($data['fund_cy']);
                $data['revenue_currency'] = $this->formatnumber($data['revenue']);

            }

            $data['estabdate'] = date('Y-m-d', strtotime($data['estdate']));
            $data['getachieve'] = $this->M_deck->org_achieve($data);

            if ($data['getachieve']) {
                foreach ($data['getachieve'] as $res) {
                    $data['id'] = $res->id;
                    $data['achieve1'] = $res->achieve1;
                    $data['achieve2'] = $res->achieve2;
                    $data['achieve3'] = $res->achieve3;

                }
            }
            $data['prev_fund'] = $this->M_deck->get_prevfund($data);
            if ($data['prev_fund'])
            {
                foreach ($data['prev_fund'] as $res)
                {
                    $data['id'] = $res->id;
                    $data['curcy'] = $res->currency;
                    $data['dated'] = $res->date1;
                    $data['date1'] = date('M Y', strtotime($data['dated']));
                    $data['dated2'] = $res->date2;
                    $data['date2'] = date('M Y', strtotime($data['dated2']));
                    $data['curcy1'] = $res->currency1;

                }
                $data['currency'] = $this->formatnumber($data['curcy']);
                $data['currency1'] = $this->formatnumber($data['curcy1']);
            }
            $data['phases'] = $this->M_deck->get_phase($data);
            $data['sectors'] = $this->M_deck->get_sector($data);
            $data['getupdate'] = $this->M_deck->getdeckupdate($data['orgid']);
            $this->load->view('v_deckedit', $data);
        }

    }
    public function formatnumber($n)
    {
        $n = (0+str_replace(",", "", $n));
        if (!is_numeric($n)) return false;
        if ($n > 1000000000000) return round(($n/1000000000000), 2).'T';
        elseif ($n > 1000000000) return round(($n/1000000000), 2).'B';
        elseif ($n > 1000000) return round(($n/1000000), 2).'M';
        elseif ($n > 1000) return round(($n/1000), 2).'K';
        return number_format($n);
    }
    public function updateorganization()
    {
        $data['org_id'] = $_POST['org_id'];
        $data['contentid'] = $_POST['content_id'];
        if ($data['contentid'] == 'member_name-t1' || $data['contentid'] == 'member_name-t2' || $data['contentid'] == 'member_name-t3' || $data['contentid'] == 'role-t1' || $data['contentid'] == 'role-t2' || $data['contentid'] == 'role-t3' || $data['contentid'] == 'role-I1' || $data['contentid'] == 'role-I2' || $data['contentid'] == 'member_name-I1' || $data['contentid'] == 'member_name-I2' || $data['contentid'] == 'achievement-I1' || $data['contentid'] == 'achievement-I2' || $data['contentid'] == 'achievement-t1' || $data['contentid'] == 'achievement-t2' || $data['contentid'] == 'achievement-t3') {
            $cntid = explode('-', $data['contentid']);
            $data['content_id'] = $cntid['0'];
            $data['tid'] = $cntid['1'];
            if ($data['tid'] == 't1' || $data['tid'] == 't2' || $data['tid'] == 't3') {
                $data['type'] = 'Team Member';
            } else {
                $data['type'] = 'Investor';
            }
        } else {
            $data['content_id'] = $_POST['content_id'];
        }
        if ($data['contentid'] == 'pre1_commited_money') {
            $data['content_id'] = 'pre_commited_money';
        }
        $data['update_content'] = $_POST['update_content'];
        $data['table_name'] = $_POST['table_name'];
        $data['field_name'] = $_POST['field_name'];
        if ($data['content_id'] == 'date' ||$data['content_id'] == 'date1' || $data['content_id'] == 'date2') {
            $data['update_content'] = date('Y-m-d H:i:s', strtotime($data['update_content']));

        }
        echo $data['update'] = $this->M_deck->updateorganization($data);




    }

    public function updatecoverimg()
    {
        $data['org_id'] = $_POST['org_id'];
        $data['cover_name'] = $_POST['cover_name'];
        $data['update'] = $this->M_deck->updatecoverimg($data);
        //echo $data['update'];
    }

    public function updateteamimage()
    {
        $data['org_id'] = $_POST['org_id'];
        $data['pic_name'] = $_POST['picname'];
        $data['tid'] = $_POST['tid'];
        $data['update'] = $this->M_deck->updateteamimg($data);
        echo $data['update'];

    }

    public function updatelogoimg()
    {
        $data['org_id'] = $_POST['org_id'];
        $data['logo_name'] = $_POST['logo_name'];
        $data['update'] = $this->M_deck->updatelogoimg($data);
        //echo $data['update'];
    }

    public function updateinvestimage()
    {
        $data['org_id'] = $_POST['org_id'];
        $data['pic_name'] = $_POST['picname'];
        $data['tid'] = $_POST['tid'];
        $data['insert'] = $this->M_deck->updateinvstimg($data);
        echo $data['insert'];

    }

    public function listprofiledeck($encid='')
    {
        $data['shareid']=$this->general->decrypt($encid);
        $data['getlink'] = $this->M_deck->getclientlink($data);
        $data['readonly']='readonly';
        if($data['getlink'])
        {
            redirect($data['getlink']);
        }

        else if (!$this->session->userdata('id'))
        {
            $this->general->terminate();
            exit();
        }
        else
        {
            $data['uid'] = $this->session->userdata('id');
            $data['alldecks'] = $this->M_deck->getdecks($data['uid']);
            if($data['alldecks'])
            {
                foreach ($data['alldecks'] as $item)
                {
                    $id=$item->id;
                }
                redirect('/Deck/editdeck/' . $this->general->crypt($id));
            }
            else
            {
                define('S3_BUCKET1', 'dynamicdeck');
                $this->load->view('v_deck', $data);
            }
        }


    }
    public function createdeck()
    {
        if (!$this->session->userdata('id')) {
            $this->general->terminate();
            exit();
        }
        $data['readonly']='readonly';
        $data['uid'] = $this->session->userdata('id');
        $data['alldecks'] = $this->M_deck->getdecks($data['uid']);
        define('S3_BUCKET1', 'dynamicdeck');
        $this->load->view('v_deck', $data);


    }
    public function createorganization()
    {
        $data['uid'] = $this->session->userdata('id');
        $data['uniqueid'] = 'D-' . date('YmdHi');
        $data['org_id'] = $_POST['org_id'];
        $data['content_id'] = $_POST['content_id'];
        $data['update_content'] = $_POST['update_content'];
        $data['table_name'] = $_POST['table_name'];
        $data['field_name'] = $_POST['field_name'];
        $data['deckurl']=site_url('/Deck/index/' . $data['update_content'].date('Ymd'));
        if ($data['content_id'] == 'deck_name') {
            $data['update1'] = $this->M_deck->createorg($data);
            if ($data['update1']) {
                foreach ($data['update1'] as $item) {
                    $deckid = $item->id;
                    $deckname = $item->deck_name;
                    $orid = $this->general->crypt($deckid);
                    echo $data['update'] = $deckid . '||' . $orid.'||'.$deckname;

                }
            }

        }
    }

    public function editprofile()
    {
        if (!$this->session->userdata('id')) {
            $this->general->terminate();
            exit();
        }
        $data['uid'] = $this->session->userdata('id');
        $data['unique_id'] = $this->session->userdata('unique_id');
        $data['user_type'] = $this->session->userdata('user_type');
        $data['first_name'] = $this->session->userdata('first_name');
        $data['user_details'] = $this->M_deck->getuserdetail($data['uid']);
        if ($data['user_details']) {
            foreach ($data['user_details'] as $userdetail) {
                $data['first_name'] = $userdetail->first_name;
                $data['profile_pic'] = $userdetail->profile_pic;
            }
        }
        $this->load->view('v_profile', $data);


    }

    public function editsettings()
    {
        if (!$this->session->userdata('id')) {
            $this->general->terminate();
            exit();
        }
        $data['uid'] = $this->session->userdata('id');
        $data['unique_id'] = $this->session->userdata('unique_id');
        $data['user_type'] = $this->session->userdata('user_type');
        $data['first_name'] = $this->session->userdata('first_name');
        $data['user_details'] = $this->M_deck->getuserdetail($data['uid']);
        if ($data['user_details']) {
            foreach ($data['user_details'] as $userdetail) {
                $data['first_name'] = $userdetail->first_name;
                $data['profile_pic'] = $userdetail->profile_pic;
            }
        }
        $this->load->view('v_settings', $data);


    }

    public function sharedeckdet()
    {

        $data['first_name'] = $this->session->userdata('first_name');
        $data['shareurl'] = $_POST['shareurl'];
        $data['deckpwd'] = $_POST['deck_pwd'];
        $data['org_id'] = $_POST['deck_id'];
        $data['access'] = $_POST['permsn'];
        $sharedeck = $this->M_deck->save_sharedeck($data);
        return $sharedeck;
        /*$this->load->library('simpleemailservice');
        $m = new SimpleEmailServiceMessage();
        $data['get_organisation'] = $this->M_deck->getorganisation_copy($data);
        if ($data['get_organisation']) {
            foreach ($data['get_organisation'] as $item) {
                $data['deckname'] = $item->org_name;
            }
        }

        $shareduser = '';

        $data['shareuser'] = $this->session->userdata('id');
        $data['mailId'] = $data['email'];
        if ($data['email'] != '')
        {
            $sharedeck = $this->M_deck->save_sharedeck($data);
            $shareduser = $this->M_deck->get_shareduser($data);
        }
        $data['email_id'] = explode(',', $data['email']);
        $email['name'] = '';
        $email['subject'] = "Dynamic Deck :" . " " . $data['first_name'] . " " . "has shared" . " " . $data['deckname'] . " " . " deck with you";
        $email['fromEmail'] = "admin@logicalsteps.net";
        $email['fromName'] = "Dynamic Deck";
        $email['msg'] = '';
        if ($shareduser->cnt == 1) {
            $email['msg'] = 'Would you like to join dynamic deck';
        }

        $email['link'] = $data['shareurl'];
        $email['password'] = $data['deckpwd'];

            foreach ($data['email_id'] as $val)
            {
                $email['to'] = $val;
                $temp = "templates/v_sharelink";
                $param['message'] = $this->load->view($temp, $email, true);
                $m->addTo(trim($email['to']));
                $m->setFrom('Dynamic Deck<ho-news@bsynapse.com>');
                $m->setSubject($email['subject']);
                $m->setMessageFromString(null, $param['message']);
            }
            $g = $this->simpleemailservice->sendEmail($m);
            return 1;
        */


    }
    public function updateattachment()
    {
        $data['org_id'] = $_POST['org_id'];
        $data['title']= $_POST['title'];
        $data['pid']= $_POST['pid'];
        $data['attachdesc'] = $_POST['attachdesc'];
        $data['file_name']= $_POST['filename'];
        $data['doc_name'] = $_POST['doc_name'];
        $data['doc_size']=$_POST['doc_size'];
        $data['doc_type']=$_POST['doc_type'];
        $data['update'] = $this->M_deck->saveattachments($data);
        echo  $data['update'];

    }
    public function editattachment()
    {
        $data['org_id'] = $_POST['org_id'];
        $data['title']= $_POST['title'];
        $data['pid']= $_POST['pid'];
        $data['aid']= $_POST['aid'];
        $data['attachdesc'] = $_POST['attachdesc'];
        $data['file_name']= $_POST['filename'];
        $data['doc_name'] = $_POST['doc_name'];
        $data['doc_size']=$_POST['doc_size'];
        $data['doc_type']=$_POST['doc_type'];
        $data['update'] = $this->M_deck->updateattachments1($data);

    }
    public function deleteattachment()
    {
        $data['org_id'] = $_POST['org_id'];
        $data['pmid']= $_POST['pmid'];
        $data['aid']= $_POST['aid'];
        $data['delete'] = $this->M_deck->deleteattach($data);

    }
    public function media_download()
    {
        $data['deck_id']=$_POST['deck_id'];
        $data['docid']=$_POST['doc_id'];
        $data['file_name']=$_POST['file_name'];
        $data['type']=$_POST['media_type'];
        $data['ip']=$_SERVER['REMOTE_ADDR'];
        $data['browser'] = $_SERVER['HTTP_USER_AGENT'];
        $savedmedia=$this->M_deck->savemedia_download($data);

    }
    public function doc_dwnld($file_name='',$name='')
    {
        $data['file_name']=$file_name;
        $data['name']=$name;
        $data['type']='Doc';
        $this->general->output_file($data['file_name'],$data['name'],$data['type']);


    }
    public function sharesign()
    {
        $data['deck_id']=$_POST['sharedeckid'];
        $data['deckpswd']=$_POST['deckpswd'];
        if($data['deckpswd']!='')
        {

            $deckurl=$this->M_deck->get_deck($data['deck_id'],$data['deckpswd']);
            if($deckurl!=0)
            {
                foreach($deckurl as $res)
                {
                    $deckpswd=$res->share_password;
                    $decklink=$res->client_link;
                }
                $this->session->set_userdata('pswd', $deckpswd);
                $data['deckview']=$this->M_deck->savedeckview($data);
                echo $decklink;
            }
            else
            {
                echo '0';
            }
        }
        else
        {
            echo '1';
        }

    }
	
	public function edituserprofile()
    {
		if (!$this->session->userdata('id'))
			{
				$this->general->terminate();
				exit();
			}
        $data['uid']=$this->session->userdata('id');
		$data['firstname']=$_POST['firstname'];
		$data['picid']=$_POST['picid'];
		$data['picname']=$_POST['picname'];
		
		if($data['picname']=='')
		{
			 $data['profilepic']='';
		}
		else
		{  
	      $data['profilepic']=$data['picid'].'_'.$data['picname'];
			 
		}
		
		$data['lastname']=$_POST['lastname'];
		$data['emailid']=$_POST['emailid'];
		$data['brief_bio']=$_POST['brief_bio'];
		$data['utype']=$_POST['utype'];
		//print_r($data);die;
		$who=$this->M_deck->update_editprofile($data);
   }
   
       public function deckupdates()
   {
	   $output='';
	   $data['id']=$_POST['deckid'];
       $data['uid']=$this->session->userdata('id');
	   $data['msg']=addslashes($_POST['msg']);
	   if($data['msg']!='')
	   {
	   $data['insert'] = $this->M_deck->deckupd($data);
	   $upd=explode("||",$data['insert']);
	   
	   $output=' <div class="posted-comments" >
                                            <div class="pc-head"><h3><img src="'.base_url().'assets/images/chat.png'.'" alt="">'.$upd[2].'</h3> <span class="pc-date">'.$upd[1].'</span></div>
                                            <div class="pc-content"><p>'.$upd[0].'</p></div>
                                            <div class="pc-footer"><ul><li class="icon-views">#</li><li class="icon-love">#</li><li class="icon-reply">#</li></ul></div>
                                        </div>';
           echo $output.'||'.$upd[3];
	   }
	   
   }
    public function saveprint_details()
    {

        $data['org_id']=$_POST['deckid'];
        $data['uid']=$_POST['printuser'];
        $data['browser']=$_SERVER['HTTP_USER_AGENT'];
        $data['get_print']=$this->M_deck->saveprint($data);

    }
    public function interested()
    {


        $data['uid']=$_POST['uid'];
        $data['deck_id']=$_POST['deck_id'];
        $data['ip']=$_SERVER['REMOTE_ADDR'];
        $data['browser'] = $_SERVER['HTTP_USER_AGENT'];
        $data['action']="Interested";
        $inter=$this->M_deck->deck_interest($data);

    }
}


   
