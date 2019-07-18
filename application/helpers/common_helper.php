<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/* 
	 * This file added to autoload array
	 * No need to load this file again 
	 *
	 * MANAGE LOGIN FUNCTIONS / LOGIN CHECKS / UPDATE AND MANAGE LOGIN ATTEMPTS TABLE DATA
	 * IDENTIFY USER TYPE / ADMIN  / STUDENT / VALID STUDENT
	 */
 
function isLogged(){
	if(!getUserId())
		return false;
	elseif(!background_check())		
		return false;
	else
		return true;
} 

function isAdmin(){
	if(getUserType() == 1)
		return true;
	else
		return false;
}
 
function genderText($no){
	if($no == 0) 
		return 'undefined';
	 elseif($no == 1)
		return 'Male';
	elseif($no == 2)
		return 'Female';
	else
		return 'undefined';
}

function return_message($no){
	$messages=array(
		1=>'invalid username',
		2=>'invalid password',
		3=>'empty username',
		4=>'empty password',
		5=>'Login Success',
		6=>'Admin Login Need',
		7=>'Invalid type detected when creating the product',
		8=>'Login Blocked!!!Try again later',
		9=>'Please Login ! '
	);
	return $messages[$no];
}	
 	
function getUserId() {
 	$CI = & get_instance();
	$CI->load->library('session');
	if ($CI->session) { 
		if($CI->session->userdata('logindata')){
			$user_data = $CI->session->userdata('logindata');
			return $user_data['user_id'];  		
  		}else{

  			$agent=$CI->agent->browser().' '.$CI->agent->version();
  			add_login_attempt(false,'Error logindata session',0,$agent);
  			
  			return false;
  		}

    }else{

    	$agent=$CI->agent->browser().' '.$CI->agent->version();
    	add_login_attempt(false,'Error session',0,$agent);
    	
    	return false;
    }
    	 
}

function getUserType(){
	$CI = & get_instance();
	$CI->load->library('session');
	if ($CI->session) {
		if($CI->session->userdata('logindata')){
			$user_data = $CI->session->userdata('logindata');
			return $user_data['user_type'];
		}else
			return false;
	}else
		return false;	
}

function getAdminId(){
	$CI = & get_instance();
	$CI->load->model('users_model');
  
	$res=$CI->users_model->get(array('user_type'=>1,'active'=>1));
   
	return $res[0]->id;
	
}
 

/* ====================================================================================== */
function background_check(){
	
	$CI = & get_instance(); 
	$CI->load->library('user_agent');
	
	if (!$CI->agent->is_browser())
	{

		$agent = $CI->agent->browser().' '.$CI->agent->version();
		add_login_attempt(false,'invalid browser',0,$agent);
		return false;
	}
	elseif ($CI->agent->is_robot())
	{
		$agent = $CI->agent->robot();
		add_login_attempt(false,'invalid browser',0,$agent);
		return false;
	}
	elseif ( ! $CI->input->valid_ip($CI->input->ip_address()))
	{
		$agent = $CI->agent->browser().' '.$CI->agent->version();
		add_login_attempt(false,'invalid IP address',0,$agent);
		return false;
	}else{
		return true;
	}
	 
}

function is_login_blocked($obj){
	$CI = & get_instance();
	$CI->load->model('login_attempts_model');
 
	$id=$obj->id;
	$res=$CI->login_attempts_model->get(array('user'=>$id,'datetime'=>date("Y-m-d")));
 
	if(sizeof($res) >= login_limit){
		
		$agent = $CI->agent->browser().' '.$CI->agent->version();
		add_login_attempt(false,'login blocked',0,$agent);
		
		return true;//blocked
	}else{
		return false;
	} 
}

function add_login_attempt($user=false,$type=false,$success=0,$agent){
	$CI = & get_instance();
	$CI->load->model('login_attempts_model');
	$CI->load->library('user_agent');
	 
	$ip=$CI->input->ip_address();
	
	$array=array(
  		'user'=>$user,
  		'datetime'=>date("Y-m-d"),
  		'agent'=>$agent,
  		'type'=>$type,
  		'success'=>$success,
  		'ip'=>$ip,
	);
	$res=$CI->login_attempts_model->insert($array);
}
 