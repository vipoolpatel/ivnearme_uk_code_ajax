<?php



if (! defined ( 'BASEPATH' ))   exit ( 'No direct script access allowed' );
class Panel_contact_model extends CI_Model {
    function __construct() {
        parent::__construct ();
    }
            
        function countContact() 
        {
            $this->db->from('contact');
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
                $this->db->where( 'Creation_Date >=', $this->input->get('start_date'));
            }
            if($this->input->get('end_date'))
            {
                $this->db->where( 'Creation_Date <=', $this->input->get('end_date'));
            }
            // Search Box End
    }
        
        function getContact($limit = NULL, $offset = NULL)
        {
            $this->db->select('*');
            $this->db->from('contact');
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
                $this->db->where( 'Creation_Date >=', $this->input->get('start_date'));
            }
            if($this->input->get('end_date'))
            {
                $this->db->where( 'Creation_Date <=', $this->input->get('end_date'));
            }
            // Search Box End
            $this->db->order_by('id','desc');
            $query = $this->db->get ();
            return $query->result ();
    }
        
}