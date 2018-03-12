 <!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets_1/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!--untuk format titik  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets_1/js/my.js"></script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('c_user');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('c_kategori_barang');?>">Kategori Barang</a></li>
        <li class="active">Form Input Kategori Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Barang</h3>

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
                    <label>Kategori Termasuk Jenis Barang</label>
                    <input type="hidden" readonly="" class="form-control" value="<?php echo $kategori_barang['id_kategori'];?>">
                    <select name="id_jenis" class="form-control">
                      <?php
                      foreach($jenis_barang as $jns)
                      {
                        if($jns->id_jenis == $kategori_barang['id_jenis'])
                        {
                          ?>
                          <option selected="" value="<?php echo $jns->id_jenis?>">
                            <?php echo $jns->nama_jenis?>
                          </option>
                          <?php
                        }
                        ?>
                        <option value="<?php echo $jns->id_jenis?>">
                            <?php echo $jns->nama_jenis?>
                          </option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <!-- /.form-group -->
                  
                  <div class="form-group">
                    <label>Nama Kategori Barang</label>
                    <input type=" text" name="nama_kategori" class="form-control" value="<?php echo $kategori_barang['nama_kategori'];?>">
                    <?php echo form_error('nama_kategori', '<span class="error">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">
                    Simpan Perubahan Kategori Barang</button>
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





