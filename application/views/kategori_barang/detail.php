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
        <li><a href="<?php echo site_url('c_kategori_barang');?>">kategori Barang</a></li>
        <li class="active">Detail kategori Barang</li>
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
                  <b>Nama kategori</b> 
                  <a class="pull-right black">
                    <?php echo $nama_kategori['nama_kategori'];?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Jumlah Barang </b> 
                  <a class="pull-right black">
                    <?php if($total_barang_by_kategori['total'] >0){echo $total_barang_by_kategori['total'];}else{ echo "0";}?>
                  </a>
                </li>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
        </div>
        <div class="col-xs-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Barang dengan Kategori <?php echo $nama_kategori['nama_kategori'];?></h3>

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
                  foreach($kategori as $kb)
                  {
                    ?>
                    <tr>
                      <td><?php echo $kb->nama_barang;?> <?php echo $kb->id_barang;?></td>
                      <td><?php if($kb->total>0){echo $kb->total;}else{echo "-";}?></td>
                      <td>
                        <a href="<?php echo site_url('c_barang/detail/'.$kb->id_barang);?>" class="btn btn-info btn-xs">
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





