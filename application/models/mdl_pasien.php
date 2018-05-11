<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_pasien extends CI_Model {
    var $table_key = "m_pasien";
    var $table = "m_pasien inner join m_kel on m_pasien.kd_kel=m_kel.kd_kel";
    var $column = array("m_pasien.id,m_pasien.kd_pasien,m_pasien.nama,m_pasien.sex,m_pasien.tgl_lahir,m_pasien.alamat,m_pasien.tempat_lahir,m_pasien.tgl_daftar,m_pasien.jenis_jamkes,m_pasien.no_jamkes,m_pasien.cara_bayar,m_pasien.kd_kel,m_kel.nama_kel");
    var $order = array('m_pasien.id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($term='')
    {
        //$this->db->select("kd_pasien,nama,case sex when 0 then 'Pria' Else 'Wanita' end 'sex',tgl_lahir");
        $this->db->from($this->table);

        if ($term !='') {

            $this->db->like('m_pasien.kd_pasien',$term);
            $this->db->or_like('m_pasien.nama',$term);
            $this->db->or_like('m_pasien.alamat',$term);
            $this->db->or_like('m_pasien.sex',$term);
            $this->db->or_like('m_pasien.tgl_lahir',$term);

         }

  /*      $i = 0;
     
        foreach ($this->column as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        } 
*/
         
        if(isset($_POST['order'])) // here order processing
        {
  //          $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        } 
    }
 
 
    function get_datatables()
    {

        $term = $_REQUEST['search']['value']; 

        $this->_get_datatables_query($term);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
 
    public function save($data,$kode)
    {

            $this->db->insert($this->table_key, $data);
            return $this->db->insert_id();

        
    }
 
    public function update($where, $data)
    {
        $this->db->update($this->table_key, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_key);
    }

    public function cek_kode($kode)
    {

        $this->db->from($this->table);
        $this->db->where('kd_pasien',$kode);
        $query = $this->db->get();
        $kd_hasil = $query->row();

        return $kd_hasil->kd_pasien;

    }

    function lookup_kelurahan($keyword){  
        $this->db->select('kd_kel,nama_kel')->from('m_kel');  
        $this->db->like('nama_kel',$keyword,'after');  
        $query = $this->db->get();      
           
        return $query->result();  
    }

    function lookup_pasien($keyword){  
        $this->db->select('kd_pasien,nama,alamat,tgl_lahir')->from('m_pasien');  
        $this->db->like('nama',$keyword,'match');  
        $query = $this->db->get();      
           
        return $query->result();  
    }

    function lookup_pasien_bykode($keyword){  
        $this->db->select('kd_pasien,nama,alamat,tgl_lahir')->from('m_pasien');  
        $this->db->like('kd_pasien',$keyword,'after');  
        $query = $this->db->get();      
           
        return $query->result();  
    }

 
}

