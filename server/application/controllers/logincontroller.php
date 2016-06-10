<?php  
//defined('basepath')

class LoginController extends CI_Controller
{
	public function sa(){
		$user['email']=$this->input->post("email");
		$user['password']=$this->input->post("password");
		$url="http://localhost/login/index.php/LoginModel.php";
		$options =array(
	           'http'=> array(
               'header' =>"Content-type: application/x-www-form-urlencoded\r\n",  
               'method' => 'POST',
               'content' => http_build_query($user),
	           	),
		      );

		$context =stream_context_create($options);
		$result =file_get_contents($url,false,$context);
		//print_r($result);
		$data=json_decode($result,true);
		$login['user']=$data;
        foreach($data as $val)
        {
        	    if($val['ResponseCode']==200)
        		$this->load->view("fbhp.html",$login);
             else if($val['ResponseCode']==500)
        		$this->load->view("fbpw.html",$login);
        	else if($val['ResponseCode']==404)
        		$this->load->view("fwe.html",$login);
        	    }// print_r($data);
}}

?>