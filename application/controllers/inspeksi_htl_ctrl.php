<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class inspeksi_htl_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_inspeksi_htl','mdl_inspeksi_htl');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('finspeksi_htl',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $nama_rm = $_POST['nama_htl'];
        $alamat_rm = $_POST['alamat_htl'];
        $tgl = $_POST['tgl'];

        $list = $this->mdl_inspeksi_htl->get_datatables_pencarian($nama_rm,$alamat_rm,$tgl);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->tgl_ins_htl;
            $row[] = $person->nama_htl;
            $row[] = $person->alamat_htl;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_ins('."'".$person->id_inspeksi_htl."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_ins('."'".$person->id_inspeksi_htl."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_inspeksi_htl->count_all_pencarian($nama_rm,$alamat_rm,$tgl),
                        "recordsFiltered" => $this->mdl_inspeksi_htl->count_filtered_pencarian($nama_rm,$alamat_rm,$tgl),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_inspeksi_htl->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'tgl_ins_htl' => $this->input->post('tgl_ins_htl'),
                'kd_desa' => $this->input->post('kd_desa'),
                'nama_htl' => $this->input->post('nama_htl'),
                'alamat_htl' => $this->input->post('alamat_htl'),
                'kd_petugas' => $this->input->post('kd_petugas'),
                'penanggung_htl' => $this->input->post('penanggung_htl'),
                'notelp_htl' => $this->input->post('notelp_htl'),
                'noijin_htl' => $this->input->post('noijin_htl'),
                'jml_kary' => $this->input->post('jml_kary'),
                'tot_nilai' => $this->input->post('tot_nilai'),
                'kd_puskes' => $this->input->post('kd_puskes'),
            );
        $insert = $this->mdl_inspeksi_htl->save($data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_update()
    {
        $data = array(
                'tgl_ins_htl' => $this->input->post('tgl_ins_htl'),
                'kd_desa' => $this->input->post('kd_desa'),
                'nama_htl' => $this->input->post('nama_htl'),
                'alamat_htl' => $this->input->post('alamat_htl'),
                'kd_petugas' => $this->input->post('kd_petugas'),
                'penanggung_htl' => $this->input->post('penanggung_htl'),
                'notelp_htl' => $this->input->post('notelp_htl'),
                'noijin_htl' => $this->input->post('noijin_htl'),
                'jml_kary' => $this->input->post('jml_kary'),
                'tot_nilai' => $this->input->post('tot_nilai'),
                'kd_puskes' => $this->input->post('kd_puskes'),
            );

        $this->mdl_inspeksi_htl->update(array('id_inspeksi_htl' => $this->input->post('id_inspeksi_htl')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_delete($id)
    {
        $this->mdl_inspeksi_htl->delete($id);
        echo json_encode(array("status" => TRUE));
    }

public function lookup_desa(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_inspeksi_htl->lookup_desa($keyword); //Search DB  
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
        $query = $this->mdl_inspeksi_htl->lookup_petugas($keyword); //Search DB  
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