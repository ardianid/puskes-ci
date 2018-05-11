<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_inspeksi_htl extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

// pencarian
function _get_datatables_pencarian($nama_rm,$alamat_rm,$tgl,$term=''){

    $this->db->select("id_inspeksi_htl,tgl_ins_htl,nama_htl,alamat_htl");
    $this->db->from('tr_inspeksi_htl');

        if ($nama_rm !='') {
			$this->db->where('nama_htl',$nama_rm);        	
        }

		if ($alamat_rm!='') {
			$this->db->where('alamat_htl',$alamat_rm);        	
        }        
        
        if ($tgl!='') {
			$this->db->where('tgl_ins_htl',$tgl);        	
        }

    if ($term !='') {

    	$this->db->like('tgl_ins_htl',$term);
    	$this->db->or_like('nama_htl',$term);
    	$this->db->or_like('alamat_htl',$term);

    }

    $this->db->order_by("tgl_ins_htl","desc");

}

function get_datatables_pencarian($nama_rm,$alamat_rm,$tgl){
  $term = $_REQUEST['search']['value'];   
  $this->_get_datatables_pencarian($nama_rm,$alamat_rm,$tgl,$term);
  if($_REQUEST['length'] != -1)
  $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
  $query = $this->db->get();
  return $query->result();
}

function count_filtered_pencarian($nama_rm,$alamat_rm,$tgl)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_pencarian($nama_rm,$alamat_rm,$tgl,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }


public function count_all_pencarian($nama_rm,$alamat_rm,$tgl)
    {

    $this->db->select("id_inspeksi_htl,tgl_ins_htl,nama_htl,alamat_htl");
    $this->db->from('tr_inspeksi_htl');

        if ($nama_rm !='') {
            $this->db->where('nama_htl',$nama_rm);          
        }

        if ($alamat_rm!='') {
            $this->db->where('alamat_htl',$alamat_rm);          
        }        
        
        if ($tgl!='') {
            $this->db->where('tgl_ins_htl',$tgl);           
        }
        
        return $this->db->count_all_results();
    }

public function get_by_id_pencarian($id)
    {
        
        $this->db->select("inspeksi.id_inspeksi_htl,inspeksi.tgl_ins_htl,inspeksi.nama_htl,inspeksi.alamat_htl,inspeksi.penanggung_htl,inspeksi.notelp_htl,inspeksi.noijin_htl,inspeksi.jml_kary,inspeksi.tot_nilai,petugas.kd_petugas,petugas.nama_petugas,desa.kd_desa,desa.nama_desa,kel.nama_kel,kec.nama_kec");
    	$this->db->from('tr_inspeksi_htl inspeksi');
    	$this->db->join('m_petugas petugas','inspeksi.kd_petugas=petugas.kd_petugas');
    	$this->db->join('m_desa desa','inspeksi.kd_desa=desa.kd_desa');
    	$this->db->join('m_kel kel','desa.kd_kel=kel.kd_kel');
    	$this->db->join('m_kec kec','kel.kd_kec=kec.kd_kec');
        $this->db->where('inspeksi.id_inspeksi_htl',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

// akhir pencarian

public function save($data)
    {
            $this->db->insert("tr_inspeksi_htl", $data);
            return $this->db->insert_id();   
    }

public function update($where, $data)
    {
        $this->db->update("tr_inspeksi_htl", $data, $where);
        return $this->db->affected_rows();
    }

public function delete($id)
    {
        $this->db->where('id_inspeksi_htl', $id);
        $this->db->delete("tr_inspeksi_htl");
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