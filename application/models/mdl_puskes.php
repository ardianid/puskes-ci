<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_puskes extends CI_Model {
    var $table_key = 'm_puskes';
    var $table = 'm_puskes inner join m_kel on m_puskes.kd_kel=m_kel.kd_kel';
    var $column = array("m_kel.kd_kel,m_kel.nama_kel,m_puskes.kd_puskes,m_puskes.nama_puskes,m_puskes.alamat_puskes");
    var $order = array('m_puskes.nama_puskes' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($term='')
    {
        
        $this->db->from($this->table);

        if ($term !='') {

            $this->db->like('m_puskes.nama_puskes',$term);
            $this->db->or_like('m_puskes.alamat_puskes',$term);
            $this->db->or_like('m_kel.nama_kel',$term);

         }

      /*  $i = 0;
     
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
        $this->db->where('m_puskes.kd_puskes',$id);
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
        $this->db->where('kd_puskes', $id);
        $this->db->delete($this->table_key);
    }


    function lookup_kelurahan($keyword){  
        $this->db->select('*')->from('m_kel');  
        $this->db->like('nama_kel',$keyword,'after');  
        $query = $this->db->get();      
           
        return $query->result();  
    }
 
}