<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menuaccessrl extends Auth_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("menuaccessrl_model");
	}
	public function index(){
		redirect('menuaccessrl/listing');
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
			$userType = $this->input->post('userRole');
			$data = array(
				'userType' => $userType,
				'menuId' => $menuId,
				'mainMenuId' => $mainMenuId
			);
			$alreadyExist = $this->menuaccessrl_model->getrolewise_accessmenuList($userType,'rolewise_accessmenu');
			if(isset($alreadyExist) && count($alreadyExist) > 0){
				$this->menuaccessrl_model->update($alreadyExist[0]['id'], $data,'rolewise_accessmenu');
			}else{
				$lastId=$this->menuaccessrl_model->insert($data,'rolewise_accessmenu');
			}		
			$this->session->set_flashdata('message', 'Data updated successfully.');
    	}
		$headerData['menuData']=getMenu();
		$headerData['headerData']=getHeader();
		$data = array();
		$menuList = array();
		$mainmenuList = array();
		$user_tree_array = array();
		$data['userRoleList'] = $this->menuaccessrl_model->getList('usertype');
		if($this->input->post('userRole')){
			$data['selectedRole']=$this->input->post('userRole');
			$getData = $this->menuaccessrl_model->getrolewise_accessmenuList($this->input->post('userRole'),'rolewise_accessmenu');
			if(isset($getData) && count($getData) > 0){
				$menuList = explode(",",$getData[0]['menuId']);
				$mainmenuList = explode(",",$getData[0]['mainMenuId']);
			}
		}
		$mainMenu = $this->menuaccessrl_model->getList('main_menu');
		if(isset($mainMenu) && count($mainMenu) > 0)
		{
			foreach ($mainMenu as $key => $value) {
				$subMenu = $this->menuaccessrl_model->getData($value['m_menu_id'],'sub_menu');
				if(isset($subMenu) && count($subMenu) > 0){
					$user_tree_array[] = "<li> ".$value['m_menu_name'];
					$user_tree_array[] = "<ul>";
					foreach ($subMenu as $key => $val) {
						if(in_array($val['s_menu_id'], $menuList)){
							$selected = 'checked';
						}else{
							$selected = '';
						}
						$user_tree_array[] = "<li "."data-jstree='{\"icon\" : \"fa icon-layers\", \"selected\" : true}'><input type='checkbox' name='checkmenu[]' ".$selected." value='".$val['s_menu_id']."'> ".$val['s_menu_name']."</li>";
					}
					$user_tree_array[] = "</ul>";
				}
				else{
					if(in_array($value['m_menu_id'], $mainmenuList)){
							$selected = 'checked';
						}else{
							$selected = '';
						}
					$user_tree_array[] = "<li "."data-jstree='{\"icon\" : \"fa icon-layers\", \"selected\" : true}'> <input type='checkbox' name='checkmenumain[]' ".$selected." value='".$value['m_menu_id']."'> ".$value['m_menu_name'];
				}
				
			}
		}
		$data['data'] = $user_tree_array;

		$this->load->view('templates/header.php', $headerData);
        $this->load->view('Menuaccessrl/list.php',$data);
        $this->load->view('templates/footer.php');
	}

}
