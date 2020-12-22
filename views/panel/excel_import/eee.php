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

                if (!empty($value['A']) && !empty($value['AW'])) {
                    if ($i != '1') {
                        $check = $this->db->where('postcode', $value['A']);
                        $check = $this->db->get('postcode_uk')->num_rows();
                        if ($check == '0') {

        $array = array(
            'postcode'        => !empty($value['A']) ? $value['A'] : '',
            'in_use'          => !empty($value['B']) ? $value['B'] : '',
            'latitude'        => !empty($value['C']) ? $value['C'] : '',
            'longitude'       => !empty($value['D']) ? $value['D'] : '',
            'easting'         => !empty($value['E']) ? $value['E'] : '',
            'northing'        => !empty($value['F']) ? $value['F'] : '',
            'grid_ref'        => !empty($value['G']) ? $value['G'] : '',
            'county'          => !empty($value['H']) ? $value['H'] : '',
            'district'        => !empty($value['I']) ? $value['I'] : '',
            'ward'            => !empty($value['J']) ? $value['J'] : '',
            'district_code'   => !empty($value['K']) ? $value['K'] : '',
            'ward_code'       => !empty($value['L']) ? $value['L'] : '',
            'country'         => !empty($value['M']) ? $value['M'] : '',
            'county_code'     => !empty($value['N']) ? $value['N'] : '',
            'constituency'    => !empty($value['O']) ? $value['O'] : '',
            'introduced'      => !empty($value['P']) ? $value['P'] : '',
            'terminated'      => !empty($value['Q']) ? $value['Q'] : '',
            'parish'          => !empty($value['R']) ? $value['R'] : '',
            'national_park'   => !empty($value['S']) ? $value['S'] : '',
            'population'      => !empty($value['T']) ? $value['T'] : '',
            'households'      => !empty($value['U']) ? $value['U'] : '',
            'built_up_area'   => !empty($value['V']) ? $value['V'] : '',
            'built_up_sub_division'         => !empty($value['W']) ? $value['W'] : '',
            'lower_layer_super_output_area' => !empty($value['X']) ? $value['X'] : '',
            'rural_urban'                   => !empty($value['Y']) ? $value['Y'] : '',
            'region'                        => !empty($value['Z']) ? $value['Z'] : '',
            'altitude'                      => !empty($value['AA']) ? $value['AA'] : '',
            'london_zone'                   => !empty($value['AB']) ? $value['AB'] : '',
            'lsoa_code'                     => !empty($value['AC']) ? $value['AC'] : '',
            'local_authority'               => !empty($value['AD']) ? $value['AD'] : '',
            'msoa_code'                     => !empty($value['AE']) ? $value['AE'] : '',
            'middle_layer_super_output_area'=> !empty($value['AF']) ? $value['AF'] : '',
            'parish_code'                   => !empty($value['AG']) ? $value['AG'] : '',
            'census_output_area'            => !empty($value['AH']) ? $value['AH'] : '',
            'constituency_code'             => !empty($value['AI']) ? $value['AI'] : '',
            'index_of_multiple_deprivation' => !empty($value['AJ']) ? $value['AJ'] : '',
            'quality'                       => !empty($value['AK']) ? $value['AK'] : '',
            'user_type'                     => !empty($value['AL']) ? $value['AL'] : '',
            'last_updated'                  => !empty($value['AM']) ? $value['AM'] : '',
            'nearest_station'               => !empty($value['AN']) ? $value['AN'] : '',
            'distance_to_station'           => !empty($value['AO']) ? $value['AO'] : '',
            'postcode_area'                 => !empty($value['AP']) ? $value['AP'] : '',
            'postcode_district'             => !empty($value['AQ']) ? $value['AQ'] : '',
            'police_force'                  => !empty($value['AR']) ? $value['AR'] : '',
            'water_company'                 => !empty($value['AS']) ? $value['AS'] : '',
            'plus_code'                     => !empty($value['AT']) ? $value['AT'] : '',
            'average_income'                => !empty($value['AU']) ? $value['AU'] : '',
            'sewage_company'                => !empty($value['AV']) ? $value['AV'] : '',
            'travel_to_work_area'           => !empty($value['AW']) ? $value['AW'] : '',
            


            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        );

                            $this->db->insert('postcode_uk', $array);

                        }
                    }
                    $i++;
                }
            }

            // $this->session->set_flashdata('SUCCESS', 'Excel Import Created Successfully');
            // redirect('panel/excel_import/excel_import_list');
        }


        $data['heder_title'] = 'Excel Import';
        $this->load->view('panel/excel_import/excel_import_list',$data);
    }
    
}
