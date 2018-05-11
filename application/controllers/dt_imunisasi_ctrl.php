<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class dt_imunisasi_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dt_imunisasi','mdl_dt_imunisasi');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fdt_imunisasi',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $thn = $_POST['thn'];
        $bln = $_POST['bln'];
        $desa = $_POST['desa'];

        $list = $this->mdl_dt_imunisasi->get_datatables_pencarian($thn,$bln,$desa);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->thn_imun;
            $row[] = $person->bln_imun;
            $row[] = $person->nama_desa;
            $row[] = $person->nama_kel;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_ins('."'".$person->id_imun."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_ins('."'".$person->id_imun."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_dt_imunisasi->count_all_pencarian($thn,$bln,$desa),
                        "recordsFiltered" => $this->mdl_dt_imunisasi->count_filtered_pencarian($thn,$bln,$desa),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_dt_imunisasi->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'thn_imun' => $this->input->post('thn_imun'),
                'bln_imun' => $this->input->post('bln_imun'),
                'kd_desa' => $this->input->post('kd_desa'),
                'kd_puskes' => $this->input->post('kd_puskes'),
                'campak' => $this->input->post('campak'),
                'dpt1' => $this->input->post('dpt1'),
                'hep_b1' => $this->input->post('hep_b1'),
                'hep_b3' => $this->input->post('hep_b3'),
                'tt1_pr' => $this->input->post('tt1_pr'),
                'tt2_pr' => $this->input->post('tt2_pr'),
                'tt_bos_pr' => $this->input->post('tt_bos_pr'),
                'wanita_tt1_pr' => $this->input->post('wanita_tt1_pr'),
                'dt1' => $this->input->post('dt1'),
                'dt2' => $this->input->post('dt2'),
                'sd_tt1_pr' => $this->input->post('sd_tt1_pr'),
                'sd_tt2_pr' => $this->input->post('sd_tt2_pr'),
                'campak_pr' => $this->input->post('campak_pr'),
                'dpt1_pr' => $this->input->post('dpt1_pr'),
                'hep_b1_pr' => $this->input->post('hep_b1_pr'),
                'hep_b3_pr' => $this->input->post('hep_b3_pr'),
                'dt1_pr' => $this->input->post('dt1_pr'),
                'dt2_pr' => $this->input->post('dt2_pr'),
                
            );
        $insert = $this->mdl_dt_imunisasi->save($data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_update()
    {
        $data = array(
             'thn_imun' => $this->input->post('thn_imun'),
                'bln_imun' => $this->input->post('bln_imun'),
                'kd_desa' => $this->input->post('kd_desa'),
                'kd_puskes' => $this->input->post('kd_puskes'),
                'campak' => $this->input->post('campak'),
                'dpt1' => $this->input->post('dpt1'),
                'hep_b1' => $this->input->post('hep_b1'),
                'hep_b3' => $this->input->post('hep_b3'),
                'tt1_pr' => $this->input->post('tt1_pr'),
                'tt2_pr' => $this->input->post('tt2_pr'),
                'tt_bos_pr' => $this->input->post('tt_bos_pr'),
                'wanita_tt1_pr' => $this->input->post('wanita_tt1_pr'),
                'dt1' => $this->input->post('dt1'),
                'dt2' => $this->input->post('dt2'),
                'sd_tt1_pr' => $this->input->post('sd_tt1_pr'),
                'sd_tt2_pr' => $this->input->post('sd_tt2_pr'),
                'campak_pr' => $this->input->post('campak_pr'),
                'dpt1_pr' => $this->input->post('dpt1_pr'),
                'hep_b1_pr' => $this->input->post('hep_b1_pr'),
                'hep_b3_pr' => $this->input->post('hep_b3_pr'),
                'dt1_pr' => $this->input->post('dt1_pr'),
                'dt2_pr' => $this->input->post('dt2_pr'),
            );

        $this->mdl_dt_imunisasi->update(array('id_imun' => $this->input->post('id_imun')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_delete($id)
    {
        $this->mdl_dt_imunisasi->delete($id);
        echo json_encode(array("status" => TRUE));
    }

public function lookup_desa(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_dt_imunisasi->lookup_desa($keyword); //Search DB  
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