<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pasien puskes" content="width=device-width, initial-scale=1">
    <title>Data Pasien</title>
    <link href="<?=base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?=base_url();?>asset/css/jquery-ui-1.10.4.min.css" type="text/css" media="all" rel="stylesheet">

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


    /* Autocomplete
      
      ----------------------------------*/


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


</style>

  </head>
  <body>
 
  <div class="container">

   <!-- <h3>Data Pasien</h3> -->
    <br />
    <button id="btaddpasien" class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add Pasien</button>
    <br />
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th style="width:55px;">Kode</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th style="width:20px;">Sex</th>
          <th style="width:70px;">Tgl Lahir</th>
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
  <script src="<?=base_url();?>asset/js/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?=base_url();?>asset/js/bootstrap.min.js"></script>
  <script src="<?=base_url();?>asset/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url();?>asset/js/dataTables.bootstrap.js"></script>
  <script src="<?=base_url();?>asset/js/bootstrap-datepicker.min.js"></script>

 
  <script type="text/javascript">
 
    var save_method; //for save method string
    var table;

    $(document).ready(function() {

      $("#tkelurahan").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "pasien_ctrl/lookup_kelurahan",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                            //if(data.response =="true"){  
                                add(data.message);  
                            //}
                            //$("#tkecamatan").val( ui.item.value );
                            //return false;
                        },  
                    });  
                },  
            select:   
                function(event, ui) {  

                    $("#tkd_kel").val( ui.item.id );
                    $("#tkelurahan").val( ui.item.value );
                     
                },
            open: function () {
              autoComplete.zIndex(dlg.zIndex()+1);
            },     
      });

      table = $('#table').DataTable({
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('pasien_ctrl/ajax_list')?>",
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

      //datepicker
      $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
      });
 
      //set input/textarea/select event when change value, remove class error and remove text help block
      $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
      });

      $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
      });

      $("select").change(function(){
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
      $('.modal-title').text('Add Pasien'); // Set Title to Bootstrap modal title
      $( "#tkd_pasien" ).prop('disabled',false);
    }
 
    function edit_person(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string


      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('pasien_ctrl/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id);
            $('[name="tkd_pasien"]').val(data.kd_pasien);
            $('[name="tnama"]').val(data.nama);
            $('[name="talamat"]').val(data.alamat);
            $('[name="tsex"]').val((data.sex=='Pria') ? 0: 1);
            $('[name="ttgl_lahir"]').val(data.tgl_lahir);
            $('[name="ttempat_lahir"]').val(data.tempat_lahir);
            $('[name="ttgl_daftar"]').val(data.tgl_daftar);
            $('[name="tkd_kel"]').val(data.kd_kel);
            $("#tkelurahan").val(data.nama_kel);
            $('[name="tjenis_jamkes"]').val(data.jenis_jamkes);
            $('[name="tno_jamkes"]').val(data.no_jamkes);
            $('[name="tcara_bayar"]').val(data.cara_bayar);
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Pasien'); // Set title to Bootstrap modal title
            
            $( "#tkd_pasien" ).prop('disabled', true );

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
          url = "<?php echo site_url('pasien_ctrl/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('pasien_ctrl/ajax_update')?>";
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
            url : "<?php echo site_url('pasien_ctrl/ajax_delete')?>/"+id,
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
        <h4 class="modal-title">Form Pasien</h4>
      </div>

      <div class="modal-body form bg-warning">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/>
          <input type="hidden" value="" id="tkd_kel" name="tkd_kel"/>
          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-3">Kode</label>
              <div class="col-md-9">
                <input id="tkd_pasien" name="tkd_pasien" placeholder="Kode Pasien" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Nama Pasien</label>
              <div class="col-md-9">
                <input name="tnama" placeholder="Nama Pasien" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Alamat</label>
              <div class="col-md-9">
                <input name="talamat" placeholder="Alamat" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Jenis Kelamin</label>
              <div class="col-md-9">
                <select name="tsex" class="form-control">
                  <option value="0">Pria</option>
                  <option value="1">Wanita</option>
                </select>
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Tempat Lahir</label>
              <div class="col-md-9">
                <input name="ttempat_lahir" placeholder="Tempat Lahir" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Tgl Lahir</label>
              <div class="col-md-9">
                <input name="ttgl_lahir" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Tgl Daftar</label>
              <div class="col-md-9">
                <input name="ttgl_daftar" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                <span class="help-block"></span>
              </div>
            </div>            

            <div class="form-group">
              <label class="control-label col-md-3">Kelurahan</label>
              <div class="col-md-9">
                
                <?php
                  echo form_input('nama_kel','','placeholder="Kelurahan" name="tkelurahan" id="tkelurahan" class="form-control" ');
                ?>
              
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Jenis Pasien</label>
              <div class="col-md-9">
                <select name="tjenis_jamkes" class="form-control">
                  <option value="-">-</option>
                  <option value="UMUM">UMUM</option>
                  <option value="JAMKESMAS">JAMKESMAS</option>
                  <option value="ASKES/BPJS">ASKES/BPJS</option>
                  <option value="JAMSOSTEK">JAMSOSTEK</option>
                </select>
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">No Jamkes</label>
              <div class="col-md-9">
                <input name="tno_jamkes" placeholder="No Jamkes" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Cara Bayar</label>
              <div class="col-md-9">
                <select name="tcara_bayar" class="form-control">
                  <option value="BAYAR">BAYAR</option>
                  <option value="GRATIS">GRATIS</option>
                </select>
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