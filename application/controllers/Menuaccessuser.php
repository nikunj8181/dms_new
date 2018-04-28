<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menuaccessuser extends Auth_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("common_model");
		$this->load->model("menuaccessuser_model");
	}
	public function index(){
		redirect('Menuaccessuser/listing');
	}

	function listing(){
		if(isset($_POST['submit']) == 'save'){
			if($this->input->post('checkmenu'))
				$menuId = implode(",",$this->input->post('checkmenu'));
			else
				$menuId = '';
			if($this->input->post('checkmenumain'))
				$mainMenuId = implode(",",$this->input->post('checkmenumain'));
			else
				$mainMenuId = '';

			$userId = $this->input->post('userId');
			$data = array(
				'userId' => $userId,
				'menuId' => $menuId,
				'mainMenuId' => $mainMenuId
			);
			$alreadyExist = $this->menuaccessuser_model->getuserwise_accessmenuList($userId,'userwise_accessmenu');
			if(isset($alreadyExist) && count($alreadyExist) > 0){
					$this->common_model->update($alreadyExist[0]['id'], $data,'userwise_accessmenu');
			}else{
				$lastId=$this->common_model->insert($data,'userwise_accessmenu');
			}
			$this->session->set_flashdata('message', 'Data updated successfully.');
    	}

		$headerData['menuData']=getMenu();
		$headerData['headerData']=getHeader();
		$data = array();
		$user_tree_array = array();
		$data['userId']=$this->input->post('userId');

		if($this->session->userdata('userType')=='superadmin'){
			$data['userList'] = $this->common_model->getAllData('user');
			$data['data'] = $this->fetchMenuTreeList();
		}else{
			$loggedUser=$this->session->userdata('user_id');
			$data['userList']=$this->menuaccessuser_model->getUsers($loggedUser);
			$data['data'] = $this->fetchUserMenuTreeList();
		}
		
		$this->load->view('templates/header.php', $headerData);
        $this->load->view('Menuaccessuser/list.php',$data);
        $this->load->view('templates/footer.php');
	}

	function fetchMenuTreeList($parent = 0, $user_tree_array = ''){
	    if (!is_array($user_tree_array))
	    $user_tree_array = array();
		$menuList = array();

	    $sql = "SELECT `id`, `name`, `parent_id`, `alias`, `link` FROM `menu` WHERE 1 AND `parent_id` = $parent ORDER BY ordering ASC";
	    $query = $this->db->query($sql);
	    if($query->num_rows($query)> 0){
	       $user_tree_array[] = "<ul>";
	       $row=$query->result_array();
	      foreach ($row as $value){

	      	if($this->input->post('userId')){
				$data['userId']=$this->input->post('userId');
				$getData = $this->menuaccessuser_model->getuserwise_accessmenuList($this->input->post('userId'),'userwise_accessmenu');
				if(isset($getData) && count($getData) > 0){
					$menuList = explode(",",$getData[0]['menuId']);
				}
			}
			if(in_array($value['id'], $menuList)){
				$checked="checked";
			}else{
				$checked="";
			}

	  	  	$user_tree_array[] = "<li "."data-jstree='{\"icon\" : \"fa icon-layers\", \"selected\" : true}'><input type='checkbox' name='checkmenu[]' ".$checked." value='".$value['id']."'> ".$value['name'];

	        $user_tree_array = $this->fetchMenuTreeList($value['id'], $user_tree_array);
	      }
	  	$user_tree_array[] = "</li></ul>";
	    }
	    return $user_tree_array;
	}

	function fetchUserMenuTreeList($parent = 0, $user_tree_array = ''){
		$loggedUser=$this->session->userdata('user_id');

	    if (!is_array($user_tree_array))
	    $user_tree_array = array();
		$menuids="";
		if($loggedUser>0){
			$data['userId']=$loggedUser;
			$getData = $this->menuaccessuser_model->getuserwise_accessmenuList($loggedUser,'userwise_accessmenu');
			$menuids=$getData[0]['menuId'];
		}

	    $sql = "SELECT `id`, `name`, `parent_id`, `alias`, `link` FROM `menu` WHERE `id` IN($menuids) ORDER BY ordering ASC";
	    $query = $this->db->query($sql);
	    if($query->num_rows($query)> 0){
	       $user_tree_array[] = "<ul>";
	       $row=$query->result_array();
	      foreach ($row as $value){
	      	$menuList=array();
	      	if($this->input->post('userId')){
				$data['userId']=$this->input->post('userId');
				$getData = $this->menuaccessuser_model->getuserwise_accessmenuList($this->input->post('userId'),'userwise_accessmenu');
				if(isset($getData) && count($getData) > 0){
					$menuList = explode(",",$getData[0]['menuId']);
				}
			}
			if(in_array($value['id'], $menuList)){
				$checked="checked";
			}else{
				$checked="";
			}

	  	  	$user_tree_array[] = "<li "."data-jstree='{\"icon\" : \"fa icon-layers\", \"selected\" : true}'><input type='checkbox' name='checkmenu[]' ".$checked." value='".$value['id']."'> ".$value['name'];
	      }
	  	$user_tree_array[] = "</li></ul>";
	    }
	    return $user_tree_array;
	}

}
