<?php

if (! defined ( 'BASEPATH' ))   exit ( 'No direct script access allowed' );
class Panel_table_model extends CI_Model{


	function __construct() {
        parent::__construct ();
	}

	function CountTable()
	{
		$this->db->from('table');
		return $this->db->count_all_results ();
	}

	function getTable($limit = NULL, $offset = NULL)
	{
		$this->db->select('table.*,contact.name,subscribe.email');
		$this->db->from('table');
		$this->db->join('contact','contact.id = table.contact_id');
		$this->db->join('subscribe','subscribe.id = table.subscribe_id');
		$this->db->limit ($limit,$offset);

		$this->db->order_by('table.id','desc');
		$query = $this->db->get ();
		return $query->result();
	}
} 

?>