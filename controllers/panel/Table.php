<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Table extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_table_model', '', TRUE );
          
    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/table/table_list' );        
    }
    
    function table_list() {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->panel_table_model->countTable();
        $per_page = 40;
        $data['getTable'] = $this->panel_table_model->getTable($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/table/table_list';
        
        	
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );
        
        
        $data['heder_title'] = 'Photo List';
        $this->load->view('panel/table/table_list',$data);        
    }
      function add_table() {      
         if(!empty($_POST))
         {
        
                $array = array(                    
                    'contact_id'         => $this->input->post('contact_id'),
                    'subscribe_id'        => $this->input->post('subscribe_id'),
                    'title'  => $this->input->post('title'),
                   
                );

                $this->db->insert('table',$array);
                $this->session->set_flashdata('SUCCESS', 'Nurse Created Successfully');
                redirect('panel/table/table_list');
            }
            
        $data['contact'] = $this->db->get('contact')->result();

         $data['subscribe'] = $this->db->get('subscribe')->result();

        $data['heder_title'] = 'Add Nurse';
        $this->load->view('panel/table/add_table',$data);        
    }
 function edit_table($id) {   

         if(!empty($_POST))
         {
                
                $array = array(
                     'contact_id'         => $this->input->post('contact_id'),
                    'subscribe_id'        => $this->input->post('subscribe_id'),
                    'title'  => $this->input->post('title'),
                );

           

                $this->db->where('id',$this->input->post('id'));
                $this->db->update('table',$array);
                
                $this->session->set_flashdata('SUCCESS', 'Table Updated Successfully');
                redirect('panel/table/table_list');
         }                   
         
        $table = $this->db->where('id',$id);
        $table = $this->db->get('table')->row();

        $data['contact'] = $this->db->get('contact')->result();
        $data['subscribe'] = $this->db->get('subscribe')->result();
        
        $data['table'] = $table;
        $data['heder_title'] = 'Edit Nurse';
        $this->load->view('panel/table/edit_table',$data);        
    }
    function delete_table($id) {      
        $this->db->where('id',$id);
        $this->db->delete('table');

        $this->session->set_flashdata('SUCCESS', 'Table Deleted Successfully');
        redirect('panel/table/table_list');
    }
    
}


?>