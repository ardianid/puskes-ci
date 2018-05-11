<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class dt_kesling_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dt_kesling','mdl_dt_kesling');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fdt_kesling',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $thn = $_POST['thn'];
        $bln = $_POST['bln'];
        $desa = $_POST['desa'];

        $list = $this->mdl_dt_kesling->get_datatables_pencarian($thn,$bln,$desa);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->thn_kesling;
            $row[] = $person->bln_kesling;
            $row[] = $person->nama_desa;
            $row[] = $person->nama_kel;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_ins('."'".$person->id_kesling."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_ins('."'".$person->id_kesling."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_dt_kesling->count_all_pencarian($thn,$bln,$desa),
                        "recordsFiltered" => $this->mdl_dt_kesling->count_filtered_pencarian($thn,$bln,$desa),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_dt_kesling->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'thn_kesling' => $this->input->post('thn_kesling'),
                'bln_kesling' => $this->input->post('bln_kesling'),
                'kd_desa' => $this->input->post('kd_desa'),
                'jml_ari' => $this->input->post('jml_ari'),
                'jml_ari_pr' => $this->input->post('jml_ari_pr'),
                'jml_air' => $this->input->post('jml_air'),
                'jml_air_pr' => $this->input->post('jml_air_pr'),
                'jml_sair' => $this->input->post('jml_sair'),
                'jml_sair_pr' => $this->input->post('jml_sair_pr'),
                'jml_sair2' => $this->input->post('jml_sair2'),
                'jml_sair2_pr' => $this->input->post('jml_sair2_pr'),
                'jml_sair3' => $this->input->post('jml_sair3'),
                'jml_sair3_pr' => $this->input->post('jml_sair3_pr'),
                'jml_kmakan' => $this->input->post('jml_kmakan'),
                'jml_kmakan_pr' => $this->input->post('jml_kmakan_pr'),
                'jml_tpm' => $this->input->post('jml_tpm'),
                'jml_tpm_pr' => $this->input->post('jml_tpm_pr'),
                'jml_periksa' => $this->input->post('jml_periksa'),
                'jml_periksa_pr' => $this->input->post('jml_periksa_pr'),

                'kd_puskes' => $this->input->post('kd_puskes'),

                'jml_sani' => $this->input->post('jml_sani'),
                'jml_sani_pr' => $this->input->post('jml_sani_pr'),
                'jml_pesti' => $this->input->post('jml_pesti'),
                'jml_pesti_pr' => $this->input->post('jml_pesti_pr'),
                'jml_tp2' => $this->input->post('jml_tp2'),
                'jml_tp2_pr' => $this->input->post('jml_tp2_pr'),
                'jml_ttu' => $this->input->post('jml_ttu'),
                'jml_ttu_pr' => $this->input->post('jml_ttu_pr'),
                'jml_ttu2' => $this->input->post('jml_ttu2'),
                'jml_ttu2_pr' => $this->input->post('jml_ttu2_pr'),

            );
        $insert = $this->mdl_dt_kesling->save($data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_update()
    {
        $data = array(
             'thn_kesling' => $this->input->post('thn_kesling'),
                'bln_kesling' => $this->input->post('bln_kesling'),
                'kd_desa' => $this->input->post('kd_desa'),
                'jml_ari' => $this->input->post('jml_ari'),
                'jml_ari_pr' => $this->input->post('jml_ari_pr'),
                'jml_air' => $this->input->post('jml_air'),
                'jml_air_pr' => $this->input->post('jml_air_pr'),
                'jml_sair' => $this->input->post('jml_sair'),
                'jml_sair_pr' => $this->input->post('jml_sair_pr'),
                'jml_sair2' => $this->input->post('jml_sair2'),
                'jml_sair2_pr' => $this->input->post('jml_sair2_pr'),
                'jml_sair3' => $this->input->post('jml_sair3'),
                'jml_sair3_pr' => $this->input->post('jml_sair3_pr'),
                'jml_kmakan' => $this->input->post('jml_kmakan'),
                'jml_kmakan_pr' => $this->input->post('jml_kmakan_pr'),
                'jml_tpm' => $this->input->post('jml_tpm'),
                'jml_tpm_pr' => $this->input->post('jml_tpm_pr'),
                'jml_periksa' => $this->input->post('jml_periksa'),
                'jml_periksa_pr' => $this->input->post('jml_periksa_pr'),

                'kd_puskes' => $this->input->post('kd_puskes'),

                'jml_sani' => $this->input->post('jml_sani'),
                'jml_sani_pr' => $this->input->post('jml_sani_pr'),
                'jml_pesti' => $this->input->post('jml_pesti'),
                'jml_pesti_pr' => $this->input->post('jml_pesti_pr'),
                'jml_tp2' => $this->input->post('jml_tp2'),
                'jml_tp2_pr' => $this->input->post('jml_tp2_pr'),
                'jml_ttu' => $this->input->post('jml_ttu'),
                'jml_ttu_pr' => $this->input->post('jml_ttu_pr'),
                'jml_ttu2' => $this->input->post('jml_ttu2'),
                'jml_ttu2_pr' => $this->input->post('jml_ttu2_pr'),

            );

        $this->mdl_dt_kesling->update(array('id_kesling' => $this->input->post('id_kesling')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_delete($id)
    {
        $this->mdl_dt_kesling->delete($id);
        echo json_encode(array("status" => TRUE));
    }

public function lookup_desa(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_dt_kesling->lookup_desa($keyword); //Search DB  
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