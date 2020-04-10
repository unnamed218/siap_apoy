<html>
	<head>
		<title>Master Data User</title>
	</head>
	<!-- <center><h3><b>Master Data User</b></h3></center>
	<hr> -->
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Form User</b></h3>
  </div>
  	 <div class="x_content">
	<body>
		<form method = "POST" action = "<?php echo site_url('c_masterdata/tambah_user');?>">
		
			<div class="form-group">
			  <label>Username</label>
			  <input type = "text" name = "username" class = "form-control">
		
			</div>

			  <?php echo form_error('username'); ?>
			<div class="form-group">
			  <label>Password</label>
			  <input type = "text" name = "password" class = "form-control">
			  
			  <?php echo form_error('password'); ?>
			
			</div>
			<div class="form-group">
			  <label>Jabatan</label>
			 <select name="level" class="form-control">
			 	<option value="#" disabled selected>Pilih Jabatan</option>
			 	<option value="Admin">Admin</option>
			 	<option value="Keuangan">Keuangan</option>
			 	<option value="Gudang">Gudang</option>
			 </select>
			  
			  <?php echo form_error('level'); ?>
			
			</div>
			<div class="form-group">
			  <label>Nama Lengkap</label>
			  <input type = "text" name = "nama_lengkap" class = "form-control">
			  
			  <?php echo form_error('nama_lengkap'); ?>
			</div>
			
			<button type="submit" class="btn btn-default btn-primary">Simpan</button>
			<a type="button" class="btn btn-default" href="<?php echo site_url('c_masterdata/lihat_user');?>">Kembali</a>
		</form>
	</body>
</html>