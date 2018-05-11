<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class trans_user_ctrl extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_trans_user','mdl_trans_user');
    }

public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['kd_puskes'] = $session_data['kd_puskes'];
        $data['shak'] = $session_data['shak'];

        $this->load->view('fdt_trans_user',$data);    
        
    }

// handle pencarian

 	public function ajax_list_pencarian()
    {

        $nama = $_POST['nama'];

        $list = $this->mdl_trans_user->get_datatables_pencarian($nama);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nama;
            $row[] = $person->nama_puskes;
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-danger" title="Hapus" onclick="return delete_ins('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdl_trans_user->count_all_pencarian($nama),
                        "recordsFiltered" => $this->mdl_trans_user->count_filtered_pencarian($nama),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output); 
    }

    public function ajax_get_by_id_pencarian($id)
    {
        $data = $this->mdl_trans_user->get_by_id_pencarian($id);
        echo json_encode($data);
    }

 // akhir handle pencari

public function ajax_add()
    {

            $data = array(
                'nama' => $this->input->post('nama'),
                'pwd' => MD5($this->input->post('pwd')),
                'kd_puskes' => $this->input->post('kd_puskes'),
                'shak' => $this->input->post('shak'),
                
            );
        $insert = $this->mdl_trans_user->save($data);
        echo json_encode(array("status" => TRUE));
    }


public function ajax_delete($id)
    {
        $this->mdl_trans_user->delete($id);
        echo json_encode(array("status" => TRUE));
    }

public function lookup_puskes(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->mdl_trans_user->lookup_puskes($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->kd_puskes,  
                                        'value' => $row->nama_puskes,  
                                        'desc' => $row->alamat_puskes,
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