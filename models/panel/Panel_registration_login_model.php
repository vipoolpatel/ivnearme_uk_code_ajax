<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Panel_registration_login_model extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    // Function to add an user To the database
    public function AddUser($new_member_insert_data)
    {
        $insert = $this->db->insert('registration_login', $new_member_insert_data);
        if($insert){
            return "success";
        }else{
            return "false";
        }
    }

    // Function to login in and start session
    public function AddLogin($name_f, $password){
        $this->db->where('username', $name_f);
        $this->db->where('password', $password);
        $result = $this->db->get('registration_login');
            if($result->num_rows() > 0)
            {
                $userdata = array('username' => $name_f, 'is_logged_in' => TRUE);
                $this->session->set_userdata($userdata);
                return 1;
            }else{
                return false;
            }

    }
}

?>