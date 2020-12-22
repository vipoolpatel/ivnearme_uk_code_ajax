<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Appointment extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_appointment_model', '', TRUE );
          
    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/appointment/appointment_list' );        
    }
    
    function appointment_list() {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->panel_appointment_model->countappointment();
        $per_page = 40;
        $data['getAppointment'] = $this->panel_appointment_model->getAppointment($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/appointment/appointment_list';
        
        	
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );
        
        
        $data['heder_title'] = 'Appointment List';
        $this->load->view('panel/appointment/appointment_list',$data);        
    }
    
    
    function delete_appointment($id) {      
        $this->db->where('id',$id);
        $this->db->delete('appointment');

        $this->session->set_flashdata('SUCCESS', 'Appointment Deleted Successfully');
        redirect('panel/appointment/appointment_list');
    }

    function add_appointment(){

        

        $this->load->view('panel/appointment/add_appointment');
    }
    
}
