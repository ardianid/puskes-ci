<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_obatalkes extends CI_Model {
    var $table = 'm_obatalkes';
    var $column = array("id_obat,kode,nama,jenis,qty1,qty3,satuan1,satuan3,hargajual,tipe_obat");
    var $order = array('id_obat' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($term='')
    {
        
        $this->db->from($this->table);

        if ($term !='') {

            $this->db->like('kode',$term);
            $this->db->or_like('nama',$term);
            $this->db->or_like('jenis',$term);

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
        $this->db->where('id_obat',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
 
    public function save($data,$kode)
    {

            $this->db->insert($this->table, $data);
            return $this->db->insert_id();

        
    }
 
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id)
    {
        $this->db->where('id_obat', $id);
        $this->db->delete($this->table);
    }

    public function cek_kode($kode)
    {

        $this->db->from($this->table);
        $this->db->where('kode',$kode);
        $query = $this->db->get();
        $kd_hasil = $query->row();

        return $kd_hasil->kd_pasien;

    }

 
}

