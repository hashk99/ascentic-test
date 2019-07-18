<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class country_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
		$this->table='countries';
	} 
	  
	 
	public function getCountryCodeById($id){
		$this->db->select('country_code');
		$this->db->from($this->table); 
		$this->db->where('country_id', $id);
		return $this->db->get()->row();
	}
}