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
var kd_puskes_d = "<?php echo $kd_puskes; ?>";

 $(document).ready(function() {

 	/* nama pasien rawat jalan */
      $("#tnama_desa").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "imunisasi1_ctrl/lookup_desa",  
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
            "url": "<?php echo site_url('imunisasi1_ctrl/ajax_list_pencarian')?>",
            "type": "POST",
            "data": function(d) {
              d.nama_kel= $('#tnama_kel_cr').val();
              d.nama_desa= $('#tnama_desa_cr').val();
              d.tahun= $('#tahun_cr').val();
              
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '100px', targets: 0,"orderable": false },
          { width: '100px', targets: 1,"orderable": false },
          { width: '100px', targets: 2,"orderable": false },
          { width: '20px', targets: 3,"orderable": false },
          { width: '5px', targets: 4,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
  });

})
// akhir ready

function reload_table()
{
  table_pencarian.ajax.reload(null,false); //reload datatable ajax
}

function btsearch_pasien(){
  reload_table();
}

function kosongkan_data(){

  $('[name="tid_imun1"]').val('');

  $('[name="tkd_desa"]').val('');
  $('[name="tnama_desa"]').val('');
  $('[name="tnama_kel"]').val('');
  $('[name="tnama_kec"]').val('');
  $('[name="ttahun"]').val('');
  $('[name="tbayi"]').val('0');
  $('[name="tbalita"]').val('0');
  $('[name="tanak"]').val('0');
  $('[name="tcaten"]').val('0');
  $('[name="twus_hml"]').val('0');
  $('[name="twus_tdk"]').val('0');
  $('[name="tsd"]').val('0');
  $('[name="tpos"]').val('0');
  $('[name="tups"]').val('0');
  $('[name="tpembina"]').val('0');
  $('[name="ttmp"]').val('0');
  $('[name="tkd_puskes"]').val(kd_puskes_d);

}

function add_data(){

	$('#tab_detail2').tab('show');

	save_method="add";

	$('[name="tid_imun1"]').val('');

	$('[name="tkd_desa"]').val('');
	$('[name="tnama_desa"]').val('');
	$('[name="tnama_kel"]').val('');
	$('[name="tnama_kec"]').val('');
	$('[name="ttahun"]').val('');
	$('[name="tbayi"]').val('0');
	$('[name="tbalita"]').val('0');
	$('[name="tanak"]').val('0');
	$('[name="tcaten"]').val('0');
	$('[name="twus_hml"]').val('0');
	$('[name="twus_tdk"]').val('0');
	$('[name="tsd"]').val('0');
	$('[name="tpos"]').val('0');
	$('[name="tups"]').val('0');
	$('[name="tpembina"]').val('0');
	$('[name="ttmp"]').val('0');
	$('[name="tkd_puskes"]').val(kd_puskes_d);

}

function edit_imun1(id)
{

	save_method="edit";

  $.ajax({
        url : "<?php echo site_url('imunisasi1_ctrl/ajax_get_by_id_pencarian')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="tid_imun1"]').val(data.id_imun1);

			$('[name="tkd_desa"]').val(data.kd_desa);
			$('[name="tnama_desa"]').val(data.nama_desa);
			$('[name="tnama_kel"]').val(data.nama_kel);
			$('[name="tnama_kec"]').val(data.nama_kec);
			$('[name="ttahun"]').val(data.tahun);
			$('[name="tbayi"]').val(data.jml_bayi);
			$('[name="tbalita"]').val(data.jml_balita);
			$('[name="tanak"]').val(data.jml_anak);
			$('[name="tcaten"]').val(data.jml_caten);
			$('[name="twus_hml"]').val(data.jml_wus_hml);
			$('[name="twus_tdk"]').val(data.jml_wus_tdk);
			$('[name="tsd"]').val(data.jml_sd);
			$('[name="tpos"]').val(data.jml_pos);
			$('[name="tups"]').val(data.jml_ups);
			$('[name="tpembina"]').val(data.jml_pembina);
			$('[name="ttmp"]').val(data.waktu_tmp);
			$('[name="tkd_puskes"]').val(data.kd_puskes);

            $('#tab_detail2').tab('show');    

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        } 
    });

}

