<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_kelurahan extends CI_Model {
    var $table_key = 'm_kel';
    var $table = 'm_kel inner join m_kec on m_kel.kd_kec=m_kec.kd_kec';
    var $column = array("m_kel.kd_kel,m_kel.kd_kec,m_kec.nama_kec,m_kel.nama_kel");
    var $order = array('m_kec.nama_kec' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($term='')
    {
        
        $this->db->from($this->table);
            
         if ($term !='') {

            $this->db->like('m_kec.nama_kec',$term);
            $this->db->or_like('m_kel.nama_kel',$term);

         }

     
            $column_order = array("m_kec.nama_kec,m_kel.nama_kel");

            if(isset($_REQUEST['order'])) // here order processing
            {
         //       error_log(isset($_REQUEST['order']), 0);
            //    $this->db->order_by($column_order[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
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
        $this->db->where('m_kel.kd_kel',$id);
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
        $this->db->where('kd_kel', $id);
        $this->db->delete($this->table_key);
    }


    function lookup_kecamatan($keyword){  
        $this->db->select('*')->from('m_kec');  
        $this->db->like('nama_kec',$keyword,'after');  
        $query = $this->db->get();      
           
        return $query->result();  
    }

    

 
}