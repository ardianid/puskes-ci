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
.alignRight_btn { float: right; }

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
var save_method_detail;
var kd_puskes_d = "<?php echo $kd_puskes; ?>";

 $(document).ready(function() {

 /* nama desa */ 
      $("#tnama_desa").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "imunisasi2_ctrl/lookup_desa",  
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

                    $("#tkd_desa").val( ui.item.id );
                    $("#tnama_desa").val( ui.item.value );
                    $("#tnama_kel").val(ui.item.desc);
                    $("#tnama_kec").val(ui.item.desc2);
                     
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      }).data("autocomplete")._renderItem = function (ul, item) {
        return $("<li>")
            .data("item.autocomplete", item)
            .append('<a>' + item.value + '<br>' + '<small> <div class="text-lowercase">' +  item.desc + '[' + item.desc2 + ']' +'</div> </small>'+ '</a>')
            .appendTo(ul);
    }; 


 /* nama petugas */ 
      $("#tnama_petugas").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "imunisasi2_ctrl/lookup_petugas",  
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

                    $("#tkd_petugas").val( ui.item.id );
                    $("#tnama_petugas").val( ui.item.value );
                     
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      }).data("autocomplete")._renderItem = function (ul, item) {
        return $("<li>")
            .data("item.autocomplete", item)
            .append('<a>' + item.value + '<br>' + '<small> <div class="text-lowercase">' +  item.id +'</div> </small>'+ '</a>')
            .appendTo(ul);
    }; 


  table_pencarian = $('#table_cari').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "paging":   false,
        "info": false,
        "searching": false,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('imunisasi2_ctrl/ajax_list_pencarian')?>",
            "type": "POST",
            "data": function(d) {
              d.nama_lokasi= $('#tnama_lokasi_cr').val();
              d.alamat_lokasi= $('#talamat_lokasi_cr').val();
              d.tgl= $('#ttanggal_cr').val();
              
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '100px', targets: 0,"orderable": false },
          { width: '150px', targets: 1,"orderable": false },
          { width: '200px', targets: 2,"orderable": false },
          { width: '5px', targets: 3,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
  }); 

  table_detail_ps = $('#table_det').DataTable({
        "autoWidth": false, //step 1
        "proscsing": true, //Feature control the processing indicator.
        "servereSide": true, //Feature control DataTables' server-side processing mode.
        "paging":   false,
        "info": false,
        "searching": false,
        "order": [], //Initial no order.



        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('imunisasi2_ctrl/ajax_list_pencarian2')?>",
            "type": "POST",
            "data": function(d) {
              d.id_imun2ku=$('#tid_imun2').val();
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '100px', targets: 0,"orderable": false },
          { width: '50px', targets: 1,"orderable": false },
          { width: '100px', targets: 2,"orderable": false },
          { width: '100px', targets: 3,"orderable": false },
          { width: '5px', targets: 4,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
  });  


 });
// akhir document ready

//datepicer
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "auto",
        todayBtn: true,
        todayHighlight: true,  
    });

function reload_table()
{
  table_pencarian.ajax.reload(null,false); //reload datatable ajax
}

function reload_table_detail()
{
  table_detail_ps.ajax.reload(null,false); //reload datatable ajax
}

function kosongkan_data(){

  $('[name="tid_imun2"]').val('');

  //$('[name="ttanggal"]').val('');
  $('[name="tnama_lokasi"]').val('');
  $('[name="talamat_lokasi"]').val('');
  $('[name="tkd_petugas"]').val('');
  $('[name="tnama_petugas"]').val('');
  $('[name="tjml_petugas"]').val('0');
  $('[name="tjml_pembina"]').val('0');
  $('[name="tkd_puskes"]').val(kd_puskes_d);

}

