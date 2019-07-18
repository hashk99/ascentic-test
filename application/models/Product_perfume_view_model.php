<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_perfume_view_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
		$this->table='product_perfumes_view';
	} 
	  
	 
	public function get_all_for_dashboard(){
		$this->db->select('*');
		$this->db->from($this->table); 
		$this->db->where('deleted_at', NULL);
		return $this->db->get()->result();
	}
	
}