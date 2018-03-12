 <!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets_1/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!--untuk format titik  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets_1/js/my.js"></script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        prodi 
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('c_user');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('c_prodi');?>">Prodi </a></li>
        <li class="active">Form Edit Prodi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Prodi </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post">
                <div class="col-xs-12">
                  <div class="form-group">
                    <label>Kode Prodi </label>
                    <input type="hidden" class="form-control" value="<?php echo $prodi['id_prodi'];?>">
                    <input type=" text" name="kode_prodi" class="form-control" value="<?php echo $prodi['kode_prodi'];?>">
                    <?php echo form_error('kode_prodi', '<span class="error">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Nama Prodi </label>
                    <input type=" text" name="nama_prodi" class="form-control" value="<?php echo $prodi['nama_prodi'];?>">
                    <?php echo form_error('nama_prodi', '<span class="error">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">
                    Simpan Perubahan Prodi </button>
                  </div>
                  
                </div> <!-- close div col-xs-12 -->
              </form>
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





