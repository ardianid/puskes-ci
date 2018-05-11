<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Gudang</title>
    <link href="<?=base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/jquery-ui-1.10.4.min.css" type="text/css" media="all" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/bootstrap-datepicker.min.css" rel="stylesheet">

<style type="text/css">

.alignRight { text-align: center; }
.alignRight_btn { float: right; }
.detailright { text-align: right; }

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

var save_method; //for save method string
var username = "<?php echo $username; ?>";
var kd_puskes_d = "<?php echo $kd_puskes; ?>";

 $(document).ready(function() {

  table_search = $('#table_search').DataTable({
        "autoWidth": false, //step 1
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('gudang_ctrl/ajax_list_pencarian')?>",
            "type": "POST",
            "data": function(d) {
              d.no_bukti= $('#tnomor_sc').val();
              d.tanggal= $('#ttanggal_sc').val();
              d.unit1= $('#tunit1_sc').val();
              d.unit2= $('#tunit2_sc').val();
              d.jenis= $('#tjenis_sc').val();
              d.kd_puskes = kd_puskes_d;
            }
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
          { width: '10px', targets: 0,"orderable": true },
          { width: '20px', targets: 1,"orderable": true },
          { width: '20px', targets: 2,"orderable": true },
          { width: '10px', targets: 3,"orderable": true },
          { width: '20px', targets: 4,"orderable": true },
          { width: '20px', targets: 5,"orderable": true },
          { width: '20px', targets: 6,sClass: "alignRight","orderable": true },
          { width: '50px', targets: 7,"orderable": true },
          { width: '5px', targets: 8,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
  });

table_in = $('#table_in').DataTable({
        "autoWidth": false, //step 1
        "proscsing": true, //Feature control the processing indicator.
        "servereSide": true, //Feature control DataTables' server-side processing mode.
        "paging":   false,
        "info": false,
        "searching": false,
        "order": [], //Initial no order.
        
        "ajax": {
            "url": "<?php echo site_url('gudang_ctrl/ajax_list_isi')?>",
            "type": "POST",
            "data": function(d) {
              d.no_bukti= $('#tbukti_s').val();
            }},
        "columnDefs": [
          { width: '5px', targets: 0,"orderable": false },
          { width: '20px', targets: 1,"orderable": false },
          { width: '7px', targets: 2,"orderable": false },
          { width: '15px', targets: 3,"orderable": false },
          { width: '10px', targets: 4,"orderable": false },
          { width: '10px', targets: 5,"orderable": false },
          { width: '10px', targets: 6,"orderable": false },
          { width: '3px', targets: 7,sClass: "alignRight","orderable": false },
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ], 
       
  }); 

// kd nama obat

      $("#tnama_obat").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "gudang_ctrl/lookup_obat",
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
                        url: "gudang_ctrl/lookup_obat_kode",
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

// akhir kode nama obat

// hitung diskon total
  $('#tdisc_in').blur(function() {

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

      }

  }); 
// akhir hitung total


 })
 // akhir document ready

  function reload_table_obat()
    {
      table_in.ajax.reload(null,false); //reload datatable ajax
    }

// cek bukti sementara
 function cek_nobukti_sementara(){

  //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('gudang_ctrl/get_by_nobukti_sementara/')?>/" + username,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            if (data ==''){
              $('[name="tbukti_s"]').val(username + "-00001");
            }else{

              var isi = data.no_bukti;
              var angka = isi.substr(Number(username.length)+1,5);
              angka = Number(angka)+1;

              var isi_akhir='';

              if (String(angka).length == 1){
                  isi_akhir = "0000" + angka;
              }else if (String(angka).length == 2){
                  isi_akhir = "000" + angka;
              }else if (String(angka).length == 3){
                  isi_akhir = "00" + angka;
              }else if (String(angka).length == 4){
                isi_akhir = "0" + angka;
              }else{
                isi_akhir =  angka;
              }

               $('[name="tbukti_s"]').val(username + "-" + isi_akhir );

            }

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
      });

  } 
// akhir cek bukti sementara

