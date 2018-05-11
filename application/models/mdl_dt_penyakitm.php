<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_dt_penyakitm extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

// pencarian
function _get_datatables_pencarian($thn,$bln,$desa,$term=''){

    $this->db->select("gizi.id_penyakitm,gizi.thn_penyakit,gizi.bln_penyakit,desa.nama_desa,kel.nama_kel");
    $this->db->from('dt_penyakitm gizi');
    $this->db->join('m_desa desa','desa.kd_desa=gizi.kd_desa');
    $this->db->join('m_kel kel','desa.kd_kel=kel.kd_kel');

        if ($thn !='') {
			$this->db->where('gizi.thn_penyakit',$thn);        	
        }

		if ($bln!='') {
			$this->db->where('gizi.bln_penyakit',$bln);        	
        }        
        
        if ($desa!='') {
			$this->db->where('desa.nama_desa',$desa);        	
        }

    if ($term !='') {

    	$this->db->like('gizi.thn_penyakit',$term);
    	$this->db->or_like('gizi.bln_penyakit',$term);
    	$this->db->or_like('desa.nama_desa',$term);

    }

    $this->db->order_by("gizi.thn_penyakit,gizi.bln_penyakit","desc");

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

    $this->db->select("gizi.id_penyakitm,gizi.thn_penyakit,gizi.bln_penyakit,desa.nama_desa,kel.nama_kel");
    $this->db->from('dt_penyakitm gizi');
    $this->db->join('m_desa desa','desa.kd_desa=gizi.kd_desa');
    $this->db->join('m_kel kel','desa.kd_kel=kel.kd_kel');

        if ($thn !='') {
            $this->db->where('gizi.thn_penyakit',$thn);         
        }

        if ($bln!='') {
            $this->db->where('gizi.bln_penyakit',$bln);         
        }        
        
        if ($desa!='') {
            $this->db->where('desa.nama_desa',$desa);           
        }
        
        return $this->db->count_all_results();
    }

public function get_by_id_pencarian($id)
    {
        
        $this->db->select("gizi.*,desa.kd_desa,desa.nama_desa,kel.nama_kel,kec.nama_kec");
    	$this->db->from('dt_penyakitm gizi');
    	$this->db->join('m_desa desa','gizi.kd_desa=desa.kd_desa');
    	$this->db->join('m_kel kel','desa.kd_kel=kel.kd_kel');
    	$this->db->join('m_kec kec','kel.kd_kec=kec.kd_kec');
        $this->db->where('gizi.id_penyakitm',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

// akhir pencarian

public function save($data)
    {
            $this->db->insert("dt_penyakitm", $data);
            return $this->db->insert_id();   
    }

public function update($where, $data)
    {
        $this->db->update("dt_penyakitm", $data, $where);
        return $this->db->affected_rows();
    }

public function delete($id)
    {
        $this->db->where('id_penyakitm', $id);
        $this->db->delete("dt_penyakitm");
    }
    
 function lookup_desa($keyword){  
        $this->db->select('desa.kd_desa,desa.nama_desa,kel.nama_kel,kec.nama_kec')->from('m_desa desa');  
        $this->db->join('m_kel kel','desa.kd_kel=kel.kd_kel');
        $this->db->join('m_kec kec','kel.kd_kec=kec.kd_kec');
        $this->db->like('desa.nama_desa',$keyword,'match');  
        $query = $this->db->get();      
           
        return $query->result();  
    }

}