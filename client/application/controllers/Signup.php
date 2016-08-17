 <?php 

defined('BASEPATH') OR exit('No direct script access allowed');
set_include_path(get_include_path().PATH_SEPARATOR.APPPATH.'/third_party/phpseclib');
               require_once APPPATH."/third_party/phpseclib/Net/SFTP.PHP";

class Signup extends CI_Controller
{

    public function ls()
     
       {
        $user['f_name']=$this->input->get_post("fn");
       $user['s_name']=$this->input->get_post("sn");
       $user['email_id']=$this->input->get_post("em");
       $user['password']=$this->input->get_post("pwd");
      $user['date']=$this->input->get_post("s1");
       $user['month']=$this->input->get_post("s2"); 
       $user['year']=$this->input->get_post("s3");
       $user['gender']=$this->input->get_post("rad");
       $user['prfpic']=$this->input->get_post("prfpic");
       $user['rem']=$this->input->get_post("em2");
                   $yr=date("Y");
           $upfile=$_FILES["prfpic"]["name"];
            //print_r($upfile);
            $tfile=$_FILES["prfpic"]["type"];
            $tpfile=$_FILES["prfpic"]["tmp_name"];
            $fsize=$_FILES["prfpic"]["size"]/1024;
             $validate=true;

            if($tfile!="image/jpeg")
            {
                $response=array("msg"=>"Provide an image");
                $validate=false;
                print_r($response);
                 
            }
            elseif($fsize > 5120)
            {
                $response=array("msg"=>"image size is too high");
                $validate=false;
                print_r($response);
                
            }
            else
            {
               $newname=$user['email_id'].".png" ;
               $uploadpath=APPPATH."uploads/".$newname;
               if(file_exists($uploadpath))
                  {
                  $response=array("msg"=>"already registered account"); 
                  $validate=false;
                  
                  print_r($response);
                  }
                  
               move_uploaded_file($tpfile,$uploadpath);
               
            }
           
            if($validate)
            {
               
                $sftp = new Net_SFTP('13.76.212.119',22); 
                if(!$sftp->login('file', 'file123!')) {
                    echo "login failed"; 
                
                }
                  else
                    { 
                echo "connected"; 
                $op=$sftp->chdir('sangeeth/uploads');
                 $sername=$user['email_id'].".png";
                 $success=$sftp->put($sername,file_get_contents($uploadpath));
                 $user['prfpic']="http://13.76.212.119/sangeeth/uploads/".$sername;
                 echo "$success";
                     }  
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
       print_r($r);
          $this->load->view('succ.html');

                  
      

}}}

?>