function kosongkan_data_detail(){

  $('[name="tid_imun3"]').val('');

  $('[name="tnama"]').val('');
  $('[name="tjns_kelamin"]').val('');
 // $('[name="ttgl_lahir"]').val('');
  $('[name="talamat"]').val('');
  $('[name="tkd_desa"]').val('');
  $('[name="tnama_desa"]').val('');
  $('[name="tnama_kel"]').val('');
  $('[name="tnama_kec"]').val('');
  $('[name="tjns_pasien"]').val('');
  $('[name="tjns_imun_det1"]').val('');
  $('[name="tjns_imun_det2"]').val('');
  $('[name="tjns_imun_det3"]').val('');
  $('[name="tpem_fisik"]').val('');

}

function add_data(){

	$('#tab_detail2').tab('show');

	save_method="add";

	kosongkan_data();
}

function edit_imun2(id)
{

	save_method="edit";

  $.ajax({
        url : "<?php echo site_url('imunisasi2_ctrl/ajax_get_by_id_pencarian')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="tid_imun2"]').val(data.id_imun2);

			$('[name="ttanggal"]').val(data.tgl_imun);
			$('[name="tnama_lokasi"]').val(data.nama_lokasi);
			$('[name="talamat_lokasi"]').val(data.alamat_lokasi);
			$('[name="tkd_petugas"]').val(data.kd_petugas);
			$('[name="tnama_petugas"]').val(data.nama_petugas);
			$('[name="tjml_petugas"]').val(data.jml_petugas);
			$('[name="tjml_pembina"]').val(data.jml_pembina);
			$('[name="tkd_puskes"]').val(data.kd_puskes);

            $('#tab_detail2').tab('show');    

            reload_table_detail();

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        } 
    });

}


function delete_imun2(id)
    {
      if(confirm('Yakin akan dihapus?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('imunisasi2_ctrl/ajax_delete2')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form_detail').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error delete data');
            }
        });
 
      }
    }


    function save_imun2()
    {

      $('#bts_post').text('saving...'); //change button text
      $('#bts_post').attr('disabled',true); //set button disable

      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('imunisasi2_ctrl/ajax_add_imun2')?>";
      }
      else
      {
        url = "<?php echo site_url('imunisasi2_ctrl/ajax_update_imun2')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "tgl_imun": $("#ttanggal").val(),
              "nama_lokasi": $("#tnama_lokasi").val(),
              "alamat_lokasi": $("#talamat_lokasi").val(),
              "kd_petugas": $("#tkd_petugas").val(),
              "jml_petugas": $("#tjml_petugas").val(),
              "jml_pembina": $("#tjml_pembina").val(),
              "kd_puskes": $("#tkd_puskes").val(),
              "id_imun2": $("#tid_imun2").val(),
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {


       			  if (save_method != 'add') {

       			  	    reload_table();
                  	alert("Data disimpan..")
                  	kosongkan_data();
                    reload_table_detail();
       			  		
       			  }else{
       			  	save_method="update";
                reload_table_detail();
       			  }
                  

              }
                
              $('#bts_post').text('Simpan'); //change button text
              $('#bts_post').attr('disabled',false); //set button enable
 
 
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#bts_post').text('Simpan'); //change button text
                $('#bts_post').attr('disabled',false); //set button enable
            }
        });
    }

// kalau klik detail
$("#tab_detail2").on("click", function() {

  save_method='add';
  kosongkan_data();
  kosongkan_data_detail();

})
// akhir kalau klik detail


// handle detail sekarang

