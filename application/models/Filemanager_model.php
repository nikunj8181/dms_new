<?php
class Filemanager_model extends CI_Model{

  function checkName($tableName,$Title,$id){
    if(isset($id) && $id > 0)
        $sql = 'SELECT id FROM '.$tableName.' WHERE docTitle="'.$Title.'" AND id != "'.$id.'"';
    else
        $sql = 'SELECT id FROM '.$tableName.' WHERE docTitle="'.$Title.'"';

    $query = $this->db->query($sql);
    if($query->num_rows($query)>0){
        return 'false';
    }else{
        return 'true';
    }
  }

  function getUsersByCategory($companyId,$userId){

    $sql = "SELECT * FROM user WHERE companyId = '".$companyId."' AND id <> '".$userId."'";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }

  }

  function getOwnFiles($userId){
    $sql = "SELECT UDOC.*, CAT.Title AS CategoryTitle FROM user_docs AS UDOC
    INNER JOIN category AS CAT ON UDOC.categoryId=CAT.id 
    WHERE UDOC.user_id = '".$userId."'";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }

  function getShareFiles($userId){
    $sql = "SELECT UDOC.*,ACCS.*,USR.FirstName,USR.LastName,CAT.Title AS CategoryTitle FROM user_docs AS UDOC
            INNER JOIN user_docs_access AS ACCS ON UDOC.id=ACCS.fileId 
            INNER JOIN user AS USR ON UDOC.user_id=USR.id 
            INNER JOIN category AS CAT ON UDOC.categoryId=CAT.id 
            WHERE ACCS.customer_id = '".$userId."'";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }

  function getThisUserCategory($loggedUser){
    $sql = "SELECT CAT.*  FROM  user_category AS UCAT
    INNER JOIN category AS CAT ON UCAT.category_id=CAT.id
    WHERE UCAT.user_id='".$loggedUser."'";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }

}
?>