<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class kelurahan_ctrl extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_kelurahan','mdl_kelurahan');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('fkelurahan');
    }
 
    public function ajax_list()
    {
        $list = $this->mdl_kelurahan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nama_kec;
            $row[] = $person->nama_kel;
            
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->kd_kel."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_person('."'".$person->kd_kel."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_kelurahan->count_all(),
                        "recordsFiltered" => $this->mdl_kelurahan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->mdl_kelurahan->get_by_id($id);
        //$data->tgl_lahir = ($data->tgl_lahir == '0000-00-00') ? '' : $data->tgl_lahir;
       // $data->sex = ($data->sex == 0) ? 'Pria' : 'Wanita';
        echo json_encode($data);
    }
 
    public function ajax_add()
    {

       /*
        $hasil_cek= $this->mdl_pasien->cek_kode($this->input->post('tkd_pasien'));


        if ($hasil_cek=='')
        {*/

            $data = array(
                'kd_kec' => $this->input->post('tkode_kec'),
                'nama_kel' => $this->input->post('tnama_kel'),
            );
        $insert = $this->mdl_kelurahan->save($data,$this->input->post('tnama_kel'));
        echo json_encode(array("status" => TRUE));
        
        

        
    }
 
    public function ajax_update()
    {
        $data = array(
                'nama_kel' => $this->input->post('tnama_kel'),
            );
        $this->mdl_kelurahan->update(array('kd_kel' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->mdl_kelurahan->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('tkecamatan') == '')
        {
            $data['inputerror'][] = 'tkecamatan';
            $data['error_string'][] = 'Kecamatan harus diisi';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('tnama_kel') == '')
        {
            $data['inputerror'][] = 'tnama_kel';
            $data['error_string'][] = 'Nama kelurahan diisi';
            $data['status'] = FALSE;
        }
    }

    public function lookup_kecamatan(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_kelurahan->lookup_kecamatan($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->kd_kec,  
                                        'value' => $row->nama_kec,  
                                        ''  
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