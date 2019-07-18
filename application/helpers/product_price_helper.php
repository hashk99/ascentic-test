<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//some functions to have a common response structure
 
if ( ! function_exists('get_product_price'))
{
    function get_product_price($data)
    {
         switch ($data['type']) {
		    case 'cloth':
		        $price = get_cloth_selling_price($data);
		        break;
		    case 'giftcard':    
		        $price = get_giftcard_selling_price($data);
		        break;
		    case 'perfume':
		        $price = get_perfume_selling_price($data);
		        break; 
		    default:

				$this->session->set_flashdata('error', return_message(7));
				redirect(base_url('admin'));
				die();
		}

		return $price;
    }   
}

if ( ! function_exists('get_cloth_selling_price'))
{

	function get_cloth_selling_price($data){
		if($data['brand_name'] == 'abc'){
			return (int) $data['cost'] + (15*$data['cost']/100);
		}else if($data['brand_name'] == 'xyz'){
			return (int) $data['cost'] + (15*$data['cost']/100) + 100;
		}else{
			return (int) $data['cost'] + (10*$data['cost']/100);
		} 
	}

}

if ( ! function_exists('get_giftcard_selling_price'))
{

	function get_giftcard_selling_price($data){
		return (int) $data['cost'];
	}

}

if ( ! function_exists('get_perfume_selling_price'))
{

	function get_perfume_selling_price($data){
		if($data['country_code'] == 'AU'){
			return (int) $data['cost'] * 2;
		}else if($data['country_code'] == 'NZ'){
			return (int) $data['cost'] + (15*$data['cost']/100) + 500;
		}else{
			return (int) $data['cost'] + 1000;
		} 
	}
}
