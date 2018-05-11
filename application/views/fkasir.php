<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Kasir</title>
    <link href="<?=base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/jquery-ui-1.10.4.min.css" type="text/css" media="all" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/bootstrap-datepicker.min.css" rel="stylesheet">

<style type="text/css">

.modal-dialog{
     width: 25%;
}

.alignRight { text-align: center; }

.size_kecil {
    width: 300px;
}

td {
    vertical-align: bottom;
}

.detailright { text-align: right; }
.detailcenter { text-align: center; }

.zero-border-text {
    border: 0;
}


.ui-autocomplete { position: absolute; cursor: default;  } 
      /*.ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') right center no-repeat; }*/

      /* workarounds */
      * html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */
/* Menu
      ----------------------------------*/
      .ui-menu {
        list-style:none;
        padding: 2px;
        margin: 0;
        display:block;
      }
      .ui-menu .ui-menu {
        margin-top: -3px;
      }
      .ui-menu .ui-menu-item {
        margin:0;
        padding: 0;
        zoom: 1;
        float: left;
        clear: left;
        width: 100%;
        font-size:80%;
        
      }
      .ui-menu .ui-menu-item a {
        text-decoration:none;
        display:block;
        padding:.2em .4em;
        line-height:1.5;
        zoom:1;
      }
      .ui-menu .ui-menu-item a.ui-state-hover,
      .ui-menu .ui-menu-item a.ui-state-active {
        font-weight: normal;
        margin: -1px;
      }



.panel.with-nav-tabs .panel-heading{
    padding: 3px 3px 0 3px;
}
.panel.with-nav-tabs .nav-tabs{
	border-bottom: none;
}
.panel.with-nav-tabs .nav-justified{
	margin-bottom: -1px;
}

/*** PANEL PRIMARY ***/
.with-nav-tabs.panel-primary .nav-tabs > li > a,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
    color: #fff;
}
.with-nav-tabs.panel-primary .nav-tabs > .open > a,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
	color: #fff;
	background-color: #3071a9;
	border-color: transparent;
}
.with-nav-tabs.panel-primary .nav-tabs > li.active > a,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
	color: #428bca;
	background-color: #fff;
	border-color: #428bca;
	border-bottom-color: transparent;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #428bca;
    border-color: #3071a9;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #fff;   
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #3071a9;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    background-color: #4a9fe9;
}

</style>

</head>
<body>

  <script src="<?=base_url();?>asset/js/jquery-2.1.1.min.js"></script>
  <script src="<?=base_url();?>asset/js/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?=base_url();?>asset/js/bootstrap.min.js"></script>
  <script src="<?=base_url();?>asset/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url();?>asset/js/dataTables.bootstrap.js"></script>
  <script src="<?=base_url();?>asset/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    var kd_puskes_d = "<?php echo $kd_puskes; ?>";
    var save_method='';

$(document).ready(function() {

  /* table cari */
  table_cari = $('#table_cari').DataTable({
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('kasir_ctrl/ajax_list')?>",
            "type": "POST",
            "data": function(d) {
              d.tanggal_msk= $('#ttanggal_daftar').val();
              d.kd_puskes = kd_puskes_d;
              d.nomor= $('#tno_transaksi').val();
              d.nama= $('#tnama_daftar').val();
              d.alamat= $('#talamat_pasien').val();
            }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
          { width: '10px', targets: 0,"orderable": true },
          { width: '20px', targets: 1,"orderable": true },
          { width: '20px', targets: 2,"orderable": true },
          { width: '20px', targets: 3,"orderable": true },
          { width: '10px', targets: 4,sClass: "detailright","orderable": true }, 
          { width: '10px', targets: 5,sClass: "detailright","orderable": true }, 
          { width: '5px', targets: 6,sClass: "alignRight","orderable": true }, 
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
  }); 
  // akhir table cari

  /* table detail */
  table_detail = $('#table_detail').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "paging":   false,
        "info": false,
        "searching": false,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('kasir_ctrl/ajax_list_detail')?>",
            "type": "POST",
            "data": function(d) {
              d.id_daftar= $('#tid_daftar_in').val();
            }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
          { width: '20%',targets: 0,"orderable": false },
          { targets: 1,"orderable": false },
          { width: '20%',targets: 2,sClass: "detailright","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
  }); 
  // akhir table detail

  /* table bayar */
  table_bayar = $('#table_bayar').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "paging":   false,
        "info": false,
        "searching": false,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('kasir_ctrl/ajax_list_bayar')?>",
            "type": "POST",
            "data": function(d) {
              d.id_daftar= $('#tid_daftar_in').val();
            }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
          { width: '20%',targets: 0,"orderable": false },
          { width: '20%',targets: 1,"orderable": false },
          { width: '20%',targets: 2,"orderable": false },
          { width: '20%',targets: 3,sClass: "detailcenter","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
  }); 
  // akhir table bayar


});
// akhir document ready

