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
        <li class="active">Detail Jenis Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nama Jenis</b> 
                  <a class="pull-right black">
                    <?php echo $nama_jenis['nama_jenis'];?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Jumlah Barang </b> 
                  <a class="pull-right black">
                    <?php if($total_barang_by_jenis['total'] >0){echo $total_barang_by_jenis['total'];}else{ echo "0";}?>
                  </a>
                </li>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Kategori Barang</h3> <br>
              <small>Kategori barang termasuk <b><?php echo $nama_jenis['nama_jenis'];?></b></small>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="todo-list">
                <?php
                foreach($kategori_by_jenis as $kbj)
                {
                  ?>
                  <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <span class="text"><?php echo $kbj->nama_kategori;?></span>
                    <div class="tools">
                        <a href="<?php echo site_url('c_jenis_barang/detail/'.$nama_jenis['id_jenis'].'/'.$kbj->id_kategori);?>" class="btn btn-primary btn-xs">
                          <i class="fa fa-list"></i>
                        </a>
                        <a href="<?php echo site_url('c_kategori_barang/edit/'.$kbj->id_kategori);?>" class="btn btn-warning btn-xs">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" class="hapus" nomor="<?php echo $kbj->id_jenis;?>" kode="<?php echo $kbj->id_kategori;?>" data-toggle="modal" data-target="#modal-default">
                          <button class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i>
                          </button>
                        </a>
                    </div>
                  </li>
                  <?php
                }
                ?>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right">
                <i class="fa fa-plus"></i>Tambah Kategori</button>
            </div>
          </div>
          
        </div>
        <div class="col-xs-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Barang Yang Termasuk <b><?php echo $nama_jenis['nama_jenis'];?></b></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Total Barang</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($jenis as $kb)
                  {
                    ?>
                    <tr>
                      <td><?php echo $kb->nama_barang;?> <?php echo $kb->id_barang;?></td>
                      <td><?php if($kb->total>0){echo $kb->total;}else{echo "-";}?></td>
                      <td>
                        <a href="<?php echo site_url('c_kategori_barang/edit/'.$kb->id_barang);?>" class="btn btn-info btn-xs">
                          detail barang
                        </a>
                      </td>
                    </tr>
                    <?php
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
        <input type="text" name="idhapus" id="idhapus">
        <input type="text" name="idhapus" id="idnomor">
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
    var nomor=$(this).attr("nomor");
    
    $(".modal-body #idhapus").val(kode);
    $(".modal-body #idnomor").val(nomor);
  });
  
  $("#konfirmasi").click(function(){
    var kode=$("#idhapus").val();
    var nomor=$("#idnomor").val();
    $.ajax({
      url:"<?php echo site_url('c_kategori_barang/delete');?>",
      type:"POST",
      data:"kode="+kode,
      cache:false,
      success:function(html){
        location.href="<?php echo site_url('c_jenis_barang/detail/');?>"+nomor;
      }
    });
  });

</script>





