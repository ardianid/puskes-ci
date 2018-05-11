<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Pelayanan</title>
    <link href="<?=base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/jquery-ui-1.10.4.min.css" type="text/css" media="all" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/bootstrap-datepicker.min.css" rel="stylesheet">


<style type="text/css">


 table .table_atas {
    border-collapse: collapse;
}

.table_atas table, td, th {
    border: 7px solid white;
} 

.alignRight { text-align: center; }

.size_kecil {
    width: 150px;
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

  var scari2="all";
  var kd_puskes_d = "<?php echo $kd_puskes; ?>";

$(document).ready(function() {


  $('#bts_diagnosa').attr('disabled',true);
  $('#bts_tindakan').attr('disabled',true);
  $('#bts_obat').attr('disabled',true);
  $('#bts_lab').attr('disabled',true);
  $('#bts_radio').attr('disabled',true);
  $('#bts_poli').attr('disabled',true);
  $('#bts_alergi').attr('disabled',true);


  table_pencarian = $('#table_cari').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "bFilter": false,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('pelayanan_ctrl/ajax_list_pencarian')?>",
            "type": "POST",
            "data": function(d) {
              d.nama_poli= $('#tnama_poli_cari').val();
              d.tanggal= $('#ttanggal_cari').val();
              d.status= $('#tstatus_cari').val();
              d.jenis_pelayanan= $('#tjenis_cari').val();
              d.scari= scari2;
              d.kd_puskes = kd_puskes_d;
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '20px', targets: 0,"orderable": false },
          { width: '150px', targets: 1,"orderable": false },
          { width: '50px', targets: 2,"orderable": false },
          { width: '150px', targets: 3,"orderable": false },
          { width: '100px', targets: 4,"orderable": false },
          { width: '75px', targets: 5,"orderable": false },
          { width: '10px', targets: 6,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
      });


// diagnosa pasien

    table_diagnosa = $('#table_diagnosa').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "paging":   false,
        "info": false,
        "searching": false,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('pelayanan_ctrl/ajax_list_diagnosa')?>",
            "type": "POST",
            "data": function(d) {
              d.id_daftar= $('#tid_daftar').val() ;
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '300px', targets: 0,"orderable": false },
          { width: '20px', targets: 1,"orderable": false },
          { width: '10px', targets: 2,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
      });
  
    $("#tnama_diagnosa").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "pelayanan_ctrl/lookup_diagnosa",  
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
                    $("#tkd_diagnosa_tr").val( ui.item.id );                  
                    $("#tnama_diagnosa").val( ui.item.value );
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      });

// akhir diagnosa pasien


// tindakan pasien

    table_tindakan = $('#table_tindakan').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "paging":   false,
        "info": false,
        "searching": false,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('pelayanan_ctrl/ajax_list_tindakan')?>",
            "type": "POST",
            "data": function(d) {
              d.id_daftar= $('#tid_daftar').val() ;
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '200px', targets: 0,"orderable": false },
          { width: '10px', targets: 1,"orderable": false },
          { width: '10px', targets: 2,"orderable": false },
          { width: '10px', targets: 3,"orderable": false },
          { width: '100px', targets: 4,"orderable": false },
          { width: '10px', targets: 5,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
      });
  
    $("#tnama_tindakan").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "pelayanan_ctrl/lookup_tindakan",  
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
                    $("#tnama_tindakan").val( ui.item.value );
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      }); 

// akhir tindakan pasien

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
            "url": "<?php echo site_url('pelayanan_ctrl/ajax_list_obat')?>",
            "type": "POST",
            "data": function(d) {
              d.id_daftar= $('#tid_daftar').val() ;
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '15px', targets: 0,"orderable": false },
          { width: '200px', targets: 1,"orderable": false },
          { width: '10px', targets: 2,"orderable": false },
          { width: '10px', targets: 3,"orderable": false },
          { width: '10px', targets: 4,"orderable": false },
          { width: '20px', targets: 5,"orderable": false },
          { width: '20px', targets: 6,"orderable": false },
          { width: '10px', targets: 7,sClass: "alignRight","orderable": false },
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
                        url: "pelayanan_ctrl/lookup_obat",
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
                        url: "pelayanan_ctrl/lookup_obat_kode",
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


// lab

    table_lab = $('#table_lab').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "paging":   false,
        "info": false,
        "searching": false,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('pelayanan_ctrl/ajax_list_lab')?>",
            "type": "POST",
            "data": function(d) {
              d.id_daftar= $('#tid_daftar').val() ;
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '400px', targets: 0,"orderable": false },
          { width: '10px', targets: 1,"orderable": false },
          { width: '10px', targets: 2,"orderable": false },
          { width: '10px', targets: 3,"orderable": false },
          { width: '10px', targets: 4,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
      });
  
    $("#tnama_lab").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "pelayanan_ctrl/lookup_lab",  
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
                    $("#tnama_lab").val( ui.item.value );
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      }); 

