<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Panel_login_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function check_email_verify_onlogin() {
		$this->db->select ( 'user_accounts.user_id' );
		$this->db->from ( 'user_accounts' );
		$this->db->where ( 'email', $this->input->post ( 'email' ) );
		$this->db->where ( 'user_status', 1 );
		$query = $this->db->get ();
		return $query->num_rows ();
	}	
	function get_user_hash_from_email($email) {

		$this->db->select ( 'password' );
		$this->db->from ( 'user_accounts' );
		$this->db->where ( 'email', $email );
		$query = $this->db->get();
		if ($query->num_rows() > 0){
			$ret = $query->row();
			return $ret->password;
		}
	}
	function get_user_data_from_email($email) {
		$this->db->select ( 'user_id,account_name' );
		$this->db->from ( 'user_accounts' );
		$this->db->where ( 'email', $email );
		$query = $this->db->get();
		if ($query->num_rows() > 0){
			return $ret = $query->row();
		}
	}
	function reset_user_login_attempts($email) {
                $this->db->set('login_attempts', 0);
		$this->db->where ( 'email', $email );
		$this->db->update ( 'user_accounts');
	}
	function update_user_banned_lifting_time($email,$banned_lifting_time) {
		$this->db->set ( 'banned_lifting_time',$banned_lifting_time);
		$this->db->where ( 'email', $email );
		$this->db->update ( 'user_accounts' );
	}	
	function update_userdata_on_login($email) {
		$userdata = array ('last_ip' => $this->input->ip_address () );
		$this->db->set ( 'last_login', 'NOW()', FALSE );
		$this->db->set ( 'no_of_logins', 'no_of_logins+1', FALSE );
		$this->db->where ( 'email', $email );
		$this->db->update ( 'user_accounts', $userdata );
	}	
}