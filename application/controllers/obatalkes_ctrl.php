<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class obatalkes_ctrl extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_obatalkes','mdl_obatalkes');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('fobatalkes');
    }
 
    public function ajax_list()
    {
        $list = $this->mdl_obatalkes->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->kode;
            $row[] = $person->nama;
            $row[] = $person->jenis;
            
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->id_obat."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_person('."'".$person->id_obat."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_obatalkes->count_all(),
                        "recordsFiltered" => $this->mdl_obatalkes->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->mdl_obatalkes->get_by_id($id);
        //$data->tgl_lahir = ($data->tgl_lahir == '0000-00-00') ? '' : $data->tgl_lahir;
       // $data->sex = ($data->sex == 0) ? 'Pria' : 'Wanita';
        echo json_encode($data);
    }
 
    public function ajax_add()
    {

        $data = array(
                'kode' => $this->input->post('tkode'),
                'nama' => $this->input->post('tnama'),
                'jenis' => $this->input->post('tjenis'),
                'qty1' => $this->input->post('tqty1'),
                'qty3' => $this->input->post('tqty3'),
                'satuan1' => $this->input->post('tsatuan1'),
                'satuan3' => $this->input->post('tsatuan3'),
                'hargajual' => $this->input->post('thargajual'),
                'tipe_obat' => $this->input->post('ttipe_obat'),
        );
        $insert = $this->mdl_obatalkes->save($data,$this->input->post('tkode'));
        echo json_encode(array("status" => TRUE));
        
        

        
    }
 
    public function ajax_update()
    {
        $data = array(
                'nama' => $this->input->post('tnama'),
                'jenis' => $this->input->post('tjenis'),
                'qty1' => $this->input->post('tqty1') ,
                'qty3' => $this->input->post('tqty3') ,
                'satuan1' => $this->input->post('tsatuan1') ,
                'satuan3' => $this->input->post('tsatuan3') ,
                'hargajual' => $this->input->post('thargajual') ,
                'tipe_obat' => $this->input->post('ttipe_obat'),
            );
        $this->mdl_obatalkes->update(array('id_obat' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->mdl_obatalkes->delete_by_id($id);
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