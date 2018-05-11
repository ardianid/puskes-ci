<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_apotik extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
// handle pencarian

function _get_datatables_pencarian($no_daftar,$tanggal,$nama_pasien,$jenis,$kd_puskes,$term=''){

    $this->db->select("a.nobukti_d,a.id_daftar,b.nama,b.alamat,a.nama_ruang,c.nama_petugas,case when a.jenis_obat=0 then 'Blm Dilayani' else 'Sdh Dilayani' end as st_obat",FALSE);
    $this->db->from('tr_daftar a');
    $this->db->join('m_pasien b','a.kd_pasien=b.kd_pasien');
    $this->db->join('m_petugas c','a.kd_petugas=c.kd_petugas');
        

        $this->db->where('a.tanggal_msk',$tanggal);
        $this->db->where('a.kd_puskes',$kd_puskes);


        if ($no_daftar!='') {
			$this->db->where('a.id_daftar',$no_daftar);        	
        }

		if ($nama_pasien!='') {
			$this->db->where('a.nama_pasien',$nama_pasien);        	
        }        
        
        if ($jenis!='') {

        	if ($jenis !='All') {
				if ($jenis == 'Belum Dilayani' ) {
        			$this->db->where('a.jenis_obat','0');        		
        		}else{
        			$this->db->where('a.jenis_obat','1');        		
        		}      	
        	}
	
        }


    if ($term !='') {

    $column_ = array("a.nobukti_d,a.id_daftar,b.nama,b.alamat,a.nama_ruang,c.nama_petugas,case when a.jenis_obat=0 then 'Blm Dilayani' else 'Sdh Dilayani' end as st_obat");

    $this->db->like('a.id_daftar',$term);
    $this->db->or_like('b.nama',$term);
    $this->db->or_like('a.nama_ruang',$term);
    $this->db->or_like('c.nama_petugas',$term);

    if ($term =='Belum Dilayani') {
    	$this->db->or_like('a.jenis_obat','0');	
    }else{
    	$this->db->or_like('a.jenis_obat','1');	
    } 

    }

    $this->db->order_by("a.id_daftar","asc");

    /*
    if(isset($_REQUEST['order'])) // here order processing
    {
       $this->db->order_by($column_[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
    } 
    else if(isset($this->order))
    {
       $order = $this->order;
       $this->db->order_by(key('a.id_daftar','asc'), $order[key('a.id_daftar','asc')]);
    } */


}


function get_datatables_pencarian($no_daftar,$tanggal,$nama_pasien,$jenis,$kd_puskes){
  $term = $_REQUEST['search']['value'];   
  $this->_get_datatables_pencarian($no_daftar,$tanggal,$nama_pasien,$jenis,$kd_puskes,$term);
  if($_REQUEST['length'] != -1)
  $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
  $query = $this->db->get();
  return $query->result();
}


