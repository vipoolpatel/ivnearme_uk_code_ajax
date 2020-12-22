<?php



if (! defined ( 'BASEPATH' ))   exit ( 'No direct script access allowed' );
class Panel_page_model extends CI_Model {
    function __construct() {
        parent::__construct ();
    }
            
        function countPage() 
        {
            $this->db->from('page');
            return $this->db->count_all_results ();
              
    }
        
        function getPage($limit = NULL, $offset = NULL)
        {
            $this->db->select('*');
            $this->db->from('page');
            $this->db->limit ( $limit, $offset );
             
            $this->db->order_by('id','desc');
            $query = $this->db->get ();
            return $query->result ();
    }
        
}