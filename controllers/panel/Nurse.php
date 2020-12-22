<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nurse extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_nurse_model', '', TRUE );
          
    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/nurse/nurse_list' );        
    }
    
    function nurse_list() {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->panel_nurse_model->countNurse();
        $per_page = 40;
        $data['getNurse'] = $this->panel_nurse_model->getNurse($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/nurse/nurse_list';
        
        	
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );
        
        
        $data['heder_title'] = 'Nurse List';
        $this->load->view('panel/nurse/nurse_list',$data);        
    }
    
    
    function add_nurse() {      
         if(!empty($_POST))
         {
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[nurse.email]');
            if ($this->form_validation->run() == TRUE)
            {
                $password =  password_hash('123456',PASSWORD_DEFAULT);
                $array = array(
                    'name'         => $this->input->post('name'),
                    'email'        => $this->input->post('email'),
                    'phone'        => $this->input->post('phone'),
                    'user_status'  => $this->input->post('user_status'),
                    'password'     => $password,
                    'created_date' => date('Y-m-d H:i:s'),
                );

                $this->db->insert('nurse',$array);
                $this->session->set_flashdata('SUCCESS', 'Nurse Created Successfully');
                redirect('panel/nurse/nurse_list');
            }
         }                   
        $data['heder_title'] = 'Add Nurse';
        $this->load->view('panel/nurse/add_nurse',$data);        
    }
    
    function edit_nurse($id) {      
         if(!empty($_POST))
         {
                if(!empty($this->input->post('password')))
                {
                    $password =  password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                    $array_p = array(
                        'password'     => $password,
                    );

                    $update_p = $this->db->where('id',$this->input->post('id'));
                    $update_p = $this->db->update('nurse',$array_p);
                }
                
                $array = array(
                    'name'         => $this->input->post('name'),
                    'phone'        => $this->input->post('phone'),
                    'user_status'  => $this->input->post('user_status'),
                );

                $this->db->where('id',$this->input->post('id'));
                $this->db->update('nurse',$array);
                
                $this->session->set_flashdata('SUCCESS', 'Nurse Updated Successfully');
                redirect('panel/nurse/nurse_list');
         }                   
         
        $nurse = $this->db->where('id',$id);
        $nurse = $this->db->get('nurse')->row();
         
        $data['nurse'] = $nurse;
        $data['heder_title'] = 'Edit Nurse';
        $this->load->view('panel/nurse/edit_nurse',$data);        
    }
    
    
    function delete_nurse($id) {      
        $this->db->where('id',$id);
        $this->db->delete('nurse');

        $this->session->set_flashdata('SUCCESS', 'Nurse Deleted Successfully');
        redirect('panel/nurse/nurse_list');
    }
    
}