// akhir lab


// radiologi

    table_radio = $('#table_radio').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "paging":   false,
        "info": false,
        "searching": false,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('pelayanan_ctrl/ajax_list_radio')?>",
            "type": "POST",
            "data": function(d) {
              d.id_daftar= $('#tid_daftar').val() ;
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '400px', targets: 0,"orderable": false },
          { width: '10px', targets: 1,"orderable": false },
          { width: '10px', targets: 2,"orderable": false },
          { width: '10px', targets: 3,"orderable": false },
          { width: '10px', targets: 4,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
      });
  
    $("#tnama_radio").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "pelayanan_ctrl/lookup_radio",  
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
                    $("#tnama_radio").val( ui.item.value );
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      }); 

// akhir radio

// poli lain

    table_poli = $('#table_poli').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "paging":   false,
        "info": false,
        "searching": false,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('pelayanan_ctrl/ajax_list_poli')?>",
            "type": "POST",
            "data": function(d) {
              d.id_daftar= $('#tid_daftar').val() ;
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '200px', targets: 0,"orderable": false },
          { width: '200px', targets: 1,"orderable": false },
          { width: '10px', targets: 2,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
      });

// akhir poli lain

// alergi

   table_alergi = $('#table_alergi').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "paging":   false,
        "info": false,
        "searching": false,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('pelayanan_ctrl/ajax_list_alergi')?>",
            "type": "POST",
            "data": function(d) {
              d.kd_pasien= $('#tkd_pasien').val() ;
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '150px', targets: 0,"orderable": false },
          { width: '150px', targets: 1,"orderable": false },
          { width: '10px', targets: 2,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
      });
  
    $("#tnama_alergi").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "pelayanan_ctrl/lookup_obat",
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
                    $("#tnama_alergi").val( ui.item.value );
                    $("#tkode_alergi").val( ui.item.id );
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      }); 

    $("#tkode_alergi").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "pelayanan_ctrl/lookup_obat_kode",
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
                    $("#tkode_alergi").val( ui.item.value );
                    $("#tnama_alergi").val( ui.item.id );
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      }); 

// akhir alergi

// lost focus update daftar

  $('#tjenis_pasien').blur(function() {
    
    $iddaftar = $("#tid_daftar").val();

        if ($iddaftar != "" ) {
          update_daftar();
        }

  });

  $('#tcara_bayar').blur(function() {
    
    $iddaftar = $("#tid_daftar").val();

        if ($iddaftar != "" ) {
          update_daftar();
        }

  });

  $('#tanamnesa').blur(function() {
    
    $iddaftar = $("#tid_daftar").val();

        if ($iddaftar != "" ) {
          update_daftar();
        }

  });


  $('#tketerangan').blur(function() {
    
    $iddaftar = $("#tid_daftar").val();

        if ($iddaftar != "" ) {
          update_daftar();
        }

  });

// akhir lost focus update daftar

});


// update daftar

function update_daftar(){

      var url;
      url = "<?php echo site_url('pelayanan_ctrl/update_daftar')?>";
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "jenis_pasien": $("#tjenis_pasien").val(),
              "cara_bayar": $("#tcara_bayar").val(),
              "anamnesa": $("#tanamnesa").val(),
              "keterangan": $("#tketerangan").val(),
              "id_daftar": $iddaftar,
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

 function btsearch_pasien()
    {
      $('#form_pencarian')[0].reset(); // reset form on modals
      $('#modal_pencarian').modal('show'); // show bootstrap modal
      $('.modal-title').text('Search Pendaftaran'); // Set Title to Bootstrap modal title

    } 

 function cari_daftar(){
 
    scari2 = 'kriteria';
    table_pencarian.ajax.reload(null,false);

 }

 function pilih_data(id){

    $.ajax({
       
        url : "<?php echo site_url('pelayanan_ctrl/ajax_get_by_id_pencarian')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          
            $('[name="tid_daftar"]').val(data.id_daftar);
            $('[name="tkd_pasien"]').val(data.kd_pasien);
            $('[name="ttgl_pelayanan"]').val(data.tanggal_msk);
            $('[name="tpoli"]').val(data.nama_poli);
            $('[name="tjenis_pasien"]').val(data.jenis_jamkes);
            $('[name="tcara_bayar"]').val(data.cara_bayar);

           // $("#nn_nobukti").html("<i>"+ data.nobukti_d +"</b>");
            $("#nn_pasien").html("<strong> <i>" + data.nobukti_d + "</i> </strong>" + ' | ' +data.nama +" <small><strong>"+ data.alamat +"</strong></small>" );

            $('#modal_pencarian').modal('hide');

            $('#bts_diagnosa').attr('disabled',false);
            $('#bts_tindakan').attr('disabled',false);
            $('#bts_obat').attr('disabled',false);
            $('#bts_lab').attr('disabled',false);
            $('#bts_radio').attr('disabled',false);
            $('#bts_poli').attr('disabled',false);
            $('#bts_alergi').attr('disabled',false);

            reload_table_diagnosa();
            reload_table_tindakan();
            reload_table_obat();
            reload_table_lab();
            reload_table_radio();
            reload_table_poli(); 
            reload_table_alergi(); 
        
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        } 
    });  
 }