// cek notransaksi akhir
  function cek_nobukti_akhir(){

    var ttanggal = $('[name="ttanggal_in"]').val();
    var d = new Date(String(ttanggal));
    var m = d.getMonth()+1;
    var y = d.getFullYear();
    var yx = String(y);
      yx = yx.substr(2,2);
    var mx='';

    var sjenis=$('[name="tjenis_in"]').val();

    if (sjenis=='TR MASUK') {
      sjenis= 'M';
    }else{
      sjenis="K";
    }

    if (String(m).length==1) {
      mx = mx.concat('0',m);
    }

    var noawal = '' ;
        noawal = noawal.concat('TG',sjenis,'-',yx,mx);

    var hasil='';

  //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('gudang_ctrl/get_by_nobukti_akhir')?>",
        type: "GET",
        data: {
            "noawal": noawal,
            "kd_puskes": kd_puskes_d,
        },
        dataType: "JSON",
        async: false,
        success: function(data)
        {

           hasil = data.no_bukti;

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
           // alert('Error get data from ajax');
           hasil = 'err';
        }
      });

      if (hasil==null || hasil=='' ) {
        hasil = '';
        hasil = hasil.concat(noawal,'00000');
      }
      return hasil;

  } 
// akhir cek notransaksi akhir

//datepicker
      $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "auto",
        todayBtn: true,
        todayHighlight: true,  
      });

 function btsearch_tr(){
    table_search.ajax.reload(null,false); //reload datatable ajax
 }


function btadd_trans(){

  $.ajax({
        url : "<?php echo site_url('gudang_ctrl/delete_by_zero_transaksi')?>/"+username,
        type: "POST",
        dataType: "JSON",
        success: function(data)
          {

                cek_nobukti_sementara();
                $('#tab_detail').tab('show'); 

                $('#tjenis_in').attr('readonly', false );

                $('[name="tbukti_in"]').val("");
                $('[name="tidgudang"]').val("");


                $('[name="tunit1_in"]').val("");
                $('[name="tunit2_in"]').val("");
                $('[name="tfaktur_in"]').val("");
                $('[name="tket_in"]').val("");

                $('[name="tjml_in"]').val("0");
                $('[name="tdisc_in"]').val("0");
                $('[name="ttotal_in"]').val("0");

               save_method='add';

          },
            error: function (jqXHR, textStatus, errorThrown)
          {
                alert('Error delete data');
          }
      });

  

}


function btadd_obat2(){

  var isi_sementara = $('[name="tbukti_s"]').val();

  if (String(isi_sementara).length==0) {
    cek_nobukti_sementara();
    save_method='add';
  }

  $('#form_obat')[0].reset(); // reset form on modals
  $('#modal_obat').modal('show'); // show bootstrap modal
  $('.modal-title').text('Obat In/Out'); // Set Title to Bootstrap modal title

}

// trans isi obat

