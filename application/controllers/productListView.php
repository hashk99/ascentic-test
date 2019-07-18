<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'controllers/MainController.php');

/**
 * AUTHOR - HASHAN KULASINGHE 
 * 0771 963 965
 */
class ProductListView extends MainController {

	public function __construct(){
		parent::__construct();

		if(isLogged() != true || isAdmin() != true){
			$this->session->set_flashdata('error', return_message(6));
			redirect(base_url('login'));
			die();
		}
 
		$this->load->helper('string'); 
		$this->load->model('product_cloth_view_model');
		$this->load->model('product_giftcard_view_model');
		$this->load->model('product_perfume_view_model');
     
	} 

	//main page controller method. will identify each type and show the relevant page
	public function index($inc_type){
		
		$type = (int) $inc_type;
		switch ($type) {
		    case 1:
		    	$data['products'] = $this->product_cloth_view_model->get_all_for_dashboard();
		        $main_view = 'products/view/cloth';
		        break;
		    case 2:
		    	$data['products'] = $this->product_giftcard_view_model->get_all_for_dashboard();
		        $main_view = 'products/view/giftcard';
		        break;
		    case 3:
		    	$data['products'] = $this->product_perfume_view_model->get_all_for_dashboard();
		        $main_view = 'products/view/perfume';
		        break; 
		    default:
				$this->session->set_flashdata('error', return_message(7));
				redirect(base_url('admin'));
				die();
		}

		$data['panel']='';
		 
		$this->load->view(publicViewPath.'common/header',$data);
		$this->load->view(publicViewPath.$main_view,$data);
		$this->load->view(publicViewPath.'common/footer',$data);
	}
 
}
