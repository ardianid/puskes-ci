<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_gudang extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


// handle pencarian

function _get_datatables_pencarian($no_bukti,$tanggal,$unit1,$unit2,$jenis,$kd_puskes,$term=''){

    $this->db->select('id_gudang_ob,jenis_trans,no_bukti,no_faktur,tanggal,unit1,unit2,grand_total,keterangan');
    $this->db->from('tr_gudang');
        
    $this->db->where('tanggal',$tanggal);
    $this->db->where('kd_puskes',$kd_puskes);

        if ($no_bukti !='') {
			$this->db->where('no_bukti',$no_bukti);        	
        }

		if ($unit1!='') {
			$this->db->where('unit1',$unit1);        	
        }        
        
        if ($unit2!='') {
			$this->db->where('unit2',$unit2);        	
        }        

        if ($jenis!='') {

        	if ($jenis !='All') {
				if ($jenis == 'TR MASUK' ) {
        			$this->db->where('jenis_trans','TR MASUK');        		
        		}else{
        			$this->db->where('jenis_trans','TR KELUAR');		
        		}      	
        	}
	
        }


    if ($term !='') {

    $column_ = array('id_gudang_ob,jenis_trans,no_bukti,no_faktur,tanggal,unit1,unit2,grand_total,keterangan');

    $this->db->like('jenis_trans',$term);
    $this->db->or_like('no_bukti',$term);
    $this->db->or_like('no_faktur',$term);
    $this->db->or_like('tanggal',$term);
    $this->db->or_like('unit1',$term);
    $this->db->or_like('unit2',$term);
    $this->db->or_like('grand_total',$term);
    $this->db->or_like('keterangan',$term);

    
    if(isset($_REQUEST['order'])) // here order processing
    {
       $this->db->order_by($column_[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
    } 
    else if(isset($this->order))
    {
       $order = $this->order;
       $this->db->order_by(key('id_gudang_ob'), $order[key('id_gudang_ob')]);
    } 
}

}


function get_datatables_pencarian($no_bukti,$tanggal,$unit1,$unit2,$jenis,$kd_puskes){
  $term = $_REQUEST['search']['value'];   
  $this->_get_datatables_pencarian($no_bukti,$tanggal,$unit1,$unit2,$jenis,$kd_puskes,$term);
  if($_POST['length'] != -1)
  $this->db->limit($_POST['length'], $_POST['start']);
  $query = $this->db->get();

  return $query->result();

}


function count_filtered_pencarian($no_bukti,$tanggal,$unit1,$unit2,$jenis,$kd_puskes)
    {

        $term = $_REQUEST['search']['value'];

        $this->_get_datatables_pencarian($no_bukti,$tanggal,$unit1,$unit2,$jenis,$kd_puskes,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }


public function count_all_pencarian($no_bukti,$tanggal,$unit1,$unit2,$jenis,$kd_puskes)
    {

    $this->db->select('id_gudang_ob,jenis_trans,no_bukti,no_faktur,tanggal,unit1,unit2,grand_total,keterangan');
    $this->db->from('tr_gudang');
        
    $this->db->where('tanggal',$tanggal);
    $this->db->where('kd_puskes',$kd_puskes);

        if ($no_bukti !='') {
			$this->db->where('no_bukti',$no_bukti);        	
        }

		if ($unit1!='') {
			$this->db->where('unit1',$unit1);        	
        }        
        
        if ($unit2!='') {
			$this->db->where('unit2',$unit2);        	
        }        

        if ($jenis!='') {

        	if ($jenis !='All') {
				if ($jenis == 'TR MASUK' ) {
        			$this->db->where('jenis_trans','TR MASUK');        		
        		}else{
        			$this->db->where('jenis_trans','TR KELUAR');		
        		}      	
        	}
	
        }
        return $this->db->count_all_results();

    }

// akhir handle pencarian

// handle isi

function _get_datatables_isi($no_bukti,$term=''){

    $this->db->select('gd.id_isi,gd.kd_obat,ob.nama,gd.qty,gd.satuan,gd.harga,gd.disc,gd.total');
    $this->db->from('tr_gudang2 gd');
    $this->db->join('m_obatalkes ob','gd.kd_obat=ob.kode');
        
    $this->db->where('gd.no_bukti',$no_bukti);


    if ($term !='') {

    $column_ = array('gd.id_isi,gd.kd_obat,ob.nama,gd.qty,gd.satuan,gd.harga,gd.disc,gd.total');

    $this->db->like('kd_obat',$term);
    $this->db->or_like('nama',$term);
    $this->db->or_like('qty',$term);
    $this->db->or_like('satuan',$term);
    $this->db->or_like('harga',$term);
    $this->db->or_like('disc',$term);
    $this->db->or_like('total',$term);
    }
    
    if(isset($_REQUEST['order'])) // here order processing
    {
       $this->db->order_by($column_[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
    } 
    else if(isset($this->order))
    {
       $order = $this->order;
       $this->db->order_by(key('kd_obat'), $order[key('kd_obat')]);
    } 
}



function get_datatables_isi($no_bukti){
//  $term = $_REQUEST['search']['value'];   
    $term='';
  $this->_get_datatables_isi($no_bukti,$term);
 // if($_REQUEST['length'] != -1)
  //$this->db->limit($_REQUEST['length'], $_REQUEST['start']);
  $query = $this->db->get();
  return $query->result();  
}


function count_filtered_isi($no_bukti)
    {

     //   $term = $_REQUEST['search']['value'];

        $term='';
        $this->_get_datatables_isi($no_bukti,$term);
        $query = $this->db->get();
        return $query->num_rows();
    }


public function count_all_isi($no_bukti)
    {

    $this->db->select('gd.id_isi,gd.kd_obat,ob.nama,gd.qty,gd.satuan,gd.harga,gd.disc,gd.total');
    $this->db->from('tr_gudang2 gd');
    $this->db->join('m_obatalkes ob','gd.kd_obat=ob.kode');
        
    $this->db->where('gd.no_bukti',$no_bukti);

    return $this->db->count_all_results();

    }


    public function save_isi($data)
    {
            $this->db->insert('tr_gudang2', $data);
            return $this->db->insert_id();   
    }

    public function delete_by_id_isi($id)
    {
        $this->db->where('id_isi', $id);
        $this->db->delete('tr_gudang2');
    }

// akhir handle isi

// search obat

    function  lookup_obat($keyword) {  //funtion menampilkan semua provinsi

        $this->db->select('kode,nama,satuan3')->from("m_obatalkes");  
        $this->db->like('nama',$keyword,'match');      
        
        $query = $this->db->get();      
           
        return $query->result();  
    }    

    function  lookup_obat_kode($keyword) {  //funtion menampilkan semua provinsi

        $this->db->select('kode,nama,satuan3')->from("m_obatalkes");  
        $this->db->like('kode',$keyword,'after');      
        
        $query = $this->db->get();      
           
        return $query->result();  
    }    

// akhir search obat

// cari nobukti sementara

public function get_by_nobukti_sementara($id)
    {
        $this->db->select('no_bukti');
        $this->db->from('tr_gudang');
        $this->db->like('no_bukti',$id,'after');
        $query = $this->db->get();
 
        return $query->row();
    }

// akhir cari nobukti sementara


// delete yang gak lengkap

    public function delete_by_zero_transaksi($uname)
    {   

        $this->db->where('id_pos', '0');
        $this->db->like('no_bukti',$uname,'after');
        $this->db->delete('tr_gudang2');

    }

// akhir delete yang gak lengkap

// cek nobukti terakhir
public function get_by_nobukti_akhir($param,$kd_puskes)
    {

        $this->db->select_max('no_bukti');
        $this->db->from('tr_gudang');
        $this->db->where('kd_puskes',$kd_puskes);
        $this->db->like('no_bukti',$param,'after');
        $query = $this->db->get();
 
        return $query->row();
    }
// akhir cek nobukti terakhir


// simpan transaksi

public function save_transaksi($data)
    {
            $this->db->insert('tr_gudang', $data);
            return $this->db->insert_id();   
    }


public function update_transaksi($where, $data)
    {
        $this->db->update('tr_gudang', $data, $where);
        return $this->db->affected_rows();
    }

public function update_transaksi_detail($where, $data)
    {
        $this->db->update('tr_gudang2', $data, $where);
        return $this->db->affected_rows();
    }

public function delete_transaksi($id)
    {
        $this->db->where('no_bukti', $id);
        $this->db->delete('tr_gudang');     

        $this->db->where('no_bukti', $id);
        $this->db->delete('tr_gudang2');     

    }

public function update_transaksi_detail_stok($nobukti_awal,$stat_,$splus){

    $sql = "select * from tr_gudang2 where id_pos=0 and no_bukti=?";

    if ($stat_=='dell_one' ){
        $sql = "select * from tr_gudang2 where id_isi=?";
    }else if ($stat_ == 'dell_all'){
        $sql = "select * from tr_gudang2 where no_bukti=?";
    }

    $query = $this->db->query($sql,array($nobukti_awal));

    foreach ($query->result_array() as $row)
        {
            $kd_obat= $row['kd_obat'];
            $id_isi= $row['id_isi'];
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
                    'id_pos' =>'1', );

                $this->db->where('id_isi', $id_isi);
                $this->db->update('tr_gudang2', $data_upp2); 
                

            }

        }

}

// akhir simpan transaksi

// search transaksi by nobukti
public function get_transaksi_bynobukti($id)
    {
        $this->db->from('tr_gudang');
        $this->db->where('id_gudang_ob',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
// akhir search cari by nobukti

// search data detail
public function get_obatdetail_bynobukti($id)
    {
        $this->db->from('tr_gudang2');
        $this->db->where('id_isi',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
// akhir search cari by nobukti


}