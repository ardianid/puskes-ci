<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class daftar_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_daftar','mdl_daftar');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['kd_puskes'] = $session_data['kd_puskes'];

         $data['qpoli'] = $this->mdl_daftar->get_poli(); //query model semua barang
         $data['qruangan'] = $this->mdl_daftar->get_ruangan(); //query model semua barang
         $data['qkamar'] = $this->mdl_daftar->get_kamar(); //query model semua barang

        $this->load->view('fdaftar',$data);
    }


    /* ajax list rawat jalan */
    public function ajax_list()
    {

        $tanggal = $_POST['tanggal'];
        $kd_puskes = $_POST['kd_puskes'];

        $list = $this->mdl_daftar->get_datatables($tanggal,$kd_puskes);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nobukti_d;
            $row[] = $person->tanggal_msk;
            $row[] = $person->nama_poli;
            $row[] = $person->nama_petugas;
            $row[] = $person->nama;
            $row[] = $person->alamat;
            
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->id_daftar."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger"  title="Hapus" onclick="return delete_person('."'".$person->id_daftar."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_daftar->count_all($tanggal,$kd_puskes),
                        "recordsFiltered" => $this->mdl_daftar->count_filtered($tanggal,$kd_puskes),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    /* ajax list rawat inap */
    public function ajax_list_inap()
    {

        $tanggal = $_POST['tanggal'];
        $kd_puskes = $_POST['kd_puskes'];

        $list = $this->mdl_daftar->get_datatables_inap($tanggal,$kd_puskes);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nobukti_d;
            $row[] = $person->tanggal_msk;
            $row[] = $person->nama;
            $row[] = $person->alamat;
            $row[] = $person->nama_ruang;
            $row[] = $person->nama_kamar;
            $row[] = $person->no_tidur;
            $row[] = $person->nama_petugas;
            
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_person_inap('."'".$person->id_daftar."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_person_inap('."'".$person->id_daftar."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_daftar->count_all_inap($tanggal,$kd_puskes),
                        "recordsFiltered" => $this->mdl_daftar->count_filtered_inap($tanggal,$kd_puskes),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }



    /* edit rawat jalan */
    public function ajax_edit($id)
    {
        $data = $this->mdl_daftar->get_by_id($id);
        $data->tanggal_msk = ($data->tanggal_msk == '0000-00-00') ? '' : $data->tanggal_msk;
       // $data->sex = ($data->sex == 0) ? 'Pria' : 'Wanita';
        echo json_encode($data);
    }

    /* edit rawat inap */
    public function ajax_edit_inap($id)
    {
        $data = $this->mdl_daftar->get_by_id_inap($id);
        $data->tanggal_msk = ($data->tanggal_msk == '0000-00-00') ? '' : $data->tanggal_msk;
       // $data->sex = ($data->sex == 0) ? 'Pria' : 'Wanita';
        echo json_encode($data);
    }

 
    /* tambah rawat jalan */
    public function ajax_add()
    {

            $data = array(
                'tanggal_msk' => $this->input->post('ttanggal'),
                'kd_pasien' => $this->input->post('tkd_pasien'),
                'nama_poli' => $this->input->post('tnama_poli'),
                'kd_petugas' => $this->input->post('tkd_petugas'),
                "nobukti_d" => $this->input->post('tbukti1'),
                'jenis_daftar' => '1',
                "kd_puskes" => $this->input->post('tkd_puskes'),
                "umur_pasien" => $this->input->post('tumur_pasien'),
                "umur_hr" => $this->input->post('tumur_hr'),
                "umur_bln" => $this->input->post('tumur_bln'),
                "umur_thn" => $this->input->post('tumur_thn'),

            );
        $insert = $this->mdl_daftar->save($data);
        echo json_encode(array("status" => TRUE));
    }

    /* tambah rawat inap */
    public function ajax_add_inap()
    {

            $data = array(
                'tanggal_msk' => $this->input->post('ttanggal_msk'),
                'kd_pasien' => $this->input->post('tkd_pasien_inap'),
                'kd_petugas' => $this->input->post('tkd_petugas_inap'),
                'nama_ruang' => $this->input->post('tnama_ruang'),
                'nama_kelas' => $this->input->post('tnama_kelas'),
                'nama_kamar' => $this->input->post('tnama_kamar'),
                'no_tidur' => $this->input->post('tno_tidur'),
                'jenis_daftar' => '2',
                "nobukti_d" => $this->input->post('tbukti2'),
                "kd_puskes" => $this->input->post('tkd_puskes_inap'),
                "umur_pasien" => $this->input->post('tumur_pasien2'),
                "umur_hr" => $this->input->post('tumur_hr2'),
                "umur_bln" => $this->input->post('tumur_bln2'),
                "umur_thn" => $this->input->post('tumur_thn2'),

            );
        $insert = $this->mdl_daftar->save_inap($data);
        echo json_encode(array("status" => TRUE));
    }

    
    /* update rawat jalan */
    public function ajax_update()
    {
        $data = array(
                'tanggal_msk' => $this->input->post('ttanggal'),
                'kd_pasien' => $this->input->post('tkd_pasien'),
                'nama_poli' => $this->input->post('tnama_poli'),
                'kd_petugas' => $this->input->post('tkd_petugas'),
                'umur_pasien' => $this->input->post('tumur_pasien'),
                "umur_hr" => $this->input->post('tumur_hr'),
                "umur_bln" => $this->input->post('tumur_bln'),
                "umur_thn" => $this->input->post('tumur_thn'),
            );
        $this->mdl_daftar->update(array('id_daftar' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 

    /* update rawat inap */
    public function ajax_update_inap()
    {
        $data = array(
                'tanggal_msk' => $this->input->post('ttanggal_msk'),
                'kd_pasien' => $this->input->post('tkd_pasien_inap'),
                'kd_petugas' => $this->input->post('tkd_petugas_inap'),
                'nama_ruang' => $this->input->post('tnama_ruang'),
                'nama_kelas' => $this->input->post('tnama_kelas'),
                'nama_kamar' => $this->input->post('tnama_kamar'),
                'no_tidur' => $this->input->post('tno_tidur'),
                'umur_pasien' => $this->input->post('tumur_pasien2'),
                "umur_hr" => $this->input->post('tumur_hr2'),
                "umur_bln" => $this->input->post('tumur_bln2'),
                "umur_thn" => $this->input->post('tumur_thn2'),
            );
        $this->mdl_daftar->update_inap(array('id_inap' => $this->input->post('id_inap')), $data);
        echo json_encode(array("status" => TRUE));
    }


    /* delete rawat jalan */
    public function ajax_delete($id)
    {
        $this->mdl_daftar->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    /* delete rawat inap */
    public function ajax_delete_inap($id)
    {
        $this->mdl_daftar->delete_by_id_inap($id);
        echo json_encode(array("status" => TRUE));
    }

    
    public function lookup_petugas(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_daftar->lookup_petugas($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->kd_petugas,  
                                        'value' => $row->nama_petugas,
                                        ''
                                     );  //Add a row to array  
            }  
        }  

         if('IS_AJAX')  
        {  

            echo json_encode($data); //echo json string if ajax request  
               
        }  
        else  
        {  
            $this->load->view('view_search/index',$data); //Load html view of search results  
        } 
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('tkecamatan') == '')
        {
            $data['inputerror'][] = 'tkecamatan';
            $data['error_string'][] = 'Kecamatan harus diisi';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('tnama_kel') == '')
        {
            $data['inputerror'][] = 'tnama_kel';
            $data['error_string'][] = 'Nama kelurahan diisi';
            $data['status'] = FALSE;
        }
    }

// cari nobukti akhir
    public function get_by_nobukti_akhir()
    {

        $param = $this->input->get('noawal');
        $kd_puskes = $this->input->get('kd_puskes');

        $data = $this->mdl_daftar->get_by_nobukti_akhir($param,$kd_puskes);
        echo json_encode($data);
    }
// akhir cari nobukti akhir


// search daftar by nobukti
public function ajax_daftar_bynobukti($id)
    {
        $data = $this->mdl_daftar->get_daftar_bynobukti($id);
        echo json_encode($data);
    }

// akhir search daftar by nobukti

}