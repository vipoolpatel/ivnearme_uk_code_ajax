<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
    }

    function index() {
        $data['heder_title'] = 'Dashboard';
        $this->load->view('panel/dashboard/dashboard',$data);
    }
    
}
