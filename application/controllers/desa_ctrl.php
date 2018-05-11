<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class desa_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_desa','mdl_desa');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('fdesa');
    }


    public function ajax_list()
    {
        $list = $this->mdl_desa->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nama_kec;
            $row[] = $person->nama_kel;
            $row[] = $person->nama_desa;
            
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->kd_desa."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger"  title="Hapus" onclick="return delete_person('."'".$person->kd_desa."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_desa->count_all(),
                        "recordsFiltered" => $this->mdl_desa->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->mdl_desa->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {

            $data = array(
                'kd_kel' => $this->input->post('tkd_kel'),
                'nama_desa' => $this->input->post('tnama_desa'),
            );
        $insert = $this->mdl_desa->save($data);
        echo json_encode(array("status" => TRUE));
        
    }

    public function ajax_update()
    {
        $data = array(
                'kd_kel' => $this->input->post('tkd_kel'),
                'nama_desa' => $this->input->post('tnama_desa'),
            );
        $this->mdl_desa->update(array('kd_desa' => $this->input->post('tkd_desa')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->mdl_desa->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

  	public function lookup_kelurahan(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_desa->lookup_kelurahan($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->kd_kel,  
                                        'value' => $row->nama_kel,  
                                        'desc' => $row->nama_kec,
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