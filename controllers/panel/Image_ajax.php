<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Image_ajax extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        if (! $this->session->userdata('user_logged_in'))
        {
            redirect($this->config->item('panel_folder') . '/login');
            exit();
        }
        $this->load->model('panel/panel_modal_ajax_model', '', TRUE);
    }

    public function index()
    {
        redirect($this->config->item('panel_folder') . '/image_ajax/image_ajax_list');
    }
    public function image_ajax_list()
    {
        $data['get_record'] = $this->db->get('image_ajax')->result();
        $data['heder_title'] = 'Image Ajax List';
        $this->load->view('panel/image_ajax/list', $data);
    }
    public function add_image_ajax()
    {
        
        $data['heder_title'] = 'Image Ajax Add';
        $this->load->view('panel/image_ajax/add', $data);
    }
    public function image_ajax_insert()
    {
        
        
            $f_name = $this->input->post('first_name');
            $l_name = $this->input->post('last_name');
            $c_name = $this->input->post('city_name');
            // print_r($c_name);
            // die();
            
            $InsertRecoard = $this->panel_modal_ajax_model->save_in_database($f_name, $l_name, $c_name);

            // print_r($InsertRecoard);
            // die();
            echo json_decode($InsertRecoard);
        
    }
    public function edit_image_ajax($id)
    {
        $get_r = $this->db->where('id', $id);
        $get_r = $this->db->get('image_ajax')->row();
        $data['get_r'] = $get_r;
        
        $data['heder_title'] = "Image Ajax Edit";
        $this->load->view('panel/image_ajax/edit', $data);
    }

    public function image_ajax_update()
    {
        $id     = $this->input->post('id');
        $f_name = $this->input->post('first_name');
        $l_name = $this->input->post('last_name');
        $c_name = $this->input->post('city_name');
        // print_r($c_name);
        // die(); 
        $UpdateRecord = $this->panel_modal_ajax_model->update_in_database($id,$f_name,$l_name,$c_name); 
        // print_r($UpdateRecord);
        // die();
        echo json_decode($UpdateRecord);   
    }

    public function image_ajax_delete()
    {
        // echo "heeyy";
        // die();
        $id = $this->input->post('del_id');
        // print_r($id);
        // die();
       
        if($this->panel_modal_ajax_model->dalete_in_database($id))
        {
            $data = array('responce' => 'success');
        }
        else
        {
            $data = array('responce' => 'error');
        }
        echo json_encode($data);
    }

    public function view_image_ajax(){
        if($this->input->is_ajax_request()){
            $id = $this->input->post('view_id');
            if($post = $this->panel_modal_ajax_model->view_image_ajax_single_entry($id)){
                $data = array('responce' => "success", 'post' => $post);
            }else{
                $data = array('responce' => "error", 'message' => 'failed');
            }
        }
        echo json_encode($data);
    }
}
?>