<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Auth_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("common_model");
		$this->load->model("user_model");
	}

	public function index(){
		redirect('user/listing');
	}

	function listing(){
		$headerData['menuData']=getMenu();
		$headerData['headerData']=getHeader();
		if($this->session->userdata('userType')=='manager'){
			$loggedUser=$this->session->userdata('user_id');
			$data['data']=$this->user_model->getUsers($loggedUser);
		}else{
			$data['data']=$this->user_model->getUserlist();
		}
		$this->load->view('templates/header.php', $headerData);
        $this->load->view('User/listUser.php',$data);
        $this->load->view('templates/footer.php');
	}

	function add(){
		$data=array();
		$loggedUser=$this->session->userdata('user_id');
		if($this->session->userdata('userType')=='manager'){
			$data['userType']=$this->user_model->getUseType();
			$data['userInfo']=$this->common_model->getWhere(array('id'=>$loggedUser),'*','user');
			$data['category']=$this->user_model->getThisUserCategory($loggedUser);
		}else{
			$data['userType']=$this->common_model->getAllData('usertype');
			$data['category']=$this->common_model->getAllData('category');
			$data['company']=$this->common_model->getAllData('company');
		}
		$this->load->view('templates/modalheader.php');
        $this->load->view('User/addUser.php',$data);
        $this->load->view('templates/modalfooter.php');
	}

	function edit($id){
		$loggedUser=$this->session->userdata('user_id');
		if($this->session->userdata('userType')=='manager'){
			$data['userType']=$this->user_model->getUseType();
			$data['userInfo']=$this->common_model->getWhere(array('id'=>$loggedUser),'*','user');
			$data['category']=$this->user_model->getThisUserCategory($loggedUser);
		}else{
			$data['userType']=$this->common_model->getAllData('usertype');
			$data['category']=$this->common_model->getAllData('category');
			$data['company']=$this->common_model->getAllData('company');
		}

		$data['data']=$this->common_model->getData($id,'user');
		$data['data_category']=$this->common_model->getAllData('user_category',array('user_id'=>$id));
		$this->load->view('templates/modalheader.php');		 
        $this->load->view('User/editUser.php', $data);
        $this->load->view('templates/modalfooter.php');
	}

	public function insertData(){
	    $data = array(
	    	'FirstName' => $this->input->post('FirstName'),
	    	'LastName' => $this->input->post('LastName'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'phone' => $this->input->post('phone'),
			'companyId' => $this->input->post('companyId'),
			'userType' => $this->input->post('userType'),
			'createdBy' => $this->session->user_id,
			'uploadLimit' => 250,
			'newFile' => $this->input->post('newFile')  ? "1" : "0",
			'removeFile' => $this->input->post('removeFile')  ? "1" : "0",
			'isActive' => 1
		);
		$lastId=$this->common_model->insert($data,'user');
		if($lastId>0){
			//user_category
			if($this->input->post('categoryId')){
				$carArr=array();
				foreach ($this->input->post('categoryId') as $cat){
					$categ['user_id']=$lastId;
					$categ['category_id']=$cat;
					$carArr[]=$categ;
				}
				$this->common_model->insertBatch('user_category',$carArr);
			}
		}
		$this->session->set_flashdata('message', 'User created successfully.');
		redirect('user/listing');
    }

    public function updateData(){
    	$UserId=$this->input->post('id');
	    $data = array(
	    	'FirstName' => $this->input->post('FirstName'),
	    	'LastName' => $this->input->post('LastName'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'companyId' => $this->input->post('companyId'),
			'userType' => $this->input->post('userType'),
			'newFile' => $this->input->post('newFile')  ? "1" : "0",
			'removeFile' => $this->input->post('removeFile')  ? "1" : "0"
		);
		$update=$this->common_model->update($UserId, $data, 'user');
		if($update){
			$this->db->where('user_id', $UserId);
            $this->db->delete('user_category');

            if($this->input->post('categoryId')){
				$carArr=array();
				foreach ($this->input->post('categoryId') as $cat){
					$categ['user_id']=$UserId;
					$categ['category_id']=$cat;
					$carArr[]=$categ;
				}
				$this->common_model->insertBatch('user_category',$carArr);
			}
		}
		$this->session->set_flashdata('message', 'User updated successfully.');
		redirect('user/listing');
    }

    public function getcategory(){
    	$data=array();
    	$companyId=$this->input->post('_id');
    	$data['category']=$this->user_model->getCategory($companyId);
    	echo $this->load->view('User/categoryCheckBox.php', $data, true);
    	exit;
    }

    public function delete($id){
    	$this->db->where('id', $id);
    	$this->db->delete('user');
    	$this->session->set_flashdata('message', 'User deleted Successfully..');
    	redirect('user/listing');
    }
    
	function checkMail($id = ''){
		$email=$this->input->post('email');
		echo $this->user_model->checkmail('user', $email, $id);
		exit;
	}
}
