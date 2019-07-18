<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'controllers/MainController.php');

/**
 * AUTHOR - HASHAN KULASINGHE 
 * 0771 963 965
 */
class ProductCreate extends MainController {

	public function __construct(){
		parent::__construct();

		//only logged user can access this page
		if(isLogged() != true || isAdmin() != true){
			$this->session->set_flashdata('error', return_message(6));
			redirect(base_url('login'));
			die();
		}

		//load necessary models and classes
		$this->load->helper('security');
		$this->load->helper('product_price_helper');
		$this->load->library('form_validation');
		$this->load->helper('string');
		$this->load->model('brand_model');
		$this->load->model('country_model');
		$this->load->model('product_model');
		$this->load->model('product_cloth_model');
		$this->load->model('product_giftcard_model');
		$this->load->model('product_perfume_model');
       
	}

	//main method which handles all the product create page requests
	public function create(){
		
		
		$type = $this->input->get('type');

		//identify the requested product type
		switch ($type) {
		    case 'cloth':
		        $main_view = 'products/create/cloth';
		        break;
		    case 'giftcard':
		        $main_view = 'products/create/giftcard';
		        break;
		    case 'perfume':
		        $main_view = 'products/create/perfume';
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

	//controlls all the product save form submissions 
	public function store(){
 
		$data['panel']='';
		
		
		$type = $this->input->post('type');
 		
 		//identify and call the required method
		switch ($type) {
		    case 'cloth':
		       $this->storeClothProduct();
		        break;
		    case 'giftcard':
		       $this->storeGiftCardProduct();
		        break;
		    case 'perfume':
		       $this->storePerfumeProduct();
		        break; 
		    default:
				$this->session->set_flashdata('error', return_message(7));
				redirect(base_url('products-create'));
				die();
		}

	}


	//store perfume product
	private function storePerfumeProduct(){

		$this->validations_for_create_perfume_product();//DO VALIDATIONS
	
		$post_data=$this->input->post();//POST DATA

		//other validations 
		$post_data['brand_name'] = $this->getProductBrandName($post_data['brand']);
	
		if(empty($post_data['brand_name'])){ 
			$this->session->set_flashdata('error','Invalid brand type.Plese try again');
			redirect(base_url('products-create'));
		}

		$post_data['country_code'] = $this->getProductCountryCode($post_data['brand']);
	
		if(empty($post_data['country_code'])){ 
			$this->session->set_flashdata('error','Invalid country type.Plese try again');
			redirect(base_url('products-create'));
		}
 
		$post_data['selling_price'] = get_product_price($post_data);
	
  		//PRODUCT TABLE ARRAY
		$main_product_arr=array(
				'product_name'=>$post_data['name'],
				'product_type'=>3,
				'product_code'=>$post_data['code'],
				'product_short_description'=>$post_data['short_description'],
				'product_cost'=>$post_data['cost'],
				'product_selling_price'=>$post_data['selling_price'],
				'product_brand_id'=>$post_data['brand'],
				'created_at'=>date("Y-m-d H:i:s"),
		);
		
		$main_product_id = $this->insert_product($main_product_arr);

		if(!$main_product_id){//INSERT Product
			$this->session->set_flashdata('error','Something went wrong.Plese try again');
			redirect(base_url('products-create'));
			
		}
		 
		$perfume_product_arr=array(//Cloth Product ARRAY
				'product_id'=>$main_product_id,
				'origin_country_id'=>$post_data['country']
		);
		
		$res_perfume_prod=$this->insert_perfume_product($perfume_product_arr);//INSERT perfume Product RETURN
	
		if(!$res_perfume_prod){
			$this->session->set_flashdata('error','Something went wrong.Plese try again');
			redirect(base_url('products-create'));
			
		}


	 	$this->session->set_flashdata('success','successfully created the product');
		redirect(base_url('products/list/3'));
	 	 
	}
	

	//store giftcard product
	private function storeGiftCardProduct(){

		$this->validations_for_create_giftcard_product();//DO VALIDATIONS
	
		$post_data=$this->input->post();//POST DATA

		//other validations 
		$post_data['brand_name'] = $this->getProductBrandName($post_data['brand']);
	
		if(empty($post_data['brand_name'])){ 
			$this->session->set_flashdata('error','Invalid brand type.Plese try again');
			redirect(base_url('products-create'));
		}
 
		$post_data['selling_price'] = get_product_price($post_data);
	
  		//PRODUCT TABLE ARRAY
		$main_product_arr=array(
				'product_name'=>$post_data['name'],
				'product_type'=>2,
				'product_code'=>$post_data['code'],
				'product_short_description'=>$post_data['short_description'],
				'product_cost'=>$post_data['cost'],
				'product_selling_price'=>$post_data['selling_price'],
				'product_brand_id'=>$post_data['brand'],
				'created_at'=>date("Y-m-d H:i:s"),
		);
		
		$main_product_id = $this->insert_product($main_product_arr);

		if(!$main_product_id){//INSERT Product
			$this->session->set_flashdata('error','Something went wrong.Plese try again');
			redirect(base_url('products-create'));
			
		}
		 
		$giftcard_product_arr=array(//Cloth Product ARRAY
				'product_id'=>$main_product_id,
				'amount'=>$post_data['amount'],
				'expire_date'=>$post_data['expiry_date']
		);
		
		$res_card_prod=$this->insert_card_product($giftcard_product_arr);//INSERT card Product RETURN
	
		if(!$res_card_prod){
			$this->session->set_flashdata('error','Something went wrong.Plese try again');
			redirect(base_url('products-create'));
			
		}


	 	$this->session->set_flashdata('success','successfully created the product');
		redirect(base_url('products/list/2'));
	 	 
	}
 	
 	//store cloth product
	private function storeClothProduct(){

		$this->validations_for_create_cloth_product();//DO VALIDATIONS
		
		$post_data=$this->input->post();//POST DATA

		//other validations 
		$post_data['brand_name'] = $this->getProductBrandName($post_data['brand']);
	
		if(empty($post_data['brand_name'])){ 
			$this->session->set_flashdata('error','Invalid brand type.Plese try again');
			redirect(base_url('products-create'));
		}
 
		$post_data['selling_price'] = get_product_price($post_data);
	
  		//PRODUCT TABLE ARRAY
		$main_product_arr=array(
				'product_name'=>$post_data['name'],
				'product_type'=>1,
				'product_code'=>$post_data['code'],
				'product_short_description'=>$post_data['short_description'],
				'product_cost'=>$post_data['cost'],
				'product_selling_price'=>$post_data['selling_price'],
				'product_brand_id'=>$post_data['brand'],
				'created_at'=>date("Y-m-d H:i:s"),
		);
		
		$main_product_id = $this->insert_product($main_product_arr);

		if(!$main_product_id){//INSERT USER
			$this->session->set_flashdata('error','Something went wrong.Plese try again');
			redirect(base_url('products-create'));
			
		}
			 
		$cloth_product_arr=array(//Cloth Product ARRAY
				'product_id'=>$main_product_id,
				'color_id'=>$post_data['color'],
				'size_id'=>$post_data['size']
		);
		
		$res_cloth_prod=$this->insert_cloth_product($cloth_product_arr);//INSERT Cloth Product RETURN
	
		if(!$res_cloth_prod){
			$this->session->set_flashdata('error','Something went wrong.Plese try again');
			redirect(base_url('products-create'));
			
		}


	 	$this->session->set_flashdata('success','successfully created the product');
		redirect(base_url('products/list/1'));
	 	 
	}

	/* HELPERS */


	//validations for perfume product
	private function validations_for_create_perfume_product(){
		 
		$this->form_validation->set_rules('name', 'Product Name', 'required|trim|xss_clean|min_length[1]|max_length[45]');
		$this->form_validation->set_rules('type', 'Product Type', 'required|trim|xss_clean|in_list[perfume]');
		$this->form_validation->set_rules('code', 'Product Code', 'required|trim|xss_clean|is_unique[products.product_code]|min_length[1]|max_length[45]');
		$this->form_validation->set_rules('cost', 'Product Cost', 'required|trim|xss_clean|numeric|min_length[1]'); 
		$this->form_validation->set_rules('brand', 'Product Brand','required|trim|xss_clean|numeric');
		$this->form_validation->set_rules('country', 'Product Origin Country', 'required|trim|xss_clean|numeric'); 
		$this->form_validation->set_rules('short_description', 'Product Short Description', 'trim|xss_clean|max_length[1000]');
		
		if ($this->form_validation->run() == FALSE) {
		
			$this->session->set_flashdata('error',validation_errors());
			if ($this->agent->is_referral())
			{
			    echo $this->agent->referrer();
			}
			redirect(base_url('products-create?type='.$this->input->post('type')));
		} 
		
	}
 
 	//validations for giftcard product
	private function validations_for_create_giftcard_product(){
		 
		$this->form_validation->set_rules('name', 'Product Name', 'required|trim|xss_clean|min_length[1]|max_length[45]');
		$this->form_validation->set_rules('type', 'Product Type', 'required|trim|xss_clean|in_list[giftcard]');
		$this->form_validation->set_rules('code', 'Product Code', 'required|trim|xss_clean|is_unique[products.product_code]|min_length[1]|max_length[45]');
		$this->form_validation->set_rules('cost', 'Product Cost', 'required|trim|xss_clean|numeric|min_length[1]'); 
		$this->form_validation->set_rules('brand', 'Product Brand','required|trim|xss_clean|numeric');
		$this->form_validation->set_rules('amount', 'Product Amount', 'required|trim|xss_clean|numeric');
		$this->form_validation->set_rules('expiry_date', 'Product Expiry date', 'trim|xss_clean'); 
		$this->form_validation->set_rules('short_description', 'Product Short Description', 'trim|xss_clean|max_length[1000]');
		
		if ($this->form_validation->run() == FALSE) {
		
			$this->session->set_flashdata('error',validation_errors());
			if ($this->agent->is_referral())
			{
			    echo $this->agent->referrer();
			}
			redirect(base_url('products-create?type='.$this->input->post('type')));
		} 
		
	}

	//validations for cloth product
	private function validations_for_create_cloth_product(){
		 
		$this->form_validation->set_rules('name', 'Product Name', 'required|trim|xss_clean|min_length[1]|max_length[45]');
		$this->form_validation->set_rules('type', 'Product Type', 'required|trim|xss_clean|in_list[cloth]');
		$this->form_validation->set_rules('code', 'Product Code', 'required|trim|xss_clean|is_unique[products.product_code]|min_length[1]|max_length[45]');
		$this->form_validation->set_rules('cost', 'Product Cost', 'required|trim|xss_clean|numeric|min_length[1]'); 
		$this->form_validation->set_rules('brand', 'Product Brand','required|trim|xss_clean|numeric');
		$this->form_validation->set_rules('color', 'Product Color', 'required|trim|xss_clean|numeric');
		$this->form_validation->set_rules('size', 'Product Size', 'required|trim|xss_clean|numeric'); 
		$this->form_validation->set_rules('short_description', 'Product Short Description', 'trim|xss_clean|max_length[1000]');
		
		if ($this->form_validation->run() == FALSE) {
		 
			$this->session->set_flashdata('error',validation_errors());
			if ($this->agent->is_referral())
			{
			    echo $this->agent->referrer();
			}
			redirect(base_url('products-create?type='.$this->input->post('type')));
		} 
		
	}


	//funciton to get brand name
	private function getProductBrandName($id){
		$result = $this->brand_model->getBrandNameById($id);
		return @$result->brand_name;
	}

	//function to get country code
	private function getProductCountryCode($id){
		$result = $this->country_model->getCountryCodeById($id);
		return @$result->country_code;
	}

	// insert a product row
	private function insert_product($data){
		return $this->product_model->insert($data);  
	}

	//insert cloth product
	private function insert_cloth_product($data){
	
		return $this->product_cloth_model->insert($data);  
	
	}  

	//insert gift card product
	private function insert_card_product($data){
	
		return $this->product_giftcard_model->insert($data);  
	
	}  

	//insert perfume product
	private function insert_perfume_product($data){
		return $this->product_perfume_model->insert($data);  
	}
	

}
