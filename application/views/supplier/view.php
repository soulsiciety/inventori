 <!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets_1/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!--untuk format titik  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets_1/js/my.js"></script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Supplier
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('c_user');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('c_supplier');?>">Supplier </a></li>
        <li class="active">Form Input Supplier </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?php echo site_url('c_supplier/input');?>">
                <button type="button" class="btn btn-sm btn-primary pull-left">Tambah Data Supplier</button>
              </a>
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
                    <th>Nama Supplier </th>
                    <th>Kontak Supplier</th>
                    <th>Alamat</th>
                    <th>Keterangan</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach($supplier as $sp)
                  {
                    ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $sp->nama_supplier;?></td>
                      <td><?php echo $sp->no_telp;?></td>
                      <td><?php echo $sp->alamat;?></td>
                      <td><?php echo $sp->keterangan;?></td>
                      <td>
                        <a href="<?php echo site_url('c_supplier/edit/'.$sp->id_supplier);?>" class="btn btn-warning btn-xs">
                          edit
                        </a>
                        <a href="#" class="hapus" kode="<?php echo $sp->id_supplier;?>" data-toggle="modal" data-target="#modal-default">
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
        <h4 class="modal-title">Konfirmasi Hapus Data supplier </h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idhapus" id="idhapus">
        <p>Anda yakin ingin menghapus supplier  ini ?</p>
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
      url:"<?php echo site_url('c_supplier/delete');?>",
      type:"POST",
      data:"kode="+kode,
      cache:false,
      success:function(html){
        location.href="<?php echo site_url('c_supplier/index/delete_success');?>";
      }
    });
  });

</script>



