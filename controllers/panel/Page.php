<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_page_model', '', TRUE );
          
    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/page/page_list' );        
    }
    
    function page_list() {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->panel_page_model->countPage();
        $per_page = 40;
        $data['getPage'] = $this->panel_page_model->getPage($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/page/page_list';
        
        	
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );
        
        
        $data['heder_title'] = 'Page List';
        $this->load->view('panel/page/page_list',$data);        
    }
      function add_page() {      
  
         if(!empty($_POST))
         {
           
                $array = array(
                     'fname'  => $this->input->post('first_name'),
                     'lname'        => $this->input->post('last_name'),
                     'sname'  => $this->input->post('sur_name'),
                     'created_date' => date('Y-m-d H:i:s'),
                     
                );

                $this->db->insert('page',$array);



                $this->session->set_flashdata('SUCCESS', 'Page Created Successfully');
                redirect('panel/page/page_list');
         }                   
        $data['heder_title'] = 'Add Page';
        $this->load->view('panel/page/add_page',$data);      
    }



    function edit_page($id) {      
        if(!empty($_POST))
        {       

                $array = array(
                     'fname'  => $this->input->post('first_name'),
                     'lname'        => $this->input->post('last_name'),
                     'sname'  => $this->input->post('sur_name'),
                );

                $this->db->where('id',$this->input->post('id'));
                $this->db->update('page',$array);
                
                $this->session->set_flashdata('SUCCESS', 'Page Updated Successfully');
                redirect('panel/page/page_list');
         }                   
         
        $page_data = $this->db->where('id',$id);
        $page_data = $this->db->get('page')->row();
         
        $data['page_data'] = $page_data;
        $data['heder_title'] = 'Edit Page';
        $this->load->view('panel/page/edit_page',$data);        
    }
    
    function delete_page($id) {      
        $this->db->where('id',$id);
        $this->db->delete('page');

        $this->session->set_flashdata('SUCCESS', 'Page Deleted Successfully');
        redirect('panel/page/page_list');
    }
  
    
}
