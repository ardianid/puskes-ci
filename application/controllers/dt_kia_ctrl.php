<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class dt_kia_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dt_kia','mdl_dt_kia');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fdt_kia',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $thn = $_POST['thn'];
        $bln = $_POST['bln'];
        $desa = $_POST['desa'];

        $list = $this->mdl_dt_kia->get_datatables_pencarian($thn,$bln,$desa);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->thn_kia;
            $row[] = $person->bln_kia;
            $row[] = $person->nama_desa;
            $row[] = $person->nama_kel;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_ins('."'".$person->id_kia."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_ins('."'".$person->id_kia."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_dt_kia->count_all_pencarian($thn,$bln,$desa),
                        "recordsFiltered" => $this->mdl_dt_kia->count_filtered_pencarian($thn,$bln,$desa),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_dt_kia->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'thn_kia' => $this->input->post('thn_kia'),
                'bln_kia' => $this->input->post('bln_kia'),
                'kd_desa' => $this->input->post('kd_desa'),
                'kd_puskes' => $this->input->post('kd_puskes'),
                'hml_k1' => $this->input->post('hml_k1'),
                'hml_k4' => $this->input->post('hml_k4'),
                'hml_fresiko' => $this->input->post('hml_fresiko'),
                'hml_tgi' => $this->input->post('hml_tgi'),
                'hml_tgi_rjuk' => $this->input->post('hml_tgi_rjuk'),
                'salin_tng' => $this->input->post('salin_tng'),
                'lahir_hdp_bblr' => $this->input->post('lahir_hdp_bblr'),
                'lahir_mti' => $this->input->post('lahir_mti'),
                'jml_neo' => $this->input->post('jml_neo'),
                'jml_neo_risti' => $this->input->post('jml_neo_risti'),
                'jml_neo_mti' => $this->input->post('jml_neo_mti'),
                'jml_materi' => $this->input->post('jml_materi'),
                'balita_stimul' => $this->input->post('balita_stimul'),
                'pra_sekolah' => $this->input->post('pra_sekolah'),
                'hml_k1_pr' => $this->input->post('hml_k1_pr'),
                'hml_k4_pr' => $this->input->post('hml_k4_pr'),
                'hml_fresiko_pr' => $this->input->post('hml_fresiko_pr'),
                'hml_tgi_pr' => $this->input->post('hml_tgi_pr'),
                'hml_tgi_rjuk_pr' => $this->input->post('hml_tgi_rjuk_pr'),
                'salin_tng_pr' => $this->input->post('salin_tng_pr'),
                'lahir_hdp_bblr_pr' => $this->input->post('lahir_hdp_bblr_pr'),
                'lahir_mti_pr' => $this->input->post('lahir_mti_pr'),
                'jml_neo_pr' => $this->input->post('jml_neo_pr'),
                'jml_neo_risti_pr' => $this->input->post('jml_neo_risti_pr'),
                'jml_neo_mti_pr' => $this->input->post('jml_neo_mti_pr'),
                'jml_materi_pr' => $this->input->post('jml_materi_pr'),
                'balita_stimul_pr' => $this->input->post('balita_stimul_pr'),
                'pra_sekolah_pr' => $this->input->post('pra_sekolah_pr'),
                
            );
        $insert = $this->mdl_dt_kia->save($data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_update()
    {
        $data = array(
             'thn_kia' => $this->input->post('thn_kia'),
                'bln_kia' => $this->input->post('bln_kia'),
                'kd_desa' => $this->input->post('kd_desa'),
                'kd_puskes' => $this->input->post('kd_puskes'),
                'hml_k1' => $this->input->post('hml_k1'),
                'hml_k4' => $this->input->post('hml_k4'),
                'hml_fresiko' => $this->input->post('hml_fresiko'),
                'hml_tgi' => $this->input->post('hml_tgi'),
                'hml_tgi_rjuk' => $this->input->post('hml_tgi_rjuk'),
                'salin_tng' => $this->input->post('salin_tng'),
                'lahir_hdp_bblr' => $this->input->post('lahir_hdp_bblr'),
                'lahir_mti' => $this->input->post('lahir_mti'),
                'jml_neo' => $this->input->post('jml_neo'),
                'jml_neo_risti' => $this->input->post('jml_neo_risti'),
                'jml_neo_mti' => $this->input->post('jml_neo_mti'),
                'jml_materi' => $this->input->post('jml_materi'),
                'balita_stimul' => $this->input->post('balita_stimul'),
                'pra_sekolah' => $this->input->post('pra_sekolah'),
                'hml_k1_pr' => $this->input->post('hml_k1_pr'),
                'hml_k4_pr' => $this->input->post('hml_k4_pr'),
                'hml_fresiko_pr' => $this->input->post('hml_fresiko_pr'),
                'hml_tgi_pr' => $this->input->post('hml_tgi_pr'),
                'hml_tgi_rjuk_pr' => $this->input->post('hml_tgi_rjuk_pr'),
                'salin_tng_pr' => $this->input->post('salin_tng_pr'),
                'lahir_hdp_bblr_pr' => $this->input->post('lahir_hdp_bblr_pr'),
                'lahir_mti_pr' => $this->input->post('lahir_mti_pr'),
                'jml_neo_pr' => $this->input->post('jml_neo_pr'),
                'jml_neo_risti_pr' => $this->input->post('jml_neo_risti_pr'),
                'jml_neo_mti_pr' => $this->input->post('jml_neo_mti_pr'),
                'jml_materi_pr' => $this->input->post('jml_materi_pr'),
                'balita_stimul_pr' => $this->input->post('balita_stimul_pr'),
                'pra_sekolah_pr' => $this->input->post('pra_sekolah_pr'),
            );

        $this->mdl_dt_kia->update(array('id_kia' => $this->input->post('id_kia')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_delete($id)
    {
        $this->mdl_dt_kia->delete($id);
        echo json_encode(array("status" => TRUE));
    }

public function lookup_desa(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_dt_kia->lookup_desa($keyword); //Search DB  
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