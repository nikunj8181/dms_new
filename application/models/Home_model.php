<?php
class Home_model extends CI_Model{

  function headerinfo(){
    $userId = $this->session->userdata('user_id');
    $sql = "SELECT * FROM user WHERE id = ".$userId;
    $query = $this->db->query($sql);
    if($query->num_rows() > 0){
        return $query->row_array();
    }
  }

  function getuserwise_accessmenuList($id,$tableName){
    $sql = "SELECT * FROM $tableName WHERE userId = '".$id."'";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }else{

    }

  }

  function menu_tree($parent = 0, $user_tree_array = ''){
        $mainPage=$this->router->fetch_class();
        $subPage=$mainPage."/".$this->router->fetch_method();

        if (!is_array($user_tree_array))
            $user_tree_array = array();
        $menuList="";
        if($this->session->user_id>0){
            $getData = $this->getuserwise_accessmenuList($this->session->user_id,'userwise_accessmenu');
            if(isset($getData) && count($getData) > 0){
                //$menuList = $getData[0]['menuId'];
                $menuList = " id IN(".$getData[0]['menuId'].") ";
            }else{$menuList=0;}
        }

        $sql = "SELECT `id`, `name`, `parent_id`, `alias`, `link` FROM `menu` WHERE ".$menuList." AND `parent_id` = $parent ORDER BY ordering ASC";
        $query = $this->db->query($sql);
        if($query->num_rows($query)> 0){
           $row=$query->result_array();
              foreach ($row as $value){

                $alias = explode(",",$value['alias']);
                $aero=$activeSub=$openMain='';
                if($value["link"] == 'javascript:;'){
                    $aero='<span class="arrow open"></span>';
                }

                if($value["link"]==$subPage){
                    $activeSub="active";
                }

                if(in_array($mainPage, $alias)){
                    $openMain='open';
                    $activeSub="active";
                }

                $user_tree_array[] = '<li class="nav-item '.$activeSub." ".$openMain.'">'.'<a href="'.base_url($value['link']).'" class="nav-link "><i class="icon-folder"></i><span class="title">'.$value['name'].'</span>'.$aero.'</a>';

                if(in_array($value['parent_id'], $value)){
                    
                    if(in_array($mainPage, $alias)){
                        $style='style="display: block;"';
                    }else{
                        $style='style="display: none;"';
                    }
                    
                    if($value["link"] == 'javascript:;'){
                        $user_tree_array[] = '<ul class="sub-menu" '.$style.'>';
                        $user_tree_array = $this->menu_tree($value['id'], $user_tree_array);
                        $user_tree_array[] = '</ul>';
                    }
                }
                $user_tree_array[] = '</li>';
            }
        }
        return $user_tree_array;
    }

  function inner_Access($userid, $tableName){
    $sql = "SELECT * FROM $tableName WHERE userId='".$userid."'";
    $query = $this->db->query($sql);
    if($query->num_rows($query)> 0){
        return $query->result_array();
    }
  }


}
?>