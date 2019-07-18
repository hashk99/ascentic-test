<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class brand_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
		$this->table='brands';
	} 
	  
	 
	public function getBrandNameById($id){
		$this->db->select('brand_name');
		$this->db->from($this->table); 
		$this->db->where('brand_id', $id);
		return $this->db->get()->row();
	}
}