// Diagnosa

function btadd_diagnosa(){
  // $('#form_diagnosa')[0].reset(); // reset form on modals
   $('#modal_diagnosa').modal('show'); // show bootstrap modal
   $('.modal-title').text('Diagnosa Pasien'); // Set Title to Bootstrap modal title
}

function reload_table_diagnosa()
{
  table_diagnosa.ajax.reload(null,false); //reload datatable ajax
}

function save_diagnosa(){

    $('#btnSave_diagnosa').text('saving...'); //change button text
    $('#btnSave_diagnosa').attr('disabled',true); //set button disable

      var url;
      url = "<?php echo site_url('pelayanan_ctrl/ajax_add_diagnosa')?>";
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "kd_penyakit_tr": $("#tkd_diagnosa_tr").val(),
              "jenis_diagnosa": $("#tjenis_diagnosa").val(),
              "id_daftar": $("#tid_daftar").val()
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  $('#form_diagnosa')[0].reset();
                  reload_table_diagnosa();
                  $('#tnama_diagnosa').focus();

              }
                else
              {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
              }
              $('#btnSave_diagnosa').text('save'); //change button text
              $('#btnSave_diagnosa').attr('disabled',false); //set button enable
 
 
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave_diagnosa').text('save'); //change button text
                $('#btnSave_diagnosa').attr('disabled',false); //set button enable
            }
        });
}

function delete_diagnosa(id){
  if(confirm('Yakin akan dihapus?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('pelayanan_ctrl/ajax_delete_diagnosa')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_diagnosa').modal('hide');
               reload_table_diagnosa();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error delete data');
            }
        });
 
      }
}

// akhir diagnosa


// tindakan

function btadd_tindakan(){
  // $('#form_diagnosa')[0].reset(); // reset form on modals
   $('#modal_tindakan').modal('show'); // show bootstrap modal
   $('.modal-title').text('Tindakan Pasien'); // Set Title to Bootstrap modal title
}

function reload_table_tindakan()
{
  table_tindakan.ajax.reload(null,false); //reload datatable ajax
}

function save_tindakan(){

    $('#btnSave_tindakan').text('saving...'); //change button text
    $('#btnSave_tindakan').attr('disabled',true); //set button disable

      var url;
      url = "<?php echo site_url('pelayanan_ctrl/ajax_add_tindakan')?>";
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "nama_tindakan": $("#tnama_tindakan").val(),
              "jumlah": $("#tjml_tindakan").val(),
              "harga": $("#tharga_tindakan").val(),
              "keterangan": $("#tket_tindakan").val(),
              "id_daftar": $("#tid_daftar").val()
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  $('#form_tindakan')[0].reset();
                  reload_table_tindakan();
                  $('#tnama_tindakan').focus();

              }
                else
              {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
              }
              $('#btnSave_tindakan').text('save'); //change button text
              $('#btnSave_tindakan').attr('disabled',false); //set button enable
 
 
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave_tindakan').text('save'); //change button text
                $('#btnSave_tindakan').attr('disabled',false); //set button enable
            }
        });
}

function delete_tindakan(id){
  if(confirm('Yakin akan dihapus?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('pelayanan_ctrl/ajax_delete_tindakan')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_tindakan').modal('hide');
               reload_table_tindakan();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error delete data');
            }
        });
 
      }
}

// akhir tindakan

// obat

function btadd_obat(){
  // $('#form_diagnosa')[0].reset(); // reset form on modals
   $('#modal_obat').modal('show'); // show bootstrap modal
   $('.modal-title').text('Obat Pasien'); // Set Title to Bootstrap modal title
}

