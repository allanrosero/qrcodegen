<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function select($data){
		$this->db->select($data['select']);
		$this->db->from($data['table']);
		if (!empty($data['condition'])) {
			$this->db->where($data['condition']);
		}
		if (!empty($data['limit'])) {
			$offset = 0;
			if (!empty($data['offset'])) {
				$offset = $data['offset'];
			}
			$this->db->limit($data['limit'],$offset);
		}

		if (!empty($data['order'])) {
			$this->db->order_by($data['order']['col'],$data['order']['order_by']);
		}
		$query = $this->db->get();
		if ($query->num_rows()) {

			if ($data['type']=="row") {
				return $query->row();
			}elseif($data['type']=="count_row"){
				return $query->num_rows();
			}else{
				return $query->result();
			}

		}
		return null;

	}

	public function insert($table,$data,$type = ""){
		$data = 	$this->db->insert($table,$data);
		if ($type = "getid") {
			$data = $this->db->insert_id();
		}
		return $data;
	}

	public function insert_batch($table,$data,$type = ""){
		return $this->db->insert_batch($table, $data);
	}

	public function update($table,$data,$condition){
		$this->db->where($condition);
		return $this->db->update($table, $data);
	}

	public function delete($table,$condition){
		$this->db->where($condition);
		return $this->db->delete($table);
	}
}

/* End of file  */
/* Location: ./application/models/ */