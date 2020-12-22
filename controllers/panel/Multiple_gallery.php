<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Multiple_gallery extends CI_Controller
{
	
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_photo_model', '', TRUE );
          
    }

	public function index()
    {
        redirect ( $this->config->item ( 'panel_folder' ) . '/multiple_gallery/multiple_gallery_list' );
    }

    public function multiple_gallery_list()
    {
        $data = array();
        if($this->input->post('submitForm') && !empty($_FILES['upload_Files']['name'])){
            $filesCount = count($_FILES['upload_Files']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['upload_File']['name'] = $_FILES['upload_Files']['name'][$i];
                $_FILES['upload_File']['type'] = $_FILES['upload_Files']['type'][$i];
                $_FILES['upload_File']['tmp_name'] = $_FILES['upload_Files']['tmp_name'][$i];
                $_FILES['upload_File']['error'] = $_FILES['upload_Files']['error'][$i];
                $_FILES['upload_File']['size'] = $_FILES['upload_Files']['size'][$i];
                $uploadPath = 'img/files/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('upload_File')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created']   = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified']  = date("Y-m-d H:i:s");
                }
            }            
            if(!empty($uploadData)){
                // Insert file information into the database
                $insert = $this->panel_photo_model->insert_multiple_gallery($uploadData);
                $this->session->set_flashdata('SUCCESS', 'Multiple Gallery Created Successfully');
            }
        }
        $data['gallery'] = $this->panel_photo_model->getRows_multiple_gallery();

    	$data['heder_title'] = 'Multiple Gallery List';
    	$this->load->view('panel/multiple_gallery/list', $data);
    }

    public function delete_multiple_gallery($id)
    {
        $get_del = $this->db->where('id',$id);
        $get_del = $this->db->get('multiple_gallery')->row();

        if (unlink('img/files/'.$get_del->file_name)) {
            echo "The file has been deleted";
        } else {
            echo "The file was not found";
        }
      
        $this->db->where('id',$id);
        $this->db->delete('multiple_gallery');
        
        $this->session->set_flashdata('SUCCESS', 'Multiple Gallery Deleted Successfully');
        redirect('panel/multiple_gallery/multiple_gallery_list');
    }


// Add Buttion
    public function add_multiple_gallery()
    {
        $data = array();
        if($this->input->post('submitForm') && !empty($_FILES['upload_Files']['name'])){
            $filesCount = count($_FILES['upload_Files']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['upload_File']['name'] = $_FILES['upload_Files']['name'][$i];
                $_FILES['upload_File']['type'] = $_FILES['upload_Files']['type'][$i];
                $_FILES['upload_File']['tmp_name'] = $_FILES['upload_Files']['tmp_name'][$i];
                $_FILES['upload_File']['error'] = $_FILES['upload_Files']['error'][$i];
                $_FILES['upload_File']['size'] = $_FILES['upload_Files']['size'][$i];
                $uploadPath = 'img/files/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('upload_File')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created']   = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified']  = date("Y-m-d H:i:s");
                }
            }            
            if(!empty($uploadData)){
                // Insert file information into the database
                $insert = $this->panel_photo_model->insert_multiple_gallery_insert_recoard($uploadData);
                $this->session->set_flashdata('SUCCESS', 'Multiple Gallery Created Successfully');
            }
        }

        $data['getRecoard'] = $this->panel_photo_model->get_rows_multiple_gallery_pic();
        // print_r($data);
        // die();
        $data['heder_title'] = 'Add Multiple Gallery';
        $this->load->view('panel/multiple_gallery/add', $data);
    }

    public function delete_ajax_multiple_gallery()
    {
        // echo "string";
        // die();
        $id = $this->input->post('del_id');
        // print_r($id);
        // die();
        $del_id = $this->db->where('id', $id);
        $del_id = $this->db->get('multiple_gallery_pic')->row();
        
        if (unlink('img/files/'.$del_id->file_name)){

        }
        if($this->panel_photo_model->delete_rows_multiple_gallery_pic($id))
        {
            $data = array('responce' => 'success');
        }else{
            $data = array('responce' => 'error');
        }
        echo json_encode($data);
    }

}

?>