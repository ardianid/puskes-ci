<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class lap_lb1_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_lap_lb1','mdl_lap_lb1');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('flb1',$data);
    }

public function ajax_export_excel(){

    $bln = $this->input->post('tbln_in');
    $thn = $this->input->post('tthn_in');
    $kd_puskes = $this->input->post('tkd_puskes_in');

    $this->mdl_lap_lb1->export_excel($bln,$thn,$kd_puskes);

}


}