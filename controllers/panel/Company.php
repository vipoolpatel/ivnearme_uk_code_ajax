<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_company_model', '', TRUE );
        
    }

    public function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/page/company_list' );        
    }
    

    public function company_list() {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->panel_company_model->countCompany();
        $per_page = 40;
        $data['getCompany'] = $this->panel_company_model->getCompany($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/course/course_list';
        
        	
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );
        
        
        $data['heder_title'] = 'Company List';
        $this->load->view('panel/company/company_list',$data);        
    }
    
 public function add_company()
    {
         if(!empty($_POST))
        {
            $this->form_validation->set_rules('company_code', 'Company Code', 'required|is_unique[company_code.company_code]');

            
            if ($this->form_validation->run() == TRUE)
            {
                $array = array(
                    'company_code'=>  strtoupper($this->input->post('company_code')),
                    'company_price'=>  $this->input->post('company_price'),
                    'type'=>  $this->input->post('type'),     
                    'created_date'=>  date('Y-m-d'),
                );
                
                $this->db->insert('company_code',$array);
                $this->session->set_flashdata('SUCCESS', 'Company Code Created Successfully');
                redirect('panel/company/company_list');
            }
        }
        $data['heder_title'] = 'Add Company';
        $this->load->view('panel/company/add_company',$data);
    }
   
        
  

    public function edit_company($id)
    {
        if(!empty($_POST))
        {
            $array = array(
                'company_code'=>  strtoupper($this->input->post('company_code')),
                'company_price'=>  $this->input->post('company_price'),          
                'type'=>  $this->input->post('type'),               
            );

            $this->db->where('id',$this->input->post('id'));
            $this->db->update('company_code',$array);

            $this->session->set_flashdata('SUCCESS', 'Company Code Updated Successfully');
            redirect('panel/company/company_list');
        }
        
        $get = $this->db->where('id',$id);
        $get = $this->db->get('company_code')->row();
        $data['edit_company_code'] = $get;
         $data['heder_title'] = 'Edit Company';
        $this->load->view('panel/company/edit_company',$data);
    }
    
    
    


    public function delete_company($id) {      
       
        $this->db->where('id',$id);
        $this->db->delete('company_code');
     
        $this->session->set_flashdata('SUCCESS', 'Company Deleted Successfully');
        redirect('panel/company/company_list');
    }

    public function ajax_image()
    {
        $data['heder_title'] = 'Ajax Image';
        $this->load->view('panel/company/ajax_image', $data);
    }



    public function ajax_upload()  
    {  
       if(isset($_FILES["file"]["name"]))  
       {  

            $config['upload_path'] = 'img/product';  
            $config['allowed_types'] = 'jpg|jpeg|png|gif';  
            $this->load->library('upload', $config);  
            if(!$this->upload->do_upload('file'))  
            {  
                 echo $this->upload->display_errors();  
            }  
            else  
            {  
                $data = array('upload_data' => $this->upload->data());
        
                $title= $this->input->post('title');
                $image= $data['upload_data']['file_name']; 
                 
                $result= $this->panel_company_model->save_upload($title,$image);
  
                echo '<img src="'.base_url().'img/product/'.$image.'" width="300" height="225" class="img-thumbnail" />';  
            }



       }  
    }  

    
}
