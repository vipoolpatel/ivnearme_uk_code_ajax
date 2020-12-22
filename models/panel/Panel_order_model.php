<?php



if (! defined ( 'BASEPATH' ))   exit ( 'No direct script access allowed' );
class Panel_order_model extends CI_Model {
    function __construct() {
        parent::__construct ();
    }
            
        function countOrder($status) 
        {
            $this->db->select('order.*,patient.name');
            $this->db->from('order');
            $this->db->join('patient', 'patient.id = order.user_id');
            $this->db->where( 'order.status', $status);
            $this->db->where( 'order.payment_status', 1);
              // Search Box Join Query Start
            if($this->input->get('id'))
            {
                $this->db->where( 'order.id', $this->input->get('id'));
            }
            if($this->input->get('name'))
            {
                $this->db->like( 'patient.name', $this->input->get('name'));
            }
            if($this->input->get('start_date'))
            {
                $this->db->where( 'order.created_date >=', $this->input->get('start_date'));
            }
            if($this->input->get('end_date'))
            {
                $this->db->where( 'order.created_date <=', $this->input->get('end_date'));
            }
            // Search Box Join Query End

            return $this->db->count_all_results ();
        }
        
        function getOrder($limit = NULL, $offset = NULL,$status)
        {
            $this->db->select('order.*,patient.name');
            $this->db->from('order');
            $this->db->join('patient', 'patient.id = order.user_id');
            $this->db->where( 'order.status', $status);
            $this->db->where( 'order.payment_status', 1);
            $this->db->limit ( $limit, $offset );
            // Search Box Join Query Start

            if($this->input->get('id'))
            {
                $this->db->where( 'order.id', $this->input->get('id'));
            }
            if($this->input->get('name'))
            {
                $this->db->like( 'patient.name', $this->input->get('name'));
            }
            if($this->input->get('start_date'))
            {
                $this->db->where( 'order.created_date >=', $this->input->get('start_date'));
            }
            if($this->input->get('end_date'))
            {
                $this->db->where( 'order.created_date <=', $this->input->get('end_date'));
            }

            // Search Box Join Query End
            
            $this->db->order_by('order.id','desc');
            $query = $this->db->get ();
            return $query->result ();
        }
        
        
        function getNurse(){
            $this->db->select('*');
            $this->db->from('nurse');
            $this->db->where( 'user_status', 1);
            $query = $this->db->get ();
            return $query->result ();
        }
        
}