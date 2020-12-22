<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Panel_company_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	        
        function countCompany() 
        {
            $this->db->from('company_code');
            return $this->db->count_all_results ();
	}
        
    public function getCompany($limit = NULL, $offset = NULL)
        {
            $this->db->select('*');
            $this->db->from('company_code');
            
            $this->db->limit ( $limit, $offset );
                  
            $this->db->order_by('id','desc');
            $query = $this->db->get ();
            return $query->result ();
	}

    public function save_upload($title,$image){
        $data = array(
                'title' => $title,
                'image' => $image
            );  
        $result= $this->db->insert('img_ajax',$data);
        return $result;
    }
    
        
}