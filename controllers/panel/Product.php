<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_product_model', '', TRUE );
          
    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/product/product_list' );        
    }
    
    function product_list() {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->panel_product_model->countproduct();
        $per_page = 40;
        $data['getProduct'] = $this->panel_product_model->getproduct($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/product/product_list';
        
        	
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );
        
        
        $data['heder_title'] = 'Product List';
        $this->load->view('panel/product/product_list',$data);        
    }
    
    
    function add_product() {      
  
         if(!empty($_POST))
         {
           

                $product_image = date('ymdhis').$_FILES["product_image"]["name"];        

                $array = array(
                     'title'  => $this->input->post('title'),
                     'price'        => $this->input->post('price'),
                     'description'  => $this->input->post('description'),
                     'qty'  => $this->input->post('qty'),
                     'product_image' => $product_image,
                     'status'  => $this->input->post('status'),
                     'created_date' => date('Y-m-d H:i:s'),
                     'updated_date' => date('Y-m-d H:i:s'),
                );

                $this->db->insert('product',$array);
                $insertId = $this->db->insert_id();


                if (! is_dir ( 'img/product/'.$insertId )) {
                    mkdir ( 'img/product/'.$insertId, 0777, true );
                }

                $folder = "img/product/".$insertId.'/';
                move_uploaded_file($_FILES["product_image"]["tmp_name"], $folder . $product_image);


                $this->session->set_flashdata('SUCCESS', 'Product Created Successfully');
                redirect('panel/product/product_list');
         }                   
        $data['heder_title'] = 'Add Product';
        $this->load->view('panel/product/add_product',$data);      
    }
    
    function edit_product($id) {      
        if(!empty($_POST))
        {       

            if (! is_dir ( 'img/product/'.$this->input->post('id') )) {
                mkdir ( 'img/product/'.$this->input->post('id'), 0777, true );
            }
   

            if (!empty($_FILES["product_image"]["name"])) {
                $product_image = date('ymdhis').$_FILES["product_image"]["name"];
          
                  $folder = "img/product/".$this->input->post('id').'/';
                move_uploaded_file($_FILES["product_image"]["tmp_name"], $folder . $product_image);
            } else {
                $product_image = $this->input->post('old_imagename1');
            }
              
                $array = array(
                    'title' => $this->input->post('title'),
                    'price' => $this->input->post('price'),
                    'description' => $this->input->post('description'),
                    'qty' => $this->input->post('qty'),
                    'product_image' => $product_image,
                    'status' => $this->input->post('status'),
                    'updated_date' => date('Y-m-d H:i:s'),
                );

                $this->db->where('id',$this->input->post('id'));
                $this->db->update('product',$array);
                
                $this->session->set_flashdata('SUCCESS', 'Product Updated Successfully');
                redirect('panel/product/product_list');
         }                   
         
        $product = $this->db->where('id',$id);
        $product = $this->db->get('product')->row();
         
        $data['product'] = $product;
        $data['heder_title'] = 'Edit product';
        $this->load->view('panel/product/edit_product',$data);        
    }
    
    
    function delete_product($id) {      
        $this->db->where('id',$id);
        $this->db->delete('product');

        $this->session->set_flashdata('SUCCESS', 'Product Deleted Successfully');
        redirect('panel/product/product_list');
    }
    
}
