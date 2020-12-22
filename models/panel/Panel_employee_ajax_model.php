
<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Panel_employee_ajax_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}


	public function getAllEmployee()
	{
		$this->db->order_by('created_at', 'desc');
		$q =$this->db->get('tbl_employees');
		if($q->num_rows() > 0) {
			return $q->result();
		}else{
			return false;
		}
	}
	public function insertEmployee()
	{
		$field = array(
			'employee_name' => $this->input->post('txtEmployeeName'),
			'address' => $this->input->post('txtAddress'),
			'created_at' => date('Y-m-d H:i:s')
		);
		$this->db->insert('tbl_employees', $field);
		if($this->db->affected_rows() > 0){
			return true;
		} else{
			return false;
		}
	}

	public function editEmployee()
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$q = $this->db->get('tbl_employees');
		if($q->num_rows() > 0){
			return $q->row();
		}else{
			return false;
		}
	}

	public function updateEmployee()
	{
		$id = $this->input->post('txtId');
		$field = array(
			'employee_name' => $this->input->post('txtEmployeeName'),
			'address'=> $this->input->post('txtAddress'),
			'updated_at' => date('Y-m-d H:i:s') 
		);
		$this->db->where('id', $id);
		$this->db->update('tbl_employees', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}

	}

	public function deleteEmployee()
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('tbl_employees');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}



}
?>