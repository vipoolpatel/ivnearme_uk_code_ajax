<?php



if (! defined ( 'BASEPATH' ))   exit ( 'No direct script access allowed' );
class Panel_support_model extends CI_Model {
    function __construct() {
        parent::__construct ();
    }
            
        function countSupport() 
        {
            $this->db->from('support');
            return $this->db->count_all_results ();
           
    }
        
        function getSupport($limit = NULL, $offset = NULL)
        {
            $this->db->select('support.*,nurse.name');
            $this->db->from('support');
            $this->db->join('nurse','nurse.id = support.user_id');
            $this->db->limit ( $limit, $offset );

            if($this->input->get('id'))
            {
                $this->db->where('status',1);
            }
            else
            {
                $this->db->where('status',0);
            }
            
            $this->db->order_by('support.id','desc');
            $query = $this->db->get ();
            return $query->result ();
    }
        
}