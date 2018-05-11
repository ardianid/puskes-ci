<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Data Kelurahan</title>
    <link href="<?=base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/jquery-ui-1.10.4.min.css" type="text/css" media="all" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/bootstrap-datepicker.min.css" rel="stylesheet">

<style type="text/css">
  
  /* TR {font-size:12px};
  TD {font-size:12px}; 

  #table { font-size: 0.9em; } */

  .size_kecil {
    width: 150px;
  }

  .alignRight_btn { float: right; }

  #btaddpasien { font-size: 0.9em; }
  #btaddinap { font-size: 0.9em; }
  #modal_form { font-size: 0.9em; }

    div.container {
        width: 100%;
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

<div class="panel with-nav-tabs panel-primary">
  <div class="panel-heading">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_a" data-toggle="tab">Pendaftaran Rawat Jalan</a></li>
      <li><a href="#tab_b" data-toggle="tab">Pendaftaran Rawat Inap</a></li>
    </ul>
  </div>
<div class="panel-body">
<div class="tab-content">
        <div class="tab-pane active" id="tab_a" click="reload_table()">
        
      <div class="alert alert-warning">
        <table width="100%" border="0">
          <tr>
            <td width="7%" valign="middle">
              Tanggal
            </td>
            <td width="1%" valign="middle"> : </td>
            <td width="15%" valign="middle">
              <input type="text" id="ttanggal_sc1" name="ttanggal_sc1" placeholder="yyyy-mm-dd" class="form-control input-sm datepicker size_kecil" type="text" value="<?php echo date('Y-m-d'); ?>"> 
            </td>
            <td>
              <button id="bts_search" class="btn btn-success" onclick="btsearch_tr()"><i class="glyphicon glyphicon-search"></i> </button>            
            </td> 
            <td>
            <button id="btaddpasien" class="btn btn-success alignRight_btn" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add Pendaftaran</button>
          </td>
          </tr>
          
        </table>
      </div>
        
    			
    		
	    	<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	      	<thead>
		        <tr>
              <th style="width:20px;">Nomor</th>
		          <th style="width:55px;">Tanggal</th>
		          <th style="width:70px;">Poli</th>
		          <th style="width:70px;">Petugas</th>
		          <th>Nama Pasien</th>
		          <th>Alamat Pasien</th>
		          <th style="width:55px;">Action</th>
		        </tr>
	      	</thead>
	      	<tbody>
	      	</tbody>
	      	<tfoot>
	      	</tfoot>
	    	</table>
  		</div>
        
        <div class="tab-pane" id="tab_b" onclick="reload_table_inap()" >
          
          <div class="alert alert-warning">
        <table width="100%" border="0">
          <tr>
            <td width="7%" valign="middle">
              Tanggal
            </td>
            <td width="1%" valign="middle"> : </td>
            <td width="15%" valign="middle">
              <input type="text" id="ttanggal_sc2" name="ttanggal_sc2" placeholder="yyyy-mm-dd" class="form-control input-sm datepicker size_kecil" type="text" value="<?php echo date('Y-m-d'); ?>"> 
            </td>
            <td>
              <button id="bts_search2" class="btn btn-success" onclick="btsearch_tr_inap()"><i class="glyphicon glyphicon-search"></i> </button>            
            </td> 
            <td>
            <button id="btaddinap" class="btn btn-success alignRight_btn" onclick="add_person_inap()"><i class="glyphicon glyphicon-plus"></i> Add Pendaftaran</button>
          </td>
          </tr>
          
        </table>
      </div>

        <table id="table_inap" class="table table-striped table-bordered" cellspacing="0">
          <thead>
            <tr>
              <th style="width:20px;">Nomor</th>
              <th style="width:10px;">Tanggal</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Ruang</th>
              <th>Kamar</th>
              <th>N.Tdr</th>
              <th>Dokter</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
          </tfoot>
        </table>

        </div>
        
</div><!-- tab content -->
</div>
</div><!-- end of container -->

  <script type="text/javascript">
 
    var save_method; //for save method string
    var table;
    var table_inap;
    var kd_puskes_d = "<?php echo $kd_puskes; ?>";
    var umur_hr=0;
    var umur_bln=0;
    var umur_thn=0;

    $(document).ready(function() {

      /* nama pasien rawat jalan */
      $("#tnama").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "pasien_ctrl/lookup_pasien",  
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

                    $("#tkd_pasien").val( ui.item.id );
                    $("#tnama").val( ui.item.value );

                    var tgllahir= ui.item.desc2;
                    var umur = getAge(tgllahir,$('[name="ttanggal"]').val());
                    $('[name="tumur_pasien"]').val(umur);

                    $('[name="tumur_hr"]').val(umur_hr);
                    $('[name="tumur_bln"]').val(umur_bln);
                    $('[name="tumur_thn"]').val(umur_thn);

                     
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      }).data("autocomplete")._renderItem = function (ul, item) {
        return $("<li>")
            .data("item.autocomplete", item)
            .append('<a>' + item.value + '<br>' + '<small> <div class="text-lowercase">' +  item.desc +'</div> </small>'+ '</a>')
            .appendTo(ul);
    };

    /* nama pasien rawat inap */
    $("#tnama_inap").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "pasien_ctrl/lookup_pasien",  
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

                    $("#tkd_pasien_inap").val( ui.item.id );
                    $("#tnama_inap").val( ui.item.value );
                     
                    var tgllahir= ui.item.desc2;
                    var umur = getAge(tgllahir,$('[name="ttanggal_msk"]').val());
                    $('[name="tumur_pasien2"]').val(umur);

                    $('[name="tumur_hr2"]').val(umur_hr);
                    $('[name="tumur_bln2"]').val(umur_bln);
                    $('[name="tumur_thn2"]').val(umur_thn);


                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      }).data("autocomplete")._renderItem = function (ul, item) {
        return $("<li>")
            .data("item.autocomplete", item)
            .append('<a>' + item.value + '<br>' + '<small> <div class="text-lowercase">' +  item.desc +'</div> </small>'+ '</a>')
            .appendTo(ul);
    };


    /* kode pasien rawat jalan */
    $("#tkd_pasien").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "pasien_ctrl/lookup_pasien_bykode",  
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

                    $("#tnama").val( ui.item.desc );
                    $("#tkd_pasien").val( ui.item.id);
                    
                    var tgllahir= ui.item.desc2;
                    var umur = getAge(tgllahir,$('[name="ttanggal"]').val());
                    $('[name="tumur_pasien"]').val(umur);

                    $('[name="tumur_hr"]').val(umur_hr);
                    $('[name="tumur_bln"]').val(umur_bln);
                    $('[name="tumur_thn"]').val(umur_thn);


                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      }).data("autocomplete")._renderItem = function (ul, item) {
        return $("<li>")
            .data("item.autocomplete", item)
            .append('<a>' + item.value + '<br>' + '<small> <div class="text-capitalize">' +  item.desc +'</div> </small>'+ '</a>')
            .appendTo(ul);
    };


    /* kode pasien rawat inap */
    $("#tkd_pasien_inap").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "pasien_ctrl/lookup_pasien_bykode",  
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

                    $("#tnama_inap").val( ui.item.desc );
                    $("#tkd_pasien_inap").val( ui.item.id);
                  
                    var tgllahir= ui.item.desc2;
                    var umur = getAge(tgllahir,$('[name="ttanggal_msk"]').val());
                    $('[name="tumur_pasien2"]').val(umur);

                    $('[name="tumur_hr2"]').val(umur_hr);
                    $('[name="tumur_bln2"]').val(umur_bln);
                    $('[name="tumur_thn2"]').val(umur_thn);

                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      }).data("autocomplete")._renderItem = function (ul, item) {
        return $("<li>")
            .data("item.autocomplete", item)
            .append('<a>' + item.value + '<br>' + '<small> <div class="text-capitalize">' +  item.desc +'</div> </small>'+ '</a>')
            .appendTo(ul);
    };

    /* nama petugas rawat jalan */
    $("#tnama_petugas").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "daftar_ctrl/lookup_petugas",  
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
                    $("#tnama_petugas").val( ui.item.value);
                     
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      })

    /* nama petugas rawat inap */
    $("#tnama_petugas_inap").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "daftar_ctrl/lookup_petugas",  
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

                    $("#tkd_petugas_inap").val( ui.item.id );
                    $("#tnama_petugas_inap").val( ui.item.value);
                     
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      })


      /* table rawat jalan */
      table = $('#table').DataTable({
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('daftar_ctrl/ajax_list')?>",
            "type": "POST",
            "data": function(d) {
              d.tanggal= $('#ttanggal_sc1').val();
              d.kd_puskes = kd_puskes_d;
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
      });

      /* table rawat inap */
      table_inap = $('#table_inap').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('daftar_ctrl/ajax_list_inap')?>",
            "type": "POST",
            "data": function(d) {
              d.tanggal= $('#ttanggal_sc2').val();
              d.kd_puskes = kd_puskes_d;
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '20px', targets: 0 },
          { width: '20px', targets: 1 },
          { width: '100px', targets: 2 },
          { width: '250px', targets: 3 },
          { width: '75px', targets: 4},
          { width: '75px', targets: 5 },
          { width: '40px', targets: 6 },
          { width: '90px', targets: 7 },
          { width: '57px', targets: 8 },

        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
      });

      
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

      $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

    });
 
    /* add person rawat jalan */
    function add_person()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals

      $('[name="ttanggal"]').val($('[name="ttanggal_sc1"]').val());
      $('[name="tkd_puskes"]').val(kd_puskes_d);
      $('[name="ttanggal"]').prop("readonly", false);

      $('.form-group').removeClass('has-error'); // 
      $('.help-block').empty(); // clear error string
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Pendaftaran'); // Set Title to Bootstrap modal title
    }

    /* add person rawat inap */
    function add_person_inap()
    {
      save_method = 'add';
      $('#form_inap')[0].reset(); // reset form on modals

      $('[name="ttanggal_msk"]').val($('[name="ttanggal_sc2"]').val());
      $('[name="tkd_puskes_inap"]').val(kd_puskes_d);
      $('[name="ttanggal_msk"]').prop("readonly", false);

      $('.form-group').removeClass('has-error'); // 
      $('.help-block').empty(); // clear error string
      $('#modal_form_inap').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Pendaftaran'); // Set Title to Bootstrap modal title
    }

  
    /* edit rawat jalan */
    function edit_person(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string


      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('daftar_ctrl/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id_daftar);
            $('[name="tkd_pasien"]').val(data.kd_pasien);
            $('[name="tkd_petugas"]').val(data.kd_petugas);
            $('[name="ttanggal"]').val(data.tanggal_msk);
            $('[name="tnama_poli"]').val(data.nama_poli);
            $('[name="tnama_petugas"]').val(data.nama_petugas);
            $('[name="tnama"]').val(data.nama);
            $('[name="tbukti1"]').val(data.nobukti_d);
            $('[name="tkd_puskes"]').val(data.kd_puskes);
            $('[name="tumur_pasien"]').val(data.umur_pasien);

            $('[name="tumur_hr"]').val(data.umur_hr);
            $('[name="tumur_bln"]').val(data.umur_bln);
            $('[name="tumur_thn"]').val(data.umur_thn);

            $('[name="ttanggal"]').prop("readonly", true);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Pendaftaran'); // Set title to Bootstrap modal title


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
 

     /* edit rawat inap */
    function edit_person_inap(id)
    {
      save_method = 'update';
      $('#form_inap')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('daftar_ctrl/ajax_edit_inap/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_inap"]').val(data.id_inap);
            $('[name="tkd_pasien_inap"]').val(data.kd_pasien);
            $('[name="tkd_petugas_inap"]').val(data.kd_petugas);
            $('[name="ttanggal_msk"]').val(data.tanggal_msk);
            $('[name="tnama_petugas_inap"]').val(data.nama_petugas);
            $('[name="tnama_inap"]').val(data.nama);
            $('[name="tnama_ruang"]').val(data.nama_ruang);
            $('[name="tnama_kelas"]').val(data.nama_kelas);
            $('[name="tnama_kamar"]').val(data.nama_kamar);
            $('[name="tno_tidur"]').val(data.no_tidur);
            $('[name="tbukti2"]').val(data.nobukti_d);
            $('[name="tkd_puskes_inap"]').val(data.kd_puskes);
            $('[name="tumur_pasien2"]').val(data.umur_pasien);

            $('[name="tumur_hr2"]').val(data.umur_hr);
            $('[name="tumur_bln2"]').val(data.umur_bln);
            $('[name="tumur_thn2"]').val(data.umur_thn);

            $('[name="ttanggal_msk"]').prop("readonly", true);

            $('#modal_form_inap').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Pendaftaran'); // Set title to Bootstrap modal title


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }


    /* reload table rawat jalan */
    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax
    }

    /* reload table rawat inap */
    function reload_table_inap()
    {
      table_inap.ajax.reload(null,false); //reload datatable ajax
    }

 
 // cek notransaksi akhir
  function cek_nobukti_akhir(tanggal_s,jenis_daftar){

    var ttanggal = tanggal_s;
    var d = new Date(String(ttanggal));
    var m = d.getMonth()+1;
    var d1 = d.getDate();
    var y = d.getFullYear();
    var yx = String(y);
      yx = yx.substr(2,2);
    var mx='';
    var dx=String(d1);

    if (jenis_daftar=='INAP') {
      sjenis= 'I';
    }else{
      sjenis="J";
    }

    if (String(m).length==1) {
      mx = mx.concat('0',m);
    }

    if (String(dx).length==1) {
      dx = dx.concat('0',dx);
    }


    var noawal = '' ;
        noawal = noawal.concat('TR',sjenis,'-',yx,mx,dx);

    var hasil='';

  //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('daftar_ctrl/get_by_nobukti_akhir')?>",
        type: "GET",
        data: {
            "noawal": noawal,
            "kd_puskes": kd_puskes_d,
        },
        dataType: "JSON",
        async: false,
        success: function(data)
        {

           hasil = data.nobukti_d;

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
           // alert('Error get data from ajax');
           hasil = 'err';
        }
      });

      if (hasil==null || hasil=='' ) {
        hasil = '';
        hasil = hasil.concat(noawal,'0000');
      }

      return hasil;

  } 