function reload_table_obat()
{
  table_obat.ajax.reload(null,false); //reload datatable ajax
}

function save_obat(){

    $('#btnSave_obat').text('saving...'); //change button text
    $('#btnSave_obat').attr('disabled',true); //set button disable

      var url;
      url = "<?php echo site_url('pelayanan_ctrl/ajax_add_obat')?>";
      
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
              "id_daftar": $("#tid_daftar").val()
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  $('#form_obat')[0].reset();
                  reload_table_obat();
                  $('#tnama_obat').focus();

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
}

function delete_obat(id){

  if(confirm('Yakin akan dihapus?'))
      {

        $.ajax({
        url : "<?php echo site_url('pelayanan_ctrl/ajax_daftar_bynobukti_obat/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

          var spost = data.spost;


         if (spost == 1) {
            alert("Obat sudah dikeluarkan apotik (Tidak dapat dihapus)");
          }else{

            // ajax delete data to database
            $.ajax({
            url : "<?php echo site_url('pelayanan_ctrl/ajax_delete_obat')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_obat').modal('hide');
               reload_table_obat();
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

// akhir obat


// lab

function btadd_lab(){
  // $('#form_diagnosa')[0].reset(); // reset form on modals
   $('#modal_lab').modal('show'); // show bootstrap modal
   $('.modal-title').text('Laboratorium'); // Set Title to Bootstrap modal title
}

function reload_table_lab()
{
  table_lab.ajax.reload(null,false); //reload datatable ajax
}

function save_lab(){

    $('#btnSave_lab').text('saving...'); //change button text
    $('#btnSave_lab').attr('disabled',true); //set button disable

      var url;
      url = "<?php echo site_url('pelayanan_ctrl/ajax_add_lab')?>";
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "nama_lab": $("#tnama_lab").val(),
              "qty": $("#tjml_lab").val(),
              "harga": $("#tharga_lab").val(),
              "id_daftar": $("#tid_daftar").val()
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  $('#form_lab')[0].reset();
                  reload_table_lab();
                  $('#tnama_lab').focus();

              }
                else
              {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
              }
              $('#btnSave_lab').text('save'); //change button text
              $('#btnSave_lab').attr('disabled',false); //set button enable
 
 
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave_lab').text('save'); //change button text
                $('#btnSave_lab').attr('disabled',false); //set button enable
            }
        });
}

function delete_lab(id){
  if(confirm('Yakin akan dihapus?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('pelayanan_ctrl/ajax_delete_lab')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_lab').modal('hide');
               reload_table_lab();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error delete data');
            }
        });
 
      }
}

// akhir lab


// radiologi

function btadd_radio(){
  // $('#form_diagnosa')[0].reset(); // reset form on modals
   $('#modal_radio').modal('show'); // show bootstrap modal
   $('.modal-title').text('Radiologi'); // Set Title to Bootstrap modal title
}

function reload_table_radio()
{
  table_radio.ajax.reload(null,false); //reload datatable ajax
}

function save_radio(){

    $('#btnSave_radio').text('saving...'); //change button text
    $('#btnSave_radio').attr('disabled',true); //set button disable

      var url;
      url = "<?php echo site_url('pelayanan_ctrl/ajax_add_radio')?>";
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "nama_radio": $("#tnama_radio").val(),
              "qty": $("#tjml_radio").val(),
              "harga": $("#tharga_radio").val(),
              "id_daftar": $("#tid_daftar").val()
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  $('#form_radio')[0].reset();
                  reload_table_radio();
                  $('#tnama_radio').focus();

              }
                else
              {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
              }
              $('#btnSave_radio').text('save'); //change button text
              $('#btnSave_radio').attr('disabled',false); //set button enable
 
 
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave_radio').text('save'); //change button text
                $('#btnSave_radio').attr('disabled',false); //set button enable
            }
        });
}

function delete_radio(id){
  if(confirm('Yakin akan dihapus?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('pelayanan_ctrl/ajax_delete_radio')?>/"+id,
            type: "POST",
            dataType: "JSON",
            
            success: function(data)

            {
               //if success reload ajax table
               $('#modal_radio').modal('hide');
               reload_table_radio();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error delete data');
            }
        });
 
      }
}

// akhir radiologi


// poli

function btadd_poli(){
  // $('#form_diagnosa')[0].reset(); // reset form on modals
   $('#modal_poli').modal('show'); // show bootstrap modal
   $('.modal-title').text('Konsul Kepoli Lain'); // Set Title to Bootstrap modal title
}

function reload_table_poli()
{
  table_poli.ajax.reload(null,false); //reload datatable ajax
}

