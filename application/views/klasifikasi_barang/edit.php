 <!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets_1/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!--untuk format titik  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets_1/js/my.js"></script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Klasifikasi Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('c_user');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('c_kategori_barang');?>">Klasifikasi Barang</a></li>
        <li class="active">Form Input Klasifikasi Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Klasifikasi Barang</h3>

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
                    <label>Klasifikasi Termasuk Kategori Barang</label>
                    <input type="hidden" readonly="" class="form-control" value="<?php echo $klasifikasi_barang['id_klasifikasi'];?>">
                    <select name="id_kategori" class="form-control">
                      <?php
                      foreach($kategori_barang as $kt)
                      {
                        if($kt->id_kategori == $klasifikasi_barang['id_kategori'])
                        {
                          ?>
                          <option selected="" value="<?php echo $kt->id_kategori?>">
                            <?php echo $kt->nama_kategori?>
                          </option>
                          <?php
                        }
                        ?>
                        <option value="<?php echo $kt->id_kategori?>">
                            <?php echo $kt->nama_kategori?>
                          </option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <!-- /.form-group -->
                  
                  <div class="form-group">
                    <label>Nama Klasifikasi Barang</label>
                    <input type=" text" name="nama_klasifikasi" class="form-control" value="<?php echo $klasifikasi_barang['nama_klasifikasi'];?>">
                    <?php echo form_error('nama_klasifikasi', '<span class="error">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">
                    Simpan Perubahan Klasifikasi Barang</button>
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





