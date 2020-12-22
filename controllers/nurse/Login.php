<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->session->userdata('nurse_logged_in')) {
            redirect($this->config->item('nurse_folder') . '/dashboard');
            exit;
        }
        redirect($this->config->item('nurse_folder') . '/login/userlogin');
    }

    function userlogin() {
        if ($this->session->userdata('nurse_logged_in')) {
            redirect($this->config->item('nurse_folder') . '/dashboard');
            exit;
        }

        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        if (!empty($_POST)) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|callback__checkLogin|callback__check_email_verify');
            if ($this->form_validation->run()) {
                $this->load->model('nurse/nurse_login_model', '', TRUE);
                $user_data = $this->nurse_login_model->get_user_data_from_email($this->input->post('email'));
                $this->session->set_userdata(array(
                    'nurse_logged_in' => true,
                    'nurse_id' => $user_data->id,
                    'nurse_account_name' => $user_data->name
                ));

                $this->nurse_login_model->update_userdata_on_login($this->input->post('email'));
                $this->_reset_login_attempts($this->input->post('email'));
                redirect($this->config->item('nurse_folder') . '/');
                exit();
            }
        }

        $this->load->view('nurse/login/login_form');
    }

    public function _check_email_verify() {
        $this->load->model('nurse/nurse_login_model', '', TRUE);
        $count = $this->nurse_login_model->check_email_verify_onlogin();
        if ($count == 1) {
            return TRUE;
        } else {
            $this->form_validation->set_message('_check_email_verify', "Email address not verified please contact admin");
            return FALSE;
        }
    }

    function _checkLogin() {
        $this->load->model('nurse/nurse_login_model', '', TRUE);
        $hashed_password = $this->nurse_login_model->get_user_hash_from_email($this->input->post('email'));
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
        $this->load->model('nurse/nurse_login_model', '', TRUE);
        $this->nurse_login_model->reset_user_login_attempts($email);
        $this->nurse_login_model->update_user_banned_lifting_time($email, NULL);
    }

    function logout() {
        $this->session->unset_userdata('nurse_logged_in');
        $this->session->unset_userdata('nurse_id');
        $this->session->unset_userdata('nurse_account_name');
        redirect($this->config->item('nurse_folder') . '/login/userlogin');
    }

}
