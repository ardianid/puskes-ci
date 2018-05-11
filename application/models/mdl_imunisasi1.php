<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_imunisasi1 extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

// handle pencarian

function _get_datatables_pencarian($nama_kel,$nama_desa,$tahun,$term=''){

    $this->db->select("kec.nama_kec,kel.nama_kel,desa.nama_desa,imun1.tahun,imun1.id_imun1");
    $this->db->from('tr_imunisasi1 imun1');
    $this->db->join('m_desa desa','imun1.kd_desa=desa.kd_desa');
    $this->db->join('m_kel kel','desa.kd_kel=kel.kd_kel');
    $this->db->join('m_kec kec','kel.kd_kec=kec.kd_kec');


        if ($nama_kel !='') {
			$this->db->where('kel.nama_kel',$nama_kel);        	
        }

		if ($nama_desa!='') {
			$this->db->where('desa.nama_desa',$nama_desa);        	
        }        
        
        if ($tahun!='') {
			$this->db->where('imun1.tahun',$tahun);        	
        }
        


    if ($term !='') {

    	$this->db->like('kec.nama_kec',$term);
    	$this->db->or_like('kel.nama_kel',$term);
    	$this->db->or_like('desa.nama_desa',$term);
    	$this->db->or_like('tahun,imun1',$term);

    }

    $this->db->order_by("imun1.id_imun1","desc");

}

function get_datatables_pencarian($nama_kel,$nama_desa,$tahun){
  $term = $_REQUEST['search']['value'];   
  $this->_get_datatables_pencarian($nama_kel,$nama_desa,$tahun,$term);
  if($_REQUEST['length'] != -1)
  $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
  $query = $this->db->get();
  return $query->result();
}

function count_filtered_pencarian($nama_kel,$nama_desa,$tahun)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_pencarian($nama_kel,$nama_desa,$tahun,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }


public function count_all_pencarian($nama_kel,$nama_desa,$tahun)
    {

    $this->db->select("kec.nama_kec,kel.nama_kel,desa.nama_desa,imun1.tahun,imun1.id_imun1");
    $this->db->from('tr_imunisasi1 imun1');
    $this->db->join('m_desa desa','imun1.kd_desa=desa.kd_desa');
    $this->db->join('m_kel kel','desa.kd_kel=kel.kd_kel');
    $this->db->join('m_kec kec','kel.kd_kec=kec.kd_kec');


        if ($nama_kel !='') {
			$this->db->where('kel.nama_kel',$nama_kel);        	
        }

		if ($nama_desa!='') {
			$this->db->where('desa.nama_desa',$nama_desa);        	
        }        
        
        if ($tahun!='') {
			$this->db->where('imun1.tahun',$tahun);        	
        }

        
        return $this->db->count_all_results();
    }

public function get_by_id_pencarian($id)
    {
        
        $this->db->select("kec.nama_kec,kel.nama_kel,desa.nama_desa,desa.kd_desa,imun1.tahun,imun1.id_imun1,imun1.jml_bayi,imun1.jml_balita,imun1.jml_anak,imun1.jml_caten,imun1.jml_wus_hml,imun1.jml_wus_tdk,imun1.jml_sd,imun1.jml_pos,imun1.jml_ups,imun1.jml_pembina,imun1.waktu_tmp,imun1.kd_puskes");
    	$this->db->from('tr_imunisasi1 imun1');
    	$this->db->join('m_desa desa','imun1.kd_desa=desa.kd_desa');
    	$this->db->join('m_kel kel','desa.kd_kel=kel.kd_kel');
    	$this->db->join('m_kec kec','kel.kd_kec=kec.kd_kec');	
        $this->db->where('imun1.id_imun1',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

// akhir handle pencarian

public function save_obat($data)
    {
            $this->db->insert("tr_imunisasi1", $data);
            return $this->db->insert_id();   
    }

public function update_obat($where, $data)
    {
        $this->db->update("tr_imunisasi1", $data, $where);
        return $this->db->affected_rows();
    }

public function delete_by_id($id)
    {
        $this->db->where('id_imun1', $id);
        $this->db->delete("tr_imunisasi1");
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