function save_obat_isi()
    {

      $('#btnSave_obat').text('saving...'); //change button text
      $('#btnSave_obat').attr('disabled',true); //set button disable

      var url;
          url = "<?php echo site_url('gudang_ctrl/ajax_add_isi')?>";
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "no_bukti": $("#tbukti_s").val(),
              "kd_obat": $("#tkode_obat").val(),
              "qty": $("#tqty_obat").val(),
              "satuan": $("#tsatuan_obat").val(),
              "harga": $("#tharga_obat").val(),
              "disc": $("#tdiskon_obat").val(),
              "total": (Number($("#tqty_obat").val()) * Number($("#tharga_obat").val())) - Number($("#tdiskon_obat").val())
            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {  

                  
                    
                  // hitung total

                    var tot_brg =(Number($("#tqty_obat").val()) * Number($("#tharga_obat").val())) - Number($("#tdiskon_obat").val());

                    var jml_total = $('#tjml_in').val();
                    if (jml_total==''){ jml_total=0;}
                        jml_total = Number(jml_total) + Number(tot_brg);

                    $('[name="tjml_in"]').val(jml_total);

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

                    }

                  // akhir hitung total


                  $('#form_obat')[0].reset();
                  reload_table_obat();
                  $('#tkode_obat').focus();

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
 
    function delete_obat_isi(id)
    {
      if(confirm('Yakin akan dihapus?'))
      {


        var sjenis=$('[name="tjenis_in"]').val();
        var stdetail='';

        if (sjenis=='TR MASUK') {
            stdetail= 'minus';
        }else{
            stdetail="add";
        }

        // cek dulu total detail yang akan dihapus
    $.ajax({
        url : "<?php echo site_url('gudang_ctrl/ajax_obatdetail_bynobukti/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            
            
            var ttot = data.total;

            var jml_total = $('#tjml_in').val();
            if (jml_total==''){jml_total=0;}
                jml_total = Number(jml_total) - Number(ttot);

            $('[name="tjml_in"]').val(jml_total);

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

            }


            //update detail-1
            $.ajax({
              url : "<?php echo site_url('gudang_ctrl/ajax_update_transaksi_detail_stok')?>",
              type: "POST",
              data: {
                  "nobukti_awal": id,
                  "stat_": "dell_one",
                  "splus": stdetail
              } ,
                dataType: "JSON",
                success: function(data)
              {
              if(data.status) //if success close modal and reload ajax table
              {

                  // ajax delete data to database
                  $.ajax({
                    url : "<?php echo site_url('gudang_ctrl/ajax_delete_isi')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                       //if success reload ajax table
                       //$('#modal_form').modal('hide');
                       reload_table_obat();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error delete data');
                    }
                  });

              }
              }, error: function (jqXHR, textStatus, errorThrown)
                {
                  alert('Error adding / update data (detail-1)');
                }
              });


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

        // akhir cek dulu total detail yang akan dihapus
 
      }
    }

// akhir trans isi obat

// simpan in

function simpan_in(){

  var sjenis=$('[name="tjenis_in"]').val();

    if (sjenis=='-') {
     alert("Pilih jenis transaksi");
     return;
    }


    var stdetail='';

    if (sjenis=='TR MASUK') {
      stdetail= 'add';
    }else{
      stdetail="minus";
    }

// kalau add tambahin kode
if (save_method == "add") {


  var x = cek_nobukti_akhir();
  if (x==null) { x=''; }

  if (x=='err'){
    alert('error get max bukti');
    return;
  }


    var noakhir = '';
    var noawal = x.substr(0,8);

    if (x==''){
      noakhir=1;
    }else{
      noakhir= Number(x.substr(8,5)) +1;
    }

    var noakhir2='';

    if (String(noakhir).length==1 ){
      noakhir2 = noakhir2.concat('0000',noakhir);
    }else if (String(noakhir).length==2){
      noakhir2 = noakhir2.concat('000',noakhir);
    }else if (String(noakhir).length==3){
      noakhir2 = noakhir2.concat('00',noakhir);
    }else if (String(noakhir).length==4){
      noakhir2 = noakhir2.concat('0',noakhir);
    }

    var buktisekarang = '';
      buktisekarang=buktisekarang.concat(noawal,noakhir2,"/",kd_puskes_d);

    $('[name="tbukti_in"]').val(buktisekarang);

}
// kalau add tambahin kode (akhir)

    var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('gudang_ctrl/save_transaksi')?>";
      }
      else
      {
        url = "<?php echo site_url('gudang_ctrl/ajax_update_transaksi')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "no_bukti": buktisekarang,
              "no_faktur": $("#tfaktur_in").val(),
              "tanggal": $("#ttanggal_in").val(),
              "jenis_trans": $("#tjenis_in").val(),
              "unit1": $("#tunit1_in").val(),
              "unit2": $("#tunit2_in").val(),
              "keterangan": $("#tket_in").val(),
              "total": $("#tjml_in").val(),
              "total_disc": $("#tdisc_in").val(),
              "grand_total": $("#ttotal_in").val(),
              "kd_puskes": kd_puskes_d,
              "id_gudang_ob": $("#tidgudang").val(),

            } ,
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  //update detail-1
                    $.ajax({
                      url : "<?php echo site_url('gudang_ctrl/ajax_update_transaksi_detail_stok')?>",
                      type: "POST",
                      data: {
                        "nobukti_awal": $("#tbukti_s").val(),
                        "stat_": stdetail,
                        "splus": stdetail,
                    } ,
                    dataType: "JSON",
                    success: function(data)
                    {
                      if(data.status) //if success close modal and reload ajax table
                        {

                          //update detail-2
                            $.ajax({
                              url : "<?php echo site_url('gudang_ctrl/ajax_update_transaksi_detail')?>",
                              type: "POST",
                                data: {
                                  "no_bukti": $("#tbukti_in").val(),
                                  "no_bukti_lama": $("#tbukti_s").val()
                                },
                                dataType: "JSON",
                                success: function(data)
                              { 
                                if(data.status) //if success close modal and reload ajax table
                                {

                                  // kalau bener2 udah selesai simpen
                                  alert("data disimpan");
                                  

                                  $('[name="tbukti_s"]').val("");
                                  $('[name="tbukti_in"]').val("");
                                  $('[name="tidgudang"]').val("");

                                  $('[name="tunit1_in"]').val("");
                                  $('[name="tunit2_in"]').val("");
                                  $('[name="tfaktur_in"]').val("");
                                  $('[name="tket_in"]').val("");

                                  $('[name="tjml_in"]').val("0");
                                  $('[name="tdisc_in"]').val("0");
                                  $('[name="ttotal_in"]').val("0");

                                  reload_table_obat();
                                  btsearch_tr();

                                  $('#tjenis_in').focus();

                                }
                              }, error: function (jqXHR, textStatus, errorThrown)
                                {
                                  save_method="update";
                                  alert('Error adding / update data (detail-2)');
                                }
                              });
                          // akhir update detail-2

                        }
                    }, error: function (jqXHR, textStatus, errorThrown)
                    {
                      save_method="update";
                      alert('Error adding / update data (detail-1)');
                    }
                  });
                  // akhir update detail-1


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
                save_method="update";
                alert('Error adding / update data');
                $('#btnSave_tindakan').text('save'); //change button text
                $('#btnSave_tindakan').attr('disabled',false); //set button enable
            }
        });

}

