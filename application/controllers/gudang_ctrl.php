<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class gudang_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_gudang','mdl_gudang');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

    //if($this->session->userdata('logged_in'))
    //{
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];
        $this->load->view('fgudang',$data);
    //}else{
     //   redirect('welcome', 'refresh');
    //}

        
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $no_bukti = $_POST['no_bukti'];
        $tanggal = $_POST['tanggal'];
        $unit1 = $_POST['unit1'];
        $unit2 = $_POST['unit2'];
        $jenis = $_POST['jenis'];
        $kd_puskes = $_POST['kd_puskes'];

        $list = $this->mdl_gudang->get_datatables_pencarian($no_bukti,$tanggal,$unit1,$unit2,$jenis,$kd_puskes);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->jenis_trans;
            $row[] = $person->no_bukti;
            $row[] = $person->no_faktur;
            $row[] = $person->tanggal;
            $row[] = $person->unit1;
            $row[] = $person->unit2;
            $row[] = $person->grand_total;
            $row[] = $person->keterangan;
            
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary"  title="Edit" onclick="edit_trans_grd('."'".$person->id_gudang_ob."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger"  title="Hapus" onclick="return delete_ontrans_grd('."'".$person->id_gudang_ob."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_gudang->count_all_pencarian($no_bukti,$tanggal,$unit1,$unit2,$jenis,$kd_puskes),
                        "recordsFiltered" => $this->mdl_gudang->count_filtered_pencarian($no_bukti,$tanggal,$unit1,$unit2,$jenis,$kd_puskes),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    
 // akhir handle pendarian


// handle isi

    public function ajax_list_isi()
    {

        $no_bukti = $_POST['no_bukti'];

        $list = $this->mdl_gudang->get_datatables_isi($no_bukti);
        $data = array();
        $no = 0;//$_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->kd_obat;
            $row[] = $person->nama;
            $row[] = $person->qty;
            $row[] = $person->satuan;
            $row[] = $person->harga;
            $row[] = $person->disc;
            $row[] = $person->total;
            
            //add html for action
            $row[] = '<a class="btn btn-xs btn-danger"  title="Hapus" onclick="return delete_obat_isi('."'".$person->id_isi."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            $data[] = $row;

        }
 
        $output = array(
                        //"draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_gudang->count_all_isi($no_bukti),
                        "recordsFiltered" => $this->mdl_gudang->count_filtered_isi($no_bukti),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    
    public function ajax_add_isi()
    {

        $data = array(
            'no_bukti' => $this->input->post('no_bukti'),
            'kd_obat' => $this->input->post('kd_obat'),
            'qty' => $this->input->post('qty'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'disc' => $this->input->post('disc'),
            'total' => $this->input->post('total'),
        );
        $insert = $this->mdl_gudang->save_isi($data);
        echo json_encode(array("status" => TRUE));
        
    }

    public function ajax_delete_isi($id)
    {
        $this->mdl_gudang->delete_by_id_isi($id);
        echo json_encode(array("status" => TRUE));
    }

 // akhir handle isi

 // pencarian obat

    public function lookup_obat(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_gudang->lookup_obat($keyword); //Search DB  
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

    public function lookup_obat_kode(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_gudang->lookup_obat_kode($keyword); //Search DB  
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

 // akhir pencarian obat

// cari nobukti sementara
    public function get_by_nobukti_sementara($id)
    {
        $data = $this->mdl_gudang->get_by_nobukti_sementara($id);
        echo json_encode($data);
    }
// akhir cari nobukti sementara

// cari nobukti akhir
    public function get_by_nobukti_akhir()
    {

        $param = $this->input->get('noawal');
        $kd_puskes = $this->input->get('kd_puskes');

        $data = $this->mdl_gudang->get_by_nobukti_akhir($param,$kd_puskes);
        echo json_encode($data);
    }
// akhir cari nobukti akhir

// delete yang gak lengkap
     public function delete_by_zero_transaksi($uname)
    {
        $this->mdl_gudang->delete_by_zero_transaksi($uname);
        echo json_encode(array("status" => TRUE));
    }
// akhir delete yang gak lengkap

// simpan transaksi
    public function save_transaksi()
    {

        $data = array(
            'no_bukti' => $this->input->post('no_bukti'),
            'no_faktur' => $this->input->post('no_faktur'),
            'tanggal' => $this->input->post('tanggal'),
            'jenis_trans' => $this->input->post('jenis_trans'),
            'unit1' => $this->input->post('unit1'),
            'unit2' => $this->input->post('unit2'),
            'keterangan' => $this->input->post('keterangan'),
            'total' => $this->input->post('total'),
            'total_disc' => $this->input->post('total_disc'),
            'grand_total' => $this->input->post('grand_total'),
            'kd_puskes' => $this->input->post('kd_puskes'),
        );
        $insert = $this->mdl_gudang->save_transaksi($data);
        echo json_encode(array("status" => TRUE));
        
    }

    public function ajax_update_transaksi()
    {
        $data = array(
            'no_faktur' => $this->input->post('no_faktur'),
            'tanggal' => $this->input->post('tanggal'),
            'jenis_trans' => $this->input->post('jenis_trans'),
            'unit1' => $this->input->post('unit2'),
            'unit2' => $this->input->post('unit2'),
            'keterangan' => $this->input->post('keterangan'),
            'total' => $this->input->post('total'),
            'total_disc' => $this->input->post('total_disc'),
            'grand_total' => $this->input->post('grand_total'),
            'kd_puskes' => $this->input->post('kd_puskes'),
            );
        $this->mdl_gudang->update_transaksi(array('id_gudang_ob' => $this->input->post('id_gudang_ob')), $data);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_delete_transaksi()
    {

       $id = $this->input->post('no_bukti');

        $this->mdl_gudang->delete_transaksi($id);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_update_transaksi_detail(){

        $data = array(
            'no_bukti' =>$this->input->post('no_bukti'),
            );

        $this->mdl_gudang->update_transaksi_detail(array('no_bukti' => $this->input->post('no_bukti_lama')), $data);
        echo json_encode(array("status" => TRUE));
        
    }


    public function ajax_update_transaksi_detail_stok(){

        $nobukti_awal = $this->input->post('nobukti_awal');
        $stat_ = $this->input->post('stat_');
        $splus = $this->input->post('splus');

        $this->mdl_gudang->update_transaksi_detail_stok($nobukti_awal, $stat_,$splus);
        echo json_encode(array("status" => TRUE));

    }


// akhir simpan transaksi

// search transaksi by nobukti

public function ajax_transaksi_bynobukti($id)
    {
        $data = $this->mdl_gudang->get_transaksi_bynobukti($id);
        echo json_encode($data);
    }

// akhir search transaksi by nobukti


// search transaksi by nobukti

public function ajax_obatdetail_bynobukti($id)
    {
        $data = $this->mdl_gudang->get_obatdetail_bynobukti($id);
        echo json_encode($data);
    }

// akhir search transaksi by nobukti


}