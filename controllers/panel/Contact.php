<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_contact_model', '', TRUE );
          
    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/contact/contact_list' );        
    }
    
    function contact_list() {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->panel_contact_model->countcontact();
        $per_page = 40;
        $data['getContact'] = $this->panel_contact_model->getcontact($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/contact/contact_list';
        
        	
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );
        
        
        $data['heder_title'] = 'Contact List';
        $this->load->view('panel/contact/contact_list',$data);        
    }
    
    
    function delete_contact($id) {      
        $this->db->where('id',$id);
        $this->db->delete('contact');

        $this->session->set_flashdata('SUCCESS', 'Contact Deleted Successfully');
        redirect('panel/contact/contact_list');
    }
    
}
