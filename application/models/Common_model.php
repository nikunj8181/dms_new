<?php
class Common_model extends CI_Model{

  function insert($data,$tableName){
    $query = $this->db->insert_string($tableName, $data);
    $query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $query);
    $this->db->query($query);
    return $this->db->insert_id();
  }

  function insertBatch($tableName,$data){
    return $this->db->insert_batch($tableName, $data);
  }

  function update($userId, $data, $tableName){
    $this->db->where('id', $userId);
    return $this->db->update($tableName, $data);
  }

  function updateBatch($tableName, $updateArray, $field){
    return $this->db->update_batch($tableName, $updateArray, $field);
  }

  function remove($Id, $field, $tableName){
    $this->db->where($field, $Id);
    return $this->db->delete($tableName);
  }

  function update_rec($ID, $data, $tableName){
    $this->db->where('ID', $ID);
    return $this->db->update($tableName, $data);
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
    $sql = "SELECT * FROM $tableName WHERE ID = ".$id;
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }

  function getWhere($where,$fields,$tableName){
    $this->db->select($fields);
    $this->db->from($tableName);
    $this->db->where($where);
    $query=$this->db->get();
    $query->num_rows($query);
    if($query->num_rows($query) == 1){
      return $query->row_array();
    }elseif($query->num_rows($query) > 1){
      return $query->result_array();
    }
  }

  function update_where($WhereCl, $data, $tableName){
    $this->db->where($WhereCl[0], $WhereCl[1]);
    return $this->db->update($tableName, $data);
  }

}
?>