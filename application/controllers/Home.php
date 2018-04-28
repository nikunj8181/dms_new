<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Auth_Controller {

	public function __construct(){
		parent::__construct();
		
		$models = array('home_model'=> 'home_model',);
		
		$this->load->model($models);
	}

	public function index(){
		$data = array();
		$headerData['menuData']=getMenu();
		$headerData['headerData']=getHeader();

		$this->load->view('templates/header.php', $headerData);
        $this->load->view('home/home.php', $data);
        $this->load->view('templates/footer.php');
	}

}
