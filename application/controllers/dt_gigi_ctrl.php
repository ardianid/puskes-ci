<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class dt_gigi_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dt_gigi','mdl_dt_gigi');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fdt_gigi',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $thn = $_POST['thn'];
        $bln = $_POST['bln'];
        $desa = $_POST['desa'];

        $list = $this->mdl_dt_gigi->get_datatables_pencarian($thn,$bln,$desa);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->thn_gigi;
            $row[] = $person->bln_gigi;
            $row[] = $person->nama_puskes;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_ins('."'".$person->id_gigi."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger"  title="Hapus" onclick="return delete_ins('."'".$person->id_gigi."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_dt_gigi->count_all_pencarian($thn,$bln,$desa),
                        "recordsFiltered" => $this->mdl_dt_gigi->count_filtered_pencarian($thn,$bln,$desa),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_dt_gigi->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'thn_gigi' => $this->input->post('thn_gigi'),
                'bln_gigi' => $this->input->post('bln_gigi'),
                'kd_puskes' => $this->input->post('kd_puskes'),
                'jml_perlu' => $this->input->post('jml_perlu'),
                'jml_perlu_pr' => $this->input->post('jml_perlu_pr'),
                'jml_dapat' => $this->input->post('jml_dapat'),
                'jml_dapat_pr' => $this->input->post('jml_dapat_pr'),
                
            );
        $insert = $this->mdl_dt_gigi->save($data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_update()
    {
        $data = array(
                'thn_gigi' => $this->input->post('thn_gigi'),
                'bln_gigi' => $this->input->post('bln_gigi'),
                'kd_puskes' => $this->input->post('kd_puskes'),
                'jml_perlu' => $this->input->post('jml_perlu'),
                'jml_perlu_pr' => $this->input->post('jml_perlu_pr'),
                'jml_dapat' => $this->input->post('jml_dapat'),
                'jml_dapat_pr' => $this->input->post('jml_dapat_pr'),
            );

        $this->mdl_dt_gigi->update(array('id_gigi' => $this->input->post('id_gigi')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_delete($id)
    {
        $this->mdl_dt_gigi->delete($id);
        echo json_encode(array("status" => TRUE));
    }


}