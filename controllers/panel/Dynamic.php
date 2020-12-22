<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dynamic extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
      //  $this->load->model ( 'panel/panel_dynamic_model', '', TRUE );
          
    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/dynamic/dynamic_list' );        
    }
    
    function dynamic_list() {       
        
        $data['heder_title'] = 'Dynamic List';
        $this->load->view('panel/dynamic/dynamic_list',$data);        
    }
      function add_dynamic() {      
  
         // if(!empty($_POST))
         // {
           
         //        $array = array(
         //             'fname'  => $this->input->post('first_name'),
         //             'lname'        => $this->input->post('last_name'),
         //             'sname'  => $this->input->post('sur_name'),
         //             'created_date' => date('Y-m-d H:i:s'),
                     
         //        );

         //        $this->db->insert('page',$array);



         //        $this->session->set_flashdata('SUCCESS', 'Page Created Successfully');
         //        redirect('panel/page/page_list');
         // }   

        $this->load->model ( 'panel/panel_dynamic_model', '', TRUE );

         $data['country'] = $this->panel_dynamic_model->fetch_country();                
        $data['heder_title'] = 'Add Dynamic';
        $this->load->view('panel/dynamic/add_dynamic',$data);      
    }


 function fetch_state()
 {
     $this->load->model ( 'panel/panel_dynamic_model', '', TRUE );
  if($this->input->post('country_id'))
  {
   echo $this->panel_dynamic_model->fetch_state($this->input->post('country_id'));
  }
 }

 function fetch_city()
 {
     $this->load->model ( 'panel/panel_dynamic_model', '', TRUE );
  if($this->input->post('state_id'))
  {
   echo $this->panel_dynamic_model->fetch_city($this->input->post('state_id'));
  }
 }



   
    
}
