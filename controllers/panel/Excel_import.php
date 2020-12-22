<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Excel_import extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }

        require_once APPPATH . 'third_party/PHPExcel.php';
        $this->excel = new PHPExcel();
    
    }

    public function excel_import_list() {

        if (isset($_FILES['result_file'])) {
            ini_set('memory_limit', '20000M');
            ini_set('max_execution_time', 600); //600 seconds = 10 minutes

            $newfile = 'assets/postcode/';
            $postname = date('YmdHis') . $_FILES['result_file']['name'];
            move_uploaded_file($_FILES['result_file']['tmp_name'], $newfile . $postname);

            $file_type = PHPExcel_IOFactory::identify($newfile . $postname);

            $objReader = PHPExcel_IOFactory::createReader($file_type);
            $objPHPExcel = $objReader->load($newfile . $postname);
            $sheet_data = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

            $i = 1;
            foreach ($sheet_data as $value) {

                // if (!empty($value['A']) && !empty($value['C'])) {
                //     if ($i != '1') {
                //         $check = $this->db->where('email', $value['C']);
                //         $check = $this->db->get('postcode_uk_no')->num_rows();
                //         if ($check == '0') {

                            
                //             $array = array(
                //                 'username' => !empty($value['A']) ? $value['A'] : '',
                //                 'lastname' => !empty($value['B']) ? $value['B'] : '',
                //                 'email' => !empty($value['C']) ? $value['C'] : '',
                //                 'created_at'  => date('Y-m-d H:i:s'),
                //                 'updated_at'  => date('Y-m-d H:i:s'),
                //             );

                //             $this->db->insert('postcode_uk_no', $array);

                //         }
                //     }
                //     $i++;
                // }

                if (!empty($value['A'])) {
                    if ($i != '1') {
                        $check = $this->db->where('postcode', $value['A']);
                        $check = $this->db->get('postcode_uk_no')->num_rows();
                        if ($check == '0') {

                            
                            $array = array(
                                'postcode' => !empty($value['A']) ? $value['A'] : '',
                                'created_at'  => date('Y-m-d H:i:s'),
                                'updated_at'  => date('Y-m-d H:i:s'),
                            );

                            $this->db->insert('postcode_uk_no', $array);

                        }
                    }
                    $i++;
                }
            }

             $this->session->set_flashdata('SUCCESS', 'Excel Import Created Successfully');
             redirect('panel/excel_import/excel_import_list');
        }


        $data['heder_title'] = 'Excel Import';
        $this->load->view('panel/excel_import/excel_import_list',$data);
    }
    
}
