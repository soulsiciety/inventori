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
        <li><a href="<?php echo site_url('c_barang');?>">Data Barang</a></li>
        <li class="active">Form Edit Data Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Data Barang</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" enctype="multipart/form-data">
                <div class="col-xs-6">
                  <input type="hidden" name="id_barang" value="<?php echo $barang['id_barang'];?>">
                  <div class="form-group">
                    <label>No BMN</label>
                    <input type=" text" name="no_bmn" class="form-control" value="<?php echo $barang['no_bmn'];?>">
                  </div>
                  <div class="form-group">
                    <label>Jenis Barang</label>
                    <select class="form-control" name="id_jenis">
                      <?php
                      foreach($jenis as $jns)
                      {
                        ?>
                        <option value="<?php echo $jns->id_jenis?>"><?php echo $jns->nama_jenis?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kategori Barang</label>
                    <select class="form-control" name="id_kategori">
                      <?php
                      foreach($kategori as $kt)
                      {
                        ?>
                        <option value="<?php echo $kt->id_kategori?>"><?php echo $kt->nama_kategori?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type=" text" name="nama_barang" class="form-control" value="<?php echo $barang['nama_barang'];?>">
                    <?php echo form_error('nama_barang', '<span class="error">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Gambar Barang </label>
                    <input type="file" name="gambar_barang" class="form-control">
                    <input type="hidden" name="gambar_barang_lama" value="<?php echo $barang['gambar'];?>">
                    <img class="img-responsive" src="<?php echo base_url();?>assets_1/img_barang/<?php echo $barang['gambar'];?>" alt="Photo">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Minimum Stok</label>
                    <input type="number" min="1" name="minimum_stok" class="form-control" value="<?php echo $barang['minimum_stok'];?>">
                    <?php echo form_error('minimum_stok', '<span class="error">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="10" cols="80">
                      <?php echo $barang['deskripsi'];?>
                    </textarea>
                    <?php echo form_error('deskripsi', '<span class="error">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                    Simpan Perubahan Data Barang</button>
                    <a href="<?php echo site_url('c_barang');?>" class="btn btn-kembali">Kembali</a>
                  </div>
                </div>
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

  <!-- CK Editor -->
