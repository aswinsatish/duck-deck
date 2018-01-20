<?php
class Deckactions
  /**
    * Get all feedbacks
    *
    * return array {@type Feedback}
    */
{
    public function POSTCreateDeck()
    {
       return Feedback::all();
    }
      public function PUTDeck($deckid)
    {
            Deckaction::
             where('id', $deckid)
            ->update(['active' => 'No']);
       return true;
    }
      public function PostEditDeck()
    {
       return Feedback::all();
    }
      public function PostShareDeck()
    {
       return Feedback::all();
    }
    /**
     * Copy Deck
     *
     * @param string $orgid
    */
      public function CopyDeck($orgid)
    {
        //dk_organisation copy
        DB::statement("insert into dk_organisation (user_id,unique_id,org_name,org_desc,location,org_phase,	org_sector,cover_photo,cover_high_res,logo,website,linkedin_page,twitter_page,link_organisation,fund_currency,pre_commited_type,investment_sought,equity,valuation,pre_commited_money,org_registered,org_generated_revenue,reg_num_country,org_reg_number,	revenue_currency,estimated_sequence,previous_funding,what_we_do,competitors,problem1,problem2,problem3,business_model,advantage,shared,active,share_password,share_link,created_user,created_time,modified_user)
	  (SELECT  user_id,unique_id,concat(org_name,'-Copy'),org_desc,location,org_phase,	org_sector,cover_photo,cover_high_res,logo,website,linkedin_page,twitter_page,link_organisation,fund_currency,pre_commited_type,investment_sought,equity,valuation,pre_commited_money,org_registered,org_generated_revenue,reg_num_country,org_reg_number,	revenue_currency,estimated_sequence,previous_funding,what_we_do,competitors,problem1,problem2,problem3,business_model,advantage,shared,active,share_password,share_link,created_user,created_time,modified_user from dk_organisation as dk_org where dk_org.id = '".$orgid."')");
       // $query  = $this->db->query($sql);

        DB::statement("insert into dk_org_achieve(org_id,achieve)
	  (SELECT org_id,achieve from dk_org_achieve as dk_achieve where dk_achieve.org_id = '".$orgid."')");


        //dk_previous_fund copy
        DB::statement("insert into dk_previous_fund(org_id,date,date1,currency,currency1,currency_type,currency_type1)
	  (SELECT org_id,date,date1,currency,currency1,currency_type,currency_type1 from dk_previous_fund as dk_previous where dk_previous.org_id = '".$orgid."')");


        //dk_team_members copy
        DB::statement("insert into dk_team_members(org_id,member_name,role,achievement,photo,member_type)
	  (SELECT org_id,member_name,role,achievement,photo,member_type from dk_team_members as dk_team where dk_team.org_id = '".$orgid."')");


        //dk_org_media copy
        DB::statement("insert into dk_org_media(org_id,user_id,media_type,name,file_name,size,format,links,cdte)
	  (SELECT org_id,user_id,media_type,name,file_name,size,format,links,cdte from dk_org_media as dk_media where dk_media.org_id = '".$orgid."')");









        return 1;

    }
      public function ViewDeck($deckid)
    {
        $Deckdetails = DB::table('organisation')
            ->join('previous_fund', 'organisation.id', '=', 'previous_fund.id')
            ->join('org_media', 'org_media.id', '=', 'org_media.id')
            ->where('organisation.id', '=', $deckid)
            -> select('*')
            ->get();

        return $Deckdetails;
    }
      public function POSTDeckInterest()
    {
       return Feedback::all();
    }
      public function ListDeck($id,$typ)
    {
        if($typ =='entreprenuer') {
            $listDeck = Deckaction::
            select('*')
                ->where('user_id', '=', $id)
                ->get();
        }
        else{
            $listDeck=  Deckaction::all();
        }

       return $listDeck;
    }







}