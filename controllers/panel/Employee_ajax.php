<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_ajax extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
          $this->load->model ( 'panel/panel_employee_ajax_model', '', TRUE );
    }
    public function index()
    {

        redirect ( $this->config->item ( 'panel_folder' ) . '/employee_ajax/employee_ajax_list' );   
    }
	public function employee_ajax_list()
	{
		$data['heder_title'] = 'Employee Ajax List';
		$this->load->view('panel/employee_ajax/list', $data);
    }
    public function showAllEmployee()
    {
        $result = $this->panel_employee_ajax_model->getAllEmployee();
        echo json_encode($result);
    }
    public function addEmployee()
    {
        $result = $this->panel_employee_ajax_model->insertEmployee();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result){
            $msg['success'] = true;
        }    
        echo json_encode($msg);
    }
    public function editEmployee()
    {
        $result = $this->panel_employee_ajax_model->editEmployee();
        echo json_encode($result);
    }
    public function updateEmployee()
    {
        $result = $this->panel_employee_ajax_model->updateEmployee();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result){
            $msg['success'] = true;

        }
        echo json_encode($msg);
    }

    public function deleteEmployee()
    {
        $result = $this->panel_employee_ajax_model->deleteEmployee();
        $msg['success'] = false;
        if ($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

	
}

?>