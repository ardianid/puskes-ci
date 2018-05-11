<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class imunisasi2_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_imunisasi2','mdl_imunisasi2');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fimunisasi2',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $nama_lokasi = $_POST['nama_lokasi'];
        $alamat_lokasi = $_POST['alamat_lokasi'];
        $tgl = $_POST['tgl'];

        $list = $this->mdl_imunisasi2->get_datatables_pencarian($nama_lokasi,$alamat_lokasi,$tgl);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->tgl_imun;
            $row[] = $person->nama_lokasi;
            $row[] = $person->alamat_lokasi;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_imun2('."'".$person->id_imun2."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_imun2('."'".$person->id_imun2."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_imunisasi2->count_all_pencarian($nama_lokasi,$alamat_lokasi,$tgl),
                        "recordsFiltered" => $this->mdl_imunisasi2->count_filtered_pencarian($nama_lokasi,$alamat_lokasi,$tgl),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_imunisasi2->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencarian

// handle pencarian2

    
 	public function ajax_list_pencarian2()
    {

        $id_imun2ku = $_POST['id_imun2ku'];

        $list = $this->mdl_imunisasi2->get_datatables_detail($id_imun2ku);
        $data = array();
       // $no = $_POST['start'];
        foreach ($list as $person) {
         //   $no++;
            $row = array();
            $row[] = $person->nama_pasien;
            $row[] = $person->jns_kelamin;
            $row[] = $person->alamat;
            $row[] = $person->nama_desa;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_imun3('."'".$person->id_imun3."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" href="javascript:void()" title="Hapus" onclick="delete_imun3('."'".$person->id_imun3."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        //"draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_imunisasi2->count_all_pencarian_detail($id_imun2ku),
                        "recordsFiltered" => $this->mdl_imunisasi2->count_filtered_pencarian_detail($id_imun2ku),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    } 


    public function ajax_get_by_id_pencarian2($id)
    {
        $data = $this->mdl_imunisasi2->get_by_id_pencarian2($id);
        echo json_encode($data);
    }

    public function ajax_cek_id_imun2()
    {

    	$tgl_imun = $this->input->get('tgl_imun');
    	$nama_lokasi = $this->input->get('nama_lokasi');
    	$alamat_lokasi = $this->input->get('alamat_lokasi');
    	$kd_puskes = $this->input->get('kd_puskes');
    	$kd_petugas = $this->input->get('kd_petugas');
    	$jml_petugas = $this->input->get('jml_petugas');
    	$jml_pembina = $this->input->get('jml_pembina');

        $data = $this->mdl_imunisasi2->cek_id_imun2($tgl_imun,$nama_lokasi,$alamat_lokasi,$kd_puskes,$kd_petugas,$jml_petugas,$jml_pembina);
        echo json_encode($data);
    }

 // akhir handle pencarian2

    public function ajax_add_imun2()
    {

            $data = array(
                'tgl_imun' => $this->input->post('tgl_imun'),
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'alamat_lokasi' => $this->input->post('alamat_lokasi'),
                'kd_petugas' => $this->input->post('kd_petugas'),
                'jml_petugas' => $this->input->post('jml_petugas'),
                'jml_pembina' => $this->input->post('jml_pembina'),
                'kd_puskes' => $this->input->post('kd_puskes'),
            );
        $insert = $this->mdl_imunisasi2->save_imun2($data);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_add_imun3()
    {

            $data = array(
                'id_imun2' => $this->input->post('id_imun2'),
                'nama_pasien' => $this->input->post('nama_pasien'),
                'jns_kelamin' => $this->input->post('jns_kelamin'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat' => $this->input->post('alamat'),
                'kd_desa' => $this->input->post('kd_desa'),
                'jenis_pasien' => $this->input->post('jenis_pasien'),
                'jns_imunisasi1' => $this->input->post('jns_imunisasi1'),
                'jns_imunisasi2' => $this->input->post('jns_imunisasi2'),
                'jns_imunisasi3' => $this->input->post('jns_imunisasi3'),
                'pem_fisik' => $this->input->post('pem_fisik'),
            );
        $insert = $this->mdl_imunisasi2->save_imun3($data);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_update_imun2()
    {
        $data = array(
                'tgl_imun' => $this->input->post('tgl_imun'),
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'alamat_lokasi' => $this->input->post('alamat_lokasi'),
                'kd_petugas' => $this->input->post('kd_petugas'),
                'jml_petugas' => $this->input->post('jml_petugas'),
                'jml_pembina' => $this->input->post('jml_pembina'),
                'kd_puskes' => $this->input->post('kd_puskes'),
            );

        $this->mdl_imunisasi2->update_imun2(array('id_imun2' => $this->input->post('id_imun2')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update_imun3()
    {

            $data = array(
                'id_imun2' => $this->input->post('id_imun2'),
                'nama_pasien' => $this->input->post('nama_pasien'),
                'jns_kelamin' => $this->input->post('jns_kelamin'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat' => $this->input->post('alamat'),
                'kd_desa' => $this->input->post('kd_desa'),
                'jenis_pasien' => $this->input->post('jenis_pasien'),
                'jns_imunisasi1' => $this->input->post('jns_imunisasi1'),
                'jns_imunisasi2' => $this->input->post('jns_imunisasi2'),
                'jns_imunisasi3' => $this->input->post('jns_imunisasi3'),
                'pem_fisik' => $this->input->post('pem_fisik'),
            );
        $this->mdl_imunisasi2->update_imun3(array('id_imun3' => $this->input->post('id_imun3')), $data);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_delete2($id)
    {
        $this->mdl_imunisasi2->delete_imun2_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete3($id)
    {
        $this->mdl_imunisasi2->delete_imun3_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function lookup_desa(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_imunisasi2->lookup_desa($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->kd_desa,  
                                        'value' => $row->nama_desa,  
                                        'desc' => $row->nama_kel,
                                        'desc2' => $row->nama_kec,
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


    public function lookup_petugas(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_imunisasi2->lookup_petugas($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->kd_petugas,  
                                        'value' => $row->nama_petugas,  
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

}