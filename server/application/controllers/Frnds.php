
<?php
       class Frnds extends CI_Controller{
       public function list{
       $this->load->model('LoginModel');
       $data=$this->LoginModel->frnd;
    }
}
?>