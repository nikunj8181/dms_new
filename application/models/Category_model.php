<?php
class Category_model extends CI_Model{

    function getCategory(){
        $sql = "SELECT CAT.id,CAT.Title,GRP.Title AS groups FROM category AS CAT INNER JOIN groups AS GRP ON CAT.groupId=GRP.id";
        $query = $this->db->query($sql);
        if($query->num_rows($query)> 0){
            return $query->result_array();
        }
    }

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

    function checkGrp($tableName,$groupId,$id){
        if(isset($id) && $id > 0)
            $sql = 'SELECT id FROM '.$tableName.' WHERE groupId="'.$groupId.'" AND id != "'.$id.'"';
        else
            $sql = 'SELECT id FROM '.$tableName.' WHERE groupId="'.$groupId.'"';

        $query = $this->db->query($sql);
        if($query->num_rows($query)>0){
            return 'false';
        }else{
            return 'true';
        }
    }

}
?>