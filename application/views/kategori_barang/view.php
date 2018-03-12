 <!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets_1/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!--untuk format titik  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets_1/js/my.js"></script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('c_user');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('c__kategori_barang');?>">Kategori Barang</a></li>
        <li class="active">Form Input Kategori Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php echo $message;?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Kategori Barang</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" enctype="multipart/form-data" action="<?php echo site_url('c_kategori_barang/input');?>">
                <div class="col-xs-12">
                  <div class="form-group">
                    <label>Jenis Barang</label>
                    <input type="hidden" name="id_kategori_barang" value="<?php echo $id_new;?>">
                    <select class="form-control" name="id_jenis">
                      <?php
                      foreach($jenis_barang as $jns)
                      {
                        if(set_value('id_jenis') == $jns->id_jenis)
                        {
                          ?>
                          <option selected="" value="<?php echo $jns->id_jenis?>"><?php echo $jns->nama_jenis?></option>
                          <?php
                        }
                          ?>
                        <option value="<?php echo $jns->id_jenis?>"><?php echo $jns->nama_jenis?></option>
                        <?php  
                      }
                      ?>
                    </select>
                  </div>
                  <!-- /.form-group -->
                  
                  <div class="form-group">
                    <label>Nama Kategori Barang</label>
                    <input type=" text" name="nama_kategori" class="form-control" value="<?php echo set_value('nama_kategori'); ?>">
                    <?php echo form_error('nama_kategori', '<span class="error">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">
                    Simpan Kategori Barang Baru</button>
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
              <h3 class="box-title">Data Kategori Barang</h3>

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
                    <th>Jenis Barang</th>
                    <th>Kategori Barang</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach($kategori_barang as $kb)
                  {
                    ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $kb->nama_jenis;?></td>
                      <td><?php echo $kb->nama_kategori;?></td>
                      <td>
                        <a href="<?php echo site_url('c_kategori_barang/detail/'.$kb->id_kategori);?>" class="btn btn-info btn-xs">
                          detail
                        </a>
                        <a href="<?php echo site_url('c_kategori_barang/edit/'.$kb->id_kategori);?>" class="btn btn-warning btn-xs">
                          edit
                        </a>
                        <a href="#" class="hapus" kode="<?php echo $kb->id_kategori;?>" data-toggle="modal" data-target="#modal-default">
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
        <h4 class="modal-title">Konfirmasi Hapus Data Barang</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idhapus" id="idhapus">
        <p>Anda yakin ingin menghapus kategori barang ini ?</p>
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
      url:"<?php echo site_url('c_kategori_barang/delete');?>",
      type:"POST",
      data:"kode="+kode,
      cache:false,
      success:function(html){
        location.href="<?php echo site_url('c_kategori_barang/index/delete_success');?>";
      }
    });
  });

</script>




