<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Photo extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_photo_model', '', TRUE );
          
    }

    public function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/photo/photo_list' );        
    }
    
    public function photo_list() {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->panel_photo_model->countphoto();
        $per_page = 40;
        $data['getPhoto'] = $this->panel_photo_model->getphoto($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/photo/photo_list';
        
        	
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );
        
        
        $data['heder_title'] = 'Photo List';
        $this->load->view('panel/photo/photo_list',$data);        
    }
    
    
  public function add_photo() {      
   if (!empty($_FILES["product_image"]["name"])) {
          $signature = $_FILES["product_image"]["name"];
          $product_image = $_FILES["product_image"]["name"];
          $folder = "img/";
          move_uploaded_file($_FILES["product_image"]["tmp_name"], $folder . $product_image);
         // move_uploaded_file($_FILES["image"]["tmp_name"], $folder . $_FILES["image"]["name"]);
      } else {
          $product_image = '';
      }     

         if(!empty($_POST))
         {
                $array = array(
                     'title'  => $this->input->post('title'),
                     'product_image' => $product_image,
                     
                );
                $this->db->insert('photo',$array);


                $this->session->set_flashdata('SUCCESS', 'Product Created Successfully');
                redirect('panel/photo/photo_list');
         }                   
        $data['heder_title'] = 'Add Product';
        $this->load->view('panel/photo/add_photo',$data);      
    }
    
    

  public function edit_photo($id) { 

     
         if(!empty($_POST))
         {
                if (!empty($_FILES["product_image"]["name"])) {
            $product_image = $_FILES["product_image"]["name"];
            $folder = "img/";
            move_uploaded_file($_FILES["product_image"]["tmp_name"], $folder . $_FILES["product_image"]["name"]);
        } else {
            $product_image = $this->input->post('old_imagename');
        }
                
                
                $array = array(
                   'title' => $this->input->post('title'),
                   'product_image'    => $product_image,
               
                    
                );

                $this->db->where('id',$this->input->post('id'));
                $this->db->update('photo',$array);
                
                $this->session->set_flashdata('SUCCESS', 'Patient Updated Successfully');
                redirect('panel/photo/photo_list');
         }                   
         
        $photo = $this->db->where('id',$id);
        $photo = $this->db->get('photo')->row();
      
        $data['photo'] = $photo;
        $data['heder_title'] = 'Edit photo';
        $this->load->view('panel/photo/edit_photo',$data); 

    }


   // function delete_photo($id) {      
   //      $this->db->where('id',$id);
   //      $this->db->delete('photo');

   //      $this->session->set_flashdata('SUCCESS', 'photo Deleted Successfully');
   //      redirect('panel/photo/photo_list');
   //  }

// ak photo delete krva mate se nisenu
  public function delete_photo($id)
    {
    
   
        $get_image =  $this->db->where('id',$id);
        $get_image = $this->db->get('photo')->row();

         if (unlink('img/'.$get_image->product_image)) {
              echo "The file has been deleted";
          } else {
              echo "The file was not found";
          }
       
          
          
                    
            $this->db->where('id',$id);
            $this->db->update('photo',array('product_image' => ''));

          redirect('panel/photo/photo_list');
    }

    

    // full delete marva mate nisenu se

    public function delete_image($id)
    {
    
   
        $get_image =  $this->db->where('id',$id);
        $get_image = $this->db->get('photo')->row();

         if (unlink('img/'.$get_image->product_image)) {
              echo "The file has been deleted";
          } else {
              echo "The file was not found";
          }
       
          
          
                    
            $this->db->where('id',$id);
            $this->db->delete('photo');
           // $this->db->update('photo',array('product_image' => ''));


          redirect('panel/photo/photo_list');
    }


 
}
