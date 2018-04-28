<?php
class User_model extends CI_Model{

  function getUserlist(){
    $sql = "SELECT USER.*, UTYP.Title AS userType  FROM user AS USER INNER JOIN usertype AS UTYP ON USER.userType=UTYP.alias WHERE USER.userType <> 'superadmin'";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }

  function getUsers($loggedUser){
    $sql = "SELECT USER.*, UTYP.Title AS userType  FROM user AS USER INNER JOIN usertype AS UTYP ON USER.userType=UTYP.alias WHERE USER.createdBy = '".$loggedUser."'";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }

  function getUseType(){
    $sql = "SELECT *  FROM usertype WHERE alias NOT IN('superadmin','manager')";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }

  function getCategory($companyId){
    $sql = "SELECT CAT.*  FROM category AS CAT 
    INNER JOIN groups AS GRP ON CAT.groupId=GRP.id
    WHERE GRP.companyId='".$companyId."'";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }

  function checkmail($tableName, $email, $id){
    if(isset($id) && $id > 0)
       $sql = 'SELECT id FROM '.$tableName.' WHERE email="'.$email.'" AND id != "'.$id.'"';
    else
       $sql = 'SELECT id FROM '.$tableName.' WHERE email="'.$email.'"';

    $query = $this->db->query($sql);
    if($query->num_rows($query)>0){
        return 'false';
    }else{
        return 'true';
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