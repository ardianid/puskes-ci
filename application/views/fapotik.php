<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Apotik</title>
    <link href="<?=base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/jquery-ui-1.10.4.min.css" type="text/css" media="all" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/bootstrap-datepicker.min.css" rel="stylesheet">

<style type="text/css">

.alignRight { text-align: center; }

.size_kecil {
    width: 150px;
}

td {
    vertical-align: bottom;
}


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

var save_method; //for save method string
var kd_puskes_d = "<?php echo $kd_puskes; ?>";

 $(document).ready(function() {

  table_pencarian = $('#table_cari').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('apotik_ctrl/ajax_list_pencarian')?>",
            "type": "POST",
            "data": function(d) {
              d.no_daftar= $('#tno_daftar').val();
              d.tanggal= $('#ttanggal_daftar').val();
              d.nama_pasien= $('#tnama_daftar').val();
              d.jenis= $('#tjenis_daftar').val();
              d.kd_puskes = kd_puskes_d;
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '30px', targets: 0,"orderable": false },
          { width: '100px', targets: 1,"orderable": false },
          { width: '100px', targets: 2,"orderable": false },
          { width: '20px', targets: 3,"orderable": false },
          { width: '20px', targets: 4,"orderable": false },
          { width: '60px', targets: 5,"orderable": false },
          { width: '5px', targets: 6,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
  });

  // obat

   table_obat = $('#table_obat').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "paging":   false,
        "info": false,
        "searching": false,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('apotik_ctrl/ajax_list_obat')?>",
            "type": "POST",
            "data": function(d) {
              d.id_daftar = $('#tid_daftar').val() ;
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '15px', targets: 0,"orderable": false },
          { width: '200px', targets: 1,"orderable": false },
          { width: '20px', targets: 2,"orderable": false },
          { width: '10px', targets: 3,"orderable": false },
          { width: '10px', targets: 4,"orderable": false },
          { width: '10px', targets: 5,"orderable": false },
          { width: '20px', targets: 6,"orderable": false },
          { width: '20px', targets: 7,"orderable": false },
          { width: '7px', targets: 8,sClass: "alignRight","orderable": false },
          { width: '10px', targets: 9,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
      });
  
    $("#tnama_obat").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "apotik_ctrl/lookup_obat",
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                                add(data.message);  
                        },  
                    });  
                },  
            select:   
                function(event, ui) {  
                    $("#tnama_obat").val( ui.item.value );
                    $("#tkode_obat").val( ui.item.id );
                    $("#tsatuan_obat").val( ui.item.desc );
                    $("#tharga_obat").val( ui.item.desc2 );
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      }).data("autocomplete")._renderItem = function (ul, item) {
        return $("<li>")
            .data("item.autocomplete", item)
            .append('<a>' + item.value + '<br>' + '<small> <div class="text-lowercase">' +  item.id  +'</div> </small>'+ '</a>')
            .appendTo(ul);
    };    

    $("#tkode_obat").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "apotik_ctrl/lookup_obat_kode",
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                                add(data.message);  
                        },  
                    });  
                },  
            select:   
                function(event, ui) {  
                    $("#tkode_obat").val( ui.item.value );
                    $("#tnama_obat").val( ui.item.id );
                    $("#tsatuan_obat").val( ui.item.desc );
                    $("#tharga_obat").val( ui.item.desc2 );
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      }).data("autocomplete")._renderItem = function (ul, item) {
        return $("<li>")
            .data("item.autocomplete", item)
            .append('<a>' + item.value + '<br>' + '<small> <div class="text-lowercase">' +  item.id  +'</div> </small>'+ '</a>')
            .appendTo(ul);
    };    

// akhir obat
  
  
 })
 // akhir document.ready

//datepicker
      $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "auto",
        todayBtn: true,
        todayHighlight: true,  
      });

      //set input/textarea/select event when change value, remove class error and remove text help block
      $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
      });

function btsearch_pasien()
  {
    table_pencarian.ajax.reload(null,false); //reload datatable ajax
  } 


