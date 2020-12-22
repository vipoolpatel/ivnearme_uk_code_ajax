<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Simpleform extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
          // $this->load->model ( 'panel/panel_simple_form_model', '', TRUE );
    }

    function index() {

        redirect ( $this->config->item ( 'panel_folder' ) . '/simpleform/simple_form_list' );   
    }

    function simple_form_list()
    {
        
        $data['heder_title'] = 'Simple Form List';
        $this->load->view('panel/simple_form/list', $data);   
    }
    function save()
    {
        $this->output->set_content_type('application/json');
        echo json_encode(array('check' => 'check'));
    }

}
?>