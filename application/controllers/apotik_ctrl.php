<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class apotik_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_apotik','mdl_apotik');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fapotik',$data);
    }

 // handle pencarian

 	public function ajax_list_pencarian()
    {

        $no_daftar = $_POST['no_daftar'];
        $tanggal = $_POST['tanggal'];
        $nama_pasien = $_POST['nama_pasien'];
        $jenis = $_POST['jenis'];
        $kd_puskes = $_POST['kd_puskes'];

        $list = $this->mdl_apotik->get_datatables_pencarian($no_daftar,$tanggal,$nama_pasien,$jenis,$kd_puskes);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nobukti_d;
            $row[] = $person->nama;
            $row[] = $person->alamat;
            $row[] = $person->nama_ruang;
            $row[] = $person->nama_petugas;
            $row[] = $person->st_obat;
            
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary"  title="Pilih" onclick="pilih_data('."'".$person->id_daftar."'".')">Lihat Detail Order</a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_apotik->count_all_pencarian($no_daftar,$tanggal,$nama_pasien,$jenis,$kd_puskes),
                        "recordsFiltered" => $this->mdl_apotik->count_filtered_pencarian($no_daftar,$tanggal,$nama_pasien,$jenis,$kd_puskes),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_apotik->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencarian


// handle obat

    public function ajax_list_obat()
    {

        $id_daftar = $_POST['id_daftar'];

        $list = $this->mdl_apotik->get_datatables_obat($id_daftar);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->kd_obat;
            $row[] = $person->nama;
            $row[] = $person->tipe_obat;
            $row[] = $person->qty;
            $row[] = $person->harga;
            $row[] = $person->total;
            $row[] = $person->satuan;
            $row[] = $person->dosis;
            $row[] = $person->stat_post;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_obat('."'".$person->id_obat_tr."'".')">Edit</a>';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_apotik->count_all_obat($id_daftar),
                        "recordsFiltered" => $this->mdl_apotik->count_filtered_obat($id_daftar),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add_obat()
    {

            $data = array(
                'kd_obat' => $this->input->post('kd_obat'),
                'qty' => $this->input->post('qty'),
                'harga' => $this->input->post('harga'),
                'total' => $this->input->post('qty') * $this->input->post('harga'),
                'satuan' => $this->input->post('satuan'),
                'dosis' => $this->input->post('dosis'),
                'id_daftar' => $this->input->post('id_daftar'),
                'spost' => '0',
            );
        $insert = $this->mdl_apotik->save_obat($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update_obat()
    {
        $data = array(
                'kd_obat' => $this->input->post('kd_obat'),
                'qty' => $this->input->post('qty'),
                'harga' => $this->input->post('harga'),
                'total' => $this->input->post('qty') * $this->input->post('harga'),
                'satuan' => $this->input->post('satuan'),
                'dosis' => $this->input->post('dosis'),
                'spost' => '0',
            );

        $this->mdl_apotik->update_obat(array('id_obat_tr' => $this->input->post('id_obat_tr')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit_obat($id)
    {
        $data = $this->mdl_apotik->get_by_id_obat($id);
        echo json_encode($data);
    }

    public function lookup_obat(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_apotik->lookup_obat($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id' => $row->kode,
                                        'value' => $row->nama,
                                        'desc' => $row->satuan3,
                                        'desc2' => $row->hargajual,
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

    public function lookup_obat_kode(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_apotik->lookup_obat_kode($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id' => $row->nama,
                                        'value' => $row->kode,
                                        'desc' => $row->satuan3,
                                        'desc2' => $row->hargajual,
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

// akhir handle obat


// update stok

    public function ajax_update_transaksi_detail_stok(){

        $nobukti_awal = $this->input->post('nobukti_awal');
        $stat_ = $this->input->post('stat_');
        $splus = $this->input->post('splus');
        $spos = $this->input->post('spos');

        $this->mdl_apotik->update_transaksi_detail_stok($nobukti_awal, $stat_,$splus,$spos);
        echo json_encode(array("status" => TRUE));

    }

// akhir update stok

// update total daftar

public function ajax_update_total_daftar(){

        $id_daftar = $this->input->post('id_daftar');
        $jenis_tnd = $this->input->post('jenis_tnd');
        $total = $this->input->post('total');

        $this->mdl_apotik->update_total_daftar($id_daftar,$jenis_tnd,$total);
        echo json_encode(array("status" => TRUE));

    }

// akhir update total daftar

}