<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class dt_kesmas_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dt_kesmas','mdl_dt_kesmas');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fdt_kesmas',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $thn = $_POST['thn'];
        $bln = $_POST['bln'];
        $desa = $_POST['desa'];

        $list = $this->mdl_dt_kesmas->get_datatables_pencarian($thn,$bln,$desa);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->thn_kesmas;
            $row[] = $person->bln_kesmas;
            $row[] = $person->nama_desa;
            $row[] = $person->nama_kel;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_ins('."'".$person->id_kesmas."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_ins('."'".$person->id_kesmas."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_dt_kesmas->count_all_pencarian($thn,$bln,$desa),
                        "recordsFiltered" => $this->mdl_dt_kesmas->count_filtered_pencarian($thn,$bln,$desa),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_dt_kesmas->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'thn_kesmas' => $this->input->post('thn_kesmas'),
                'bln_kesmas' => $this->input->post('bln_kesmas'),
                'kd_desa' => $this->input->post('kd_desa'),
                'kel_tbparu' => $this->input->post('kel_tbparu'),
                'kel_tbparu_pr' => $this->input->post('kel_tbparu_pr'),
                'kel_kusta' => $this->input->post('kel_kusta'),
                'kel_kusta_pr' => $this->input->post('kel_kusta_pr'),
                'kel_hamil_pr' => $this->input->post('kel_hamil_pr'),
                'kel_risti' => $this->input->post('kel_risti'),
                'kel_risti_pr' => $this->input->post('kel_risti_pr'),
                'kel_tetanus' => $this->input->post('kel_tetanus'),
                'kel_tetanus_pr' => $this->input->post('kel_tetanus_pr'),
                'kel_balita_risti' => $this->input->post('kel_balita_risti'),
                'kel_balita_risti_pr' => $this->input->post('kel_balita_risti_pr'),
                'kel_usila_risti' => $this->input->post('kel_usila_risti'),
                'kel_usila_risti_pr' => $this->input->post('kel_usila_risti_pr'),
                'kel_reslain' => $this->input->post('kel_reslain'),
                'kel_reslain_pr' => $this->input->post('kel_reslain_pr'),
                'kel_kartu' => $this->input->post('kel_kartu'),
                'kel_kartu_pr' => $this->input->post('kel_kartu_pr'),
                'panti_khus' => $this->input->post('panti_khus'),
                'panti_khus_pr' => $this->input->post('panti_khus_pr'),
                'sluh_wil' => $this->input->post('sluh_wil'),
                'sluh_wil_pr' => $this->input->post('sluh_wil_pr'),
                'sluh_kwil' => $this->input->post('sluh_kwil'),
                'sluh_kwil_pr' => $this->input->post('sluh_kwil_pr'),
            );
        $insert = $this->mdl_dt_kesmas->save($data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_update()
    {
        $data = array(
            'thn_kesmas' => $this->input->post('thn_kesmas'),
                'bln_kesmas' => $this->input->post('bln_kesmas'),
                'kd_desa' => $this->input->post('kd_desa'),
                'kel_tbparu' => $this->input->post('kel_tbparu'),
                'kel_tbparu_pr' => $this->input->post('kel_tbparu_pr'),
                'kel_kusta' => $this->input->post('kel_kusta'),
                'kel_kusta_pr' => $this->input->post('kel_kusta_pr'),
                'kel_hamil_pr' => $this->input->post('kel_hamil_pr'),
                'kel_risti' => $this->input->post('kel_risti'),
                'kel_risti_pr' => $this->input->post('kel_risti_pr'),
                'kel_tetanus' => $this->input->post('kel_tetanus'),
                'kel_tetanus_pr' => $this->input->post('kel_tetanus_pr'),
                'kel_balita_risti' => $this->input->post('kel_balita_risti'),
                'kel_balita_risti_pr' => $this->input->post('kel_balita_risti_pr'),
                'kel_usila_risti' => $this->input->post('kel_usila_risti'),
                'kel_usila_risti_pr' => $this->input->post('kel_usila_risti_pr'),
                'kel_reslain' => $this->input->post('kel_reslain'),
                'kel_reslain_pr' => $this->input->post('kel_reslain_pr'),
                'kel_kartu' => $this->input->post('kel_kartu'),
                'kel_kartu_pr' => $this->input->post('kel_kartu_pr'),
                'panti_khus' => $this->input->post('panti_khus'),
                'panti_khus_pr' => $this->input->post('panti_khus_pr'),
                'sluh_wil' => $this->input->post('sluh_wil'),
                'sluh_wil_pr' => $this->input->post('sluh_wil_pr'),
                'sluh_kwil' => $this->input->post('sluh_kwil'),
                'sluh_kwil_pr' => $this->input->post('sluh_kwil_pr'),
            );

        $this->mdl_dt_kesmas->update(array('id_kesmas' => $this->input->post('id_kesmas')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_delete($id)
    {
        $this->mdl_dt_kesmas->delete($id);
        echo json_encode(array("status" => TRUE));
    }

public function lookup_desa(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_dt_kesmas->lookup_desa($keyword); //Search DB  
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