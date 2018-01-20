<?php
class Users
  /**
    * Validate User Login
    * @param string $email
    * @param string $password
    */
{
    public function login($email,$password)
    {

        $users = User::
             select('*')
            ->where('email_id', '=', $email)
            ->where('user_password', '=', $password)
            ->get();

         if($users->count() >  0 ) {
             $children_data = array(
                 'status'  => "success",
                 'user'  =>$users[0],
             );
             return $children_data;

         }
         else{
             $children_data = array(
                 'status'  => "fail",
                 'message'  =>"invalid email or pass",

             );
             return $children_data;
         }
    }
    /**
     * Create User
     *
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param string $password
     */
      public function POSTsignup($firstname,$lastname,$email,$password)
    {
        $users = User::
             select('*')
            ->where('email_id', '=', $email)
            ->get();

        if($users->count() >  0 )
        {
            return "email id already exist";
        }
        else
        {
            $id = User::insertGetId(
                ['first_name' => $firstname, 'last_name' => $lastname,'email_id'=>$email,'user_password' =>$password]
            );

            return $id;

        }


    }
    /**
     * Reset Password
     *
     * return array {@type password}
     */

      public function POSTforgotpassword()
    {
       return User::all();
    }




}