// akhir cek notransaksi akhir

// hitung umur

function getAge(dateString_lahir,datestring_sekarang) {
  var now = new Date(datestring_sekarang);
  var today = new Date(now.getYear(),now.getMonth(),now.getDate());

  var yearNow = now.getYear();
  var monthNow = now.getMonth();
  var dateNow = now.getDate();

  var dob = new Date(dateString_lahir);

  var yearDob = dob.getYear();
  var monthDob = dob.getMonth();
  var dateDob = dob.getDate();
  var age = {};
  var ageString = "";
  var yearString = "";
  var monthString = "";
  var dayString = "";

  umur_thn=0;
  umur_bln=0;
  umur_hr=0;

  yearAge = yearNow - yearDob;

  if (monthNow >= monthDob)
    var monthAge = monthNow - monthDob;
  else {
    yearAge--;
    var monthAge = 12 + monthNow -monthDob;
  }

  if (dateNow >= dateDob)
    var dateAge = dateNow - dateDob;
  else {
    monthAge--;
    var dateAge = 31 + dateNow - dateDob;

    if (monthAge < 0) {
      monthAge = 11;
      yearAge--;
    }
  }

  age = {
      years: yearAge,
      months: monthAge,
      days: dateAge
      };

  if ( age.years > 1 ) yearString = " Thn";
  else yearString = " Thn";
  if ( age.months> 1 ) monthString = " Bln";
  else monthString = " Bln";
  if ( age.days > 1 ) dayString = " Hr";
  else dayString = " Hr";


  if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
  {
    ageString = age.years + yearString + ", " + age.months + monthString;

    umur_thn = age.years;
    umur_bln=0;
    umur_hr=0;
  }
  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
  {
    ageString = age.days + dayString;

    umur_thn=0;
    umur_bln=0;
    umur_hr=age.days;
  }
  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
  {
    ageString = age.years + yearString ;
  
    umur_thn = age.years;
    umur_bln=0;
    umur_hr=0;  
  }
  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
  {
    ageString = age.years + yearString + " and " + age.months + monthString;

    umur_thn = age.years;
    umur_bln=0;
    umur_hr=0;
  }
  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
  {
    ageString = age.months + monthString;

    umur_thn = 0;
    umur_bln= age.months;
    umur_hr=0;
  }
  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
  {
    ageString = age.years + yearString;

    umur_thn = age.years;
    umur_bln=0;
    umur_hr=0;
  }
  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
  {
    ageString = age.months + monthString;

    umur_thn = 0;
    umur_bln= age.months;
    umur_hr=0;
  }
  else { ageString = "Tidak bisa menghitung umur"; }

  return ageString

}

