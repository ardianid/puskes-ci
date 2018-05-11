<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class penyakit_ctrl extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_penyakit','mdl_penyakit');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('fpenyakit');
    }

    public function ajax_list()
    {
        $list = $this->mdl_penyakit->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->kd_penyakit;
            $row[] = $person->nama_penyakit;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->id_penyakit."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_person('."'".$person->id_penyakit."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_penyakit->count_all(),
                        "recordsFiltered" => $this->mdl_penyakit->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

     public function ajax_edit($id)
    {
        $data = $this->mdl_penyakit->get_by_id($id);
        //$data->tgl_lahir = ($data->tgl_lahir == '0000-00-00') ? '' : $data->tgl_lahir;
       // $data->sex = ($data->sex == 0) ? 'Pria' : 'Wanita';
        echo json_encode($data);
    }
 
    public function ajax_add()
    {

        $data = array(
            'kd_penyakit' => $this->input->post('tkd_penyakit'),
            'nama_penyakit' => $this->input->post('tnama_penyakit'),
        );
        $insert = $this->mdl_penyakit->save($data,$this->input->post('tkd_kecamatan'));
        echo json_encode(array("status" => TRUE));
        
    }

    public function ajax_update()
    {
        $data = array(
          	'kd_penyakit' => $this->input->post('tkd_penyakit'),
            'nama_penyakit' => $this->input->post('tnama_penyakit'),
            );
        $this->mdl_penyakit->update(array('id_penyakit' => $this->input->post('tid_penyakit')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->mdl_penyakit->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


}