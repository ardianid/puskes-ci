<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_daftar extends CI_Model {
	var $table_key = 'tr_daftar';
	var $table = "tr_daftar a inner join m_pasien b on a.kd_pasien=b.kd_pasien inner join m_petugas c on a.kd_petugas=c.kd_petugas";
	var $column = array("a.nobukti_d,a.id_daftar,a.kd_pasien,a.kd_petugas,a.tanggal_msk,a.nama_poli,b.nama,b.alamat,c.nama_petugas,a.umur_pasien,a.umur_hr,a.umur_bln,a.umur_thn");
	var $order = array('a.id_daftar' => 'asc');

    var $table_key_inap = 'tr_daftar';
    var $table_inap = 'tr_daftar a1 inner join m_petugas b1 on a1.kd_petugas=b1.kd_petugas inner join m_pasien c1 on a1.kd_pasien=c1.kd_pasien';
    var $column_inap =array('a1.nobukti_d,a1.id_daftar,a1.tanggal_msk,a1.nama_ruang,a1.nama_kelas,a1.nama_kamar,a1.no_tidur,b1.kd_petugas,b1.nama_petugas,c1.kd_pasien,c1.nama,c1.alamat,a1.umur_pasien,a1.umur_hr,a1.umur_bln,a1.umur_thn');
    var $order_inap = array('a1.id_daftar'=>'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($tanggal,$kd_puskes,$term)
    {
        
        $this->db->from($this->table);
        $this->db->where('jenis_daftar','1');
        $this->db->where('kd_puskes',$kd_puskes);
        $this->db->where('tanggal_msk',$tanggal);

        if ($term !='') {

            if(isset($_REQUEST['order'])) // here order processing
            {
                $this->db->order_by($column[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
            } 
                else if(isset($this->order))
            {
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            } 
        }

    }
 

    private function _get_datatables_query_inap($tanggal,$kd_puskes,$term)
    {
        
        $this->db->from($this->table_inap);
        $this->db->where('jenis_daftar','2');
        $this->db->where('kd_puskes',$kd_puskes);
        $this->db->where('tanggal_msk',$tanggal);

         if ($term !='') {

            if(isset($_REQUEST['order'])) // here order processing
            {
                $this->db->order_by($column_inap[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
            } 
                else if(isset($this->order))
            {
                $order_inap = $this->order_inap;
                $this->db->order_by(key($order_inap), $order_inap[key($order_inap)]);
            } 
        }
    }


    /*  get data untuk daftar rawat jalan */
    function get_datatables($tanggal,$kd_puskes)
    {
        $term = $_REQUEST['search']['value']; 

        $this->_get_datatables_query($tanggal,$kd_puskes,$term);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    /* get data untuk daftar rawat inap */
    function get_datatables_inap($tanggal,$kd_puskes)
    {

        $term = $_REQUEST['search']['value']; 

        $this->_get_datatables_query_inap($tanggal,$kd_puskes,$term);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    /* count filter rawat jalan */
       function count_filtered($tanggal,$kd_puskes)
    {
        $term = $_REQUEST['search']['value']; 

        $this->_get_datatables_query($tanggal,$kd_puskes,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    /* count filter rawat inap */
    function count_filtered_inap($tanggal,$kd_puskes)
    {
        $term = $_REQUEST['search']['value']; 

        $this->_get_datatables_query_inap($tanggal,$kd_puskes,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }


    /* count all rawat jalan */
    public function count_all($tanggal,$kd_puskes)
    {

        $this->db->from($this->table);

        $this->db->where('jenis_daftar','1');
        $this->db->where('kd_puskes',$kd_puskes);
        $this->db->where('tanggal_msk',$tanggal);

        return $this->db->count_all_results();
    }
 
    /* count all rawat inap */
    public function count_all_inap($tanggal,$kd_puskes)
    {

        $this->db->from($this->table_inap);

        $this->db->where('jenis_daftar','2');
        $this->db->where('kd_puskes',$kd_puskes);
        $this->db->where('tanggal_msk',$tanggal);

        return $this->db->count_all_results();
    }

    /* get by id rawat jalan */
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('a.id_daftar',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
 
    /* get by id rawat inap */
    public function get_by_id_inap($id)
    {
        $this->db->from($this->table_inap);
        $this->db->where('a1.id_daftar',$id);
        $query = $this->db->get();
 
        return $query->row();
    }


    /* save rawat jalan */
    public function save($data)
    {
            $this->db->insert($this->table_key, $data);
            return $this->db->insert_id();   
    }

    /* save rawat jalan */
    public function save_inap($data)
    {
            $this->db->insert($this->table_key_inap, $data);
            return $this->db->insert_id();
    }

 
    /* update rawat jalan */
    public function update($where, $data)
    {
        $this->db->update($this->table_key, $data, $where);
        return $this->db->affected_rows();
    }

    /* update rawat inap */
    public function update_inap($where, $data)
    {
        $this->db->update($this->table_key_inap, $data, $where);
        return $this->db->affected_rows();
    }

    
    /* delete rawat jalan */ 
    public function delete_by_id($id)
    {
        $this->db->where('id_daftar', $id);
        $this->db->delete($this->table_key);
    }

    /* delete rawat inap */ 
    public function delete_by_id_inap($id)
    {
        $this->db->where('id_daftar', $id);
        $this->db->delete($this->table_key_inap);
    }


    function  get_poli() {  //funtion menampilkan semua provinsi

        $query ="select nama_poli from m_poli";
        $q=$this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[]=$row;
            }

            return $data;
        }
    }

    
    function  get_ruangan() {  //funtion menampilkan semua provinsi

        $query ="select nama_ruang from m_ruangan";
        $q=$this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[]=$row;
            }

            return $data;
        }
    }

    function  get_kamar() {  //funtion menampilkan semua provinsi

        $query ="select nama_kamar from m_kamar";
        $q=$this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[]=$row;
            }

            return $data;
        }
    }


    function  lookup_petugas($keyword) {  //funtion menampilkan semua provinsi

        $this->db->select('kd_petugas,nama_petugas')->from('m_petugas');  
        $this->db->like('nama_petugas',$keyword,'match');  
        $query = $this->db->get();      
           
        return $query->result();  
    }

// cek no bukti akhir
    public function get_by_nobukti_akhir($param,$kd_puskes)
     {

        $this->db->select_max('nobukti_d');
        $this->db->from('tr_daftar');
        $this->db->where('kd_puskes',$kd_puskes);
        $this->db->like('nobukti_d',$param,'after');
        $query = $this->db->get();
 
        return $query->row();
     }
// akhir cek no bukti akhir

// search daftar by nobukti
public function get_daftar_bynobukti($id)
    {   
        $this->db->select('jenis_tindakan,jenis_obat,totbayar');
        $this->db->from('tr_daftar');
        $this->db->where('id_daftar',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
// akhir search cari by nobukti

}