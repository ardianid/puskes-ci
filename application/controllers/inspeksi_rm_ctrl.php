<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class inspeksi_rm_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_inspeksi_rm','mdl_inspeksi_rm');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('finspeksi_rm',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $nama_rm = $_POST['nama_rm'];
        $alamat_rm = $_POST['alamat_rm'];
        $tgl = $_POST['tgl'];

        $list = $this->mdl_inspeksi_rm->get_datatables_pencarian($nama_rm,$alamat_rm,$tgl);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->tgl_ins;
            $row[] = $person->nama_rm;
            $row[] = $person->alamat_rm;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_ins('."'".$person->id_inspeksi."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_ins('."'".$person->id_inspeksi."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_inspeksi_rm->count_all_pencarian($nama_rm,$alamat_rm,$tgl),
                        "recordsFiltered" => $this->mdl_inspeksi_rm->count_filtered_pencarian($nama_rm,$alamat_rm,$tgl),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_inspeksi_rm->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'tgl_ins' => $this->input->post('tgl_ins'),
                'kd_desa' => $this->input->post('kd_desa'),
                'nama_rm' => $this->input->post('nama_rm'),
                'alamat_rm' => $this->input->post('alamat_rm'),
                'kd_petugas' => $this->input->post('kd_petugas'),
                'penanggung' => $this->input->post('penanggung'),
                'jml_kary' => $this->input->post('jml_kary'),
                'jml_penj' => $this->input->post('jml_penj'),
                'no_ijin' => $this->input->post('no_ijin'),
                'tot_nilai' => $this->input->post('tot_nilai'),
                'kd_puskes' => $this->input->post('kd_puskes'),
            );
        $insert = $this->mdl_inspeksi_rm->save($data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_update()
    {
        $data = array(
                'tgl_ins' => $this->input->post('tgl_ins'),
                'kd_desa' => $this->input->post('kd_desa'),
                'nama_rm' => $this->input->post('nama_rm'),
                'alamat_rm' => $this->input->post('alamat_rm'),
                'kd_petugas' => $this->input->post('kd_petugas'),
                'penanggung' => $this->input->post('penanggung'),
                'jml_kary' => $this->input->post('jml_kary'),
                'jml_penj' => $this->input->post('jml_penj'),
                'no_ijin' => $this->input->post('no_ijin'),
                'tot_nilai' => $this->input->post('tot_nilai'),
                'kd_puskes' => $this->input->post('kd_puskes'),
            );

        $this->mdl_inspeksi_rm->update(array('id_inspeksi' => $this->input->post('id_inspeksi')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_delete($id)
    {
        $this->mdl_inspeksi_rm->delete($id);
        echo json_encode(array("status" => TRUE));
    }

public function lookup_desa(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_inspeksi_rm->lookup_desa($keyword); //Search DB  
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
        $query = $this->mdl_inspeksi_rm->lookup_petugas($keyword); //Search DB  
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