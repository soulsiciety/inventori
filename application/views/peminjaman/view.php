 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Peminjaman
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('c_user');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Peminjaman</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php echo $message;?>
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?php echo site_url('c_peminjaman/list_barang');?>">
                <button type="button" class="btn btn-sm btn-primary pull-left">Peminjaman Baru</button>
              </a>

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
                    <th>No.</th>
                    <th>Tgl. Pinjam</th>
                    <th>Nama Peminjam</th>
                    <th>Departemen/Unit</th>
                    <th>Ruangan</th>
                    <th>Kondisi Barang</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($peminjaman as $p)
                  {
                  ?>
                    <tr>
                      <td><?php echo $p->id_p?></td>
                      <td><?php echo date("d-M-Y", strtotime($p->tgl_pinjam));?></td>
                      <td><?php echo $p->nama_peminjam?></td>
                      <td><?php echo $p->departemen?></td>
                      <td><?php echo $p->nama_ruangan?></td>
                      <td><?php if($p->status=="1"){echo "masih dipinjam";}else{echo"kembali";}?></td>
                      <td>
                        <a href="<?php echo site_url('c_peminjaman/edit/'.$p->id_p);?>" class="btn btn-info btn-xs">
                          <i class="fa fa-list"></i>
                        </a>
                        <a href="<?php echo site_url('c_peminjaman/edit/'.$p->id_p);?>" class="btn btn-warning btn-xs">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" class="hapus" kode="<?php echo $p->id_p;?>" data-toggle="modal" data-target="#modal-default">
                          <button class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i>
                          </button>
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
        <h4 class="modal-title">Konfirmasi Hapus Data</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idhapus" id="idhapus">
        <p>Anda yakin ingin menghapus transaksi peminjaman ini ?</p>
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
      url:"<?php echo site_url('c_barang/delete');?>",
      type:"POST",
      data:"kode="+kode,
      cache:false,
      success:function(html){
        location.href="<?php echo site_url('c_barang/index/delete_success');?>";
      }
    });
  });

</script>
