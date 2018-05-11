<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Data Pengamatan Penyakit Menular</title>
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
            "url": "<?php echo site_url('dt_penyakitm_ctrl/ajax_list_pencarian')?>",
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

  $('[name="ta_afp1"]').val('0');
  $('[name="ta_afp1_pr"]').val('0');

  $('[name="ta_afp2"]').val('0');
  $('[name="ta_afp2_pr"]').val('0');
  
  $('[name="tb_tetanus1"]').val('0');
  $('[name="tb_tetanus1_pr"]').val('0');

  $('[name="tb_tetanus2"]').val('0');
  $('[name="tb_tetanus2_pr"]').val('0');

  $('[name="tc_komplikasi"]').val('0');
  $('[name="tc_komplikasi_pr"]').val('0');

  $('[name="tc_bumil_pr"]').val('0');
  
  $('[name="tc_semprot"]').val('0');
  $('[name="tc_semprot_pr"]').val('0');  

  $('[name="td_pdbd"]').val('0');
  $('[name="td_pdbd_pr"]').val('0');  

  $('[name="td_foging"]').val('0');
  $('[name="td_foging_pr"]').val('0');  

  $('[name="td_diabit"]').val('0');
  $('[name="td_diabit_pr"]').val('0');  

  $('[name="td_psn"]').val('0');
  $('[name="td_psn_pr"]').val('0');  

  $('[name="td_jentik"]').val('0');
  $('[name="td_jentik_pr"]').val('0');    

  $('[name="td_rjentik"]').val('0');
  $('[name="td_rjentik_pr"]').val('0');    

  $('[name="te_rabies"]').val('0');
  $('[name="te_rabies_pr"]').val('0');    

  $('[name="te_varsar"]').val('0');
  $('[name="te_varsar_pr"]').val('0');    

  $('[name="tf_endemis"]').val('0');
  $('[name="tf_endemis_pr"]').val('0');    

  $('[name="tf_masal"]').val('0');
  $('[name="tf_masal_pr"]').val('0');    

  $('[name="tg_zoon"]').val('0');
  $('[name="tg_zoon_pr"]').val('0');    

  $('[name="th_frambu1"]').val('0');
  $('[name="th_frambu1_pr"]').val('0');    

  $('[name="th_frambu2"]').val('0');
  $('[name="th_frambu2_pr"]').val('0');    

  $('[name="th_frambu3"]').val('0');
  $('[name="th_frambu3_pr"]').val('0');    

  $('[name="ti_diare_oralit"]').val('0');
  $('[name="ti_diare_oralit_pr"]').val('0');    

  $('[name="ti_diare_infus"]').val('0');
  $('[name="ti_diare_infus_pr"]').val('0');    

  $('[name="ti_diare_anti"]').val('0');
  $('[name="ti_diare_anti_pr"]').val('0');    

  $('[name="tj_ispa"]').val('0');
  $('[name="tj_ispa_pr"]').val('0');      

  $('[name="tk_bta1"]').val('0');
  $('[name="tk_bta1_pr"]').val('0');      

  $('[name="tk_bta2"]').val('0');
  $('[name="tk_bta2_pr"]').val('0');      

  $('[name="tk_lengkap"]').val('0');
  $('[name="tk_lengkap_pr"]').val('0');      

  $('[name="tk_sembuh"]').val('0');
  $('[name="tk_sembuh_pr"]').val('0');      

  $('[name="tk_kambuh"]').val('0');
  $('[name="tk_kambuh_pr"]').val('0');      

  $('[name="tl_pb1"]').val('0');
  $('[name="tl_pb1_pr"]').val('0');      

  $('[name="tl_baru"]').val('0');
  $('[name="tl_baru_pr"]').val('0');      

  $('[name="tl_mb"]').val('0');
  $('[name="tl_mb_pr"]').val('0');      

  $('[name="tl_cacat2"]').val('0');
  $('[name="tl_cacat2_pr"]').val('0');      

  $('[name="tl_mdt"]').val('0');
  $('[name="tl_mdt_pr"]').val('0');      

  $('[name="tl_pb2"]').val('0');
  $('[name="tl_pb2_pr"]').val('0');      

  $('[name="tl_mb_komplit"]').val('0');
  $('[name="tl_mb_komplit_pr"]').val('0');      

  $('[name="tl_pb_komplit"]').val('0');
  $('[name="tl_pb_komplit_pr"]').val('0');      

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
        url : "<?php echo site_url('dt_penyakitm_ctrl/ajax_get_by_id_pencarian')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

      $('[name="tid_penyakitm"]').val(data.id_penyakitm);

      $('[name="tthn"]').val(data.thn_penyakit);
      $('[name="tbln"]').val(data.bln_penyakit);
      $('[name="tkd_desa"]').val(data.kd_desa);
      $('[name="tnama_desa"]').val(data.nama_desa);
      $('[name="tnama_kel"]').val(data.nama_kel);
      $('[name="tnama_kec"]').val(data.nama_kec);
      $('[name="tkd_puskes"]').val(data.kd_puskes);

      $('[name="ta_afp1"]').val(data.a_afp1);
      $('[name="ta_afp1_pr"]').val(data.a_afp1_pr);

      $('[name="ta_afp2"]').val(data.a_afp2);
      $('[name="ta_afp2_pr"]').val(data.a_afp2_pr);

      $('[name="tb_tetanus1"]').val(data.b_tetanus1);
      $('[name="tb_tetanus1_pr"]').val(data.b_tetanus1_pr);

      $('[name="tb_tetanus2"]').val(data.b_tetanus2);
      $('[name="tb_tetanus2_pr"]').val(data.b_tetanus2_pr);

      $('[name="tc_komplikasi"]').val(data.c_komplikasi);
      $('[name="tc_komplikasi_pr"]').val(data.c_komplikasi_pr);

      $('[name="tc_bumil_pr"]').val(data.c_bumil_pr);

      $('[name="tc_semprot"]').val(data.c_semprot);
      $('[name="tc_semprot_pr"]').val(data.c_semprot_pr);

      $('[name="td_pdbd"]').val(data.d_pdbd);
      $('[name="td_pdbd_pr"]').val(data.d_pdbd_pr);


      $('[name="td_foging"]').val(data.d_foging);
      $('[name="td_foging_pr"]').val(data.d_foging_pr);

      $('[name="td_diabit"]').val(data.d_diabit);
      $('[name="td_diabit_pr"]').val(data.d_diabit_pr);

      $('[name="td_psn"]').val(data.d_psn);
      $('[name="td_psn_pr"]').val(data.d_psn_pr);

      $('[name="td_jentik"]').val(data.d_jentik);
      $('[name="td_jentik_pr"]').val(data.d_jentik_pr);

      $('[name="td_rjentik"]').val(data.d_rjentik);
      $('[name="td_rjentik_pr"]').val(data.d_rjentik_pr);

      $('[name="te_rabies"]').val(data.e_rabies);
      $('[name="te_rabies_pr"]').val(data.e_rabies_pr);

      $('[name="te_varsar"]').val(data.e_varsar);
      $('[name="te_varsar_pr"]').val(data.e_varsar_pr);

      $('[name="tf_endemis"]').val(data.f_endemis);
      $('[name="tf_endemis_pr"]').val(data.f_endemis_pr);

      $('[name="tf_masal"]').val(data.f_masal);
      $('[name="tf_masal_pr"]').val(data.f_masal_pr);

      $('[name="tg_zoon"]').val(data.g_zoon);
      $('[name="tg_zoon_pr"]').val(data.g_zoon_pr);
      
      $('[name="th_frambu1"]').val(data.h_frambu1);
      $('[name="th_frambu1_pr"]').val(data.h_frambu1_pr);

      $('[name="th_frambu2"]').val(data.h_frambu2);
      $('[name="th_frambu2_pr"]').val(data.h_frambu2_pr);

      $('[name="th_frambu3"]').val(data.h_frambu3);
      $('[name="th_frambu3_pr"]').val(data.h_frambu3_pr);

      $('[name="ti_diare_oralit"]').val(data.i_diare_oralit);
      $('[name="ti_diare_oralit_pr"]').val(data.i_diare_oralit_pr);

      $('[name="ti_diare_infus"]').val(data.i_diare_infus);
      $('[name="ti_diare_infus_pr"]').val(data.i_diare_infus_pr);

      $('[name="ti_diare_anti"]').val(data.i_diare_anti);
      $('[name="ti_diare_anti_pr"]').val(data.i_diare_anti_pr);

      $('[name="tj_ispa"]').val(data.j_ispa);
      $('[name="tj_ispa_pr"]').val(data.j_ispa_pr);

      $('[name="tk_bta1"]').val(data.k_bta1);
      $('[name="tk_bta1_pr"]').val(data.k_bta1_pr);

      $('[name="tk_bta2"]').val(data.k_bta2);
      $('[name="tk_bta2_pr"]').val(data.k_bta2_pr);

      $('[name="tk_lengkap"]').val(data.k_lengkap);
      $('[name="tk_lengkap_pr"]').val(data.k_lengkap_pr);

      $('[name="tk_sembuh"]').val(data.k_sembuh);      
      $('[name="tk_sembuh_pr"]').val(data.k_sembuh_pr);      

      $('[name="tk_kambuh"]').val(data.k_kambuh);
      $('[name="tk_kambuh_pr"]').val(data.k_kambuh_pr);

      $('[name="tl_pb1"]').val(data.l_pb1);
      $('[name="tl_pb1_pr"]').val(data.l_pb1_pr);

      $('[name="tl_baru"]').val(data.l_baru);
      $('[name="tl_baru_pr"]').val(data.l_baru_pr);

      $('[name="tl_mb"]').val(data.l_mb);
      $('[name="tl_mb_pr"]').val(data.l_mb_pr);

      $('[name="tl_cacat2"]').val(data.l_cacat2);      
      $('[name="tl_cacat2_pr"]').val(data.l_cacat2_pr);

      $('[name="tl_mdt"]').val(data.l_mdt);
      $('[name="tl_mdt_pr"]').val(data.l_mdt_pr);

      $('[name="tl_pb2"]').val(data.l_pb2);
      $('[name="tl_pb2_pr"]').val(data.l_pb2_pr);

      $('[name="tl_mb_komplit"]').val(data.l_mb_komplit);
      $('[name="tl_mb_komplit_pr"]').val(data.l_mb_komplit_pr);

      $('[name="tl_pb_komplit"]').val(data.l_pb_komplit);
      $('[name="tl_pb_komplit_pr"]').val(data.l_pb_komplit_pr);

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
            url : "<?php echo site_url('dt_penyakitm_ctrl/ajax_delete')?>/"+id,
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
          url = "<?php echo site_url('dt_penyakitm_ctrl/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('dt_penyakitm_ctrl/ajax_update')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: {
              "thn_penyakit": $("#tthn").val(),
              "bln_penyakit": $("#tbln").val(),
              "kd_desa": $("#tkd_desa").val(),
              "kd_puskes": $("#tkd_puskes").val(),
              "id_penyakitm": $("#tid_penyakitm").val(),

              "a_afp1": $("#ta_afp1").val(),
              "a_afp1_pr": $("#ta_afp1_pr").val(),

              "a_afp2": $("#ta_afp2").val(),
              "a_afp2_pr": $("#ta_afp2_pr").val(),

              "b_tetanus1": $("#tb_tetanus1").val(),
              "b_tetanus1_pr": $("#tb_tetanus1_pr").val(),

              "b_tetanus2": $("#tb_tetanus2").val(),
              "b_tetanus2_pr": $("#tb_tetanus2_pr").val(),

              "c_komplikasi": $("#tc_komplikasi").val(),
              "c_komplikasi_pr": $("#tc_komplikasi_pr").val(),

              "c_bumil_pr": $("#tc_bumil_pr").val(),

              "c_semprot": $("#tc_semprot").val(),
              "c_semprot_pr": $("#tc_semprot_pr").val(),

              "d_pdbd": $("#td_pdbd").val(),
              "d_pdbd_pr": $("#td_pdbd_pr").val(),

              "d_foging": $("#td_foging").val(),
              "d_foging_pr": $("#td_foging_pr").val(),

              "d_diabit": $("#td_diabit").val(),
              "d_diabit_pr": $("#td_diabit_pr").val(),

              "d_psn": $("#td_psn").val(),
              "d_psn_pr": $("#td_psn_pr").val(),

              "d_jentik": $("#td_jentik").val(),
              "d_jentik_pr": $("#td_jentik_pr").val(),

              "d_rjentik": $("#td_rjentik").val(),
              "d_rjentik_pr": $("#td_rjentik_pr").val(),

              "e_rabies": $("#te_rabies").val(),
              "e_rabies_pr": $("#te_rabies_pr").val(),

              "e_varsar": $("#te_varsar").val(),
              "e_varsar_pr": $("#te_varsar_pr").val(),

              "f_endemis": $("#tf_endemis").val(),
              "f_endemis_pr": $("#tf_endemis_pr").val(),

              "f_masal": $("#tf_masal").val(),
              "f_masal_pr": $("#tf_masal_pr").val(),

              "g_zoon": $("#tg_zoon").val(),
              "g_zoon_pr": $("#tg_zoon_pr").val(),

              "h_frambu1": $("#th_frambu1").val(),
              "h_frambu1_pr": $("#th_frambu1_pr").val(),

              "h_frambu2": $("#th_frambu2").val(),
              "h_frambu2_pr": $("#th_frambu2_pr").val(),

              "h_frambu3": $("#th_frambu3").val(),
              "h_frambu3_pr": $("#th_frambu3_pr").val(),

              "i_diare_oralit": $("#ti_diare_oralit").val(),
              "i_diare_oralit_pr": $("#ti_diare_oralit_pr").val(),

              "i_diare_infus": $("#ti_diare_infus").val(),
              "i_diare_infus_pr": $("#ti_diare_infus_pr").val(),

              "i_diare_anti": $("#ti_diare_anti").val(),
              "i_diare_anti_pr": $("#ti_diare_anti_pr").val(),

              "j_ispa": $("#tj_ispa").val(),
              "j_ispa_pr": $("#tj_ispa_pr").val(),

              "k_bta1": $("#tk_bta1").val(),
              "k_bta1_pr": $("#tk_bta1_pr").val(),

              "k_bta2": $("#tk_bta2").val(),
              "k_bta2_pr": $("#tk_bta2_pr").val(),

              "k_lengkap": $("#tk_lengkap").val(),
              "k_lengkap_pr": $("#tk_lengkap_pr").val(),

              "k_sembuh": $("#tk_sembuh").val(),
              "k_sembuh_pr": $("#tk_sembuh_pr").val(),

              "k_kambuh": $("#tk_kambuh").val(),
              "k_kambuh_pr": $("#tk_kambuh_pr").val(),

              "l_pb1": $("#tl_pb1").val(),
              "l_pb1_pr": $("#tl_pb1_pr").val(),

              "l_baru": $("#tl_baru").val(),
              "l_baru_pr": $("#tl_baru_pr").val(),

              "l_mb": $("#tl_mb").val(),
              "l_mb_pr": $("#tl_mb_pr").val(),

              "l_cacat2": $("#tl_cacat2").val(),
              "l_cacat2_pr": $("#tl_cacat2_pr").val(),

              "l_mdt": $("#tl_mdt").val(),
              "l_mdt_pr": $("#tl_mdt_pr").val(),

              "l_pb2": $("#tl_pb2").val(), 
              "l_pb2_pr": $("#tl_pb2_pr").val(), 

              "l_mb_komplit": $("#tl_mb_komplit").val(), 
              "l_mb_komplit_pr": $("#tl_mb_komplit_pr").val(),

              "l_pb_komplit": $("#tl_pb_komplit").val(),
              "l_pb_komplit_pr": $("#tl_pb_komplit_pr").val(),

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
                            <li class="active"><a id="tab_diagnosa2" href="#tab_diagnosa" data-toggle="tab">Data Pengamatan Penyakit Menular</a></li>
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
              
            <input type="hidden" name="tid_penyakit" id="tid_penyakit" >
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
            <td colspan="3"><hr> </td>
            </tr>

            <tr>
              <td></td>
              <td></td>
              <td>Laki-Laki</td>
              <td>Perempuan</td>
            </tr>

            <tr>
              <td colspan="3"><b><i> A. ACUTE FLACCID PARALYSIS (AFP)  </i></b></td>
            </tr>

            <tr>
              <td>Jml kasus AFP baru (0-15 tahun) ditemukan</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="ta_afp1" name="ta_afp1">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="ta_afp1_pr" name="ta_afp1_pr">
              </td>
            </tr>
            
            <tr>
              <td>Jml kasus AFP (0-15 tahun) dilacak</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="ta_afp2" name="ta_afp2">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="ta_afp2_pr" name="ta_afp2_pr">
              </td>
            </tr>

            <tr>
            <td></td>
            <td colspan="3"><hr> </td>
            </tr>

            <tr>
              <td colspan="3"><b><i> B. TETANUS NEONATORUM  </i></b></td>
            </tr>

            <tr>
              <td>Jml kasus tetanus neonatorum ditemukan</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tb_tetanus1" name="tb_tetanus1">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tb_tetanus1_pr" name="tb_tetanus1_pr">
              </td>
            </tr>

            <tr>
              <td>Jml kasus tetanus neonatorum dilacak</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tb_tetanus2" name="tb_tetanus2">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tb_tetanus2_pr" name="tb_tetanus2_pr">
              </td>
            </tr>

            <tr>
            <td></td>
            <td colspan="3"><hr> </td>
            </tr>

            <tr>
              <td colspan="3"><b><i> C. MALARIA  </i></b></td>
            </tr>

            <tr>
              <td>Jml penderita malaria berat dan komplikasi</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tc_komplikasi" name="tc_komplikasi"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tc_komplikasi_pr" name="tc_komplikasi_pr">
              </td>
            </tr>

            <tr>
              <td>Jml Bumil yang memperoleh pengobatan profilaksis/pendegahan</td>
              <td>:</td>
              <td>
             <!--   <input type="text" class="form-control input-sm size_kecil" id="tsalin_tng" name="tsalin_tng"> -->
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tc_bumil_pr" name="tc_bumil_pr">
              </td>
            </tr>

            <tr>
              <td>Jml rumah yang disemprot</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tc_semprot" name="tc_semprot"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tc_semprot_pr" name="tc_semprot_pr">
              </td>
            </tr>

            <tr>
            <td></td>
            <td colspan="3"><hr> </td>
            </tr>

            <tr>
              <td colspan="3"><b><i> D. DBD (Demam Berdarah)  </i></b></td>
            </tr>

            <tr>
              <td>Jml pelacakan penderita demam berdarah </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="td_pdbd" name="td_pdbd"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="td_pdbd_pr" name="td_pdbd_pr">
              </td>
            </tr>

            <tr>
              <td>Jml fogging fokus</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="td_foging" name="td_foging">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="td_foging_pr" name="td_foging_pr">
              </td>
            </tr>

            <tr>
              <td>Jml desa/kelurahan diabatisasi selektif</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="td_diabit" name="td_diabit">
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="td_diabit_pr" name="td_diabit_pr">
              </td>
            </tr>

            <tr>
              <td>Jml desa/kelurahan dilakukan PSN</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="td_psn" name="td_psn"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="td_psn_pr" name="td_psn_pr">
              </td>
            </tr>

            <tr>
              <td>Jml rumah dilakukan pemeriksaan jentik</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="td_jentik" name="td_jentik"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="td_jentik_pr" name="td_jentik_pr">
              </td>
            </tr>

            <tr>
              <td>Jml rumah yang ada jentik</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="td_rjentik" name="td_rjentik"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="td_rjentik_pr" name="td_rjentik_pr">
              </td>
            </tr>

            <tr>
            <td></td>
            <td colspan="3"><hr> </td>
            </tr>

            <tr>
              <td colspan="3"><b><i> E. RABIES  </i></b></td>
            </tr>

            <tr>
              <td>Jml penderita digigit oleh hewan penular rabies</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="te_rabies" name="te_rabies"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="te_rabies_pr" name="te_rabies_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita gigitan yang di VAR dan VAR + serum anti rabies (SAR)</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="te_varsar" name="te_varsar"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="te_varsar_pr" name="te_varsar_pr">
              </td>
            </tr>

            <tr>
            <td></td>
            <td colspan="3"><hr> </td>
            </tr>

            <tr>
              <td colspan="3"><b><i> F. FILARIA  </i></b></td>
            </tr>

            <tr>
              <td>Jml desa endemis</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tf_endemis" name="tf_endemis"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tf_endemis_pr" name="tf_endemis_pr">
              </td>
            </tr>

            <tr>
              <td>Jml desa dengan cakupan pengobatan massal > 80%</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tf_masal" name="tf_masal"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tf_masal_pr" name="tf_masal_pr">
              </td>
            </tr>


            <tr>
            <td></td>
            <td colspan="3"><hr> </td>
            </tr>

            <tr>
              <td colspan="3"><b><i> G. PENYAKIT ZOONOSIS LAIN  ANTRAKS  </i></b></td>
            </tr>

            <tr>
              <td>Jml yang diobati</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tg_zoon" name="tg_zoon"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tg_zoon_pr" name="tg_zoon_pr">
              </td>
            </tr>

            <tr>
            <td></td>
            <td colspan="3"><hr> </td>
            </tr>

            <tr>
              <td colspan="3"><b><i> H. FRAMBUSIA  </i></b></td>
            </tr>

            <tr>
              <td>Jml penduduk 0-14 th yang diperiksa untuk frambusi</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="th_frambu1" name="th_frambu1"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="th_frambu1_pr" name="th_frambu1_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita frambusia yang ditemukan</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="th_frambu2" name="th_frambu2"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="th_frambu2_pr" name="th_frambu2_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita/kontak penderita yang diobati</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="th_frambu3" name="th_frambu3"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="th_frambu3_pr" name="th_frambu3_pr">
              </td>
            </tr>

            <tr>
            <td></td>
            <td colspan="3"><hr> </td>
            </tr>

            <tr>
              <td colspan="3"><b><i> I. DIARE  </i></b></td>
            </tr>

            <tr>
              <td>Jml penderita diare (tmsk. Tersangka kolera & disentri) dpt. oralit </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="ti_diare_oralit" name="ti_diare_oralit"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="ti_diare_oralit_pr" name="ti_diare_oralit_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita diare (tmsk. Tersangka kolera & disentri) dpt. Infus </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="ti_diare_infus" name="ti_diare_infus"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="ti_diare_infus_pr" name="ti_diare_infus_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita diare (tmsk. Tersangka kolera & disentri) dpt antibiotik </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="ti_diare_anti" name="ti_diare_anti"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="ti_diare_anti_pr" name="ti_diare_anti_pr">
              </td>
            </tr>

            <tr>
            <td></td>
            <td colspan="3"><hr> </td>
            </tr>

            <tr>
              <td colspan="3"><b><i> J. ISPA  </i></b></td>
            </tr>

            <tr>
              <td>Jml penderita pneumonia balita dirujuk kader </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tj_ispa" name="tj_ispa"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tj_ispa_pr" name="tj_ispa_pr">
              </td>
            </tr>

            <tr>
            <td></td>
            <td colspan="3"><hr> </td>
            </tr>

            <tr>
              <td colspan="3"><b><i> K. TB PARU  </i></b></td>
            </tr>

            <tr>
              <td>Jml penderita BTA + baru diobati </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tk_bta1" name="tk_bta1"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tk_bta1_pr" name="tk_bta1_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita BTA - dan dg. Ronsen +  diobati </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tk_bta2" name="tk_bta2"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tk_bta2_pr" name="tk_bta2_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita mengikuti pengobatan lengkap </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tk_lengkap" name="tk_lengkap"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tk_lengkap_pr" name="tk_lengkap_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita TB Paru yang sembuh </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tk_sembuh" name="tk_sembuh"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tk_sembuh_pr" name="tk_sembuh_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita kambuh </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tk_kambuh" name="tk_kambuh"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tk_kambuh_pr" name="tk_kambuh_pr">
              </td>
            </tr>

            <tr>
            <td></td>
            <td colspan="3"><hr> </td>
            </tr>

            <tr>
              <td colspan="3"><b><i> L. KUSTA  </i></b></td>
            </tr>

            <tr>
              <td>Jml penderita terdaftar (PB/PAUSIBASILER+MB/MULTIBASILER) </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_pb1" name="tl_pb1"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_pb1_pr" name="tl_pb1_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderta baru yang ditemukan </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_baru" name="tl_baru"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_baru_pr" name="tl_baru_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita MB diantara kasus baru </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_mb" name="tl_mb"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_mb_pr" name="tl_mb_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita baru menurut cacat tk. II </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_cacat2" name="tl_cacat2"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_cacat2_pr" name="tl_cacat2_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita MB yang dpt. pengobatan MDT/MULTI DRUG TREATMENT) </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_mdt" name="tl_mdt"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_mdt_pr" name="tl_mdt_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita PB yang dpt pengobatan MDT </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_pb2" name="tl_pb2"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_pb2_pr" name="tl_pb2_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita MB yg dpt MDT komplit (RFT/RELEASE FROM TREATMENT) </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_mb_komplit" name="tl_mb_komplit"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_mb_komplit_pr" name="tl_mb_komplit_pr">
              </td>
            </tr>

            <tr>
              <td>Jml penderita PB yg dpt MDT komlit (RFT) </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_pb_komplit" name="tl_pb_komplit"> 
              </td>
              <td>
                <input type="text" class="form-control input-sm size_kecil" id="tl_pb_komplit_pr" name="tl_pb_komplit_pr">
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