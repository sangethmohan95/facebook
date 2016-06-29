<?php 

class Signup extends CI_Controller
{

    public function ls()

     {  
     if(!empty($_REQUEST['f_name']) && !empty($_REQUEST['s_name']))   
      {
       $user['f_name']=$this->input->post("fn");
       $user['s_name']=$this->input->post("sn");
       $user['email_id']=$this->input->post("em");
       $user['remail_id']=$this->input->post("em2");
       $user['password']=$this->input->post("pwd");
       $user['day']=$this->input->post("s1");
       $user['month']=$this->input->post("s2"); 
       $user['year']=$this->input->post("s3");
       $user['gender']=$this->input->post("rad");
       $user['prfpic']=$this->input->post("pic");

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
        print_r($r['Response']);
     }
      
}

}


?>