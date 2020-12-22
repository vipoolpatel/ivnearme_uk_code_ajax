<?php
    if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Shipping extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }

        $this->load->model ( 'panel/panel_shipping_model', '', TRUE );

    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/shipping/hold' );
    }

    function hold($status = 0)
    {

        $this->load->library ( 'pagination' );

        $total = $this->panel_shipping_model->countShipping($status);
        $per_page = 40;

        $data['getShipping'] = $this->panel_shipping_model->getShipping($per_page, $this->uri->segment ( 5 ),$status);
        $base_url = base_url ().'/panel/shipping/hold/'.$status;

        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '5';

        $data['getNurse'] = $this->panel_shipping_model->getNurse();

        $this->pagination->initialize ( $config );
        $data['heder_title'] = 'Hold Shipping List';
        $this->load->view('panel/shipping/hold',$data);
    }

    function denied($status = 1)
    {
         $this->load->library ( 'pagination' );
         $total = $this->panel_shipping_model->countShipping($status);
         $per_page = 40;

         $data['getShipping'] = $this->panel_shipping_model->getShipping($per_page, $this->uri->segment ( 5 ),$status);
         $base_url = base_url ().'/panel/shipping/denied/'.$status;

         $config ['base_url'] = $base_url;
         $config ['total_rows'] = $total;
         $config ['per_page'] = $per_page;
         $config ['uri_segment'] = '5';

         $data['getNurse'] = $this->panel_shipping_model->getNurse();
         $this->pagination->initialize ( $config );
         $data['heder_title'] = 'Denied Shipping List';
         $this->load->view('panel/shipping/denied',$data);
    }
    function expired($status = 2)
    {

        $this->load->library( 'pagination' );
        $total = $this->panel_shipping_model->countShipping($status);
        $per_page = 40;
        $data['getShipping'] = $this->panel_shipping_model->getShipping($per_page, $this->uri->segment ( 5 ),$status);
        $base_url = base_url ().'panel/shipping/expired'.$status;

        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '5';

        $data['getNurse'] = $this->panel_shipping_model->getNurse();
        $this->pagination->initialize ( $config );

        $data['heder_title'] = 'Expired Shipping List';
        $this->load->view('panel/shipping/expired',$data);
    }
    function failed($status = 2)
    {
        $this->load->library('pagination');
        $total = $this->panel_shipping_model->countShipping($status);
        $per_page = 40;
        $data['getShipping'] = $this->panel_shipping_model->getShipping($per_page,$this->uri->segment ( 5 ),$status);
        $base_url = base_url ().'/panel/shipping/failed'.$status;
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '5';
        $data['getNurse'] = $this->panel_shipping_model->getNurse();
        $this->pagination->initialize ($config);
        $data['heder_title'] = 'Failed Shipping List';
        $this->load->view('panel/shipping/failed',$data);
    }
    function add_shipping()
    {
        $getProduct = $this->db->where('status',1);
        $getProduct = $this->db->get('product')->result();
        $data['getProduct'] = $getProduct;

        $getPatient = $this->db->where('user_status',1);
        $getPatient = $this->db->get('patient')->result();
        $data['getPatient'] = $getPatient;

        $getNurse = $this->db->where('user_status',1);
        $getNurse = $this->db->get('nurse')->result();
        $data['getNurse'] = $getNurse;

        $data['heder_title'] = 'Add Shipping';
        $this->load->view('panel/shipping/add_shipping',$data);
    }
    function view_shipping()
    {
        $data['heder_title'] = 'Shippin Detail List';
        $this->load->view('panel/shipping/view_shipping',$data);
    }
    function submit_shipping(){

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
      redirect('panel/shipping/hold/0');

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
          redirect('panel/shipping/add_shipping');
  }
  public function remove_cart($rowid)
  {
    $removed_cart = array
    (
      'rowid'         => $rowid,
      'qty'           => 0
    );
    $this->cart->update($removed_cart);
       redirect('panel/shipping/add_shipping');
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
?>
