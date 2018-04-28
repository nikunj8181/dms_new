<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanager extends Auth_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("common_model");
		$this->load->model("filemanager_model");
	}
	public function index(){
		redirect('filemanager/listing');
	}
	function listing(){
		$headerData['menuData']=getMenu();
		$headerData['headerData']=getHeader();
        $loggedUser=$this->session->userdata('user_id');
		$data['OwnfileData']=$this->filemanager_model->getOwnFiles($loggedUser);
        $data['access']=$this->common_model->getWhere(array('id'=>$loggedUser),'*','user');
        $data['SharefileData']=$this->filemanager_model->getShareFiles($loggedUser);
		$this->load->view('templates/header.php', $headerData);
        $this->load->view('Filemanager/listFile.php',$data);
        $this->load->view('templates/footer.php');
	}

	function add(){
		$data=array();
        $loggedUser=$this->session->userdata('user_id');
        $data['customers']=$this->filemanager_model->getUsersByCategory($this->session->userdata('companyId'),$loggedUser);
        $data['userInfo']=$this->common_model->getWhere(array('id'=>$loggedUser),'*','user');
        $data['category']=$this->filemanager_model->getThisUserCategory($loggedUser);
		$this->load->view('templates/modalheader.php');
        $this->load->view('Filemanager/addFile.php',$data);
        $this->load->view('templates/modalfooter.php');
	}

    function edit($id){
        $loggedUser=$this->session->userdata('user_id');
        $data['data']=$this->common_model->getWhere(array('id'=>$id),'*','user_docs');
        $data['customers']=$this->filemanager_model->getUsersByCategory($this->session->userdata('companyId'),$loggedUser);
        $data['editCus']=$this->common_model->getAllData('user_docs_access',array('fileId'=>$id));
        $data['category']=$this->filemanager_model->getThisUserCategory($loggedUser);
        $this->load->view('templates/modalheader.php');      
        $this->load->view('Filemanager/editFile.php', $data);
        $this->load->view('templates/modalfooter.php');
    }

	function view($id){
        $data['data']=$this->common_model->getWhere(array('id'=>$id),'*','user_docs');
        //$data['access']=$this->common_model->getWhere(array('fileId'=>$id),'*','user_docs_access');
		$this->load->view('templates/modalheader.php');		 
        $this->load->view('Filemanager/viewFile.php', $data);
        $this->load->view('templates/modalfooter.php');
	}

	public function insertData(){
        
		if(!empty($_FILES['userDoc']['name'])){
            $config['upload_path'] = 'uploads/userdocs/';
            $config['allowed_types'] = 'doc|docx|xls|xlsx|pdf';
            $config['file_name'] = time().$_FILES['userDoc']['name'];
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if($this->upload->do_upload('userDoc')){
                $uploadData = $this->upload->data();
                $docName = $uploadData['file_name'];
                $docSize = $uploadData['file_size'];
                $docType = $uploadData['file_ext'];
            }else{
                $this->session->set_flashdata('err', 'Report Not upload.');
                redirect('filemanager/listing');
                exit;
            }
        }else{
        	$this->session->set_flashdata('err', 'Please select report.');
            redirect('filemanager/listing');
            exit;
        }

	    $data = array(
            'user_id' => $this->session->user_id,
	    	'docTitle' => $this->input->post('docTitle'),
            'docDescription' => $this->input->post('docDescription'),            
	    	'docName' => $docName,
			'docSize' => $docSize,
            'docType' => $docType,
            'categoryId' => $this->input->post('categoryId')
		);
		$lastId=$this->common_model->insert($data,'user_docs');
        if($lastId){
            $arr=array();
            //if(!empty($this->input->post('customer'))){
            if($this->input->post('customer')){
                foreach ($this->input->post('customer') as $key => $c){
                    $a['fileId']=$lastId;
                    $a['customer_id']=@$c;
                    $a['editFile']=@$this->input->post('edit')[$c] ? "1" : "0";
                    $a['printFile']=@$this->input->post('print')[$c] ? "1" : "0";
                    $a['viewFile']=@$this->input->post('view')[$c] ? "1" : "0";
                    $a['dwnFile']=@$this->input->post('download')[$c] ? "1" : "0";
                    $arr[]=$a;
                }
                $this->common_model->insertBatch('user_docs_access',$arr);
            }
        }
		$this->session->set_flashdata('message', 'Report upload successfully.');
		redirect('filemanager/listing');
    }

    public function updateData(){
    	$id=$this->input->post('id');

    	if(!empty($_FILES['userDoc']['name'])){
            $config['upload_path'] = 'uploads/userdocs/';
            $config['allowed_types'] = 'doc|docx|xls|xlsx|pdf';
            $config['file_name'] = time().$_FILES['userDoc']['name'];
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if($this->upload->do_upload('userDoc')){
            	$path='./uploads/userdocs/'.$this->input->post('oldFile');
            	@unlink($path);

                $uploadData = $this->upload->data();
                $docName = $uploadData['file_name'];
                $docSize = $uploadData['file_size'];
                $docType = $uploadData['file_ext'];
                $data['docSize']=$docSize;
                $data['docType']=$docType;
            }else{
                $this->session->set_flashdata('err', 'Report Not upload.');
                redirect('filemanager/listing');
                exit;
            }
        }else{
        	$docName = $this->input->post('oldFile');
        }

        $data['user_id']=$this->session->user_id;
        $data['docTitle']=$this->input->post('docTitle');
        $data['docDescription']=$this->input->post('docDescription');
        $data['docName']=$docName;
        $data['categoryId']=$this->input->post('categoryId');
		$update=$this->common_model->update($id, $data, 'user_docs');
        if($update){
            $this->db->where('fileId', $id);
            $this->db->delete('user_docs_access');

            $arr=array();
            //if(!empty($this->input->post('customer'))){
            if($this->input->post('customer')){
                foreach ($this->input->post('customer') as $key => $c){
                    $a['fileId']=$id;
                    $a['customer_id']=@$c;
                    $a['editFile']=@$this->input->post('edit')[$c] ? "1" : "0";
                    $a['printFile']=@$this->input->post('print')[$c] ? "1" : "0";
                    $a['viewFile']=@$this->input->post('view')[$c] ? "1" : "0";
                    $a['dwnFile']=@$this->input->post('download')[$c] ? "1" : "0";
                    $arr[]=$a;
                }
                $this->common_model->insertBatch('user_docs_access',$arr);
            }
        }
		$this->session->set_flashdata('message', 'Report updated successfully.');
		redirect('filemanager/listing');
    }

    public function delete($id){

        $data=$this->common_model->getWhere(array('id'=>$id),'*','user_docs');
        if(!empty($data)){
            $path='./uploads/userdocs/'.$data['docName'];
            @unlink($path);
            $this->db->where('id', $data['id']);
            $this->db->delete('user_docs');

            $this->db->where('fileId', $data['id']);
            $this->db->delete('user_docs_access');

            $this->session->set_flashdata('message', 'Report deleted Successfully.');
            redirect('filemanager/listing');
        }else{
            $this->session->set_flashdata('err', 'Report Not Deleted.');
            redirect('filemanager/listing');
        }
    }

	function checkName($id = ''){
		$Title=$this->input->post('docTitle');
		echo $this->filemanager_model->checkName('user_docs',$Title,$id);
		exit;
	}

    public function download($id=0){
        if($this->input->post('ID')!=''){
            $id=$this->input->post('ID');
        }
        $dataList=$this->common_model->getWhere(array('id'=>$id),'*','user_docs');
        if(!empty($dataList)){
            $this->load->helper('download');
            $path = FCPATH."uploads/userdocs/".$dataList['docName'];
            if(file_exists($path)){
                $data = file_get_contents($path);
                $name = $dataList['docName'];
                force_download($name, $data);
            }else{
                echo "0";   
            }
        }else{
            echo "0";
        }
    }

    public function printFile(){
        $path = FCPATH."uploads/userdocs/1524215030Missing_Fields_HL7.xlsx";
        echo show_source($path);
        exit;
    }
}
