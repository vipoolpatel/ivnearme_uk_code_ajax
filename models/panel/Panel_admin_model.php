<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Panel_admin_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	        
        function countAdmin() 
        {
            $this->db->from('user_accounts');
            return $this->db->count_all_results ();
                     // Search Box Start
             if($this->input->get('id'))
            {
                $this->db->where( 'user_id', $this->input->get('id'));
            }
              if($this->input->get('name'))
            {
                $this->db->like( 'account_name', $this->input->get('name'));
            }
             if($this->input->get('start_date'))
            {
                $this->db->where( 'registered >=', $this->input->get('start_date'));
            }
            if($this->input->get('end_date'))
            {
                $this->db->where( 'registered <=', $this->input->get('end_date'));
            }
            // Search Box End
	}
        
        function getAdmin($limit = NULL, $offset = NULL)
        {
            $this->db->select('*');
            $this->db->from('user_accounts');
            $this->db->limit ( $limit, $offset );
                  // Search Box Start
             if($this->input->get('id'))
            {
                $this->db->where( 'user_id', $this->input->get('id'));
            }
              if($this->input->get('name'))
            {
                $this->db->like( 'account_name', $this->input->get('name'));
            }
             if($this->input->get('start_date'))
            {
                $this->db->where( 'registered >=', $this->input->get('start_date'));
            }
            if($this->input->get('end_date'))
            {
                $this->db->where( 'registered <=', $this->input->get('end_date'));
            }
            // Search Box End
            $this->db->order_by('user_id','desc');
            $query = $this->db->get ();
            return $query->result ();
	}
        
}