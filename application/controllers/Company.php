<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends Auth_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("common_model");
		$this->load->model("company_model");
	}
	public function index(){
		redirect('company/listing');
	}
	function listing(){
		$headerData['menuData']=getMenu();
		$headerData['headerData']=getHeader();
		$data['data']=$this->common_model->getAllData('company');
		$this->load->view('templates/header.php', $headerData);
        $this->load->view('Company/listCompany.php',$data);
        $this->load->view('templates/footer.php');
	}

	function add(){
		$data=array();
		$this->load->view('templates/modalheader.php');
        $this->load->view('Company/addCompany.php',$data);
        $this->load->view('templates/modalfooter.php');
	}

	function edit($id){
		$data['data']=$this->common_model->getData($id,'company');
		$this->load->view('templates/modalheader.php');		 
        $this->load->view('Company/editCompany.php', $data);
        $this->load->view('templates/modalfooter.php');
	}

	public function insertData(){

		if(!empty($_FILES['companyImage']['name'])){
            $config['upload_path'] = 'assets/logo/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = time().$_FILES['companyImage']['name'];
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if($this->upload->do_upload('companyImage')){
                $uploadData = $this->upload->data();
                $Logo = $uploadData['file_name'];
            }else{
                $Logo = 'nologo.jpg';
            }
        }else{
        	$Logo = 'nologo.jpg';
        }

	    $data = array(
	    	'Title' => $this->input->post('Title'),
	    	'companyImage' => $Logo,
			'createdBy' => $this->session->user_id
		);
		$lastId=$this->common_model->insert($data,'company');
		$this->session->set_flashdata('message', 'Company created successfully.');
		redirect('company/listing');
    }

    public function updateData(){
    	$id=$this->input->post('id');

    	if(!empty($_FILES['companyImage']['name'])){
            $config['upload_path'] = 'assets/logo/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = time().$_FILES['companyImage']['name'];
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if($this->upload->do_upload('companyImage')){
            	$path='./assets/logo/'.$this->input->post('oldlogo');
            	unlink($path);

                $uploadData = $this->upload->data();
                $Logo = $uploadData['file_name'];
            }else{
                $Logo = 'nologo.jpg';
            }
        }else{
        	$Logo = $this->input->post('oldlogo');
        }

	    $data = array(
	    	'Title' => $this->input->post('Title'),
	    	'companyImage' => $Logo
		);
		$this->common_model->update($id, $data, 'company');
		$this->session->set_flashdata('message', 'Company updated successfully.');
		redirect('company/listing');
    }

    public function delete($id){
    	$this->db->where('id', $id);
    	$this->db->delete('company');
    	$this->session->set_flashdata('message', 'Company deleted Successfully..');
    	redirect('company/listing');
    }

	function checkName($id = ''){
		$Title=$this->input->post('Title');
		echo $this->company_model->checkName('company',$Title,$id);
		exit;
	}
}
