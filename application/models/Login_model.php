<?php
class Login_model extends CI_Model{

  function insert($data,$tableName){
    $this->db->insert($tableName, $data);
    return $this->db->insert_id();
  }

  function update($phone, $data, $tableName){
    $this->db->where('Phone', $phone);
    return $this->db->update($tableName, $data);
  }

  function getAuth($email, $password){

    $sql = "SELECT * FROM user WHERE email = '".trim($email)."' AND password = '".md5($password)."'";
    $query = $this->db->query($sql);
    return $query->row_array();
  }

  function getForgot($email){
    $sql = "SELECT id,email FROM user WHERE email = '".trim($email)."'";
    $query = $this->db->query($sql);
    return $query->row_array();
  }


  function MobileAuth($phone){
    $sql = "SELECT * FROM user WHERE phone = '".trim($phone)."'";
    $query = $this->db->query($sql);
    return $query->row_array();
  }

  function VeryfiMobileAuth($user, $otp){
    $sql = "SELECT * FROM user WHERE phone = '".trim($user)."' AND otp = '".$otp."'";
    $query = $this->db->query($sql);
    return $query->row_array();
  }


}
?>