function add_data3(){

	if (save_method=='add'){

    if( $("#ttanggal").val()=='' || $("#tnama_lokasi").val()=='' || $("#talamat_lokasi").val()=='') {
      alert('isi dulu data header');
    }else{

		save_imun2();

		$.ajax({
        url : "<?php echo site_url('imunisasi2_ctrl/ajax_cek_id_imun2')?>",
        type: "GET",
        data: {
              "tgl_imun": $("#ttanggal").val(),
              "nama_lokasi": $("#tnama_lokasi").val(),
              "alamat_lokasi": $("#talamat_lokasi").val(),
              "kd_petugas": $("#tkd_petugas").val(),
              "jml_petugas": $("#tjml_petugas").val(),
              "jml_pembina": $("#tjml_pembina").val(),
              "kd_puskes": $("#tkd_puskes").val(),
            } ,
        dataType: "JSON",
        success: function(data)
        {


            $('[name="tid_imun2"]').val(data.id_imun2);

            save_method_detail="add";

            kosongkan_data_detail();
            $('#modal_form_detail').modal('show');
			      $('.modal-title').text('Add Pasien');


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        } 
    	});
  }

	}else{
		
    save_method_detail="add";
    kosongkan_data_detail();
		$('#modal_form_detail').modal('show');
    $('.modal-title').text('Add Pasien');

	}
	// akhir kalau add

}

function edit_imun3(id)
{

	save_method_detail="edit";

  $.ajax({
        url : "<?php echo site_url('imunisasi2_ctrl/ajax_get_by_id_pencarian2')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="tid_imun3"]').val(data.id_imun3);

			$('[name="tnama"]').val(data.nama_pasien);
			$('[name="tjns_kelamin"]').val(data.jns_kelamin);
			$('[name="ttgl_lahir"]').val(data.tgl_lahir);
			$('[name="talamat"]').val(data.alamat);
			$('[name="tkd_desa"]').val(data.kd_desa);
			$('[name="tnama_desa"]').val(data.nama_desa);
			$('[name="tnama_kel"]').val(data.nama_kel);
			$('[name="tnama_kec"]').val(data.nama_kec);
			$('[name="tjns_pasien"]').val(data.jenis_pasien);
			$('[name="tjns_imun_det1"]').val(data.jns_imunisasi1);
			$('[name="tjns_imun_det2"]').val(data.jns_imunisasi2);
			$('[name="tjns_imun_det3"]').val(data.jns_imunisasi3);
			$('[name="tjns_imun_det3"]').val(data.jns_imunisasi3);
			$('[name="tpem_fisik"]').val(data.pem_fisik);

            $('#modal_form_detail').modal('show');  
            $('.modal-title').text('Edit Pasien');

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

}

function delete_imun3(id)
    {
      if(confirm('Yakin akan dihapus?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('imunisasi2_ctrl/ajax_delete3')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form_detail').modal('hide');
               reload_table_detail();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error delete data');
            }
        });
 
      }
    }

function save_imun3()
    {

      $('#btnSave_detail').text('saving...'); //change button text
      $('#btnSave_detail').attr('disabled',true); //set button disable

      var url;
      if(save_method_detail == 'add')
      {
          url = "<?php echo site_url('imunisasi2_ctrl/ajax_add_imun3')?>";
      }
      else
      {
        url = "<?php echo site_url('imunisasi2_ctrl/ajax_update_imun3')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "id_imun2": $("#tid_imun2").val(),
              "nama_pasien": $("#tnama").val(),
              "jns_kelamin": $("#tjns_kelamin").val(),
              "tgl_lahir": $("#ttgl_lahir").val(),
              "alamat": $("#talamat").val(),
              "kd_desa": $("#tkd_desa").val(),
              "jenis_pasien": $("#tjns_pasien").val(),
              "jns_imunisasi1": $("#tjns_imun_det1").val(),
              "jns_imunisasi2": $("#tjns_imun_det2").val(),
              "jns_imunisasi3": $("#tjns_imun_det3").val(),
              "pem_fisik": $("#tpem_fisik").val(),
              "id_imun3": $("#tid_imun3").val(),
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  reload_table_detail();
                  alert("Data disimpan..")
                  kosongkan_data_detail();

                  if (save_method_detail !='add') {
                    $('#modal_form_detail').modal('hide');
                  }

              }
                
              $('#btnSave_detail').text('Save'); //change button text
              $('#btnSave_detail').attr('disabled',false); //set button enable
 
 
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave_detail').text('Save'); //change button text
                $('#btnSave_detail').attr('disabled',false); //set button enable
            }
        });
    }

