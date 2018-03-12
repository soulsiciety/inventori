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
        <li><a href="<?php echo site_url('c_barang');?>">Data Barang</a></li>
        <li class="active">Form Input Data Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php echo $message;?>
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
              <form method="post" enctype="multipart/form-data" action="<?php echo site_url('c_barang/input');?>">
                <div class="col-xs-6">
                    <input type="hidden" name="id_barang" value="<?php echo $id_new;?>">
                  <div class="form-group">
                    <label>No BMN</label>
                    <input type="text" name="no_bmn" class="form-control" value="<?php echo set_value('no_bmn'); ?>">
                  </div>
                  <div class="form-group">
                    <label>Jenis Barang</label>
                    <select class="form-control" name="id_jenis" id="id_jenis" onchange="get_kat();">
						          <option value="">Pilih Jenis</option>
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
                  <div class="form-group" id="v_kat">
                    <label>Kategori Barang</label>
                    <select class="form-control" name="id_kategori" id="id_kategori" onchange="get_kla();">
                        <option value="">Pilih Kategori</option>
                    </select>
                  </div>
                  <div class="form-group" id="v_kla">
                    <label>Klasifikasi Barang</label>
                    <select class="form-control" name="id_klasifikasi" id="id_klasifikasi">
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type=" text" name="nama_barang" class="form-control" value="<?php echo set_value('nama_barang'); ?>">
                    <?php echo form_error('nama_barang', '<span class="error">', '</span>'); ?>
                  </div>
                  
                </div> <!-- close div col-xs-6 -->
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Minimum Stok</label>
                    <input type="number" min="1" name="minimum_stok" class="form-control" value="<?php echo set_value('minimum_stok'); ?>">
                    <?php echo form_error('minimum_stok', '<span class="error">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Gambar Barang</label>
                    <input type="file" name="gambar_barang" class="form-control">
                    <?php echo form_error('gambar_barang', '<span class="error">', '</span>'); ?>
                  </div>
                  <!-- /.form-group --> 
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" rows="6" cols="10" class="form-control">
                      <?php echo set_value('deskripsi'); ?>
                    </textarea>
                    <?php echo form_error('deskripsi', '<span class="error">', '</span>'); ?>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">
                    Simpan Barang</button>
                  </div>
                </div> <!-- close div col-xs-6 -->
                
              </form>
			  <script>
					$(document).ready(function() {
						$('#v_kat').hide();
            $('#v_kla').hide();
					});
					
					function get_kat(){
						$('#v_kat').show();
						var jenis = $('#id_jenis').val();
						
						if(jenis!=""){
							$.ajax({
								url     : '<?php echo base_url(); ?>c_barang/get_kat',
								type    : 'POST',
								data	: "id_jenis="+jenis,
								cache   : false,
								success : function(data){ 
								   if(data){
										$('#id_kategori').html(data);
								   }
								}
							});
						}else{
							$('#v_kat').hide();
						}
					}
          function get_kla(){
            $('#v_kla').show();
            var kategori = $('#id_kategori').val();
            
            if(kategori!=""){
              $.ajax({
                url     : '<?php echo base_url(); ?>c_barang/get_kla',
                type    : 'POST',
                data  : "id_kategori="+kategori,
                cache   : false,
                success : function(data){ 
                   if(data){
                    $('#id_klasifikasi').html(data);
                   }
                }
              });
            }else{
              $('#v_kla').hide();
            }
          }
        </script>

        
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



