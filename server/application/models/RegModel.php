
 <?php

class RegModel extends CI_Model
{
    
    public function Reg($data)
    {
      
      foreach(array_keys($data) as $i)
        $user[$i]=$this->db->escape($data[$i]);
        $values=implode(',',$user);  
    if($this->db->query("call memr({$values})"))
   {


   $data['Response']="009";
     $data['Msg']="success";
   }

    else
      {
    $data['Response']="677";
     $data['Msg']="try again";
       }
   return $data;
    }

     public  function Verfyeml($user)
      {
        $user['active']=0;
        $this->db->select('email_id','hash','active');
        $this->db->from('signup');
        $this->db->where($user);
        $query=$this->db->get();
        if($query->num_rows()==1)
        {
            $this->db->set('active',1,false);
            $this->db->where($user);
            $this->db->update('signup');
            $resp[0]['msg']=" you are verified";
        }
         else
        {
          $resp[0]['msg']=" not verified";
        }
        return json_encode($resp);
    }



    


}    


?>