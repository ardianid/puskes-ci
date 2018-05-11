<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class puskes_ctrl extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_puskes','mdl_puskes');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('fpuskes');
    }
 
    public function ajax_list()
    {
        $list = $this->mdl_puskes->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nama_puskes;
            $row[] = $person->alamat_puskes;
            $row[] = $person->nama_kel;
            
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->kd_puskes."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_person('."'".$person->kd_puskes."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_puskes->count_all(),
                        "recordsFiltered" => $this->mdl_puskes->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->mdl_puskes->get_by_id($id);
        //$data->tgl_lahir = ($data->tgl_lahir == '0000-00-00') ? '' : $data->tgl_lahir;
       // $data->sex = ($data->sex == 0) ? 'Pria' : 'Wanita';
        echo json_encode($data);
    }
 
    public function ajax_add()
    {

            $data = array(
                'nama_puskes' => $this->input->post('tnama_puskes'),
                'alamat_puskes' => $this->input->post('talamat_puskes'),
                'kd_kel' => $this->input->post('tkode_kel'),
            );
        $insert = $this->mdl_puskes->save($data,$this->input->post('id'));
        echo json_encode(array("status" => TRUE));
        
        

        
    }
 
    public function ajax_update()
    {
        $data = array(
                'nama_puskes' => $this->input->post('tnama_puskes'),
                'alamat_puskes' => $this->input->post('talamat_puskes'),
                'kd_kel' => $this->input->post('tkode_kel'),
            );
        $this->mdl_puskes->update(array('kd_puskes' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->mdl_puskes->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('tnama_puskes') == '')
        {
            $data['inputerror'][] = 'tnama_puskes';
            $data['error_string'][] = 'Nama Puskesmas harus diisi';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('talamat_puskes') == '')
        {
            $data['inputerror'][] = 'talamat_puskes';
            $data['error_string'][] = 'Alamat puskesmas diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('tkode_kel') == '')
        {
            $data['inputerror'][] = 'tkode_kel';
            $data['error_string'][] = 'Kelurahan diisi';
            $data['status'] = FALSE;
        }

    }

    public function lookup_kelurahan(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_puskes->lookup_kelurahan($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->kd_kel,  
                                        'value' => $row->nama_kel,  
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