// akhir hitung umur

    /* save rawat jalan */
    function save()
    {


      $('#btnSave').text('saving...'); //change button text
      $('#btnSave').attr('disabled',true); //set button disable

      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('daftar_ctrl/ajax_add')?>";

          var x = cek_nobukti_akhir($('[name="ttanggal"]').val(),'NOT INAP');
          if (x==null) { x=''; }

          if (x=='err'){
            alert('error get max bukti');

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

            return;
          }


          var noakhir = '';
          var noawal = x.substr(0,10);


          if (x==''){
          noakhir=1;
          }else{
          noakhir= Number(x.substr(10,4)) +1;
          }


          var noakhir2='';

          if (String(noakhir).length==1 ){
            noakhir2 = noakhir2.concat('000',noakhir);
          }else if (String(noakhir).length==2){
            noakhir2 = noakhir2.concat('00',noakhir);
          }else if (String(noakhir).length==3){
            noakhir2 = noakhir2.concat('0',noakhir);
          }

          var buktisekarang = '';
            buktisekarang=buktisekarang.concat(noawal,noakhir2,"/",kd_puskes_d);

          $('[name="tbukti1"]').val(buktisekarang);

      }
      else
      {
        url = "<?php echo site_url('daftar_ctrl/ajax_update')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  $('#modal_form').modal('hide');
                  reload_table();

              }
                else
              {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
              }
              $('#btnSave').text('save'); //change button text
              $('#btnSave').attr('disabled',false); //set button enable
 
 
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable
            }
        });
    }
 
    
    /* save rawat inap */
    function save_inap()
    {


      $('#btnSave_inap').text('saving...'); //change button text
      $('#btnSave_inap').attr('disabled',true); //set button disable

      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('daftar_ctrl/ajax_add_inap')?>";

          var x = cek_nobukti_akhir($('[name="ttanggal_msk"]').val(),'INAP');
          if (x==null) { x=''; }

          if (x=='err'){
            alert('error get max bukti');

            $('#btnSave_inap').text('save'); //change button text
            $('#btnSave_inap').attr('disabled',false); //set button enable

            return;
          }


          var noakhir = '';
          var noawal = x.substr(0,10);


          if (x==''){
          noakhir=1;
          }else{
          noakhir= Number(x.substr(10,4)) +1;
          }


          var noakhir2='';

          if (String(noakhir).length==1 ){
            noakhir2 = noakhir2.concat('000',noakhir);
          }else if (String(noakhir).length==2){
            noakhir2 = noakhir2.concat('00',noakhir);
          }else if (String(noakhir).length==3){
            noakhir2 = noakhir2.concat('0',noakhir);
          }

          var buktisekarang = '';
            buktisekarang=buktisekarang.concat(noawal,noakhir2,"/",kd_puskes_d);

          $('[name="tbukti2"]').val(buktisekarang);

      }
      else
      {
        url = "<?php echo site_url('daftar_ctrl/ajax_update_inap')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form_inap').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  $('#modal_form_inap').modal('hide');
                  reload_table_inap();

              }
                else
              {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
              }
              $('#btnSave_inap').text('save'); //change button text
              $('#btnSave_inap').attr('disabled',false); //set button enable
 
 
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave_inap').text('save'); //change button text
                $('#btnSave_inap').attr('disabled',false); //set button enable
            }
        });
    }


    /* delete rawat jalan */
    function delete_person(id)
    {
      if(confirm('Yakin akan dihapus?'))
      {

        $.ajax({
        url : "<?php echo site_url('daftar_ctrl/ajax_daftar_bynobukti/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

          var jenis_tindakan = data.jenis_tindakan;
          var jenis_obat = data.jenis_obat;
          var totbayar = data.totbayar;

          if (jenis_tindakan==1 || jenis_obat==1 || totbayar > 0){
            alert("Tidak bisa dihapus karna sudah dipakai transaksi lainnya");
          }else{

              // ajax delete data to database
              $.ajax({
              url : "<?php echo site_url('daftar_ctrl/ajax_delete')?>/"+id,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              { 
                 //if success reload ajax table
                 $('#modal_form').modal('hide');
                 reload_table();
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
            alert('Error get data from ajax (0)');
        }
        });
 
      }
    }


    /* delete rawat inap */
    function delete_person_inap(id)
    {

      if(confirm('Yakin akan dihapus?'))
      {

        $.ajax({
        url : "<?php echo site_url('daftar_ctrl/ajax_daftar_bynobukti/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

          var jenis_tindakan = data.jenis_tindakan;
          var jenis_obat = data.jenis_obat;
          var totbayar = data.totbayar;

          if (jenis_tindakan==1 || jenis_obat==1 || totbayar > 0){
            alert("Tidak bisa dihapus karna sudah dipakai transaksi lainnya");
          }else{

              // ajax delete data to database
              $.ajax({
                url : "<?php echo site_url('daftar_ctrl/ajax_delete_inap')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                { 
                   //if success reload ajax table
                   $('#modal_form_inap').modal('hide');
                   reload_table_inap();
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
            alert('Error get data from ajax (0)');
        }
        });

 
      }
    }

    function btsearch_tr(){
      reload_table();
    }

    function btsearch_tr_inap(){
      reload_table_inap();
    }

  </script>

  <!-- Bootstrap modal rawat jalan -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Pendaftaran</h4>
      </div>
      <div class="modal-body form bg-warning">
        <form action="#" id="form">

          <input type="hidden" value="" name="id"/>
          <input type="hidden" value="" id="tkd_petugas" name="tkd_petugas"/>
          <input type="hidden" value="" id="tkd_puskes" name="tkd_puskes"/>

          <div class="form-body">

            <table width="100%" border="0">

              <tr>
                <td width="98">
                  <div class="form-group">
                    <label class="control-label">No Bukti </label>
                  </div>
                </td>
                <td width="10" valign="top">:</td>
                <td colspan="5">
                  <div class="form-group">
                    <input name="tbukti1" id="tbukti1" class="form-control" type="text" readonly="true" >
                    <span class="help-block"></span>
                  </div>
                </td>
              </tr>

              <tr>
                <td width="98">
                  <div class="form-group">
                    <label class="control-label">Tgl Daftar </label>
                  </div>
                </td>
                <td width="10" valign="top">:</td>
                <td colspan="5">
                  <div class="form-group">
                    <input name="ttanggal" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" value="<?php echo date('Y-m-d'); ?>" >
                    <span class="help-block"></span>
                  </div>
                </td>
              </tr>
              
              <tr>
                <td>
                  <div class="form-group">
                    <label class="control-label">Pasien</label>
                  </div>
                </td>
                <td width="10" valign="top">:</td>
                <td width="85">
                  <div class="form-group">
                    <input type="text" class="form-control input-sm" name="tkd_pasien" id="tkd_pasien"/>
                    <span class="help-block"></span>
                  </div>
                </td>
                <td width="5"></td>
                <td>
                  <div class="form-group">
                    <input type="text" class="form-control input-sm" name="tnama" id="tnama" size="100%"/>
                    <span class="help-block"></span>
                  </div>
                </td>
                <td width="5"></td>
                <td>
                 <!-- <div class="form-group">
                    <button class="btn btn-sm btn-info" id="btnCari"><span class="glyphicon glyphicon-search"></span></button>
                    <span class="help-block"></span>
                  </div> -->
                </td>
              </tr>

              <tr>
                <td><label class="control-label">Umur</label></td>
                <td valign="top">:</td>
                <td colspan="5">
                  <div class="form-group">
                    <input type="text" class="form-control input-sm" name="tumur_pasien" id="tumur_pasien" readonly="true"/>
                    <input type="hidden" name="tumur_hr" id="tumur_hr"/>
                    <input type="hidden" name="tumur_bln" id="tumur_bln"/>
                    <input type="hidden" name="tumur_thn" id="tumur_thn"/>
                    <span class="help-block"></span>
                  </div>
                </td>
              </tr>

              <tr>
                <td><label class="control-label">Poli</label></td>
                <td valign="top">:</td>
                <td colspan="5" >
                  <div class="form-group">
                    <select name="tnama_poli" id="tnama_poli" class="form-control input-sm">
                      <?php foreach($qpoli as $rowprov){?>
                        <option value="<?=$rowprov->nama_poli?>"><?=$rowprov->nama_poli?></option>
                      <?php }?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </td>
              </tr>

              <tr>
                <td><label class="control-label">Dokter</label></td>
                <td valign="top">:</td>
                <td colspan="5">
                  <div class="form-group">
                    <input type="text" class="form-control input-sm" name="tnama_petugas" id="tnama_petugas"/>
                    <span class="help-block"></span>
                  </div>
                </td>
              </tr>

            </table>
            
          </div>
        </form>
          </div>
          <div class="modal-footer bg-success">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->


  <!-- Bootstrap modal rawat inap -->
  <div class="modal fade" id="modal_form_inap" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Pendaftaran</h4>
      </div>
      <div class="modal-body form ">
        <form action="#" id="form_inap">

          <input type="hidden" value="" name="id_inap"/>
          <input type="hidden" value="" id="tkd_petugas_inap" name="tkd_petugas_inap"/>
          <input type="hidden" value="" id="tkd_puskes_inap" name="tkd_puskes_inap"/>

          <div class="form-body">

            <table width="100%" border="0">

              <tr>
                <td width="115">
                  <div class="form-group">
                    <label class="control-label"> No Bukti </label>
                  </div>
                </td>
                <td width="10" valign="top" >:</td>
                <td colspan="5">
                  <div class="form-group">
                    <input name="tbukti2" id="tbukti2" class="form-control" type="text" readonly="true" >
                    <span class="help-block"></span>
                  </div>
                </td>
              </tr>

              <tr>
                <td width="115">
                  <div class="form-group">
                    <label class="control-label"> Tanggal Msk </label>
                  </div>
                </td>
                <td width="10" valign="top" >:</td>
                <td colspan="5">
                  <div class="form-group">
                    <input name="ttanggal_msk" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" value="<?php echo date('Y-m-d'); ?>" >
                    <span class="help-block"></span>
                  </div>
                </td>
              </tr>
              
              <tr>
                <td>
                  <div class="form-group">
                    <label class="control-label">Pasien</label>
                  </div>
                </td>
                <td width="10" valign="top">:</td>
                <td width="85">
                  <div class="form-group">
                    <input type="text" class="form-control input-sm" name="tkd_pasien_inap" id="tkd_pasien_inap"/>
                    <span class="help-block"></span>
                  </div>
                </td>
                <td width="5"></td>
                <td>
                  <div class="form-group">
                    <input type="text" class="form-control input-sm" name="tnama_inap" id="tnama_inap" size="100%"/>
                    <span class="help-block"></span>
                  </div>
                </td>
                <td width="5"></td>
                <td>
                 <!-- <div class="form-group">
                    <button class="btn btn-sm btn-info" id="btnCari"><span class="glyphicon glyphicon-search"></span></button>
                    <span class="help-block"></span>
                  </div> -->
                </td>
              </tr>

              <tr>
                <td width="115">
                  <div class="form-group">
                    <label class="control-label"> Umur </label>
                  </div>
                </td>
                <td width="10" valign="top" >:</td>
                <td colspan="5">
                  <div class="form-group">
                    <input type="text" class="form-control input-sm" name="tumur_pasien2" id="tumur_pasien2" readonly="true"/>
                    <input type="hidden" name="tumur_hr2" id="tumur_hr2"/>
                    <input type="hidden" name="tumur_bln2" id="tumur_bln2"/>
                    <input type="hidden" name="tumur_thn2" id="tumur_thn2"/>
                    <span class="help-block"></span>
                  </div>
                </td>
              </tr>

              <tr>
                <td><label class="control-label">Ruangan</label></td>
                <td valign="top">:</td>
                <td colspan="5" >
                  <div class="form-group">
                    <select name="tnama_ruang" id="tnama_ruang" class="form-control input-sm">
                      <?php foreach($qruangan as $ruangan_row){?>
                        <option value="<?=$ruangan_row->nama_ruang?>"><?=$ruangan_row->nama_ruang?></option>
                      <?php }?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </td>
              </tr>

              <tr>
                <td><label class="control-label">Kelas</label></td>
                <td valign="top">:</td>
                <td colspan="5" >
                  <div class="form-group">
                    <select name="tnama_kelas" id="tnama_kelas" class="form-control input-sm">
                      <option value="I">I</option>
                      <option value="II">II</option>
                      <option value="III">III</option>
                      <option value="VIP">VIP</option>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </td>
              </tr>

              <tr>
                <td><label class="control-label">Kamar</label></td>
                <td valign="top">:</td>
                <td colspan="5" >
                  <div class="form-group">
                    <select name="tnama_kamar" id="tnama_kamar" class="form-control input-sm">
                      <?php foreach($qkamar as $kamar_row){?>
                        <option value="<?=$kamar_row->nama_kamar?>"><?=$kamar_row->nama_kamar?></option>
                      <?php }?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </td>
              </tr>

              <tr>
                <td><label class="control-label">No Tempat Tdr</label></td>
                <td valign="top">:</td>
                <td colspan="5" >
                  <div class="form-group">
                    <input tipe="text" name="tno_tidur" id="tno_tidur" class="form-control input-sm">
                    <span class="help-block"></span>
                  </div>
                </td>
              </tr>

              <tr>
                <td><label class="control-label">Dokter</label></td>
                <td valign="top">:</td>
                <td colspan="5">
                  <div class="form-group">
                    <input type="text" class="form-control input-sm" name="tnama_petugas_inap" id="tnama_petugas_inap"/>
                    <span class="help-block"></span>
                  </div>
                </td>
                </tr>

            </table>
            
          </div>
        </form>
          </div>
          <div class="modal-footer bg-success">
            <button type="button" id="btnSave_inap" onclick="save_inap()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->


 </body>
 </html>