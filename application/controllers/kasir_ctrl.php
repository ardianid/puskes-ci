<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class kasir_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_kasir','mdl_kasir');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fkasir',$data);
    }

    /* ajax list rawat jalan */
    public function ajax_list()
    {

        $tanggal = $_POST['tanggal_msk'];
        $kd_puskes = $_POST['kd_puskes'];
        $nomor = $_POST['nomor'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $list = $this->mdl_kasir->get_datatables($tanggal,$kd_puskes,$nomor,$nama,$alamat);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nobukti_d;
            $row[] = $person->nama;
            $row[] = $person->alamat;
            $row[] = $person->nama_petugas;
            $row[] = $person->jmltotal;
            $row[] = $person->totbayar;
            
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="lihat_detail('."'".$person->id_daftar."'".')">Lihat Detail</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_kasir->count_all($tanggal,$kd_puskes,$nomor,$nama,$alamat),
                        "recordsFiltered" => $this->mdl_kasir->count_filtered($tanggal,$kd_puskes,$nomor,$nama,$alamat),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    /* ajax list detail */
    public function ajax_list_detail()
    {

        $id_daftar = $_POST['id_daftar'];

        $list = $this->mdl_kasir->get_datatables_detail($id_daftar);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->jenis_tind;
            $row[] = $person->nama;
            $row[] = $person->total;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_kasir->count_all_detail($id_daftar),
                        "recordsFiltered" => $this->mdl_kasir->count_filtered_detail($id_daftar),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    /* akhir ajax list detail */


    /* ajax list bayar */
    public function ajax_list_bayar()
    {

        $id_daftar = $_POST['id_daftar'];

        $list = $this->mdl_kasir->get_datatables_bayar($id_daftar);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->tglbayar;
            $row[] = $person->cara_bayar;
            $row[] = $person->jmlbayar;
            
            $row[] = '<a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_bayar('."'".$person->id_bayar."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_kasir->count_all_bayar($id_daftar),
                        "recordsFiltered" => $this->mdl_kasir->count_filtered_bayar($id_daftar),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    /* akhir ajax list bayar */

    /* pencarian by id */

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_kasir->get_by_id_pencarian($id);
        echo json_encode($data);
    }

    /* akhir pencarian by id */

/* add bayar */
    public function ajax_add_bayar()
    {

            $data = array(
                'id_daftar' => $this->input->post('id_daftar'),
                'cara_bayar' => $this->input->post('cara_bayar'),
                'jmlbayar' => $this->input->post('jmlbayar'),
                'tglbayar' => $this->input->post('tglbayar'),
            );
        $insert = $this->mdl_kasir->save_bayar($data,$this->input->post('id_daftar'),$this->input->post('jmlbayar'));
        echo json_encode(array("status" => TRUE));
    }
/* akhir add bayar */

/* delete bayar */

public function ajax_delete_bayar()
    {

        $idbayar = $this->input->post('id_bayar');        
        $iddaftar = $this->input->post('id_daftar');        
        $jmlbayar = $this->input->post('jmlbayar');

        $this->mdl_kasir->delete_by_id_bayar($idbayar,$iddaftar,$jmlbayar);
        echo json_encode(array("status" => TRUE));
    }

/* akhir delete bayar */


/* get total bayar  */

    public function ajax_get_total_by_idbayar($id)
    {
        $data = $this->mdl_kasir->get_total_by_idbayar($id);
        echo json_encode($data);
    }

/* akhir get total bayar */

/* update disc & total */
    public function update_daftar_disc()
    {
        $data = array(
                'jmldisc' => $this->input->post('jmldisc'),
                'jmltotal_bersih' => $this->input->post('jmltotal_bersih'),
            );
        $this->mdl_kasir->update_daftar_disc(array('id_daftar' => $this->input->post('id_daftar')), $data);
        echo json_encode(array("status" => TRUE));
    }
/* akhir update disc & total */


}