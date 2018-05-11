<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_posyandu extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

// pencarian
function _get_datatables_pencarian($nama,$alamat,$desa,$term=''){

    $this->db->select("sehat.id_posyandu,sehat.nama_posyandu,sehat.alamat_posyandu,desa.nama_desa");
    $this->db->from('tr_posyandu sehat');
    $this->db->join('m_desa desa','sehat.kd_desa=desa.kd_desa');

        if ($nama !='') {
			$this->db->where('sehat.nama_posyandu',$nama);        	
        }

		if ($alamat !='') {
			$this->db->where('sehat.alamat_posyandu',$alamat);        	
        }

        if ($desa !='') {
            $this->db->where('desa.nama_desa',$desa);            
        }

    if ($term !='') {

    	$this->db->like('sehat.nama_posyandu',$term);
    	$this->db->or_like('sehat.alamat_posyandu',$term);
        $this->db->or_like('desa.nama_desa',$term);

    }

    $this->db->order_by("desa.nama_desa","asc");

}

function get_datatables_pencarian($nama,$alamat,$desa){
  $term = $_REQUEST['search']['value'];   
  $this->_get_datatables_pencarian($nama,$alamat,$desa,$term);
  if($_REQUEST['length'] != -1)
  $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
  $query = $this->db->get();
  return $query->result();
}

function count_filtered_pencarian($nama,$alamat,$desa)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_pencarian($nama,$alamat,$desa,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }


public function count_all_pencarian($nama,$alamat,$desa)
    {

    $this->db->select("sehat.id_posyandu,sehat.nama_posyandu,sehat.alamat_posyandu,desa.nama_desa");
    $this->db->from('tr_posyandu sehat');
    $this->db->join('m_desa desa','sehat.kd_desa=desa.kd_desa');

        if ($nama !='') {
            $this->db->where('sehat.nama_posyandu',$nama);          
        }

        if ($alamat !='') {
            $this->db->where('sehat.alamat_posyandu',$alamat);          
        }

        if ($desa !='') {
            $this->db->where('desa.nama_desa',$desa);            
        }
        
        return $this->db->count_all_results();
    }


public function get_by_id_pencarian($id)
    {
        
        $this->db->select("inspeksi.id_posyandu,inspeksi.nama_posyandu,inspeksi.rt,inspeksi.rw,inspeksi.jml_kader,inspeksi.alamat_posyandu,inspeksi.jenis_posyandu,desa.kd_desa,desa.nama_desa,kel.nama_kel,kec.nama_kec");
    	$this->db->from('tr_posyandu inspeksi');
    	$this->db->join('m_desa desa','inspeksi.kd_desa=desa.kd_desa');
    	$this->db->join('m_kel kel','desa.kd_kel=kel.kd_kel');
    	$this->db->join('m_kec kec','kel.kd_kec=kec.kd_kec');
        $this->db->where('inspeksi.id_posyandu',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

// akhir pencarian

public function save($data)
    {
            $this->db->insert("tr_posyandu", $data);
            return $this->db->insert_id();   
    }

public function update($where, $data)
    {
        $this->db->update("tr_posyandu", $data, $where);
        return $this->db->affected_rows();
    }

public function delete($id)
    {
        $this->db->where('id_posyandu', $id);
        $this->db->delete("tr_posyandu");
    }
    
 function lookup_desa($keyword){  
        $this->db->select('desa.kd_desa,desa.nama_desa,kel.nama_kel,kec.nama_kec')->from('m_desa desa');  
        $this->db->join('m_kel kel','desa.kd_kel=kel.kd_kel');
        $this->db->join('m_kec kec','kel.kd_kec=kec.kd_kec');
        $this->db->like('desa.nama_desa',$keyword,'match');  
        $query = $this->db->get();      
           
        return $query->result();  
    }
  
function lookup_petugas($keyword){  
        $this->db->select('kd_petugas,nama_petugas')->from('m_petugas');  
        $this->db->like('nama_petugas',$keyword,'match');  
        $query = $this->db->get();      
           
        return $query->result();  
    }

}