function save_poli(){

    $('#btnSave_poli').text('saving...'); //change button text
    $('#btnSave_poli').attr('disabled',true); //set button disable

      var url;
      url = "<?php echo site_url('pelayanan_ctrl/ajax_add_poli')?>";
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "nama_poli": $("#tnama_poli2").val(),
              "kd_petugas": $("#tnama_petugas2").val(),
              "id_daftar": $("#tid_daftar").val()
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  $('#form_poli')[0].reset();
                  reload_table_poli();
                  $('#tnama_poli2').focus();

              }
                else
              {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
              }
              $('#btnSave_poli').text('save'); //change button text
              $('#btnSave_poli').attr('disabled',false); //set button enable
 
 
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave_poli').text('save'); //change button text
                $('#btnSave_poli').attr('disabled',false); //set button enable
            }
        });
}

function delete_poli(id){
  if(confirm('Yakin akan dihapus?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('pelayanan_ctrl/ajax_delete_poli')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_poli').modal('hide');
               reload_table_poli();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error delete data');
            }
        });
 
      }
}

// akhir poli

// alergi

function btadd_alergi(){
  // $('#form_diagnosa')[0].reset(); // reset form on modals
   $('#modal_alergi').modal('show'); // show bootstrap modal
   $('.modal-title').text('Alergi Obat'); // Set Title to Bootstrap modal title
}

function reload_table_alergi()
{
  table_alergi.ajax.reload(null,false); //reload datatable ajax
}

function save_alergi(){

    $('#btnSave_alergi').text('saving...'); //change button text
    $('#btnSave_alergi').attr('disabled',true); //set button disable

      var url;
      url = "<?php echo site_url('pelayanan_ctrl/ajax_add_alergi')?>";
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "kd_obat": $("#tkode_alergi").val(),
              "kd_pasien": $("#tkd_pasien").val(),
              "keterangan": $("#tket_alergi").val()
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  $('#form_alergi')[0].reset();
                  reload_table_alergi();
                  $('#tkode_alergi').focus();

              }
                else
              {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
              }
              $('#btnSave_alergi').text('save'); //change button text
              $('#btnSave_alergi').attr('disabled',false); //set button enable
 
 
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave_alergi').text('save'); //change button text
                $('#btnSave_alergi').attr('disabled',false); //set button enable
            }
        });
}

function delete_alergi(id){
  if(confirm('Yakin akan dihapus?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('pelayanan_ctrl/ajax_delete_alergi')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_alergi').modal('hide');
               reload_table_alergi();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error delete data');
            }
        });
 
      }
}

// akhir poli


</script>


<table border="3" width="100%">
  <tr>
    <td>
      <button id="bts_pasien" class="btn btn-success" onclick="btsearch_pasien()"><i class="glyphicon glyphicon-search"></i> Search Pasien </button>    
    </td>
      
    <td class="text-right">
      <h3>  <span class = "label label-info" id="nn_pasien" name="nn_pasien"></span> </h3>
    </td>
  </tr>
 </table> 
  
    <form>

      <input type="hidden" value="" name="tid_daftar" id="tid_daftar"/>
      <input type="hidden" value="" name="tkd_pasien" id="tkd_pasien"/>

      <table id="table_atas" width="100%" border="5" cellpadding="10" cellspacing="3" class="bg-info">
        <tr>
          <td width="120">
            Tgl Pelayanan :
            <input type="text" class="form-control" id="ttgl_pelayanan" name="ttgl_pelayanan" readonly="true" >
          </td>

          <td>
            Poli :
            <input type="text" class="form-control" id="tpoli" name="tpoli" readonly="true"  >
          </td>

          <td>
            Jenis Pasien :
            <select name="tjenis_pasien" id="tjenis_pasien" class="form-control">
                  <option value="UMUM">UMUM</option>
                  <option value="JAMKESMAS">JAMKESMAS</option>
                  <option value="ASKES/BPJS">ASKES/BPJS</option>
                  <option value="JAMSOSTEK">ASURANSI LAIN</option>
            </select>
          </td>

          <td>
            Cara Bayar :
            <select name="tcara_bayar" id="tcara_bayar" class="form-control" >
                      <option value="BAYAR">BAYAR</option>
                      <option value="GRATIS">GRATIS</option>
                  </select>
          </td>

        </tr>

        

        <tr>
          <td colspan="2">
            Anamnesa :
            <input type="text" class="form-control" name="tanamnesa" id="tanamnesa" >
          </td>

        <td colspan="2">
            Keterangan :
            <input type="text" class="form-control" name="tketerangan" id="tketerangan">
          </td>

        </tr>

      </table>
      
