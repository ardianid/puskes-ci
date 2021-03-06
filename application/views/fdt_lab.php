<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Data Laboratorium</title>
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
            "url": "<?php echo site_url('dt_lab_ctrl/ajax_list_pencarian')?>",
            "type": "POST",
            "data": function(d) {
              d.thn= $('#tthn_cr').val();
              d.bln= $('#tbln_cr').val();
              d.desa= ''; 
              
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '50px', targets: 0,"orderable": false },
          { width: '50px', targets: 1,"orderable": false },
          { width: '200px', targets: 2,"orderable": false },
          { width: '5px', targets: 3,sClass: "alignRight","orderable": false },
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

  $('[name="tid_lab"]').val('');

    var d = new Date();
    var m = d.getMonth()+1;
    var y = d.getFullYear();

  $('[name="tthn"]').val(y);
  $('[name="tbln"]').val(m);
  $('[name="tkd_puskes"]').val(kd_puskes_d);

  $('[name="tjml_sdr"]').val('0');
  $('[name="tjml_sdr_pr"]').val('0');
  $('[name="tjml_airsen"]').val('0');
  $('[name="tjml_airsen_pr"]').val('0');
  $('[name="tjml_tinj"]').val('0');
  $('[name="tjml_tinj_pr"]').val('0');
  $('[name="tjml_bt"]').val('0');
  $('[name="tjml_bt_pr"]').val('0');
  $('[name="tjml_bt2"]').val('0');
  $('[name="tjml_bt2_pr"]').val('0');
  $('[name="tjml_drah_ml"]').val('0');
  $('[name="tjml_drah_ml_pr"]').val('0');
  $('[name="tjml_drah_ml2"]').val('0');
  $('[name="tjml_drah_ml2_pr"]').val('0');
  $('[name="tjml_drah_ml3"]').val('0');
  $('[name="tjml_drah_ml3_pr"]').val('0');
  $('[name="tjml_kust"]').val('0');
  $('[name="tjml_kust_pr"]').val('0');
  $('[name="tjml_kust2"]').val('0');
  $('[name="tjml_kust2_pr"]').val('0');
  $('[name="tjml_lain"]').val('0');
  $('[name="tjml_lain_pr"]').val('0');

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
        url : "<?php echo site_url('dt_lab_ctrl/ajax_get_by_id_pencarian')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

      $('[name="tid_lab"]').val(data.id_lab);

      $('[name="tthn"]').val(data.thn_lab);
      $('[name="tbln"]').val(data.bln_lab);
      $('[name="tkd_puskes"]').val(data.kd_puskes);

      $('[name="tjml_sdr"]').val(data.jml_sdr);
      $('[name="tjml_sdr_pr"]').val(data.jml_sdr_pr);
      $('[name="tjml_airsen"]').val(data.jml_airsen);
      $('[name="tjml_airsen_pr"]').val(data.jml_airsen_pr);
      $('[name="tjml_tinj"]').val(data.jml_tinj);
      $('[name="tjml_tinj_pr"]').val(data.jml_tinj_pr);
      $('[name="tjml_bt"]').val(data.jml_bt);
      $('[name="tjml_bt_pr"]').val(data.jml_bt_pr);
      $('[name="tjml_bt2"]').val(data.jml_bt2);
      $('[name="tjml_bt2_pr"]').val(data.jml_bt2_pr);
      $('[name="tjml_drah_ml"]').val(data.jml_drah_ml);
      $('[name="tjml_drah_ml_pr"]').val(data.jml_drah_ml_pr);
      $('[name="tjml_drah_ml2"]').val(data.jml_drah_ml2);
      $('[name="tjml_drah_ml2_pr"]').val(data.jml_drah_ml2_pr);
      $('[name="tjml_drah_ml3"]').val(data.jml_drah_ml3);
      $('[name="tjml_drah_ml3_pr"]').val(data.jml_drah_ml3_pr);
      $('[name="tjml_kust"]').val(data.jml_kust);
      $('[name="tjml_kust_pr"]').val(data.jml_kust_pr);
      $('[name="tjml_kust2"]').val(data.jml_kust2);
      $('[name="tjml_kust2_pr"]').val(data.jml_kust2_pr);
      $('[name="tjml_lain"]').val(data.jml_lain);
      $('[name="tjml_lain_pr"]').val(data.jml_lain_pr);

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
            url : "<?php echo site_url('dt_lab_ctrl/ajax_delete')?>/"+id,
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
          url = "<?php echo site_url('dt_lab_ctrl/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('dt_lab_ctrl/ajax_update')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "thn_lab": $("#tthn").val(),
              "bln_lab": $("#tbln").val(),
              "kd_puskes": $("#tkd_puskes").val(),
              "id_lab": $("#tid_lab").val(),

              "jml_sdr": $("#tjml_sdr").val(),
              "jml_sdr_pr": $("#tjml_sdr_pr").val(),
              "jml_airsen": $("#tjml_airsen").val(),
              "jml_airsen_pr": $("#tjml_airsen_pr").val(),
              "jml_tinj": $("#tjml_tinj").val(),
              "jml_tinj_pr": $("#tjml_tinj_pr").val(),
              "jml_bt": $("#tjml_bt").val(),
              "jml_bt_pr": $("#tjml_bt_pr").val(),
              "jml_bt2": $("#tjml_bt2").val(),
              "jml_bt2_pr": $("#tjml_bt2_pr").val(),
              "jml_drah_ml": $("#tjml_drah_ml").val(),
              "jml_drah_ml_pr": $("#tjml_drah_ml_pr").val(),
              "jml_drah_ml2": $("#tjml_drah_ml2").val(),
              "jml_drah_ml2_pr": $("#tjml_drah_ml2_pr").val(),
              "jml_drah_ml3": $("#tjml_drah_ml3").val(),
              "jml_drah_ml3_pr": $("#tjml_drah_ml3_pr").val(),
              "jml_kust": $("#tjml_kust").val(),
              "jml_kust_pr": $("#tjml_kust_pr").val(),
              "jml_kust2": $("#tjml_kust2").val(),
              "jml_kust2_pr": $("#tjml_kust2_pr").val(),
              "jml_lain": $("#tjml_lain").val(),
              "jml_lain_pr": $("#tjml_lain_pr").val(),

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
                            <li class="active"><a id="tab_diagnosa2" href="#tab_diagnosa" data-toggle="tab">Data Laboratorium</a></li>
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
                <td width="15%">
                  <input type="text" class="form-control input-sm" name="tthn_cr" id="tthn_cr" >
                </td>
                <td width="7%">&nbsp;</td>
                <td width="10%"></td>
                <td width="1%"></td>
                <td width="43%">
                 <!-- <input type="text" class="form-control input-sm" name="tdesa_cr" id="tdesa_cr" > -->
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
                    <th>Puskesmas</th>
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
              
            <input type="hidden" name="tid_lab" id="tid_lab" >
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
              <td colspan="4"> <hr> </td>
            </tr>

            <tr>
              <td></td>
              <td></td>
              <td>Laki-Laki</td>
              <td>Perempuan</td>
            </tr>

            <tr>
              <td>Jml spesimen darah yang diperiksa</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_sdr" name="tjml_sdr">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_sdr_pr" name="tjml_sdr_pr">
              </td>
            </tr>
            
            <tr>
              <td>Jml spesimen air seni yang diperiksa</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_airsen" name="tjml_airsen">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_airsen_pr" name="tjml_airsen_pr">
              </td>
            </tr>

            <tr>
              <td>Jml spesimen tinja yang diperiksa</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_tinj" name="tjml_tinj">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_tinj_pr" name="tjml_tinj_pr">
              </td>
            </tr>

            <tr>
              <td>Jml pemeriksaan BTA/TBC (sputum)</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_bt" name="tjml_bt">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_bt_pr" name="tjml_bt_pr">
              </td>
            </tr>

            <tr>
              <td>Jml pemeriksaan BTA/TBC (sputum) positif</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_bt2" name="tjml_bt2">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_bt2_pr" name="tjml_bt2_pr">
              </td>
            </tr>

            <tr>
              <td>Jml pemeriksaan darah untuk malaria </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_drah_ml" name="tjml_drah_ml">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_drah_ml_pr" name="tjml_drah_ml_pr">
              </td>
            </tr>

            <tr>
              <td>Jml pemeriksaan darah untuk malaria positif</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_drah_ml2" name="tjml_drah_ml2">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_drah_ml2_pr" name="tjml_drah_ml2_pr">
              </td>
            </tr>

            <tr>
              <td>Jml pemeriksaan darah untuk malaria positif P Falciparum</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_drah_ml3" name="tjml_drah_ml3">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_drah_ml3_pr" name="tjml_drah_ml3_pr">
              </td>
            </tr>

            <tr>
              <td>Jml pemeriksaan BTA/Kusta (Reits Serum)</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_kust" name="tjml_kust">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_kust_pr" name="tjml_kust_pr">
              </td>
            </tr>

            <tr>
              <td>Jml pemeriksaan BTA/Kusta (Reits Serum) positif</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_kust2" name="tjml_kust2">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_kust2_pr" name="tjml_kust2_pr">
              </td>
            </tr>

            <tr>
              <td>Jml pemeriksaan laboratorium lainnya</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_lain" name="tjml_lain">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_lain_pr" name="tjml_lain_pr">
              </td>
            </tr>

            <tr>
              <td colspan="4"> <hr> </td>
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