<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['singlepage'] = '';
		$this->load->view('index',$data);
	}
	public function about()
	{
		$data['singlepage'] = 'single-page';
		$this->load->view('about',$data);
	}
	public function services()
	{
		$data['singlepage'] = 'single-page';
		$this->load->view('services',$data);
	}
	public function shop()
	{
            $getProduct = $this->db->where('status',1);
            $getProduct = $this->db->get('product')->result();
            $data['getProduct'] = $getProduct;
            $data['singlepage'] = 'single-page blog-page';
            $this->load->view('shop',$data);
	}
	public function contact()
	{
		$data['singlepage'] = 'single-page';
		$this->load->view('contact',$data);
	}
	public function checkout()
	{
            if(!empty($this->session->userdata('patient_id')))
            {
                $patient = $this->db->where('id',$this->session->userdata('patient_id')); 
                $patient = $this->db->get('patient')->row();
            }
            else{
                $patient = array();
            }


            if(!empty($_POST))
            {
                if(empty($this->session->userdata('patient_id')))
                {
                    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[patient.email]');
                }
                $this->form_validation->set_rules('name', 'First Name', 'required');
                if ($this->form_validation->run() == TRUE)
                {
                        if(!empty($this->session->userdata('patient_id')))
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
                            $user_id = $this->session->userdata('patient_id');
                        }
                        else
                        {
                            $data = array(
                                'name' => $this->input->post('name'),
                                'lname' => $this->input->post('lname'),
                                'company' => $this->input->post('company'),
                                'email' => $this->input->post('email'),
                                'country' => $this->input->post('country'),
                                'street_address' => $this->input->post('street_address'),
                                'city' => $this->input->post('city'),
                                'zipcode' => $this->input->post('zipcode'),
                                'phone' => $this->input->post('phone'),
                                'comment' => $this->input->post('comment'),
                                'created_date' => date('Y-m-d H:i:s')
                            );

                            $this->db->insert('patient',$data); 
                            $user_id = $this->db->insert_id();
                            
                            
                            $this->session->set_userdata(array(
                                'patient_logged_in'     => true,
                                'patient_id'            => $user_id,
                                'patient_account_name'  => $this->input->post('name')
                            ));
                        }

                        $payment_status  = 0;
                        if($this->input->post('payment_type') == 'cash')
                        {
                            $payment_status = 1;
                        }

                        $order = array(
                            'user_id' => $user_id,
                            'payment_type' => $this->input->post('payment_type'),
                            'total' => $this->cart->total(),
                            'payment_status' => $payment_status,
                            'status' => 0,
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


                        if($this->input->post('payment_type') == 'paypal')
                        {
                            $paypalId = 'hardikbusiness111@gmail.com';

                            $query = array();
                            $query['business']      = $paypalId;
                            $query['cmd']           = '_xclick';
                            $query['item_name']     = 'Order Payment';
                            $query['no_shipping']   = '1';
                            $query['item_number']   = $order_id;
                            $query['amount']        = $this->cart->total();
                            $query['currency_code'] = 'GBP';
                            $query['cancel_return'] = base_url().'payment/cancel';
                            $query['return']        = base_url().'payment/success';
                            $query_string = http_build_query($query);
            //              header('Location: https://www.paypal.com/cgi-bin/webscr?' . $query_string);
                            header('Location: https://www.sandbox.paypal.com/cgi-bin/webscr?' . $query_string);
                            exit();                
                        }
                        else
                        {
                            $this->session->set_flashdata('SUCCESS', 'Your order successfully placed');
                            redirect('success');
                        }
                }
            }
            
            $data['patient'] = $patient;
            $data['singlepage'] = 'single-page blog-page';
            $this->load->view('checkout',$data);
	}
	public function detail($id)
	{
		$getProduct = $this->db->where('id', $id);
		$getProduct = $this->db->get('product')->row();
		$data['getProduct'] = $getProduct;

		$data['singlepage'] = 'single-page blog-page';
		$this->load->view('detail',$data);
	}
        // Contact detail Insert database Start
	public function contact_insert()
	{
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'Creation_Date' => date('Y-m-d H:i:s')
            );
            $this->db->insert('contact',$data); 
       
            $this->session->set_flashdata('SUCCESS', 'Your Information Successfully Sent');
            redirect('contact');
	}	
	public function cart()
	{
            $data['singlepage'] = 'single-page blog-page';
            $this->load->view('cart',$data);
	}
	public function add_to_cart()
	{
            $data = array(
                    "id"    => $_POST["id"],
                    "name"  => 'product',
                    "qty"   => $_POST["qty"],
                    "price" => $_POST["price"]
            );

            $this->cart->insert($data); 
            redirect('cart');		
	}
	public function update_cart()
	{
            $cart_info =  $_POST['cart'] ;
            foreach( $cart_info as $id => $cart)
            {	
                $rowid = $cart['rowid'];
                $price = $cart['price'];
                $amount = $price * $cart['qty'];
                $qty = $cart['qty'];

                    $data = array(
                            'rowid'   => $rowid,
                            'price'   => $price,
                            'amount' =>  $amount,
                            'qty'     => $qty
                    );

                    $this->cart->update($data);
            }
            redirect('cart');		
	}
	public function remove_cart($rowid)
        {
            $removed_cart = array(
                'rowid'         => $rowid,
                'qty'           => 0
            );
             $this->cart->update($removed_cart);
             redirect('cart');
        }
    public function payment_success(){
            if($this->input->get('item_number'))
            {
                $item_number = $this->input->get('item_number');
            }
            elseif($this->input->post('item_number'))
            {
                $item_number = $this->input->post('item_number');
            }
            else
            {
                $this->session->set_flashdata('ERROR', "Due to some error please try again!");
                 redirect('checkout');
            }
            
            $this->db->select('*');
            $this->db->from('order');
            $this->db->where('id',$item_number);
            $getrecord = $this->db->get();
            
            if($getrecord->num_rows() > 0)
            {
                    
                    if($this->input->get('st'))
                    {
                        $status = $this->input->get('st');
                    }
                    elseif($this->input->post('st'))
                    {
                        $status = $this->input->post('st');
                    }
                    else
                    {
                        $status = '';
                    }
                    
                    if($status == 'Completed')
                    {
                        $this->db->set('payment_status',1);
                        $this->db->where('id',$item_number);
                        $this->db->update('order');
                        $this->session->set_flashdata('SUCCESS', "Thank you payment successfully done");
                        redirect('success');   
                    }
                    else
                    {
                        $this->session->set_flashdata('ERROR', "Due to some error please try again!");
                         redirect('checkout');
                    }
                }
                else
                {
                    $this->session->set_flashdata('ERROR', "Due to some error please try again!");
                    redirect('checkout');
                }
        }
        public function  cancel(){
            $this->session->set_flashdata('ERROR', 'Due to some error please try again');
            redirect('checkout');
        }
        public function success(){
            $this->cart->destroy();
            $data['singlepage'] = 'single-page';
            $this->load->view('success',$data);
        }
        public function subscribe(){
            if(!empty($this->input->post('email')))
            {
                $email = $this->input->post('email');
                $check = $this->db->where('email',$email);
                $check = $this->db->get('subscribe')->num_rows();
                if($check == 0){
                    $array = array(
                        'email' => $email,
                        'created_date' => date('Y-m-d H:i:s'),
                    );

                    $this->db->insert('subscribe',$array);
                }
            }
            
            $json['success'] = true;
            echo json_encode($json);
            
        }

            //appointment database insert data start

       public function appointment_insert()
        {
            $data = array(
                'department' => $this->input->post('department'),
                'doctor' => $this->input->post('doctor'),
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone')
                
            );
            $this->db->insert('appointment',$data); 
       
            $this->session->set_flashdata('SUCCESS', 'Your Information Successfully Sent');
            redirect('home');
         }   
        //appointment database insert data End
}
