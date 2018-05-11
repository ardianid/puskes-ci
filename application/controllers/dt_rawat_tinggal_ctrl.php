<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class dt_rawat_tinggal_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dt_rawat_tinggal','mdl_dt_rawat_tinggal');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fdt_rawat_tinggal',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $thn = $_POST['thn'];
        $bln = $_POST['bln'];
        $desa = $_POST['desa'];

        $list = $this->mdl_dt_rawat_tinggal->get_datatables_pencarian($thn,$bln,$desa);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->thn_rawat;
            $row[] = $person->bln_rawat;
            $row[] = $person->nama_puskes;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_ins('."'".$person->id_rawatt."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_ins('."'".$person->id_rawatt."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_dt_rawat_tinggal->count_all_pencarian($thn,$bln,$desa),
                        "recordsFiltered" => $this->mdl_dt_rawat_tinggal->count_filtered_pencarian($thn,$bln,$desa),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_dt_rawat_tinggal->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'thn_rawat' => $this->input->post('thn_rawat'),
                'bln_rawat' => $this->input->post('bln_rawat'),
                'kd_puskes' => $this->input->post('kd_puskes'),
                'jml_hml_pr' => $this->input->post('jml_hml_pr'),
                'jml_balita' => $this->input->post('jml_balita'),
                'jml_balita_pr' => $this->input->post('jml_balita_pr'),
                'jml_kasus' => $this->input->post('jml_kasus'),
                'jml_kasus_pr' => $this->input->post('jml_kasus_pr'),
                'jml_khusus' => $this->input->post('jml_khusus'),
                'jml_khusus_pr' => $this->input->post('jml_khusus_pr'),
                
            );
        $insert = $this->mdl_dt_rawat_tinggal->save($data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_update()
    {
        $data = array(
                'thn_rawat' => $this->input->post('thn_rawat'),
                'bln_rawat' => $this->input->post('bln_rawat'),
                'kd_puskes' => $this->input->post('kd_puskes'),
                'jml_hml_pr' => $this->input->post('jml_hml_pr'),
                'jml_balita' => $this->input->post('jml_balita'),
                'jml_balita_pr' => $this->input->post('jml_balita_pr'),
                'jml_kasus' => $this->input->post('jml_kasus'),
                'jml_kasus_pr' => $this->input->post('jml_kasus_pr'),
                'jml_khusus' => $this->input->post('jml_khusus'),
                'jml_khusus_pr' => $this->input->post('jml_khusus_pr'),
            );

        $this->mdl_dt_rawat_tinggal->update(array('id_rawatt' => $this->input->post('id_rawatt')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_delete($id)
    {
        $this->mdl_dt_rawat_tinggal->delete($id);
        echo json_encode(array("status" => TRUE));
    }


}