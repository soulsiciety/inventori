 <!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets_1/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!--untuk format titik  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets_1/js/my.js"></script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ruangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('c_user');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('c_ruangan');?>">Ruangan </a></li>
        <li class="active">Form Input Ruangan </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php echo $message;?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Ruangan </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" enctype="multipart/form-data" action="<?php echo site_url('c_ruangan/input');?>">
                <input type="hidden" name="id_ruangan" value="<?php echo $id_new;?>">
                <div class="col-xs-12">
                  <div class="form-group">
                    <label>Gedung</label>
                    <select name="id_gedung" class="form-control">
                      <?php
                      foreach($gedung as $gd)
                      {
                        if(set_value('id_gedung') == $gd->id_gedung)
                        {
                          ?>
                          <option value="<?php echo $gd->id_gedung?>" selected="">
                            <?php echo $gd->nama_gedung?>
                          </option>
                          <?php
                        }
                        ?>
                        <option value="<?php echo $gd->id_gedung?>"><?php echo $gd->nama_gedung?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nama Ruangan</label>
                    <input type=" text" name="nama_ruangan" class="form-control" value="<?php echo set_value('nama_ruangan'); ?>">
                    <?php echo form_error('nama_ruangan', '<span class="error">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" rows="4" name="keterangan" value="<?php echo set_value('keterangan'); ?>"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">
                    Simpan ruangan Baru</button>
                  </div>
                  
                </div> <!-- close div col-xs-12 -->
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
 
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Ruangan </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Gedung </th>
                    <th>Nama Ruangan </th>
                    <th>Keterangan </th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach($ruangan as $kb)
                  {
                    ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $kb->nama_gedung;?></td>
                      <td><?php echo $kb->nama_ruangan;?></td>
                       <td><?php if($kb->keterangan != "") {echo $kb->keterangan;} else{ echo "-";}?></td>
                      <td>
                        <a href="<?php echo site_url('c_ruangan/edit/'.$kb->id_ruangan);?>" class="btn btn-warning btn-xs">
                          edit
                        </a>
                        <a href="#" class="hapus" kode="<?php echo $kb->id_ruangan;?>" data-toggle="modal" data-target="#modal-default">
                          <button class="btn btn-danger btn-xs">
                            hapus
                          </button>
                        </a>
                      </td>
                    </tr>
                    <?php
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Konfirmasi Hapus Data Ruangan </h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idhapus" id="idhapus">
        <p>Anda yakin ingin menghapus Ruangan  ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
        <button type="button" class="btn btn-danger" id="konfirmasi">Hapus Data</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
   
  $(".hapus").click(function(){
    var kode=$(this).attr("kode");
    
    $(".modal-body #idhapus").val(kode);
  });
  
  $("#konfirmasi").click(function(){
    var kode=$("#idhapus").val();
    
    $.ajax({
      url:"<?php echo site_url('c_ruangan/delete');?>",
      type:"POST",
      data:"kode="+kode,
      cache:false,
      success:function(html){
        location.href="<?php echo site_url('c_ruangan/index/delete_success');?>";
      }
    });
  });

</script>




