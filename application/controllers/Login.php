<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * AUTHOR - HASHAN KULASINGHE 
 * 0771 963 965
 */
class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('security');
		$this->load->library('form_validation');
	}

	//keep username and password attrs
	private $username;
	private $password; 
	
	//show login page
	public function index()
	{	
		if(isLogged() == true){
			if(isAdmin() == true){
				redirect(base_url('admin'));
			}else{
				redirect(base_url('404'));
			}
		}	
		$common=array();
		
	 	$this->load->view(publicViewPath.'common/header',$common); 
		$this->load->view(publicViewPath.'login');
	  	$this->load->view(publicViewPath.'common/footer',$common);
	}
	
	//check login credentials
	public function check(){
		
		if(isLogged() == true){
			if(isAdmin() == true){
				redirect(base_url('admin'));
			}else{
				redirect(base_url('404'));
			}
		}			 
		 
		$this->do_validations(); 
		
		$this->set_username(); //SET USERNAME
		$this->set_password(); //SET PASSWORD
	 
		$result=$this->get_user_by_username();
		 
		if(!$result){
			
			$agent=$this->agent->browser().' '.$this->agent->version();
			add_login_attempt(false,'Error username',0,$agent);
			
			$this->return_error(1);//ERROR USERNAME
			
		}
		  
		$password=do_hash($this->password, 'md5'); // MD5
		
		if(is_login_blocked($result)){

			$this->return_error(8);//BLOCKED
		}
	 
		$this->create_login_sessions($result);
  
		if($password == $result->password){
			
			$this-> return_home(); //MATCHING PASSWORD
			
		}else{
			 
			$agent=$this->agent->browser().' '.$this->agent->version();
			add_login_attempt($result->id,'Error password',0,$agent);
			
			$this->return_error(2);//ERROR PASSWORD
		}
		 
	}
	
	//logout of the system
	public function out(){
		$this->delete_login_session();
		redirect(base_url('login'));
	}
	
	//private function to return home
	private function return_home(){
		if(getUserType()== 1){
			redirect(base_url('admin'));
		}else{
			
			echo 'system error - invalid user type detected'.getUserType();
			die();
		}
	}

	//create login sessions - private function
	private function create_login_sessions($result){
		//SET SESSION DATA
		$sess['email'] = $result->primary_email;
		$sess['user_id'] = $result->id;
		$sess['username'] = $result->username;
		$sess['user_type'] = $result->user_type;
		
		$this->session->set_userdata('logindata', $sess);
		
	}

	//delete the login session
	private function delete_login_session(){
		$this->session->unset_userdata('logindata');
	}
	
	//set username attr
	private function set_username(){
		$this->username=$this->input->post('username');
	}
	
	//set password attr
	private function set_password(){
		$this->password=$this->input->post('password');
	}
	
	//get user by username
	private function get_user_by_username(){
  
		
		$array=array('username'=>$this->username,'active'=>1);
		$result=$this->users_model->get($array);
		
		if(!empty($result)){//SUCCESS USERNAME
			return $result[0];
		}else{
			
			$agent=$this->agent->browser().' '.$this->agent->version();
			add_login_attempt(false,'Error username',0,$agent);
			
			$this->return_error(1);//ERROR USERNAME
		}
	}
	
	//return success if everything went well
	private function return_success($no){
		$this->session->set_flashdata('success', return_message($no)); 
		redirect(base_url('login'));
	}
	
	//do the main validations
	private function do_validations(){
		$this->form_validation->set_error_delimiters('<p class="form_error">', '</p>');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{ 

			$agent=$this->agent->browser().' '.$this->agent->version();
			add_login_attempt($this->username,'validation errors',0,$agent);
			
			$this->session->set_flashdata('error',validation_errors()); 
			redirect(base_url('login'));
		}
		else
		{
			return true;
		}  
	}
	
	//return error in a common way
	private function return_error($no){
		$this->delete_login_session();
		$this->session->set_flashdata('error', return_message($no)); 
		redirect(base_url('login'));
	}
	
}