function pilih_data(id)
{

  $.ajax({
       
        url : "<?php echo site_url('apotik_ctrl/ajax_get_by_id_pencarian')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="tid_daftar"]').val(data.id_daftar);

            $('[name="tnomor_detail"]').val(data.nobukti_d);
            $('[name="tnama_detail"]').val(data.nama);
            $('[name="talamat_detail"]').val(data.alamat);
            $('[name="tumur_detail"]').val(data.umur_pasien);
            $('[name="tcbayar_detail"]').val(data.cara_bayar);
            $('[name="tdokter_detail"]').val(data.nama_petugas);

            table_obat.ajax.reload(null,false); //reload datatable ajax

            $('#tab_detail2').tab('show');    

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        } 
    });

}


// obat

function btadd_obat(){

   save_method="add";
   $('#form_obat')[0].reset(); // reset form on modals
   $('#modal_obat').modal('show'); // show bootstrap modal
   $('.modal-title').text('Add Obat Pasien'); // Set Title to Bootstrap modal title

    $('#tkode_obat').attr('disabled',false);
    $('#tnama_obat').attr('disabled',false);
    $('#tnama_obat').attr('disabled',false);

}

function edit_obat(id){

  save_method="edit";
  $('#form_obat')[0].reset(); // reset form on modals

  //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('apotik_ctrl/ajax_edit_obat/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="tkode_obat"]').val(data.kd_obat);
            $('[name="tnama_obat"]').val(data.nama);
            $('[name="tqty_obat"]').val(data.qty);
            $('[name="tsatuan_obat"]').val(data.satuan);
            $('[name="tharga_obat"]').val(data.harga);
            $('[name="tdosis_obat"]').val(data.dosis);

            $('[name="tid_obat_tr"]').val(data.id_obat_tr);
  
            $('#modal_obat').modal('show'); // show bootstrap modal
            $('.modal-title').text('Edit Obat Pasien'); // Set Title to Bootstrap modal title
            
            $('#tkode_obat').attr('disabled',true);
            $('#tnama_obat').attr('disabled',true);
            $('#tnama_obat').attr('disabled',true);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

}

function reload_table_obat()
{
  table_obat.ajax.reload(null,false); //reload datatable ajax
}

function save_obat(){

    $('#btnSave_obat').text('saving...'); //change button text
    $('#btnSave_obat').attr('disabled',true); //set button disable

      var url;

      if (save_method=="add")
      {
        url = "<?php echo site_url('apotik_ctrl/ajax_add_obat')?>";

        // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "kd_obat": $("#tkode_obat").val(),
              "qty": $("#tqty_obat").val(),
              "harga": $("#tharga_obat").val(),
              "satuan": $("#tsatuan_obat").val(),
              "dosis": $("#tdosis_obat").val(),
              "id_daftar": $("#tid_daftar").val(),
              "id_obat_tr": $("#tid_obat_tr").val(),

            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  $('#modal_obat').modal('hide');
                  reload_table_obat();
                  

              }
                else
              {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
              }
              $('#btnSave_obat').text('save'); //change button text
              $('#btnSave_obat').attr('disabled',false); //set button enable
 
 
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave_obat').text('save'); //change button text
                $('#btnSave_obat').attr('disabled',false); //set button enable
            }
        });

      }else{

        url = "<?php echo site_url('apotik_ctrl/ajax_update_obat')?>";
        url_stok = "<?php echo site_url('apotik_ctrl/ajax_update_transaksi_detail_stok')?>";
        url_total = "<?php echo site_url('apotik_ctrl/ajax_update_total_daftar')?>";

        // ajax adding data to database
          $.ajax({
            url : url_stok,
            type: "POST",
            data: {
              "nobukti_awal": $("#tid_obat_tr").val(),
              "stat_": "dell_one",
              "splus": "add",
              "spos": "0",
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {
                
                $.ajax({
                  url : url_total,
                  type: "POST",
                  data: {
                    "id_daftar": $("#tid_obat_tr").val(),
                    "jenis_tnd": "edit",
                    "total": "0",
                  } ,
                  dataType: "JSON",
                  success: function(data)
                  {
                  if(data.status) //if success close modal and reload ajax table
                  {

                      // ajax adding data to database
                      $.ajax({
                        url : url,
                        type: "POST",
                        data: {
                          "kd_obat": $("#tkode_obat").val(),
                          "qty": $("#tqty_obat").val(),
                          "harga": $("#tharga_obat").val(),
                          "satuan": $("#tsatuan_obat").val(),
                          "dosis": $("#tdosis_obat").val(),
                          "id_daftar": $("#tnomor_detail").val(),
                          "id_obat_tr": $("#tid_obat_tr").val(),

                        } ,
                        dataType: "JSON",
                        success: function(data)
                        {
                           if(data.status) //if success close modal and reload ajax table
                           {

                              $('#modal_obat').modal('hide');
                              reload_table_obat();

                              $('#btnSave_obat').text('save'); //change button text
                              $('#btnSave_obat').attr('disabled',false); //set button enable

                          }
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                            $('#btnSave_obat').text('save'); //change button text
                            $('#btnSave_obat').attr('disabled',false); //set button enable
                        }
                      });

                    }
                  },
                    error: function (jqXHR, textStatus, errorThrown)
                      {
                        alert('Error adding / update data(Tot)..');
                        $('#btnSave_obat').text('save'); //change button text
                        $('#btnSave_obat').attr('disabled',false); //set button enable
                      }

                    });

               }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data (Jml)');
                $('#btnSave_obat').text('save'); //change button text
                $('#btnSave_obat').attr('disabled',false); //set button enable
            }
          });


      }
      
       
}

