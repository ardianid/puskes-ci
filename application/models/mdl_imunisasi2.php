<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_imunisasi2 extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

// handle pencarian

function _get_datatables_pencarian($nama_lokasi,$alamat_lokasi,$tgl,$term=''){

    $this->db->select("id_imun2,tgl_imun,nama_lokasi,alamat_lokasi");
    $this->db->from('tr_imunisasi2');

        if ($nama_lokasi !='') {
			$this->db->where('nama_lokasi',$nama_lokasi);        	
        }

		if ($alamat_lokasi!='') {
			$this->db->where('alamat_lokasi',$alamat_lokasi);        	
        }        
        
        if ($tgl!='') {
			$this->db->where('tgl_imun',$tgl);        	
        }
        


    if ($term !='') {

    	$this->db->like('tgl_imun',$term);
    	$this->db->or_like('nama_lokasi',$term);
    	$this->db->or_like('alamat_lokasi',$term);

    }

    $this->db->order_by("tgl_imun","desc");

}

function get_datatables_pencarian($nama_lokasi,$alamat_lokasi,$tgl){
  $term = $_REQUEST['search']['value'];   
  $this->_get_datatables_pencarian($nama_lokasi,$alamat_lokasi,$tgl,$term);
  if($_REQUEST['length'] != -1)
  $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
  $query = $this->db->get();
  return $query->result();
}

function count_filtered_pencarian($nama_lokasi,$alamat_lokasi,$tgl)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_pencarian($nama_lokasi,$alamat_lokasi,$tgl,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }


public function count_all_pencarian($nama_lokasi,$alamat_lokasi,$tgl)
    {

    $this->db->select("id_imun2,tgl_imun,nama_lokasi,alamat_lokasi");
    $this->db->from('tr_imunisasi2');

        if ($nama_lokasi !='') {
            $this->db->where('nama_lokasi',$nama_lokasi);           
        }

        if ($alamat_lokasi!='') {
            $this->db->where('alamat_lokasi',$alamat_lokasi);           
        }        
        
        if ($tgl!='') {
            $this->db->where('tgl_imun',$tgl);          
        }

        
        return $this->db->count_all_results();
    }

public function get_by_id_pencarian($id)
    {
        
        $this->db->select("imun2.id_imun2,imun2.tgl_imun,imun2.nama_lokasi,imun2.alamat_lokasi,imun2.jml_petugas,imun2.jml_pembina,petugas.kd_petugas,petugas.nama_petugas");
    	$this->db->from('tr_imunisasi2 imun2');
    	$this->db->join('m_petugas petugas','imun2.kd_petugas=petugas.kd_petugas');
        $this->db->where('imun2.id_imun2',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

// akhir handle pencarian


// handle pencarian2

function _get_datatables_pencarian_detail($id_imun2){

    $this->db->select("imun3.id_imun3,imun3.nama_pasien,imun3.jns_kelamin,imun3.alamat,desa.nama_desa");
    $this->db->from('tr_imunisasi3 imun3');
    $this->db->join('m_desa desa','imun3.kd_desa=desa.kd_desa');
    $this->db->where('imun3.id_imun2',$id_imun2);

    /*if ($term !='') {

        $this->db->like('imun3.nama_pasien',$term);
        $this->db->or_like('imun3.jns_kelamin',$term);
        $this->db->or_like('imun3.alamat',$term);
        $this->db->or_like('desa.nama_desa',$term);

    }*/

    $this->db->order_by("imun3.id_imun3","asc");

}

function get_datatables_detail($id_imun2ku)
    {   

      //  $term = $_REQUEST['search']['value']; 

        $this->_get_datatables_pencarian_detail($id_imun2ku);
        //if($_POST['length'] != -1)
        //$this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

function count_filtered_pencarian_detail($id_imun2ku)
    {
       // $term = $_REQUEST['search']['value'];

        $this->_get_datatables_pencarian_detail($id_imun2ku);
        $query = $this->db->get();
        return $query->num_rows();
    }


public function count_all_pencarian_detail($id_imun2ku)
    {

        $this->db->select("imun3.id_imun3,imun3.nama_pasien,imun3.jns_kelamin,imun3.alamat,desa.nama_desa");
        $this->db->from('tr_imunisasi3 imun3');
        $this->db->join('m_desa desa','imun3.kd_desa=desa.kd_desa');
        $this->db->where('imun3.id_imun2',$id_imun2ku);

        return $this->db->count_all_results();
    }


public function get_by_id_pencarian2($id)
    {
        
        $this->db->select("imun3.id_imun3,imun3.nama_pasien,imun3.jns_kelamin,imun3.tgl_lahir,imun3.alamat,imun3.jenis_pasien,imun3.jns_imunisasi1,imun3.jns_imunisasi2,imun3.jns_imunisasi3,imun3.pem_fisik,desa.kd_desa,desa.nama_desa,kel.nama_kel,kec.nama_kec");
        $this->db->from('tr_imunisasi3 imun3');
        $this->db->join('m_desa desa','imun3.kd_desa=desa.kd_desa');
        $this->db->join('m_kel kel','kel.kd_kel=desa.kd_kel');
        $this->db->join('m_kec kec','kel.kd_kec=kec.kd_kec');
        $this->db->where('imun3.id_imun3',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

public function cek_id_imun2($tgl_imun,$nama_lokasi,$alamat_lokasi,$kd_puskes,$kd_petugas,$jml_petugas,$jml_pembina){

    $this->db->select("id_imun2");
    $this->db->from('tr_imunisasi2');
    $this->db->where('tgl_imun',$tgl_imun);
    $this->db->where('nama_lokasi',$nama_lokasi);
    $this->db->where('alamat_lokasi',$alamat_lokasi);
    $this->db->where('kd_puskes',$kd_puskes);
    $this->db->where('kd_petugas',$kd_petugas);
    $this->db->where('jml_petugas',$jml_petugas);
    $this->db->where('jml_pembina',$jml_pembina);
    $query = $this->db->get();
    
    return $query->row();

}

// akhir handle pencarian2


public function save_imun2($data)
    {
            $this->db->insert("tr_imunisasi2", $data);
            return $this->db->insert_id();   
    }

public function save_imun3($data)
    {
            $this->db->insert("tr_imunisasi3", $data);
            return $this->db->insert_id();   
    }    

public function update_imun2($where, $data)
    {
        $this->db->update("tr_imunisasi2", $data, $where);
        return $this->db->affected_rows();
    }

public function update_imun3($where, $data)
    {
        $this->db->update("tr_imunisasi3", $data, $where);
        return $this->db->affected_rows();
    }

public function delete_imun2_by_id($id)
    {
        $this->db->where('id_imun2', $id);
        $this->db->delete("tr_imunisasi2");

        $this->db->where('id_imun2', $id);
        $this->db->delete("tr_imunisasi3");

    }

public function delete_imun3_by_id($id)
    {

        $this->db->where('id_imun3', $id);
        $this->db->delete("tr_imunisasi3");

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