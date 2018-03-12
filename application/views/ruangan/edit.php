 <!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets_1/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!--untuk format titik  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets_1/js/my.js"></script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ruangan 
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('c_user');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('c_ruangan');?>">ruangan </a></li>
        <li class="active">Form Edit ruangan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit ruangan </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post">
                <div class="col-xs-12">
                  <input type="hidden" class="form-control" value="<?php echo $ruangan['id_ruangan'];?>">
                  <div class="form-group">
                    <label>Gedung</label>
                    <select name="id_gedung" class="form-control">
                     <?php
                      foreach($gedung as $gd)
                      {
                        if($ruangan['id_gedung'] == $gd->id_gedung)
                        {
                          ?>
                          <option value="<?php echo $gd->id_gedung?>" selected="">
                            <?php echo $gd->nama_gedung?>
                          </option>
                          <?php
                        }
                        ?>
                        <option value="<?php echo $gd->id_gedung?>"><?php echo $gd->nama_gedung?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nama Ruangan </label>
                    <input type=" text" name="nama_ruangan" class="form-control" value="<?php echo $ruangan['nama_ruangan'];?>">
                    <?php echo form_error('nama_ruangan', '<span class="error">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan">
                      <?php echo $ruangan['keterangan'];?>
                    </textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">
                    Simpan Perubahan Ruangan </button>
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





