<?php
class Group_model extends CI_Model{

    function getGroups(){
        $sql = "SELECT GRP.id,GRP.Title,COMPA.Title AS company FROM groups AS GRP INNER JOIN company AS COMPA ON GRP.companyId=COMPA.id";
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

    function checkComp($tableName,$companyId,$id){
        if(isset($id) && $id > 0)
            $sql = 'SELECT id FROM '.$tableName.' WHERE companyId="'.$companyId.'" AND id != "'.$id.'"';
        else
            $sql = 'SELECT id FROM '.$tableName.' WHERE companyId="'.$companyId.'"';

        $query = $this->db->query($sql);
        if($query->num_rows($query)>0){
            return 'false';
        }else{
            return 'true';
        }
    }

}
?>