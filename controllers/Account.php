<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'patient_logged_in' )) {
                redirect ('login');
                exit ();
        }
    }

    function index() {
        
        if(!empty($_POST))
        {
              $data = array(
                'name' => $this->input->post('name'),
                'lname' => $this->input->post('lname'),
                'company' => $this->input->post('company'),
                'country' => $this->input->post('country'),
                'street_address' => $this->input->post('street_address'),
                'city' => $this->input->post('city'),
                'zipcode' => $this->input->post('zipcode'),
                'phone' => $this->input->post('phone'),
                'comment' => $this->input->post('comment'),
            );

            $this->db->where('id',$this->session->userdata('patient_id')); 
            $this->db->update('patient',$data);
            
            $this->session->set_flashdata('SUCCESS', "Profile successfully updated!");
            redirect('account');   
    
        }
        $patient =  $this->db->where('id',$this->session->userdata('patient_id'));
        $patient =  $this->db->get('patient')->row();
        $data['patient'] = $patient;
        
        $data['singlepage'] = 'single-page blog-page';
        $this->load->view('account',$data);
    }
    
    
    public function changepassword(){
        $patient =  $this->db->where('id',$this->session->userdata('patient_id'));
        $patient =  $this->db->get('patient')->row();
        
        
        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
        if ($this->form_validation->run() == TRUE)
        {
            $hashed_password =  password_hash($this->input->post('new_password'),PASSWORD_DEFAULT);
            if (password_verify($this->input->post('old_password'), $patient->password)) {
                    $hashed_password =  password_hash($this->input->post('new_password'),PASSWORD_DEFAULT);
                    $data = array(
                        'password' => $hashed_password,
                    );
                    $this->db->where('id',$this->session->userdata('patient_id')); 
                    $this->db->update('patient',$data);
                    $this->session->set_flashdata('SUCCESS', 'Password successfully changed.');
                    redirect ('change-password' );
            } else {
                $this->session->set_flashdata('ERROR', 'Old Password does not match.');
                redirect ('change-password' );
            }
        }
        
        $data['patient'] = $patient;
        $data['singlepage'] = 'single-page blog-page';
        $this->load->view('changepassword',$data);
    }
        
    
    public function myorder(){
        
        $getOrder = $this->db->where('user_id',$this->session->userdata('patient_id'));
        $getOrder = $this->db->where('payment_status',1);
        $getOrder = $this->db->order_by('id','desc');
        $getOrder = $this->db->get('order')->result();
        
        $data['getOrder'] = $getOrder;
        $data['singlepage'] = 'single-page blog-page';
        $this->load->view('myorder',$data);
    }
    
    
    public function orderdetail($id){
        
        $getOrder = $this->db->where('user_id',$this->session->userdata('patient_id'));
        $getOrder = $this->db->where('id',$id);
        $getOrder = $this->db->where('payment_status',1);
        $getOrder = $this->db->get('order')->row();
        
        
        $getOrderDetail = $this->db->select('order_details.*,product.title,product.product_image,product.description');
        $getOrderDetail = $this->db->from('order_details');
        $getOrderDetail = $this->db->join('product','product.id = order_details.product_id');
        $getOrderDetail = $this->db->where('order_id',$getOrder->id);
        $getOrderDetail = $this->db->get()->result();
        
        
        
        $data['getOrder'] = $getOrder;
        $data['getOrderDetail'] = $getOrderDetail;
        
        $data['singlepage'] = 'single-page blog-page';
        $this->load->view('orderdetail',$data);
    }
    
    
    
    
}
