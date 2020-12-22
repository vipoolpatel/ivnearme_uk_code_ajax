<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Person extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
      //  $this->load->model ( 'panel/panel_person_model', '', TRUE );
          
    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/person/person_list' );        
    }
    
    function person_list() {       
        
        // $this->load->library ( 'pagination' );
      
        // $total = $this->panel_page_model->countPage();
        // $per_page = 40;
        // $data['getPage'] = $this->panel_page_model->getPage($per_page, $this->uri->segment ( 4 ));
        // $base_url = base_url ().'/panel/page/page_list';
        
        	
        // $config ['base_url'] = $base_url;
        // $config ['total_rows'] = $total;
        // $config ['per_page'] = $per_page;
        // $config ['uri_segment'] = '4';
        // $this->pagination->initialize ( $config );
        
        
        $data['heder_title'] = 'Person List';
        $this->load->view('panel/person/person_list',$data);        
    }
}