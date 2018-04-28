<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Auth_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("common_model");
		$this->load->model("category_model");
	}

	public function index(){
		redirect('category/listing');
	}

	function listing(){
		$headerData['menuData']=getMenu();
		$headerData['headerData']=getHeader();
		$data['data']=$this->category_model->getCategory();
		$this->load->view('templates/header.php', $headerData);
        $this->load->view('Category/listCategory.php',$data);
        $this->load->view('templates/footer.php');
	}

	function add(){
		$data=array();
		$data['group']=$this->common_model->getAllData('groups');
		$this->load->view('templates/modalheader.php');
        $this->load->view('Category/addCategory.php',$data);
        $this->load->view('templates/modalfooter.php');
	}

	function edit($id){
		$data['data']=$this->common_model->getData($id,'category');
		$data['group']=$this->common_model->getAllData('groups');
		$this->load->view('templates/modalheader.php');
        $this->load->view('Category/editCategory.php', $data);
        $this->load->view('templates/modalfooter.php');
	}

	public function insertData(){
	    $data = array(
	    	'Title' => $this->input->post('Title'),
			'groupId' => $this->input->post('groupId')
		);
		$lastId=$this->common_model->insert($data,'category');
		$this->session->set_flashdata('message', 'Category created successfully.');
		redirect('category/listing');
    }

    public function updateData(){
    	$id=$this->input->post('id');
	    $data = array(
	    	'Title' => $this->input->post('Title'),
	    	'groupId' => $this->input->post('groupId')
		);
		$this->common_model->update($id, $data, 'category');
		$this->session->set_flashdata('message', 'Category updated successfully.');
		redirect('category/listing');
    }

    public function delete($id){
    	$this->db->where('id', $id);
    	$this->db->delete('category');
    	$this->session->set_flashdata('message', 'Category deleted Successfully..');
    	redirect('category/listing');
    }

	function checkName($id = ''){
		$Title=$this->input->post('Title');
		echo $this->category_model->checkName('category',$Title,$id);
		exit;
	}

	function checkGrp($id = ''){
		$groupId=$this->input->post('groupId');
		echo $this->category_model->checkGrp('category',$groupId,$id);
		exit;
	}
}
