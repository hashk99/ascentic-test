<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * AUTHOR - HASHAN KULASINGHE
 * 0771 963 965
 */
class AdminHome extends CI_Controller {

	//controlls the main dashboard page
	public function index()
	{
		if(isLogged() != true || isAdmin() != true){
			$this->session->set_flashdata('error', return_message(6));
			redirect(base_url('login'));
			die();
		}
		
		$data['panel']='';
		
		$this->load->view(publicViewPath.'common/header',$data);
		$this->load->view(publicViewPath.'/home',$data);
		$this->load->view(publicViewPath.'common/footer',$data);
	}
	
}
