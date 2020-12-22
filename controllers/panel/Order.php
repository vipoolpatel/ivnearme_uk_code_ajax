<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }

        $this->load->model ( 'panel/panel_order_model', '', TRUE );

    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/order/pending' );
    }

    function pending($status = 0) {

        $this->load->library ( 'pagination' );

        $total = $this->panel_order_model->countOrder($status);
        $per_page = 40;

        $data['getOrder'] = $this->panel_order_model->getOrder($per_page, $this->uri->segment ( 5 ),$status);
        $base_url = base_url ().'/panel/order/pending/'.$status;

        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '5';

        $data['getNurse'] = $this->panel_order_model->getNurse();

        $this->pagination->initialize ( $config );
        $data['heder_title'] = 'Pending Order List';
        $this->load->view('panel/order/pending',$data);
    }

    function processing($status = 1) {
        $this->load->library ( 'pagination' );
        $total = $this->panel_order_model->countOrder($status);
        $per_page = 40;

        $data['getOrder'] = $this->panel_order_model->getOrder($per_page, $this->uri->segment ( 5 ),$status);
        $base_url = base_url ().'/panel/order/processing/'.$status;

        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '5';
       $data['getNurse'] = $this->panel_order_model->getNurse();
        $this->pagination->initialize ( $config );
        $data['heder_title'] = 'Processing Order List';
        $this->load->view('panel/order/processing',$data);
    }

    function complete($status = 2) {
        $this->load->library ( 'pagination' );
        $total = $this->panel_order_model->countOrder($status);
        $per_page = 40;

        $data['getOrder'] = $this->panel_order_model->getOrder($per_page, $this->uri->segment ( 5 ),$status);
        $base_url = base_url ().'/panel/order/processing/'.$status;

        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '5';
        $data['getNurse'] = $this->panel_order_model->getNurse();
        $this->pagination->initialize ( $config );
        $data['heder_title'] = 'Complete Order List';
        $this->load->view('panel/order/complete',$data);
    }

    function cancel($status = 2) {
        $this->load->library ( 'pagination' );
        $total = $this->panel_order_model->countOrder($status);
        $per_page = 40;

        $data['getOrder'] = $this->panel_order_model->getOrder($per_page, $this->uri->segment ( 5 ),$status);
        $base_url = base_url ().'/panel/order/cancel/'.$status;

        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '5';
        $data['getNurse'] = $this->panel_order_model->getNurse();
        $this->pagination->initialize ( $config );
        $data['heder_title'] = 'Cancel Order List';
        $this->load->view('panel/order/cancel',$data);
    }

     function view_order($id) {


        $getOrder = $this->db->where('id',$id);
        $getOrder = $this->db->get('order')->row();

        $getUser = $this->db->where('id',$getOrder->user_id);
        $getUser = $this->db->get('patient')->row();

        $query = $this->db->select('order_details.*,product.title');
        $query = $this->db->from('order_details');
        $query = $this->db->join('product', 'product.id = order_details.product_id');
        $query = $this->db->where('order_details.order_id',$id);
        $query = $this->db->get()->result();

        $data['getRecord'] = $query;
        $data['getOrder'] = $getOrder;
        $data['getUser'] = $getUser;

        $data['getNurse'] = $this->panel_order_model->getNurse();

        $data['heder_title'] = 'Order Detail List';
        $this->load->view('panel/order/view_order',$data);
     }




    function delete_order($id) {
        $this->db->where('id',$id);
        $this->db->delete('order');

        $d = $this->db->where('order_id',$id);
        $d = $this->db->delete('order_details');

        $this->session->set_flashdata('SUCCESS', 'Order Deleted Successfully');
        redirect('panel/order/order_list');
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

    function ChangeStatusNurse(){
        $id = $this->input->post('id');
        $value = $this->input->post('value');

        $this->db->where('id',$id);
        $this->db->set('nurse_id', $value);
        $this->db->update('order');

        $json['success'] = true;
        echo json_encode($json);
    }

    function add_order()
    {
        $getPatient = $this->db->where('user_status', 1);
        $getPatient = $this->db->get('patient')->result();
        $data['getPatient'] = $getPatient;

        $getNurse = $this->db->where('user_status',1);
        $getNurse = $this->db->get('nurse')->result();
        $data['getNurse'] = $getNurse;

        $getProduct = $this->db->where('status',1);
        $getProduct = $this->db->get('product')->result();
        $data['getProduct'] = $getProduct;



        $data['heder_title'] = 'Add Order';
        $this->load->view('panel/order/add_order',$data);
    }

    function submit_order(){

        $order = array(
            'user_id' => $this->input->post('user_id'),
            'nurse_id' => $this->input->post('nurse_id'),
            'payment_type' => 'cash',
            'total' => $this->cart->total(),
            'payment_status' => 1,
            'status' => $this->input->post('status'),
            'created_date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('order',$order);
        $order_id = $this->db->insert_id();

        foreach ($this->cart->contents() as $items)
        {
            $order_detail = array(
                    'order_id' => $order_id,
                    'product_id' => $items['id'],
                    'qty' => $items['qty'],
                    'price' => $items['price'],
                    'subtotal' => $items['subtotal'],
                    'created_at' => date('Y-m-d H:i:s')
            );

            $this->db->insert('order_details', $order_detail);
        }

         $this->cart->destroy();
        $this->session->set_flashdata('SUCCESS', 'Order successfully placed.');
        redirect('panel/order/pending/0');

    }

    function add_to_cart()
    {
            $product_id = $this->input->post('product_id');

            $getProduct = $this->db->where('id',$product_id);
            $getProduct = $this->db->get('product')->row();

            $data = array(
                    "id"    => $product_id,
                    "name"  => 'product',
                    "qty"   => $this->input->post('qty'),
                    "price" => $getProduct->price
             );

            $this->cart->insert($data);

            $this->session->set_flashdata('SUCCESS', 'Product add in Cart');
            redirect('panel/order/add_order');
    }

    public function remove_cart($rowid)
    {
        $removed_cart = array(
            'rowid'         => $rowid,
            'qty'           => 0
        );
        $this->cart->update($removed_cart);
        redirect('panel/order/add_order');
    }




}
