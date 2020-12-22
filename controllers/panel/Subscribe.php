<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subscribe extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_subscribe_model', '', TRUE );

    }

    public function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/subscribe/subscribe_list' );
    }

    public function subscribe_list() {

        $this->load->library ( 'pagination' );

        $total = $this->panel_subscribe_model->countsubscribe();
        $per_page = 40;
        $data['getSubscribe'] = $this->panel_subscribe_model->getsubscribe($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/subscribe/subscribe_list';


        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );


        $data['heder_title'] = 'Subscribe List';
        $this->load->view('panel/subscribe/subscribe_list',$data);
    }


    public function delete_subscribe($id) {
        $this->db->where('id',$id);
        $this->db->delete('subscribe');

        $this->session->set_flashdata('SUCCESS', 'Subscribe Deleted Successfully');
        redirect('panel/subscribe/subscribe_list');
    }


    public function ChnageStageStatus() {
		$id = $this->input->post('id');
		$value = $this->input->post('value');

		$this->db->set('status', $value);
		$this->db->where('id', $id);
		$this->db->update('subscribe');
		$json['success'] = true;
		echo json_encode($json);
	}


}
