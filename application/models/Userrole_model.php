<?php
class Userrole_model extends CI_Model{
  
  function checkDuplicateTitle($tableName,$title,$id=''){
    if(isset($id) && $id > 0)
       $sql = 'SELECT id FROM '.$tableName.' WHERE Title="'.$title.'" AND id != "'.$id.'"';
    else
       $sql = 'SELECT id FROM '.$tableName.' WHERE Title="'.$title.'"';

    $query = $this->db->query($sql);
    if($query->num_rows($query)>0){
        return 'false';
    }else{
        return 'true';
    }
  }
}
?>