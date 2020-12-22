<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Panel_modal_form_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	        
    function countModal() 
    {
        $this->db->from('modal_form_table');
        return $this->db->count_all_results ();
        

    }
    
    function getForm($limit = NULL, $offset = NULL)
    {
        $this->db->select('*');
        $this->db->from('modal_form_table');
        $this->db->limit ( $limit, $offset );
          // Search Box Start
        
            // Search Box End

        $this->db->order_by('id','desc');
        $query = $this->db->get ();
        return $query->result ();
    }

    

   function order_summary_insert() {
        $data = array(
           'first_name'   => $this->input->post('first_name'),
           'last_name'    => $this->input->post('last_name'),
           'created_date' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('modal_form_table', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function order_edit_update() {
       $data = array(
           'first_name'   => $this->input->post('first_name'),
           'last_name'    => $this->input->post('last_name'),
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('modal_form_table', $data);
        return true;
    }

    function view_data_form($id) {

        $this->db->select('*');
        $this->db->from('modal_form_table');

       
        $this->db->where('modal_form_table.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    
     function delete_row_form_modal($id) {
       
       $this->db->where('id', $id);
       $this->db->delete('modal_form_table');
    }


}