<html>
	<head>
		<title>Master Data Supplierr</title>
	</head>
	<!-- <center><h3><b>Master Data Supplier</b></h3></center>
	<hr> -->
	<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Form Supplier</b></h3>
  </div>
  	 <div class="x_content">
  	 	
	<body>
		<form method = "POST" action = "<?php echo site_url('c_masterdata/tambah_supplier');?>">
		
			<div class="form-group">
			  <label>ID Supplier</label>
			  <input type = "text" name = "no_supplier" class = "form-control" value="<?php echo $id;?>" readonly>
		
			</div>
			<div class="form-group">
			  <label>Nama Supplier</label>
			  <input type = "text" name = "nama_supplier" class = "form-control">
			  
			  <?php echo form_error('nama_supplier'); ?>
			
			</div>
			<div class="form-group">
			  <label>Bagian</label>
			  <select name = "no_bb" class = "form-control">
			    <option value="#" disabled selected>Pilih Bahan Baku</option>
				<?php
					foreach($bahan_baku as $data){
						echo "<option value = ".$data['no_bb'].">".$data['nama_bb']."</option>";
					}
				?>
			  </select>
			  
			  <?php echo form_error('no_bb'); ?>
			
			</div>
			<div class="form-group">
			  <label>Alamat</label>
			  <input type = "text" name = "alamat" class = "form-control">
			  
			  <?php echo form_error('alamat'); ?>
			</div>
			<div class="form-group">
			  <label>No HP</label>
			 <input type = "number" name = "no_hp" class = "form-control">
			 <?php echo form_error('no_hp'); ?>
			  <hr>
			<button type="submit" class="btn btn-default btn-primary">Simpan</button>
			<a type="button" class="btn btn-default" href="<?php echo site_url('c_masterdata/lihat_supplier');?>">Kembali</a>
			
		</form>
	</body>
</html>