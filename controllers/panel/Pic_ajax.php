<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pic_ajax extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        if(! $this->session->userdata('user_logged_in'))
        {
            redirect($this->config->item('panel_folder') . '/login');
            exit();
        }
        $this->load->model('panel/panel_modal_ajax_model', '', TRUE);
        
    }

    public function index()
    {
        redirect($this->config->item('panel_folder') . '/pic_ajax/pic_ajax_list');
    }
    public function pic_ajax_list()
    {
        $data['get_recoard'] = $this->db->get('pic_ajax_img')->result();
        $data['heder_title'] = 'Pic Ajax List';
        $this->load->view('panel/pic_ajax/list', $data);
    }
    public function add_pic_ajax()
    {
        $data['heder_title'] = 'Add Pic Ajax';
        $this->load->view('panel/pic_ajax/add', $data);
    }
    public function pic_ajax_insert()
    {
        $config['upload_path']="./img/ajax_img";
        $config['allowed_types']='gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());
           
            $f_name      = $this->input->post('f_name');
            $a_address   = $this->input->post('address');
            $image_pic   = $data['upload_data']['file_name']; 
            // print_r($image_pic);
            // die();
            $result = $this->panel_modal_ajax_model->save_ajax_insert_in_database($f_name,$a_address,$image_pic);
            echo json_decode($result);
        }
    }
    
    public function edit_pic_ajax($id)
    {
        $get_recoard = $this->db->where('id', $id);
        $get_recoard = $this->db->get('pic_ajax_img')->row();
        $data['getRow'] = $get_recoard; 
        $data['heder_title'] = 'Edit Pic Ajax';
        $this->load->view('panel/pic_ajax/edit', $data);
    }

    public function pic_ajax_update()
    {
        
        $id = $this->input->post('id');
        $f_name      = $this->input->post('f_name');
        $a_address   = $this->input->post('address');
        // print_r($id);
        // die(); 
        $image_pic = $this->input->post('old_image_file');

        if(!empty($_FILES['file']['name']))
        {
            
            $config['upload_path']="./img/ajax_img";
            $config['allowed_types']='gif|jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;
             
            $this->load->library('upload',$config);
            if($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
               if (unlink('img/ajax_img/'.$image_pic)) {

                }
              
                $image_pic = $data['upload_data']['file_name']; 
                 
                $result= $this->panel_modal_ajax_model->Update_ajax_Update_in_database($id,$f_name,$a_address,$image_pic);
             
            }
     
        }
        else
        {
            $result= $this->panel_modal_ajax_model->Update_ajax_Update_in_database($id,$f_name,$a_address,$image_pic);
        }

       echo json_decode($result);
    }

    public function pic_ajax_delete()
    {
        // echo "heeyy";
        // die();
        $id = $this->input->post('del_id');
        // print_r($id);
        // die();

        
        $del_id = $this->db->where('id',$id);
        $del_id = $this->db->get('pic_ajax_img')->row();

        if (unlink('img/ajax_img/'.$del_id->profile_pic)) {

        }

       
        if($this->panel_modal_ajax_model->pic_dalete_in_database($id))
        {
            $data = array('responce' => 'success');
        }
        else
        {
            $data = array('responce' => 'error');
        }
        echo json_encode($data);
    }

    public function view_pic_ajax()
    {
        if($this->input->is_ajax_request()){
            $id = $this->input->post('view_id');
            // print_r($id);
            // die();
            if($post = $this->panel_modal_ajax_model->view_pic_ajax_single_entry($id)){
                $data = array('responce' => "success", 'post' => $post);
            }else{
                $data = array('responce' => "error", 'message' => 'failed');
            }
        }
        echo json_encode($data);
    }
    
}
 
?>