<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_patient_model', '', TRUE );
          
    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/patient/patient_list' );        
    }
    
    function patient_list() {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->panel_patient_model->countPatient();
        $per_page = 40;
        $data['getPatient'] = $this->panel_patient_model->getPatient($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/patient/patient_list';
        
        	
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );
        
        
        $data['heder_title'] = 'Patient List';
        $this->load->view('panel/patient/patient_list',$data);        
    }
    
    
    function add_patient() {      
         if(!empty($_POST))
         {
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[patient.email]');
            if ($this->form_validation->run() == TRUE)
            {
                $password =  password_hash('123456',PASSWORD_DEFAULT);
                $array = array(
                    'name'         => $this->input->post('name'),
                    'lname'        => $this->input->post('lname'),
                    'email'        => $this->input->post('email'),
                    'password'     => $password,
                    'phone'        => $this->input->post('phone'),
                    'user_status'  => $this->input->post('user_status'),
                    'company'      =>$this->input->post('company'),
                    'country'      =>$this->input->post('country'),
                    'street_address'      =>$this->input->post('street_address'),
                    'city'      =>$this->input->post('city'),
                    'zipcode'  =>$this->input->post('zipcode'),
                    'comment'  =>$this->input->post('comment'),
                    
                    'created_date' => date('Y-m-d H:i:s'),
                );

                $this->db->insert('patient',$array);
                $this->session->set_flashdata('SUCCESS', 'Patient Created Successfully');
                redirect('panel/patient/patient_list');
            }
         }                   
        $data['heder_title'] = 'Add Patient';
        $this->load->view('panel/patient/add_patient',$data);        
    }
    
    function edit_patient($id) {      
         if(!empty($_POST))
         {
                if(!empty($this->input->post('password')))
                {
                    $password =  password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                    $array_p = array(
                        'password'     => $password,
                    );

                    $update_p = $this->db->where('id',$this->input->post('id'));
                    $update_p = $this->db->update('patient',$array_p);
                }
                
                $array = array(
                    'name'         => $this->input->post('name'),
                    'lname'        => $this->input->post('lname'),
                    'phone'        => $this->input->post('phone'),
                    'user_status'  => $this->input->post('user_status'),
                    'company'      =>$this->input->post('company'),
                    'country'      =>$this->input->post('country'),
                    'street_address'      =>$this->input->post('street_address'),
                    'city'      =>$this->input->post('city'),
                    'zipcode'  =>$this->input->post('zipcode'),
                    'comment'  =>$this->input->post('comment'),
                    
                );

                $this->db->where('id',$this->input->post('id'));
                $this->db->update('patient',$array);
                
                $this->session->set_flashdata('SUCCESS', 'Patient Updated Successfully');
                redirect('panel/patient/patient_list');
         }                   
         
        $patient = $this->db->where('id',$id);
        $patient = $this->db->get('patient')->row();
         
        $data['patient'] = $patient;
        $data['heder_title'] = 'Edit Patient';
        $this->load->view('panel/patient/edit_patient',$data);        
    }

    function view_patient($id) {      
       
        $this->db->where('id',$id);
        $data['getRecord'] = $this->db->get('patient')->row(); 

        $data['heder_title'] = 'View Patient';
        $this->load->view('panel/patient/view_patient',$data);        
    }


    
    
    function delete_patient($id) {      
        $this->db->where('id',$id);
        $this->db->delete('patient');

        $this->session->set_flashdata('SUCCESS', 'Patient Deleted Successfully');
        redirect('panel/patient/patient_list');
    }


    public function update_client_states($id, $states) {
        $this->load->model('panel/panel_patient_model', '', TRUE);
        $this->panel_patient_model->update_client_states($id, $states);
        $this->session->set_flashdata('SUCCESS', "Status Successfully Change!");
        redirect('panel/patient/patient_list');
    }
    
}
