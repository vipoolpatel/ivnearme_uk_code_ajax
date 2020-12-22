<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
            if ($this->session->userdata('patient_logged_in')) {
                redirect('account');
                exit;
            }
            
            if (!empty($_POST)) {
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required|callback__checkLogin|callback__check_email_verify');
                if ($this->form_validation->run()) {
                    $this->load->model('patient/patient_login_model', '', TRUE);
                    $user_data = $this->patient_login_model->get_user_data_from_email($this->input->post('email'));
                    $this->session->set_userdata(array(
                        'patient_logged_in'     => true,
                        'patient_id'            => $user_data->id,
                        'patient_account_name'  => $user_data->name
                    ));

                    $this->patient_login_model->update_userdata_on_login($this->input->post('email'));
                    $this->_reset_login_attempts($this->input->post('email'));
                    redirect('account');
                    exit();
                }
            }
            
            $data['singlepage'] = 'single-page';
            $this->load->view('login',$data);
	}
        
        
        public function _check_email_verify() {
            $this->load->model('patient/patient_login_model', '', TRUE);
            $count = $this->patient_login_model->check_email_verify_onlogin();
            if ($count == 1) {
                return TRUE;
            } else {
                $this->form_validation->set_message('_check_email_verify', "Email address not verified please contact admin");
                return FALSE;
            }
        }

        function _checkLogin() {
            $this->load->model('patient/patient_login_model', '', TRUE);
            $hashed_password = $this->patient_login_model->get_user_hash_from_email($this->input->post('email'));
            if ($hashed_password) {
                if (password_verify($this->input->post('password'), $hashed_password)) {
                    return TRUE;
                } else {
                    $this->form_validation->set_message('_checkLogin', "Incorrect email address or password!");
                    return FALSE;
                }
            } else {
                $this->form_validation->set_message('_checkLogin', "Incorrect email address or password!");
                return FALSE;
            }
        }

        public function _reset_login_attempts($email) {
            $this->load->model('patient/patient_login_model', '', TRUE);
            $this->patient_login_model->reset_user_login_attempts($email);
            $this->patient_login_model->update_user_banned_lifting_time($email, NULL);
        }
        
        
        public function register(){
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[patient.email]');
            $this->form_validation->set_rules('password', 'Password', 'required'); 
            if ($this->form_validation->run() == TRUE)
            {
                $password =  password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                $array = array(
                    'name'     => $this->input->post('name'),
                    'lname'         =>  $this->input->post('lastname'),
                    'email'         =>  $this->input->post('email'),
                    'password'      =>  $password,
                    'user_status'      =>  1,
                    'created_date'      =>  date('Y-m-d'),
                );

                $this->db->insert('patient',$array);
                $this->session->set_flashdata('SUCCESS', 'Account Successfully  Created');
                redirect ('login' );
            }
        $data['singlepage'] = 'single-page';
        $data['active'] = 'active';
        $this->load->view('login',$data);
        }
        
   
        
        

        function logout() {
            $this->session->unset_userdata('patient_logged_in');
            $this->session->unset_userdata('patient_id');
            $this->session->unset_userdata('patient_account_name');
            redirect('login');
        }
        
        
        public function forgot_password()
        {
            
            if(!empty($_POST))
            {
                $email = $this->input->post('email');
                $this->db->where('email',$email);
                $this->db->limit('1');
                $get = $this->db->get('patient');
                if($get->num_rows() > 0)
                {
                    $string = '';
                    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $max = strlen($characters) - 1;
                    for ($i = 0; $i < 8; $i++) {
                        $string .= $characters[mt_rand(0, $max)];
                    }
                    
                    $hashed_password = password_hash($string, PASSWORD_DEFAULT);
                    
                    $data = array(
                        'password' => $hashed_password,
                    );
                    $this->db->where('id', $get->row()->id); 
                    $this->db->update('patient',$data);
                    
                    $this->session->set_flashdata('SUCCESS', 'Password successfully changed. please check your email.');
                    redirect ('forgot_password' );
                }
                else
                {
                    $this->session->set_flashdata('ERROR', 'Email address not found.');
                    redirect ('forgot_password' );
                }
            }
            
            $data['singlepage'] = 'single-page';
            $this->load->view('forgot_password',$data);
        }


	
}
