<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'nurse_logged_in' )) {
                redirect ( $this->config->item ( 'nurse_folder' ) . '/login' );
                exit ();
        }        
    }

    function index() {
        if(!empty($_POST))
        {
                if(!empty($this->input->post('password')))
                {
                    $password =  password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                    $array_p = array(
                        'password'     => $password,
                    );

                    $update_p = $this->db->where('id',$this->session->userdata ( 'nurse_id' ));
                    $update_p = $this->db->update('nurse',$array_p);
                }
                
                $array = array(
                    'name'         => $this->input->post('name'),
                    'phone'        => $this->input->post('phone'),
                );

                $this->db->where('id',$this->session->userdata ( 'nurse_id' ));
                $this->db->update('nurse',$array);
                
                $this->session->set_flashdata('SUCCESS', 'Profile Successfully Updated');
                redirect('nurse/profile');
         }                   
         
         
        
        $nurse = $this->db->where( 'id', $this->session->userdata ( 'nurse_id' ));
        $nurse = $this->db->get('nurse')->row();
        $data['nurse'] = $nurse;
        $data['heder_title'] = 'Edit Profile';
        $this->load->view('nurse/profile/profile',$data);      
    }
    
  
    
    
}
