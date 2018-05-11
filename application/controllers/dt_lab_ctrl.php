<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class dt_lab_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dt_lab','mdl_dt_lab');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fdt_lab',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $thn = $_POST['thn'];
        $bln = $_POST['bln'];
        $desa = $_POST['desa'];

        $list = $this->mdl_dt_lab->get_datatables_pencarian($thn,$bln,$desa);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->thn_lab;
            $row[] = $person->bln_lab;
            $row[] = $person->nama_puskes;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_ins('."'".$person->id_lab."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_ins('."'".$person->id_lab."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_dt_lab->count_all_pencarian($thn,$bln,$desa),
                        "recordsFiltered" => $this->mdl_dt_lab->count_filtered_pencarian($thn,$bln,$desa),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_dt_lab->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'thn_lab' => $this->input->post('thn_lab'),
                'bln_lab' => $this->input->post('bln_lab'),
                'kd_puskes' => $this->input->post('kd_puskes'),

                'jml_sdr' => $this->input->post('jml_sdr'),
                'jml_sdr_pr' => $this->input->post('jml_sdr_pr'),
                'jml_airsen' => $this->input->post('jml_airsen'),
                'jml_airsen_pr' => $this->input->post('jml_airsen_pr'),
                'jml_tinj' => $this->input->post('jml_tinj'),
                'jml_tinj_pr' => $this->input->post('jml_tinj_pr'),
                'jml_bt' => $this->input->post('jml_bt'),
                'jml_bt_pr' => $this->input->post('jml_bt_pr'),
                'jml_bt2' => $this->input->post('jml_bt2'),
                'jml_bt2_pr' => $this->input->post('jml_bt2_pr'),
                'jml_drah_ml' => $this->input->post('jml_drah_ml'),
                'jml_drah_ml_pr' => $this->input->post('jml_drah_ml_pr'),
                'jml_drah_ml2' => $this->input->post('jml_drah_ml2'),
                'jml_drah_ml2_pr' => $this->input->post('jml_drah_ml2_pr'),
                'jml_drah_ml3' => $this->input->post('jml_drah_ml3'),
                'jml_drah_ml3_pr' => $this->input->post('jml_drah_ml3_pr'),
                'jml_kust' => $this->input->post('jml_kust'),
                'jml_kust_pr' => $this->input->post('jml_kust_pr'),
                'jml_kust2' => $this->input->post('jml_kust2'),
                'jml_kust2_pr' => $this->input->post('jml_kust2_pr'),
                'jml_lain' => $this->input->post('jml_lain'),
                'jml_lain_pr' => $this->input->post('jml_lain_pr'),

            );
        $insert = $this->mdl_dt_lab->save($data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_update()
    {
        $data = array(
             'thn_lab' => $this->input->post('thn_lab'),
                'bln_lab' => $this->input->post('bln_lab'),
                'kd_puskes' => $this->input->post('kd_puskes'),

                'jml_sdr' => $this->input->post('jml_sdr'),
                'jml_sdr_pr' => $this->input->post('jml_sdr_pr'),
                'jml_airsen' => $this->input->post('jml_airsen'),
                'jml_airsen_pr' => $this->input->post('jml_airsen_pr'),
                'jml_tinj' => $this->input->post('jml_tinj'),
                'jml_tinj_pr' => $this->input->post('jml_tinj_pr'),
                'jml_bt' => $this->input->post('jml_bt'),
                'jml_bt_pr' => $this->input->post('jml_bt_pr'),
                'jml_bt2' => $this->input->post('jml_bt2'),
                'jml_bt2_pr' => $this->input->post('jml_bt2_pr'),
                'jml_drah_ml' => $this->input->post('jml_drah_ml'),
                'jml_drah_ml_pr' => $this->input->post('jml_drah_ml_pr'),
                'jml_drah_ml2' => $this->input->post('jml_drah_ml2'),
                'jml_drah_ml2_pr' => $this->input->post('jml_drah_ml2_pr'),
                'jml_drah_ml3' => $this->input->post('jml_drah_ml3'),
                'jml_drah_ml3_pr' => $this->input->post('jml_drah_ml3_pr'),
                'jml_kust' => $this->input->post('jml_kust'),
                'jml_kust_pr' => $this->input->post('jml_kust_pr'),
                'jml_kust2' => $this->input->post('jml_kust2'),
                'jml_kust2_pr' => $this->input->post('jml_kust2_pr'),
                'jml_lain' => $this->input->post('jml_lain'),
                'jml_lain_pr' => $this->input->post('jml_lain_pr'),

            );

        $this->mdl_dt_lab->update(array('id_lab' => $this->input->post('id_lab')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_delete($id)
    {
        $this->mdl_dt_lab->delete($id);
        echo json_encode(array("status" => TRUE));
    }



}