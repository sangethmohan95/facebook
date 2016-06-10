<?php
class LoginService extends CI_Controller
{
	public function adduser()
	{
$user['email_id']=$this->input->get_post("email");
$user['password']=$this->input->get_post("password");
//print_r($user);
$this->load->model("LoginModel");
$result=$this->LoginModel->loginauth($user);
echo json_encode($result);

	}
}
?>