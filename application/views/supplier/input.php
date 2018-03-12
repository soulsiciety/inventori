 <!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets_1/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!--untuk format titik  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets_1/js/my.js"></script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Supplier
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
          <div class="callout callout-primary">
          <h4>Tips!</h4>

          <p>Jika supplier memiliki kontak lebih dari satu silahkan masukan ke form <b>keterangan.</b></p>
        </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Supplier </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" enctype="multipart/form-data" action="<?php echo site_url('c_supplier/input');?>">
                <div class="col-xs-12">
                  <input type="hidden" name="id_supplier" value="<?php echo $id_new;?>">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Nama supplier</label>
                      <input type=" text" name="nama_supplier" class="form-control" value="<?php echo set_value('nama_supplier'); ?>">
                      <?php echo form_error('nama_supplier', '<span class="error">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                      <label>Kontak Supplier</label>
                      <input type=" text" name="no_telp" class="form-control" value="<?php echo set_value('no_telp'); ?>">
                      <?php echo form_error('no_telp', '<span class="error">', '</span>'); ?>
                    </div>
                  </div><!-- close col-xs-6 -->
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat" rows="4">
                        <?php echo set_value('alamat'); ?>
                      </textarea>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" name="keterangan" rows="4">
                        <?php echo set_value('keterangan'); ?>
                      </textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-block btn-primary">
                      Simpan supplier Baru</button>
                    </div>
                  </div><!-- close col-xs-6 -->
                    
                  
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





