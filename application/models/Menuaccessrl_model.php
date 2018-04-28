<?php
class Menuaccessrl_model extends CI_Model{

  function insert($data,$tableName){
    $this->db->insert($tableName, $data);
    return $this->db->insert_id();
  }

  function update($userId, $data, $tableName){
    $this->db->where('id', $userId);
    return $this->db->update($tableName, $data);
  }

  function updateIn($tableName, $IsPrimery, $id){
    $sql="UPDATE {$tableName} SET IsPrimery = $IsPrimery WHERE ID IN ($id)";
    return $this->db->query($sql);
  }

  function getList($tableName){
      $sql="SELECT * FROM $tableName";
           
      $query = $this->db->query($sql);
      if($query->num_rows($query)> 0){
          return $query->result_array();
      }
  }
 
  function getAllData($tableName, $slug = FALSE){
    if ($slug === FALSE){
      $query = $this->db->get($tableName);
      return $query->result_array();
    }

    $query = $this->db->get_where($tableName, $slug);
    return $query->result_array();
  }

  function getData($id,$tableName){
    $sql = "SELECT * FROM $tableName WHERE m_menu_id = ".$id;
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }
   function getrolewise_accessmenuList($id,$tableName){
    $sql = "SELECT * FROM $tableName WHERE userType = '".$id."'";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }

 
  function getCustomerList(){
    $sql = "SELECT addresslist.ID, addresslist.ReferenceID, customer_master.FirstName, customer_master.LastName  FROM addresslist INNER JOIN customer_master ON addresslist.ReferenceID=customer_master.ID WHERE ReferenceType='C' GROUP BY customer_master.ID";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }

}
?>