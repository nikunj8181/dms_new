<?php
class Company_model extends CI_Model{

  function checkName($tableName,$Title,$id){
    if(isset($id) && $id > 0)
        $sql = 'SELECT id FROM '.$tableName.' WHERE Title="'.$Title.'" AND id != "'.$id.'"';
    else
        $sql = 'SELECT id FROM '.$tableName.' WHERE Title="'.$Title.'"';

    $query = $this->db->query($sql);
    if($query->num_rows($query)>0){
        return 'false';
    }else{
        return 'true';
    }
  }

}
?>