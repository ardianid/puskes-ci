<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class dt_gizi_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dt_gizi','mdl_dt_gizi');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fdt_gizi',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $thn = $_POST['thn'];
        $bln = $_POST['bln'];
        $desa = $_POST['desa'];

        $list = $this->mdl_dt_gizi->get_datatables_pencarian($thn,$bln,$desa);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->thn_gizi;
            $row[] = $person->bln_gizi;
            $row[] = $person->nama_desa;
            $row[] = $person->nama_kel;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_ins('."'".$person->id_gizi."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_ins('."'".$person->id_gizi."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_dt_gizi->count_all_pencarian($thn,$bln,$desa),
                        "recordsFiltered" => $this->mdl_dt_gizi->count_filtered_pencarian($thn,$bln,$desa),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_dt_gizi->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'thn_gizi' => $this->input->post('thn_gizi'),
                'bln_gizi' => $this->input->post('bln_gizi'),
                'kd_desa' => $this->input->post('kd_desa'),
                'jml_bayi_vit' => $this->input->post('jml_bayi_vit'),
                'jml_balita_200' => $this->input->post('jml_balita_200'),
                'jml_ibu_nifas' => $this->input->post('jml_ibu_nifas'),
                'jml_ibu_hml_f1' => $this->input->post('jml_ibu_hml_f1'),
                'jml_ibu_hml_f3' => $this->input->post('jml_ibu_hml_f3'),
                'jml_balita_febal1' => $this->input->post('jml_balita_febal1'),
                'jml_balita_febal2' => $this->input->post('jml_balita_febal2'),
                'jml_bayi1_timbang' => $this->input->post('jml_bayi1_timbang'),
                'jml_balita14_timbang' => $this->input->post('jml_balita14_timbang'),
                'jml_bayi_bawah' => $this->input->post('jml_bayi_bawah'),
                'jml_sd16_yodium' => $this->input->post('jml_sd16_yodium'),
                'jml_wus_yodium' => $this->input->post('jml_wus_yodium'),
                'jml_bumil_yodium' => $this->input->post('jml_bumil_yodium'),
                'jml_buteki_yodium' => $this->input->post('jml_buteki_yodium'),
                'jml_wus1445_lila' => $this->input->post('jml_wus1445_lila'),
                'jml_wus23_lila' => $this->input->post('jml_wus23_lila'),
                'kd_puskes' => $this->input->post('kd_puskes'),
                'jml_bayi_vit_pr' => $this->input->post('jml_bayi_vit_pr'),
                'jml_balita_200_pr' => $this->input->post('jml_balita_200_pr'),
                'jml_ibu_nifas_pr' => $this->input->post('jml_ibu_nifas_pr'),
                'jml_ibu_hml_f1_pr' => $this->input->post('jml_ibu_hml_f1_pr'),
                'jml_ibu_hml_f3_pr' => $this->input->post('jml_ibu_hml_f3_pr'),
                'jml_balita_febal1_pr' => $this->input->post('jml_balita_febal1_pr'),
                'jml_balita_febal2_pr' => $this->input->post('jml_balita_febal2_pr'),
                'jml_bayi1_timbang_pr' => $this->input->post('jml_bayi1_timbang_pr'),
                'jml_balita14_timbang_pr' => $this->input->post('jml_balita14_timbang_pr'),
                'jml_bayi_bawah_pr' => $this->input->post('jml_bayi_bawah_pr'),
                'jml_sd16_yodium_pr' => $this->input->post('jml_sd16_yodium_pr'),
                'jml_wus_yodium_pr' => $this->input->post('jml_wus_yodium_pr'),
                'jml_bumil_yodium_pr' => $this->input->post('jml_bumil_yodium_pr'),
                'jml_buteki_yodium_pr' => $this->input->post('jml_buteki_yodium_pr'),
                'jml_wus1445_lila_pr' => $this->input->post('jml_wus1445_lila_pr'),
                'jml_wus23_lila_pr' => $this->input->post('jml_wus23_lila_pr'),
            );
        $insert = $this->mdl_dt_gizi->save($data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_update()
    {
        $data = array(
             'thn_gizi' => $this->input->post('thn_gizi'),
                'bln_gizi' => $this->input->post('bln_gizi'),
                'kd_desa' => $this->input->post('kd_desa'),
                'jml_bayi_vit' => $this->input->post('jml_bayi_vit'),
                'jml_balita_200' => $this->input->post('jml_balita_200'),
                'jml_ibu_nifas' => $this->input->post('jml_ibu_nifas'),
                'jml_ibu_hml_f1' => $this->input->post('jml_ibu_hml_f1'),
                'jml_ibu_hml_f3' => $this->input->post('jml_ibu_hml_f3'),
                'jml_balita_febal1' => $this->input->post('jml_balita_febal1'),
                'jml_balita_febal2' => $this->input->post('jml_balita_febal2'),
                'jml_bayi1_timbang' => $this->input->post('jml_bayi1_timbang'),
                'jml_balita14_timbang' => $this->input->post('jml_balita14_timbang'),
                'jml_bayi_bawah' => $this->input->post('jml_bayi_bawah'),
                'jml_sd16_yodium' => $this->input->post('jml_sd16_yodium'),
                'jml_wus_yodium' => $this->input->post('jml_wus_yodium'),
                'jml_bumil_yodium' => $this->input->post('jml_bumil_yodium'),
                'jml_buteki_yodium' => $this->input->post('jml_buteki_yodium'),
                'jml_wus1445_lila' => $this->input->post('jml_wus1445_lila'),
                'jml_wus23_lila' => $this->input->post('jml_wus23_lila'),
                'kd_puskes' => $this->input->post('kd_puskes'),
                'jml_bayi_vit_pr' => $this->input->post('jml_bayi_vit_pr'),
                'jml_balita_200_pr' => $this->input->post('jml_balita_200_pr'),
                'jml_ibu_nifas_pr' => $this->input->post('jml_ibu_nifas_pr'),
                'jml_ibu_hml_f1_pr' => $this->input->post('jml_ibu_hml_f1_pr'),
                'jml_ibu_hml_f3_pr' => $this->input->post('jml_ibu_hml_f3_pr'),
                'jml_balita_febal1_pr' => $this->input->post('jml_balita_febal1_pr'),
                'jml_balita_febal2_pr' => $this->input->post('jml_balita_febal2_pr'),
                'jml_bayi1_timbang_pr' => $this->input->post('jml_bayi1_timbang_pr'),
                'jml_balita14_timbang_pr' => $this->input->post('jml_balita14_timbang_pr'),
                'jml_bayi_bawah_pr' => $this->input->post('jml_bayi_bawah_pr'),
                'jml_sd16_yodium_pr' => $this->input->post('jml_sd16_yodium_pr'),
                'jml_wus_yodium_pr' => $this->input->post('jml_wus_yodium_pr'),
                'jml_bumil_yodium_pr' => $this->input->post('jml_bumil_yodium_pr'),
                'jml_buteki_yodium_pr' => $this->input->post('jml_buteki_yodium_pr'),
                'jml_wus1445_lila_pr' => $this->input->post('jml_wus1445_lila_pr'),
                'jml_wus23_lila_pr' => $this->input->post('jml_wus23_lila_pr'),
            );

        $this->mdl_dt_gizi->update(array('id_gizi' => $this->input->post('id_gizi')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_delete($id)
    {
        $this->mdl_dt_gizi->delete($id);
        echo json_encode(array("status" => TRUE));
    }

public function lookup_desa(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_dt_gizi->lookup_desa($keyword); //Search DB  
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