<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Penyakit</title>
    <link href="<?=base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
  
    /* TR {font-size:12px};
    TD {font-size:12px}; 

    #table { font-size: 0.9em; } */

    #btaddpasien { font-size: 0.9em; }
    #modal_form { font-size: 0.9em; }

    div.container {
        width: 95%;
    }

</style>

  </head>
  <body>
 
  <div class="container">
   <!-- <h3>Data Pasien</h3> -->
    <br />
    <button id="btaddpasien" class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add-Penyakit</button>
    <br />
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Kode</th>  
          <th>Nama Jenis Penyakit</th>
          <th style="width:55px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
 
      <tfoot>
      </tfoot>
    </table>
  </div>

  <script src="<?=base_url();?>asset/js/jquery-2.1.1.min.js"></script>
  <script src="<?=base_url();?>asset/js/bootstrap.min.js"></script>
  <script src="<?=base_url();?>asset/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url();?>asset/js/dataTables.bootstrap.js"></script>
  <script src="<?=base_url();?>asset/js/bootstrap-datepicker.min.js"></script>

 
  <script type="text/javascript">
 
    var save_method; //for save method string
    var table;

    $(document).ready(function() {
      table = $('#table').DataTable({
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('penyakit_ctrl/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        
        "columnDefs": [
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
 
      });

 
      //set input/textarea/select event when change value, remove class error and remove text help block
      $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
      });

    });
 
    function add_person()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // 
      $('.help-block').empty(); // clear error string
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Jenis Penyakit'); // Set Title to Bootstrap modal title
    }
 
    function edit_person(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string


      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('penyakit_ctrl/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="tid_penyakit"]').val(data.id_penyakit);
            $('[name="tkd_penyakit"]').val(data.kd_penyakit);
            $('[name="tnama_penyakit"]').val(data.nama_penyakit);
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Jenis Penyakit'); // Set title to Bootstrap modal title
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
 
    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax
    }
 
    function save()
    {


      $('#btnSave').text('saving...'); //change button text
      $('#btnSave').attr('disabled',true); //set button disable

      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('penyakit_ctrl/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('penyakit_ctrl/ajax_update')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
               {

                  $('#modal_form').modal('hide');
                  reload_table();

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
 
    function delete_person(id)
    {
      if(confirm('Yakin akan dihapus?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('penyakit_ctrl/ajax_delete')?>/"+id,
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
 </script>
 
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Jenis Penyakit</h4>
      </div>
      <div class="modal-body form bg-warning">
        <form action="#" id="form" class="form-horizontal">
           <input type="hidden" value="" name="tid_penyakit"/>
          <div class="form-body">
            
            <div class="form-group">
              <label class="control-label col-md-3">Kode</label>
              <div class="col-md-9">
                <input name="tkd_penyakit" id="tkd_penyakit" placeholder="Kode" class="form-control input-sm" type="text">
                <span class="help-block"></span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3">Nama</label>
              <div class="col-md-9">
                <input name="tnama_penyakit" id="tnama_penyakit" placeholder="Nama jenis penyakit" class="form-control input-sm" type="text">
                <span class="help-block"></span>
              </div>
            </div>

          </div>
        </form>
          </div>
          <div class="modal-footer bg-success">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
  
  </body>
</html>