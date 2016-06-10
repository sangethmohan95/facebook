<?php
class LoginModel extends CI_Model
{
   public function loginauth($data)
  {
    $query=$this->db->select("*")->from("login")->where($data)->get();
    // print_r($query);
    if($query->num_rows()==1)
     {
       $user=array();   
       foreach ($query->result_array() as $row) 
    	 $user[]=$row;
       $user[0]['ResponseCode']="200";
       //$this->load->view("fbhp.html",$user);
      $user[0]['msg']="success";

      }
       else
    {
       $emailid=$data['email_id'];
       $result=$this->db->select("vchr_prof_pic,email_id,f_name,l_name")
       ->from("login")
       ->where('email_id',$emailid)
       ->get();
        if($result->num_rows()==1)
               {
             $user=array();
               foreach ($result->result_array() as $row)
                    $user[]=$row;
                 $user[0]['ResponseCode']="500";
                 $user[0]['Msg']="Password is incorrect";
                }
                   else
               {
                  $user[0]['ResponseCode']="404";
                  $user[0]['Msg']="Email is not defined";
                }
     
     }
     return $user;
  }
}
?>