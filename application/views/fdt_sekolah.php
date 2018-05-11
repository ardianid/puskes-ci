<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Data Kesehatan Sekolah</title>
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
                        url: "dt_sekolah_ctrl/lookup_desa",  
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
            "url": "<?php echo site_url('dt_sekolah_ctrl/ajax_list_pencarian')?>",
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

  $('[name="tid_sekolah"]').val('');

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

  $('[name="tjml_mi"]').val('0');
  $('[name="tjml_mi_pr"]').val('0');
  $('[name="tjml_mts"]').val('0');
  $('[name="tjml_mts_pr"]').val('0');
  $('[name="tjml_sma"]').val('0');
  $('[name="tjml_sma_pr"]').val('0');
  $('[name="tjml_keslin"]').val('0');
  $('[name="tjml_keslin_pr"]').val('0');
  $('[name="tjml_mkeslin"]').val('0');
  $('[name="tjml_mkeslin_pr"]').val('0');
  $('[name="tjml_uks"]').val('0');
  $('[name="tjml_uks_pr"]').val('0');
  $('[name="tjml_kons"]').val('0');
  $('[name="tjml_kons_pr"]').val('0');
  $('[name="tjml_tk"]').val('0');
  $('[name="tjml_tk_pr"]').val('0');

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
        url : "<?php echo site_url('dt_sekolah_ctrl/ajax_get_by_id_pencarian')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

      $('[name="tid_sekolah"]').val(data.id_sekolah);

      $('[name="tthn"]').val(data.thn_sekolah);
      $('[name="tbln"]').val(data.bln_sekolah);
      $('[name="tkd_desa"]').val(data.kd_desa);
      $('[name="tnama_desa"]').val(data.nama_desa);
      $('[name="tnama_kel"]').val(data.nama_kel);
      $('[name="tnama_kec"]').val(data.nama_kec);
      $('[name="tkd_puskes"]').val(data.kd_puskes);

      $('[name="tjml_mi"]').val(data.jml_mi);
      $('[name="tjml_mi_pr"]').val(data.jml_mi_pr);
      $('[name="tjml_mts"]').val(data.jml_mts);
      $('[name="tjml_mts_pr"]').val(data.jml_mts_pr);
      $('[name="tjml_sma"]').val(data.jml_sma);
      $('[name="tjml_sma_pr"]').val(data.jml_sma_pr);
      $('[name="tjml_keslin"]').val(data.jml_keslin);
      $('[name="tjml_keslin_pr"]').val(data.jml_keslin_pr);
      $('[name="tjml_mkeslin"]').val(data.jml_mkeslin);
      $('[name="tjml_mkeslin_pr"]').val(data.jml_mkeslin_pr);
      $('[name="tjml_uks"]').val(data.jml_uks);
      $('[name="tjml_uks_pr"]').val(data.jml_uks_pr);
      $('[name="tjml_kons"]').val(data.jml_kons);
      $('[name="tjml_kons_pr"]').val(data.jml_kons_pr);
      $('[name="tjml_tk"]').val(data.jml_tk);
      $('[name="tjml_tk_pr"]').val(data.jml_tk_pr);

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
            url : "<?php echo site_url('dt_sekolah_ctrl/ajax_delete')?>/"+id,
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
          url = "<?php echo site_url('dt_sekolah_ctrl/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('dt_sekolah_ctrl/ajax_update')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "thn_sekolah": $("#tthn").val(),
              "bln_sekolah": $("#tbln").val(),
              "kd_desa": $("#tkd_desa").val(),
              "kd_puskes": $("#tkd_puskes").val(),
              "id_sekolah": $("#tid_sekolah").val(),
              "jml_mi": $("#tjml_mi").val(),
              "jml_mi_pr": $("#tjml_mi_pr").val(),
              "jml_mts": $("#tjml_mts").val(),
              "jml_mts_pr": $("#tjml_mts_pr").val(),
              "jml_sma": $("#tjml_sma").val(),
              "jml_sma_pr": $("#tjml_sma_pr").val(),
              "jml_keslin": $("#tjml_keslin").val(),
              "jml_keslin_pr": $("#tjml_keslin_pr").val(),
              "jml_mkeslin": $("#tjml_mkeslin").val(),
              "jml_mkeslin_pr": $("#tjml_mkeslin_pr").val(),
              "jml_uks": $("#tjml_uks").val(),
              "jml_uks_pr": $("#tjml_uks_pr").val(),
              "jml_kons": $("#tjml_kons").val(),
              "jml_kons_pr": $("#tjml_kons_pr").val(),
              "jml_tk": $("#tjml_tk").val(),
              "jml_tk_pr": $("#tjml_tk_pr").val(),


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
                            <li class="active"><a id="tab_diagnosa2" href="#tab_diagnosa" data-toggle="tab">Data Kesehatan Sekolah</a></li>
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
              
            <input type="hidden" name="tid_sekolah" id="tid_sekolah" >
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
              <td>Jml SD dan MI kelas I dengan penjaringan kesehatan</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_mi" name="tjml_mi">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_mi_pr" name="tjml_mi_pr">
              </td>
            </tr>
            
            <tr>
              <td>Jml SLTP dan MTs kelas I</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_mts" name="tjml_mts">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_mts_pr" name="tjml_mts_pr">
              </td>
            </tr>

            <tr>
              <td>Jml SLTA dan Madrasah Aliyah kelas I dgn keg penjaringan kesehatan</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_sma" name="tjml_sma">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_sma_pr" name="tjml_sma_pr">
              </td>
            </tr>

            <tr>
              <td>Jml sekolah yg diperiksa sarana kesehatan lingkungan</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_keslin" name="tjml_keslin">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_keslin_pr" name="tjml_keslin_pr">
              </td>
            </tr>

            <tr>
              <td>Jml sekolah yg memenuhi syarat kesehatan lingkungan</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_mkeslin" name="tjml_mkeslin">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_mkeslin_pr" name="tjml_mkeslin_pr">
              </td>
            </tr>

            <tr>
              <td>Jml kunjungan pembinaan UKS ke sekolah</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_uks" name="tjml_uks">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_uks_pr" name="tjml_uks_pr">
              </td>
            </tr>

            <tr>
              <td>Jml SLTP, SLTA memperoleh konseling kesehatan remaja</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_kons" name="tjml_kons">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_kons_pr" name="tjml_kons_pr">
              </td>
            </tr>

            <tr>
              <td>Jml Taman Kanak-kanak (TK) melaksanakan kes. Anak pra sekolah</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_tk" name="tjml_tk">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tjml_tk_pr" name="tjml_tk_pr">
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