// cari data
function btsearch_transaksi_click()
    {
      table_cari.ajax.reload(null,false); //reload datatable ajax
    }
// akhir cari data

// reload table2 in detail
function reload_table_detail()
    {
      table_detail.ajax.reload(null,false); //reload datatable ajax
    }

function reload_table_bayar()
    {
      table_bayar.ajax.reload(null,false); //reload datatable ajax
    }

// akhir reload table2 in detail


// pilih data

function lihat_detail(id)
{

  $.ajax({
       
        url : "<?php echo site_url('kasir_ctrl/ajax_get_by_id_pencarian')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            var namaumur = data.nama;
                namaumur = namaumur.concat(' ( ');
                namaumur = namaumur.concat(data.umur_pasien);
                namaumur = namaumur.concat(' )');

            $('[name="tid_daftar_in"]').val(data.id_daftar);

            $('[name="tnomor_in"]').val(data.nobukti_d);
            $('[name="tnama_in"]').val(namaumur);
            $('[name="ttanggal_in"]').val(data.tanggal_msk);
            $('[name="talamat_in"]').val(data.alamat);
            $('[name="tcara_bayar_in"]').val(data.cara_bayar);
            $('[name="tdokter_in"]').val(data.nama_petugas);

            $('[name="tjml_in"]').val(data.jmltotal);
            $('[name="tdisc_in"]').val(data.jmldisc);
            $('[name="ttotal_in"]').val(data.jmltotal_bersih);
            $('[name="ttotal_bayar"]').val(data.totbayar);

            reload_table_detail();
            reload_table_bayar();

            $('#tab_detail2').tab('show');    

            hitung_disc_total();


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        } 
    });

}

// akhir pilih data

/* add pembayaran */
    function btadd_pembayaran()
    {
      save_method = 'add';
      $('#form_bayar')[0].reset(); // reset form on modals

      //var d = new Date();
       // var dd = d.getDate();

      //$('[name="ttanggal_byr"]').val(dd);
      
      $('.form-group').removeClass('has-error'); // 
      $('.help-block').empty(); // clear error string
      $('#modal_bayar').modal('show'); // show bootstrap modal
      $('.modal-title').text('Pembayaran'); // Set Title to Bootstrap modal title
    }
/* akhir add pembayaran */

/* simpan bayar */
function save_byr(){

    $('#btnSave_byr').text('saving...'); //change button text
    $('#btnSave_byr').attr('disabled',true); //set button disable

      var url;
      url = "<?php echo site_url('kasir_ctrl/ajax_add_bayar')?>";
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "id_daftar": $("#tid_daftar_in").val(),
              "cara_bayar": $("#tcara_byr").val(),
              "jmlbayar": $("#tjml_byr").val(),
              "tglbayar": $("#ttanggal_byr").val(),
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  var jmlbyr = $("#tjml_byr").val();
                  var total_ = $("#ttotal_bayar").val();                   

                  var akhir_tot = Number(jmlbyr) + Number(total_);

                  $("#ttotal_bayar").val(akhir_tot);                   

                  $('#modal_bayar').modal('hide');
                  reload_table_bayar();


              }
                else
              {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
              }
              $('#btnSave_byr').text('save'); //change button text
              $('#btnSave_byr').attr('disabled',false); //set button enable
 
 
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave_byr').text('save'); //change button text
                $('#btnSave_byr').attr('disabled',false); //set button enable
            }
        });
}

/* akhir simpan */

/* delete bayar */

function delete_bayar(id)
{

    $.ajax({  
        url : "<?php echo site_url('kasir_ctrl/ajax_get_total_by_idbayar')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

          var jmlbyr = data.jmlbayar;

          if(confirm('Yakin akan dihapus?'))
            {
              // ajax delete data to database
                $.ajax({
                  url : "<?php echo site_url('kasir_ctrl/ajax_delete_bayar')?>",
                  type: "POST",
                  data: {
                    "id_bayar": id,  
                    "id_daftar": $("#tid_daftar_in").val(),
                    "jmlbayar": jmlbyr,
                  },
                  dataType: "JSON",
                  success: function(data)
                  {
                    

                    var total_ = $("#ttotal_bayar").val();                   

                    var akhir_tot =  Number(total_) - Number(jmlbyr);

                    $("#ttotal_bayar").val(akhir_tot); 

                     reload_table_bayar();

                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      alert('Error delete data');
                  }
              });
       
            }

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        } 
    });


}

/* akhir delete bayar */

// hitung diskon total
  $('#tdisc_in').blur(function() {
    hitung_disc_total();
  });

