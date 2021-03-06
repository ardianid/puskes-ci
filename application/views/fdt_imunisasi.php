<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Data Imunisasi</title>
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
                        url: "dt_imunisasi_ctrl/lookup_desa",  
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
            "url": "<?php echo site_url('dt_imunisasi_ctrl/ajax_list_pencarian')?>",
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

  $('[name="tid_imun"]').val('');

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
  $('[name="tcampak"]').val('0');
  $('[name="tdpt1"]').val('0');
  $('[name="thep_b1"]').val('0');
  $('[name="thep_b3"]').val('0');
  $('[name="ttt1_pr"]').val('0');
  $('[name="ttt2_pr"]').val('0');
  $('[name="ttt_bos_pr"]').val('0');
  $('[name="twanita_tt1_pr"]').val('0');
  $('[name="tdt1"]').val('0');
  $('[name="tdt2"]').val('0');
  $('[name="tsd_tt1_pr"]').val('0');
  $('[name="tsd_tt2_pr"]').val('0');
  $('[name="tcampak_pr"]').val('0');
  $('[name="tdpt1_pr"]').val('0');

  $('[name="thep_b1_pr"]').val('0');
  $('[name="thep_b3_pr"]').val('0');
  $('[name="tdt1_pr"]').val('0');
  $('[name="tdt2_pr"]').val('0');


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
        url : "<?php echo site_url('dt_imunisasi_ctrl/ajax_get_by_id_pencarian')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

      $('[name="tid_imun"]').val(data.id_imun);

      $('[name="tthn"]').val(data.thn_imun);
      $('[name="tbln"]').val(data.bln_imun);
      $('[name="tkd_desa"]').val(data.kd_desa);
      $('[name="tnama_desa"]').val(data.nama_desa);
      $('[name="tnama_kel"]').val(data.nama_kel);
      $('[name="tnama_kec"]').val(data.nama_kec);
      $('[name="tkd_puskes"]').val(data.kd_puskes);

      $('[name="tcampak"]').val(data.campak);
      $('[name="tdpt1"]').val(data.dpt1);
      $('[name="thep_b1"]').val(data.hep_b1);
      $('[name="thep_b3"]').val(data.hep_b3);
      $('[name="ttt1_pr"]').val(data.tt1_pr);
      $('[name="ttt2_pr"]').val(data.tt2_pr);
      $('[name="ttt_bos_pr"]').val(data.tt_bos_pr);
      $('[name="twanita_tt1_pr"]').val(data.wanita_tt1_pr);
      $('[name="tdt1"]').val(data.dt1);
      $('[name="tdt2"]').val(data.dt2);
      $('[name="tsd_tt1_pr"]').val(data.sd_tt1_pr);
      $('[name="tsd_tt2_pr"]').val(data.sd_tt2_pr);
      $('[name="tcampak_pr"]').val(data.campak_pr);
      $('[name="tdpt1_pr"]').val(data.dpt1_pr);

      $('[name="thep_b1_pr"]').val(data.hep_b1_pr);
      $('[name="thep_b3_pr"]').val(data.hep_b3_pr);
      $('[name="tdt1_pr"]').val(data.dt1_pr);
      $('[name="tdt2_pr"]').val(data.dt2_pr);
      

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
            url : "<?php echo site_url('dt_imunisasi_ctrl/ajax_delete')?>/"+id,
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
          url = "<?php echo site_url('dt_imunisasi_ctrl/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('dt_imunisasi_ctrl/ajax_update')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "thn_imun": $("#tthn").val(),
              "bln_imun": $("#tbln").val(),
              "kd_desa": $("#tkd_desa").val(),
              "kd_puskes": $("#tkd_puskes").val(),
              "id_imun": $("#tid_imun").val(),
              "campak": $("#tcampak").val(),
              "dpt1": $("#tdpt1").val(),
              "hep_b1": $("#thep_b1").val(),
              "hep_b3": $("#thep_b3").val(),
              "tt1_pr": $("#ttt1_pr").val(),
              "tt2_pr": $("#ttt2_pr").val(),
              "tt_bos_pr": $("#ttt_bos_pr").val(),
              "wanita_tt1_pr": $("#twanita_tt1_pr").val(),
              "dt1": $("#tdt1").val(),
              "dt2": $("#tdt2").val(),
              "sd_tt1_pr": $("#tsd_tt1_pr").val(),
              "sd_tt2_pr": $("#tsd_tt2_pr").val(),
              "campak_pr": $("#tcampak_pr").val(),
              "dpt1_pr": $("#tdpt1_pr").val(),
              "hep_b1_pr": $("#thep_b1_pr").val(),
              "hep_b3_pr": $("#thep_b3_pr").val(),
              "dt1_pr": $("#tdt1_pr").val(),
              "dt2_pr": $("#tdt2_pr").val(),

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
                            <li class="active"><a id="tab_diagnosa2" href="#tab_diagnosa" data-toggle="tab">Data Imunisasi</a></li>
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
              
            <input type="hidden" name="tid_imun" id="tid_imun" >
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
              <td width="40%"></td>
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
              <td>Jml. Bayi 9 - 11 bln, divaksinasi campak</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tcampak" name="tcampak">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tcampak_pr" name="tcampak_pr">
              </td>
            </tr>
            
            <tr>
              <td>Jml. Bayi 2-11 bln, divaksinasi DPT I</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tdpt1" name="tdpt1">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tdpt1_pr" name="tdpt1_pr">
              </td>
            </tr>

            <tr>
              <td>Jml. Bayi 0-11 bln, divaksinasi Hepatitis B1</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="thep_b1" name="thep_b1">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="thep_b1_pr" name="thep_b1_pr">
              </td>
            </tr>

            <tr>
              <td>Jml. Bayi 0-11 bln, divaksinasi Hepatitis B3</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="thep_b3" name="thep_b3">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="thep_b3_pr" name="thep_b3_pr">
              </td>
            </tr>

            <tr>
              <td>Jml. Ibu hamil divaksinasi TT I</td>
              <td>:</td>
              <td>
              <!--  <input type="text" class="form-control input-sm size_kecil" id="thml_tgi_rjuk" name="thml_tgi_rjuk"> -->
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="ttt1_pr" name="ttt1_pr">
              </td>
            </tr>

            <tr>
              <td>Jml. Ibu hamil divaksinasi TT II</td>
              <td>:</td>
              <td>
             <!--   <input type="text" class="form-control input-sm size_kecil" id="tsalin_tng" name="tsalin_tng"> -->
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="ttt2_pr" name="ttt2_pr">
              </td>
            </tr>

            <tr>
              <td>Jml. Ibu hamil divaksinasi TT boster</td>
              <td>:</td>
              <td>
              <!--  <input type="text" class="form-control input-sm size_kecil" id="tlahir_hdp_bblr" name="tlahir_hdp_bblr"> -->
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="ttt_bos_pr" name="ttt_bos_pr">
              </td>
            </tr>

            <tr>
              <td>Jml. Wanita Usia Subur/calon pengantin (WUS), divaksinasi TT I</td>
              <td>:</td>
              <td>
              <!--  <input type="text" class="form-control input-sm size_kecil" id="tlahir_mti" name="tlahir_mti"> -->
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="twanita_tt1_pr" name="twanita_tt1_pr">
              </td>
            </tr>

            <tr>
              <td>Jml. Murid SD kelas I, divaksinasi DT I</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tdt1" name="tdt1">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tdt1_pr" name="tdt1_pr">
              </td>
            </tr>

            <tr>
              <td>Jml. Murid SD kelas I, divaksinasi DT II</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tdt2" name="tdt2">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tdt2_pr" name="tdt2_pr">
              </td>
            </tr>

            <tr>
              <td>Jml. Murid wanita SD kelas VI, divaksinasi TT I</td>
              <td>:</td>
              <td>
              <!--  <input type="text" class="form-control input-sm size_kecil" id="tjml_neo_mti" name="tjml_neo_mti"> -->
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tsd_tt1_pr" name="tsd_tt1_pr">
              </td>
            </tr>

            <tr>
              <td>Jml. Murid wanita SD kelas VI, divaksinasi TT II</td>
              <td>:</td>
              <td>
              <!--  <input type="text" class="form-control input-sm size_kecil" id="tjml_materi" name="tjml_materi"> -->
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tsd_tt2_pr" name="tsd_tt2_pr">
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