</form>

      <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_diagnosa" data-toggle="tab">Diagnosa</a></li>
                            <li><a href="#tab_tindakan" data-toggle="tab">Tindakan</a></li>
                            <li><a href="#tab_obat" data-toggle="tab">Obat</a></li>
                            <li><a href="#tab_lab" data-toggle="tab">Lab</a></li>
                            <li><a href="#tab_radio" data-toggle="tab">Radiologi</a></li>
                            <li><a href="#tab_konsul" data-toggle="tab">Konsul Ke Poli Lain</a></li>
                            <li><a href="#tab_alergi" data-toggle="tab">Alergi Obat</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab_diagnosa">

                          <button id="bts_diagnosa" class="btn btn-success btn-sm" onclick="btadd_diagnosa()"><i class="glyphicon glyphicon-plus"></i> Add </button>    

                          <table id="table_diagnosa" class="table table-striped table-bordered" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Nama Diagnosa</th>
                                <th>Jenis</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                          </table>

                        </div>

                        <div class="tab-pane fade" id="tab_tindakan">
                          
                          <button id="bts_tindakan" class="btn btn-success btn-sm" onclick="btadd_tindakan()"><i class="glyphicon glyphicon-plus"></i> Add </button>    

                          <table id="table_tindakan" class="table table-striped table-bordered" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Nama Tindakan</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                          </table>


                        </div>
                        <div class="tab-pane fade" id="tab_obat">

                          <button id="bts_obat" class="btn btn-success btn-sm" onclick="btadd_obat()"><i class="glyphicon glyphicon-plus"></i> Add </button>    

                          <table id="table_obat" class="table table-striped table-bordered" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Dosis</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                          </table>

                        </div>
                        <div class="tab-pane fade" id="tab_lab">

                        <button id="bts_lab" class="btn btn-success btn-sm" onclick="btadd_lab()"><i class="glyphicon glyphicon-plus"></i> Add </button>    

                          <table id="table_lab" class="table table-striped table-bordered" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Nama Tindakan</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                          </table>


                        </div>
                        <div class="tab-pane fade" id="tab_radio">

                          <button id="bts_radio" class="btn btn-success btn-sm" onclick="btadd_radio()"><i class="glyphicon glyphicon-plus"></i> Add </button>    

                          <table id="table_radio" class="table table-striped table-bordered" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Nama Tindakan</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                          </table>

                        </div>
                        <div class="tab-pane fade" id="tab_konsul">

                          <button id="bts_poli" class="btn btn-success btn-sm" onclick="btadd_poli()"><i class="glyphicon glyphicon-plus"></i> Add </button>    

                          <table id="table_poli" class="table table-striped table-bordered" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Nama Poli</th>
                                <th>Dr/Petugas</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                          </table>

                        </div>
                        <div class="tab-pane fade" id="tab_alergi">

                          <button id="bts_alergi" class="btn btn-success btn-sm" onclick="btadd_alergi()"><i class="glyphicon glyphicon-plus"></i> Add </button>    

                          <table id="table_alergi" class="table table-striped table-bordered" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Obat</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                          </table>

                        </div>
                    </div>
                </div>
        </div>


  <!-- form search pencarian -->
  <div class="modal fade" id="modal_pencarian" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Search Pendaftaran Pasien</h4>
      </div> 
      <div class="modal-body form">
        <form action="#" id="form_pencarian">

          <div class="form-body">

            <table width="100%" border="0">

              <tr>
                  <td width="110" valign="baseline">
                    <label class="control-label">Poli</label>
                  </td>
                  <td width="7" valign="baseline">:</td>

                <td valign="baseline">
                    <select name="tnama_poli_cari" id="tnama_poli_cari" class="form-control input-sm">
                      <option value="all" selected>--Semua Poli--</option>
                      <?php foreach($qpoli as $rowprov){?>
                        <option value="<?=$rowprov->nama_poli?>"><?=$rowprov->nama_poli?></option>
                      <?php }?>
                    </select>
                </td>
              </tr>
            
              <tr>
                <td style="vertical-align:middle">
                    <label class="control-label">Tanggal</label>
                </td>
                <td style="vertical-align:middle">:</td>

                <td style="vertical-align:middle">
                    <input name="ttanggal_cari" id='ttanggal_cari' placeholder="yyyy-mm-dd" class="form-control input-sm datepicker" type="text" value="<?php echo date('Y-m-d'); ?>" >
                </td>
              </tr>

              <tr>
                <td style="vertical-align:middle">
                    <label class="control-label">Status</label>
                </td>
                <td style="vertical-align:middle">:</td>
                <td style="vertical-align:middle">
                    <select name="tstatus_cari" id="tstatus_cari" class="form-control input-sm">
                      <option value="all" selected>Semua</option>
                      <option value="belum">Belum Dilayani</option>
                      <option value="sudah">Sudah Dilayani</option>
                    </select>
                </td>
              </tr>

              <tr>
                <td  style="vertical-align:middle">
                    <label class="control-label">Jns Pelayanan</label>
                </td>
                <td  style="vertical-align:middle">:</td>
                <td  style="vertical-align:middle">
                    <select name="tjenis_cari" id="tjenis_cari" class="form-control input-sm">
                      <option value="jalan" selected>Pelayanan Rawat Jalan</option>
                      <option value="inap">Pelayanan Rawat Inap</option>
                    </select>
                   
                </td>
              </tr>

            </table>
            
          </div>
        </form>

          <table width="100%" border="0">
            <tr >
                <td width="110"></td>
                <td width="7"></td>
                <td>
                  <button  type="button" id="btncari_daftar" style="width:30%" onclick="cari_daftar()" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Cari</button>
                </td>
            </tr>
          </table>

        </div>

        
        <table id="table_cari" class="table table-striped table-bordered" cellspacing="0">
          <thead>
            <tr>
              <th>Nomor</th>
              <th>Nama Pasien</th>
              <th>Umur</th>
              <th>Alamat</th>
              <th>Poli</th>
              <th>Dokter</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
        

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End pencarian -->


  <!-- modal diagnosa -->
  <div class="modal fade" id="modal_diagnosa" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header bg-primary">
    <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Diagnosa Pasien</h4>
  </div>
  <div class="modal-body">
    <form action="#" id="form_diagnosa">

      <div class="form-group">
          <input id="tkd_diagnosa_tr" name="tkd_diagnosa_tr" type="hidden">
          <label for="tnama_diagnosa">Nama</label>
          <input id="tnama_diagnosa" name="tnama_diagnosa" placeholder="Nama Diagnosa" class="form-control" type="text">
      </div>

      <div class="form-group">
        <label for="tjenis_diagnosa">Jenis</label>
        <select id="tjenis_diagnosa" name="tjenis_diagnosa" class="form-control">
                  <option value="-">-- Pilih --</option>
                  <option value="PRIMER">Primer</option>
                  <option value="SEKUNDER">Sekunder</option>
                  <option value="KOMPLIKASI">Komplikasi</option>
        </select>
      </div>

    </form>
  </div>

  <div class="modal-footer bg-success">
      <button type="button" id="btnSave_diagnosa" onclick="save_diagnosa()" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  </div>

  </div>
  </div>
  </div>
  <!-- akhir modal diagnosa -->

  <!--- modal tindakan -->

  <div class="modal fade" id="modal_tindakan" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog"  role="document">
  <div class="modal-content">
  <div class="modal-header bg-primary">
    <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Tindakan Pasien</h4>
  </div>
  <div class="modal-body">
    <form action="#" id="form_tindakan">

      <div class="form-group">
          <label for="tnama_tindakan">Nama :</label>
          <input id="tnama_tindakan" name="tnama_tindakan" placeholder="Nama Tindakan" class="form-control" type="text">
      </div>

      <div class="form-group">
          <label for="tjml_tindakan">Qty :</label>
          <input id="tjml_tindakan" name="tjml_tindakan" placeholder="Jumlah" class="form-control" type="number" min="0" value="0" step="1" class="currency">
      </div> 

      <div class="form-group">
          <label for="tharga_tindakan">Harga :</label>
          <input id="tharga_tindakan" name="tharga_tindakan" placeholder="Harga" class="form-control" type="number" min="0" value="0" step="1" class="currency">
      </div>

      <div class="form-group">
          <label for="tket_tindakan">Keterangan :</label>
          <input id="tket_tindakan" name="tket_tindakan" placeholder="Keterangan" class="form-control" type="text">
      </div>      

    </form>
  </div>

  <div class="modal-footer bg-success">
      <button type="button" id="btnSave_tindakan" onclick="save_tindakan()" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  </div>

  </div>
  </div>
  </div>

  <!-- akhir modal tindakan -->

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

  
  <!-- modal lab -->

  <div class="modal fade" id="modal_lab" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog"  role="document">
  <div class="modal-content">
  <div class="modal-header bg-primary">
    <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Tindakan Laboratorium</h4>
  </div>
  <div class="modal-body">
    <form action="#" id="form_lab">

      <div class="form-group">
          <label for="tnama_lab">Nama :</label>
          <input id="tnama_lab" name="tnama_lab" placeholder="Nama Jenis Pemeriksaan" class="form-control" type="text">
      </div>

      <div class="form-group">
          <label for="tjml_lab">Qty :</label>
          <input id="tjml_lab" name="tjml_lab" placeholder="Jumlah" class="form-control" type="number" min="0" value="0" step="1" class="currency">
      </div> 

      <div class="form-group">
          <label for="tharga_lab">Harga :</label>
          <input id="tharga_lab" name="tharga_lab" placeholder="Harga" class="form-control" type="number" min="0" value="0" step="1" class="currency">
      </div>

    </form>
  </div>

  <div class="modal-footer bg-success">
      <button type="button" id="btnSave_lab" onclick="save_lab()" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  </div>

  </div>
  </div>
  </div>

  <!-- akhir modal lab -->

  <!-- modal radio -->

  <div class="modal fade" id="modal_radio" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog"  role="document">
  <div class="modal-content">
  <div class="modal-header bg-primary">
    <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Radiologi</h4>
  </div>
  <div class="modal-body">
    <form action="#" id="form_radio">

      <div class="form-group">
          <label for="tnama_radio">Nama :</label>
          <input id="tnama_radio" name="tnama_radio" placeholder="Nama Jenis Pemeriksaan" class="form-control" type="text">
      </div>

      <div class="form-group">
          <label for="tjml_radio">Qty :</label>
          <input id="tjml_radio" name="tjml_radio" placeholder="Jumlah" class="form-control" type="number" min="0" value="0" step="1" class="currency">
      </div> 

      <div class="form-group">
          <label for="tharga_radio">Harga :</label>
          <input id="tharga_radio" name="tharga_radio" placeholder="Harga" class="form-control" type="number" min="0" value="0" step="1" class="currency">
      </div>

    </form>
  </div>

  <div class="modal-footer bg-success">
      <button type="button" id="btnSave_lab" onclick="save_radio()" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  </div>

  </div>
  </div>
  </div>

  <!-- akhir modal radio -->


  <!-- modal poli -->

  <div class="modal fade" id="modal_poli" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog"  role="document">
  <div class="modal-content">
  <div class="modal-header bg-primary">
    <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Poli Lain</h4>
  </div>
  <div class="modal-body">
    <form action="#" id="form_poli">

      <div class="form-group">
        <label for="tnama_poli2">Poli :</label>
        <select name="tnama_poli2" id="tnama_poli2" class="form-control input-sm">
            <option value="all" selected>--Pilih--</option>
                <?php foreach($qpoli as $rowprov){?>
                      <option value="<?=$rowprov->nama_poli?>"><?=$rowprov->nama_poli?></option>
                <?php }?>
            </select>
      </div>

      <div class="form-group">
        <label for="tnama_petugas2">Dokter :</label>
        <select name="tnama_petugas2" id="tnama_petugas2" class="form-control input-sm">
            <option value="all" selected>--Pilih--</option>
                <?php foreach($qpetugas as $rowprov){?>
                      <option value="<?=$rowprov->kd_petugas?>"><?=$rowprov->nama_petugas?></option>
                <?php }?>
            </select>
      </div>

    </form>
  </div>

  <div class="modal-footer bg-success">
      <button type="button" id="btnSave_poli" onclick="save_poli()" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  </div>

  </div>
  </div>
  </div>

  <!-- akhir modal poli -->


  <!-- modal alergi -->

  <div class="modal fade" id="modal_alergi" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog"  role="document">
  <div class="modal-content">
  <div class="modal-header bg-primary">
    <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Alergi Obat</h4>
  </div>
  <div class="modal-body">
    <form action="#" id="form_alergi">

      <div class="form-group">
            <label for="tkode_alergi">Kode :</label>
            <input id="tkode_alergi" name="tkode_alergi" placeholder="Kode Obat" class="form-control size_kecil" type="text">
      </div>

      <div class="form-group">
          <label for="tnama_alergi">Nama :</label>
          <input id="tnama_alergi" name="tnama_alergi" placeholder="Nama Obat" class="form-control" type="text">
      </div>

      <div class="form-group">
          <label for="tket_alergi">Nama :</label>
          <input id="tket_alergi" name="tket_alergi" placeholder="Keterangan" class="form-control" type="text">
      </div>

    </form>
  </div>

  <div class="modal-footer bg-success">
      <button type="button" id="btnSave_alergi" onclick="save_alergi()" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  </div>

  </div>
  </div>
  </div>

  <!-- akhir modal alergi -->

</body>
</html>
