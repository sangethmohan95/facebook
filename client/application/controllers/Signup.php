 <?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller
{

    public function ls()
     
      {
        $user['f_name']=$this->input->get_post("fn");
       $user['s_name']=$this->input->get_post("sn");
       $user['email_id']=$this->input->get_post("em");
       $user['password']=$this->input->get_post("pwd");
      $user['day']=$this->input->get_post("s1");
       $user['month']=$this->input->get_post("s2"); 
       $user['year']=$this->input->get_post("s3");
       $user['gender']=$this->input->get_post("rad");
       $user['prfpic']=$this->input->get_post("pic");
       $user['rem']=$this->input->get_post("em2");

        $yr=date("Y");

                  $url="http://localhost/login/index.php/RegisterService/reg";
		   $options =array(
	       'http'=> array(
         'header' =>"Content-type: application/x-www-form-urlencoded\r\n",  
          'method' => 'POST',
          'content' => http_build_query($user),
	           	),
		      );

		   $context =stream_context_create($options);
		   $result =file_get_contents($url,false,$context);    
       $r= json_encode($result,true); 	
       print_r($result);             
     }
      



}

?>