function delete_imun1(id)
    {
      if(confirm('Yakin akan dihapus?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('imunisasi1_ctrl/ajax_delete')?>/"+id,
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
    }


    function save()
    {


      $('#btnSave').text('saving...'); //change button text
      $('#btnSave').attr('disabled',true); //set button disable

      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('imunisasi1_ctrl/ajax_add_imun')?>";
      }
      else
      {
        url = "<?php echo site_url('imunisasi1_ctrl/ajax_update_imun')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "kd_desa": $("#tkd_desa").val(),
              "tahun": $("#ttahun").val(),
              "jml_bayi": $("#tbayi").val(),
              "jml_balita": $("#tbalita").val(),
              "jml_anak": $("#tanak").val(),
              "jml_caten": $("#tcaten").val(),
              "jml_wus_hml": $("#twus_hml").val(),
              "jml_wus_tdk": $("#twus_tdk").val(),
              "jml_sd": $("#tsd").val(),
              "jml_pos": $("#tpos").val(),
              "jml_ups": $("#tups").val(),
              "jml_pembina": $("#tpembina").val(),
              "waktu_tmp": $("#ttmp").val(),
              "kd_puskes": $("#tkd_puskes").val(),
              "id_imun1": $("#tid_imun1").val(),
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  $('#modal_form').modal('hide');
                  reload_table();
                  alert("Data disimpan..")

                  if (save_method=='add'){
                    kosongkan_data();
                  }else{
                     $('#tab_diagnosa2').tab('show');    
                  }

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
                            <li class="active"><a id="tab_diagnosa2" href="#tab_diagnosa" data-toggle="tab">Master Data Dasar Imunisasi</a></li>
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
                <td width="15%">Kelurahan</td>
                <td width="1%">:</td>
                <td width="25%">
                  <input type="text" class="form-control input-sm" name="tnama_kel_cr" id="tnama_kel_cr" >
                </td>
                <td width="7%">&nbsp;</td>
                <td width="10%">Tahun</td>
                <td width="1%">:</td>
                <td width="43%">
                  <input type="text" class="form-control input-sm size_kecil" name="tahun_cr" id="tahun_cr" >
                </td>
              </tr>
              <tr>

              </tr>
              <tr>
                <td>Desa</td>
                <td>:</td>
                <td>
                  <input type="text" class="form-control input-sm" name="tnama_desa_cr" id="tnama_desa_cr" >
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
                  <button id="bts_pasien" class="btn btn-success" onclick="btsearch_pasien()"><i class="glyphicon glyphicon-search"></i> Search Data </button>            
                </td>
              </tr>
          </table>

        
          
        

      </div>

        <button id="bts_add_obat" class="btn btn-success btn-sm alignRight_btn" onclick="add_data()"><i class="glyphicon glyphicon-plus"></i> Add </button>

        <table id="table_cari" class="table table-striped table-bordered" cellspacing="0">
              <thead>
                <tr>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Desa</th>
                    <th>Tahun</th>
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
              
            <input type="hidden" name="tid_imun1" id="tid_imun1" >
            <input type="hidden" name="tkd_desa" id="tkd_desa" >
            <input type="hidden" name="tkd_puskes" id="tkd_puskes" >

          <!--  <div class="alert alert-warning"> -->
            <table width="100%" border="0">
            <tr>
              <td width="17%">Kecamatan</td>
              <td width="1%">:</td>
              <td width="82%">
                <input type="text" class="form-control input-sm" id="tnama_kec" name="tnama_kec" readonly="true">
              </td>
            </tr>
            <tr>
              <td>Kelurahan</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="tnama_kel" name="tnama_kel" readonly="true">
              </td>
            </tr>
            <tr>
              <td>Desa</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="tnama_desa" name="tnama_desa">
              </td>
            </tr>
            <tr>
              <td>Tahun</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="ttahun" name="ttahun">
              </td>
            </tr>
            <tr>
              <td>Jumlah Bayi</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="tbayi" name="tbayi">
              </td>
            </tr>
            <tr>
              <td>Jumlah Balita</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="tbalita" name="tbalita">
              </td>
            </tr>

            <tr>
              <td>Jumlah Anak</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="tanak" name="tanak">
              </td>
            </tr>

            <tr>
              <td>Jumlah Caten</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="tcaten" name="tcaten">
              </td>
            </tr>

            <tr>
              <td>Jumlah WUS Hamil</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="twus_hml" name="twus_hml">
              </td>
            </tr>

            <tr>
              <td>Jumlah WUS Tdk Hamil</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="twus_tdk" name="twus_tdk">
              </td>
            </tr>

            <tr>
              <td>Jumlah SD</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="tsd" name="tsd">
              </td>
            </tr>

            <tr>
              <td>Jumlah Posyandu</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm" id="tpos" name="tpos">
              </td>
            </tr>

          </table>
       <!--   </div> -->

          <input type="hidden" class="form-control zero-border-text input-sm" id="tups" name="tups" value="0">
          <input type="hidden" class="form-control zero-border-text input-sm" id="tpembina" name="tpembina" value="0">
          <input type="hidden" class="form-control zero-border-text input-sm" id="ttmp" name="ttmp" value="0">

          <p></p>
          <button id="bts_post_obat" class="btn btn-success btn-sm" onclick="save()"><i class="glyphicon glyphicon-check"></i> Simpan </button>    

        </div>
        <!-- akhir tab detail -->

                    </div>
                </div>
        </div>
    <!-- akhir menu tab -->

</body>
</html>