function count_filtered_pencarian($no_daftar,$tanggal,$nama_pasien,$jenis,$kd_puskes)
    {

        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_pencarian($no_daftar,$tanggal,$nama_pasien,$jenis,$kd_puskes,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_pencarian($no_daftar,$tanggal,$nama_pasien,$jenis,$kd_puskes)
    {

    $this->db->select("a.nobukti_d,a.id_daftar,b.nama,b.alamat,a.nama_ruang,c.nama_petugas,case when a.jenis_obat=0 then 'Belum Dilayani' else 'Sudah Dilayani' end as st_obat",FALSE);
    $this->db->from('tr_daftar a');
    $this->db->join('m_pasien b','a.kd_pasien=b.kd_pasien');
    $this->db->join('m_petugas c','a.kd_petugas=c.kd_petugas');
    
        

        $this->db->where('a.tanggal_msk',$tanggal);
        $this->db->where('a.kd_puskes',$kd_puskes);

        if ($no_daftar!='') {
			$this->db->where('a.id_daftar',$no_daftar);        	
        }

		if ($nama_pasien!='') {
			$this->db->where('a.nama_pasien',$nama_pasien);        	
        }        
        
        if ($jenis!='') {
        	if ($jenis !='All') {
				if ($jenis == 'Belum Dilayani' ) {
        			$this->db->where('a.jenis_obat','0');        		
        		}else{
        			$this->db->where('a.jenis_obat','1');        		
        		}      	
        	}
        }

        
        return $this->db->count_all_results();
    }


    public function get_by_id_pencarian($id)
    {
        $this->db->select("a.nobukti_d,a.id_daftar,b.nama,b.alamat,a.umur_pasien,a.cara_bayar,c.nama_petugas");
    	$this->db->from('tr_daftar a');
    	$this->db->join('m_pasien b','a.kd_pasien=b.kd_pasien');
    	$this->db->join('m_petugas c','a.kd_petugas=c.kd_petugas');
        $this->db->where('a.id_daftar',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

// akhir handle pencarian

// handle obat pasien

    var $table_obat ='tr_obat';

    private function _get_datatables_obat($id_daftar,$term)
    {
        $this->db->select("tr.id_obat_tr,tr.kd_obat,ms.nama,ms.tipe_obat,tr.qty,tr.harga,tr.total,tr.satuan,tr.dosis,(case when tr.spost=1 then 'OK' else '-' end) stat_post ",FALSE);
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

        $column_obat = array("tr.id_obat_tr,tr.kd_obat,ms.nama,ms.tipe_obat,tr.qty,tr.harga,tr.total,tr.satuan,tr.dosis,(case when tr.spost=1 then 'OK' else '-' end) stat_post ",FALSE);
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

    public function save_obat($data)
    {
            $this->db->insert($this->table_obat, $data);
            return $this->db->insert_id();   
    }

    public function update_obat($where, $data)
    {
        $this->db->update($this->table_obat, $data, $where);
        return $this->db->affected_rows();
    }

    public function get_by_id_obat($id)
    {

        $this->db->select('tr.id_obat_tr,tr.kd_obat,ms.nama,ms.tipe_obat,tr.qty,tr.harga,tr.total,tr.satuan,tr.dosis');
        $this->db->from('tr_obat as tr');
        $this->db->join('m_obatalkes as ms','tr.kd_obat=ms.kode');
        $this->db->where('tr.id_obat_tr',$id);
        $query = $this->db->get();
 
        return $query->row();
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

// update stok

public function update_transaksi_detail_stok($nobukti_awal,$stat_,$splus,$spos){

    $sql = "select * from tr_obat where spost=0 and id_daftar=?";

    if ($stat_=='dell_one' ){
        $sql = "select * from tr_obat where id_obat_tr=?";
    }

    $query = $this->db->query($sql,array($nobukti_awal));

    foreach ($query->result_array() as $row)
        {
            $kd_obat= $row['kd_obat'];
            $id_isi= $row['id_obat_tr'];
            $qty= $row['qty'];

            $sql2="select * from m_obatalkes where kode=?";
            $query2 = $this->db->query($sql2,array($kd_obat));

            $stok_ada=0;
            $qty1=0;
            $qty2=0;

            foreach ($query2->result_array() as $row2)
            {
                $stok_ada= $row2['stok'];
                $qty1 = $row2['qty1'];
                $qty2 = $row2['qty3'];
            }

            $qtyplus = $qty1 * $qty2 ;


            if ($splus == 'add') {
                $stok_ada = $stok_ada + $qty;
            }else{
                $stok_ada = $stok_ada - $qty;
            }

            $jml1=0;
            $jml2=0;

            if ($stok_ada >= $qtyplus) {
                $sisa = fmod($stok_ada, $qtyplus);

                $jml1 = ($stok_ada - $sisa) / $qtyplus;

                if ($sisa > $qty2){
                    $jml2 = $sisa;

                    $sisa = fmod($sisa, $qty2);
                    $jml2 = ($jml2 - $sisa) / $qty2;


                }else{
                    $jml2= $sisa;
                }

            }else{
                $jml1='0';
                $jml2=$stok_ada;
            }
                            


            if ($stok_ada >= 0){

                $data_upp = array('stok' =>$stok_ada,
                                 'stok1' =>$jml1,
                                 'stok2' =>$jml2,
                     );

                $this->db->where('kode', $kd_obat);
                $this->db->update('m_obatalkes', $data_upp); 

                $data_upp2 = array(
                    'spost' =>$spos, );

                $this->db->where('id_obat_tr', $id_isi);
                $this->db->update('tr_obat', $data_upp2); 
                

            }

        }

}

// akhir update stok


// update total dipendaftaran

public function update_total_daftar($id_daftar,$jenis_tnd,$total){        
    
    
    if ($jenis_tnd == "add"){
        $sql = "select a.id_daftar,a.jmltotal,b.total from tr_daftar a inner join tr_obat b on a.id_daftar=b.id_daftar where b.spost=0 and b.id_daftar=?";            
    }else{
        $sql = "select a.id_daftar,a.jmltotal,b.total from tr_daftar a inner join tr_obat b on a.id_daftar=b.id_daftar where b.id_obat_tr=?";
    }

    $query = $this->db->query($sql,array($id_daftar));   
    
    $jmltotal=0;
    $a=0;

    foreach ($query->result_array() as $row)
    {

        if ($a==0) {
            $jmltotal = $row['jmltotal'];
        }

        $id_daftar2 = $row['id_daftar'];

        if ($total==0){
            $total = $row['total'];
        }

        if ($jenis_tnd=='add'){
            $jmltotal = $jmltotal + $total;
        }else{
            $jmltotal = $jmltotal - $total;
        }

        $a=$a+1;

        $data_upp = array('jmltotal' =>$jmltotal,'jenis_obat'=>'1');

        $this->db->where('id_daftar', $id_daftar2);
        $this->db->update('tr_daftar', $data_upp);

    }


}

// akhir update total dipendaftaran


}