<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Lap LB1</title>
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

    $(document).ready(function() {
        $('[name="tkd_puskes_in"]').val(kd_puskes_d);

        var d = new Date();
        var n = d.getMonth()+1;
        var yy = d.getFullYear();

        $('[name="tbln_in"]').val(n);        
        $('[name="tthn_in"]').val(yy);        

    });

</script>


<h3 class="text-primary"><strong>LAPORAN  </strong><small><strong>LB-1</strong></small></h3>
<hr>

<div class="alert alert-warning">
<form action="lap_lb1_ctrl/ajax_export_excel" method="post" enctype="multipart/form-data">

    <input name="tkd_puskes_in" type="hidden" id="tkd_puskes_in"/>

<table width="100%" border="0">
  <tr>
    <td width="5%">Bln/Thn</td>
    <td width="1%">:</td>
    <td width="7%"><input name="tbln_in" type="text" id="tbln_in" class="form-control input-sm" /></td>
    <td width="1%"></td>
    <td width="7%"><input name="tthn_in" type="text" id="tthn_in" class="form-control input-sm" /></td>
    <td width="1%">&nbsp;</td>
    <td width="44%"><button id="bts_load" type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-list-alt"></i> Load Laporan </button></td>
  </tr>
</table>
</form>
</div>

</body>
</html>