// akhir obat

// post data

function btadd_post_obat(){


  url = "<?php echo site_url('apotik_ctrl/ajax_update_transaksi_detail_stok')?>";

    $.ajax({
      url : "<?php echo site_url('apotik_ctrl/ajax_update_total_daftar')?>",
      type: "POST",
      data: {
        "id_daftar": $("#tid_daftar").val(),
        "jenis_tnd": "add",
        "total": "0",
            }, 
      dataType: "JSON",
      success: function(data)
      {
      if(data.status) //if success close modal and reload ajax table
      {

        // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "nobukti_awal": $("#tid_daftar").val(),
              "stat_": "all",
              "splus": "minus",
              "spos": "1",
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {
                
                alert("Data disimpan..");
                reload_table_obat();
                btsearch_pasien();
                 
               }
            },
              error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Error post data..');
            }
          });   

      }
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      alert('Error post data (0)..');
    }
    });


}

// akhir post data


 </script>

  <!-- menu tab -->
      <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a id="tab_diagnosa2" href="#tab_diagnosa" data-toggle="tab">Antrian Obat</a></li>
                            <li><a id="tab_detail2" href="#tab_detail" data-toggle="tab">Detail Obat</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab_diagnosa">

                <!-- pencarian -->

            <div class="alert alert-warning">

              <table id="tbl_atas" width="100%" border="0">
  						<tr>
    						<td width="15%">No. Daftar</td>
    						<td width="1%">:</td>
    						<td width="25%">
    							<input type="text" class="form-control" name="tno_daftar" id="tno_daftar" >
    						</td>
    						<td width="7%">&nbsp;</td>
    						<td width="15%">Nama Pasien</td>
    						<td width="1%">:</td>
    						<td width="43%">
    							<input type="text" class="form-control" name="tnama_daftar" id="tnama_daftar" >
    						</td>
  						</tr>
  						<tr>

  						</tr>
  						<tr>
    						<td>Tanggal</td>
    						<td>:</td>
    						<td>
    							<input name="ttanggal_daftar" id='ttanggal_daftar' placeholder="yyyy-mm-dd" class="form-control input-sm datepicker" type="text" value="<?php echo date('Y-m-d'); ?>" >
    						</td>
    						<td>&nbsp;</td>
    						<td>Jenis </td>
    						<td>:</td>
    						<td>

                  <select name="tjenis_daftar" id="tjenis_daftar" class="form-control input-sm size_kecil">
                    <option value="All">All</option>
                    <option value="Belum Dilayani">Belum Dilayani</option>
                    <option value="Sudah Dilayani">Sudah Dilayani</option>
                  </select>
    							
    						</td>
  						</tr>
              <tr>
                <td>
                  <p></p>
                  <button id="bts_pasien" class="btn btn-success" onclick="btsearch_pasien()"><i class="glyphicon glyphicon-search"></i> Search Pasien </button>            
                </td>
              </tr>
					</table>

        
				  
        

      </div>

				<table id="table_cari" class="table table-striped table-bordered" cellspacing="0">
          		<thead>
            		<tr>
              			<th>No Daftar</th>
              			<th>Nama Pasien</th>
              			<th>Alamat</th>
              			<th>Ruangan</th>
              			<th>Dokter</th>
              			<th>Status</th>
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
              
            <input type="hidden" name="tid_daftar" id="tid_daftar" >

            <div class="alert alert-warning">
            <table width="100%" border="0">
            <tr>
              <td width="17%">No Daftar</td>
              <td width="1%">:</td>
              <td width="82%">
                <input type="text" class="form-control zero-border-text size_kecil input-sm" id="tnomor_detail" name="tnomor_detail" readonly="true">
              </td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control zero-border-text input-sm" id="tnama_detail" name="tnama_detail">
              </td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control zero-border-text input-sm" id="talamat_detail" name="talamat_detail">
              </td>
            </tr>
            <tr>
              <td>Umur</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control zero-border-text input-sm" id="tumur_detail" name="tumur_detail">
              </td>
            </tr>
            <tr>
              <td>Cr Bayar</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control zero-border-text input-sm" id="tcbayar_detail" name="tcbayar_detail">
              </td>
            </tr>
            <tr>
              <td>Dokter</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control zero-border-text input-sm" id="tdokter_detail" name="tdokter_detail">
              </td>
            </tr>
          </table>
          </div>

                <button id="bts_obat" class="btn btn-success btn-sm" onclick="btadd_obat()"><i class="glyphicon glyphicon-plus"></i> Add </button>    
                <p> </p>

                          <table id="table_obat" class="table table-striped table-bordered" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Dosis</th>
                                <th>Pos?</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                          </table>

                <p></p>
                <button id="bts_post_obat" class="btn btn-success btn-sm" onclick="btadd_post_obat()"><i class="glyphicon glyphicon-check"></i> Post Data </button>    

        </div>
        <!-- akhir tab detail -->

                    </div>
                </div>
        </div>
    <!-- akhir menu tab -->




  <!-- modal obat -->

  <div class="modal fade" id="modal_obat" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog"  role="document">
  <div class="modal-content">
  <div class="modal-header bg-primary">
    <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Obat Pasien</h4>
  </div>
  
  <div class="modal-body">
    <form action="#" id="form_obat">

      <input id="tid_obat_tr" name="tid_obat_tr" type="hidden">

      <div class="form-group">
            <label for="tkode_obat">Kode :</label>
            <input id="tkode_obat" name="tkode_obat" placeholder="Kode Obat" class="form-control size_kecil" type="text">
      </div>

      <div class="form-group">
          <label for="tnama_obat">Nama :</label>
          <input id="tnama_obat" name="tnama_obat" placeholder="Nama Obat" class="form-control" type="text">
      </div>

      <div class="form-group">
          <label for="tqty_obat">Qty :</label>
          <input id="tqty_obat" name="tqty_obat" placeholder="Jumlah" class="form-control" type="number" min="0" value="0" step="1" class="currency">
      </div>

      <div class="form-group">
          <label for="tsatuan_obat">Satuan :</label>
          <input id="tsatuan_obat" name="tsatuan_obat" placeholder="Satuan" class="form-control" type="text" readonly="true">
      </div>

      <div class="form-group">
          <label for="tharga_obat">Harga :</label>
          <input id="tharga_obat" name="tharga_obat" placeholder="Harga" class="form-control" type="number" min="0" value="0" step="1" class="currency">
      </div>

      <div class="form-group">
          <label for="tdosis_obat">Dosis :</label>
          <input id="tdosis_obat" name="tdosis_obat" placeholder="Dosis" class="form-control" type="text">
      </div>

    </form>
  </div>

  <div class="modal-footer bg-success">
    
      <button type="button" id="btnSave_obat" onclick="save_obat()" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    
  </div>


  </div>
  </div>
  </div>

  <!-- akhir modal obat -->

</body>
</html>