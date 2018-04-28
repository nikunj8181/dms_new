<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userrole extends Auth_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("common_model");
		$this->load->model("userrole_model");
	}
	public function index(){
		redirect('userrole/listing');
	}
	function listing(){
		$headerData['menuData']=getMenu();
		$headerData['headerData']=getHeader();
		$data = array();
		$data['data']=$this->common_model->getAllData('usertype');
		$this->load->view('templates/header.php', $headerData);		 
        $this->load->view('Userrole/listUserRole.php',$data);
        $this->load->view('templates/footer.php');
	}
	function add(){
		$this->load->view('templates/modalheader.php');
        $this->load->view('Userrole/addUserRole.php');
        $this->load->view('templates/modalfooter.php');
	}

	function edit($id){
		$data['dataList']=$this->common_model->getData($id,'usertype');	
		$this->load->view('templates/modalheader.php');
        $this->load->view('Userrole/editUserRole.php',$data);
        $this->load->view('templates/modalfooter.php');
	}
	public function insertData(){
		$alias = preg_replace('/\s+/', '', $this->input->post('Title'));
		$data = array(
	    	'Title' => $this->input->post('Title'),
	    	'alias' => strtolower($alias)
		);
		$lastId=$this->common_model->insert($data,'usertype');
		if($lastId > 0){
			$this->session->set_flashdata('message', 'User Role inserted successfully.');
			redirect('userrole/listing');
		}else{
			$this->session->set_flashdata('message', 'User Role inserted Failed.');
			redirect('userrole/listing');
		}	
    }
    public function updateData(){
    	$alias = preg_replace('/\s+/', '', $this->input->post('Title'));
		$data = array(
	    	'Title' => $this->input->post('Title'),
	    	'alias' => strtolower($alias)
		);
		$this->common_model->update($this->input->post('id'), $data, 'usertype');
		$this->session->set_flashdata('message', 'User Role updated successfully.');
		redirect('userrole/listing');
    }
    public function delete($id){
    	$this->db->where('id', $id);
    	$this->db->delete('usertype');
    	$this->session->set_flashdata('message', 'User role deleted Successfully..');
    	redirect('userrole/listing');
    } 
    function checkDuplicateTitle($id=''){
		$title = $this->input->post('Title');
		echo $this->userrole_model->checkDuplicateTitle('usertype',$title,$id);
		exit;
	}

	

}
