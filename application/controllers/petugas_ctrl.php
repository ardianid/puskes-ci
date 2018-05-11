<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class petugas_ctrl extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_petugas','mdl_petugas');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('fpetugas');
    }
 
    public function ajax_list()
    {
        $list = $this->mdl_petugas->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->kd_petugas;
            $row[] = $person->nama_petugas;
            $row[] = $person->posisi;
            
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_petugas->count_all(),
                        "recordsFiltered" => $this->mdl_petugas->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->mdl_petugas->get_by_id($id);
        //$data->tgl_lahir = ($data->tgl_lahir == '0000-00-00') ? '' : $data->tgl_lahir;
       // $data->sex = ($data->sex == 0) ? 'Pria' : 'Wanita';
        echo json_encode($data);
    }
 
    public function ajax_add()
    {

        $data = array(
                'kd_petugas' => $this->input->post('tkode'),
                'nama_petugas' => $this->input->post('tnama'),
                'posisi' => $this->input->post('tposisi'),
                
            );
        $insert = $this->mdl_petugas->save($data,$this->input->post('tkode'));
        echo json_encode(array("status" => TRUE));
        
        

        
    }
 
    public function ajax_update()
    {
        $data = array(
                'nama_petugas' => $this->input->post('tnama'),
                'posisi' => $this->input->post('tposisi'),
            );
        $this->mdl_petugas->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->mdl_petugas->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('tkd_pasien') == '')
        {
            $data['inputerror'][] = 'tkd_pasien';
            $data['error_string'][] = 'Kode harus diisi';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('tnama') == '')
        {
            $data['inputerror'][] = 'tnama';
            $data['error_string'][] = 'Nama harus diisi';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('talamat') == '')
        {
            $data['inputerror'][] = 'talamat';
            $data['error_string'][] = 'Alamat harus diisi';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('tsex') == '')
        {
            $data['inputerror'][] = 'tsex';
            $data['error_string'][] = 'Jenis kelamin harus diisi';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('ttgl_lahir') == '')
        {
            $data['inputerror'][] = 'ttgl_lahir';
            $data['error_string'][] = 'Tgl Lahir harus diisi';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

 
}