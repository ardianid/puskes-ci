<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class lap_rekam_medik_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_lap_rekam_medik','mdl_lap_rekam_medik');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('frekam_medik',$data);
    }

public function ajax_export_excel(){

    $kd_pasien = $this->input->post('tkode_in');

    $this->mdl_lap_rekam_medik->export_excel($kd_pasien);

}


}