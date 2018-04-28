<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model("login_model");
        $this->load->model("common_model");
		$this->load->helper('mailhelper');
        /*$this->load->helper('settings');
        $logo=getSettings();
        $this->session->set_userdata('logo', $logo['Logo']);*/
        $this->load->library('botdetect/BotDetectCaptcha', array(
            'captchaConfig' => 'ExampleCaptcha'
        ));
	}

	public function index(){
		if(!$this->session->user_id){
            $data['captchaHtml'] = $this->botdetectcaptcha->Html();
			$data['data']=array();
        	$this->load->view('login/login.php',$data);	
		}else{
			session_unset();
			redirect('/');
		}
	}

	public function auth(){

        $code = $this->input->post('CaptchaCode');
        $isHuman = $this->botdetectcaptcha->Validate($code);
        if($isHuman){
            $authData=$this->login_model->getAuth($this->input->post('email'), $this->input->post('password'));
            if(!empty($authData)){
            	
              if($authData['isFirst'] == 1){
                $encrypt= rand();
                $password = md5($encrypt);
                $user_id=base64_encode($authData['id']);
                $data['data']=array('a'=>$user_id);
            	$this->load->view('login/setpwd.php',$data);
              }else{
                $userLogo=$this->common_model->getWhere(array('id'=>$authData['companyId']),'*','company');
            	$this->session->set_userdata('user_email', $authData['email']);
            	$this->session->set_userdata('user_id', $authData['id']);
            	$this->session->set_userdata('userType', $authData['userType']);
                $this->session->set_userdata('companyId', $authData['companyId']);
                $this->session->set_userdata('logo', $userLogo['companyImage']);
                redirect('/');
              }
            }else{
                $this->session->set_flashdata('message', 'Please enter valid email or password.');
             	redirect('login/#email');
            }
        }else{
            $this->session->set_flashdata('message', 'Invalid captcha.');
            $this->session->set_flashdata('email', $this->input->post('email'));
            $this->session->set_flashdata('password', $this->input->post('password'));
            redirect('login/#email');
        }
	}

	function setnewp(){
		$data=array();
        $data['password'] = md5($this->input->post('password'));
        $data['isFirst'] = 0;
        $this->db->where('id', $this->input->post('userId'));
		$this->db->update('user', $data);
		//$this->session->set_flashdata('message', 'Account not found please contact administrator!');
		redirect('login/success');
	}

    function reset($token, $userId){
        $data['data']=array('a'=>$userId);
        $this->load->view('login/resetpwd.php',$data);
    }

	function forgot(){
		$this->load->view('login/forgot.php');
	}

	function forgotpwd(){

        $forgotData=$this->login_model->getForgot($this->input->post('email'));
        if(!empty($forgotData)){
            $encrypt= rand();
            $password = md5($encrypt);
            $user_id=base64_encode($forgotData['id']);

            $where_clause = array('email' => $forgotData['email']);
            $pwrurl = base_url()."login/reset/q=".$password."/a=".$user_id;
            $to=$forgotData['email'];
            $subject="Reset Password";
            $messageBody=resetpwdBody($pwrurl);
            $mail=sendEmail($to,$subject,$messageBody);
            if($mail){
                $this->session->set_flashdata('message', 'Success! Your password send to your e-mail address.');
                redirect('login/forgot');
            }else{
                $this->session->set_flashdata('message', 'Error! Unable to send mail.');
                redirect('login/forgot');
            }
        }else{
            $this->session->set_flashdata('message', 'Account not found please contact administrator!');
         	redirect('login/forgot');
        }

	}

    function change(){
        $data=array();
        $data['password'] = md5($this->input->post('password'));
        $this->db->where('id', $this->input->post('userId'));
        $this->db->update('user', $data);
        session_destroy();
        $this->session->set_flashdata('message', 'Your password change successfully.');
        redirect('login/');
    }

    function changepwd(){
        $this->load->view('login/changepwd.php');
    }

    function checkAdminOldpwd(){

        $userId=$this->session->userdata('user_id');
        $oldpwd=md5($this->input->post('oldpwd'));

        $sql = "SELECT * FROM user WHERE id= ".$userId." AND password = '".$oldpwd."'";
        $query = $this->db->query($sql);
        if($query->num_rows($query)> 0){
            echo 'true';
        }else{
            echo 'false';
        }
        exit;
    }

    //Mobile Login Start
    function verify(){
        $data['data']=array();
        $this->load->view('login/otpverify.php',$data); 
    }

    function mobilelogin(){
        $dataSet=array();
        $phone=$this->StringReplace($this->input->post('phone_number'));
        $authData=$this->login_model->MobileAuth($phone);
        if(!empty($authData)){
            //If user found send OTP
            $data = array(
                'otp' => $this->OTPGenerate(),
            );
            $this->login_model->update($phone, $data, 'user');
            $msg=$this->sendOtp($phone,$this->OTPGenerate());
            $this->session->set_flashdata('mobilemsg', $msg);
            redirect('login/verify');
        }else{
            $msg="Your mobile number is not registered.";
            $this->session->set_flashdata('mobilemsg', $msg);
            redirect('login/#mobile');
            /*$data = array(
                'Ref_No' => $this->readomNo(),
                'Phone' => $phone,
                'password' => md5($phone),
                'role' => 'subscriber',
                'isApproved' => 1,
                'created_at' => date('Y-m-d'),
                'otp' => $this->OTPGenerate(),
                'isActive' => 1
            );
            $lastId=$this->login_model->insert($data,'user');
            if($lastId>0){
                $data = array(
                    'userID' => $lastId,
                    'Amount' => 0.00
                );
                $this->login_model->insert($data,'wallet');
                
                $msg=$this->sendOtp($phone,$this->OTPGenerate());
                $this->session->set_flashdata('mobilemsg', $msg);
                redirect('login/verify');
            }*/
        }
    }

    function verifyotp(){
        if($this->input->post('user')!='' && $this->input->post('otp')!=''){
            $user=$this->input->post('user');
            $otp=$this->input->post('otp');
            if(strpos($user, '@') !== false ){
                $authData=$this->login_model->VeryfiMailAuth($user, $otp);
            }else{
                $authData=$this->login_model->VeryfiMobileAuth($user, $otp);
            }
            if(!empty($authData)){
                    $this->session->unset_userdata('user');
                    $this->session->unset_userdata('otp');

                $this->session->set_userdata('user_email', $authData['email']);
                $this->session->set_userdata('user_id', $authData['id']);
                $this->session->set_userdata('userType', $authData['userType']);
                redirect('/');
            }else{
                $this->session->set_flashdata('mobilemsg', 'The verification code you entered is not valid.');
                redirect('login/verify');
            }

        }else{
            $this->session->set_flashdata('mobilemsg', 'Opps! Something went wrong.');
            redirect('login/verify');
        }
    }

    function sendOtp($phone=null, $otp=null){
        $auth=base64_encode("pentagon".":"."destiny123");
        $authorization="authorization: Basic ".$auth;

        $msgText="Dear customer, you verification code is ".$this->OTPGenerate().". Thanks and regards";
        $MM['messages'][]=array(
                    "from"=>"WEB-EASY",
                    "to"=>array($phone),
                    "text"=>$msgText
                );
        $postFields=json_encode($MM);
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.infobip.com/sms/1/text/multi",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $postFields,
          CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            $authorization,
            "content-type: application/json"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if($err){
          return $cURLErr="cURL Error #:" . $err;
        }else{
            $this->session->set_userdata('user', $phone);
            $this->session->set_userdata('otp', $otp);
            return "Please enter otp";
        }
    }

    public function reset_otp(){
        session_unset();
        redirect('/');
    }

    function logout(){
        session_destroy();
        $this->session->set_flashdata('message', 'Logout successfully!');
        redirect('login/');
    }

	function success(){
		$this->load->view('login/success.php');
	}

    private function StringReplace($str=null){
        $search = array('/','\\',':',';','!','@','#','$','%','^','*','(',')','_','+','=','|','{','}','[',']','"',"'",'<','>',',','?','~','`','&',' ','.');
       return str_replace($search, '', $str); 
    }

    private  function OTPGenerate(){
        return substr(time(), -6);
    }

}