// akhir handle detail

</script>


  <!-- menu tab -->
      <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a id="tab_diagnosa2" href="#tab_diagnosa" data-toggle="tab">Master Data Imunisasi</a></li>
                            <li><a id="tab_detail2" href="#tab_detail" data-toggle="tab">Detail Data</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab_diagnosa">

                <!-- pencarian -->

            <div class="alert alert-warning">

              <table id="tbl_atas" width="100%" border="0">
              <tr>
                <td width="15%">Nama Lokasi</td>
                <td width="1%">:</td>
                <td width="25%">
                  <input type="text" class="form-control input-sm" name="tnama_lokasi_cr" id="tnama_lokasi_cr" >
                </td>
                <td width="7%">&nbsp;</td>
                <td width="10%">Tanggal</td>
                <td width="1%">:</td>
                <td width="43%">
                  <input name="ttanggal_cr" id="ttanggal_cr" placeholder="yyyy-mm-dd" class="form-control datepicker size_kecil" type="text" value="<?php echo date('Y-m-d'); ?>" >
                </td>
              </tr>
              <tr>

              </tr>
              <tr>
                <td>Alamat Lokasi</td>
                <td>:</td>
                <td>
                  <input type="text" class="form-control input-sm" name="talamat_lokasi_cr" id="talamat_lokasi_cr" >
                </td>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td>
                </td>
              </tr>
              <tr>
                <td>
                  <p></p>
                  <button id="bts_pasien" class="btn btn-success" onclick="reload_table()"><i class="glyphicon glyphicon-search"></i> Search Data </button>            
                </td>
              </tr>
          </table>

        
          
        

      </div>

      	<button id="bts_add_obat" class="btn btn-success btn-sm alignRight_btn" onclick="add_data()"><i class="glyphicon glyphicon-plus"></i> Add </button>
        <p></p>
        <table id="table_cari" class="table table-striped table-bordered" cellspacing="0">
              <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Lokasi</th>
                    <th>Alamat Lokasi</th>
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
              
            <input type="hidden" name="tid_imun2" id="tid_imun2" >
            <input type="hidden" name="tkd_puskes" id="tkd_puskes" >
            <input type="hidden" name="tkd_petugas" id="tkd_petugas" >

          <!--  <div class="alert alert-warning"> -->
            <table width="100%" border="0">
            <tr>
              <td width="17%">Tanggal</td>
              <td width="1%">:</td>
              <td width="82%">
                <input name="ttanggal" id="ttanggal" placeholder="yyyy-mm-dd" class="form-control datepicker size_kecil" type="text" value="<?php echo date('Y-m-d'); ?>" >
              </td>
            </tr>
            <tr>
              <td>Nama Lokasi</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="tnama_lokasi" name="tnama_lokasi">
              </td>
            </tr>
            <tr>
              <td>Alamat Lokasi</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="talamat_lokasi" name="talamat_lokasi">
              </td>
            </tr>
            <tr>
              <td>Petugas</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="tnama_petugas" name="tnama_petugas">
              </td>
            </tr>
            
            <tr>
              <td>Jml Petugas</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_petugas" name="tjml_petugas">
              </td>
            </tr>

            <tr>
              <td>Jml Pembina</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_pembina" name="tjml_pembina">
              </td>
            </tr>

          </table>
       <!--   </div> -->

		<button id="bts_add_obat" class="btn btn-success btn-sm alignRight_btn" onclick="add_data3()"><i class="glyphicon glyphicon-plus"></i> Add </button>

      <p></p>

       	<table id="table_det" class="table table-striped table-bordered" cellspacing="0">
              <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jns Kelamin</th>
                    <th>Alamat</th>
                    <th>Desa</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
              </tfoot>
        </table>

          <p></p>
          <button id="bts_post" class="btn btn-success btn-sm" onclick="save_imun2()"><i class="glyphicon glyphicon-check"></i> Simpan </button>    

        </div>
        <!-- akhir tab detail -->

                    </div>
                </div>
        </div>
    <!-- akhir menu tab -->

  <!-- modal obat -->
  <div class="modal fade" id="modal_form_detail" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog"  role="document">
  <div class="modal-content">
  <div class="modal-header bg-primary">
    <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Obat Gudang</h4>
  </div>
  
  <div class="modal-body">
    <form action="#" id="form_detail">

    <input type="hidden" name="tid_imun3" id="tid_imun3" >
    <input type="hidden" name="tkd_desa" id="tkd_desa" >

      <div class="form-group">
            <label for="tnama">Nama :</label>
            <input id="tnama" name="tnama" placeholder="Nama Pasien" class="form-control" type="text">
      </div>

      <div class="form-group">
          <label for="tjns_kelamin">Jns Kelamin :</label>
          <select name="tjns_kelamin" id="tjns_kelamin" class="form-control size_kecil">
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
      </div>

      <div class="form-group">
          <label for="ttgl_lahir">Tgl Lahir :</label>
          <input name="ttgl_lahir" id="ttgl_lahir" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
      </div>

      <div class="form-group">
          <label for="talamat">Alamat :</label>
          <input id="talamat" name="talamat" placeholder="Alamat" class="form-control" type="text">
      </div>

      <div class="form-group">
          <label for="tnama_desa">Desa :</label>
          <input id="tnama_desa" name="tnama_desa" placeholder="Desa" class="form-control" type="text">
      </div>

      <div class="form-group">
          <label for="tnama_kel">Kelurahan :</label>
          <input id="tnama_kel" name="tnama_kel" placeholder="Kelurahan" class="form-control" type="text" readonly="true">
      </div>

      <div class="form-group">
          <label for="tnama_kec">Kecamatan :</label>
          <input id="tnama_kec" name="tnama_kec" placeholder="Kecamatan" class="form-control" type="text" readonly="true">
      </div>

      <div class="form-group">
          <label for="tjns_pasien">Jenis Pasien :</label>
          <select name="tjns_pasien" id="tjns_pasien" class="form-control">
                  <option value="SISWA/SISWI">SISWA/SISWI</option>
                  <option value="ANAK">ANAK</option>
                  <option value="BAYI">BAYI</option>
                  <option value="BALITA">BALITA</option>
                  <option value="WUS TIDAK HAMIL">WUS TIDAK HAMIL</option>
                  <option value="WUS HAMIL">WUS HAMIL</option>
                  <option value="PASIEN BIASA">PASIEN BIASA</option>
                  <option value="CATEN">CATEN</option>
                </select>
       </div>

       <div class="form-group">
          <label for="tjns_imun_det1">Jns Imunisasi-1 :</label>
          <input id="tjns_imun_det1" name="tjns_imun_det1" placeholder="Jenis Imunisasi-1" class="form-control" type="text">
      </div>

      <div class="form-group">
          <label for="tjns_imun_det2">Jns Imunisasi-2 :</label>
          <input id="tjns_imun_det2" name="tjns_imun_det2" placeholder="Jenis Imunisasi-2" class="form-control" type="text">
      </div>

      <div class="form-group">
          <label for="tjns_imun_det3">Jns Imunisasi-3 :</label>
          <input id="tjns_imun_det3" name="tjns_imun_det3" placeholder="Jenis Imunisasi-3" class="form-control" type="text">
      </div>      

      <div class="form-group">
          <label for="tpem_fisik">Pemeriksaan Fisik :</label>
          <input id="tpem_fisik" name="tpem_fisik" placeholder="Pemeriksaan fisik" class="form-control" type="text">
      </div>      

    </form>
  </div>

  <div class="modal-footer bg-success">
    
      <button type="button" id="btnSave_detail" onclick="save_imun3()" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    
  </div>


  </div>
  </div>
  </div>

  <!-- akhir modal obat -->

</body>
</html>