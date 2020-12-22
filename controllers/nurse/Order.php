<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'nurse_logged_in' )) {
                redirect ( $this->config->item ( 'nurse_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'nurse/nurse_order_model', '', TRUE );
          
    }

    function index() {
        redirect ( $this->config->item ( 'nurse_folder' ) . '/order/pending' );        
    }
    
    function pending($status = 0) {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->nurse_order_model->countOrder($status);
        $per_page = 40;

        $data['getOrder'] = $this->nurse_order_model->getOrder($per_page, $this->uri->segment ( 5 ),$status);
        $base_url = base_url ().'/nurse/order/pending/'.$status;
        
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '5';
        
        $this->pagination->initialize ( $config );
        $data['heder_title'] = 'Pending Order List';
        $this->load->view('nurse/order/pending',$data);        
    }
    
    function processing($status = 1) {       
        $this->load->library ( 'pagination' );
        $total = $this->nurse_order_model->countOrder($status);
        $per_page = 40;
        
        $data['getOrder'] = $this->nurse_order_model->getOrder($per_page, $this->uri->segment ( 5 ),$status);
        $base_url = base_url ().'/nurse/order/processing/'.$status;
        
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '5';
     
        $this->pagination->initialize ( $config );
        $data['heder_title'] = 'Processing Order List';
        $this->load->view('nurse/order/processing',$data);        
    }
    
    function complete($status = 2) {       
        $this->load->library ( 'pagination' );
        $total = $this->nurse_order_model->countOrder($status);
        $per_page = 40;
        
        $data['getOrder'] = $this->nurse_order_model->getOrder($per_page, $this->uri->segment ( 5 ),$status);
        $base_url = base_url ().'/nurse/order/processing/'.$status;
        
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '5';
     
        $this->pagination->initialize ( $config );
        $data['heder_title'] = 'Complete Order List';
        $this->load->view('nurse/order/complete',$data);        
    }
    
    function cancel($status = 2) {       
        $this->load->library ( 'pagination' );
        $total = $this->nurse_order_model->countOrder($status);
        $per_page = 40;
        
        $data['getOrder'] = $this->nurse_order_model->getOrder($per_page, $this->uri->segment ( 5 ),$status);
        $base_url = base_url ().'/nurse/order/cancel/'.$status;
        
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '5';
       
        $this->pagination->initialize ( $config );
        $data['heder_title'] = 'Cancel Order List';
        $this->load->view('nurse/order/cancel',$data);        
    }

     function view_order($id) {  
         

        $getOrder = $this->db->where('id',$id);
        $getOrder = $this->db->where( 'nurse_id', $this->session->userdata ( 'nurse_id' ));
        $getOrder = $this->db->get('order')->row();
        
        $getUser = $this->db->where('id',$getOrder->user_id);
        $getUser = $this->db->get('patient')->row();
        
        $query = $this->db->select('order_details.*,product.title');
        $query = $this->db->from('order_details');
        $query = $this->db->join('product', 'product.id = order_details.product_id'); 
        $query = $this->db->where('order_details.order_id',$getOrder->id);
        $query = $this->db->get()->result();
        
        $data['getRecord'] = $query;  
        $data['getOrder'] = $getOrder;  
        $data['getUser'] = $getUser;  
        
    
        
        $data['heder_title'] = 'Order Detail List';  
        $this->load->view('nurse/order/view_order',$data);             
     }    
    
    
 
    
    function ChangeStatus(){
        $id = $this->input->post('id');
        $value = $this->input->post('value');
        
        $this->db->where('id',$id);
        $this->db->set('status', $value);
        $this->db->update('order');
        
        $json['success'] = true;
        echo json_encode($json);
    }
    
 
    
    
}
