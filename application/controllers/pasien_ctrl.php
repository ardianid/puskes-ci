<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class pasien_ctrl extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_pasien','mdl_pasien');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('fpasien');
    }
 
    public function ajax_list()
    {
        $list = $this->mdl_pasien->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->kd_pasien;
            $row[] = $person->nama;
            $row[] = $person->alamat;
            $row[] = $person->sex;
            $row[] = $person->tgl_lahir;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_pasien->count_all(),
                        "recordsFiltered" => $this->mdl_pasien->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->mdl_pasien->get_by_id($id);
        $data->tgl_lahir = ($data->tgl_lahir == '0000-00-00') ? '' : $data->tgl_lahir;
        $data->tgl_daftar = ($data->tgl_daftar == '0000-00-00') ? '' : $data->tgl_daftar;
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
                'kd_pasien' => $this->input->post('tkd_pasien'),
                'nama' => $this->input->post('tnama'),
                'alamat' => $this->input->post('talamat'),
                'sex' => ($this->input->post('tsex')==0) ? 'Pria':'Wanita' ,
                'tgl_lahir' => $this->input->post('ttgl_lahir'),
                'tempat_lahir' => $this->input->post('ttempat_lahir'),
                'tgl_daftar' => $this->input->post('ttgl_daftar'),
                'kd_kel' => $this->input->post('tkd_kel'),
                'jenis_jamkes' => $this->input->post('tjenis_jamkes'),
                'no_jamkes' => $this->input->post('tno_jamkes'),
                'cara_bayar' => $this->input->post('tcara_bayar'),
            );
        $insert = $this->mdl_pasien->save($data,$this->input->post('tkd_pasien'));
        echo json_encode(array("status" => TRUE));
        
        

        
    }
 
    public function ajax_update()
    {
        $data = array(
                'nama' => $this->input->post('tnama'),
                'alamat' => $this->input->post('talamat'),
                'sex' => ($this->input->post('tsex')==0) ? 'Pria':'Wanita' ,
                'tgl_lahir' => $this->input->post('ttgl_lahir'),
                'tempat_lahir' => $this->input->post('ttempat_lahir'),
                'tgl_daftar' => $this->input->post('ttgl_daftar'),
                'kd_kel' => $this->input->post('tkd_kel'),
                'jenis_jamkes' => $this->input->post('tjenis_jamkes'),
                'no_jamkes' => $this->input->post('tno_jamkes'),
                'cara_bayar' => $this->input->post('tcara_bayar'),
            );
        $this->mdl_pasien->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->mdl_pasien->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    public function lookup_kelurahan(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_pasien->lookup_kelurahan($keyword); //Search DB  
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


    public function lookup_pasien(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_pasien->lookup_pasien($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->kd_pasien,  
                                        'value' => $row->nama,  
                                        'desc' => $row->alamat,
                                        'desc2' => $row->tgl_lahir,
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


    public function lookup_pasien_bykode(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_pasien->lookup_pasien_bykode($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->kd_pasien,  
                                        'value' => $row->kd_pasien,  
                                        'desc' => $row->nama,
                                        'desc2' => $row->tgl_lahir,
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


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('tkd_pasien') == '')
        {
            $data['inputerror'][] = 'tkd_pasien';
            $data['error_string'][] = 'Kode harus diisi';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('tnama') == '')
        {
            $data['inputerror'][] = 'tnama';
            $data['error_string'][] = 'Nama harus diisi';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('talamat') == '')
        {
            $data['inputerror'][] = 'talamat';
            $data['error_string'][] = 'Alamat harus diisi';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('tsex') == '')
        {
            $data['inputerror'][] = 'tsex';
            $data['error_string'][] = 'Jenis kelamin harus diisi';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('ttgl_lahir') == '')
        {
            $data['inputerror'][] = 'ttgl_lahir';
            $data['error_string'][] = 'Tgl Lahir harus diisi';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

 
}