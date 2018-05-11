<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_kasir extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($tanggal,$kd_puskes,$nomor,$nama,$alamat,$term)
    {
        
        $this->db->select("df.nobukti_d,df.id_daftar,ps.nama,ps.alamat,pt.nama_petugas,df.jmltotal,df.totbayar");
        $this->db->from('tr_daftar as df');
    	$this->db->join('m_pasien as ps','df.kd_pasien=ps.kd_pasien');
    	$this->db->join('m_petugas as pt','pt.kd_petugas=df.kd_petugas');
        $this->db->where('df.kd_puskes',$kd_puskes);
        $this->db->where('df.tanggal_msk',$tanggal);


        if ($term !='') {

        	$column= array("df.nobukti_d,df.id_daftar,ps.nama,ps.alamat,pt.nama_petugas,df.jmltotal,df.totbayar");
        	$order_by = array('df.nobukti_d'=>'asc');

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

    /*  get data untuk daftar rawat jalan */
    function get_datatables($tanggal,$kd_puskes,$nomor,$nama,$alamat)
    {
        $term = $_REQUEST['search']['value']; 

        $this->_get_datatables_query($tanggal,$kd_puskes,$nomor,$nama,$alamat,$term);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    /* count filter rawat jalan */
       function count_filtered($tanggal,$kd_puskes,$nomor,$nama,$alamat)
    {
        $term = $_REQUEST['search']['value']; 

        $this->_get_datatables_query($tanggal,$kd_puskes,$nomor,$nama,$alamat,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }

    /* count all rawat jalan */
    public function count_all($tanggal,$kd_puskes,$nomor,$nama,$alamat)
    {

        $this->db->select("df.nobukti_d,df.id_daftar,ps.nama,ps.alamat,pt.nama_petugas,df.jmltotal,df.totbayar");
        $this->db->from('tr_daftar as df');
    	$this->db->join('m_pasien as ps','df.kd_pasien=ps.kd_pasien');
    	$this->db->join('m_petugas as pt','pt.kd_petugas=df.kd_petugas');
        $this->db->where('df.kd_puskes',$kd_puskes);
        $this->db->where('df.tanggal_msk',$tanggal);

        return $this->db->count_all_results();
    }


   /*  get data untuk detail */
    function get_datatables_detail($id_daftar)
    {
        $sql = ("
            select 'Tindakan' as jenis_tind,nama_tindakan as nama,total from tr_tindakan where id_daftar=?
            union all
            select 'Lab',nama_lab,total from tr_lab where id_daftar=?
            union all
            select 'Radiologi',nama_radio,total from tr_radiologi where id_daftar=?
            union all
            select 'Obat',ob.nama,df.total from tr_obat df inner join m_obatalkes ob on df.kd_obat=ob.kode where df.spost=1 and df.id_daftar=?
            ");

       $query = $this->db->query($sql,array($id_daftar,$id_daftar,$id_daftar,$id_daftar));
       return $query->result();

    }

    /* count filter detail */
    function count_filtered_detail($id_daftar)
    { 

        $sql = ("
            select 'Tindakan',nama_tindakan as nama,total from tr_tindakan where id_daftar=?
            union all
            select 'Lab',nama_lab,total from tr_lab where id_daftar=?
            union all
            select 'Radiologi',nama_radio,total from tr_radiologi where id_daftar=?
            union all
            select 'Obat',ob.nama,df.total from tr_obat df inner join m_obatalkes ob on df.kd_obat=ob.kode where df.spost=1 and df.id_daftar=?
            ");

        $query = $this->db->query($sql,array($id_daftar,$id_daftar,$id_daftar,$id_daftar));
        return $query->num_rows();
    }

    /* count all rawat detail */
    public function count_all_detail($id_daftar)
    {
        return 0;
    }

// handle pembayaran pasien

    var $table_bayar='tr_bayar';
    var $column_diagnosa = array('id_bayar,id_daftar,tglbayar,cara_bayar,jmlbayar');
    var $order_diagnosa = array('tglbayar' => 'asc');


    private function _get_datatables_bayar($id_daftar)
    {
        
        $this->db->from($this->table_bayar);
        $this->db->where('id_daftar',$id_daftar);

    }

    function get_datatables_bayar($id_daftar)
    {


        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_bayar($id_daftar);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_bayar($id_daftar)
    {
        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_bayar($id_daftar);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_bayar($id_daftar)
    {
        $this->db->from($this->table_bayar);
        $this->db->where('id_daftar',$id_daftar);
        return $this->db->count_all_results();
    }

// akhir handle pembayaran pasien

// cari berdasarkan id

    public function get_by_id_pencarian($id)
    {
        $this->db->select("a.nobukti_d,a.id_daftar,a.tanggal_msk,b.nama,b.alamat,a.umur_pasien,a.cara_bayar,c.nama_petugas,a.jmltotal,a.jmltotal_bersih,a.jmldisc,a.totbayar");
        $this->db->from('tr_daftar a');
        $this->db->join('m_pasien b','a.kd_pasien=b.kd_pasien');
        $this->db->join('m_petugas c','a.kd_petugas=c.kd_petugas');
        $this->db->where('a.id_daftar',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

// akhir cari berdasarkan id

/* save bayar */
    public function save_bayar($data,$id_daftar,$total)
    {
            
            $sql2 = "select totbayar from tr_daftar where id_daftar=?";
            $query2 = $this->db->query($sql2,array($id_daftar));       

            foreach ($query2->result_array() as $row2)
            {
                $jmltotbayar = $row2['totbayar'];
                $jmltotbayar = $jmltotbayar + $total;

                $data_upp = array('totbayar' =>$jmltotbayar);

                $this->db->where('id_daftar', $id_daftar);
                $this->db->update('tr_daftar', $data_upp);

                $this->db->insert($this->table_bayar, $data);
                return $this->db->insert_id();

            }
        

    }
/* akhir bayar */

/* delete bayar */ 
    public function delete_by_id_bayar($id,$id_daftar,$total)
    {

        $sql2 = "select totbayar from tr_daftar where id_daftar=?";
        $query2 = $this->db->query($sql2,array($id_daftar));       

            foreach ($query2->result_array() as $row2)
            {
                $jmltotbayar = $row2['totbayar'];
                $jmltotbayar = $jmltotbayar - $total;

                $data_upp = array('totbayar' =>$jmltotbayar);

                $this->db->where('id_daftar', $id_daftar);
                $this->db->update('tr_daftar', $data_upp);

                $this->db->where('id_bayar', $id);
                $this->db->delete($this->table_bayar);

            }
        

    }
/* akhir delete bayar */

// get total bayar

    public function get_total_by_idbayar($id)
    {
        $this->db->select("jmlbayar");
        $this->db->from('tr_bayar');
        $this->db->where('id_bayar',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

// akhir get total bayar

// update disc & total

public function update_daftar_disc($where, $data)
    {
        $this->db->update("tr_daftar", $data, $where);
        return $this->db->affected_rows();
    }
// akhir disc & total

}