<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modal_ajax extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
           $this->load->model ( 'panel/panel_modal_ajax_model', '', TRUE );
    }

    function index() {

        redirect ( $this->config->item ( 'panel_folder' ) . '/modal_ajax/modal_ajax_list' );   
    }
    function modal_ajax_list()
    {
         $data['heder_title'] = 'Modal Ajax List';
           $this->load->view('panel/modal_ajax/modal_ajax_list', $data);   
    }
    function insert()
    {
        if ($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            
            if ($this->form_validation->run() == FALSE)
            {
                $data = array('responce' => 'error', 'message' => validation_errors());
            }else{
                  $ajax_data = $this->input->post();
                  if ($this->panel_modal_ajax_model->insert_entry($ajax_data)){
                  $data = array('responce' => 'success', 'message' => 'Data added successfully');
                  }else{
                     $data = array('responce' => 'error', 'message' => 'failed');
                  }
            }
        }else
        {
            echo "No direct script access allowed";
        }
        echo json_encode($data);
    }

    // select and show database data

    function fetch()
    {
        if ($this->input->is_ajax_request()){
            $posts = $this->panel_modal_ajax_model->get_entries();
            echo json_encode($posts);
        }
    }

    function delete()
    {
        if ($this->input->is_ajax_request()){
            $del_id = $this->input->post('del_id');
            if ($this->panel_modal_ajax_model->delete_query($del_id)){
                $data = array('responce' => 'success');

            }else{
                $data = array('responce' => 'error');
            }
        }
        echo json_encode($data);
    }

    public function edit(){
        if($this->input->is_ajax_request()){
            $edit_id = $this->input->post('edit_id');
            if($post = $this->panel_modal_ajax_model->single_entry($edit_id)){
                $data = array('responce' => "success", 'post' => $post);
            }else{
                $data = array('responce' => "error", 'message' => 'failed');
            }
        }
        echo json_encode($data);
    }

    public function update()
    {
        if ($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('edit_name', 'Name', 'required');
            $this->form_validation->set_rules('edit_email', 'Email', 'required|valid_email');
            
            if ($this->form_validation->run() == FALSE)
            {
                $data = array('responce' => 'error', 'message' => validation_errors());
            }else{
                  $data['id'] = $this->input->post('edit_id');
                  $data['name'] = $this->input->post('edit_name');
                  $data['email'] = $this->input->post('edit_email');
                  if ($this->panel_modal_ajax_model->update_entry($data)){
                  $data = array('responce' => 'success', 'message' => 'Data update successfully');
                  }else{
                     $data = array('responce' => 'error', 'message' => 'failed');
                  }
            }
        }else
        {
            echo "No direct script access allowed";
        }
        echo json_encode($data);
    }


    //Ajax Start

    public function ajax_list()
    {
        $data['heder_title'] = 'Ajax List';
        $this->load->view('panel/ajax/list', $data);
    }

    public function add_ajax()
    {
        $data['heder_title'] = 'Ajax Add';
        $this->load->view('panel/ajax/add', $data);
    }
    public function ajax_insert()
    {
       // echo "<pre>";
       // print_r($_POST);
       // echo "<pre/>";
       // die();
        if(isset($_FILES["image_logo"]["name"]))
        {
            $config['upload_path'] = 'img/ajax_img';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('image_logo'))
            {
                echo $this->upload->display_errors();  
            }else
            {
                $data = array('upload_data' => $this->upload->data());
                $f_name       = $this->input->post('f_name');
                // print_r($type);
                // die();
                $type         = $this->input->post('type');
                $image_logo = $data['upload_data']['file_name'];
                $result = $this->panel_modal_ajax_model->save_upload($f_name,$type,$image_logo);

            echo json_decode($result);             

            }
        }
    }

    public function view_ajax()
    {
        // echo "heee";
        // die();
        $data = $this->panel_modal_ajax_model->view_ajax_display_records();
        // print_r($data);
        // die();

      //  echo json_encode($data);

        $i=1;
        foreach($data as $row)
        {
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$row->f_name."</td>";
            echo "<td>".$row->type."</td>";
            echo "<td>";
                 if(!empty($row->image_logo)){
                   echo "<img style='width:100px;' src=".base_url()."/img/ajax_img/".$row->image_logo.">";
                 } 
                echo "</td>";
            echo "<td>
                   <a href='javascript:;' class='btn btn-info ajax_edit' data=".$row->id.">Edit</a>
                   <a href='javascript:;' class='btn btn-danger item-delete' data=".$row->id.">Delete</a>
                 </td>";
            echo "</tr>";
            $i++;
        }

    }


    public function edit_ajax_list(){
        $edit_id = $this->input->post('edit_id');
        // print_r($edit_id);
        // die();
        if($this->input->is_ajax_request()){
            if($post = $this->panel_modal_ajax_model->edit_ajax_single_entry($id)){
                $data = array('responce' => "success", 'post' => $post);
            }
            else
            {
                $data = array('responce' => "error", 'message' => 'failed');
            }
        }
        echo json_encode($data);
    }
    
}
