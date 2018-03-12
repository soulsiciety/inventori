 <!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets_1/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!--untuk format titik  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets_1/js/my.js"></script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('c_user');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('c_user');?>">User </a></li>
        <li class="active">Form Input User </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php echo $message;?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input User </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" enctype="multipart/form-data" action="<?php echo site_url('c_user/input');?>">
                <div class="col-xs-12">
                  <div class="form-group">
                    <label>ID User</label>
                    <input type="text" readonly="" name="id_user" class="form-control" value="<?php echo $id_new;?>">
                  </div>
                  <div class="form-group">
                    <label>Level User</label>
                    <select class="form-control" name="level" id="level" onchange="get_kat();">
                      <option value="">Pilih Level User</option>
                      <option value="3">Dosen / Pegawai</option>
                      <option value="4">Mahasiswa</option>
                      <option value="1">Super Admin</option>
                      <option value="2">Unit TI</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type=" text" name="nama_user" class="form-control" value="<?php echo set_value('nama_user'); ?>">
                  </div>
                  <div class="form-group">
                    <label>No Telp/Hp</label>
                    <input type="text" name="no_telp" class="form-control" value="<?php echo set_value('no_telp'); ?>">
                  </div>
                  <div class="form-group" id="v_departemen">
                    <label>Departemen</label>
                    <select name="id_departemen" class="form-control">
                      <?php
                      foreach($departemen as $dpt)
                      {
                        ?>
                        <option value="<?php echo $dpt->id_departemen;?>">
                          (<?php echo $dpt->kode_departemen; ?>) <?php echo $dpt->nama_departemen; ?>
                          </option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group" id="v_prodi">
                    <label>Prodi</label>
                    <select name="id_prodi" id="v_prodi" class="form-control">
                      <?php
                      foreach($prodi as $pd)
                      {
                        ?>
                        <option value="<?php echo $pd->id_prodi;?>">
                          (<?php echo $pd->kode_prodi; ?>) <?php echo $pd->nama_prodi; ?>
                        </option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <hr class="garis-biru">
                   <div class="form-group" id="f_user1">
                    <label>Username</label>
                    <input type=" text" name="username" class="form-control" value="<?php echo $username_new; ?>">
                  </div>
                   <div class="form-group" id="f_user2">
                    <label>Password</label>
                    <input type=" text" name="password" class="form-control" value="<?php echo $password_new; ?>">
                  </div>
                  <div class="form-group" id="f_admin1">
                    <label>Username</label>
                    <input type=" text" name="username" class="form-control" value="<?php echo set_value('username'); ?>">
                  </div>
                   <div class="form-group" id="f_admin2">
                    <label>Password</label>
                    <input type=" text" name="password" class="form-control" value="<?php echo set_value('password'); ?>">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">
                    Simpan User Baru</button>
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


  <script>
  $(document).ready(function() {
    $('#v_departemen').hide();
    $('#v_prodi').hide();
    $('#f_user1').hide();
    $('#f_user2').hide();
    $('#f_admin1').hide();
    $('#f_admin2').hide();

  });
  
  function get_kat(){
    //$('#v_departemen').show();
    var level = $('#level').val();
    
    if(level=="1" || level=="2" ){
      $('#v_departemen').hide();
      $('#v_prodi').hide();
      $('#f_user1').hide();
      $('#f_user2').hide();
      $('#f_admin1').show();
      $('#f_admin2').show();
    }else if(level=="3"){
      $('#v_departemen').show();
      $('#v_prodi').hide();
      $('#f_admin1').hide();
      $('#f_admin2').hide();
      $('#f_user1').show();
      $('#f_user2').show();
    }else if(level=="4"){
      $('#v_prodi').show();
      $('#v_departemen').hide();
      $('#f_admin1').hide();
      $('#f_admin2').hide();
      $('#f_user1').show();
      $('#f_user2').show();
    }
    else
    {
      $('#v_departemen').hide();
      $('#v_prodi').hide();
      $('#f_user1').hide();
      $('#f_user2').hide();
      $('#f_admin1').hide();
      $('#f_admin2').hide();
    }
  }
</script>




