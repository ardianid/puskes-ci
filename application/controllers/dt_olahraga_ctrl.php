<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class dt_olahraga_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dt_olahraga','mdl_dt_olahraga');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fdt_olahraga',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $thn = $_POST['thn'];
        $bln = $_POST['bln'];
        $desa = $_POST['desa'];

        $list = $this->mdl_dt_olahraga->get_datatables_pencarian($thn,$bln,$desa);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->thn_olahraga;
            $row[] = $person->bln_olahraga;
            $row[] = $person->nama_desa;
            $row[] = $person->nama_kel;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_ins('."'".$person->id_olahraga."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_ins('."'".$person->id_olahraga."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_dt_olahraga->count_all_pencarian($thn,$bln,$desa),
                        "recordsFiltered" => $this->mdl_dt_olahraga->count_filtered_pencarian($thn,$bln,$desa),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_dt_olahraga->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'thn_olahraga' => $this->input->post('thn_olahraga'),
                'bln_olahraga' => $this->input->post('bln_olahraga'),
                'kd_desa' => $this->input->post('kd_desa'),
                'jml_klub' => $this->input->post('jml_klub'),
                'jml_klub_pr' => $this->input->post('jml_klub_pr'),
                'jml_pelkes' => $this->input->post('jml_pelkes'),
                'jml_pelkes_pr' => $this->input->post('jml_pelkes_pr'),

            );
        $insert = $this->mdl_dt_olahraga->save($data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_update()
    {
        $data = array(
             'thn_olahraga' => $this->input->post('thn_olahraga'),
                'bln_olahraga' => $this->input->post('bln_olahraga'),
                'kd_desa' => $this->input->post('kd_desa'),
                'jml_klub' => $this->input->post('jml_klub'),
                'jml_klub_pr' => $this->input->post('jml_klub_pr'),
                'jml_pelkes' => $this->input->post('jml_pelkes'),
                'jml_pelkes_pr' => $this->input->post('jml_pelkes_pr'),
            );

        $this->mdl_dt_olahraga->update(array('id_olahraga' => $this->input->post('id_olahraga')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_delete($id)
    {
        $this->mdl_dt_olahraga->delete($id);
        echo json_encode(array("status" => TRUE));
    }

public function lookup_desa(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_dt_olahraga->lookup_desa($keyword); //Search DB  
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