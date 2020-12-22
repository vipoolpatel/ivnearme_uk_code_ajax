<?php
if (! defined ( 'BASEPATH' ))   exit ( 'No direct script access allowed' );
class Panel_product_model extends CI_Model {
    function __construct() {
        parent::__construct ();
    }
            
        function countProduct() 
        {
            $this->db->from('product');
            return $this->db->count_all_results ();
                  // Search Box Start
             if($this->input->get('id'))
            {
                $this->db->where( 'id', $this->input->get('id'));
            }
              if($this->input->get('title'))
            {
                $this->db->like( 'title', $this->input->get('title'));
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
        
        function getProduct($limit = NULL, $offset = NULL)
        {
            $this->db->select('*');
            $this->db->from('product');
            $this->db->limit ( $limit, $offset );

             // Search Box Start
             if($this->input->get('id'))
            {
                $this->db->where( 'id', $this->input->get('id'));
            }
              if($this->input->get('title'))
            {
                $this->db->like( 'title', $this->input->get('title'));
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