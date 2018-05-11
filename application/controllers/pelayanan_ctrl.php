<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class pelayanan_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_pelayanan','mdl_pelayanan');
        $this->load->model('mdl_daftar','mdl_daftar');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $data['qpoli'] = $this->mdl_daftar->get_poli(); //query model semua barang
        $data['qpetugas'] = $this->mdl_pelayanan->get_petugas();

        $this->load->view('fpelayanan',$data);
    }

// handle pencarian pendaftaran

    public function update_daftar()
    {
        $data = array(
                'jenis_tindakan' => '1',
                'jenis_pasien' => $this->input->post('jenis_pasien'),
                'cara_bayar' => $this->input->post('cara_bayar'),
                'anamnesa' => $this->input->post('anamnesa'),
                'keterangan' => $this->input->post('keterangan'),
            );
        $this->mdl_pelayanan->update_daftar(array('id_daftar' => $this->input->post('id_daftar')), $data);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_list_pencarian()
    {

        $nama_poli = $_POST['nama_poli'];
        $tanggal = $_POST['tanggal'];
        $status = $_POST['status'];
        $jenis_pelayanan = $_POST['jenis_pelayanan'];
        $scari = $_POST['scari'];
        $kd_puskes = $_POST['kd_puskes'];

        $list = $this->mdl_pelayanan->get_datatables_pencarian($nama_poli,$tanggal,$status,$jenis_pelayanan,$scari,$kd_puskes);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nobukti_d;
            $row[] = $person->nama;
            $row[] = $person->umur_pasien;
            $row[] = $person->alamat;
            $row[] = $person->nama_poli;
            $row[] = $person->nama_petugas;
            
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary"  title="Pilih" onclick="pilih_data('."'".$person->id_daftar."'".')"><i class="glyphicon glyphicon-ok"></i></a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_pelayanan->count_all_pencarian($nama_poli,$tanggal,$status,$jenis_pelayanan,$scari,$kd_puskes),
                        "recordsFiltered" => $this->mdl_pelayanan->count_filtered_pencarian($nama_poli,$tanggal,$status,$jenis_pelayanan,$scari,$kd_puskes),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_pelayanan->get_by_id_pencarian($id);
        echo json_encode($data);
    }

// akhir pencarian pendaftaran

// handle diagnosa pasien

	public function ajax_list_diagnosa()
    {

        $id_daftar = $_POST['id_daftar'];

        $list = $this->mdl_pelayanan->get_datatables_diagnosa($id_daftar);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nama_penyakit;
            $row[] = $person->jenis_diagnosa;
            
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_diagnosa('."'".$person->id_diagnosa."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_pelayanan->count_all_diagnosa($id_daftar),
                        "recordsFiltered" => $this->mdl_pelayanan->count_filtered_diagnosa($id_daftar),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_add_diagnosa()
    {

            $data = array(
                'kd_penyakit_tr' => $this->input->post('kd_penyakit_tr'),
                'jenis_diagnosa' => $this->input->post('jenis_diagnosa'),
                'id_daftar' => $this->input->post('id_daftar'),
            );
        $insert = $this->mdl_pelayanan->save_diagnosa($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_diagnosa($id)
    {
        $this->mdl_pelayanan->delete_by_id_diagnosa($id);
        echo json_encode(array("status" => TRUE));
    }

    public function lookup_diagnosa(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_pelayanan->lookup_diagnosa($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->kd_penyakit, 
                                        'value' => $row->nama_penyakit,
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

// akhir handle diagnosa pasien

// handle tindakan pasien

    public function ajax_list_tindakan()
    {

        $id_daftar = $_POST['id_daftar'];

        $list = $this->mdl_pelayanan->get_datatables_tindakan($id_daftar);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nama_tindakan;
            $row[] = $person->jml;
            $row[] = $person->harga;
            $row[] = $person->total;
            $row[] = $person->keterangan;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_tindakan('."'".$person->id_tindakan."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_pelayanan->count_all_tindakan($id_daftar),
                        "recordsFiltered" => $this->mdl_pelayanan->count_filtered_tindakan($id_daftar),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add_tindakan()
    {

            $total_tind = $this->input->post('jumlah') * $this->input->post('harga');

            $data = array(
                'nama_tindakan' => $this->input->post('nama_tindakan'),
                'jml' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga'),
                'total' => $total_tind,
                'keterangan' => $this->input->post('keterangan'),
                'id_daftar' => $this->input->post('id_daftar'),
            );
        $insert = $this->mdl_pelayanan->save_tindakan($data,$total_tind,$this->input->post('id_daftar'));
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_tindakan($id)
    {
        $this->mdl_pelayanan->delete_by_id_tindakan($id);
        echo json_encode(array("status" => TRUE));
    }

    public function lookup_tindakan(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_pelayanan->lookup_tindakan($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'value' => $row->nama_tindakan,
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

// akhir handle tindakan pasien

// handle obat

    public function ajax_list_obat()
    {

        $id_daftar = $_POST['id_daftar'];

        $list = $this->mdl_pelayanan->get_datatables_obat($id_daftar);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->kd_obat;
            $row[] = $person->nama;
            $row[] = $person->qty;
            $row[] = $person->harga;
            $row[] = $person->total;
            $row[] = $person->satuan;
            $row[] = $person->dosis;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_obat('."'".$person->id_obat_tr."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_pelayanan->count_all_obat($id_daftar),
                        "recordsFiltered" => $this->mdl_pelayanan->count_filtered_obat($id_daftar),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add_obat()
    {

            $total = $this->input->post('qty') * $this->input->post('harga');

            $data = array(
                'kd_obat' => $this->input->post('kd_obat'),
                'qty' => $this->input->post('qty'),
                'harga' => $this->input->post('harga'),
                'total' => $total,
                'satuan' => $this->input->post('satuan'),
                'dosis' => $this->input->post('dosis'),
                'id_daftar' => $this->input->post('id_daftar'),
            );
        $insert = $this->mdl_pelayanan->save_obat($data, $this->input->post('id_daftar'),$total);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_obat($id)
    {
        $this->mdl_pelayanan->delete_by_id_obat($id);
        echo json_encode(array("status" => TRUE));
    }

    public function lookup_obat(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_pelayanan->lookup_obat($keyword); //Search DB  
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
                                        'desc2' => $row->hargajual
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
        $query = $this->mdl_pelayanan->lookup_obat_kode($keyword); //Search DB  
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
                                        'desc2' => $row->hargajual
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


// handle lab

    public function ajax_list_lab()
    {

        $id_daftar = $_POST['id_daftar'];

        $list = $this->mdl_pelayanan->get_datatables_lab($id_daftar);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nama_lab;
            $row[] = $person->qty;
            $row[] = $person->harga;
            $row[] = $person->total;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_lab('."'".$person->id_lab."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_pelayanan->count_all_lab($id_daftar),
                        "recordsFiltered" => $this->mdl_pelayanan->count_filtered_lab($id_daftar),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add_lab()
    {
            $total = $this->input->post('qty') * $this->input->post('harga');

            $data = array(
                'nama_lab' => $this->input->post('nama_lab'),
                'qty' => $this->input->post('qty'),
                'harga' => $this->input->post('harga'),
                'total' => $total,
                'id_daftar' => $this->input->post('id_daftar'),
            );
        $insert = $this->mdl_pelayanan->save_lab($data,$this->input->post('id_daftar'),$total);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_lab($id)
    {
        $this->mdl_pelayanan->delete_by_id_lab($id);
        echo json_encode(array("status" => TRUE));
    }

    public function lookup_lab(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_pelayanan->lookup_lab($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'value' => $row->nama_lab,
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

// akhir handle lab

// handle radio

    public function ajax_list_radio()
    {

        $id_daftar = $_POST['id_daftar'];

        $list = $this->mdl_pelayanan->get_datatables_radio($id_daftar);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nama_radio;
            $row[] = $person->qty;
            $row[] = $person->harga;
            $row[] = $person->total;

            //add html for action
            $row[] = '<a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_radio('."'".$person->id_radio."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_pelayanan->count_all_radio($id_daftar),
                        "recordsFiltered" => $this->mdl_pelayanan->count_filtered_radio($id_daftar),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add_radio()
    {

        $total = $this->input->post('qty') * $this->input->post('harga');

            $data = array(
                'nama_radio' => $this->input->post('nama_radio'),
                'qty' => $this->input->post('qty'),
                'harga' => $this->input->post('harga'),
                'total' => $total,
                'id_daftar' => $this->input->post('id_daftar'),
            );
        $insert = $this->mdl_pelayanan->save_radio($data,$this->input->post('id_daftar'),$total);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_radio($id)
    {
        $this->mdl_pelayanan->delete_by_id_radio($id);
        echo json_encode(array("status" => TRUE));
    }

    public function lookup_radio(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_pelayanan->lookup_radio($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'value' => $row->nama_radio,
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

// akhir handle radio


// handle poli

    public function ajax_list_poli()
    {

        $id_daftar = $_POST['id_daftar'];

        $list = $this->mdl_pelayanan->get_datatables_poli($id_daftar);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nama_poli;
            $row[] = $person->nama_petugas;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_poli('."'".$person->id_poli2."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_pelayanan->count_all_poli($id_daftar),
                        "recordsFiltered" => $this->mdl_pelayanan->count_filtered_poli($id_daftar),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add_poli()
    {

            $data = array(
                'nama_poli' => $this->input->post('nama_poli'),
                'kd_petugas' => $this->input->post('kd_petugas'),
                'id_daftar' => $this->input->post('id_daftar'),
            );
        $insert = $this->mdl_pelayanan->save_poli($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_poli($id)
    {
        $this->mdl_pelayanan->delete_by_id_poli($id);
        echo json_encode(array("status" => TRUE));
    }


// akhir handle poli


// handle alergi

    public function ajax_list_alergi()
    {

        $kd_pasien = $_POST['kd_pasien'];

        $list = $this->mdl_pelayanan->get_datatables_alergi($kd_pasien);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nama;
            $row[] = $person->keterangan;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_alergi('."'".$person->id_alergi."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_pelayanan->count_all_alergi($kd_pasien),
                        "recordsFiltered" => $this->mdl_pelayanan->count_filtered_alergi($kd_pasien),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add_alergi()
    {

            $data = array(
                'kd_obat' => $this->input->post('kd_obat'),
                'kd_pasien' => $this->input->post('kd_pasien'),
                'keterangan' => $this->input->post('keterangan'),
            );
        $insert = $this->mdl_pelayanan->save_alergi($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_alergi($id)
    {
        $this->mdl_pelayanan->delete_by_id_alergi($id);
        echo json_encode(array("status" => TRUE));
    }


// akhir handle alergi


// search daftar by nobukti

public function ajax_daftar_bynobukti_obat($id)
    {
        $data = $this->mdl_pelayanan->get_daftar_bynobukti_obat($id);
        echo json_encode($data);
    }

// akhir search daftar by nobukti

}