function hitung_disc_total()
{

       var jml_total = $('#tjml_in').val();

      if (jml_total=='' || jml_total==0) {
        $('[name="tdisc_in"]').val(0);
        $('[name="ttotal_in"]').val(0);        
      }else{

      var disc_total = $('#tdisc_in').val();

      if (disc_total==''){
        disc_total=0;
      }

      ttotal_bersih = Number(jml_total)  - Number(disc_total);
      $('[name="ttotal_in"]').val(ttotal_bersih);

      update_daftar_disc();

      }

}

// akhir hitung total


// update daftar

function update_daftar_disc(){

      var url;
      url = "<?php echo site_url('kasir_ctrl/update_daftar_disc')?>";
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "id_daftar": $("#tid_daftar_in").val(),
              "jmldisc": $("#tdisc_in").val(),
              "jmltotal_bersih": $("#ttotal_in").val(),
            } ,
            dataType: "JSON",
            success: function(data)
            {
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data daftar');
            }
        });
}

// akhir update daftar

// kalau klik detail
$("#tab_detail2").on("click", function() {

            $('[name="tid_daftar_in"]').val('');

            $('[name="tnomor_in"]').val('');
            $('[name="tnama_in"]').val('');
            $('[name="ttanggal_in"]').val('');
            $('[name="talamat_in"]').val('');
            $('[name="tcara_bayar_in"]').val('');
            $('[name="tdokter_in"]').val('');

            $('[name="tjml_in"]').val('0');
            $('[name="tdisc_in"]').val('0');
            $('[name="ttotal_in"]').val('0');
            $('[name="ttotal_bayar"]').val('0');

            reload_table_detail();
            reload_table_bayar();

})
// akhir kalau klik detail

// kalau klik awal

$("#tab_diagnosa2").on("click", function() {
  table_cari.ajax.reload(null,false); //reload datatable ajax 
})

// akhir kalau klik awal

</script>

<!-- menu tab -->
      <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a id="tab_diagnosa2" href="#tab_diagnosa" data-toggle="tab">Daftar Transaksi</a></li>
                            <li><a id="tab_detail2" href="#tab_detail" data-toggle="tab">Transaksi Pembayaran</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab_diagnosa">

                <!-- pencarian -->

            <div class="alert alert-warning">

          <table id="tbl_atas" width="100%" border="0">
  						<tr>
    						<td width="15%">Nomor</td>
    						<td width="1%">:</td>
    						<td width="25%">
    							<input type="text" class="form-control input-sm" name="tno_transaksi" id="tno_transaksi" >
    						</td>
    						<td width="7%">&nbsp;</td>
    						<td width="15%">Nama Pasien</td>
    						<td width="1%">:</td>
    						<td width="43%">
    							<input type="text" class="form-control input-sm" name="tnama_daftar" id="tnama_daftar" >
    						</td>
  						</tr>
  						
  						<tr>
    						<td>Tanggal</td>
    						<td>:</td>
    						<td>
    							<input name="ttanggal_daftar" id='ttanggal_daftar' placeholder="yyyy-mm-dd" class="form-control input-sm datepicker" type="text" value="<?php echo date('Y-m-d'); ?>" >
    						</td>
    						<td>&nbsp;</td>
    						<td>Alamat Pasien </td>
    						<td>:</td>
    						<td>
    							<input type="text" class="form-control input-sm" name="talamat_pasien" id="talamat_pasien" >
    						</td>
  						</tr>
              <tr>
                <td>
                  <p></p>
                  <button id="btsearch_trans" class="btn btn-success" onclick="btsearch_transaksi_click()"><i class="glyphicon glyphicon-search"></i> Search Pasien </button>            
                </td>
              </tr>
					</table>

      </div>

				<table id="table_cari" class="table table-striped table-bordered" cellspacing="0">
          		<thead>
            		<tr>
              			<th>Nomor</th>
              			<th>Nama Pasien</th>
              			<th>Alamat</th>
              			<th>Dokter</th>
              			<th>Jumlah</th>
                    <th>Jml Bayar</th>
              			<th>Action</th>
            		</tr>
          		</thead>
          		<tbody>
          		</tbody>
          		<tfoot>
          		</tfoot>
        		</table>

				<!-- akhir pencarian -->
        </div>

        <!-- tab detail -->
       <div class="tab-pane fade" id="tab_detail">
            
        <input name="tid_daftar_in" id="tid_daftar_in" type="hidden" />

        <!-- tabel atas -->
        <div class="alert alert-warning">
        <table width="100%" border="0">
          <tr>
            <td width="7%">Nomor</td>
            <td width="1%">:</td>
            <td width="27%">
            <input name="tnomor_in" type="text" id="tnomor_in" class="form-control input-sm" readonly="readonly" /></td>
            <td width="4%">&nbsp;</td>
            <td width="10%">Nama/Umur</td>
            <td width="1%">:</td>
            <td width="54%">
            <input name="tnama_in" type="text" id="tnama_in" class="form-control input-sm" /></td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td>
            <input name="ttanggal_in" type="text" id="ttanggal_in" class="form-control input-sm" /></td>
            <td>&nbsp;</td> 
            <td>Alamat</td>
            <td>:</td>
            <td>
            <input name="talamat_in" type="text" id="talamat_in" class="form-control input-sm" /></td>
          </tr>
          <tr>
            <td>Cr Bayar</td>
            <td>:</td>
            <td>
            <input name="tcara_bayar_in" type="text" id="tcara_bayar_in" class="form-control input-sm" /></td>
            <td>&nbsp;</td>
            <td>Dokter</td>
            <td>:</td>
            <td>
            <input name="tdokter_in" type="text" id="tdokter_in" class="form-control input-sm" /></td>
          </tr>
        </table>
      </div>
        <!-- akhir tabel atas -->

            <table id="table_detail" class="table table-striped table-bordered" cellspacing="0">
              <thead>
                <tr>
                    <th>Jenis Trans</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
              </tfoot>
            </table>

