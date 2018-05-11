<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_trans_user extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

// pencarian
function _get_datatables_pencarian($nama,$term=''){

    $this->db->select("gizi.id,gizi.nama,puskes.nama_puskes");
    $this->db->from('ms_user gizi');
    $this->db->join('m_puskes puskes','puskes.kd_puskes=gizi.kd_puskes');


        if ($nama !='') {
            $this->db->where('gizi.nama',$nama);         
        }
        
    if ($term !='') {

        $this->db->like('gizi.nama',$term);

    }

    $this->db->order_by("gizi.nama","desc");

}

function get_datatables_pencarian($nama){
  $term = $_REQUEST['search']['value'];   
  $this->_get_datatables_pencarian($nama,$term);
  if($_REQUEST['length'] != -1)
  $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
  $query = $this->db->get();
  return $query->result();
}

function count_filtered_pencarian($nama)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_pencarian($nama,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }


public function count_all_pencarian($nama)
    {

    $this->db->select("gizi.id,gizi.nama,puskes.nama_puskes");
    $this->db->from('ms_user gizi');
    $this->db->join('m_puskes puskes','puskes.kd_puskes=gizi.kd_puskes');


        if ($nama !='') {
            $this->db->where('gizi.nama',$nama);         
        }

        
        return $this->db->count_all_results();
    }

public function get_by_id_pencarian($id)
    {
        
        $this->db->select("gizi.*,puskes.nama_puskes");
        $this->db->from('ms_user gizi');
        $this->db->join('m_puskes puskes','gizi.kd_puskes=puskes.kd_puskes');
        $this->db->where('gizi.id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

// akhir pencarian

public function save($data)
    {
            $this->db->insert("ms_user", $data);
            return $this->db->insert_id();   
    }

public function update($where, $data)
    {
        $this->db->update("ms_user", $data, $where);
        return $this->db->affected_rows();
    }

public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("ms_user");
    }

 function lookup_puskes($keyword){  
        $this->db->select('kd_puskes,nama_puskes,alamat_puskes')->from('m_puskes');  
        $this->db->like('nama_puskes',$keyword,'match');  
        $query = $this->db->get();      
           
        return $query->result();  
    }

}