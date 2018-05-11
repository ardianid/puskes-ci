<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_desa extends CI_Model {
    var $table_key = 'm_desa';
    var $table = 'm_desa inner join m_kel on m_desa.kd_kel=m_kel.kd_kel inner join m_kec on m_kel.kd_kec=m_kec.kd_kec';
    var $column = array("m_kec.nama_kec,m_kel.nama_kel,m_desa.nama_desa,m_desa.kd_desa");
    var $order = array('m_desa.nama_desa' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    private function _get_datatables_query($term='')
    {
        
        $this->db->from($this->table);
            
         if ($term !='') {

         	$this->db->like('m_desa.nama_desa',$term);
            $this->db->or_like('m_kec.nama_kec',$term);
            $this->db->or_like('m_kel.nama_kel',$term);

         }

     
            //$column_order = array("m_kec.nama_kec,m_kel.nama_kel");

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
        $this->db->where('m_desa.kd_desa',$id);
        $query = $this->db->get();
 
        return $query->row();
    }


    public function save($data)
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
        $this->db->where('kd_desa', $id);
        $this->db->delete($this->table_key);
    }


    function lookup_kelurahan($keyword){  
        $this->db->select('kel.kd_kel,kel.nama_kel,kec.nama_kec')->from('m_kel kel');  
        $this->db->join('m_kec kec','kel.kd_kec=kec.kd_kec');
        $this->db->like('kel.nama_kel',$keyword,'match');  
        $query = $this->db->get();      
           
        return $query->result();  
    }    


}