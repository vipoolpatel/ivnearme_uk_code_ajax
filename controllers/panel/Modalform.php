<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modalform extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }

        $this->load->model ( 'panel/panel_modal_form_model', '', TRUE );

    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/modalform/modal_form_list' );
    }

    function modal_form_list() {

        $this->load->library ( 'pagination' );

        $total = $this->panel_modal_form_model->countModal();
        $per_page = 40;
        $data['getModal'] = $this->panel_modal_form_model->getForm($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/modalform/modal_form_list';


        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );


        $data['heder_title'] = 'Modal Form List';
        $this->load->view('panel/modal_form/modal_form_list',$data);
    }

     function add_modal_form() {
         if(!empty($_POST))
         {

         $this->panel_modal_form_model->order_summary_insert();
            $this->session->set_flashdata('SUCCESS', 'Modal Form Created Successfully');
            redirect('panel/modalform/modal_form_list');

         }
        $data['heder_title'] = 'Add Modal Form';
        $this->load->view('panel/modal_form/add_modal_form',$data);
    }


     function edit_modal_form($id) {
         if(!empty($_POST))
         {


           $this->panel_modal_form_model->order_edit_update();
           $this->session->set_flashdata('SUCCESS', 'Modal Form Updated Successfully');
            redirect('panel/modalform/modal_form_list');
         }


        $vipul = $this->db->get('modal_form_table')->row();

        $data['vipul'] = $vipul;
        $data['heder_title'] = 'Edit Patient';
        $this->load->view('panel/modal_form/edit_modal_form',$data);
    }

    function view_modal_form($id) {

        $data['upcomming'] = $this->panel_modal_form_model->view_data_form($id);

        $data['heder_title'] = 'View Modal Form';

        $this->load->view('panel/modal_form/view_modal_form', $data);
    }

public function delete_row_form($id) {

   $this->panel_modal_form_model->delete_row_form_modal($id);

   $this->session->set_flashdata('SUCCESS', 'Modal Form Deleted Successfully');
   redirect('panel/modalform/modal_form_list');
}




}
