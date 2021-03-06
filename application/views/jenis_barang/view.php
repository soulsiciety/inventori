 <!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets_1/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!--untuk format titik  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets_1/js/my.js"></script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jenis Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('c_user');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('c_jenis_barang');?>">Jenis Barang</a></li>
        <li class="active">Form Input Jenis Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php echo $message;?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Jenis Barang</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" enctype="multipart/form-data" action="<?php echo site_url('c_jenis_barang/input');?>">
                <div class="col-xs-12">
                  <div class="form-group">
                    <label>Nama Jenis Barang</label>
                    <input type="hidden" name="id_jenis_barang" value="<?php echo $id_new;?>">
                    <input type=" text" name="nama_jenis" class="form-control" value="<?php echo set_value('nama_jenis'); ?>">
                    <?php echo form_error('nama_jenis', '<span class="error">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">
                    Simpan jenis Barang Baru</button>
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
              <h3 class="box-title">Data Jenis Barang</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Jenis Barang</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach($jenis_barang as $kb)
                  {
                    ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $kb->nama_jenis;?></td>
                      <td>
                        <a href="<?php echo site_url('c_jenis_barang/detail/'.$kb->id_jenis.'/'.'0');?>" class="btn btn-info btn-xs">
                          detail
                        </a>
                        <a href="<?php echo site_url('c_jenis_barang/edit/'.$kb->id_jenis);?>" class="btn btn-warning btn-xs">
                          edit
                        </a>
                        <a href="#" class="hapus" kode="<?php echo $kb->id_jenis;?>" data-toggle="modal" data-target="#modal-default">
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
        <h4 class="modal-title">Konfirmasi Hapus Jenis Barang</h4>
      </div>
      <div class="modal-body">Jenis
        <input type="hidden" name="idhapus" id="idhapus">
        <p>Anda yakin ingin menghapus jenis barang ini ?</p>
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
      url:"<?php echo site_url('c_jenis_barang/delete');?>",
      type:"POST",
      data:"kode="+kode,
      cache:false,
      success:function(html){
        location.href="<?php echo site_url('c_jenis_barang/index/delete_success');?>";
      }
    });
  });

</script>




