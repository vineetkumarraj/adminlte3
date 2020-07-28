<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @desc 	: Base Controller
 * @author 	: Vineet Kumar
 * @version : 1.0.0
 * @since 	: 27 July 2020
 */
class MY_Model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	function _insert($table, array $data) {
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	function _sum($table, $field) {
		$this->db->select_sum($field);
		$query = $this->db->get($table);
		return $query->row()->$field;
	}

	function _sum_where($table, $field, $where = array()) {
		$this->db->select_sum($field);
		if (!empty($where)) {
			$this->db->where($where);
		}
		$query = $this->db->get($table);
		return $query->row()->$field;
	}

	function _count($table) {
		return $this->db->count_all_results($table);
	}

	function _count_where($table, $where = array()) {
		if (!empty($where)) {
			$this->db->where($where);
		}
		return $this->db->count_all_results($table);
	}

	function _update_where($table, array $data, array $where) {
		$this->db->where($where)->update($table, $data);
		return $this->db->affected_rows();
	}

	function _get_row_where($table, $where) {
		$query = $this->db->where($where)->get($table);
		return $query->row();
	}

	function _get_result_where($table, $where) {
		$query = $this->db->where($where)->get($table);
		return $query->result();
	}
} 