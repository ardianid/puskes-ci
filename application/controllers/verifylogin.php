<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class verifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('mdl_user','',TRUE);
 }

 function index()
 {

   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('flogin');
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->mdl_user->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->nama,
         'kd_puskes' => $row->kd_puskes,
         'shak' => $row->shak,
       );
       $this->session->set_userdata('logged_in', $sess_array);

       // delete transaksi 0 di detail tr_gudang
          $this->mdl_user->delete_by_zero_transaksi($row->nama);
       // akhir delete transaksi 0 di detail tr_gudang

     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>