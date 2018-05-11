<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Data Gizi</title>
    <link href="<?=base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/jquery-ui-1.10.4.min.css" type="text/css" media="all" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/bootstrap-datepicker.min.css" rel="stylesheet">

<style type="text/css">

.alignRight { text-align: center; }
.alignRight_btn { float: right; }

.size_kecil {
    width: 100px;
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
 
     $("#tnama_desa").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "dt_gizi_ctrl/lookup_desa",  
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
            "url": "<?php echo site_url('dt_gizi_ctrl/ajax_list_pencarian')?>",
            "type": "POST",
            "data": function(d) {
              d.thn= $('#tthn_cr').val();
              d.bln= $('#tbln_cr').val();
              d.desa= $('#tdesa_cr').val();
              
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '50px', targets: 0,"orderable": false },
          { width: '50px', targets: 1,"orderable": false },
          { width: '150px', targets: 2,"orderable": false },
          { width: '150px', targets: 3,"orderable": false },
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

function kosongkan_data(){

  $('[name="tid_gizi"]').val('');

    var d = new Date();
    var m = d.getMonth()+1;
    var y = d.getFullYear();

  $('[name="tthn"]').val(y);
  $('[name="tbln"]').val(m);
  $('[name="tkd_desa"]').val('');
  $('[name="tnama_desa"]').val('');
  $('[name="tnama_kel"]').val('');
  $('[name="tnama_kec"]').val('');
  $('[name="tkd_puskes"]').val(kd_puskes_d);
  $('[name="tjml_bayi_vit"]').val('0');
  $('[name="tjml_balita_200"]').val('0');
  $('[name="tjml_ibu_nifas"]').val('0');
  $('[name="tjml_ibu_hml_f1"]').val('0');
  $('[name="tjml_ibu_hml_f3"]').val('0');
  $('[name="tjml_balita_febal1"]').val('0');
  $('[name="tjml_balita_febal2"]').val('0');
  $('[name="tjml_bayi1_timbang"]').val('0');
  $('[name="tjml_balita14_timbang"]').val('0');
  $('[name="tjml_bayi_bawah"]').val('0');
  $('[name="tjml_sd16_yodium"]').val('0');
  $('[name="tjml_wus_yodium"]').val('0');
  $('[name="tjml_bumil_yodium"]').val('0');
  $('[name="tjml_buteki_yodium"]').val('0');
  $('[name="tjml_wus1445_lila"]').val('0');
  $('[name="tjml_wus23_lila"]').val('0');

  $('[name="tjml_bayi_vit_pr"]').val('0');
  $('[name="tjml_balita_200_pr"]').val('0');
  $('[name="tjml_ibu_nifas_pr"]').val('0');
  $('[name="tjml_ibu_hml_f1_pr"]').val('0');
  $('[name="tjml_ibu_hml_f3_pr"]').val('0');
  $('[name="tjml_balita_febal1_pr"]').val('0');
  $('[name="tjml_balita_febal2_pr"]').val('0');
  $('[name="tjml_bayi1_timbang_pr"]').val('0');
  $('[name="tjml_balita14_timbang_pr"]').val('0');
  $('[name="tjml_bayi_bawah_pr"]').val('0');
  $('[name="tjml_sd16_yodium_pr"]').val('0');
  $('[name="tjml_wus_yodium_pr"]').val('0');
  $('[name="tjml_bumil_yodium_pr"]').val('0');
  $('[name="tjml_buteki_yodium_pr"]').val('0');
  $('[name="tjml_wus1445_lila_pr"]').val('0');
  $('[name="tjml_wus23_lila_pr"]').val('0');

}

function add_data(){

  $('#tab_detail2').tab('show');

  save_method="add";

  kosongkan_data();
}

function edit_ins(id)
{

  save_method="edit";

  $.ajax({
        url : "<?php echo site_url('dt_gizi_ctrl/ajax_get_by_id_pencarian')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

      $('[name="tid_gizi"]').val(data.id_gizi);

      $('[name="tthn"]').val(data.thn_gizi);
      $('[name="tbln"]').val(data.bln_gizi);
      $('[name="tkd_desa"]').val(data.kd_desa);
      $('[name="tnama_desa"]').val(data.nama_desa);
      $('[name="tnama_kel"]').val(data.nama_kel);
      $('[name="tnama_kec"]').val(data.nama_kec);
      $('[name="tkd_puskes"]').val(data.kd_puskes);

      $('[name="tjml_bayi_vit"]').val(data.jml_bayi_vit);
      $('[name="tjml_balita_200"]').val(data.jml_balita_200);
      $('[name="tjml_ibu_nifas"]').val(data.jml_ibu_nifas);
      $('[name="tjml_ibu_hml_f1"]').val(data.jml_ibu_hml_f1);
      $('[name="tjml_ibu_hml_f3"]').val(data.jml_ibu_hml_f3);
      $('[name="tjml_balita_febal1"]').val(data.jml_balita_febal1);
      $('[name="tjml_balita_febal2"]').val(data.jml_balita_febal2);
      $('[name="tjml_bayi1_timbang"]').val(data.jml_bayi1_timbang);
      $('[name="tjml_balita14_timbang"]').val(data.jml_balita14_timbang);
      $('[name="tjml_bayi_bawah"]').val(data.jml_bayi_bawah);
      $('[name="tjml_sd16_yodium"]').val(data.jml_sd16_yodium);
      $('[name="tjml_bumil_yodium"]').val(data.jml_bumil_yodium);
      $('[name="tjml_buteki_yodium"]').val(data.jml_buteki_yodium);
      $('[name="tjml_wus1445_lila"]').val(data.jml_wus1445_lila);
      $('[name="tjml_wus23_lila"]').val(data.jml_wus23_lila);

      $('[name="tjml_bayi_vit_pr"]').val(data.jml_bayi_vit_pr);
      $('[name="tjml_balita_200_pr"]').val(data.jml_balita_200_pr);
      $('[name="tjml_ibu_nifas_pr"]').val(data.jml_ibu_nifas_pr);
      $('[name="tjml_ibu_hml_f1_pr"]').val(data.jml_ibu_hml_f1_pr);
      $('[name="tjml_ibu_hml_f3_pr"]').val(data.jml_ibu_hml_f3_pr);
      $('[name="tjml_balita_febal1_pr"]').val(data.jml_balita_febal1_pr);
      $('[name="tjml_balita_febal2_pr"]').val(data.jml_balita_febal2_pr);
      $('[name="tjml_bayi1_timbang_pr"]').val(data.jml_bayi1_timbang_pr);
      $('[name="tjml_balita14_timbang_pr"]').val(data.jml_balita14_timbang_pr);
      $('[name="tjml_bayi_bawah_pr"]').val(data.jml_bayi_bawah_pr);
      $('[name="tjml_sd16_yodium_pr"]').val(data.jml_sd16_yodium_pr);
      $('[name="tjml_bumil_yodium_pr"]').val(data.jml_bumil_yodium_pr);
      $('[name="tjml_buteki_yodium_pr"]').val(data.jml_buteki_yodium_pr);
      $('[name="tjml_wus1445_lila_pr"]').val(data.jml_wus1445_lila_pr);
      $('[name="tjml_wus23_lila_pr"]').val(data.jml_wus23_lila_pr);

      $('#tab_detail2').tab('show');    

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        } 
    });

}

