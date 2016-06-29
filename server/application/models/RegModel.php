
 <?php

class RegModel extends CI_Model
{
    
    public function Reg($data)
    {
      
      foreach(array_keys($data) as $i)
        $user[$i]=$this->db->escape($data[$i]);
        $values=implode(',',$user);  
    if($this->db->query("call mem({$values})"))
   {
     $data['Response']="009";
     $data['Msg']="MySQL Got You In";
   }

    else
   {
    $data['Response']="677";
     $data['Msg']="MySQL is out for a walk,try Again Later";
   }
   return $data;
    }
    
}

