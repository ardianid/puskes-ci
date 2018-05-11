<?php
Class mdl_user extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id,nama, pwd,kd_puskes,shak');
   $this -> db -> from('ms_user');
   $this -> db -> where('nama', $username);
   $this -> db -> where('pwd', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 // delete yang gak lengkap

    public function delete_by_zero_transaksi($uname)
    {   

        $this->db->where('id_pos', '0');
        $this->db->like('no_bukti',$uname,'after');
        $this->db->delete('tr_gudang2');

    }

// akhir delete yang gak lengkap

}
?>