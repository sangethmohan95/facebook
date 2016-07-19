<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RegisterService extends  CI_Controller
{
  public function reg()
  {
     $validation=true;
    
           $user['f_name']=$this->input->get_post("f_name");
           $user['s_name']=$this->input->get_post("s_name");
           $user['email_id']=$this->input->get_post("email_id");
           $user['password']=$this->input->get_post("password");
           $user['day']=$this->input->get_post("day");
           $user['month']=$this->input->get_post("month"); 
           $user['year']=$this->input->get_post("year");
           $user['gender']=$this->input->get_post("gender");
           $user['prfpic']=$this->input->get_post("prfpic");
           //$user['ml']= $this->input->get_post("ml");
       
           $yr=date("Y");
             //$yr=$yr+2;
            $age=$yr-$user['year'];
     
        if(strlen($user['f_name'])<3)
        {
       $response=array("msg"=>'first name should have 3 characters','Response'=>007);
       $validation=false;

        }      
    
  elseif(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$user['email_id']))
         {
      $response=array("msg"=>"enter correct emailid" ,"Response"=>124);
      $validation=false;
        }
       elseif ($this->input->get_post("rem") !=$user['email_id'])
            {
                $response=array("msg"=>" mailid dint match ","Response"=>121);
                $validate=false;
            }
      

         elseif(!preg_match("/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,16}$/",$user['password'])) 
          {
           $response=array("msg"=>"password should have 1 UPPERCASE,DIGIT,SYMBOL&ATLEST 8 characters" ,"Response"=>125);
             $validation=false;
          }


          elseif ($age<13)

           {
             $response=array("msg"=>"the user should be above 13ys","Response"=>126);
             $validation=false;  
           }
         
          elseif ($validation==true)
           {      
               $user['hash']=md5(rand(0,1000)); 
               $this->load->model('RegModel');
               $response=$this->RegModel->Reg($user);
               if($response['Msg']=="success")
               {
                echo "esalks";
                   $mail=$this->mailsnd($user['email_id'],$user['hash']);
               }

           }

  
           else
              {
               $response="no data recived";
               }
          // print_r($response);
             echo json_encode($response);     
         
}


public function mailsnd($email,$hash)
    {
               $this->load->library('email');
                $config = array();
                $config['protocol']  = "smtp";
                $config['smtp_host'] = "ssl://smtp.googlemail.com";
                $config['smtp_port'] = 465;
                $config['smtp_user'] = "sangeethkths@gmail.com"; 
                $config['smtp_pass'] = "lindamol95";
                $config['mailtype'] = 'html';
                $config['charset']  = 'utf-8';
                $config['newline']  = "\r\n";
                $this->email->initialize($config);

                $this->email->from('sangeethkths@gmail.com', 'admin');
                $this->email->to($email);
                 
                 
                $this->email->subject('Registration Verification: Continuous Imapression');
                $msg = "click on yhe link to activaTE UR acccount  <p><a href='http://localhost/login/index.php/RegisterService/verify?email_id=$email&hash=$hash';">click here</a></p>                
            $this->email->message($msg);   
           // $this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));

           if( $this->email->send())
           {
            echo "sent";
           }
        else
        {
          echo "try  again ";
          echo $this->email->print_debugger();

        }



  }

   public function verify()
    {
       if(isset($_REQUEST['email_id'])&&isset($_REQUEST['hash']))    
       {
        $user['email_id']=$this->input->get_post("email_id");
        $user['hash']=$this->input->get_post("hash");
        $this->load->model('RegModel');
        $resp=$this->RegModel->Verfyeml($user);
         print_r($resp);
       }
     } 
 }
?>