<!-- bawah -->

                          <table width="100%" border="0">
                              <tr>
                                <td valign="top" width="50%" rowspan="4">
                                </td>
                                <td width="30%" align="right">
                                  Jumlah :
                                </td>
                                <td>
                                  <input type="text" class="form-control input-sm detailright" id="tjml_in" name="tjml_in" readonly="true" value="0">
                                </td>
                              </tr>

                              <tr>
                                
                                <td align="right">
                                  Disc Total :
                                </td>
                                <td>
                                  <input type="text" class="form-control input-sm detailright" id="tdisc_in" name="tdisc_in" value="0">
                                </td>
                              </tr>

                              <tr>
                                
                                <td align="right">
                                  Total :
                                </td>
                                <td>
                                  <input type="text" class="form-control input-sm detailright" id="ttotal_in" name="ttotal_in" readonly="true" value="0">
                                </td>
                              </tr>

                              <tr>
                                
                                <td align="right">
                                  Total Bayar :
                                </td>
                                <td>
                                  <input type="text" class="form-control input-sm detailright" id="ttotal_bayar" name="ttotal_bayar" readonly="true" value="0">
                                </td>
                              </tr>

                              <tr>
                                <td>

                                  <table id="table_bayar" class="table table-striped table-bordered" cellspacing="0">
                                  <thead>
                                      <tr>
                                        <th>Tgl Bayar</th>
                                        <th>Cara Bayar</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                      <tfoot>
                                      </tfoot>
                                    </table>

                                </td>
                                <td></td>
                                <td></td>
                              </tr>

                              <tr>
                                <td colspan="4">
                                  <button id="bts_add_bayar" class="btn btn-success btn-sm" onclick="btadd_pembayaran()"><i class="glyphicon glyphicon-plus"></i> Add Bayar </button>
                                </td>
                              </tr>

                          </table>

<!-- akhir bawah -->

        </div>
        <!-- akhir tab detail -->

                    </div>
                </div>
        </div>
    <!-- akhir menu tab -->

  <!-- modal bayar -->

  <div class="modal fade" name="modal_bayar" id="modal_bayar" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog"  role="document">
  <div class="modal-content">
  <div class="modal-header bg-primary">
    <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Pembayaran</h4>
  </div>
  
  <div class="modal-body">
    <form action="#" id="form_bayar">

      <input id="tid_byr" name="tid_byr" type="hidden">

      <div class="form-group">
            <label for="ttanggal_byr">Tanggal bayar :</label>
            <input name="ttanggal_byr" id='ttanggal_byr' placeholder="yyyy-mm-dd" class="form-control input-sm datepicker size_kecil" type="text" value="<?php echo date('Y-m-d'); ?>" >
      </div>

      <div class="form-group">
          <label for="tcara_byr">Cara Bayar :</label>
          <select name="tcara_byr" id="tcara_byr" class="form-control input-sm size_kecil" >
              <option value="BAYAR">BAYAR</option>
              <option value="GRATIS">GRATIS</option>
          </select>
      </div>

      <div class="form-group">
          <label for="tjml_byr">Jml bayar :</label>
          <input id="tjml_byr" name="tjml_byr" placeholder="Jumlah" class="form-control input-sm size_kecil" type="number" min="0" value="0" step="1" class="currency">
      </div>

    </form>
  </div>

  <div class="modal-footer bg-success">
    
      <button type="button" id="btnSave_byr" onclick="save_byr()" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    
  </div>


  </div>
  </div>
  </div>

  <!-- akhir modal bayar -


</body>
</html>