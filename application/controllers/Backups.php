<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backups extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('file');
		$this->load->library('zip');
		$this->load->dbutil();
	}

	public function index(){
		$path = FCPATH."uploads/";
		$copyPath=FCPATH."backup/Files_Backup/";
		$DBPath=FCPATH."backup/DB_Backup/";

		$fileName=date('m-d-Y').'_'.time().'.zip';
		$dbname=date('m-d-Y').'_'.time().'.gz';

		if(file_exists($path)){
			//Files Backup
			$this->zip->read_dir($path,FALSE);
			$aa=$this->zip->archive($path.$fileName);
			@copy($path.$fileName, $copyPath.$fileName);
			@unlink($path.$fileName);

			//DB Backup
			$backup = $this->dbutil->backup();
			@write_file($DBPath.$dbname, $backup);

			$this->sendMail();
			
		}else{
			echo "Path Issue";exit;
		}
	}

    function sendMail(){
	    $config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'testoffice9@gmail.com', // change it to yours
		  'smtp_pass' => 'test123456', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);

	    $message = 'Backup Sucess...';
	    $this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('thewebeasydemo@gmail.com','Web Easy Counter'); // change it to yours
		$this->email->to('nikunj.bhimani@thedestinysolutions.com');// change it to yours
		$this->email->subject('Web Easy Counter: Backup created');
		$this->email->message($message);
	    if($this->email->send()){
	      echo 'Mail Sent';
	    }else{
	     echo 'Not Sent';
	    }
	}

}
