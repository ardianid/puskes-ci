<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class dt_penyakitm_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dt_penyakitm','mdl_dt_penyakitm');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fdt_penyakitm',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $thn = $_POST['thn'];
        $bln = $_POST['bln'];
        $desa = $_POST['desa'];

        $list = $this->mdl_dt_penyakitm->get_datatables_pencarian($thn,$bln,$desa);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->thn_penyakit;
            $row[] = $person->bln_penyakit;
            $row[] = $person->nama_desa;
            $row[] = $person->nama_kel;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_ins('."'".$person->id_penyakitm."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_ins('."'".$person->id_penyakitm."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_dt_penyakitm->count_all_pencarian($thn,$bln,$desa),
                        "recordsFiltered" => $this->mdl_dt_penyakitm->count_filtered_pencarian($thn,$bln,$desa),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_dt_penyakitm->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'thn_penyakit' => $this->input->post('thn_penyakit'),
                'bln_penyakit' => $this->input->post('bln_penyakit'),
                'kd_desa' => $this->input->post('kd_desa'),
                'kd_puskes' => $this->input->post('kd_puskes'),

                'a_afp1' => $this->input->post('a_afp1'),
                'a_afp2' => $this->input->post('a_afp2'),
                'b_tetanus1' => $this->input->post('b_tetanus1'),
                'b_tetanus2' => $this->input->post('b_tetanus2'),
                'c_komplikasi' => $this->input->post('c_komplikasi'),
                'c_semprot' => $this->input->post('c_semprot'),
                'd_pdbd' => $this->input->post('d_pdbd'),
                'd_foging' => $this->input->post('d_foging'),
                'd_diabit' => $this->input->post('d_diabit'),
                'd_psn' => $this->input->post('d_psn'),
                'd_jentik' => $this->input->post('d_jentik'),
                'd_rjentik' => $this->input->post('d_rjentik'),
                'e_rabies' => $this->input->post('e_rabies'),
                'e_varsar' => $this->input->post('e_varsar'),
                'f_endemis' => $this->input->post('f_endemis'),
                'f_masal' => $this->input->post('f_masal'),
                'g_zoon' => $this->input->post('g_zoon'),
                'h_frambu1' => $this->input->post('h_frambu1'),
                'h_frambu2' => $this->input->post('h_frambu2'),
                'h_frambu3' => $this->input->post('h_frambu3'),
                'i_diare_oralit' => $this->input->post('i_diare_oralit'),
                'i_diare_infus' => $this->input->post('i_diare_infus'),
                'i_diare_anti' => $this->input->post('i_diare_anti'),
                'j_ispa' => $this->input->post('j_ispa'),
                'k_bta1' => $this->input->post('k_bta1'),
                'k_bta2' => $this->input->post('k_bta2'),
                'k_lengkap' => $this->input->post('k_lengkap'),
                'k_sembuh' => $this->input->post('k_sembuh'),
                'k_kambuh' => $this->input->post('k_kambuh'),   
                'l_pb1' => $this->input->post('l_pb1'),   
                'l_baru' => $this->input->post('l_baru'),   
                'l_mb' => $this->input->post('l_mb'),   
                'l_cacat2' => $this->input->post('l_cacat2'),   
                'l_mdt' => $this->input->post('l_mdt'),   
                'l_pb2' => $this->input->post('l_pb2'),   
                'l_mb_komplit' => $this->input->post('l_mb_komplit'),   
                'l_pb_komplit' => $this->input->post('l_pb_komplit'),   
                'l_pb_komplit' => $this->input->post('l_pb_komplit'),   
                
                'a_afp1_pr' => $this->input->post('a_afp1_pr'),
                'a_afp2_pr' => $this->input->post('a_afp2_pr'),
                'b_tetanus1_pr' => $this->input->post('b_tetanus1_pr'),
                'b_tetanus2_pr' => $this->input->post('b_tetanus2_pr'),
                'c_komplikasi_pr' => $this->input->post('c_komplikasi_pr'),
                'c_bumil_pr' => $this->input->post('c_bumil_pr'),
                'c_semprot_pr' => $this->input->post('c_semprot_pr'),
                'd_pdbd_pr' => $this->input->post('d_pdbd_pr'),
                'd_foging_pr' => $this->input->post('d_foging_pr'),
                'd_diabit_pr' => $this->input->post('d_diabit_pr'),
                'd_psn_pr' => $this->input->post('d_psn_pr'),
                'd_jentik_pr' => $this->input->post('d_jentik_pr'),
                'd_rjentik_pr' => $this->input->post('d_rjentik_pr'),
                'e_rabies_pr' => $this->input->post('e_rabies_pr'),
                'e_varsar_pr' => $this->input->post('e_varsar_pr'),
                'f_endemis_pr' => $this->input->post('f_endemis_pr'),
                'f_masal_pr' => $this->input->post('f_masal_pr'),
                'g_zoon_pr' => $this->input->post('g_zoon_pr'),
                'h_frambu1_pr' => $this->input->post('h_frambu1_pr'),
                'h_frambu2_pr' => $this->input->post('h_frambu2_pr'),
                'h_frambu3_pr' => $this->input->post('h_frambu3_pr'),
                'i_diare_oralit_pr' => $this->input->post('i_diare_oralit_pr'),
                'i_diare_infus_pr' => $this->input->post('i_diare_infus_pr'),
                'i_diare_anti_pr' => $this->input->post('i_diare_anti_pr'),
                'j_ispa_pr' => $this->input->post('j_ispa_pr'),
                'k_bta1_pr' => $this->input->post('k_bta1_pr'),
                'k_bta2_pr' => $this->input->post('k_bta2_pr'),
                'k_lengkap_pr' => $this->input->post('k_lengkap_pr'),
                'k_sembuh_pr' => $this->input->post('k_sembuh_pr'),
                'k_kambuh_pr' => $this->input->post('k_kambuh_pr'),   
                'l_pb1_pr' => $this->input->post('l_pb1_pr'),   
                'l_baru_pr' => $this->input->post('l_baru_pr'),   
                'l_mb_pr' => $this->input->post('l_mb_pr'),   
                'l_cacat2_pr' => $this->input->post('l_cacat2_pr'),   
                'l_mdt_pr' => $this->input->post('l_mdt_pr'),   
                'l_pb2_pr' => $this->input->post('l_pb2_pr'),   
                'l_mb_komplit_pr' => $this->input->post('l_mb_komplit_pr'),   
                'l_pb_komplit_pr' => $this->input->post('l_pb_komplit_pr'),   
                'l_pb_komplit_pr' => $this->input->post('l_pb_komplit_pr'),

            );
        $insert = $this->mdl_dt_penyakitm->save($data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_update()
    {
        $data = array(
             'thn_penyakit' => $this->input->post('thn_penyakit'),
                'bln_penyakit' => $this->input->post('bln_penyakit'),
                'kd_desa' => $this->input->post('kd_desa'),
                'kd_puskes' => $this->input->post('kd_puskes'),

                'a_afp1' => $this->input->post('a_afp1'),
                'a_afp2' => $this->input->post('a_afp2'),
                'b_tetanus1' => $this->input->post('b_tetanus1'),
                'b_tetanus2' => $this->input->post('b_tetanus2'),
                'c_komplikasi' => $this->input->post('c_komplikasi'),
                'c_semprot' => $this->input->post('c_semprot'),
                'd_pdbd' => $this->input->post('d_pdbd'),
                'd_foging' => $this->input->post('d_foging'),
                'd_diabit' => $this->input->post('d_diabit'),
                'd_psn' => $this->input->post('d_psn'),
                'd_jentik' => $this->input->post('d_jentik'),
                'd_rjentik' => $this->input->post('d_rjentik'),
                'e_rabies' => $this->input->post('e_rabies'),
                'e_varsar' => $this->input->post('e_varsar'),
                'f_endemis' => $this->input->post('f_endemis'),
                'f_masal' => $this->input->post('f_masal'),
                'g_zoon' => $this->input->post('g_zoon'),
                'h_frambu1' => $this->input->post('h_frambu1'),
                'h_frambu2' => $this->input->post('h_frambu2'),
                'h_frambu3' => $this->input->post('h_frambu3'),
                'i_diare_oralit' => $this->input->post('i_diare_oralit'),
                'i_diare_infus' => $this->input->post('i_diare_infus'),
                'i_diare_anti' => $this->input->post('i_diare_anti'),
                'j_ispa' => $this->input->post('j_ispa'),
                'k_bta1' => $this->input->post('k_bta1'),
                'k_bta2' => $this->input->post('k_bta2'),
                'k_lengkap' => $this->input->post('k_lengkap'),
                'k_sembuh' => $this->input->post('k_sembuh'),
                'k_kambuh' => $this->input->post('k_kambuh'),   
                'l_pb1' => $this->input->post('l_pb1'),   
                'l_baru' => $this->input->post('l_baru'),   
                'l_mb' => $this->input->post('l_mb'),   
                'l_cacat2' => $this->input->post('l_cacat2'),   
                'l_mdt' => $this->input->post('l_mdt'),   
                'l_pb2' => $this->input->post('l_pb2'),   
                'l_mb_komplit' => $this->input->post('l_mb_komplit'),   
                'l_pb_komplit' => $this->input->post('l_pb_komplit'),   
                'l_pb_komplit' => $this->input->post('l_pb_komplit'),   
                
                'a_afp1_pr' => $this->input->post('a_afp1_pr'),
                'a_afp2_pr' => $this->input->post('a_afp2_pr'),
                'b_tetanus1_pr' => $this->input->post('b_tetanus1_pr'),
                'b_tetanus2_pr' => $this->input->post('b_tetanus2_pr'),
                'c_komplikasi_pr' => $this->input->post('c_komplikasi_pr'),
                'c_bumil_pr' => $this->input->post('c_bumil_pr'),
                'c_semprot_pr' => $this->input->post('c_semprot_pr'),
                'd_pdbd_pr' => $this->input->post('d_pdbd_pr'),
                'd_foging_pr' => $this->input->post('d_foging_pr'),
                'd_diabit_pr' => $this->input->post('d_diabit_pr'),
                'd_psn_pr' => $this->input->post('d_psn_pr'),
                'd_jentik_pr' => $this->input->post('d_jentik_pr'),
                'd_rjentik_pr' => $this->input->post('d_rjentik_pr'),
                'e_rabies_pr' => $this->input->post('e_rabies_pr'),
                'e_varsar_pr' => $this->input->post('e_varsar_pr'),
                'f_endemis_pr' => $this->input->post('f_endemis_pr'),
                'f_masal_pr' => $this->input->post('f_masal_pr'),
                'g_zoon_pr' => $this->input->post('g_zoon_pr'),
                'h_frambu1_pr' => $this->input->post('h_frambu1_pr'),
                'h_frambu2_pr' => $this->input->post('h_frambu2_pr'),
                'h_frambu3_pr' => $this->input->post('h_frambu3_pr'),
                'i_diare_oralit_pr' => $this->input->post('i_diare_oralit_pr'),
                'i_diare_infus_pr' => $this->input->post('i_diare_infus_pr'),
                'i_diare_anti_pr' => $this->input->post('i_diare_anti_pr'),
                'j_ispa_pr' => $this->input->post('j_ispa_pr'),
                'k_bta1_pr' => $this->input->post('k_bta1_pr'),
                'k_bta2_pr' => $this->input->post('k_bta2_pr'),
                'k_lengkap_pr' => $this->input->post('k_lengkap_pr'),
                'k_sembuh_pr' => $this->input->post('k_sembuh_pr'),
                'k_kambuh_pr' => $this->input->post('k_kambuh_pr'),   
                'l_pb1_pr' => $this->input->post('l_pb1_pr'),   
                'l_baru_pr' => $this->input->post('l_baru_pr'),   
                'l_mb_pr' => $this->input->post('l_mb_pr'),   
                'l_cacat2_pr' => $this->input->post('l_cacat2_pr'),   
                'l_mdt_pr' => $this->input->post('l_mdt_pr'),   
                'l_pb2_pr' => $this->input->post('l_pb2_pr'),   
                'l_mb_komplit_pr' => $this->input->post('l_mb_komplit_pr'),   
                'l_pb_komplit_pr' => $this->input->post('l_pb_komplit_pr'),   
                'l_pb_komplit_pr' => $this->input->post('l_pb_komplit_pr'),
                 
            );

        $this->mdl_dt_penyakitm->update(array('id_penyakitm' => $this->input->post('id_penyakitm')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_delete($id)
    {
        $this->mdl_dt_penyakitm->delete($id);
        echo json_encode(array("status" => TRUE));
    }

public function lookup_desa(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_dt_penyakitm->lookup_desa($keyword); //Search DB  
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