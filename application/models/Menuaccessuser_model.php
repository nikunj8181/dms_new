<?php
class Menuaccessuser_model extends CI_Model{

  function getuserwise_accessmenuList($id,$tableName){
    $sql = "SELECT * FROM $tableName WHERE userId = '".$id."'";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }

  function getExtraAccess($userid, $tableName){
    $sql = "SELECT * FROM $tableName WHERE userId='".$userid."'";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }

  function getUsers($loggedUser){
    $sql = "SELECT *  FROM user WHERE createdBy = '".$loggedUser."'";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }
}
?>