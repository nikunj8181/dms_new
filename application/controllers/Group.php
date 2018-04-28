<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends Auth_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("common_model");
		$this->load->model("group_model");
	}
	public function index(){
		redirect('group/listing');
	}
	function listing(){
		$headerData['menuData']=getMenu();
		$headerData['headerData']=getHeader();
		$data['data']=$this->group_model->getGroups();
		$this->load->view('templates/header.php', $headerData);
        $this->load->view('Group/listGroup.php',$data);
        $this->load->view('templates/footer.php');
	}

	function add(){
		$data=array();
		$data['company']=$this->common_model->getAllData('company');
		$this->load->view('templates/modalheader.php');
        $this->load->view('Group/addGroup.php',$data);
        $this->load->view('templates/modalfooter.php');
	}

	function edit($id){
		$data['data']=$this->common_model->getData($id,'groups');
		$data['company']=$this->common_model->getAllData('company');
		$this->load->view('templates/modalheader.php');
        $this->load->view('Group/editGroup.php', $data);
        $this->load->view('templates/modalfooter.php');
	}

	public function insertData(){
	    $data = array(
	    	'Title' => $this->input->post('Title'),
			'companyId' => $this->input->post('companyId')
		);
		$lastId=$this->common_model->insert($data,'groups');
		$this->session->set_flashdata('message', 'Group created successfully.');
		redirect('group/listing');
    }

    public function updateData(){
    	$id=$this->input->post('id');
	    $data = array(
	    	'Title' => $this->input->post('Title'),
	    	'companyId' => $this->input->post('companyId')
		);
		$this->common_model->update($id, $data, 'groups');
		$this->session->set_flashdata('message', 'Group updated successfully.');
		redirect('group/listing');
    }

    public function delete($id){
    	$this->db->where('id', $id);
    	$this->db->delete('groups');
    	$this->session->set_flashdata('message', 'Group deleted Successfully..');
    	redirect('group/listing');
    }

	function checkName($id = ''){
		$Title=$this->input->post('Title');
		echo $this->group_model->checkName('groups',$Title,$id);
		exit;
	}

	function checkComp($id = ''){
		$companyId=$this->input->post('companyId');
		echo $this->group_model->checkComp('groups',$companyId,$id);
		exit;
	}
}