// akhir simpan in

// edit transaksi (search by nobukti)

function edit_trans_grd(id)
    {
      save_method = 'update';
      $('.help-block').empty(); // clear error string

      $('[name="tbukti_s"]').val("");
      $('[name="tbukti_in"]').val("");
      $('[name="tidgudang"]').val("");


      $('[name="tunit1_in"]').val("");
      $('[name="tunit2_in"]').val("");
      $('[name="tfaktur_in"]').val("");
      $('[name="tket_in"]').val("");

      $('[name="tjml_in"]').val("0");
      $('[name="tdisc_in"]').val("0");
      $('[name="ttotal_in"]').val("0");

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('gudang_ctrl/ajax_transaksi_bynobukti/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            
            $('[name="tidgudang"]').val(data.id_gudang_ob);
            $('[name="tbukti_s"]').val(data.no_bukti);
            $('[name="tbukti_in"]').val(data.no_bukti);
            $('[name="tjenis_in"]').val(data.jenis_trans);
            $('[name="tunit1_in"]').val(data.unit1);
            $('[name="tunit2_in"]').val(data.unit2);
            $('[name="tfaktur_in"]').val(data.no_faktur);
            
            $('[name="tket_in"]').val(data.keterangan);
            $('[name="ttanggal_in"]').val(data.tanggal);
            $('[name="tjml_in"]').val(data.total);
            $('[name="tdisc_in"]').val(data.total_disc);
            $('[name="ttotal_in"]').val(data.grand_total);

            $('#tab_detail').tab('show');
            reload_table_obat();
            
            $('#tjenis_in').attr('readonly', true);
            $('#tjenis_in').focus();

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

// akhir edit transaksi (search by nobukti)

// hapus transaksi

    function delete_ontrans_grd(id)
    {
      if(confirm('Yakin akan dihapus?'))
      {

        $.ajax({
        url : "<?php echo site_url('gudang_ctrl/ajax_transaksi_bynobukti/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            
           var sjenis = data.jenis_trans;
           var nbukti = data.no_bukti;

          var stdetail='';

          if (sjenis=='TR MASUK') {
              stdetail= 'minus';
          }else{
              stdetail="add";
          }

          

        //update detail-1
        $.ajax({
          url : "<?php echo site_url('gudang_ctrl/ajax_update_transaksi_detail_stok')?>",
          type: "POST",
          data: {
            "nobukti_awal":  nbukti,
            "stat_": "dell_all",
            "splus": stdetail,
          } ,
            dataType: "JSON",
            success: function(data)
          {
          if(data.status) //if success close modal and reload ajax table
          {
            
                  // ajax delete data to database
                  $.ajax({
                    url : "<?php echo site_url('gudang_ctrl/ajax_delete_transaksi')?>",
                    type: "POST",
                    data: {
                      "no_bukti": nbukti,
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                       btsearch_tr();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error delete data');
                    }
                  });

          }
          }, error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Error adding / update data (detail-1)');
            }
          });
      

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
        });

        
 
      }
    }

// akhir hapus transaksi

// Tab input diklik

$("#tab_detail").on("click", function() {
  
  $('#tjenis_in').attr('readonly', false);

  $('[name="tbukti_s"]').val("");
  $('[name="tbukti_in"]').val("");
  $('[name="tidgudang"]').val("");

  $('[name="tunit1_in"]').val("");
  $('[name="tunit2_in"]').val("");
  $('[name="tfaktur_in"]').val("");
  $('[name="tket_in"]').val("");

  $('[name="tjml_in"]').val("0");
  $('[name="tdisc_in"]').val("0");
  $('[name="ttotal_in"]').val("0");

  save_method='add';

  reload_table_obat();

});

// akhir tab input diklik

</script>

  <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a id="tab_daftar" href="#tab_daftar2" data-toggle="tab">Daftar transaksi</a></li>
                            <li><a id="tab_detail" href="#tab_detail2" data-toggle="tab">Transaksi Gudang</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab_daftar2">
                          
                          <div class="alert alert-warning">
                          <table width="100%" border="0">
                            <tr>
                              <td width="10%">No. Bukti</td>
                              <td width="2%">:</td>
                              <td width="31%">
                                <input type="text" class="form-control input-sm" id="tnomor_sc" name="tnomor_sc">
                              </td>
                              <td width="2%">&nbsp;</td>
                              <td width="10%" >Unit Asal</td>
                              <td width="2%">:</td>
                              <td width="33%">
                                <input type="text" class="form-control input-sm" id="tunit1_sc" name="tunit1_sc">
                              </td>
                            </tr>
                            <tr>
                              <td>Tanggal</td>
                              <td>:</td>
                              <td>
                                <input type="text" id="ttanggal_sc" name="ttanggal_sc" placeholder="yyyy-mm-dd" class="form-control input-sm datepicker" type="text" value="<?php echo date('Y-m-d'); ?>">
                              </td>
                              <td>&nbsp;</td>
                              <td>Unit Penerima</td>
                              <td>:</td>
                              <td>
                                <input type="text" class="form-control input-sm" id="tunit2_sc" name="tunit2_sc">
                              </td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>Jenis Trans</td>
                              <td>:</td>
                              <td>

                                <select name="tjenis_sc" id="tjenis_sc" class="form-control input-sm">
                                  <option value="All">All</option>
                                  <option value="TR MASUK">TR MASUK</option>
                                  <option value="TR KELUAR">TR KELUAR</option>
                                </select>

                              </td>
                            </tr>
                          </table>

                        
                        <button id="bts_search" class="btn btn-success" onclick="btsearch_tr()"><i class="glyphicon glyphicon-search"></i> Search Pasien </button>            

                      </div>

                      <table width="100%" border="0">
                        <tr>
                          <td height="35" valign="top">
                            <button id="bts_add_trans" class="btn btn-success btn-sm alignRight_btn" onclick="btadd_trans()"><i class="glyphicon glyphicon-plus"></i> Add </button>      
                          </td>
                        </tr>

                        <tr>
                          <td>

                            <table id="table_search" class="table table-striped table-bordered" cellspacing="0">
                                <thead>
                                  <tr>
                                    <th>Jns Trans</th>
                                    <th>No Bukti</th>
                                    <th>No Faktur</th>
                                    <th>Tanggal</th>
                                    <th>Unit Asal</th>
                                    <th>Unit Penerima</th>
                                    <th>Total</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>

                          </td>
                        </tr>
                      </table>
                      

                        </div>
                        <!-- akhir tab 1 -->

                        <div class="tab-pane fade" id="tab_detail2">
                          
                          <input type="hidden" class="form-control input-sm" id="tbukti_s" name="tbukti_s">
                          <input type="hidden" class="form-control input-sm" id="tidgudang" name="tidgudang">

                         <!-- <form action="#" id="form_in"> -->
                          <table width="100%" border="0">
                          <tr><td colspan="2">  
                          <table width="100%" border="0">
                              <tr>
                                <td width="17%">Jenis Trans</td>
                                <td width="2%">:</td>
                                <td width="29%">
                                   <select name="tjenis_in" id="tjenis_in" class="form-control input-sm">
                                      <option value="-">--PILIH--</option>
                                      <option value="TR MASUK">TR MASUK</option>
                                      <option value="TR KELUAR">TR KELUAR</option>
                                    </select>
                                </td>
                                <td width="2%">&nbsp;</td>
                                <td width="17%">Unit Asal</td>
                                <td width="2%">:</td>
                                <td width="31%">
                                   <input type="text" class="form-control input-sm" id="tunit1_in" name="tunit1_in">
                                </td>
                              </tr>
                              <tr>
                                <td width="17%">No Bukti</td>
                                <td width="2%">:</td>
                                <td width="29%">
                                  <input type="text" class="form-control input-sm" id="tbukti_in" name="tbukti_in" readonly="true">
                                </td>
                                <td width="2%">&nbsp;</td>
                                <td width="17%">Unit Penerima</td>
                                <td width="2%">:</td>
                                <td width="31%">
                                  <input type="text" class="form-control input-sm" id="tunit2_in" name="tunit2_in">
                                </td>
                              </tr>
                              <tr>
                                <td>No Faktur</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control input-sm" id="tfaktur_in" name="tfaktur_in">
                                </td>
                                <td>&nbsp;</td>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control input-sm" id="tket_in" name="tket_in">
                                </td>
                              </tr>
                              <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>
                                  <input type="text" id="ttanggal_in" name="ttanggal_in" placeholder="yyyy-mm-dd" class="form-control input-sm datepicker" type="text" value="<?php echo date('Y-m-d'); ?>">
                                </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                            </table>

                          </td></tr>

                          <tr><td height="30" valign="top" colspan="2">
                              <button id="bts_add_obat" class="btn btn-success btn-sm alignRight_btn" onclick="btadd_obat2()"><i class="glyphicon glyphicon-plus"></i> Add </button>
                          <tr><td colspan="2" height="7"</td></tr>
                          <tr><td colspan="2">

                            <table id="table_in" class="table table-striped table-bordered" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>Kd Obat</th>
                                  <th>Nama Obat</th>
                                  <th>Qty</th>
                                  <th>Satuan</th>
                                  <th>Harga</th>
                                  <th>Disc</th>
                                  <th>Jumlah</th>
                                   <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                              </tfoot>
                          </table>

                        </td></tr>

                        <tr><td colspan="2" height="5" valign="top"></td></tr>
                        <tr><td colspan="2">
                            <table width="100%" border="0">

                              <tr>
                                <td width="30%"></td>
                                <td width="50%" align="right">
                                  Jumlah :
                                </td>
                                <td>
                                  <input type="text" class="form-control input-sm detailright" id="tjml_in" name="tjml_in" readonly="true" value="0">
                                </td>
                              </tr>

                              <tr>
                                <td>
                                  <button id="bts_simpan_in" class="btn btn-success" onclick="simpan_in()"><i class="glyphicon glyphicon-download"></i> Simpan </button>            
                                </td>
                                <td align="right">
                                  Disc Total :
                                </td>
                                <td>
                                  <input type="text" class="form-control input-sm detailright" id="tdisc_in" name="tdisc_in" value="0">
                                </td>
                              </tr>

                              <tr>
                                <td></td>
                                <td align="right">
                                  Total :
                                </td>
                                <td>
                                  <input type="text" class="form-control input-sm detailright" id="ttotal_in" name="ttotal_in" readonly="true" value="0">
                                </td>
                              </tr>

                            </table>
                        </td></tr>

                      </table>

                      <!--  </form> -->

                        </div>
                        <!-- akhir detail2 -->

                    </div>
                </div>
  </div>
  <!-- akhir panel -->

  
  <!-- modal obat -->
  <div class="modal fade" id="modal_obat" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog"  role="document">
  <div class="modal-content">
  <div class="modal-header bg-primary">
    <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Obat Gudang</h4>
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
          <label for="tdosis_obat">Diskon :</label>
          <input id="tdiskon_obat" name="tdiskon_obat" placeholder="Diskon" class="form-control" type="number" min="0" value="0" step="1" class="currency">
      </div>

    </form>
  </div>

  <div class="modal-footer bg-success">
    
      <button type="button" id="btnSave_obat" onclick="save_obat_isi()" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    
  </div>


  </div>
  </div>
  </div>

  <!-- akhir modal obat -->

</body>
</html>