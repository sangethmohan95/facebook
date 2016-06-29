<?php
class RegisterService extends  CI_Controller
{
  public function reg()
     {
        $validation=true;
       if(isset($_REQUEST['fn']) && isset($_REQUEST['sn'])  && isset($_REQUEST['em']) && isset($_REQUEST['em2'])  && isset($_REQUEST['pwd'])  && isset($_REQUEST['s1']) && isset($_REQUEST['s2'])  && isset($_REQUEST['s3'])  && isset($_REQUEST['rad'])) 
      {
       $user['f_name']=$this->input->get_post("fn");
       $user['s_name']=$this->input->get_post("sn");
       $user['email_id']=$this->input->get_post("em");
       $user['remail_id']=$this->input->get_post("em2");
       $user['password']=$this->input->get_post("pwd");
      $user['day']=$this->input->get_post("s1");
       $user['month']=$this->input->get_post("s2"); 
       $user['year']=$this->input->get_post("s3");
       $user['gender']=$this->input->get_post("rad");
       $user['prfpic']=$this->input->get_post("pic");
        $yr=date("Y");
        //$yr=$yr+2;
        $age=$yr-$user['year'];
     
      if($user['f_name']=="" || $user['s_name']=="" || $user['year']=="") //$user['gender']) /*|| $user['email_id']="" ||$user['remail_id']=="" ||  $user['password']==""*/ 
      {
       $response=array("msg"=>'missing info','responsecode'=>122);
       $validation=false;
      }
    
    else  if(strlen($user['f_name'])<3)
      {
       $response=array("msg"=>'first name should have 3 characters','responsecode'=>123);
       $validation=false;

       }      
    
  else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$user['email_id']))
     {
      $response=array("msg"=>"enter correct emailid" ,"response code"=>124);
      $validation=false;
     }
      else if(($user['email_id'])!=($user['remail_id']))
       {
         $response=array("msg"=>"email id dint match" ,"response code"=>125);
         $validation=false;
       }
      

else if(!preg_match("/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,12}$/",$user['password'])) 
          {
           $response=array("msg"=>"password should have 1 UPPERCASE,DIGIT,SYMBOL&ATLEST 8 characters" ,"status"=>125);
             $validation=false;
          }


          else if ($age<13)

           {
             $response=array("msg"=>"the user should be above 13ys","response code"=>126);
             $validation=false;  
           }

 
            else 
             {
              $response="success";
             
             $this->load->model("RegModel");
           $result=$this->RegModel->Reg($user);
           }
      } 

           else
              {
               $response="no data recived";
               }
           print_r($response);
      
         
}

}
?>