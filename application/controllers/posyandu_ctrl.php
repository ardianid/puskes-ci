<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class posyandu_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_posyandu','mdl_posyandu');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];

        $this->load->view('fposyandu',$data);
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $nama_rm = $_POST['nama_posyandu'];
        $alamat_rm = $_POST['alamat_posyandu'];
        $nama_desa = $_POST['nama_desa'];

        $list = $this->mdl_posyandu->get_datatables_pencarian($nama_rm,$alamat_rm,$nama_desa);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nama_posyandu;
            $row[] = $person->alamat_posyandu;
            $row[] = $person->nama_desa;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_ins('."'".$person->id_posyandu."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_ins('."'".$person->id_posyandu."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_posyandu->count_all_pencarian($nama_rm,$alamat_rm,$nama_desa),
                        "recordsFiltered" => $this->mdl_posyandu->count_filtered_pencarian($nama_rm,$alamat_rm,$nama_desa),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_posyandu->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'kd_desa' => $this->input->post('kd_desa'),
                'nama_posyandu' => $this->input->post('nama_posyandu'),
                'alamat_posyandu' => $this->input->post('alamat_posyandu'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'jml_kader' => $this->input->post('jml_kader'),
                'jenis_posyandu' => $this->input->post('jenis_posyandu'),
                'kd_puskes' => $this->input->post('kd_puskes'),
            );
        $insert = $this->mdl_posyandu->save($data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_update()
    {
        $data = array(
                'kd_desa' => $this->input->post('kd_desa'),
                'nama_posyandu' => $this->input->post('nama_posyandu'),
                'alamat_posyandu' => $this->input->post('alamat_posyandu'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'jml_kader' => $this->input->post('jml_kader'),
                'jenis_posyandu' => $this->input->post('jenis_posyandu'),
                'kd_puskes' => $this->input->post('kd_puskes'),
            );

        $this->mdl_posyandu->update(array('id_posyandu' => $this->input->post('id_posyandu')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function ajax_delete($id)
    {
        $this->mdl_posyandu->delete($id);
        echo json_encode(array("status" => TRUE));
    }

public function lookup_desa(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_posyandu->lookup_desa($keyword); //Search DB  
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
        $query = $this->mdl_posyandu->lookup_petugas($keyword); //Search DB  
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