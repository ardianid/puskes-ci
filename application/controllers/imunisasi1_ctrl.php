<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class imunisasi1_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_imunisasi1','mdl_imunisasi1');
    }


public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fimunisasi1',$data);
    }

 // handle pencarian

 	public function ajax_list_pencarian()
    {

        $nama_kel = $_POST['nama_kel'];
        $nama_desa = $_POST['nama_desa'];
        $tahun = $_POST['tahun'];

        $list = $this->mdl_imunisasi1->get_datatables_pencarian($nama_kel,$nama_desa,$tahun);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nama_kec;
            $row[] = $person->nama_kel;
            $row[] = $person->nama_desa;
            $row[] = $person->tahun;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_imun1('."'".$person->id_imun1."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_imun1('."'".$person->id_imun1."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_imunisasi1->count_all_pencarian($nama_kel,$nama_desa,$tahun),
                        "recordsFiltered" => $this->mdl_imunisasi1->count_filtered_pencarian($nama_kel,$nama_desa,$tahun),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_imunisasi1->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencarian

    public function ajax_add_imun()
    {

            $data = array(
                'kd_desa' => $this->input->post('kd_desa'),
                'tahun' => $this->input->post('tahun'),
                'jml_bayi' => $this->input->post('jml_bayi'),
                'jml_balita' => $this->input->post('jml_balita'),
                'jml_anak' => $this->input->post('jml_anak'),
                'jml_caten' => $this->input->post('jml_caten'),
                'jml_wus_hml' => $this->input->post('jml_wus_hml'),
                'jml_wus_tdk' => $this->input->post('jml_wus_tdk'),
                'jml_sd' => $this->input->post('jml_sd'),
                'jml_pos' => $this->input->post('jml_pos'),
                'jml_ups' => $this->input->post('jml_ups'),
                'jml_pembina' => $this->input->post('jml_pembina'),
                'waktu_tmp' => $this->input->post('waktu_tmp'),
                'kd_puskes' => $this->input->post('kd_puskes'),
            );
        $insert = $this->mdl_imunisasi1->save_obat($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update_imun()
    {
        $data = array(
                'kd_desa' => $this->input->post('kd_desa'),
                'tahun' => $this->input->post('tahun'),
                'jml_bayi' => $this->input->post('jml_bayi'),
                'jml_balita' => $this->input->post('jml_balita'),
                'jml_anak' => $this->input->post('jml_anak'),
                'jml_caten' => $this->input->post('jml_caten'),
                'jml_wus_hml' => $this->input->post('jml_wus_hml'),
                'jml_wus_tdk' => $this->input->post('jml_wus_tdk'),
                'jml_sd' => $this->input->post('jml_sd'),
                'jml_pos' => $this->input->post('jml_pos'),
                'jml_ups' => $this->input->post('jml_ups'),
                'jml_pembina' => $this->input->post('jml_pembina'),
                'waktu_tmp' => $this->input->post('waktu_tmp'),
                'kd_puskes' => $this->input->post('kd_puskes'),
            );

        $this->mdl_imunisasi1->update_obat(array('id_imun1' => $this->input->post('id_imun1')), $data);
        echo json_encode(array("status" => TRUE));
    }

   public function ajax_delete($id)
    {
        $this->mdl_imunisasi1->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function lookup_desa(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_imunisasi1->lookup_desa($keyword); //Search DB  
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

}