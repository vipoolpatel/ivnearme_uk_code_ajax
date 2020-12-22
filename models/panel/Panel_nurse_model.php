<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Panel_nurse_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	        
        function countNurse() 
        {
            $this->db->from('nurse');
            return $this->db->count_all_results ();

            // Search Box Start
             if($this->input->get('id'))
            {
                $this->db->where( 'id', $this->input->get('id'));
            }
              if($this->input->get('name'))
            {
                $this->db->like( 'name', $this->input->get('name'));
            }
             if($this->input->get('start_date'))
            {
                $this->db->where( 'created_date >=', $this->input->get('start_date'));
            }
            if($this->input->get('end_date'))
            {
                $this->db->where( 'created_date <=', $this->input->get('end_date'));
            }
            // Search Box End
	    }
        
        function getNurse($limit = NULL, $offset = NULL)
        {
            $this->db->select('*');
            $this->db->from('nurse');
            $this->db->limit ( $limit, $offset );

             // Search Box Start
             if($this->input->get('id'))
            {
                $this->db->where( 'id', $this->input->get('id'));
            }
              if($this->input->get('name'))
            {
                $this->db->like( 'name', $this->input->get('name'));
            }
             if($this->input->get('start_date'))
            {
                $this->db->where( 'created_date >=', $this->input->get('start_date'));
            }
            if($this->input->get('end_date'))
            {
                $this->db->where( 'created_date <=', $this->input->get('end_date'));
            }
            // Search Box End

            $this->db->order_by('id','desc');
            $query = $this->db->get ();
            return $query->result ();
	    }
        
}