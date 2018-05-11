<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class kecamatan_ctrl extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_kecamatan','mdl_kecamatan');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('fkecamatan');
    }
 
    public function ajax_list()
    {
        $list = $this->mdl_kecamatan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nama_kec;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->kd_kec."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_person('."'".$person->kd_kec."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_kecamatan->count_all(),
                        "recordsFiltered" => $this->mdl_kecamatan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->mdl_kecamatan->get_by_id($id);
        //$data->tgl_lahir = ($data->tgl_lahir == '0000-00-00') ? '' : $data->tgl_lahir;
       // $data->sex = ($data->sex == 0) ? 'Pria' : 'Wanita';
        echo json_encode($data);
    }
 
    public function ajax_add()
    {

        $data = array(
            'nama_kec' => $this->input->post('tnama_kecamatan'),
        );
        $insert = $this->mdl_kecamatan->save($data,$this->input->post('tnama_kecamatan'));
        echo json_encode(array("status" => TRUE));
        
        

        
    }
 
    public function ajax_update()
    {
        $data = array(
                'nama_kec' => $this->input->post('tnama_kecamatan'),
            );
        $this->mdl_kecamatan->update(array('kd_kec' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->mdl_kecamatan->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
}