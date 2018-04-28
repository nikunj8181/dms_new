<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('mailsmsSettings')){

  function mailsmsSettings(){
    	$CI = get_instance();
    	$CI->load->model("settings_model");
		return $CI->settings_model->getSMSettings_Helper();
	}
}

