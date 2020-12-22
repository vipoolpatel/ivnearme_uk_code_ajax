<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload_ajax extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
          $this->load->model ( 'panel/panel_upload_ajax_model', '', TRUE );
    }
    public function index() {

        redirect ( $this->config->item ( 'panel_folder' ) . '/upload_ajax/list' );   
    }
	public function upload_ajax_list()
	{
		$data['heder_title'] = 'Upload Ajax List';
		$this->load->view('panel/upload_ajax/list', $data);
    }

    function do_upload(){
        $config['upload_path']="./assets/images";
        $config['allowed_types']='gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());
 
            $title= $this->input->post('title');
            $image= $data['upload_data']['file_name']; 
             
            $result= $this->panel_upload_ajax_model->save_upload($title,$image);
            echo json_decode($result);
        }
 
    }

    function fetch()
    {
        if ($this->input->is_ajax_request()){
            $posts = $this->panel_upload_ajax_model->get_entries();
            echo json_encode($posts);
        }
    }

    function delete()
    {
        $id = $this->input->post('del_id');

        $del_id = $this->db->where('id',$id);
        $del_id = $this->db->get('gallery')->row();

        if (unlink('assets/images/'.$del_id->file_name)) {

        }

        if ($this->panel_upload_ajax_model->delete_query($id))
        {
            $data = array('responce' => 'success');
        }
        else
        {
            $data = array('responce' => 'error');
        }


        echo json_encode($data);
    } 

     public function edit(){
        if($this->input->is_ajax_request()){
            $edit_id = $this->input->post('edit_id');
            if($post = $this->panel_upload_ajax_model->single_entry($edit_id)){
                $data = array('responce' => "success", 'post' => $post);
            }else{
                $data = array('responce' => "error", 'message' => 'failed');
            }
        }
        echo json_encode($data);
    }

 
    public function update(){

            $id = $this->input->post('id');
            $title= $this->input->post('title');
            $image= $this->input->post('old_image_file');

            if(!empty($_FILES['file']['name']))
            {
                
                $config['upload_path']="./assets/images";
                $config['allowed_types']='gif|jpg|png|jpeg';
                $config['encrypt_name'] = TRUE;
                 
                $this->load->library('upload',$config);
                if($this->upload->do_upload("file")) {
                    $data = array('upload_data' => $this->upload->data());
                   if (unlink('assets/images/'.$image)) {

                    }
                  
                    $image= $data['upload_data']['file_name']; 
                     
                    $result= $this->panel_upload_ajax_model->update_entry($title,$image,$id);
                 
                }
         
            }
            else
            {
                $result= $this->panel_upload_ajax_model->update_entry($title,$image,$id);
            }

           echo json_decode($result);

    }
}



?>