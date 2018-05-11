<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Lap Rekam Medik</title>
    <link href="<?=base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/jquery-ui-1.10.4.min.css" type="text/css" media="all" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/bootstrap-datepicker.min.css" rel="stylesheet">

</head>
<body>

  <script src="<?=base_url();?>asset/js/jquery-2.1.1.min.js"></script>
  <script src="<?=base_url();?>asset/js/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?=base_url();?>asset/js/bootstrap.min.js"></script>
  <script src="<?=base_url();?>asset/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url();?>asset/js/dataTables.bootstrap.js"></script>
  <script src="<?=base_url();?>asset/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    var kd_puskes_d = "<?php echo $kd_puskes; ?>";

  /* nama pasien rawat jalan */
      $("#tnama_in").autocomplete({  
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

                    $("#tkode_in").val( ui.item.id );
                    $("#tnama_in").val( ui.item.value );
                     
                },
            open: function () {
              autoComplete.zIndex(300);
            },     
      }).data("autocomplete")._renderItem = function (ul, item) {
        return $("<li>")
            .data("item.autocomplete", item)
            .append('<a>' + item.value + '<br>' + '<small> <div class="text-lowercase">' +  item.desc +'</div> </small>'+ '</a>')
            .appendTo(ul);
    };

    /* kode pasien rawat jalan */
    $("#tkode_in").autocomplete({  
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

                    $("#tnama_in").val( ui.item.desc );
                    $("#tkode_in").val( ui.item.id);

                },
            open: function () {
              autoComplete.zIndex(300);
            },     
      }).data("autocomplete")._renderItem = function (ul, item) {
        return $("<li>")
            .data("item.autocomplete", item)
            .append('<a>' + item.value + '<br>' + '<small> <div class="text-capitalize">' +  item.desc +'</div> </small>'+ '</a>')
            .appendTo(ul);
    };

</script>


<h3 class="text-primary"><strong>LAPORAN  </strong><small><strong>REKAM MEDIK PASIEN</strong></small></h3>
<hr>

<div class="alert alert-warning">
<form action="lap_rekam_medik_ctrl/ajax_export_excel" method="post" enctype="multipart/form-data">
<table width="100%" border="0">
  <tr>
    <td width="9%">Pasien</td>
    <td width="1%">:</td>
    <td width="11%"><input name="tkode_in" type="text" id="tkode_in" class="form-control input-sm" /></td>
    <td width="27%"><input name="tnama_in" type="text" id="tnama_in" class="form-control input-sm" /></td>
    <td width="3%">&nbsp;</td>
    <td width="44%"><button id="bts_load" type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-list-alt"></i> Load Laporan </button></td>
  </tr>
</table>
</form>
</div>

</body>
</html>