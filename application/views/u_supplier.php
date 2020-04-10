<html>
<!-- <head><h3>Edit Supplier</h3></head>
<hr> -->
<body>
<div>
	<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Edit Supplier</b></h3>
  </div>
  	 <div class="x_content">
<form method="POST" action="<?php echo site_url().'/c_masterdata/edit_supplier'; ?>">
	<div class="form-group">
		<div class="row">
				<label>ID Supplier</label>
				<input readonly type="text" class="form-control" name="no_supplier" value="<?php echo $data['no_supplier'] ; ?>"  >
			</div>
		
	</div>
	<div class="form-group">
		<div class="row">
				<label>Nama Supplier</label>
				<input type="text" class="form-control" name="nama_supplier" value="<?php echo $data['nama_supplier'] ; ?>" >
			</div>
		</div>

	<?php echo form_error('nama_supplier'); ?>
	<div class="form-group">
		<div class="row">
				<label>Alamat</label>
				<input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat'] ; ?>" >
			</div>
		</div>
	
	<?php echo form_error('alamat'); ?>
	<div class="form-group">
		<div class="row">
				 <label>No HP</label>
			  <input type="text" name="no_hp" class="form-control"  value="<?php echo $data['no_hp'] ; ?>">
			</div>
		</div>
	</div>
<?php echo form_error('no_hp'); ?>

	
		<input type="submit" name="submit" class="btn btn-primary" value="Simpan" >

		<a href = "<?php echo site_url()."/c_masterdata/lihat_supplier"?>" class="btn btn-default" role="button">Kembali</a>
		
	</div>
	</div>
	</div>
</form>
</div>
</body>
</html>