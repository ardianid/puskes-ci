<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_rumah_sehat extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

// pencarian
function _get_datatables_pencarian($nama,$desa,$tgl,$term=''){

    $this->db->select("sehat.id_inspeksi_rsehat,sehat.tgl_ins_rsehat,sehat.nama_kk,desa.nama_desa");
    $this->db->from('tr_inspeksi_rsehat sehat');
    $this->db->join('m_desa desa','sehat.kd_desa=desa.kd_desa');

        if ($nama !='') {
			$this->db->where('sehat.nama_kk',$nama);        	
        }

		if ($desa!='') {
			$this->db->where('desa.nama_desa',$desa);        	
        }        
        
        if ($tgl!='') {
			$this->db->where('sehat.tgl_ins_rsehat',$tgl);        	
        }

    if ($term !='') {

    	$this->db->like('sehat.tgl_ins_rsehat',$term);
    	$this->db->or_like('sehat.nama_kk',$term);
    	$this->db->or_like('desa.nama_desa',$term);

    }

    $this->db->order_by("sehat.tgl_ins_rsehat","desc");

}

function get_datatables_pencarian($nama,$desa,$tgl){
  $term = $_REQUEST['search']['value'];   
  $this->_get_datatables_pencarian($nama,$desa,$tgl,$term);
  if($_REQUEST['length'] != -1)
  $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
  $query = $this->db->get();
  return $query->result();
}

function count_filtered_pencarian($nama,$desa,$tgl)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_pencarian($nama,$desa,$tgl,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }


public function count_all_pencarian($nama,$desa,$tgl)
    {

    $this->db->select("sehat.id_inspeksi_rsehat,sehat.tgl_ins_rsehat,sehat.nama_kk,desa.nama_desa");
    $this->db->from('tr_inspeksi_rsehat sehat');
    $this->db->join('m_desa desa','sehat.kd_desa=desa.kd_desa');

        if ($nama !='') {
            $this->db->where('sehat.nama_kk',$nama);            
        }

        if ($desa!='') {
            $this->db->where('desa.nama_desa',$desa);           
        }        
        
        if ($tgl!='') {
            $this->db->where('sehat.tgl_ins_rsehat',$tgl);          
        }
        
        return $this->db->count_all_results();
    }


public function get_by_id_pencarian($id)
    {
        
        $this->db->select("inspeksi.id_inspeksi_rsehat,inspeksi.tgl_ins_rsehat,inspeksi.nama_kk,inspeksi.rt,inspeksi.rw,inspeksi.jml_jiwa,inspeksi.tot_nilai,petugas.kd_petugas,petugas.nama_petugas,desa.kd_desa,desa.nama_desa,kel.nama_kel,kec.nama_kec");
    	$this->db->from('tr_inspeksi_rsehat inspeksi');
    	$this->db->join('m_petugas petugas','inspeksi.kd_petugas=petugas.kd_petugas');
    	$this->db->join('m_desa desa','inspeksi.kd_desa=desa.kd_desa');
    	$this->db->join('m_kel kel','desa.kd_kel=kel.kd_kel');
    	$this->db->join('m_kec kec','kel.kd_kec=kec.kd_kec');
        $this->db->where('inspeksi.id_inspeksi_rsehat',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

// akhir pencarian

public function save($data)
    {
            $this->db->insert("tr_inspeksi_rsehat", $data);
            return $this->db->insert_id();   
    }

public function update($where, $data)
    {
        $this->db->update("tr_inspeksi_rsehat", $data, $where);
        return $this->db->affected_rows();
    }

public function delete($id)
    {
        $this->db->where('id_inspeksi_rsehat', $id);
        $this->db->delete("tr_inspeksi_rsehat");
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