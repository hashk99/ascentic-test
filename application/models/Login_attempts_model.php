<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_attempts_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
		$this->table='login_attempts';
	} 
	  
	public function insert($data){ 
		$this->db->insert($this->table,$data);
		return $this->db->insert_id(); 
	}
	public function update($data,$id){  
		$this->db->where('id', $id); 		
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
	}	
 
	public function get($array){
		$this->db->select('*');
		$this->db->from($this->table); 
		$this->db->where($array);
		return $this->db->get()->result();
	}
}