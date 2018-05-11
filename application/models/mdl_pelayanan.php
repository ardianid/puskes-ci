<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_pelayanan extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }



function  get_petugas() {  //funtion menampilkan semua provinsi

        $query ="select kd_petugas,nama_petugas from m_petugas where posisi='DOKTER'";
        $q=$this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[]=$row;
            }

            return $data;
        }
    }


public function update_daftar($where, $data)
    {
        $this->db->update("tr_daftar", $data, $where);
        return $this->db->affected_rows();
    }

// handle pencarian

function _get_datatables_pencarian($nama_poli,$tanggal,$status,$jenis_pelayanan,$scari,$kd_puskes,$term=''){

    $this->db->select('daftar.nobukti_d,daftar.id_daftar,pasien.kd_pasien,pasien.nama,daftar.umur_pasien,pasien.alamat,daftar.nama_poli,petugas.nama_petugas');
    $this->db->from('tr_daftar as daftar');
    $this->db->join('m_pasien as pasien','daftar.kd_pasien=pasien.kd_pasien');
    $this->db->join('m_petugas as petugas','petugas.kd_petugas=daftar.kd_petugas');
    
    $this->db->where('daftar.kd_puskes',$kd_puskes);

    if ($scari !="all") {
        
        $this->db->where('daftar.tanggal_msk',$tanggal);

        if ($jenis_pelayanan =='jalan'){

            $this->db->where('daftar.jenis_daftar','1');

            if ($nama_poli != "all" ) {
                $this->db->where('daftar.nama_poli',$nama_poli);
            }
            
            if ($status == 'belum' ) {
                $this->db->where('daftar.jenis_tindakan',0);   
            }elseif ($status=='sudah') {
                $this->db->where('daftar.jenis_tindakan>',0);   
            } 

            
        }else{

            $this->db->where('daftar.jenis_daftar','2');

            if ($status == 'belum' ) {
                $this->db->where('daftar.jenis_tindakan',0);   
            }elseif ($status=='sudah') {
                $this->db->where('daftar.jenis_tindakan>',0);
            }

        }
    }else {
        $this->db->where('daftar.id_daftar',0);   
    }
    

    if ($term !='') {

    $column = array('daftar.nobukti_d,pasien.nama,daftar.umur_pasien,pasien.alamat,daftar.nama_poli,petugas.nama_petugas');

    $this->db->like('pasien.nama',$term);
    $this->db->or_like('daftar.umur_pasien',$term);
    $this->db->or_like('pasien.alamat',$term);
    $this->db->or_like('daftar.nama_poli',$term);
    $this->db->or_like('petugas.nama_petugas',$term);
    
    }

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


function get_datatables_pencarian($nama_poli,$tanggal,$status,$jenis_pelayanan,$scari,$kd_puskes){
  $term = $_REQUEST['search']['value'];   
  $this->_get_datatables_pencarian($nama_poli,$tanggal,$status,$jenis_pelayanan,$scari,$kd_puskes,$term);
  if($_REQUEST['length'] != -1)
  $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
  $query = $this->db->get();
  return $query->result();
}


function count_filtered_pencarian($nama_poli,$tanggal,$status,$jenis_pelayanan,$scari,$kd_puskes)
    {

        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_pencarian($nama_poli,$tanggal,$status,$jenis_pelayanan,$scari,$kd_puskes,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_pencarian($nama_poli,$tanggal,$status,$jenis_pelayanan,$scari,$kd_puskes)
    {

    $this->db->select('daftar.nobukti_d,pasien.kd_pasien,pasien.nama,daftar.umur_pasien,pasien.alamat,daftar.nama_poli,petugas.nama_petugas');
    $this->db->from('tr_daftar as daftar');
    $this->db->join('m_pasien as pasien','daftar.kd_pasien=pasien.kd_pasien');
    $this->db->join('m_petugas as petugas','petugas.kd_petugas=daftar.kd_petugas');
    
    $this->db->where('daftar.kd_puskes',$kd_puskes);    

    if ($scari !="all") {
        

        $this->db->where('daftar.tanggal_msk',$tanggal);

        if ($jenis_pelayanan =='jalan'){

            $this->db->where('daftar.jenis_daftar','1');

            if ($nama_poli != "all" ) {
                $this->db->where('daftar.nama_poli',$nama_poli);
            }
            
            if ($status == 'belum' ) {
                $this->db->where('daftar.jenis_tindakan',0);   
            }elseif ($status=='sudah') {
                $this->db->where('daftar.jenis_tindakan>',0);   
            } 

            
        }else{

            $this->db->where('daftar.jenis_daftar','2');

            if ($status == 'belum' ) {
                $this->db->where('daftar.jenis_tindakan',0);   
            }elseif ($status=='sudah') {
                $this->db->where('daftar.jenis_tindakan>',0);
            }

        }
    }else {
        $this->db->where('daftar.id_daftar',0);   
    }

        
        return $this->db->count_all_results();
    }


    public function get_by_id_pencarian($id)
    {
        $this->db->select('daftar.nobukti_d,daftar.id_daftar,daftar.tanggal_msk,daftar.nama_poli,pasien.jenis_jamkes,pasien.cara_bayar,pasien.nama,pasien.alamat,pasien.kd_pasien');
        $this->db->from('tr_daftar as daftar');
        $this->db->join('m_pasien as pasien','daftar.kd_pasien=pasien.kd_pasien');
        $this->db->where('daftar.id_daftar',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

// akhir handle pencarian

// handle diagnosa pasien

   	var $table_diagnosa='tr_diagnosa';
//	var $column_diagnosa = array('id_diagnosa,nama_diagnosa,jenis_diagnosa');
	


    private function _get_datatables_diagnosa($id_daftar,$term)
    {
      
        $this->db->select('t.id_diagnosa,p.kd_penyakit,p.nama_penyakit,t.jenis_diagnosa');
        $this->db->from('tr_diagnosa t');
        $this->db->join('m_penyakit p','t.kd_penyakit_tr=p.kd_penyakit');
        $this->db->where('t.id_daftar',$id_daftar);

        if ($term !=''){
            $this->db->like('p.nama_penyakit',$term);
            $this->db->or_like('t.jenis_diagnosa',$term);
        }

        $order_diagnosa = array('t.id_diagnosa' => 'asc');

        if(isset($_REQUEST['order'])) // here order processing
            {
                $this->db->order_by($column_diagnosa[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
            } 
                else if(isset($this->order))
            {
                $order = $this->order_diagnosa;
                $this->db->order_by(key($order_diagnosa), $order_diagnosa[key($order_diagnosa)]);
            }

    }

    function get_datatables_diagnosa($id_daftar)
    {


        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_diagnosa($id_daftar,$term);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_diagnosa($id_daftar)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_diagnosa($id_daftar,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_diagnosa($id_daftar)
    {
        $this->db->from($this->table_diagnosa);
        $this->db->where('id_daftar',$id_daftar);
        return $this->db->count_all_results();
    }

    public function save_diagnosa($data)
    {
            $this->db->insert($this->table_diagnosa, $data);
            return $this->db->insert_id();   
    }

    public function delete_by_id_diagnosa($id)
    {
        $this->db->where('id_diagnosa', $id);
        $this->db->delete($this->table_diagnosa);
    }

    function  lookup_diagnosa($keyword) {  //funtion menampilkan semua provinsi

        
        $this->db->select('kd_penyakit,nama_penyakit')->from('m_penyakit');  
        $this->db->like('nama_penyakit',$keyword,'match');  
        $query = $this->db->get();      
           
        return $query->result();  
    }

// akhir handle diagnosa pasien

// handle tindakan pasien

    var $table_tindakan='tr_tindakan';
    var $column_tindakan = array('id_tindakan,nama_tindakan,harga,jml,total,keterangan');
    var $order_tindakan = array('id_tindakan' => 'asc');

    private function _get_datatables_tindakan($id_daftar,$term)
    {
        
        $this->db->from($this->table_tindakan);
        $this->db->where('id_daftar',$id_daftar);

        if ($term !=''){
            $this->db->like('nama_tindakan',$term);
            $this->db->or_like('harga',$term);
            $this->db->or_like('jml',$term);
            $this->db->or_like('keterangan',$term);
            $this->db->or_like('total',$term);
        }

        if(isset($_REQUEST['order'])) // here order processing
            {
                $this->db->order_by($column_tindakan[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
            } 
                else if(isset($this->order))
            {
                $order = $this->order_tindakan;
                $this->db->order_by(key($order_tindakan), $order_tindakan[key($order_tindakan)]);
            }

    }

    function get_datatables_tindakan($id_daftar)
    {


        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_tindakan($id_daftar,$term);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_tindakan($id_daftar)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_tindakan($id_daftar,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_tindakan($id_daftar)
    {
        $this->db->from($this->table_tindakan);
        $this->db->where('id_daftar',$id_daftar);
        return $this->db->count_all_results();
    }

    public function save_tindakan($data,$total,$id_daftar)
    {

        $this->update_total_daftar($id_daftar,'add','',$total);

        $this->db->insert($this->table_tindakan, $data);
        return $this->db->insert_id();   
    }

    public function delete_by_id_tindakan($id)
    {

        $this->update_total_daftar($id,'id_tindakan','tr_tindakan','0');

        $this->db->where('id_tindakan', $id);
        $this->db->delete($this->table_tindakan);
    }

    function  lookup_tindakan($keyword) {  //funtion menampilkan semua provinsi

        $this->db->distinct();
        $this->db->select('nama_tindakan')->from($this->table_tindakan);  
        $this->db->like('nama_tindakan',$keyword,'match');  
        $query = $this->db->get();      
           
        return $query->result();  
    }    

// akhir handle tindakan pasien

// handle obat pasien

    var $table_obat ='tr_obat';

    private function _get_datatables_obat($id_daftar,$term)
    {
        
        $this->db->from("tr_obat as tr");
        $this->db->join("m_obatalkes as ms","tr.kd_obat=ms.kode");
        $this->db->where('tr.id_daftar',$id_daftar);

        if ($term !=''){
            $this->db->like('ms.nama',$term);
            $this->db->or_like('tr.kd_obat',$term);
            $this->db->or_like('tr.harga',$term);
            $this->db->or_like('tr.qty',$term);
            $this->db->or_like('tr.satuan',$term);
            $this->db->or_like('tr.dosis',$term);
        }

        $column_obat = array('tr.id_obat_tr,tr.kd_obat,ms.nama,tr.qty,tr.harga,tr.total,tr.satuan,tr.dosis');
        $order_obat = array('tr.id_obat' => 'asc');

        if(isset($_REQUEST['order'])) // here order processing
            {
                $this->db->order_by($column_obat[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
            } 
                else if(isset($this->order))
            {
                $order = $this->order_obat;
                $this->db->order_by(key($order_obat), $order_obat[key($order_obat)]);
            }

    }

    function get_datatables_obat($id_daftar)
    {


        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_obat($id_daftar,$term);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_obat($id_daftar)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_obat($id_daftar,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_obat($id_daftar)
    {
        $this->db->from($this->table_obat);
        $this->db->where('id_obat_tr',$id_daftar);
        return $this->db->count_all_results();
    }

    public function save_obat($data,$id_daftar,$total)
    {

      //  $this->update_total_daftar($id_daftar,'add','',$total);

            $this->db->insert($this->table_obat, $data);
            return $this->db->insert_id();   
    }

    public function delete_by_id_obat($id)
    {           

        // $this->update_total_daftar($id,'id_obat_tr','tr_obat',0);

        $this->db->where('id_obat_tr', $id);
        $this->db->delete($this->table_obat);
    }

    function  lookup_obat($keyword) {  //funtion menampilkan semua provinsi

        $this->db->select('kode,nama,satuan3,hargajual')->from("m_obatalkes");  
        $this->db->where('jenis','OBAT');
        $this->db->like('nama',$keyword,'match');      
        
        $query = $this->db->get();      
           
        return $query->result();  
    }    

    function  lookup_obat_kode($keyword) {  //funtion menampilkan semua provinsi

        $this->db->select('kode,nama,satuan3,hargajual')->from("m_obatalkes");  
        $this->db->where('jenis','OBAT');
        $this->db->like('kode',$keyword,'after');      
        
        $query = $this->db->get();      
           
        return $query->result();  
    }    

// akhir handle obat pasien

// handle lab pasien

    var $table_lab='tr_lab';
    var $column_lab = array('id_lab,nama_lab,qty,harga,total');
    var $order_lab = array('id_lab' => 'asc');

    private function _get_datatables_lab($id_daftar,$term)
    {
        
        $this->db->from($this->table_lab);
        $this->db->where('id_daftar',$id_daftar);

        if ($term !=''){
            $this->db->like('nama_lab',$term);
            $this->db->or_like('qty',$term);
            $this->db->or_like('harga',$term);
            $this->db->or_like('total',$term);
        }

        if(isset($_REQUEST['order'])) // here order processing
            {
                $this->db->order_by($column_lab[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
            } 
                else if(isset($this->order))
            {
                $order = $this->order_lab;
                $this->db->order_by(key($order_lab), $order_lab[key($order_lab)]);
            }

    }

    function get_datatables_lab($id_daftar)
    {


        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_lab($id_daftar,$term);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_lab($id_daftar)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_lab($id_daftar,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_lab($id_daftar)
    {
        $this->db->from($this->table_lab);
        $this->db->where('id_daftar',$id_daftar);
        return $this->db->count_all_results();
    }

    public function save_lab($data,$id_daftar,$total)
    {   

        $this->update_total_daftar($id_daftar,'add','',$total);

            $this->db->insert($this->table_lab, $data);
            return $this->db->insert_id();   
    }

    public function delete_by_id_lab($id)
    {

         $this->update_total_daftar($id,'id_lab','tr_lab',0);

        $this->db->where('id_lab', $id);
        $this->db->delete($this->table_lab);
    }

    function  lookup_lab($keyword) {  //funtion menampilkan semua provinsi

        $this->db->distinct();
        $this->db->select('nama_lab')->from($this->table_lab);  
        $this->db->like('nama_lab',$keyword,'match');  
        $query = $this->db->get();      
           
        return $query->result();  
    }    

// akhir handle obat pasien

// handle radiologi pasien

    var $table_radio='tr_radiologi';
    var $column_radio = array('id_radio,nama_radio,qty,harga,total');
    var $order_radio = array('id_radio' => 'asc');

    private function _get_datatables_radio($id_daftar,$term)
    {
        
        $this->db->from($this->table_radio);
        $this->db->where('id_daftar',$id_daftar);

        if ($term !=''){
            $this->db->like('nama_radio',$term);
            $this->db->or_like('qty',$term);
            $this->db->or_like('harga',$term);
            $this->db->or_like('total',$term);
        }

        if(isset($_REQUEST['order'])) // here order processing
            {
                $this->db->order_by($column_radio[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
            } 
                else if(isset($this->order))
            {
                $order = $this->order_radio;
                $this->db->order_by(key($order_radio), $order_radio[key($order_radio)]);
            }

    }

    function get_datatables_radio($id_daftar)
    {


        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_radio($id_daftar,$term);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_radio($id_daftar)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_radio($id_daftar,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_radio($id_daftar)
    {
        $this->db->from($this->table_radio);
        $this->db->where('id_daftar',$id_daftar);
        return $this->db->count_all_results();
    }

    public function save_radio($data,$id_daftar,$total)
    {

        $this->update_total_daftar($id_daftar,'add','',$total);

            $this->db->insert($this->table_radio, $data);
            return $this->db->insert_id();   
    }

    public function delete_by_id_radio($id)
    {

        $this->update_total_daftar($id,'id_radio','tr_radiologi',0);

        $this->db->where('id_radio', $id);
        $this->db->delete($this->table_radio);
    }

    function  lookup_radio($keyword) {  //funtion menampilkan semua provinsi

        $this->db->distinct();
        $this->db->select('nama_radio')->from($this->table_radio);  
        $this->db->like('nama_radio',$keyword,'match');  
        $query = $this->db->get();      
           
        return $query->result();  
    }    

// akhir handle radiologi pasien


// handle poli lain

    var $table_poli='tr_poli2';
    var $column_poli = array('id_poli2,nama_poli,kd_petugas');
    var $order_poli = array('id_poli2' => 'asc');

    private function _get_datatables_poli($id_daftar,$term)
    {
        
        $this->db->select('pl2.nama_poli,ptg.nama_petugas,pl2.id_poli2');
        $this->db->from('tr_poli2 as pl2');
        $this->db->join('m_petugas as ptg','pl2.kd_petugas=ptg.kd_petugas');
        $this->db->where('pl2.id_daftar',$id_daftar);

        if ($term !=''){
            $this->db->like('pl2.nama_poli',$term);
            $this->db->or_like('ptg.nama_petugas',$term);
        }

        $column_poli2 = array('pl2.nama_poli,ptg.nama_petugas');

        if(isset($_REQUEST['order'])) // here order processing
            {
                $this->db->order_by($column_poli2[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
            } 
                else if(isset($this->order))
            {
                $order = $this->order_poli;
                $this->db->order_by(key($order_poli), $order_poli[key($order_poli)]);
            }

    }

    function get_datatables_poli($id_daftar)
    {


        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_poli($id_daftar,$term);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_poli($id_daftar)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_poli($id_daftar,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_poli($id_daftar)
    {
        $this->db->from($this->table_poli);
        $this->db->where('id_daftar',$id_daftar);
        return $this->db->count_all_results();
    }

    public function save_poli($data)
    {
            $this->db->insert($this->table_poli, $data);
            return $this->db->insert_id();   
    }

    public function delete_by_id_poli($id)
    {
        $this->db->where('id_poli2', $id);
        $this->db->delete($this->table_poli);
    }

// akhir handle poli


// handle alergi obat

    var $table_alergi='tr_alergi';
    var $column_alergi = array('id_alergi,kd_pasien,kd_obat,keterangan');

    private function _get_datatables_alergi($kd_pasien,$term)
    {
        
        $this->db->select('alergi.id_alergi,alergi.kd_obat,obat.nama,alergi.keterangan');
        $this->db->from('tr_alergi as alergi');
        $this->db->join('m_obatalkes as obat','alergi.kd_obat=obat.kode');
        $this->db->where('alergi.kd_pasien',$kd_pasien);

        if ($term !=''){
            $this->db->like('alergi.keterangan',$term);
            $this->db->or_like('obat.nama',$term);
        }

        $column_alergi2 = array('obat.nama,alergi.keterangan');
        $order_alergi = array('alergi.id_alergi' => 'asc');

        if(isset($_REQUEST['order'])) // here order processing
            {
                $this->db->order_by($column_alergi2[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
            } 
                else if(isset($this->order))
            {
                $order = $this->order_alergi;
                $this->db->order_by(key($order_alergi), $order_alergi[key($order_alergi)]);
            }

    }

    function get_datatables_alergi($kd_pasien)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_alergi($kd_pasien,$term);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    function count_filtered_alergi($kd_pasien)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_alergi($kd_pasien,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_alergi($kd_pasien)
    {
        $this->db->from($this->table_alergi);
        $this->db->where('kd_pasien',$kd_pasien);
        return $this->db->count_all_results();
    }

    public function save_alergi($data)
    {
            $this->db->insert($this->table_alergi, $data);
            return $this->db->insert_id();   
    }

    public function delete_by_id_alergi($id)
    {
        $this->db->where('id_alergi', $id);
        $this->db->delete($this->table_alergi);
    }

// akhir handle alergi obat

// update total dipendaftaran

public function update_total_daftar($id_daftar,$jenis_tnd,$nama_tbl,$total){

     $sql = "select id_daftar,jmltotal from tr_daftar where id_daftar=?";

     if ($jenis_tnd != 'add' ) {

        if ($nama_tbl=='tr_tindakan'){
            $sql = "select a.id_daftar,a.jmltotal,b.total from tr_daftar a inner join tr_tindakan b on a.id_daftar=b.id_daftar where b.id_tindakan=?";            
        }else if ($nama_tbl=='tr_radiologi'){
            $sql = "select a.id_daftar,a.jmltotal,b.total from tr_daftar a inner join tr_radiologi b on a.id_daftar=b.id_daftar where b.id_radio=?";            
        }else if ($nama_tbl=='tr_obat'){
            $sql = "select a.id_daftar,a.jmltotal,b.total from tr_daftar a inner join tr_obat b on a.id_daftar=b.id_daftar where b.id_obat_tr=?";            
        }else if ($nama_tbl=='tr_lab'){
            $sql = "select a.id_daftar,a.jmltotal,b.total from tr_daftar a inner join tr_lab b on a.id_daftar=b.id_daftar where b.id_lab=?";            
        }

        
     }

     
    $query = $this->db->query($sql,array($id_daftar));   
     

    foreach ($query->result_array() as $row)
    {

        $jmltotal = $row['jmltotal'];
        $id_daftar2 = $row['id_daftar'];

        if ($jenis_tnd=='add'){
            $jmltotal = $jmltotal + $total;
        }else{
            $total = $row['total'];
            $jmltotal = $jmltotal - $total;
        }

        $data_upp = array('jmltotal' =>$jmltotal, );

        $this->db->where('id_daftar', $id_daftar2);
        $this->db->update('tr_daftar', $data_upp);

    }


}

// akhir update total dipendaftaran

// search daftar by nobukti
public function get_daftar_bynobukti_obat($id)
    {   
        $this->db->select('spost');
        $this->db->from('tr_obat');
        $this->db->where('id_obat_tr',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
// akhir search cari by nobukti

}