function delete_ins(id)
    {
      if(confirm('Yakin akan dihapus?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('dt_gizi_ctrl/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               //$('#modal_form_detail').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error delete data');
            }
        });
 
      }
    }

    function save()
    {

      $('#bts_post').text('saving...'); //change button text
      $('#bts_post').attr('disabled',true); //set button disable

      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('dt_gizi_ctrl/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('dt_gizi_ctrl/ajax_update')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "thn_gizi": $("#tthn").val(),
              "bln_gizi": $("#tbln").val(),
              "kd_desa": $("#tkd_desa").val(),
              "kd_puskes": $("#tkd_puskes").val(),
              "id_gizi": $("#tid_gizi").val(),
              "jml_bayi_vit": $("#tjml_bayi_vit").val(),
              "jml_balita_200": $("#tjml_balita_200").val(),
              "jml_ibu_nifas": $("#tjml_ibu_nifas").val(),
              "jml_ibu_hml_f1": $("#tjml_ibu_hml_f1").val(),
              "jml_ibu_hml_f3": $("#tjml_ibu_hml_f3").val(),
              "jml_balita_febal1": $("#tjml_balita_febal1").val(),
              "jml_balita_febal2": $("#tjml_balita_febal2").val(),
              "jml_bayi1_timbang": $("#tjml_bayi1_timbang").val(),
              "jml_balita14_timbang": $("#tjml_balita14_timbang").val(),
              "jml_bayi_bawah": $("#tjml_bayi_bawah").val(),
              "jml_sd16_yodium": $("#tjml_sd16_yodium").val(),
              "jml_wus_yodium": $("#tjml_wus_yodium").val(),
              "jml_bumil_yodium": $("#tjml_bumil_yodium").val(),
              "jml_buteki_yodium": $("#tjml_buteki_yodium").val(),
              "jml_wus1445_lila": $("#tjml_wus1445_lila").val(),
              "jml_wus23_lila": $("#tjml_wus23_lila").val(),
              "jml_bayi_vit_pr": $("#tjml_bayi_vit_pr").val(),
              "jml_balita_200_pr": $("#tjml_balita_200_pr").val(),
              "jml_ibu_nifas_pr": $("#tjml_ibu_nifas_pr").val(),
              "jml_ibu_hml_f1_pr": $("#tjml_ibu_hml_f1_pr").val(),
              "jml_ibu_hml_f3_pr": $("#tjml_ibu_hml_f3_pr").val(),
              "jml_balita_febal1_pr": $("#tjml_balita_febal1_pr").val(),
              "jml_balita_febal2_pr": $("#tjml_balita_febal2_pr").val(),
              "jml_bayi1_timbang_pr": $("#tjml_bayi1_timbang_pr").val(),
              "jml_balita14_timbang_pr": $("#tjml_balita14_timbang_pr").val(),
              "jml_bayi_bawah_pr": $("#tjml_bayi_bawah_pr").val(),
              "jml_sd16_yodium_pr": $("#tjml_sd16_yodium_pr").val(),
              "jml_wus_yodium_pr": $("#tjml_wus_yodium_pr").val(),
              "jml_bumil_yodium_pr": $("#tjml_bumil_yodium_pr").val(),
              "jml_buteki_yodium_pr": $("#tjml_buteki_yodium_pr").val(),
              "jml_wus1445_lila_pr": $("#tjml_wus1445_lila_pr").val(),
              "jml_wus23_lila_pr": $("#tjml_wus23_lila_pr").val(),

            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {


                    reload_table();
                    alert("Data disimpan..")
                    kosongkan_data();
              
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

})
// akhir kalau klik detail

</script>


  <!-- menu tab -->
      <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a id="tab_diagnosa2" href="#tab_diagnosa" data-toggle="tab">Data Gizi</a></li>
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
                <td width="15%">Tahun</td>
                <td width="1%">:</td>
                <td width="25%">
                  <input type="text" class="form-control input-sm" name="tthn_cr" id="tthn_cr" >
                </td>
                <td width="7%">&nbsp;</td>
                <td width="10%">Desa</td>
                <td width="1%">:</td>
                <td width="43%">
                  <input type="text" class="form-control input-sm" name="tdesa_cr" id="tdesa_cr" >
                </td>
              </tr>
              
              <tr>
                <td>Bulan</td>
                <td>:</td>
                <td>
                  <input type="text" class="form-control input-sm" name="tbln_cr" id="tbln_cr" >
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
                    <th>Thn</th>
                    <th>Bulan</th>
                    <th>Desa</th>
                    <th>Kelurahan</th>
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
              
            <input type="hidden" name="tid_gizi" id="tid_gizi" >
            <input type="hidden" name="tkd_puskes" id="tkd_puskes" >
            <input type="hidden" name="tkd_desa" id="tkd_desa" >

          <!--  <div class="alert alert-warning"> -->
            <table width="100%" border="0">
            <tr>
              <td width="45%">Tahun</td>
              <td width="1%">:</td>
              <td width="10%">
                <input type="text" class="form-control input-sm size_kecil" id="tthn" name="tthn">
              </td>
              <td width="43%"></td>
            </tr>

            <tr>
              <td>Bulan</td>
              <td>:</td>
              <td colspan="2">
                <input type="text" class="form-control input-sm size_kecil" id="tbln" name="tbln">
              </td>
            </tr>

            <tr>
              <td>Desa</td>
              <td>:</td>
              <td colspan="2">
                <input type="text" class="form-control input-sm" id="tnama_desa" name="tnama_desa">
              </td>
            </tr>

            <tr>
              <td>Kelurahan</td>
              <td>:</td>
              <td colspan="2">
                <input type="text" class="form-control input-sm" id="tnama_kel" name="tnama_kel" readonly="true">
              </td>
            </tr>

            <tr>
              <td>Kecamatan</td>
              <td>:</td>
              <td colspan="2">
                <input type="text" class="form-control input-sm" id="tnama_kec" name="tnama_kec" readonly="true">
              </td>
            </tr>

            <tr>
              <td></td>
              <td></td>
              <td>Laki-Laki</td>
              <td>Perempuan</td>
            </tr>

            <tr>
              <td>Jml bayi (6 - 11) bulan dapat vitamin A (100.000 SI)</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_bayi_vit" name="tjml_bayi_vit">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_bayi_vit_pr" name="tjml_bayi_vit_pr">
              </td>
            </tr>
            
            <tr>
              <td>Jml anak balita dapat vitamin A dosis tinggi (200.000 SI)</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_balita_200" name="tjml_balita_200">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_balita_200_pr" name="tjml_balita_200_pr">
              </td>
            </tr>

            <tr>
              <td>Jml ibu nifas dapat vitamin A dosis tinggi</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_ibu_nifas" name="tjml_ibu_nifas">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_ibu_nifas_pr" name="tjml_ibu_nifas_pr">
              </td>
            </tr>

            <tr>
              <td>Jml ibu hamil dapat tablet tambah darah (Fe) 30 tablet (Fe1)</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_ibu_hml_f1" name="tjml_ibu_hml_f1">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_ibu_hml_f1_pr" name="tjml_ibu_hml_f1_pr">
              </td>
            </tr>

            <tr>
              <td>Jml ibu hamil dapat tablet tambah darah (Fe) 90 tablet (Fe3)</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_ibu_hml_f3" name="tjml_ibu_hml_f3">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_ibu_hml_f3_pr" name="tjml_ibu_hml_f3_pr">
              </td>
            </tr>

            <tr>
              <td>Jml balita dapat syrup tambah darah (Fe) botol I 150 cc (Febal1)</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_balita_febal1" name="tjml_balita_febal1">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_balita_febal1_pr" name="tjml_balita_febal1_pr">
              </td>
            </tr>

            <tr>
              <td>Jml balita dapat sirup tambah darah [Fe] botol II 300 cc [Febal2]</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_balita_febal2" name="tjml_balita_febal2">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_balita_febal2_pr" name="tjml_balita_febal2_pr">
              </td>
            </tr>

            <tr>
              <td>Jml bayi [ krang dari 1 tahun] ditimbang </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_bayi1_timbang" name="tjml_bayi1_timbang">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_bayi1_timbang_pr" name="tjml_bayi1_timbang_pr">
              </td>
            </tr>

            <tr>
              <td>Jml anak balita [1-4 tahun] ditimbang</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_balita14_timbang" name="tjml_balita14_timbang">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_balita14_timbang_pr" name="tjml_balita14_timbang_pr">
              </td>
            </tr>

            <tr>
              <td>Jml bayi dan anak balita dengan Berat Badan di Bawah Garis Merah [BGM]</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_bayi_bawah" name="tjml_bayi_bawah">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_bayi_bawah_pr" name="tjml_bayi_bawah_pr">
              </td>
            </tr>

            <tr>
              <td>Jml anak SD kelas 1-6 yang mendapat kapsul yodium</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_sd16_yodium" name="tjml_sd16_yodium">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_sd16_yodium_pr" name="tjml_sd16_yodium_pr">
              </td>
            </tr>

            <tr>
              <td>Jml WUS (15-49 th) yang mendapat kapsul yodium</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_wus_yodium" name="tjml_wus_yodium">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_wus_yodium_pr" name="tjml_wus_yodium_pr">
              </td>
            </tr>

            <tr>
              <td>Jml bumil mendapat kapsul yodium</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_bumil_yodium" name="tjml_bumil_yodium">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_bumil_yodium_pr" name="tjml_bumil_yodium_pr">
              </td>
            </tr>

            <tr>
              <td>Jml buteki lainnya mendpat kapsul yodium</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_buteki_yodium" name="tjml_buteki_yodium">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_buteki_yodium_pr" name="tjml_buteki_yodium_pr">
              </td>
            </tr>

            <tr>
              <td>Jml WUS baru (15-45 th) yang diukur LILA (Lingkar Lengan Atas)</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_wus1445_lila" name="tjml_wus1445_lila">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_wus1445_lila_pr" name="tjml_wus1445_lila_pr">
              </td>
            </tr>

            <tr>
              <td>Jml WUS baru dengan LILA krang dari 23,5 cm</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_wus23_lila" name="tjml_wus23_lila">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_wus23_lila_pr" name="tjml_wus23_lila_pr">
              </td>
            </tr>

          </table>
       <!--   </div> -->

          <p></p>
          <button id="bts_post" class="btn btn-success btn-sm" onclick="save()"><i class="glyphicon glyphicon-check"></i> Simpan </button>    

        </div>
        <!-- akhir tab detail -->

                    </div>
                </div>
        </div>
    <!-- akhir menu tab -->

</body>
</html>