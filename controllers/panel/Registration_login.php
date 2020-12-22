<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Registration_login extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model ( 'panel/panel_registration_login_model', '', TRUE );
    }
    public function index() {
        redirect($this->config->item('panel_folder').'/registration_login/registration_login_list');
    }
    public function registration_login_list()
    {
        $data['heder_title'] = 'Registration Login';
        $this->load->view('panel/registration_login/list', $data);   
    }
    // Function to registration and create  a user passes data to the model
    public function create_member()
    {
        $username = $this->input->post('username');
        $new_member_insert_data = array(
            'username' => $this->input->post('username'),
            'email'    => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        $insert = $this->panel_registration_login_model->AddUser($new_member_insert_data);

        if($insert){
            echo 1;
        }else{
            echo 0;
        }
    }
    // Function to log in, passes input data to the model
    public function login()
    {

        $user     = $this->input->post('name');
        $password = $this->input->post('pass');
        
        $userdata = $this->panel_registration_login_model->AddLogin($user, $password);
        if($userdata){
            echo 1; 
        }else{
            echo "error";   
        }
    }
}

?>