<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_dt_lab extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

// pencarian
function _get_datatables_pencarian($thn,$bln,$desa,$term=''){

    $this->db->select("gizi.id_lab,gizi.thn_lab,gizi.bln_lab,puskes.nama_puskes");
    $this->db->from('dt_lab gizi');
    $this->db->join('m_puskes puskes','puskes.kd_puskes=gizi.kd_puskes');

        if ($thn !='') {
			$this->db->where('gizi.thn_lab',$thn);        	
        }

		if ($bln!='') {
			$this->db->where('gizi.bln_lab',$bln);        	
        }        
        

    if ($term !='') {

    	$this->db->like('gizi.thn_lab',$term);
    	$this->db->or_like('gizi.bln_lab',$term);

    }

    $this->db->order_by("gizi.thn_lab,gizi.bln_lab","desc");

}

function get_datatables_pencarian($thn,$bln,$desa){
  $term = $_REQUEST['search']['value'];   
  $this->_get_datatables_pencarian($thn,$bln,$desa,$term);
  if($_REQUEST['length'] != -1)
  $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
  $query = $this->db->get();
  return $query->result();
}

function count_filtered_pencarian($thn,$bln,$desa)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_pencarian($thn,$bln,$desa,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }


public function count_all_pencarian($thn,$bln,$desa)
    {

    $this->db->select("gizi.id_lab,gizi.thn_lab,gizi.bln_lab,puskes.nama_puskes");
    $this->db->from('dt_lab gizi');
    $this->db->join('m_puskes puskes','puskes.kd_puskes=gizi.kd_puskes');

        if ($thn !='') {
            $this->db->where('gizi.thn_lab',$thn);          
        }

        if ($bln!='') {
            $this->db->where('gizi.bln_lab',$bln);          
        }        
        
        return $this->db->count_all_results();
    }

public function get_by_id_pencarian($id)
    {
        
        $this->db->select("gizi.*");
    	$this->db->from('dt_lab gizi');
        $this->db->where('gizi.id_lab',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

// akhir pencarian

public function save($data)
    {
            $this->db->insert("dt_lab", $data);
            return $this->db->insert_id();   
    }

public function update($where, $data)
    {
        $this->db->update("dt_lab", $data, $where);
        return $this->db->affected_rows();
    }

public function delete($id)
    {
        $this->db->where('id_lab', $id);
        $this->db->delete("dt_lab");
    }
    

}